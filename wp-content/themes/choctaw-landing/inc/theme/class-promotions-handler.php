<?php
/**
 * Class: Promotions Handler
 * Handles data fetching and processing for the casino promotions.
 *
 * @package ChoctawNation
 */

namespace ChoctawNation;

use WP_Error;

/**
 * Class Promotions_Handler
 */
class Promotions_Handler {
	/**
	 * The transient key for the promotions.
	 *
	 * @var string
	 */
	private string $transient_key;

	/**
	 * The transient expiration time.
	 *
	 * @var int
	 */
	private int $transient_expiration;

	/**
	 * Whether or not there are any promotions
	 *
	 * @var array
	 */
	public bool $has_promotions;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->transient_key        = 'hochatown_promotions';
		$this->transient_expiration = 3 * 60 * 60; // 3 hours
		$this->get_latest_promotions();
	}

	/**
	 * Get the latest promotions from the API.
	 *
	 * @return array|void
	 */
	private function get_latest_promotions(): array|false|WP_Error|null {
		$promotions = get_transient( $this->transient_key );
		if ( $promotions ) {
			$this->has_promotions = true;
			return $promotions;
		}
		$api_url  = $this->build_api_url();
		$response = wp_remote_get( $api_url );
		if ( is_wp_error( $response ) ) {
			return $response;
		}
		$body       = wp_remote_retrieve_body( $response );
		$promotions = json_decode( $body, true );
		if ( empty( $promotions ) ) {
			$this->has_promotions = false;
			return null;
		}
		$this->has_promotions = true;
		set_transient( $this->transient_key, $promotions, $this->transient_expiration );
		return $promotions;
	}

	/**
	 * Build the API URL.
	 *
	 * @return string
	 */
	private function build_api_url(): string {
		$base_url   = 'https://www.choctawcasinos.com/wp-json/wp/v2/promotions';
		$url_params = array(
			'casino_location' => array( 25, 56 ),
			'_fields'         => array(
				'id',
				'title',
				'acf',
				'link',
				'_embedded',
				'_links',
				'excerpt',
			),
			'_embed'          => array( 'wp:featuredmedia', 'wp:term' ),
		);

		// transform arrays into strings
		$url_params = array_map(
			function ( $param ) {
				return is_array( $param ) ? implode( ',', $param ) : $param;
			},
			$url_params
		);
		return "{$base_url}?casino_location={$url_params['casino_location']}&_fields={$url_params['_fields']}&_embed={$url_params['_embed']}";
	}

	/**
	 * Get the promotions.
	 *
	 * @return array|null
	 */
	public function get_the_promotions(): ?array {
		$promotions = $this->get_latest_promotions();
		if ( empty( $promotions ) ) {
			return null;
		}
		$promotions = array_map(
			function ( $promotion ) {
				$pretty_promo             = array();
				$pretty_promo['title']    = $promotion['title']['rendered'];
				$pretty_promo['id']       = $promotion['id'];
				$pretty_promo['content']  = $promotion['excerpt']['rendered'];
				$pretty_promo['link']     = $promotion['link'];
				$pretty_promo['acf']      = $promotion['acf'];
				$pretty_promo['location'] = $promotion['_embedded']['wp:term'][0][0]['name'];
				$pretty_promo['image']    = array(
					'alt' => $promotion['_embedded']['wp:featuredmedia'][0]['alt_text'],
					'src' => $promotion['_embedded']['wp:featuredmedia'][0]['media_details']['sizes']['large']['source_url'],
				);
				return $pretty_promo;
			},
			$promotions
		);
		usort(
			$promotions,
			function ( $a, $b ) {
				if ( 'All Locations' === $a['location'] ) {
					return 1;
				}
				if ( 'All Locations' === $b['location'] ) {
					return -1;
				}
				return 0;
			}
		);
		return $promotions;
	}
}

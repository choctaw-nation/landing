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
		$headers              = wp_remote_retrieve_headers( $response );
		$total_pages          = $headers['x-wp-totalpages'];
		for ( $page_number = 2; $page_number <= $total_pages; $page_number++ ) {
			$response = wp_remote_get( $this->build_api_url( $page_number ) );
			if ( is_wp_error( $response ) ) {
				return $response;
			}
			$body       = wp_remote_retrieve_body( $response );
			$promotions = array_merge( $promotions, json_decode( $body, true ) );
		}
		set_transient( $this->transient_key, $promotions, $this->transient_expiration );
		return $promotions;
	}

	/**
	 * Build the API URL.
	 *
	 * @param int|null $page The page number for paginated API requests
	 * @return string
	 */
	private function build_api_url( int $page = null ): string {
		$base_url                     = 'https://www.choctawcasinos.com/wp-json/wp/v2/promotions';
		$casino_location_taxonomy_ids = array(
			'hochatown'     => 56,
			'all_locations' => 25,
		);
		$url_params                   = array(
			'casino_location' => array_values( $casino_location_taxonomy_ids ),
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
			'per_page'        => 100,
		);
		if ( ! empty( $page ) ) {
			$url_params['page'] = $page;
		}

		// transform nested arrays into strings
		$url_query_string = array();
		foreach ( $url_params as $key => $value ) {
			if ( is_array( $value ) ) {
				$url_query_string[] = "{$key}=" . implode( ',', $value );
			} else {
				$url_query_string[] = "{$key}=" . $value;
			}
		}
		return "{$base_url}?" . implode( '&', $url_query_string );
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
		$promotions = $this->parse_promotions( $promotions );
		$promotions = $this->sort_promotions( $promotions );
		$promotions = $this->filter_promotions( $promotions );
		return $promotions;
	}

	/**
	 * Parse the promotions object from a WP Rest Response object to a simple associative array.
	 *
	 * @param array $promotions The promotions.
	 */
	private function parse_promotions( array $promotions ): array {
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
		return $promotions;
	}

	/**
	 * Sort the promotions by location so that promotions at "All Locations" appear last.
	 *
	 * @param array $promotions The promotions.
	 */
	private function sort_promotions( array $promotions ): array {
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

	/**
	 * Filter the promotions to only show the ones that are active (regardless of post_status).
	 *
	 * @param array $promotions The promotions.
	 */
	private function filter_promotions( array $promotions ): array {
		return array_filter(
			$promotions,
			function ( $promotion ) {
				$now         = new \DateTime();
				$now         = $now->format( 'Y-m-d' );
				$event_start = $promotion['acf']['from_date'];
				if ( ! is_null( $event_start ) ) {
					$start_date = \DateTime::createFromFormat( 'Ymd', $event_start );
					if ( false !== $start_date ) {
						$start = $start_date->format( 'Y-m-d' );
						if ( $now < $start ) {
							return false;
						}
					}
				}
				$end_date = \DateTime::createFromFormat( 'Ymd', $promotion['acf']['to_date'] );
				if ( false === $end_date ) {
					return false;
				}
				$end = $end_date->format( 'Y-m-d' );
				if ( empty( $end ) ) {
					return true;
				}
				return $now <= $end;
			}
		);
	}
}

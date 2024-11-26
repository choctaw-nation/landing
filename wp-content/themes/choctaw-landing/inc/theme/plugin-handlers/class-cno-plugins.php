<?php
/**
 * CNO Plugin Handler
 * For CNO Plugin Filters
 *
 * @package ChoctawNation
 * @subpackage Plugins;
 */

namespace ChoctawNation\Plugins;

/**
 * CNO Plugin Handler
 */
class CNO_Plugins {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'template_redirect', array( $this, 'redirect_single_templates' ), 20, 1 );
		add_filter( 'register_post_type_args', array( $this, 'alter_post_type_settings' ), 20, 2 );
	}

	/**
	 * Modifies the post type settings.
	 *
	 * @param array  $args the post type arguments
	 * @param string $post_type the post type name
	 * @return array
	 */
	public function alter_post_type_settings( $args, $post_type ): array {
		$args = $this->modify_news_slugs( $args, $post_type );
		$args = $this->modify_post_type_archive_slugs( $args, $post_type );
		return $args;
	}

	/**
	 * Modifies archive slugs of custom post types.
	 *
	 * @param array  $args the post type arguments
	 * @param string $post_type the post type name
	 */
	private function modify_post_type_archive_slugs( $args, $post_type ) {
		$post_type_slugs_to_rewrite = array(
			'choctaw-news' => 'newsroom',
		);

		if ( array_key_exists( $post_type, $post_type_slugs_to_rewrite ) ) {
			$args['has_archive'] = $post_type_slugs_to_rewrite[ $post_type ];
		}
		if ( 'choctaw-events' === $post_type ) {
			$args['has_archive'] = false;
		}
		return $args;
	}

	/**
	 * Modifies the slug of the news post type.
	 *
	 * @param array  $args the post type arguments
	 * @param string $post_type the post type name
	 */
	private function modify_news_slugs( $args, $post_type ): array {
		if ( 'choctaw-news' === $post_type ) {
			$args['rewrite']['slug'] = 'newsroom';
			$args['has_archive']     = 'newsroom';
		}
		return $args;
	}

	/**
	 * Redirects single custom post types to the archive page.
	 */
	public function redirect_single_templates() {
		$cpts_to_redirect = array(
			array(
				'post_type' => 'choctaw-events',
				'location'  => user_trailingslashit( home_url( '/events' ) ),
			),
		);

		foreach ( $cpts_to_redirect as $cpt ) {
			if ( is_singular( $cpt['post_type'] ) ) {
				$post            = get_post();
				$has_description = get_field( 'event_details_event_description', $post->ID );
				if ( ! $has_description ) {
					wp_safe_redirect( $cpt['location'] );
					exit;
				}
			}
		}
	}
}
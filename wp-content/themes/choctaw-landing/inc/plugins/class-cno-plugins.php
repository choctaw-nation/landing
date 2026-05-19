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
		// only redirect event posts w/ no content extra content to display.
		if ( is_singular( 'choctaw-events' ) ) {
			$post = get_post();
			if ( empty( $post->post_content ) ) {
				wp_safe_redirect( user_trailingslashit( home_url( '/events' ) ) );
				exit;
			}
		}
	}
}
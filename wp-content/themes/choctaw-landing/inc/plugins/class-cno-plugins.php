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
		$args = $this->modify_event_supports( $args, $post_type );
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
	 * Modifies the supports of the events post type.
	 *
	 * @param array  $args the post type arguments
	 * @param string $post_type the post type name
	 */
	private function modify_event_supports( $args, $post_type ): array {
		if ( 'choctaw-events' !== $post_type ) {
			return $args;
		}
		$args['hierarchical'] = true;
		$args['supports']     = array_unique( array( ...$args['supports'], 'page-attributes' ) );
		return $args;
	}

	/**
	 * Redirects single custom post types to the archive page.
	 */
	public function redirect_single_templates() {
		$events_slug = 'choctaw-events';
		// only redirect event posts w/ no content extra content to display and no children.
		if ( is_singular( $events_slug ) ) {
			$post     = get_post();
			$children = get_children(
				array(
					'post_parent' => $post->ID,
					'post_type'   => $events_slug,
					'fields'      => 'ids',
					'post_status' => 'publish',
					'numberposts' => 1,
				)
			);
			if ( empty( $post->post_content ) && empty( $children ) ) {
				wp_safe_redirect( user_trailingslashit( home_url( '/events' ) ) );
				exit;
			}
		}
	}

	/**
	 * Registers a block bindings source for event venues, allowing blocks to access the venue information of an event post.
	 */
	public function register_custom_block_bindings() {
		register_block_bindings_source(
			'cno/event-venue',
			array(
				'label'              => 'Event Venue',
				'uses_context'       => array( 'postId', 'postType' ),
				'get_value_callback' => function ( $source_args, $block_instance, $attribute_name ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.FoundAfterLastUsed

					$post_id = $block_instance->context['postId'] ?? null;
					$post_type = $block_instance->context['postType'] ?? null;
					$taxonomy = 'choctaw-events-venue';
					if ( ! $post_id || 'choctaw-events' !== $post_type ) {
						return '';
					}
					$children = get_children(
						array(
							'post_parent' => $post_id,
							'post_type'   => 'choctaw-events',
							'fields'      => 'ids',
							'post_status' => 'publish',
							'numberposts' => -1,
						)
					);

					$terms = get_the_terms( $post_id, $taxonomy );

					if ( is_wp_error( $terms ) || ( empty( $terms ) && empty( $children ) ) ) {
						return '';
					}
					$terms = wp_list_pluck( $terms, 'name' );
					if ( count( $children ) > 0 ) {
						$child_terms = array();
						foreach ( $children as $child_id ) {
							$child_terms_result = get_the_terms( $child_id, $taxonomy );
							if ( is_wp_error( $child_terms_result ) || empty( $child_terms_result ) || ! is_array( $child_terms_result ) ) {
								continue;
							}
							$child_terms = array_merge( $child_terms, wp_list_pluck( $child_terms_result, 'name' ) );
						}

						$all_terms = array_unique( array( ...$child_terms, ...$terms ) );
						return esc_html(
							implode(
								', ',
								$all_terms
							)
						);
					}

					return esc_html(
						implode(
							', ',
							$terms
						)
					);
				},
			)
		);
	}
}

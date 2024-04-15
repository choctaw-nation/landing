<?php
/**
 * The global helper functions to use
 *
 * @since 2.3.0
 * @package ChoctawNation
 */

/**
 * Generates an ID based on the string.
 *
 * @param string $str the string to convert to kebab-case
 * @return string - The section ID generated from the headline.
 */
function cno_get_the_section_id( string $str ): string {
	$lowercase  = strtolower( $str );
	$snake_case = preg_replace( '/\s+/', '-', $lowercase );
	return $snake_case;
}

/** Adds Date Range Picker Assets to the head of the page */
function cno_enqueue_date_range_picker() {
	wp_enqueue_script( 'cno-date-range-picker' );
	wp_enqueue_style( 'cno-date-range-picker' );
}

/** Sets Yoast to bottom of Custom Fields */
add_filter(
	'wpseo_metabox_prio',
	function (): string {
		return 'low';
	}
);


/**
 * Modifies archive slugs of custom post types.
 *
 * @param array  $args the post type arguments
 * @param string $post_type the post type name
 */
function cno_modify_post_type_archive_slugs( $args, $post_type ) {
	$post_type_slugs = array(
		'choctaw-events' => 'all-events',
		'choctaw-news'   => 'newsroom',
	);

	if ( array_key_exists( $post_type, $post_type_slugs ) ) {
		$args['has_archive'] = $post_type_slugs[ $post_type ];
	}
	return $args;
}
add_filter( 'register_post_type_args', 'cno_modify_post_type_archive_slugs', 10, 2 );

/**
 * Modifies the slug of the news post type.
 *
 * @param array  $args the post type arguments
 * @param string $post_type the post type name
 */
function cno_modify_news_slugs( $args, $post_type ) {
	if ( 'choctaw-news' === $post_type ) {
		$args['rewrite']['slug'] = 'newsroom';
	}
	return $args;
}
add_filter( 'register_post_type_args', 'cno_modify_news_slugs', 10, 2 );

/**
 * Redirects single custom post types to the archive page with the hash of the post slug.
 */
function cno_redirect_single_templates() {
	$cpts_to_redirect = array(
		array(
			'post_type' => 'choctaw-events',
			'location'  => get_post_type_archive_link( 'choctaw-events' ),
		),
		array(
			'post_type' => 'eat-and-drink',
			'location'  => site_url( '/eat-drink' ),
		),
	);
	foreach ( $cpts_to_redirect as $cpt ) {
		if ( is_singular( $cpt['post_type'] ) ) {
			$post = get_post();
			if ( $post ) {
				wp_safe_redirect( $cpt['location'] );
				exit;
			}
		}
	}
}
add_action( 'template_redirect', 'cno_redirect_single_templates', 20, 1 );

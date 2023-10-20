<?php
/**
 * Loads ACF Classes
 *
 * @package ChoctawNation
 * @since 0.2
 */

/** Load ACF Classes */
function cno_load_acf_classes() {
	$directory  = get_stylesheet_directory() . '/inc/acf-classes';
	$classes    = array( 'acf-generator', 'acf-image', 'card', 'hero-section', 'mega-menu-content', 'title-bar', 'two-col-section' );
	$subclasses = array( 'room-types', 'featured-eats', 'full-width-section', 'restaurant-highlight' );
	$files      = array_merge( $classes, $subclasses );

	foreach ( $files as $file ) {
		$path = $directory . '/' . "class-{$file}.php";

		if ( is_file( $path ) && pathinfo( $path, PATHINFO_EXTENSION ) === 'php' ) {
			require $path;
		}
	}
}

cno_load_acf_classes();
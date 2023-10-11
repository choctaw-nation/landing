<?php
/**
 * Loads ACF Classes
 *
 * @package ChoctawNation
 * @since 0.2
 */

/** Load ACF Classes */
function cno_load_acf_classes() {
	$directory = get_stylesheet_directory() . '/inc/acf-classes';
	$files     = scandir( $directory );

	foreach ( $files as $file ) {
		$path = $directory . '/' . $file;

		if ( is_file( $path ) && pathinfo( $path, PATHINFO_EXTENSION ) === 'php' ) {
			require $path;
		}
	}
}
cno_load_acf_classes();
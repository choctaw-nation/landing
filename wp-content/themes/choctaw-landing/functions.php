<?php
/**
 * The Functions
 *
 * @package ChoctawNation
 * @since 0.2
 */

// Include Bootscore Functions
require_once __DIR__ . '/inc/bootscore/theme-functions.php';

/** Sets an Environment Variable */
function cno_set_environment() {
	$server_name = $_SERVER['SERVER_NAME'];

	if ( false !== strpos( $server_name, '.local' ) ) {
		$_ENV['CNO_ENV'] = 'dev';
	} elseif ( false !== strpos( $server_name, 'wpengine' ) ) {
		$_ENV['CNO_ENV'] = 'stage';
	} else {
		$_ENV['CNO_ENV'] = 'prod';
	}
}

/** Loads CNO Theme Functionality */
function cno_theme_includes() {
	cno_set_environment();

	$files = array( 'load-acf-classes', 'navwalker', 'mega-menu', 'scripts', 'tracking-pixels' );
	foreach ( $files as $file ) {
		require_once __DIR__ . '/inc/cno-' . $file . '.php';
	}

	// Load Yoast Metabox at the bottom of editor
	add_filter(
		'wpseo_metabox_prio',
		function () {
			return 'low';
		}
	);
}
add_action( 'after_setup_theme', 'cno_theme_includes' );

/**
 * Generates an ID based on the string.
 *
 * @param string $string the string to convert to a snake-case
 * @return string - The section ID generated from the headline.
 */
function cno_get_the_section_id( string $string ): string {
		$lowercase  = strtolower( $string );
		$snake_case = preg_replace( '/\s+/', '-', $lowercase );
		return $snake_case;
}
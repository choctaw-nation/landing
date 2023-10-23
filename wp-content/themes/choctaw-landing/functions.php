<?php
/**
 * The Functions
 *
 * @package ChoctawNation
 * @since 0.2
 */

// Include Bootscore Functions
require_once __DIR__ . '/inc/bootscore/theme-functions.php';
require_once __DIR__ . '/inc/playground-acf-fields.php';

/** Loads CNO Theme Functionality */
function cno_theme_includes() {
	// Include ACF Content Generator Classes
	require_once __DIR__ . '/inc/cno-load-acf-classes.php';

	// Include CNO Navwalker
	require_once __DIR__ . '/inc/class-cno-navwalker.php';

	// Include CNO Mega Menu
	require_once __DIR__ . '/inc/class-cno-mega-menu.php';

	// Include CNO Scripts & Styles
	require_once __DIR__ . '/inc/cno-scripts.php';

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
<?php
/**
 * The Functions
 *
 * @package ChoctawNation
 * @since 0.2
 */

// Include Bootscore Functions
require_once __DIR__ . '/inc/bootscore/theme-functions.php';

/** Loads CNO Theme Functionality */
function cno_theme_includes() {
	// Include CNO Navwalker
	require_once __DIR__ . '/inc/class-cno-navwalker.php';
	// Include CNO Scripts & Styles
	require_once __DIR__ . '/inc/cno-scripts.php';
	// Include ACF Content Generator Classes
	require_once __DIR__ . '/inc/cno-load-acf-classes.php';

	// Load Yoast Metabox at the bottom of editor
	add_filter(
		'wpseo_metabox_prio',
		function () {
			return 'low';
		}
	);
}
add_action( 'after_setup_theme', 'cno_theme_includes' );
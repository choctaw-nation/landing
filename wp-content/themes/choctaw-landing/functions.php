<?php
/**
 * The Functions
 *
 * @package ChoctawNation
 * @since 0.2
 */

// Include Bootscore Functions
require_once __DIR__ . '/inc/bootscore/theme-functions.php';

// Include CNO Scripts & Styles
require_once __DIR__ . '/inc/cno-scripts.php';
require_once __DIR__ . '/inc/cno-load-acf-classes.php';

add_filter( 'wpseo_metabox_prio', 'cno_move_yoast_to_bottom' );

function cno_move_yoast_to_bottom() {
	return 'low';
}
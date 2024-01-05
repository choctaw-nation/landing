<?php
/**
 * Enqueue Scripts & Styles for CNO-specific featuresets
 *
 * @package ChoctawNation
 * @since 0.2
 */

/** Enqueues Scripts & Styles */
function cno_enqueue_scripts() {
	// Adobe Font Typekit CSS
	wp_enqueue_style( 'typekit', 'https://use.typekit.net/jqq3pwr.css', array(), null );

	$fontawesome = require_once get_template_directory() . '/dist/vendors/fontawesome.asset.php';
	wp_enqueue_style(
		'fontawesome',
		get_template_directory_uri() . '/dist/vendors/fontawesome.css',
		array(),
		$fontawesome['version']
	);

	$bootscore = require_once get_stylesheet_directory() . '/dist/vendors/bootstrap.asset.php';
	wp_enqueue_style(
		'bootscore',
		get_stylesheet_directory_uri() . '/dist/vendors/bootstrap.css',
		array(),
		$bootscore['version']
	);

	wp_enqueue_script(
		'bootscore',
		get_stylesheet_directory_uri() . '/dist/vendors/bootstrap.js',
		array( 'jquery' ),
		$bootscore['version'],
		array( 'strategy' => 'defer' )
	);

	$main = require_once get_stylesheet_directory() . '/dist/global.asset.php';
	wp_enqueue_style(
		'main',
		get_stylesheet_directory_uri() . '/dist/global.css',
		array( 'bootscore', 'fontawesome' ),
		$main['version']
	);

	wp_enqueue_script(
		'main',
		get_stylesheet_directory_uri() . '/dist/global.js',
		array( 'bootscore' ),
		$main['version'],
		array( 'strategy' => 'defer' )
	);

	// style.css
	wp_enqueue_style( 'style', get_stylesheet_uri(), array( 'main' ), '0.2' );

	// IE Warning
	wp_localize_script(
		'main',
		'bootscore',
		array(
			'ie_title'                 => __( 'Internet Explorer detected', 'bootscore' ),
			'ie_limited_functionality' => __( 'This website will offer limited functionality in this browser.', 'bootscore' ),
			'ie_modern_browsers_1'     => __( 'Please use a modern and secure web browser like', 'bootscore' ),
			'ie_modern_browsers_2'     => __( ' <a href="https://www.mozilla.org/firefox/" target="_blank">Mozilla Firefox</a>, <a href="https://www.google.com/chrome/" target="_blank">Google Chrome</a>, <a href="https://www.opera.com/" target="_blank">Opera</a> ', 'bootscore' ),
			'ie_modern_browsers_3'     => __( 'or', 'bootscore' ),
			'ie_modern_browsers_4'     => __( ' <a href="https://www.microsoft.com/edge" target="_blank">Microsoft Edge</a> ', 'bootscore' ),
			'ie_modern_browsers_5'     => __( 'to display this site correctly.', 'bootscore' ),
		)
	);
	// IE Warning End

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	cno_register_daterangepicker();

	$eat_drink_swiper = require_once get_stylesheet_directory() . '/dist/modules/swiper/eat-drink-swiper.asset.php';
	wp_register_script(
		'eat-drink-swiper',
		get_stylesheet_directory_uri() . '/dist/modules/swiper/eat-drink-swiper.js',
		array( 'bootscore' ),
		$eat_drink_swiper['version'],
		array( 'strategy' => 'defer' )
	);
	wp_register_style(
		'eat-drink-swiper',
		get_stylesheet_directory_uri() . '/dist/modules/swiper/eat-drink-swiper.css',
		array( 'bootscore' ),
		$eat_drink_swiper['version'],
	);

	$events_swiper = require_once get_stylesheet_directory() . '/dist/modules/swiper/events-swiper.asset.php';
	wp_register_script(
		'events-swiper',
		get_stylesheet_directory_uri() . '/dist/modules/swiper/events-swiper.js',
		array( 'bootscore' ),
		$events_swiper['version'],
		array( 'strategy' => 'defer' )
	);
	wp_register_style(
		'events-swiper',
		get_stylesheet_directory_uri() . '/dist/modules/swiper/events-swiper.css',
		array( 'bootscore' ),
		$events_swiper['version'],
	);
}

add_action( 'wp_enqueue_scripts', 'cno_enqueue_scripts' );

/** Registers Date-Range-Picker Scripts & Styles to be called at a later time */
function cno_register_daterangepicker() {
	wp_register_script(
		'moment',
		'https://cdn.jsdelivr.net/momentjs/2.18.1/moment.min.js',
		array(),
		'2.18.1',
		array( 'strategy' => 'async' )
	);

	wp_register_script(
		'date-range-picker',
		'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js',
		array( 'moment', 'jquery', 'bootscore' ),
		null,
		array( 'strategy' => 'defer' )
	);

	wp_register_style(
		'date-range-picker',
		'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css',
		array( 'bootscore' ),
		null
	);

	$cno_date_range_picker = require_once get_stylesheet_directory() . '/dist/vendors/date-range-picker.asset.php';
	wp_register_script(
		'cno-date-range-picker',
		get_stylesheet_directory_uri() . '/dist/vendors/date-range-picker.js',
		array( 'date-range-picker' ),
		$cno_date_range_picker['version'],
		array( 'strategy' => 'defer' )
	);
	wp_register_style(
		'cno-date-range-picker',
		get_stylesheet_directory_uri() . '/dist/vendors/date-range-picker.css',
		array( 'date-range-picker' ),
		$cno_date_range_picker['version'],
	);
}

/** Adds Date Range Picker Assets to the head of the page */
function cno_enqueue_date_range_picker() {
	$daterangepicker_scripts = array( 'date-range-picker', 'moment', 'cno-date-range-picker' );
	foreach ( $daterangepicker_scripts as $script ) {
		wp_enqueue_script( $script );
	}
	wp_enqueue_style( 'date-range-picker' );
	wp_enqueue_style( 'cno-date-range-picker' );
}
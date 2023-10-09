<?php
/**
 * The Functions
 *
 * @package ChoctawNation
 * @since 0.2
 */

// Include Bootscore Functions
require_once __DIR__ . '/inc/bootscore/theme-functions.php';

/** Enqueues Scripts & Styles */
function cno_enqueue_scripts() {
	// Fontawesome
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/fontawesome/css/all.min.css', array(), '6.4.2' );

	// Adobe Font Typekit CSS
	wp_enqueue_style( 'typekit', 'https://use.typekit.net/jqq3pwr.css', array(), null );

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
		array( 'bootscore' ),
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
}

add_action( 'wp_enqueue_scripts', 'cno_enqueue_scripts' );

/** Adds Date Range Picker Assets to the head of the page */
function cno_enqueue_date_range_picker() {
	wp_enqueue_script(
		'moment',
		'https://cdn.jsdelivr.net/momentjs/2.18.1/moment.min.js',
		array(),
		'2.18.1',
		array( 'strategy' => 'async' )
	);

	wp_enqueue_script(
		'date-range-picker',
		'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js',
		array( 'moment', 'jquery' ),
		null,
		array( 'strategy' => 'defer' )
	);

	wp_enqueue_style(
		'date-range-picker',
		'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css',
		array( 'main' ),
		null
	);
}

<?php
/**
 * Theme functions and definitions
 *
 * @package ChoctawNation
 */

// Register Nav Walker class_alias
if ( ! function_exists( 'register_navwalker' ) ) :
	function register_navwalker() {
		require_once 'inc/class-wp-bootstrap-navwalker.php';
	}
endif;
add_action( 'after_setup_theme', 'register_navwalker' );

// Load Bootscore functions
require_once 'inc/bootscore-functions.php';


/** Registers Date-Range-Picker Scripts & Styles to be called at a later time */
function cno_register_daterangepicker() {
	wp_register_script(
		'moment',
		'https://cdn.jsdelivr.net/momentjs/2.18.1/moment.min.js',
		array(),
		'2.18.1',
		true
	);

	wp_register_script(
		'date-range-picker',
		'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js',
		array( 'moment', 'jquery' ),
		null,
		true
	);

	wp_register_style(
		'date-range-picker',
		'https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css',
		array(),
		null
	);

	$cno_date_range_picker = require_once get_stylesheet_directory() . '/dist/modules/date-range-picker.asset.php';
	wp_register_script(
		'cno-date-range-picker',
		get_stylesheet_directory_uri() . '/js/cno-date-range-picker.js',
		array( 'date-range-picker', 'bootstrap' ),
		$cno_date_range_picker['version'],
		true
	);
	wp_register_style(
		'cno-date-range-picker',
		get_stylesheet_directory_uri() . '/dist/modules/date-range-picker.css',
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

function cno_google_in_head() {
	echo "<!-- Google Tag Manager --><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-NHND93MH');</script><!-- End Google Tag Manager -->";
}
add_action( 'wp_head', 'cno_google_in_head' );

function cno_google_in_body(): void {
	echo '<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NHND93MH"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->';
}
add_action( 'wp_body_open', 'cno_google_in_body' );


/**
 * Enqueue scripts and styles.
 */
function bootscore_scripts() {
	// Fonts
	wp_enqueue_style( 'typekit', 'https://use.typekit.net/jqq3pwr.css', array(), false );

	// Bootstrap CSS
	wp_enqueue_style(
		'bootstrap',
		get_template_directory_uri() . '/css/lib/bootstrap.min.css',
		array(),
		'5.0.1'
	);

	// Bootstrap JS
	wp_enqueue_script(
		'bootstrap',
		get_template_directory_uri() . '/js/lib/bootstrap.bundle.min.js',
		array( 'jquery' ),
		'20151215',
		array( 'strategy' => 'defer' )
	);

	// Fontawesome
	wp_enqueue_style(
		'fontawesome',
		get_template_directory_uri() . '/css/lib/fontawesome.min.css'
	);

	// Theme CSS
	wp_enqueue_style(
		'bootscore',
		get_stylesheet_uri(),
		array( 'bootstrap', 'fontawesome' ),
		time()
	);

	// Theme JS
	wp_enqueue_script(
		'bootscore',
		get_template_directory_uri() . '/js/theme.js',
		array( 'bootstrap' ),
		'20151215',
		array( 'strategy' => 'defer' )
	);

	cno_register_daterangepicker();
}
add_action( 'wp_enqueue_scripts', 'bootscore_scripts' );

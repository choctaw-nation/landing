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
	$daterangepicker_scripts = array( 'date-range-picker', 'moment', 'cno-date-range-picker' );
	foreach ( $daterangepicker_scripts as $script ) {
		wp_enqueue_script( $script );
	}
	wp_enqueue_style( 'date-range-picker' );
	wp_enqueue_style( 'cno-date-range-picker' );
}

/** Sets Yoast to bottom of Custom Fields */
add_filter(
	'wpseo_metabox_prio',
	function (): string {
		return 'low';
	}
);
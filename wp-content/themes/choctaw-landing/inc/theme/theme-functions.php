<?php
/**
 * The global helper functions to use
 *
 * @package ChoctawNation
 */

/**
 * Generates an ID based on the string.
 *
 * @param string $str the string to convert to kebab-case
 * @return string - The section ID generated from the headline.
 */
function cno_get_the_section_id( string $str ): string {
	$decoded = html_entity_decode( $str );
	// Convert to ASCII
	$ascii_string = iconv( 'UTF-8', 'ASCII//TRANSLIT', $decoded );

	// Remove apostrophes
	$no_apostrophes = preg_replace( '/[\']/', '', $ascii_string );

	// Replace ampersands with "and"
	$replace_ampersands = preg_replace( '/[&]/', 'and', $no_apostrophes );

	// Replace non-alphanumeric characters with hyphens
	$hyphenated = preg_replace( '/[^A-Za-z0-9-]+/', '-', $replace_ampersands );

	// Consolidate multiple hyphens into one
	$consolidated_hyphens = preg_replace( '/[\s-]+/', '-', $hyphenated );

	// Trim hyphens from the start and end, and convert to lowercase
	$cleaned_string = strtolower( trim( $consolidated_hyphens, '-' ) );
	return $cleaned_string;
}

/** Adds Date Range Picker Assets to the head of the page */
function cno_enqueue_date_range_picker() {
	wp_enqueue_script( 'cno-date-range-picker' );
	wp_enqueue_style( 'cno-date-range-picker' );
}

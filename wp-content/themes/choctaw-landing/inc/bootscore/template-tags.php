<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Bootscore
 */

// Remove in v6
// Internet Explorer Warning Alert
if ( ! function_exists( 'bootscore_ie_alert' ) ) :
	/**
	 * Deprecated - functionality is removed already - Code will be removed in a future release.
	 * Replaced with a js solution to prevent page caching
	 *
	 * (Displays an alert if page is browsed by Internet Explorer)
	 *
	 * function stays to not break child themes with the function bootscore_ie_alert() immediately
	 */
	function bootscore_ie_alert() {
	}
endif;
// Internet Explorer Warning Alert End
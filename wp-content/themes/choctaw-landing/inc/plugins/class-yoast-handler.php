<?php
/**
 * Yoast Handler
 * Owns and handles filters and actions for Yoast SEO Plugin.
 *
 * @package ChoctawNation
 * @subpackage Plugins
 */

namespace ChoctawNation\Plugins;

/**
 * Yoast Handler
 */
class Yoast_Handler {
	/**
	 * Force Yoast SEO to the bottom of the page.
	 *
	 * @return string
	 */
	public function force_yoast_to_bottom(): string {
		return 'low';
	}

	/**
	 * Noindex singles
	 *
	 * @link https://gist.github.com/amboutwe/0c71e42aa164238007d7ea88f174a93f#file-yoast_seo_robots_remove_single-php
	 *
	 * @param array $robots The robots meta tag value for the current page.
	 * @return array|string
	 */
	public function noindex_singles( $robots ): array|string {
		if ( is_singular( 'choctaw-events' ) ) {
			return array();
		} else {
			return $robots;
		}
	}
}

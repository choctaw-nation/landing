<?php
/**
 * Gravity Forms Handler
 *
 * @package ChoctawNation
 * @subpackage Gravity Forms
 */

namespace ChoctawNation\Plugins;

/**
 * Gravity Forms Handler
 */
class Gravity_Forms_Handler {
	/**
	 * Add Bootstrap classes to Gravity Forms buttons.
	 *
	 * @param string $button The button HTML.
	 * @return string The modified button HTML.
	 */
	public function add_bootstrap_classes( string $button ): string {
		$dom = new \DOMDocument();
		$dom->loadHTML( $button );
		$input   = $dom->getElementsByTagName( 'input' )->item( 0 );
		$classes = $input->getAttribute( 'class' );
		$classes = 'btn btn-lg btn-outline-primary text-uppercase border-sand animated-button animated-button-bg-dark inside';
		$input->setAttribute( 'class', $classes );
		return $dom->saveHtml( $input );
	}
}

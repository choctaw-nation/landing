<?php
/**
 * Modal Generator
 * Used to build modals if a section calls it. First implemented for `/things-to-do` Two Col Section
 *
 * @package ChoctawNation
 * @subpackage ACF
 */

namespace ChoctawNation\ACF;

/**
 * Modal Generator class
 */
class Modal_Generator {
	/**
	 * The ACF array
	 *
	 * @var array $acf
	 */
	private array $acf;
	/**
	 * Constructor
	 *
	 * @param array $acf the ACF array
	 */
	public function __constructor( array $acf ) {
	}

	/**
	 * Returns the modal.
	 *
	 * @param bool $empty_modal whether to return an empty modal or a pre-populated one.
	 * @return string
	 */
	public function get_the_modal( $empty_modal ): string {
	}

	/**
	 * Echoes the modal.
	 *
	 * @param bool $empty_modal whether to return an empty modal or a pre-populated one.
	 * @return void
	 */
	public function the_modal( $empty_modal ): void {
		echo $this->get_the_modal( $empty_modal );
	}

	/**
	 * Returns the modal trigger.
	 *
	 * @param string $text the text for the trigger.
	 * @return string
	 */
	public function get_the_modal_trigger( string $text ): string {
	}
}

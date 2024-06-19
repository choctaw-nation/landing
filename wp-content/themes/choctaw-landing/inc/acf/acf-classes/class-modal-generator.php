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
	 * The modal title
	 *
	 * @var string $modal_title
	 */
	public string $modal_title;

	/**
	 * The modal trigger text
	 *
	 * @var string $modal_trigger_text
	 */
	public string $modal_trigger_text;

	/**
	 * Toggles whether the modal is a video or not
	 *
	 * @var bool $is_video
	 */
	public bool $is_video;

	/**
	 * The video iFrame
	 *
	 * @var ?string $video
	 */
	public ?string $video;

	/**
	 * The modal headline
	 *
	 * @var ?string $headline
	 */
	public ?string $headline;

	/**
	 * The modal content
	 *
	 * @var ?string $modal_content
	 */
	public ?string $modal_content;


	/**
	 * Constructor
	 *
	 * @param array $acf the ACF array
	 */
	public function __construct( array $acf ) {
		$this->modal_title        = esc_textarea( $acf['modal_title'] );
		$this->modal_trigger_text = esc_textarea( $acf['modal_trigger_text'] );
		$this->is_video           = $acf['is_video'];
		$this->video              = $acf['video'];
		$this->headline           = empty( $acf['headline'] ) ? null : esc_textarea( $acf['headline'] );
		$this->modal_content      = empty( $acf['modal_content'] ) ? null : acf_esc_html( $acf['modal_content'] );
	}
}

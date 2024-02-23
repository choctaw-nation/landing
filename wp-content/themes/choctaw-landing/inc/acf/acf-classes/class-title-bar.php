<?php
/**
 * The Title Bar (logical second section of pages)
 *
 * @package ChoctawNation
 * @subpackage ACF
 */

namespace ChoctawNation\ACF;

/** Generates the Title Bar (section 2) content */
class Title_Bar extends Generator {
	/** The headline
	 *
	 * @var string $headline
	 */
	private string $headline;

	/** The subheadline
	 *
	 * @var string $subheadline
	 */
	private string $subheadline;

	/** Whether to include a background
	 *
	 * @var bool $with_background
	 */
	private bool $with_background;


	/**
	 * Constructor
	 *
	 * @param int   $post_id the post id
	 * @param array $acf_fields the acf fields
	 * @param bool  $with_background [optional] whether to include a background (Default true)
	 */
	public function __construct( int $post_id, array $acf_fields, bool $with_background = true ) {
		$this->post_id         = $post_id;
		$this->with_background = $with_background;
		$this->init_props( $acf_fields );
	}

	// phpcs:ignore
	protected function init_props( array $acf ) {
		$this->headline    = esc_textarea( $acf['headline'] );
		$this->subheadline = acf_esc_html( $acf['subheadline'] );
	}

	/**
	 * Generates the content's markup
	 */
	private function get_the_content(): string {
		$markup  = "<div class='col-10 py-3'>";
		$markup .= "<h2 class='fw-bold text-center fs-1'>{$this->headline}</h2><div class='fs-5'>{$this->subheadline}</div>";
		$markup .= '</div>';
		return $markup;
	}

	/**
	 * Generates the markup
	 */
	public function get_the_title_bar(): string {
		$container_class  = 'container mb-3 position-relative title-bar';
		$container_class .= $this->with_background ? ' with-background' : '';
		$markup           = "<section class='{$container_class}'>";
		$markup          .= "<div class='row justify-content-center py-5 my-3'>";
		$markup          .= $this->get_the_content();
		$markup          .= '</div></section>';
		return $markup;
	}

	/** Echoes the markup */
	public function the_title_bar() {
		echo $this->get_the_title_bar();
	}
}

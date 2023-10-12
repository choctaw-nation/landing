<?php
/**
 * The Title Bar (logical second section of pages)
 *
 * @package ChoctawNation
 * @since 0.2
 */

/** Generates the Title Bar (section 2) content */
class Title_Bar extends ACF_Generator {
	private string $headline;
	private string $subheadline;
	private bool $with_background;

	public function __construct( int $post_id, array $acf_fields, bool $with_background = true ) {
		$this->post_id         = $post_id;
		$this->with_background = $with_background;
		$this->init_props( $acf_fields );
	}

	protected function init_props( array $acf ) {
		$this->headline    = esc_textarea( $acf['headline'] );
		$this->subheadline = acf_esc_html( $acf['subheadline'] );
	}

	private function get_the_content(): string {
		$markup  = "<div class='col-10 py-3'>";
		$markup .= "<h2 class='fw-bold text-center'>{$this->headline}</h2>{$this->subheadline}";
		$markup .= '</div>';
		return $markup;
	}

	public function get_the_title_bar(): string {
		$container_class  = 'container mb-5 position-relative title-bar';
		$container_class .= $this->with_background ? ' with-background' : '';
		$markup           = "<section class='{$container_class}'>";
		$markup          .= "<div class='row justify-content-center py-5 my-3'>";
		$markup          .= $this->get_the_content();
		$markup          .= '</div></section>';
		return $markup;
	}

	public function the_title_bar() {
		echo $this->get_the_title_bar();
	}
}
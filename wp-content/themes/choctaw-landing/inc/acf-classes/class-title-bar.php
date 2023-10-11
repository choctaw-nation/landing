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

	protected function init_props( array $acf ) {
		$this->headline    = esc_textarea( $acf['headline'] );
		$this->subheadline = acf_esc_html( $acf['subheadline'] );
	}

	private function get_the_content(): string {
		$markup  = "<div class='col-10 py-3'>";
		$markup .= "<h2 class='fw-bold text-center'>{$this->headline}</h2>{$this->subheadline}";
		$markup .= '</div>';
	}

	public function get_the_title_bar(): string {
		$markup  = "<div id='title-bar' class='container mb-5 position-relative'>";
		$markup .= "<div class='row justify-content-center py-5 my-3'>";
		$markup .= $this->get_the_content();
		$markup .= '</div></div>';
		return $markup;
	}

	public function the_title_bar() {
		echo $this->get_the_title_bar();
	}
}
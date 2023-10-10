<?php
/**
 * Component Section Generator class
 *
 * @package ChoctawNation
 * @since 0.2
 */

/** Used to handle ACF markup */
class Two_Col_Section {
	private string $section_id;
	private string $headline;
	private string $subheadline;
	private array $cta;
	private array $img;
	private int $post_id;
	private bool $has_topography_bg;
	private bool $should_reverse;

	/** Inits the class
	 *
	 * @param int   $post_id the post id
	 * @param array $acf_fields the acf fields
	 * @param bool  $reverse whether to flip the row or not.
	 */
	public function __construct( int $post_id, array $acf_fields, $reverse = false ) {
		$this->post_id        = $post_id;
		$this->should_reverse = $reverse;
		$this->init_props( $acf_fields );
	}

	/** Sets the Class variables based on ACF fields
	 *
	 * @param array $acf the ACF fields
	 */
	private function init_props( array $acf ) {
		$this->headline          = $acf['headline'];
		$this->subheadline       = $acf['subheadline'];
		$this->cta               = $acf['cta'];
		$this->img               = $acf['img'];
		$this->section_id        = $acf['section_id'];
		$this->has_topography_bg = $acf['has_topography_bg'];
	}

	/** Generates the markup
	 *
	 * @return string the markup
	 */
	public function get_the_markup(): string {
		$section_class = $this->set_the_class( 'section' );
		$row_class     = $this->set_the_class( 'row' );
		$markup        = "<section class='{$section_class}' id='{$this->section_id}'>";
		$markup       .= "<div class='{$row_class}'>";
		$markup       .= $this->get_col_1();
		$markup       .= $this->get_col_2();
		$markup       .= '</div>';
		$markup       .= '</section>';
		return $markup;
	}

	private function set_the_class( string $el ) {
		$class = '';
		switch ( $el ) {
			case 'section':
				$class = 'container';
				if ( $this->has_topography_bg ) {
					$class .= ' offset-topo-bg';
				}
				break;
			case 'row':
				$class = 'row align-items-center pt-2 pb-5';
				if ( $this->should_reverse ) {
					$class .= ' flex-row-reverse';
				}
				break;
			case 'col-1':
				$class = 'col-12 col-lg-5';
				break;
			case 'col-2':
				$class = 'col-12 col-lg-7';
				break;
		}
		return $class;
	}

	private function get_col_1() {
		$col_1   = $this->set_the_class( 'col-1' );
		$markup  = "<div class='{$col_1}'>";
		$markup .= "<img class='w-100 my-5' src='{$this->img['src']}' alt='{$this->img['alt']}' />";
		$markup .= '</div>';
	}

	private function get_col_2() {
		$col_2   = $this->set_the_class( 'col-2' );
		$markup  = "<div class='{$col_2}'>";
		$markup .= "<div class='row position-relative'>";
		$markup .= "<div class='col-3 col-xl-2 d-none d-md-block'></div>";
		$markup .= $this->get_the_headline();
		$markup .= "<div class='col-3 col-xl-2 d-none d-md-block'><div class='vertical-line'></div></div>";
		$markup .= $this->get_the_subheadline();
		$markup .= '</div>';
		$markup .= '</div>';
	}

	private function get_the_headline() {
		$headline = esc_textarea( $this->headline );
		return "<div class='col-12 col-md-9 col-xl-10'><h2>{$headline}</h2></div>";
	}

	private function get_the_subheadline() {
		$subheadline = acf_esc_html( $this->subheadline );
		$markup      = "<div class='col-12 col-md-9 col-xl-10'><p>{$subheadline}</p>";
		$markup     .= $this->get_the_cta();
		$markup     .= '</div>';
	}

	private function get_the_cta() {
		$href = esc_url( $this->cta['url'] );
		$text = esc_textarea( $this->cta['text'] );

		// desktop
		$markup = "<p class='py-4 d-none d-md-block'><img src='/wp-content/uploads/2023/08/double-arrow.svg' class='arrow position-absolute' /><a href='{$href}' download class='arrow-link'>{$text}</a></p>";
		// mobile
		$markup .= "<p class='py-4 d-block d-md-none'><a href='{$href}' download class='btn-default'>{$text}</a></p>";
	}
}
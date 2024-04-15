<?php
/**
 * Component Section Generator class
 *
 * @package ChoctawNation
 * @subpackage ACF
 */

namespace ChoctawNation\ACF;

/** Used to handle ACF markup */
class Two_Col_Section extends Generator {
	/** Defines the wrapper element. Defaults to "section"
	 *
	 * @var string $wrapper_el
	 */
	protected string $wrapper_el;

	/**
	 * Main headline for the component.
	 *
	 * @var string $headline
	 */
	protected string $headline;

	/**
	 * Secondary headline or subheadline.
	 *
	 * @var string $subheadline
	 */
	protected string $subheadline;

	/**
	 * A flag indicating whether the component has a call-to-action (CTA).
	 *
	 * @var bool $has_cta
	 */
	protected bool $has_cta;

	/**
	 * An array of call-to-action elements or buttons.
	 *
	 * @var array $cta
	 */
	protected array $cta;

	/**
	 * A flag indicating whether the component layout should be reversed.
	 *
	 * @var bool $should_reverse
	 */
	protected bool $should_reverse;

	/**
	 * A flag indicating whether the component should use topography as the background.
	 *
	 * @var bool $has_topography_bg
	 */
	private bool $has_topography_bg;

	/** Inits the class
	 *
	 * @param int    $post_id the post id
	 * @param array  $acf_fields the acf fields
	 * @param string $wrapper_el [optional] a valid html element to set the wrapping element to (default: 'section')
	 */
	public function __construct( int $post_id, array $acf_fields, string $wrapper_el = 'section' ) {
		$this->post_id    = $post_id;
		$this->wrapper_el = $wrapper_el;
		$this->init_props( $acf_fields );
	}


	/** Sets the Class variables based on ACF fields
	 *
	 * @param array $acf the ACF fields
	 */
	protected function init_props( array $acf ) {
		if ( empty( $acf['image'] ) ) {
			$this->image = null;
		} else {
			$this->set_the_image( $acf['image'] );

		}
		$this->headline    = esc_textarea( $acf['headline'] );
		$this->subheadline = acf_esc_html( $acf['subheadline'] );
		$this->has_cta     = $acf['has_cta'];
		if ( $acf['has_cta'] ) {
			$this->cta = $acf['cta'];
		}
		$this->should_reverse    = $acf['should_reverse'];
		$this->has_topography_bg = $acf['has_topography_bg'];
	}

	/** Generates the markup
	 *
	 * @return string the markup
	 */
	public function get_the_markup(): string {
		$section_id    = $this->get_the_section_id();
		$section_class = $this->set_the_class( 'section' );
		$row_class     = $this->set_the_class( 'row' );
		$markup        = "<{$this->wrapper_el} class='{$section_class}' id='{$section_id}'><div class='container my-3 two-col'>";
		$markup       .= "<div class='{$row_class}'>";
		if ( $this->image ) {
			$markup .= $this->get_col_1();
		}
		$markup .= $this->get_col_2();
		$markup .= '</div>'; // end row
		$markup .= "</div></{$this->wrapper_el}>";
		return $markup;
	}

	/** A wrapper for the global 'cno_get_the_section_id' function */
	protected function get_the_section_id(): string {
		if ( function_exists( 'cno_get_the_section_id' ) ) {
			return cno_get_the_section_id( $this->headline );
		} else {
			$lowercase  = strtolower( $this->headline );
			$snake_case = preg_replace( '/\s+/', '-', $lowercase );
			return $snake_case;
		}
	}

	/**
	 * Outputs the HTML markup for the section.
	 * This method fetches the HTML markup using the 'get_the_markup' method
	 * and then echoes it to the output.
	 */
	public function the_section() {
		$markup = $this->get_the_markup();
		echo $markup;
	}

	/**
	 * Set the CSS class based on the element type.
	 *
	 * @param string $el - The element type ('section', 'row', 'col-1', 'col-2').
	 * @return string - The CSS class for the specified element type.
	 */
	protected function set_the_class( string $el ) {
		$class = '';
		switch ( $el ) {
			case 'section':
				$class = '';
				if ( $this->has_topography_bg ) {
					$class .= ' offset-topo-bg';
				}
				break;
			case 'row':
				$class = 'row align-items-center';
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



	/**
	 * Generate the markup for col-1 (column 1).
	 *
	 * @return string - The HTML markup for col-1.
	 */
	protected function get_col_1(): string {
		$col_1   = $this->set_the_class( 'col-1' );
		$markup  = "<div class='{$col_1}'>";
		$markup .= "<div class='ratio ratio-1x1 my-5'>";
		$markup .= $this->image->get_the_image( 'object-fit-cover' );
		$markup .= '</div>';
		$markup .= '</div>';
		return $markup;
	}

	/**
	 * Generate the markup for col-2 (column 2).
	 *
	 * @param string $col_class - Optional CSS class for the col-2 element.
	 * @return string - The HTML markup for col-2.
	 */
	protected function get_col_2( $col_class = '' ): string {
		$col_2           = empty( $col_class ) ? $this->set_the_class( 'col-2' ) : $col_class;
		$inner_row_class = $this->has_cta ? 'row position-relative' : 'row position-relative justify-content-md-end';
		$markup          = "<div class='{$col_2}'>";
		$markup         .= "<div class='{$inner_row_class}'>";
		if ( $this->has_cta ) {
			$markup .= "<div class='col-3 col-xl-2 d-none d-md-block'></div>";
		}
		$markup .= $this->get_the_headline();
		if ( $this->has_cta ) {
			$markup .= "<div class='col-3 col-xl-2 d-none d-md-block'><div class='vertical-line'></div></div>";
		}
		$markup .= $this->get_the_subheadline();
		$markup .= '</div>';
		$markup .= '</div>';
		return $markup;
	}

	/**
	 * Generate the HTML markup for the headline.
	 *
	 * @return string - The HTML markup for the headline.
	 */
	protected function get_the_headline(): string {
		return "<div class='col-12 col-md-9 col-xl-10'><h2 class='two-col__headline'>{$this->headline}</h2></div>";
	}

	/**
	 * Generate the HTML markup for the subheadline and optional CTA.
	 *
	 * @return string - The HTML markup for the subheadline and CTA.
	 */
	protected function get_the_subheadline(): string {
		$markup = "<div class='col-12 col-md-9 col-xl-10'><div class='two-col__subheadline fs-6'>{$this->subheadline}</div>";
		if ( $this->has_cta ) {
			$markup .= $this->get_the_cta();
		}
		$markup .= '</div>';
		return $markup;
	}

	/**
	 * Generate the HTML markup for the Call to Action (CTA) element.
	 *
	 * @return string - The HTML markup for the CTA.
	 */
	protected function get_the_cta(): string {
		$href   = esc_url( $this->cta['url'] );
		$text   = esc_textarea( $this->cta['title'] );
		$target = $this->cta['target'];
		// desktop
		$markup = "<p class='py-4 d-none d-md-block'><img src='/wp-content/uploads/2023/08/double-arrow.svg' class='arrow position-absolute' loading='lazy' aria-hidden='true' alt='' />";

		$desktop_link_class = 'arrow-link fs-5 fw-medium z-1';
		$markup            .= "<a href='{$href}' class='{$desktop_link_class}'" . ( empty( $target ) ? '' : "target='{$target}'" ) . ">{$text}</a></p>";
		// mobile
		$mobile_link_class = 'btn-default fs-6';
		$markup           .= "<p class='py-4 d-block d-md-none'><a href='{$href}' class='{$mobile_link_class}'" . ( empty( $target ) ? '' : "target='{$target}'" ) . ">{$text}</a></p>";
		return $markup;
	}
}

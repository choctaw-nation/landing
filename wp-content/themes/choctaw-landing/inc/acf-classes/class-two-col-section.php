<?php
/**
 * Component Section Generator class
 *
 * @package ChoctawNation
 * @since 0.2
 */

/** Used to handle ACF markup */
class Two_Col_Section extends ACF_Generator {
	/** Defines the wrapper element. Defaults to "section"
	 *
	 * @var string $wrapper_el
	 */
	private string $wrapper_el;

	/**
	 * Main headline for the component.
	 *
	 * @var string $headline
	 */
	private string $headline;

	/**
	 * Secondary headline or subheadline.
	 *
	 * @var string $subheadline
	 */
	private string $subheadline;

	/**
	 * A flag indicating whether the component has a call-to-action (CTA).
	 *
	 * @var bool $has_cta
	 */
	private bool $has_cta;

	/**
	 * An array of call-to-action elements or buttons.
	 *
	 * @var array $cta
	 */
	private array $cta;

	/**
	 * A flag indicating whether the component should use topography as the background.
	 *
	 * @var bool $has_topography_bg
	 */
	private bool $has_topography_bg;

	/**
	 * A flag indicating whether the component layout should be reversed.
	 *
	 * @var bool $should_reverse
	 */
	private bool $should_reverse;

	/**
	 * A flag indicating whether the image should span the full width of the component.
	 *
	 * @var bool $img_is_full_width
	 */
	private bool $img_is_full_width;

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
		$this->set_the_image( $acf['image'] );
		$this->headline    = esc_textarea( $acf['headline'] );
		$this->subheadline = acf_esc_html( $acf['subheadline'] );
		$this->has_cta     = $acf['has_cta'];
		if ( $acf['has_cta'] ) {
			$this->cta = $acf['cta'];
		}
		$this->should_reverse    = $acf['should_reverse'];
		$this->img_is_full_width = $acf['is_image_full_width'];
		$this->has_topography_bg = $acf['has_topography_bg'];
	}

	/** Generates the markup
	 *
	 * @return string the markup
	 */
	public function get_the_markup(): string {
		$section_id = $this->get_the_section_id();
		if ( $this->img_is_full_width ) {
			$bg_img  = $this->image->src;
			$markup  = "<{$this->wrapper_el} id='{$section_id}' class='container-fluid py-5 two-col two-col--full-width' style='background-image:url({$bg_img})'>";
			$markup .= "<div class='container pt-5'><div class='row-py-5'>";
			$markup .= $this->get_fullwidth_content_col();
			$markup .= '</div>';
		} else {
			$section_class = $this->set_the_class( 'section' );
			$row_class     = $this->set_the_class( 'row' );
			$markup        = "<{$this->wrapper_el} class='{$section_class}' id='{$section_id}'>";
			$markup       .= "<div class='{$row_class}'>";
			$markup       .= $this->get_col_1();
			$markup       .= $this->get_col_2();
		}
		$markup .= '</div>';
		$markup .= "</{$this->wrapper_el}>";
		return $markup;
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
	private function set_the_class( string $el ) {
		$class = '';
		switch ( $el ) {
			case 'section':
				$class = 'container two-col';
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

	/**
	 * Generate the section ID based on the headline.
	 *
	 * @return string - The section ID generated from the headline.
	 */
	private function get_the_section_id(): string {
		$lowercase  = strtolower( $this->headline );
		$snake_case = preg_replace( '/\s+/', '-', $lowercase );
		return $snake_case;
	}

	/**
	 * Generate the markup for col-1 (column 1).
	 *
	 * @return string - The HTML markup for col-1.
	 */
	private function get_col_1(): string {
		$col_1   = $this->set_the_class( 'col-1' );
		$markup  = "<div class='{$col_1}'>";
		$markup .= $this->image->get_the_image( 'w-100 my-5' );
		$markup .= '</div>';
		return $markup;
	}

	/**
	 * Generate the markup for col-2 (column 2).
	 *
	 * @param string $col_class - Optional CSS class for the col-2 element.
	 * @return string - The HTML markup for col-2.
	 */
	private function get_col_2( $col_class = '' ): string {
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
	 * Generate the markup for the full-width content column.
	 *
	 * @return string - The HTML markup for the full-width content column.
	 */
	private function get_fullwidth_content_col(): string {
		$markup  = "<div class='col-12 col-xl-7'>";
		$markup .= $this->get_inner_row_1();
		$markup .= $this->get_inner_row_2();
		$markup .= '</div>';
		return $markup;
	}

	/**
	 * Generate the HTML markup for the headline.
	 *
	 * @param bool $is_fullwidth - Optional flag for full-width layout.
	 * @return string - The HTML markup for the headline.
	 */
	private function get_the_headline( bool $is_fullwidth = false ): string {
		if ( $is_fullwidth ) {
			return "<div class='col-9 col-lg-10'>
			<h2 class='text-light'>{$this->headline}</h2>
		</div>";
		} else {
			return "<div class='col-12 col-md-9 col-xl-10'><h2>{$this->headline}</h2></div>";
		}
	}

	/**
	 * Generate the HTML markup for the subheadline and optional CTA.
	 *
	 * @return string - The HTML markup for the subheadline and CTA.
	 */
	private function get_the_subheadline(): string {
		$markup = "<div class='col-12 col-md-9 col-xl-10'><div class='two-col__subheadline'>{$this->subheadline}</div>";
		if ( $this->has_cta ) {
			$markup .= $this->get_the_cta();
		}
		$markup .= '</div>';
		return $markup;
	}

	/**
	 * Generate the HTML markup for the Call to Action (CTA) element.
	 *
	 * @param bool $is_fullwidth - Optional flag for full-width layout.
	 * @return string - The HTML markup for the CTA.
	 */
	private function get_the_cta( bool $is_fullwidth = false ): string {
		$href   = esc_url( $this->cta['url'] );
		$text   = esc_textarea( $this->cta['title'] );
		$target = $this->cta['target'];

		if ( $is_fullwidth ) {
			$markup = "<p class='py-4 d-none d-md-block text-light'><img src='/wp-content/uploads/2023/08/double-arrow.svg' class='arrow arrow-white position-absolute' />";
		} else {
			// desktop
			$markup = "<p class='py-4 d-none d-md-block'><img src='/wp-content/uploads/2023/08/double-arrow.svg' class='arrow position-absolute' />";
		}

		$desktop_link_class = $is_fullwidth ? 'arrow-link arrow-link-white' : 'arrow-link';
		$markup            .= "<a href='{$href}' download class='{$desktop_link_class}'" . ( empty( $target ) ? '' : "target='{$target}'" ) . ">{$text}</a></p>";
		// mobile
		$mobile_link_class = $is_fullwidth ? 'btn-secondary' : 'btn-default';
		$markup           .= "<p class='py-4 d-block d-md-none'><a href='{$href}' download class='{$mobile_link_class}'" . ( empty( $target ) ? '' : "target='{$target}'" ) . ">{$text}</a></p>";
		return $markup;
	}

	/** For use inside of full-width sections */
	private function get_inner_row_1(): string {
		$markup  = '<div class="position-relative row">';
		$markup .= '<div class="col-3 col-lg-2 d-none d-md-block"></div>';
		$markup .= $this->get_the_headline( true );
		$markup .= '</div>';
		return $markup;
	}

	/** For use inside of full-width sections */
	private function get_inner_row_2(): string {
		$markup  = '<div class="row position-relative"><div class="col-3 col-lg-2 d-none d-md-block"><div class="vertical-line vertical-line-white"></div></div>';
		$markup .= '<div class="col-9 col-lg-10">';
		$markup .= "<div class='two-col__subheadline'>{$this->subheadline}</div>";
		if ( $this->has_cta ) {
			$markup .= $this->get_the_cta( true );
		}
		$markup .= '</div>';
		$markup .= '</div>';
		return $markup;
	}
}
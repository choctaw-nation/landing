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

	/**
	 * Whether or not the section has needs a modal added.
	 *
	 * @var bool $has_modal
	 */
	public bool $has_modal;

	/**
	 * The modal generator object.
	 *
	 * @var Modal_Generator $modal
	 */
	private Modal_Generator $modal;

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
			$this->set_the_image( $acf['image'], 'two-col' );

		}
		$this->headline    = esc_textarea( $acf['headline'] );
		$this->subheadline = acf_esc_html( $acf['subheadline'] );
		$this->has_cta     = $acf['has_cta'];
		if ( $acf['has_cta'] ) {
			$this->cta = $acf['cta'] ?? array();
			if ( isset( $acf['has_modal'] ) ) {
				$this->has_modal = $acf['has_modal'];
				if ( $this->has_modal ) {
					$this->modal = new Modal_Generator( $acf['modal_settings'] );
				}
			} else {
				$this->has_modal = false;
			}
		} else {
			$this->cta       = array();
			$this->has_modal = false;
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
		$markup        = "<{$this->wrapper_el} class='{$section_class}' id='{$section_id}'><div class='container two-col'>";
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
		return cno_get_the_section_id( $this->headline );
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
				$class = 'row align-items-center row-gap-3';
				if ( $this->should_reverse ) {
					$class .= ' flex-row-reverse';
				}
				break;
			case 'col-1':
				$class = 'col-12 col-lg-5';
				break;
			case 'col-2':
				$class = 'col';
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
		$markup .= "<div class='ratio ratio-1x1 mb-0'>";
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
		$inner_row_class = $this->has_cta ? 'row position-relative' : 'row position-relative justify-content-lg-end';
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
		return "<div class='col-12 col-md-9 col-xl-10 flex-grow-1'><h2 class='two-col__headline'>{$this->headline}</h2></div>";
	}

	/**
	 * Generate the HTML markup for the subheadline and optional CTA.
	 *
	 * @return string - The HTML markup for the subheadline and CTA.
	 */
	protected function get_the_subheadline(): string {
		$markup = "<div class='col-12 col-md-9 col-xl-10 flex-grow-1'><div class='two-col__subheadline fs-6'>{$this->subheadline}</div>";
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
		ob_start();
		get_template_part( 'template-parts/ui/content', 'double-arrow' );
		$double_arrow_content = ob_get_clean();
		$markup               = "<div class='mt-4 d-none d-md-block'><figure class='mb-0 arrow position-absolute'>{$double_arrow_content}</figure>";
		$markup              .= $this->get_the_link( 'desktop' );
		$markup              .= '</div>';
		$markup              .= "<div class='mt-4 d-block d-md-none'>";
		$markup              .= $this->get_the_link( 'mobile' );
		$markup              .= '</div>';
		return $markup;
	}

	/**
	 * Generate the HTML markup for the link element.
	 *
	 * @param string $type The type of link ('desktop' or 'mobile').
	 * @return string The HTML markup for the link.
	 */
	private function get_the_link( string $type ): string {
		$link_attributes = $this->get_the_attributes();
		$text            = $this->has_modal ? $this->modal->modal_trigger_text : esc_textarea( $this->cta['title'] );
		$element         = $this->has_modal ? 'button' : 'a';
		$link_classes    = array(
			'desktop' => 'arrow-link fs-5 fw-medium z-1',
			'mobile'  => 'btn btn-outline-primary pb-2 fs-6',
		);
		if ( $this->has_modal ) {
			$link_classes['desktop'] .= ' border-0 bg-transparent fw-medium text-primary';
		}
		return "<{$element} class='{$link_classes[$type]}'{$link_attributes}>{$text}</{$element}>";
	}

	/**
	 * Generate the HTML markup for the link attributes.
	 *
	 * @return string The HTML markup for the link attributes.
	 */
	private function get_the_attributes(): string {
		$link_attributes = array();
		if ( $this->has_modal ) {
			$link_attributes['role']                = 'button';
			$link_attributes['data-bs-toggle']      = 'modal';
			$link_attributes['data-bs-target']      = '#the-modal';
			$link_attributes['data-modal-title']    = $this->modal->modal_title;
			$link_attributes['data-modal-headline'] = $this->modal->headline;
			$link_attributes['data-modal-content']  = $this->modal->modal_content;
			$link_attributes['data-modal-video']    = $this->modal->video;

		} else {
			$link_attributes['href']   = user_trailingslashit( esc_url( $this->cta['url'] ) );
			$link_attributes['target'] = $this->cta['target'];
		}
		$attributes_str = '';
		foreach ( $link_attributes as $attr => $value ) {
			$attributes_str .= " {$attr}='" . esc_attr( $value ) . "'";
		}
		return $attributes_str;
	}
}
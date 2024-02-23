<?php
/**
 * Component Section Generator class
 *
 * @package ChoctawNation
 * @subpackage ACF
 */

namespace ChoctawNation\ACF;

/** Used to handle ACF markup */
class Full_Width_Section extends Two_Col_Section {
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
		$this->should_reverse = $acf['should_reverse'];
	}

	/** Generates the markup
	 *
	 * @return string the markup
	 */
	public function get_the_markup(): string {
		$section_id = cno_get_the_section_id( $this->headline );
		$bg_img     = $this->image->src;
		$markup     = "<{$this->wrapper_el} id='{$section_id}' class='container-fluid py-5 two-col two-col--full-width' style='background-image:url({$bg_img})'>";
		$markup    .= "<div class='container pt-5'><div class='row py-5'>";
		$markup    .= $this->get_fullwidth_content_col();
		$markup    .= '</div></div>';
		$markup    .= "</{$this->wrapper_el}>";
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

	/** For use inside of full-width sections */
	protected function get_inner_row_1(): string {
		$markup = '<div class="position-relative row">';
		if ( $this->has_cta ) {
			$markup .= '<div class="col-3 col-lg-2 d-none d-md-block"></div>';
		}
		$markup .= $this->get_the_headline();
		$markup .= '</div>';
		return $markup;
	}

	/**
	 * Generate the HTML markup for the headline.
	 *
	 * @return string - The HTML markup for the headline.
	 */
	protected function get_the_headline(): string {
		return "<div class='col-9 col-lg-10'><h2 class='text-light'>{$this->headline}</h2></div>";
	}

	/** For use inside of full-width sections */
	protected function get_inner_row_2(): string {
		$markup = '<div class="row position-relative">';
		if ( $this->has_cta ) {
			$markup .= '<div class="col-3 col-lg-2 d-none d-md-block"><div class="vertical-line vertical-line-white"></div></div>';
		}
		$markup .= '<div class="col-9 col-lg-10">';
		$markup .= "<div class='two-col__subheadline fs-6'>{$this->subheadline}</div>";
		if ( $this->has_cta ) {
			$markup .= $this->get_the_cta();
		}
		$markup .= '</div>';
		$markup .= '</div>';
		return $markup;
	}

	/**
	 * Generate the HTML markup for the Call to Action (CTA) element.
	 *
	 * @return string - The HTML markup for the CTA.
	 */
	protected function get_the_cta(): string {
		$href               = esc_url( $this->cta['url'] );
		$text               = esc_textarea( $this->cta['title'] );
		$target             = $this->cta['target'];
		$markup             = "<p class='py-4 d-none d-md-block text-light'><img src='/wp-content/uploads/2023/08/double-arrow.svg' class='arrow arrow-white position-absolute' loading='lazy' aria-hidden='true' />";
		$desktop_link_class = 'arrow-link arrow-link-white fw-medium fs-5 z-1';
		$markup            .= "<a href='{$href}' class='{$desktop_link_class}'" . ( empty( $target ) ? '' : "target='{$target}'" ) . ">{$text}</a></p>";
		// mobile
		$mobile_link_class = 'btn-secondary';
		$markup           .= "<p class='py-4 d-block d-md-none'><a href='{$href}' class='{$mobile_link_class} d-inline-block'" . ( empty( $target ) ? '' : "target='{$target}'" ) . ">{$text}</a></p>";
		return $markup;
	}
}

<?php
/**
 * Room Types Cards
 *
 * @package ChoctawNation
 * @subpackage ACF
 */

namespace ChoctawNation\ACF;

/** Extends & overwrites the Card class API with different content */
class Room_Types extends Card {
	/** Toggles "Make Reservations" CTA
	 *
	 * @var bool $can_reserve
	 */
	private bool $can_reserve;

	/** Inits acf fields to class props
	 *
	 * @param array $acf the acf array
	 */
	protected function init_props( array $acf ) {
		$this->set_the_image( $acf['image'] );
		$this->headline    = esc_textarea( $acf['headline'] );
		$this->subheadline = acf_esc_html( $acf['subheadline'] );
		$this->can_reserve = false;
	}

	/** Generates the markup
	 *
	 * @param string $col_class the column class
	 * @param string $headline_element [optional] the Headline element (Default 'h3')
	 */
	protected function get_the_markup( string $col_class, string $headline_element = 'h3' ): string {
		$col_id  = cno_get_the_section_id( $this->headline );
		$markup  = "<div class='{$col_class} room-type' id='{$col_id}'>";
		$markup .= '<div class="row align-items-center">';
		$markup .= '<div class="col-12 col-lg-5 col-xl-12">';
		$markup .= $this->image->get_the_image( 'room-type__image' );
		$markup .= '</div>'; // close col
		$markup .= $this->get_the_content();
		$markup .= '</div>'; // close row
		$markup .= '</div>'; // close room-type
		return $markup;
	}

	/**
	 *  Generates the body of the card
	 *
	 * @param string $headline_element [optional] the Headline element (Default 'h3')
	 */
	protected function get_the_content( string $headline_element = 'h3' ): string {
		$markup  = "<div class='col-12 col-lg-7 col-xl-12 pt-3 pb-5'>";
		$markup .= "<div class='row position-relative justify-content-end justify-content-md-start'>";
		if ( $this->can_reserve ) {
			$markup .= '<div class="col-3 col-xxl-2 d-none d-md-block"></div>';
		}
		$markup .= "<div class='col-12 col-md-9'><{$headline_element} class='room-type__headline fs-2'>{$this->headline}</{$headline_element}></div>";
		if ( $this->can_reserve ) {
			$markup .= "<div class='col-3 col-xxl-2 d-none d-md-block'><div class='vertical-line-rooms'></div></div>";
		}
		$markup .= "<div class='col-12 col-md-9'><div class='room-type__subheadline fs-6'>{$this->subheadline}</div>";
		if ( $this->can_reserve ) {
			$markup .= "
			<p class='py-2 d-none d-md-block'>
			  <img src='/wp-content/uploads/2023/08/double-arrow.svg' class='arrow position-absolute' />
			  <a href='#' download class='arrow-link'>Make Reservations</a>
		    </p>
			<p class='py-2 d-block d-md-none'><a href='#' download class='btn-default'>Make Reservations</a></p>";
		}
		$markup .= '</div>'; // close subheadline col
		$markup .= '</div>'; // close row
		$markup .= '</div>'; // close col
		return $markup;
	}
}

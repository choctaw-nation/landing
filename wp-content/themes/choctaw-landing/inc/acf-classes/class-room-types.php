<?php
/**
 * Room Types Cards
 *
 * @package ChoctawNation
 * @since 0.2
 */

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
		$this->headline    = $acf['headline'];
		$this->subheadline = $acf['subheadline'];
		$this->can_reserve = $acf['can_reserve'];
	}

	/** Generates the markup */
	protected function get_the_markup(): string {
		$markup  = "<div class='col-12 col-xl-6 pt-3 pb-5 room-type'>";
		$markup .= '<div class="row align-items-center">';
		$markup .= '<div class="col-12 col-lg-5 col-xl-12">';
		$markup .= $this->image->get_the_image( 'room-type__image' );
		$markup .= '</div>'; // close col
		$markup .= $this->get_the_content();
		$markup .= '</div>'; // close row
		$markup .= '</div>'; // close room-type
		return $markup;
	}

	/** Generates the body of the card */
	protected function get_the_content(): string {
		$markup  = "<div class='col-12 col-lg-7 col-xl-12 pt-3 pb-5'>";
		$markup .= "<div class='row position-relative justify-content-end justify-content-md-start'>";
		if ( $this->can_reserve ) {
			$markup .= '<div class="col-3 col-xxl-2 d-none d-md-block"></div>';
		}
		$markup .= "<div class='col-12 col-md-9 py-3'><h3 class='room-type__headline'>{$this->headline}</h3></div>";
		if ( $this->can_reserve ) {
			$markup .= "<div class='col-3 col-xxl-2 d-none d-md-block'><div class='vertical-line-rooms'></div></div>";
		}
		$markup .= "<div class='col-12 col-md-9'><div class='room-type__subheadline'>{$this->subheadline}</div>";
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
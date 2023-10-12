<?php
/**
 * Generates a Simple Card Layout
 *
 * @package ChoctawNation
 * @since 0.2
 */

/** Generates a Card (Vertical image with title & subheadline) */
class Card extends ACF_Generator {
	/** The headline
	 *
	 * @var string $headline
	 */
	protected string $headline;

	/** The subheadline
	 *
	 * @var string $subheadline
	 */
	protected string $subheadline;

	/** Inits acf fields to class props
	 *
	 * @param array $acf the acf array
	 */
	protected function init_props( array $acf ) {
		$this->set_the_image( $acf['image'] );
		$this->headline    = $acf['headline'];
		$this->subheadline = $acf['subheadline'];
	}

	/** Generates the markup */
	protected function get_the_markup(): string {
		$markup  = "<div class='col-12 col-md-6 col-xl-3 p-3 card'>";
		$markup .= $this->image->get_the_image( 'pb-3 card__image' );
		$markup .= $this->get_the_content();
		$markup .= '</div>';
		return $markup;
	}

	/** Echoes the markup of the card */
	public function the_card() {
		$markup = $this->get_the_markup();
		echo $markup;
	}

	/**
	 * Generates the body of the card
	 */
	protected function get_the_content(): string {
		$markup  = "<h3 class='card__headline'>{$this->headline}</h3>";
		$markup .= "<div class='card__subheadline'>{$this->subheadline}</div>";
		return $markup;
	}
}
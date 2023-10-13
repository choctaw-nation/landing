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

	/** Generates the markup
	 *
	 * @param string $col_class the column class
	 * @param string $headline_element [optional] the Headline element (Default 'h3')
	 */
	protected function get_the_markup( string $col_class, string $headline_element = 'h3' ): string {
		$markup  = "<div class='{$col_class} card'>";
		$markup .= $this->image->get_the_image( 'pb-3 card__image' );
		$markup .= $this->get_the_content( $headline_element );
		$markup .= '</div>';
		return $markup;
	}

	/** Echoes the markup of the card
	 *
	 * @param string $col_class the column class
	 * @param string $headline_element [optional] the Headline element (Default 'h3')
	 */
	public function the_card( string $col_class, string $headline_element = 'h3' ) {
		$markup = $this->get_the_markup( $col_class, $headline_element );
		echo $markup;
	}

	/**
	 * Generates the body of the card
	 *
	 * @param string $headline_element [optional] the Headline element (Default 'h3')
	 */
	protected function get_the_content( string $headline_element = 'h3' ): string {
		$markup  = "<{$headline_element} class='card__headline'>{$this->headline}</{$headline_element}>";
		$markup .= "<div class='card__subheadline'>{$this->subheadline}</div>";
		return $markup;
	}
}
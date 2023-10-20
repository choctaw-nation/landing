<?php
/**
 * Restaurant Highlight (Card)
 *
 * @package ChoctawNation
 * @since 0.2
 */

class Restaurant_Highlight extends Card {
	private int $price;
	private string|bool $genre;

	protected function init_props( array $acf ) {
		$this->set_the_image( $acf['image'] );
		$this->headline    = esc_textarea( $acf['headline'] );
		$this->subheadline = acf_esc_html( $acf['subheadline'] );
		$this->price       = absint( $acf['price'] );
		$this->genre       = esc_textarea( $acf['food_genre'] );
	}

	/**
	 * Generates the body of the card
	 *
	 * @param string $headline_element [optional] the Headline element (Default 'h3')
	 */
	protected function get_the_content( string $headline_element = 'h3' ): string {
		$markup  = "<{$headline_element} class='card__headline'>{$this->headline}</{$headline_element}>";
		$markup .= "<div class='card__subheadline'>{$this->subheadline}</div>";
		if ( $this->price || $this->genre ) {
			$markup .= '<hr class="my-4" /><div class="row">';
			$markup .= $this->genre ? "<div class='col'>{$this->genre}</div>" : '';
			$markup .= $this->price ? $this->get_the_price() : '';
			$markup .= '</div>';
		}
		return $markup;
	}

	/** Generates the price markup */
	private function get_the_price(): string {
		$grey_dollars = 4 - $this->price;
		$markup       = "<div class='col'>";
		$markup      .= $this->get_the_dollar_signs( $this->price );
		$markup      .= $this->get_the_dollar_signs( $grey_dollars, true );
		$markup      .= '</div>';
		return $markup;
	}

	/** Generates the appropriate number of dollar sign icons and handles opacity
	 *
	 * @param int  $num_icons the number of icons to generate
	 * @param bool $opaque toggles the `opacity-25` class
	 */
	private function get_the_dollar_signs( int $num_icons, bool $opaque = false ): string {
		$opacity = $opaque ? ' opacity-25' : '';
		$dollars = '';
		for ( $i = 0; $i < $num_icons; $i++ ) {
			$dollars .= "<i class='fas fa-dollar-sign{$opacity}'></i>";
		}
		return $dollars;
	}
}
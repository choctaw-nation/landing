<?php
/**
 * Restaurant Highlight (Card)
 *
 * @package ChoctawNation
 * @subpackage ACF
 */

namespace ChoctawNation\ACF;

/** A Card that highlights a Restaurant */
class Restaurant_Highlight extends Card {
	/** The genre of the restaurant
	 *
	 * @var string|bool $genre
	 */
	private $genre;

	/**
	 * The Hours of operation
	 *
	 * @var ?array $hours
	 */
	private ?array $hours;

	// phpcs:ignore
	protected function init_props( array $acf ) {
		$this->set_the_image( $acf['image'] );
		$this->headline    = esc_textarea( $acf['headline'] );
		$this->subheadline = acf_esc_html( $acf['subheadline'] );
		$this->hours       = empty( $acf['hours'] ) ? null : $acf['hours'];
		$this->genre       = esc_textarea( $acf['food_genre'] );
	}

	/** Generates the markup
	 *
	 * @param string $col_class the column class
	 * @param string $headline_element [optional] the Headline element (Default 'h3')
	 */
	protected function get_the_markup( string $col_class, string $headline_element = 'h3' ): string {
		$id      = $this->get_the_id();
		$markup  = "<div class='{$col_class} card' id='{$id}'>";
		$markup .= "<div class='ratio ratio-1x1'>";
		$markup .= $this->image->get_the_image( 'pb-3 card__image' );
		$markup .= '</div>';
		$markup .= $this->get_the_content( $headline_element );
		$markup .= '</div>';
		return $markup;
	}

	/**
	 * Generates the body of the card
	 *
	 * @param string $headline_element [optional] the Headline element (Default 'h3')
	 */
	protected function get_the_content( string $headline_element = 'h3' ): string {
		$markup  = "<{$headline_element} class='card__headline fs-3'>{$this->headline}</{$headline_element}>";
		$markup .= "<div class='card__subheadline fs-6'>{$this->subheadline}</div>";
		if ( $this->genre ) {
			$markup .= '<hr class="my-4" /><div class="card__meta d-flex justify-content-between align-items-center">';
			$markup .= $this->genre ? "<span class='card__meta--genre d-inline-block'>{$this->genre}</span>" : '';
			$markup .= '</div>';
		}
		if ( $this->hours ) {
			$markup .= '<hr class="my-2" />';
			$markup .= $this->get_the_hours();
		}
		return $markup;
	}

	/**
	 * Generates the hours of operation
	 */
	private function get_the_hours(): string {
		$markup = '<div class="card__meta--hours"><h3 class="fs-6 fw-semibold text-white">Hours</h3>';
		foreach ( $this->hours as $hours ) {
			$markup .= "<span class='row w-100 justify-content-between'><span class='col-auto'>" . esc_textarea( $hours['days'] ) . ':</span>&nbsp;<span class="col-auto">' . esc_textarea( $hours['times'] ) . '</span></span>';
		}
		$markup .= '</div>';
		return $markup;
	}
}

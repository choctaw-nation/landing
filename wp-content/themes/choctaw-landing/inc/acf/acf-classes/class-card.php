<?php
/**
 * Generates a Simple Card Layout
 *
 * @package ChoctawNation
 * @subpackage ACF
 */

namespace ChoctawNation\ACF;

/** Generates a Card (Vertical image with title & subheadline) */
class Card extends Generator {
	/** The headline
	 *
	 * @var string $headline
	 */
	protected ?string $headline;

	/** The subheadline
	 *
	 * @var string $subheadline
	 */
	protected ?string $subheadline;

	/** Inits acf fields to class props
	 *
	 * @param array $acf the acf array
	 */
	protected function init_props( array $acf ) {
		$this->set_the_image( $acf['image'],'card' );
		$this->headline    = empty( $acf['headline'] ) ? null : esc_textarea( $acf['headline'] );
		$this->subheadline = empty( $acf['subheadline'] ) ? null : acf_esc_html( $acf['subheadline'] );
	}

	/** Generates the markup
	 *
	 * @param string $col_class the column class
	 * @param string $headline_element [optional] the Headline element (Default 'h3')
	 */
	protected function get_the_markup( string $col_class, string $headline_element = 'h3' ): string {
		$markup  = "<div class='{$col_class} card'" . ( $this->headline ? "id='{$this->get_the_id()}'" : '' ) . '>';
		$markup .= $this->image->get_the_image( 'pb-3 card__image' );
		$markup .= $this->get_the_content( $headline_element );
		$markup .= '</div>';
		return $markup;
	}

	/**
	 * Generates the id of the card
	 */
	protected function get_the_id(): string {
		if ( function_exists( 'cno_get_the_section_id' ) ) {
			return cno_get_the_section_id( $this->headline );
		} else {
			$lowercase  = strtolower( $this->headline );
			$snake_case = preg_replace( '/\s+/', '-', $lowercase );
			return $snake_case;
		}
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
		$markup  = "<{$headline_element} class='card__headline fs-3'>{$this->headline}</{$headline_element}>";
		$markup .= "<div class='card__subheadline fs-6'>{$this->subheadline}</div>";
		return $markup;
	}
}

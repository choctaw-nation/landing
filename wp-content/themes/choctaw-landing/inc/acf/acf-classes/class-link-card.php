<?php
/**
 * Extends the Card Layout to include clickable headlines or buttons
 *
 * @package ChoctawNation
 * @subpackage ACF
 */

namespace ChoctawNation\ACF;

/** Generates a Card (Vertical image with title & subheadline) */
class Link_Card extends Card {
	/** The link
	 *
	 * @var ?array $link
	 */
	protected ?array $link;

	/** Whether to include an anchor button
	 *
	 * @var bool $with_button
	 */
	private bool $with_button;

	/** The target attribute
	 *
	 * @var string $target
	 */
	private string $target;

	/** Inits acf fields to class props
	 *
	 * @param array $acf the acf array
	 */
	protected function init_props( array $acf ) {
		$this->set_the_image( $acf['image'] );
		$this->headline    = $acf['headline'];
		$this->subheadline = $acf['subheadline'];
		$this->link        = $acf['link'];
		if ( $acf['link'] ) {
			$this->target = $this->link['target'] ? " target='{$this->link['target']}'" : "target='{$this->link['target']}'";
		}
	}

	/** Generates the markup
	 *
	 * @param string $col_class the column class
	 * @param string $headline_element [optional] the Headline element (Default 'h3')
	 */
	protected function get_the_markup( string $col_class, string $headline_element = 'h3' ): string {
		$id      = $this->get_the_id();
		$markup  = "<div class='{$col_class} card' id='{$id}'>";
		$markup .= $this->image->get_the_image( 'pb-3 card__image' );
		$markup .= $this->get_the_content( $headline_element );
		if ( $this->with_button ) {
			$markup .= "<a href='{$this->link['url']}' class='btn btn-primary' {$this->target}>{$this->link['title']}</a>";
		}
		$markup .= '</div>';
		return $markup;
	}

	/** Echoes the markup of the card
	 *
	 * @param string $col_class the column class
	 * @param string $headline_element [optional] the Headline element (Default 'h3')
	 * @param bool   $with_button [optional] the Headline element (Default 'h3')
	 */
	public function the_card( string $col_class, string $headline_element = 'h3', bool $with_button = false ) {
		$this->with_button = $with_button;
		$markup            = $this->get_the_markup( $col_class, $headline_element );
		echo $markup;
	}

	/**
	 * Generates the body of the card
	 *
	 * @param string $headline_element [optional] the Headline element (Default 'h3')
	 */
	protected function get_the_content( string $headline_element = 'h3' ): string {
		$markup = "<{$headline_element} class='card__headline fs-3'>";
		if ( $this->link ) {
			$markup .= "<a href='{$this->link['url']}' {$this->target}>{$this->headline}</a>";
		} else {
			$markup .= $this->headline;
		}
		$markup .= "</{$headline_element}>";
		$markup .= "<div class='card__subheadline fs-6'>{$this->subheadline}</div>";
		return $markup;
	}
}

<?php
/**
 * Hero Section Class
 *
 * @package ChoctawNation
 * @since 0.2
 */

/**
 * Generates the Hero Section
 */
class Hero_Section extends ACF_Generator {
	private string $headline;
	private array $image;
	private string $srcset;
	private string $headline_position;

	protected function init_props( array $acf ) {
		$this->headline          = esc_textarea( $acf['headline'] );
		$this->image             = $acf['image'];
		$this->srcset            = wp_get_attachment_image_srcset( $this->image['ID'] );
		$this->headline_position = $acf['headline_position'];
	}

	public function get_the_hero(): string {
		$image    = "<img src='{$this->image['url']}' alt='{$this->image['alt']}' srcset='{$this->srcset}' class='w-100' />";
		$headline = "<h1 class='hero-headline {$this->headline_position}'><span class='hero-headline__line-1'>A place to</span><span class='hero-headline__line-2'>{$this->headline}</span></h1>";
		$markup   = "<header id='header-img' class='container-fluid gx-0 position-relative'>{$image}{$headline}</header>";
		return $markup;
	}
	public function the_hero() {
		echo $this->get_the_hero();
	}
}
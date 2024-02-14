<?php
/**
 * Hero Section Class
 *
 * @package ChoctawNation
 * @subpackage ACF
 */

namespace ChoctawNation\ACF;

/**
 * Generates the Hero Section
 */
class Hero_Section extends Generator {
	private string $headline;
	private string $headline_position;

	protected function init_props( array $acf ) {
		$this->headline = esc_textarea( $acf['headline'] );
		$this->set_the_image( $acf['image'] );
		$this->headline_position = $acf['headline_position'];
	}

	public function get_the_hero(): string {
		$headline = "<h1 class='hero-headline text-white text-uppercase d-flex flex-column position-absolute z-3 fw-normal {$this->headline_position}'><span class='hero-headline__line-1 ms-2 ms-sm-0'>A place to</span><span class='hero-headline__line-2'>{$this->headline}</span></h1>";
		$markup   = "<header id='header-img' class='hero container-fluid gx-0 position-relative'>{$this->image->get_the_image('w-100 h-100 object-fit-cover hero__image')}{$headline}</header>";
		return $markup;
	}
	public function the_hero() {
		echo $this->get_the_hero();
	}
}
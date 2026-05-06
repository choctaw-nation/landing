<?php
/**
 * Eat and Drink Content Sections
 *
 * @package ChoctawNation
 * @subpackage ACF
 */

namespace ChoctawNation\ACF;

/**
 * Eat and Drink Object
 */
class Eat_And_Drink {
	/**
	 * The sections
	 *
	 * @var \WP_Post[] $posts
	 */
	private array $posts;

	/**
	 * The layout
	 *
	 * @var string $layout
	 */
	private string $layout;

	/**
	 * The Featured Eat
	 *
	 * @var Featured_Eat $featured_eat
	 */
	private Featured_Eat $featured_eat;


	/**
	 * Eat_And_Drink constructor
	 *
	 * @param string     $layout the layout
	 * @param \WP_Post[] $posts the posts
	 */
	public function __construct( string $layout, array $posts ) {
		$this->layout = $layout;
		$this->posts  = $posts;
	}


	/**
	 * Returns the section
	 *
	 * @return string
	 */
	public function get_the_section(): string {
		$markup = '';
		$slides = '';
		foreach ( $this->posts as $index => $section ) {
			$should_reverse     = 0 === $index % 2;
			$this->featured_eat = new Featured_Eat( $section, $should_reverse );
			switch ( $this->layout ) {
				case 'two_column_row':
					$markup .= $this->get_the_row( $should_reverse );
					break;
				case 'containers':
					$slides .= $this->get_the_swiper_slides();
					break;
			}
		}
		if ( ! empty( $slides ) ) {
			$markup .= $this->get_the_swiper( $slides );
		}
		return $markup;
	}

	/**
	 * Echoes the section
	 */
	public function the_section() {
		echo $this->get_the_section();
	}

	/**
	 * Get the row
	 *
	 * @param bool $should_reverse whether to reverse the order of the columns
	 */
	private function get_the_row( $should_reverse ): string {
		$section_id = $this->featured_eat->get_the_section_id();
		$row_class  = 'row align-items-center row-gap-3';
		if ( $should_reverse ) {
			$row_class .= ' flex-row-reverse';
		}
		$markup  = "<section class='container two-col featured-eats' id='{$section_id}'>";
		$markup .= "<div class='{$row_class}'>";
		$markup .= $this->featured_eat->get_col_1();
		$markup .= $this->featured_eat->get_col_2();
		$markup .= '</div>';
		$markup .= '</section>';
		return $markup;
	}

	/**
	 * Get the swiper
	 *
	 * @param string $slides the slides
	 */
	private function get_the_swiper( string $slides ): string {
		$markup  = '<div id="containers" class="container-fluid blue-topo-bg py-5"><div class="container-fluid container-xl"><div class="row justify-content-center"><div class="col-1 position-relative"><div class="swiper-button-prev"></div></div><div class="col-10"><div class="swiper" id="restaurant-swiper"><div class="swiper-wrapper align-items-stretch">';
		$markup .= $slides;
		$markup .= '</div></div></div><div class="col-1 position-relative"><div class="swiper-button-next"></div></div></div><div class="row mt-5"><div class="col position-relative"><div class="swiper-pagination"></div></div></div></div></div>';
		return $markup;
	}

	/**
	 * Get the swiper slides
	 *
	 * @return string
	 */
	private function get_the_swiper_slides(): string {
		return $this->featured_eat->get_the_slide();
	}
}

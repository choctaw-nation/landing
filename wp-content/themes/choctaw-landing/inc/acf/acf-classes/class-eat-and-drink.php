<?php
/**
 * Eat and Drink Content Sections
 *
 * @package ChoctawNation
 * @subpackage ACF
 */

namespace ChoctawNation\ACF;

class Eat_And_Drink {
	/**
	 * ACF Fields
	 *
	 * @var array
	 */
	private $acf;

	public function __construct( array $acf ) {
		$this->acf = $acf;
	}

	public function get_the_sections() {
		$markup = '';
		foreach ( $this->acf as $section ) {
			$section = $section['acf_fc_layout'];
			switch ( $section ) {
				case 'two_column_row':
					$markup .= $this->get_the_row( $section['featured_eat_or_drink'] );
					break;
				case 'containers':
					$markup .= $this->get_the_swiper( $section['featured_eat_or_drink'] );
					break;
			}
		}
		return $markup;
	}

	public function the_sections() {
		echo $this->get_the_sections();
	}

	/**
	 * Get the row
	 *
	 * @param \WP_Post[] $posts the posts
	 */
	private function get_the_row( array $posts ) {}

	/**
	 * Get the swiper
	 *
	 * @param \WP_Post[] $posts the posts
	 */
	private function get_the_swiper( array $posts ) {}
}

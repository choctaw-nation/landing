<?php
/**
 * Featured Eat Post Type Class
 *
 * @package ChoctawNation
 * @subpackage ACF
 */

namespace ChoctawNation\ACF;

abstract class Featured_Eat {
	/**
	 * The post
	 *
	 * @var \WP_Post $post
	 */
	protected \WP_Post $post;

	/**
	 * The Headline
	 *
	 * @var string $headline
	 */
	protected string $headline;

	/**
	 * The menu link
	 *
	 * @var ?string $menu_link
	 */
	protected ?string $menu_link;

	/**
	 * The link to order online
	 *
	 * @var ?string $online_orders_link
	 */
	protected ?string $online_orders_link;

	/**
	 * The food genre of the restaurant
	 *
	 * @var ?string $food_genre
	 */
	protected ?string $food_genre;

	/**
	 * The hours of operation
	 *
	 * @var ?array $hours
	 */
	protected ?array $hours;

	/**
	 * Whether to reverse the order of the columns
	 *
	 * @var bool $should_reverse
	 */
	protected bool $should_reverse;

	/**
	 * The description
	 *
	 * @var string $description
	 */
	protected string $description;

	/** Sets the Class variables based on ACF fields
	 *
	 * @param \WP_Post $post the post
	 * @param bool     $should_reverse whether to reverse the order of the columns
	 */
	public function construct( \WP_Post $post, bool $should_reverse ) {
		$this->post           = $post;
		$this->headline       = get_the_title( $post );
		$this->should_reverse = $should_reverse;
		$this->init_props();
	}

	/** Inits the ACF properties */
	protected function init_props() {
		$this->description = acf_esc_html( get_field( 'description', $this->post ) );
		$meta              = get_field( 'meta_details', $this->post );
		$this->set_the_meta( $meta );
		$this->hours = empty( get_field( 'hours', $this->post ) ) ? null : get_field( 'hours', $this->post );
	}

	/** A wrapper for the global 'cno_get_the_section_id' function */
	protected function get_the_section_id(): string {
		if ( function_exists( 'cno_get_the_section_id' ) ) {
			return cno_get_the_section_id( $this->headline );
		} else {
			$lowercase  = strtolower( $this->headline );
			$snake_case = preg_replace( '/\s+/', '-', $lowercase );
			return $snake_case;
		}
	}

	/**
	 * Sets the meta details
	 *
	 * @param array $acf the ACF fields
	 */
	private function set_the_meta( array $acf ) {
		$this->menu_link          = empty( $acf['menu_link'] ) ? null : esc_url( $acf['menu_link'] );
		$this->online_orders_link = empty( $acf['online_orders_link'] ) ? null : esc_url( $acf['online_orders_link'] );
		$this->food_genre         = empty( $acf['food_genre'] ) ? null : esc_textarea( $acf['food_genre'] );
	}

	/** Generates the Eats Hours block */
	protected function get_the_hours(): string {
		if ( false === $this->hours ) {
			return '';
		}
		$total_blocks = count( $this->hours );
		$markup       = '<h3 class="fs-5">Hours</h3><ul class="dining-hours ps-0 mb-0 list-unstyled">';
		foreach ( $this->hours as $index => $hour_data ) {
			$markup_class  = 'dining-hours__rows fs-6 row justify-content-between';
			$markup_class .= ( $index === $total_blocks - 1 ) ? '' : ' mb-3';
			$markup       .= "<li class='{$markup_class}'>";
			$markup       .= isset( $hour_data['meals_label'] ) ? "<span class='dining-hours__label d-block col-12 fs-6 fw-semibold'>{$hour_data['meals_label']}</span>" : '';
			$markup       .= $this->get_the_hours_actual( $hour_data['hours'] );

			$markup .= '</li>';

		}
		$markup .= '</ul><hr class="my-3" />';
		return $markup;
	}

	private function get_the_hours_actual( array $hours_block ): string {
		$markup       = '';
		$markup_class = 'col-12 row justify-content-between';
		foreach ( $hours_block as $index => $hours ) {
			$markup .= "<div class='{$markup_class}'>";
			$markup .= "<span class='dining-hours__day col-auto fs-6'>" . esc_textarea( $hours['days'] ) . '</span>';
			$markup .= "<span class='dining-hours__time col-auto fs-6'>" . esc_textarea( $hours['times'] ) . '</span>';
			$markup .= '</div>';
		}
		return $markup;
	}
}

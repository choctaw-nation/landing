<?php
/**
 * Food & Beverage Specials
 *
 * @package ChoctawNation
 * @subpackage ACF
 */

namespace ChoctawNation\ACF;

use WP_Post;

/**
 * Food & Beverage Specials Object
 */
class FB_Specials {
	/**
	 * The post ID
	 *
	 * @var int $post_id
	 */
	private int $post_id;

	/**
	 * Whether or not this is food or drink special
	 *
	 * @var bool $is_food
	 */
	public bool $is_food;

	/**
	 * Constructor
	 *
	 * @param WP_Post $post the post
	 */
	public function __construct( WP_Post $post ) {
		$this->post_id = $post->ID;
		$this->is_food = get_field( 'is_food', $this->post_id );
	}

	/**
	 * Get the title
	 */
	public function get_the_title(): string {
		return get_the_title( $this->post_id );
	}

	/**
	 * Echo the title
	 */
	public function the_title(): void {
		echo $this->get_the_title();
	}

	/**
	 * Get the description
	 */
	public function get_the_description(): string {
		return acf_esc_html( get_field( 'description', $this->post_id ) );
	}

	/**
	 * Echoes The description
	 */
	public function the_description(): void {
		echo $this->get_the_description();
	}

	/**
	 * Get the price
	 */
	public function get_the_price(): string {
		return esc_textarea( get_field( 'price', $this->post_id ) );
	}

	/**
	 * Echoes the price
	 */
	public function the_price(): void {
		echo $this->get_the_price();
	}

	/**
	 * Get the date the special runs for
	 */
	public function get_the_date(): string {
		return esc_textarea( get_field( 'date', $this->post_id ) );
	}

	/**
	 * Echoes the date the special runs for
	 */
	public function the_date(): void {
		echo $this->get_the_date();
	}

	/**
	 * Get the image
	 *
	 * @param string     $size the image size
	 * @param array|null $args the image args
	 */
	public function get_the_image( string $size = 'full', ?array $args = null ): string {
		$image_args = array(
			'class'   => 'object-fit-cover w-100',
			'loading' => 'lazy',
		);
		return get_the_post_thumbnail( $this->post_id, $size, $args ?? $image_args );
	}

	/**
	 * Echoes the image
	 *
	 * @param string     $size the image size
	 * @param array|null $args the image args
	 */
	public function the_image( string $size = 'full', ?array $args = null ): void {
		echo $this->get_the_image( $size, $args );
	}
}
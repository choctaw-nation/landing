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
	 * Whether or not this post has an asset
	 *
	 * @var bool $has_asset
	 */
	private bool $has_asset;

	/**
	 * Constructor
	 *
	 * @param WP_Post $post the post
	 */
	public function __construct( WP_Post $post ) {
		$this->post_id   = $post->ID;
		$this->is_food   = get_field( 'is_food', $this->post_id );
		$this->has_asset = ! empty( get_field( 'asset', $this->post_id ) );
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
	public function get_the_description(): ?string {
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
	public function get_the_price(): ?string {
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
	 * Check if the post has an image
	 *
	 * @return bool
	 */
	public function has_image(): bool {
		return has_post_thumbnail( $this->post_id );
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
  
	/**
	 * Get the related posts
	 *
	 * @return array|null
	 */
	public function get_the_related_posts(): ?array {
		return get_field( 'related_post', $this->post_id );
	}

	/**
	 * Check if the post has an asset
	 *
	 * @return bool
	 */
	public function has_asset(): bool {
		return $this->has_asset;
	}

	/**
	 * Get the asset
	 *
	 * @return string
	 */
	public function get_the_asset(): string {
		if ( ! $this->has_asset ) {
			return '';
		}
		$url    = esc_url( get_field( 'asset', $this->post_id ) );
		$text   = esc_textarea( get_field( 'asset_label', $this->post_id ) );
		$markup = '<div>';
		// mobile
		$markup .= "<a href='{$url}' target='_blank' rel='noopener noreferrer' class='btn btn-outline-primary fs-6 d-lg-none'>{$text}</a>";
		// desktop
		$markup .= "<a href='{$url}' target='_blank' rel='noopener noreferrer' class='fs-5 fw-medium d-none d-lg-inline'>{$text}</a>";
		$markup .= '</div>';
		return $markup;
	}

	/**
	 * Echoes the asset
	 */
	public function the_asset(): void {
		echo $this->get_the_asset();
	}
}
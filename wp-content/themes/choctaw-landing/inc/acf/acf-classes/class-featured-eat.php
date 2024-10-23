<?php
/**
 * Featured Eat Post Type Class
 *
 * @package ChoctawNation
 * @subpackage ACF
 */

namespace ChoctawNation\ACF;

use WP_Post;

/**
 * Featured Eat Post Type Class.
 *
 * @param WP_Post $post the post
 * @param bool     $should_reverse whether to reverse the order of the columns
 */
class Featured_Eat {
	/**
	 * The post
	 *
	 * @var WP_Post $post
	 */
	protected WP_Post $post;

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

	/**
	 * Whether online orders are accepted
	 *
	 * @var bool $has_cta
	 */
	protected bool $has_cta;

	/**
	 * The classes for the col-2 content
	 *
	 * @var string $col_2_content_class
	 */
	protected string $col_2_content_class;

	/**
	 * The hero image
	 *
	 * @var ?Image $hero_image
	 */
	public ?Image $hero_image;

	/**
	 * The specials
	 *
	 * @var ?FB_Specials[] $specials
	 */
	public ?array $specials;

	/**
	 * Sets the Class variables based on ACF fields
	 *
	 * @param WP_Post $post the post
	 * @param bool    $should_reverse whether to reverse the order of the columns
	 */
	public function __construct( WP_Post $post, bool $should_reverse ) {
		$this->post           = $post;
		$this->headline       = get_the_title( $post );
		$this->should_reverse = $should_reverse;
		$this->init_props();
	}

	/** Inits the ACF properties */
	protected function init_props() {
		$this->description = acf_esc_html( get_field( 'description', $this->post ) );

		$this->hours      = empty( get_field( 'hours', $this->post ) ) ? null : get_field( 'hours', $this->post );
		$this->hero_image = empty( get_field( 'hero_image', $this->post ) ) ? null : new Image( get_field( 'hero_image', $this->post ) );
		$specials         = empty( get_field( 'related_specials', $this->post ) ) ? null : get_field( 'related_specials', $this->post );
		if ( $specials ) {
			foreach ( $specials as $special ) {
				$this->specials[] = new FB_Specials( $special );
			}
		} else {
			$this->specials = null;
		}
		$meta = get_field( 'meta_details', $this->post );
		$this->set_the_meta( $meta );
	}

	/** A wrapper for the global 'cno_get_the_section_id' function */
	public function get_the_section_id(): string {
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
		$this->menu_link           = empty( $acf['menu_link'] ) ? null : user_trailingslashit( esc_url( $acf['menu_link'] ) );
		$this->online_orders_link  = empty( $acf['online_orders_link'] ) ? null : user_trailingslashit( esc_url( $acf['online_orders_link'] ) );
		$this->food_genre          = empty( $acf['food_genre'] ) ? null : esc_textarea( $acf['food_genre'] );
		$this->has_cta             = ! empty( $acf['online_orders_link'] );
		$this->col_2_content_class = $this->has_cta || $this->specials ? 'col-md-9 col-xl-10' : 'col-12';
	}

	/**
	 * Generate the markup for col-1 (column 1).
	 */
	public function get_col_1(): string {
		$markup  = "<div class='col-12 col-lg-5'>";
		$markup .= "<div class='ratio ratio-1x1 w-100 my-5'>";
		$markup .= $this->get_the_image( 'featured-eats__image ' );
		$markup .= '</div>';
		$markup .= '</div>';
		return $markup;
	}

	/**
	 * Get the image
	 *
	 * @param string $img_class the image class
	 */
	private function get_the_image( $img_class = '' ): string {
		return get_the_post_thumbnail(
			$this->post,
			'full',
			array(
				'class'   => "{$img_class} object-fit-cover",
				'loading' => 'lazy',
			)
		);
	}

	/**
	 * Generate the markup for col-2 (column 2).
	 */
	public function get_col_2(): string {
		$markup          = "<div class='col-12 col-lg-7'>";
		$inner_row_class = $this->has_cta ? 'row position-relative' : 'row position-relative justify-content-lg-end';
		$markup         .= "<div class='{$inner_row_class}'>";
		if ( $this->has_cta ) {
			$markup .= "<div class='col-3 col-xl-2 d-none d-md-block'></div>";
		}
		$markup .= $this->get_the_header();
		if ( $this->has_cta || $this->specials ) {
			$markup .= "<div class='col-3 col-xl-2 d-none d-md-block'><div class='vertical-line'></div></div>";
		}
		$markup .= $this->get_the_body();
		$markup .= '</div>';
		$markup .= '</div>';
		return $markup;
	}

	/** Generates the Eats Hours block
	 *
	 * @param bool $with_title whether to include the title
	 * @return string
	 */
	public function get_the_hours( $with_title = true ): string {
		if ( false === $this->hours ) {
			return '';
		}
		$total_blocks = count( $this->hours );
		$markup       = '';
		if ( $with_title ) {
			$markup .= "<h3 class='fs-6 fw-semibold'>Hours</h3>";
		}
		$markup .= '<ul class="dining-hours ps-0 mb-0 list-unstyled">';
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

	/** Generates the actual hours markup
	 *
	 * @param array $hours_block the hours block
	 * @return string
	 * */
	private function get_the_hours_actual( array $hours_block ): string {
		$markup       = '';
		$markup_class = 'col-12 row justify-content-between';
		foreach ( $hours_block as  $hours ) {
			$markup .= "<div class='{$markup_class}'>";
			$markup .= "<span class='dining-hours__day col-auto fs-6'>" . esc_textarea( $hours['days'] ) . '</span>';
			$markup .= "<span class='dining-hours__time col-auto fs-6'>" . esc_textarea( $hours['times'] ) . '</span>';
			$markup .= '</div>';
		}
		return $markup;
	}

	/** Gets the section header (headline + subheadline) */
	public function get_the_header(): string {
		$col_class = $this->has_cta || $this->specials ? 'offset-md-3 offset-xl-2 col-md-9 col-xl-10' : 'col-12';
		$markup    = "<div class='{$col_class}'><h2>{$this->headline}</h2></div>";
		return $markup;
	}

	/** Gets the section body */
	public function get_the_body(): string {
		$markup  = "<div class='{$this->col_2_content_class}'>";
		$markup .= "<div class='row'><div class='col fs-6'>{$this->description}</div>";
		if ( $this->has_cta || $this->specials ) {
			$markup .= $this->get_the_cta();
		}
		$markup .= '</div>';
		if ( $this->has_cta || $this->specials ) {
			$markup .= '</div>';
		}
		$markup .= '<div class="row mt-3 mt-md-5">';
		$markup .= $this->get_the_menu();
		if ( $this->food_genre ) {
			$markup .= "<div class='col fs-6'>{$this->food_genre}</div>";
		}
		$markup .= '</div>';
		$markup .= '<hr class="my-3" />';
		$markup .= $this->get_the_hours();

		$markup .= '</div>';
		return $markup;
	}


	/** Returns the Menu link or null */
	public function get_the_menu_link(): ?string {
		return $this->menu_link;
	}

	/** Returns the Menu markup or an empty string */
	public function get_the_menu(): string {
		if ( ! $this->menu_link ) {
			return '';
		}
		return "<div class='col menu'><a class='featured-eats__menu-link fs-6' href='{$this->menu_link}' target='_blank' rel='noopener noreferrer'><i class='fa-solid fa-utensils fs-5'></i> Menu</a></div>";
	}


	/**
	 * Generate the HTML markup for the Call to Action (CTA) element.
	 *
	 * @return string - The HTML markup for the CTA.
	 */
	public function get_the_cta(): string {
		$markup  = $this->get_the_desktop_anchors();
		$markup .= $this->get_the_mobile_anchors();
		return $markup;
	}

	/**
	 * Generates the anchors markup for the desktop view
	 */
	public function get_the_desktop_anchors(): string {
		$markup = "<p class='py-4 d-none d-md-block'><img src='/wp-content/uploads/2023/08/double-arrow.svg' class='arrow position-absolute' loading='lazy' aria-hidden='true' />";
		$anchor = $this->get_the_anchor_settings();
		if ( $anchor['href'] && $anchor['text'] ) {
			$markup .= "<a href='{$anchor['href']}' class='arrow-link fs-5 fw-medium' target='{$anchor['target']}' rel='noopener noreferrer'>{$anchor['text']}</a>";
		}
		$markup .= '</p>';
		return $markup;
	}

	/**
	 * Get the anchor settings
	 *
	 * @return array
	 */
	private function get_the_anchor_settings(): array {
		$cta_options = array(
			'online_orders_link' => array(
				'href'   => $this->online_orders_link,
				'text'   => 'Order Online',
				'target' => '_blank',
			),
			'specials'           => array(
				'href'   => get_the_permalink( $this->post ),
				'text'   => 'View Specials',
				'target' => '_self',
			),
		);

		$href = null;
		$text = null;

		foreach ( $cta_options as $key => $option ) {
			if ( $this->$key ) {
				$href   = $option['href'];
				$text   = $option['text'];
				$target = $option['target'];
				break;
			}
		}
		return array(
			'href'   => $href,
			'text'   => $text,
			'target' => $target,
		);
	}

	/**
	 *  Generates the anchors markup for the mobile view
	 */
	public function get_the_mobile_anchors(): string {
		$markup = "<p class='py-4 d-block d-md-none'>";
		$anchor = $this->get_the_anchor_settings();
		if ( $anchor['href'] && $anchor['text'] ) {
			$markup .= "<a href='{$anchor['href']}' class='btn btn-outline-primary fs-6' target='{$anchor['target']}' rel='noopener noreferrer'>{$anchor['text']}</a>";
		}
		$markup .= '</p>';
		return $markup;
	}

	/**
	 * Get the slide (if used inside a swiper container)
	 *
	 * @return string
	 */
	public function get_the_slide(): string {
		$id      = $this->get_the_section_id();
		$markup  = "<div class='swiper-slide d-flex flex-column' id='{$id}'>";
		$markup .= "<div class='ratio ratio-1x1 pb-3 card__image-container'>";
		$markup .= $this->get_the_image( 'card__image' );
		$markup .= '</div>';
		$markup .= "<h2 class='card__headline text-white fs-3'>{$this->headline}</h2>";
		$markup .= "<div class='card__subheadline fs-6 mb-2'>{$this->description}</div>";
		if ( $this->food_genre ) {
			$markup .= '<hr class="my-4" /><div class="card__meta d-flex justify-content-between align-items-center">';
			$markup .= $this->food_genre ? "<span class='card__meta--genre d-inline-block'>{$this->food_genre}</span>" : '';
			$markup .= '</div>';
		}
		if ( $this->hours ) {
			$markup .= '<hr class="mt-auto mb-2" />';
			$markup .= $this->get_the_hours( false );
		}
		$markup .= '</div>';
		return $markup;
	}
}

<?php
/**
 * Featured Eats Content Generator
 * Based on Two Col Section
 *
 * @package ChoctawNation
 */

namespace ChoctawNation\ACF;

/** Used to handle ACF markup */
class Featured_Eats extends Two_Col_Section {
	/**
	 * Whether the restaurant has a menu
	 *
	 * @var bool $has_menu
	 */
	private bool $has_menu;

	/**
	 * The menu link
	 *
	 * @var string $menu_link
	 */
	private string $menu_link;

	/**
	 * Whether a user can order online
	 *
	 * @var bool $can_order_online
	 */
	private bool $can_order_online;

	/**
	 * The link to order online
	 *
	 * @var string $online_orders_link
	 */
	private string $online_orders_link;

	/**
	 * Whether a user can accept reservations
	 *
	 * @var bool $can_accept_reservations
	 */
	private bool $can_accept_reservations;

	/**
	 * The link to make reservations
	 *
	 * @var string $reservations_link
	 */
	private string $reservations_link;

	/**
	 * The food genre of the restaurant
	 *
	 * @var string $food_genre
	 */
	private string $food_genre;

	/**
	 * The hours of operation
	 *
	 * @var bool|array $hours
	 */
	private $hours;

	/**
	 * The classes for the col-2 content
	 *
	 * @var string $col_2_content_class
	 */
	private string $col_2_content_class;

	/** Sets the Class variables based on ACF fields
	 *
	 * @param array $acf the ACF fields
	 */
	protected function init_props( array $acf ) {
		$this->set_the_image( $acf['image'] );
		$this->destructure_subheadline( $acf['subheadline'] );
		$this->headline         = esc_textarea( $acf['headline'] );
		$this->should_reverse   = $acf['should_reverse'];
		$this->can_order_online = $acf['can_order_online'];
		if ( $acf['can_order_online'] ) {
			$this->online_orders_link = esc_url( $acf['online_orders_link'] );
		}

		$this->can_accept_reservations = $acf['can_accept_reservations'];
		if ( $acf['can_accept_reservations'] ) {
			$this->reservations_link = esc_url( $acf['reservations_link'] );
		}
		$this->has_cta             = $this->can_accept_reservations || $this->can_order_online;
		$this->col_2_content_class = $this->has_cta ? 'col-md-9 col-xl-10' : 'col-12';
	}

	/** Destructures the "Subheadline" ACF Group and inits the properties
	 *
	 * @param array $acf the `subheadline` Group ACF Field
	 */
	private function destructure_subheadline( array $acf ) {
		$this->subheadline = acf_esc_html( $acf['subheadline_text'] );
		$this->has_menu    = $acf['has_menu'];
		if ( $this->has_menu ) {
			$this->menu_link = esc_url( $acf['menu_link'] );
		}
		$this->food_genre = $acf['food_genre'];
		$this->hours      = $acf['hours'] ?? null;
	}

	/**
	 * Generates the markup
	 *
	 * @return string the markup
	 */
	public function get_the_markup(): string {
		$section_id    = $this->get_the_section_id();
		$section_class = $this->set_the_class( 'section' );
		$row_class     = $this->set_the_class( 'row' );
		$markup        = "<{$this->wrapper_el} class='{$section_class}' id='{$section_id}'>";
		$markup       .= "<div class='{$row_class}'>";
		$markup       .= $this->get_col_1();
		$markup       .= $this->get_col_2();
		$markup       .= '</div>';
		$markup       .= "</{$this->wrapper_el}>";
		return $markup;
	}

	/**
	 * Set the CSS class based on the element type.
	 *
	 * @param string $el - The element type ('section', 'row', 'col-1', 'col-2').
	 * @return string - The CSS class for the specified element type.
	 */
	protected function set_the_class( string $el ) {
		$class = '';
		switch ( $el ) {
			case 'section':
				$class = 'container two-col featured-eats py-5';
				break;
			case 'row':
				$class = 'row align-items-center pt-2 pb-5';
				if ( $this->should_reverse ) {
					$class .= ' flex-row-reverse';
				}
				break;
			case 'col-1':
				$class = 'col-12 col-lg-5';
				break;
			case 'col-2':
				$class = 'col-12 col-lg-7';
				break;
		}
		return $class;
	}

	/**
	 * Generate the markup for col-1 (column 1).
	 *
	 * @return string - The HTML markup for col-1.
	 */
	protected function get_col_1(): string {
		$col_1   = $this->set_the_class( 'col-1' );
		$markup  = "<div class='{$col_1}'>";
		$markup .= "<div class='ratio ratio-1x1 w-100 my-5'>";
		$markup .= $this->image->get_the_image( 'featured-eats__image object-fit-cover' );
		$markup .= '</div>';
		$markup .= '</div>';
		return $markup;
	}

	/**
	 * Generate the markup for col-2 (column 2).
	 *
	 * @param string $col_class - Optional CSS class for the col-2 element.
	 * @return string - The HTML markup for col-2.
	 */
	protected function get_col_2( $col_class = '' ): string {
		$col_2           = empty( $col_class ) ? $this->set_the_class( 'col-2' ) : $col_class;
		$inner_row_class = $this->has_cta ? 'row position-relative' : 'row position-relative justify-content-lg-end';
		$markup          = "<div class='{$col_2}'>";
		$markup         .= "<div class='{$inner_row_class}'>";
		if ( $this->has_cta ) {
			$markup .= "<div class='col-3 col-xl-2 d-none d-md-block'></div>";
		}
		$markup .= $this->get_the_header();
		if ( $this->has_cta ) {
			$markup .= "<div class='col-3 col-xl-2 d-none d-md-block'><div class='vertical-line'></div></div>";
		}
		$markup .= $this->get_the_body();
		$markup .= '</div>';
		$markup .= '</div>';
		return $markup;
	}

	/** Gets the section header (headline + subheadline) */
	private function get_the_header(): string {
		$markup = "<div class='{$this->col_2_content_class}'><h2>{$this->headline}</h2></div>";
		return $markup;
	}

	/** Gets the section body */
	private function get_the_body(): string {
		$markup  = "<div class='{$this->col_2_content_class}'>";
		$markup .= "<div class='row'><div class='col fs-6'>{$this->subheadline}</div></div>";
		$markup .= '<div class="row mt-3 mt-md-5">';
		$markup .= $this->get_the_menu();
		$markup .= "<div class='col fs-6'>{$this->food_genre}</div>";
		$markup .= '</div>';
		$markup .= '<hr class="my-3" />';
		$markup .= $this->get_the_hours();
		if ( $this->has_cta ) {
			$markup .= $this->get_the_cta();
		}
		$markup .= '</div>';
		return $markup;
	}

	/** Returns the Menu markup or an empty string */
	private function get_the_menu(): string {
		if ( $this->has_menu ) {
			return "<div class='col menu'><a class='featured-eats__menu-link fs-6' href='{$this->menu_link}' target='_blank' rel-'noopener noreferrer'><i class='fa-solid fa-utensils fs-5'></i> Menu</a></div>";
		} else {
			return '';
		}
	}

	/** Generates the Eats Hours block */
	private function get_the_hours(): string {
		if ( false === $this->hours ) {
			return '';
		}
		$markup = '<h3 class="fs-5">Hours</h3><ul class="dining-hours ps-0 mb-0 list-unstyled">';
		foreach ( $this->hours as $hour_data ) {
			$markup .= "<li class='dining-hours__hours fs-6 row justify-content-between'>";
			$markup .= isset( $hour_data['meals_label'] ) ? "<span class='dining-hours__label d-block col-12 fs-6 fw-semibold'>{$hour_data['meals_label']}</span>" : '';
			$markup .= $this->get_the_hours_actual( $hour_data['hours'] );

			$markup .= '</li>';

		}
		$markup .= '</ul><hr class="my-3" />';
		return $markup;
	}

	private function get_the_hours_actual( array $hours_block ): string {
		$total_blocks = count( $this->hours );
		foreach ( $hours_block as $index => $hours ) {
			$markup_class  = 'col-12 row justify-content-between';
			$markup_class .= ( $index === $total_blocks - 1 ) ? '' : ' mb-3';
			$markup        = "<div class='{$markup_class}'>";
			$markup       .= "<span class='dining-hours__day col-auto fs-6'>" . esc_textarea( $hours['days'] ) . '</span>';
			$markup       .= "<span class='dining-hours__time col-auto fs-6'>" . esc_textarea( $hours['times'] ) . '</span>';
			$markup       .= '</div>';
		}
		return $markup;
	}

	/**
	 * Generate the HTML markup for the Call to Action (CTA) element.
	 *
	 * @return string - The HTML markup for the CTA.
	 */
	protected function get_the_cta(): string {
		// desktop
		$markup  = $this->get_the_desktop_anchors();
		$markup .= $this->get_the_mobile_anchors();
		return $markup;
	}

	/** Generates the anchors markup for the desktop view
	 *
	 * @param string $desktop_link_class [Optional] The class to give the anchors
	 */
	private function get_the_desktop_anchors( string $desktop_link_class = 'arrow-link fs-5 fw-medium' ): string {
		$markup  = "<p class='py-4 d-none d-md-block'><img src='/wp-content/uploads/2023/08/double-arrow.svg' class='arrow position-absolute' loading='lazy' aria-hidden='true' />";
		$anchors = array();
		if ( $this->can_accept_reservations ) {
			$anchors[] = "<a href='{$this->reservations_link}' class='{$desktop_link_class}' target='_blank' rel='noopener noreferrer'>Make Reservations</a>";
		}
		if ( $this->can_order_online ) {
			$anchors[] = "<a href='{$this->online_orders_link}' class='{$desktop_link_class}' target='_blank' rel='noopener noreferrer'>Order Online</a>";
		}
		$num_anchors = count( $anchors );
		if ( 2 === $num_anchors ) {
			$markup .= join( ' | ', $anchors );
		} elseif ( 1 === $num_anchors ) {
			$markup .= $anchors[0];
		}
		$markup .= '</p>';
		return $markup;
	}

	/** Generates the anchors markup for the mobile view
	 *
	 * @param string $mobile_link_class [Optional] The class to give the anchors
	 */
	private function get_the_mobile_anchors( string $mobile_link_class = 'btn-default fs-6' ): string {
		$markup  = "<p class='py-4 d-block d-md-none'>";
		$anchors = array();
		if ( $this->can_accept_reservations ) {
			$anchors[] = "<a href='{$this->reservations_link}' class='{$mobile_link_class}' target='_blank' rel='noopener noreferrer'>Make Reservations</a>";
		}
		if ( $this->can_order_online ) {
			$anchors[] = "<a href='{$this->online_orders_link}' class='{$mobile_link_class}' target='_blank' rel='noopener noreferrer'>Order Online</a>";
		}
		$num_anchors = count( $anchors );
		if ( 2 === $num_anchors ) {
			$markup .= join( '<br />', $anchors );
		} elseif ( 1 === $num_anchors ) {
			$markup .= $anchors[0];
		}
		$markup .= '</p>';
		return $markup;
	}
}

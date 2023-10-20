<?php
/**
 * Featured Eats Content Generator
 * Based on Two Col Section
 *
 * @package ChoctawNation
 * @since 0.2
 */

/** Used to handle ACF markup */
class Featured_Eats extends Two_Col_Section {
	private bool $has_menu;
	private string $menu_link;
	private bool $can_order_online;
	private string $online_orders_link;
	private bool $can_accept_reservations;
	private string $reservations_link;
	private string $food_genre;
	private int $price;
	private bool|array $hours;

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
		$this->has_cta = $this->can_accept_reservations || $this->can_order_online;
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
		$this->price      = absint( $acf['price'] );
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
		$markup .= $this->image->get_the_image( 'w-100 my-5 featured-eats__image' );
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
		$inner_row_class = $this->has_cta ? 'row position-relative' : 'row position-relative justify-content-md-end';
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
		$markup = "<div class='col-12 col-md-9 col-xl-10 mb-5'><h2>{$this->headline}</h2>{$this->subheadline}</div>";
		return $markup;
	}

	private function get_the_body(): string {
		$markup  = '<div class="col-12 col-md-9 col-xl-10">';
		$markup .= '<div class="row">';
		$markup .= $this->get_the_menu();
		$markup .= "<div class='col'>{$this->food_genre}</div>";
		$markup .= $this->get_the_price();
		$markup .= '</div>';
		$markup .= '<hr class="my-4" />';
		$markup .= $this->get_the_hours();
		if ( $this->has_cta ) {
			$markup .= $this->get_the_cta();
		}
		$markup .= '</div>';
		return $markup;
	}

	/** Returns the Menu markup or an emtpy string */
	private function get_the_menu(): string {
		if ( $this->has_menu ) {
			return "<div class='col menu'><a class='featured-eats__menu-link' href='{$this->menu_link}' target='_blank' rel-'noopener noreferrer'><i class='fas fa-utensils'></i> Menu</a></div>";
		} else {
			return '';
		}
	}

	/** Generates the price markup */
	private function get_the_price(): string {
		$grey_dollars = 4 - $this->price;
		$markup       = "<div class='col'>";
		$markup      .= $this->get_the_dollar_signs( $this->price );
		$markup      .= $this->get_the_dollar_signs( $grey_dollars, true );
		$markup      .= '</div>';
		return $markup;
	}

	/** Generates the appropriate number of dollar sign icons and handles opacity
	 *
	 * @param int  $num_icons the number of icons to generate
	 * @param bool $opaque toggles the `opacity-25` class
	 */
	private function get_the_dollar_signs( int $num_icons, bool $opaque = false ): string {
		$opacity = $opaque ? ' opacity-25' : '';
		$dollars = '';
		for ( $i = 0; $i < $num_icons; $i++ ) {
			$dollars .= "<i class='fas fa-dollar-sign{$opacity}'></i>";
		}
		return $dollars;
	}

	/** Generates the Eats Hours block */
	private function get_the_hours(): string {
		if ( false === $this->hours ) {
			return '';
		}
		$markup = '<ul class="dining-hours ps-0 mt-3 mb-4 list-unstyled">';
		foreach ( $this->hours as $time ) {
			$markup .= "<li class='dining-hours__hours'><span class='dining-hours__days'>{$this->get_the_days($time)}</span><span class='dining-hours__seperator'> | </span><span class='dining-hours__times'>{$this->get_the_time($time)}</span></li>";
		}
		$markup .= '</ul><hr class="my-4" />';
		return $markup;
	}

	/**
	 * Creates the Day String
	 *
	 * @param array $hours 1 instance of the Hours repeater field
	 */
	private function get_the_days( array $hours ): string {
		$length = count( $hours );
		if ( $length > 1 ) {
			$last = array_key_last( $hours['days'] );
			return "{$hours['days'][0]} &ndash; {$hours['days'][$last]}";
		} elseif ( 1 === $length ) {
			return $hours['days'];
		} else {
			return '';
		}
	}

	/**
	 * Creates the time String
	 *
	 * @param array $hours 1 instance of the Hours repeater field
	 */
	private function get_the_time( array $hours ): string {
		$open  = $hours['open'];
		$close = $hours['close'];
		return "{$open} &ndash; {$close}";
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
	private function get_the_desktop_anchors( string $desktop_link_class = 'arrow-link' ): string {
		$markup  = "<p class='py-4 d-none d-md-block'><img src='/wp-content/uploads/2023/08/double-arrow.svg' class='arrow position-absolute' />";
		$anchors = array();
		if ( $this->can_accept_reservations ) {
			$anchors[] = "<a href='{$this->reservations_link}' class='{$desktop_link_class}' target='_blank' rel='noopener noreferrer'>Make Reservations</a>";
		}
		if ( $this->can_order_online ) {
			$anchors[] = "<a href='{$this->online_orders_link}' class='{$desktop_link_class}' target='_blank' rel='noopener noreferrer'>Make Reservations</a>";
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
	private function get_the_mobile_anchors( string $mobile_link_class = 'btn-default' ): string {
		$markup  = "<p class='py-4 d-block d-md-none'>";
		$anchors = array();
		if ( $this->can_accept_reservations ) {
			$anchors[] = "<a href='{$this->reservations_link}' class='{$mobile_link_class}' target='_blank' rel='noopener noreferrer'>Make Reservations</a>";
		}
		if ( $this->can_order_online ) {
			$anchors[] = "<a href='{$this->online_orders_link}' class='{$mobile_link_class}' target='_blank' rel='noopener noreferrer'>Make Reservations</a>";
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
<?php
/**
 * The Mega Menu Content API
 *
 * @package ChoctawNation
 * @subpackage ACF
 */

namespace ChoctawNation\ACF;

use ChoctawNation\Events\Choctaw_Event;


/** The Mega Menu Content Page */
class Mega_Menu_Content extends Generator {
	/**
	 * A flag indicating whether the content has a call-to-action (CTA).
	 *
	 * @var ?bool $has_cta
	 */
	private ?bool $has_cta;

	/**
	 * The ACF Link array for the call-to-action (CTA).
	 *
	 * @var array $cta
	 */
	private array $cta;

	/**
	 * The Featured Event
	 *
	 * @var ?\WP_Post $featured_event
	 */
	private ?\WP_Post $featured_event;

	// phpcs:ignore
	protected function init_props( array $acf ) {
		if ( $acf['image'] ) {
			$this->set_the_image( $acf['image'] );
		}

		$this->featured_event = $this->set_featured_event( $acf );
		$this->has_cta        = isset( $acf['has_cta'] ) ? $acf['has_cta'] : null;
		if ( $this->has_cta ) {
			$this->cta = $acf['cta_link'];
		}
	}

	/** Handles Conditions to set the Featured Event Property
	 *
	 * @param array $acf the ACF Fields
	 */
	private function set_featured_event( array $acf ) {
		if ( isset( $acf['use_featured_event'] ) && $acf['use_featured_event'] ) {
			$this->featured_event = isset( $acf['featured_event'] ) ? $acf['featured_event'] : null;
		} else {
			$this->featured_event = null;
		}
	}

	/** Generates the Content */
	public function get_the_content(): string {
		$markup = '';
		if ( $this->featured_event ) {
			$markup .= $this->get_the_featured_event();
		} else {
			$markup .= '<div class="<div class="ratio ratio-1x1">';
			$markup .= $this->image->get_the_image( 'mega-menu__image object-fit-cover w-100' );
			$markup .= '</div>';
			if ( $this->has_cta ) {
				$markup .= $this->get_the_cta();
			}
		}
		return $markup;
	}

	/** Generates the Featured Event Thumbnail block */
	public function get_the_featured_event(): string {
		$this->featured_event->ID;
		$image     = get_the_post_thumbnail(
			$this->featured_event,
			'post-thumbnail',
			array(
				'class'   => 'mega-menu__event-image object-fit-cover w-100',
				'loading' => 'lazy',
			)
		);
		$details   = $this->get_the_event_details();
		$permalink = get_the_permalink( $this->featured_event );
		return "<a href='{$permalink}' class='mega-menu__event p-0 d-block position-relative'><div class='ratio ratio-1x1'>{$image}</div>{$details}</a>";
	}

	/** Generates the Event Details (inside the `.mega-menu__event-details` container) */
	private function get_the_event_details(): string {
		$title      = get_the_title( $this->featured_event );
		$event      = new Choctaw_Event( get_field( 'event_details', $this->featured_event->ID ), $this->featured_event->ID );
		$start_time = $event->get_the_start_date_time();
		$markup     = "<div class='mega-menu__event-details'>";
		$markup    .= "<span class='mega-menu__event-details--title h5'>{$title}</span>";
		$markup    .= "<i class='mega-menu__event-details--icon fa-solid fa-calendar'></i>";
		$markup    .= "<span class='mega-menu__event-details--time'>{$start_time}</span>";
		$markup    .= '</div>';
		return $markup;
	}

	/**
	 * Generate the HTML markup for the Call to Action (CTA) element.
	 *
	 * @return string - The HTML markup for the CTA.
	 */
	private function get_the_cta(): string {
		$href   = esc_url( $this->cta['url'] );
		$text   = esc_textarea( $this->cta['title'] );
		$target = $this->cta['target'];
		$cta    = "<a href='{$href}' class='mega-menu__btn mt-3 d-inline-block text-uppercase text-center' target='{$target}'>{$text}</a>";
		return $cta;
	}
}

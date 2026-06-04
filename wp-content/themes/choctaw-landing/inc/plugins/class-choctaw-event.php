<?php
/**
 * The Choctaw Event ACF Object
 *
 * @package ChoctawNation
 * @subpackage Events
 */

namespace ChoctawNation\Plugins\Events;

use DateTimeImmutable;
use ChoctawNation\Events\Event_Venue;

/**
 * The ACF Object for the Choctaw Events Post Type
 */
class Choctaw_Event {
	/**
	 * The Event (post) ID
	 *
	 * @var int $event_id
	 */
	private int $event_id;

	/**
	 * The Event ACF Fields
	 *
	 * @var array $event
	 */
	private array $event;

	/**
	 * The name of the event.
	 *
	 * @var string $name
	 */
	private string $name;

	/**
	 * The description of the event.
	 *
	 * @var ?string $description
	 */
	private ?string $description;

	/**
	 * The start date of the event.
	 *
	 * @var DateTimeImmutable $start_date
	 */
	private DateTimeImmutable $start_date;

	/**
	 * The start time of the event.
	 *
	 * @var ?DateTimeImmutable $start_time
	 */
	private ?DateTimeImmutable $start_time;

	/**
	 * The end date of the event.
	 *
	 * @var ?DateTimeImmutable $end_date
	 */
	private ?DateTimeImmutable $end_date;

	/**
	 * The end time of the event.
	 *
	 * @var ?DateTimeImmutable $end_time
	 */
	private ?DateTimeImmutable $end_time;

	/**
	 * The website URL for the event (nullable).
	 *
	 * @var ?string
	 */
	private ?string $website;

	/**
	 * Indicates if the event is an all-day event.
	 *
	 * @var bool $is_all_day;
	 */
	public bool $is_all_day;

	/** Whether or not an event has a time attached
	 *
	 * @var bool $has_time;
	 */
	public bool $has_time;

	/**
	 * Whether the event spans multiple days
	 *
	 * @var bool
	 */
	public bool $is_multiday_event = false;

	/** Whether event has category.
	 *
	 * @var bool $has_category
	 */
	public bool $has_categories = false;

	/**
	 * The Event's Categories
	 *
	 * @var ?\WP_Term[] $categories the event's categories as WP_Term objects, or null
	 */
	public ?array $categories;

	/**
	 * The Venue
	 *
	 * @var Event_Venue $venue
	 */
	private ?Event_Venue $venue;

	/**
	 * Whether or not the event has a venue
	 *
	 * @var bool $has_venue
	 */
	public bool $has_venue;

	/**
	 * The archive_content field
	 *
	 * @var ?string $excerpt
	 */
	private ?string $excerpt;

	/**
	 * Whether or not an event post has an excerpt
	 *
	 * @var bool $has_excerpt
	 */
	public bool $has_excerpt;

	/**
	 * Whether or not the event has a ticket URL
	 *
	 * @var bool $is_ticketed_event
	 */
	public bool $is_ticketed_event;

	/**
	 * The ticket URL for the event
	 *
	 * @var ?string $tickets_link
	 */
	private ?string $tickets_link;

	/**
	 * Whether or not the event is sold out
	 *
	 * @var ?bool $is_sold_out
	 */
	public ?bool $is_sold_out;

	/**
	 * Constructor method to build the object and its API
	 *
	 * @param array $event The ACF Group ("event_details") field
	 * @param int   $event_id The post ID
	 */
	public function __construct( array $event, int $event_id ) {
		$this->event_id = $event_id;
		$this->event    = $event;
		$this->set_the_details();
		$this->set_the_terms();
		$excerpt = get_field( 'archive_content', $event_id );
		if ( empty( $excerpt ) ) {
			$this->excerpt     = null;
			$this->has_excerpt = false;
		} else {
			$this->excerpt     = esc_textarea( $excerpt );
			$this->has_excerpt = true;
		}
		$tickets_link = get_field( 'tickets_link', $event_id );
		if ( ! empty( $tickets_link ) ) {
			$this->tickets_link      = esc_url( $tickets_link );
			$this->is_ticketed_event = true;
			$this->is_sold_out       = get_field( 'is_sold_out', $event_id );
		} else {
			$this->is_ticketed_event = false;
			$this->tickets_link      = null;
			$this->is_sold_out       = null;
		}
	}

	/**
	 * Sets the sub-fields to properties
	 *
	 * @return void
	 */
	private function set_the_details(): void {
		$this->name        = get_the_title( $this->event_id );
		$this->description = empty( $this->event['event_description'] ) ? null : acf_esc_html( $this->event['event_description'] );
		$this->is_all_day  = $this->event['time_and_date']['is_all_day'];
		$this->website     = empty( $this->event['event_website'] ) ? null : esc_url( $this->event['event_website'] );
		$this->set_the_venue();
		$this->set_the_date_times( $this->event['time_and_date'] );
	}

	/**
	 * Sets the Dates (and Times) of the event
	 *
	 * @param array $date_time the Dates and Times ACF Subgroup
	 * @return void
	 */
	private function set_the_date_times( array $date_time ): void {
		$timezone       = wp_timezone();
		$parse_datetime = static function ( string $format, string $value ) use ( $timezone ): ?DateTimeImmutable {
			$parsed = DateTimeImmutable::createFromFormat( $format, $value, $timezone );
			return $parsed instanceof DateTimeImmutable ? $parsed : null;
		};

		$start_date = $parse_datetime( 'm/d/Y', (string) $date_time['start_date'] );
		if ( $this->is_all_day ) {
			$this->start_date = $start_date;
			$this->start_time = null;
			$this->end_date   = empty( $date_time['end_date'] ) ? null : $parse_datetime( 'm/d/Y', (string) $date_time['end_date'] );
			$this->end_time   = null;
		} elseif ( ! empty( $date_time['start_time'] ) ) {
			$start_datetime   = $parse_datetime( 'm/d/Y g:i a', (string) $date_time['start_date'] . ' ' . (string) $date_time['start_time'] );
			$this->start_date = $start_datetime ?? $start_date;
			$this->start_time = $start_datetime;
			$end_date         = empty( $date_time['end_date'] ) ? null : (string) $date_time['end_date'];
			$end_time         = empty( $date_time['end_time'] ) ? null : (string) $date_time['end_time'];
			if ( ! $end_date && ! $end_time ) {
				$this->end_date = null;
				$this->end_time = null;
			} elseif ( $end_date && ! $end_time ) {
				$this->end_date = $parse_datetime( 'm/d/Y', $end_date );
				$this->end_time = null;
			} elseif ( $end_time && ! $end_date ) {
				$this->end_date = $start_date;
				$this->end_time = $parse_datetime( 'm/d/Y g:i a', (string) $date_time['start_date'] . ' ' . $end_time );
			} else {
				$this->end_date = $parse_datetime( 'm/d/Y', $end_date );
				$this->end_time = $parse_datetime( 'm/d/Y g:i a', $end_date . ' ' . $end_time );
			}
		} else {
			$this->start_date = $start_date;
			$this->start_time = null;
			$end_date         = empty( $date_time['end_date'] ) ? null : (string) $date_time['end_date'];
			$end_time         = empty( $date_time['end_time'] ) ? null : (string) $date_time['end_time'];
			if ( ! $end_date && ! $end_time ) {
				$this->end_date = null;
				$this->end_time = null;
			} elseif ( $end_date && ! $end_time ) {
				$this->end_date = $parse_datetime( 'm/d/Y', $end_date );
				$this->end_time = null;
			} elseif ( $end_time && ! $end_date ) {
				$this->end_date = $start_date;
				$this->end_time = $parse_datetime( 'm/d/Y g:i a', (string) $date_time['start_date'] . ' ' . $end_time );
			} else {
				$this->end_date = $parse_datetime( 'm/d/Y', $end_date );
				$this->end_time = $parse_datetime( 'm/d/Y g:i a', $end_date . ' ' . $end_time );
			}
		}

		$this->is_multiday_event = (bool) ( $this->end_date && $this->start_date->format( 'Y-m-d' ) !== $this->end_date->format( 'Y-m-d' ) );
		$this->has_time          = (bool) ( $this->start_time || $this->end_time );
	}

	/**
	 * Gets the linked Venue tax and assigns it to the event property
	 *
	 * @return void
	 */
	private function set_the_venue(): void {
		$this->venue     = null;
		$this->has_venue = false;
		if ( taxonomy_exists( 'choctaw-events-venue' ) ) {
			$venue = get_the_terms( $this->event_id, 'choctaw-events-venue' );
			if ( $venue ) {
				$this->venue     = new Event_Venue( $venue[0] );
				$this->has_venue = true;
			}
		}
	}

	/**
	 * Sets the class's "Category" and "Venues" props
	 *
	 * @return void
	 */
	private function set_the_terms(): void {
		$categories = get_the_terms( $this->event_id, 'choctaw-events-category' );
		if ( false === $categories ) {
			$this->categories = null;
		} else {
			$this->categories = $categories;
			if ( count( $this->categories ) ) {
				$this->has_categories = true;
			}
		}
	}

	/**
	 * Get the event name
	 *
	 * @return string The event name
	 */
	public function get_the_name(): string {
		return $this->name;
	}

	/**
	 * Get the event description
	 *
	 * @return ?string The event description
	 */
	public function get_the_description(): ?string {
		return $this->description;
	}

	/**
	 * Get the event start date and time
	 *
	 * @param string $format the PHP time format
	 * @return string The event start date and time
	 */
	public function get_the_start_date_time( string $format = 'M d, Y @ g:i a' ): ?string {
		$date = null;
		if ( $this->start_time ) {
			$date = $this->start_time->format( $format );
		}
		return $date;
	}

	/**
	 * Get the event start date
	 *
	 * @param string $format the PHP date format
	 * @return string The event start date
	 */
	public function get_the_start_date( string $format = 'M d, Y' ): string {
		return $this->start_date->format( $format );
	}

	/**
	 * Get the event end date and time
	 *
	 * @param string $format the PHP time format
	 * @return ?string The event end date and time (or null if not set)
	 */
	public function get_the_end_date_time( string $format = 'M d, Y @ g:i a' ): ?string {
		$date = null;
		if ( $this->end_time ) {
			$date = $this->end_time->format( $format );
		}
		return $date;
	}

	/**
	 * Get the event end date and time
	 *
	 * @param string $format the PHP time format
	 * @return ?string The event end date and time (or null if not set)
	 */
	public function get_the_end_date( string $format = 'M d, Y @ g:i a' ): ?string {
		$date = null;
		if ( $this->end_date ) {
			$date = $this->end_date->format( $format );
		}
		return $date;
	}

	/**
	 * Get the event website URL
	 *
	 * @return ?string The event website URL
	 */
	public function get_the_website(): ?string {
		return $this->website;
	}

	/**
	 * Gets the categories
	 *
	 * @return ?\WP_Term[]
	 */
	public function get_the_categories(): ?array {
		return $this->categories;
	}

	/**
	 * Returns Start and End Dates. If Dates are the same, only start is returned.
	 *
	 * @param string $format date format for the output
	 * @return string
	 */
	public function get_the_dates( $format = 'M d' ): string {
		$start = $this->get_the_start_date( 'Y-m-d' );
		$end   = $this->get_the_end_date( 'Y-m-d' );
		if ( ! $end || $start === $end ) {
			return $this->get_the_start_date( $format );
		} elseif ( $this->is_multiday_event ) {
				$start_day  = $this->start_date->format( 'd' );
				$start_year = $this->start_date->format( 'Y' );
				$end_day    = $this->end_date->format( 'd' );
				$end_year   = $this->end_date->format( 'Y' );
			if ( 'M d, Y' === $format ) {
				$start_month = $this->start_date->format( 'M' );
				$end_month   = $this->end_date->format( 'M' );
			} elseif ( 'F j, Y' === $format ) {
				$start_month = $this->start_date->format( 'F' );
				$start_day   = $this->start_date->format( 'j' );
				$end_month   = $this->end_date->format( 'F' );
				$end_day     = $this->end_date->format( 'j' );
			}

			if ( $start_year === $end_year && $start_month === $end_month ) {
				return "{$start_month} {$start_day} &ndash; {$end_day}, {$start_year}";
			}

			if ( $start_year === $end_year ) {
				return "{$start_month} {$start_day} &ndash; {$end_month} {$end_day}, {$start_year}";
			}
		}

		$start_date = $this->get_the_start_date( $format );
		$end_date   = $this->get_the_end_date( $format );
		return "{$start_date} &ndash; {$end_date}";
	}

	/**
	 * Returns Start and End times. If times are the same, only start is returned.
	 *
	 * @param string $format time format for the output
	 * @param bool   $hide_minutes if minutes should be hidden when equal to 0
	 * @return ?string
	 */
	public function get_the_times( $format = 'g:i a', $hide_minutes = false ): ?string {
		$start = $this->get_the_start_date_time();
		$end   = $this->get_the_end_date_time();
		if ( ! $start && ! $end ) {
			return null;
		}

		$start_format = $format;
		$end_format   = $format;

		if ( $hide_minutes ) {
			$start_mins = $this->get_the_start_date_time( 'i' );
			$end_mins   = $this->get_the_end_date_time( 'i' );

			if ( '00' === $start_mins ) {
				$start_format = str_replace( ':i', '', $start_format );
			}

			if ( '00' === $end_mins ) {
				$end_format = str_replace( ':i', '', $end_format );
			}
		}

		if ( ! $end || $start === $end ) {
			return $this->get_the_start_date_time( $start_format );
		} else {
			$start_time = $this->get_the_start_date_time( $start_format );
			$end_time   = $this->get_the_end_date_time( $end_format );
			return "{$start_time} &ndash; {$end_time}";
		}
	}

	/**
	 * Gets the "Add to Calendar" button
	 *
	 * @param string $btn_class the HTML classes to add
	 * @param string $text the button text
	 * @return string
	 */
	public function get_the_add_to_calendar_button( $btn_class = 'btn btn-primary mt-5 w-auto', $text = 'Add to Calendar' ): string {
		$js_date_string_format = 'Y-m-d';
		$js_time_string_format = 'Y-m-d\TH:i:s.uP';

		$end = '';
		if ( $this->is_all_day ) {
			$start = $this->get_the_start_date( $js_date_string_format );
			$end   = ( $this->end_date ) ? $this->get_the_end_date( $js_date_string_format ) : $start;
		} else {
			$start = $this->start_time ? $this->get_the_start_date_time( $js_time_string_format ) : $this->get_the_start_date( $js_date_string_format );
			if ( $this->end_time ) {
				$end = $this->get_the_end_date_time( $js_time_string_format );
			} elseif ( $this->end_date ) {
				$end = $this->get_the_end_date( $js_date_string_format );
			}
		}

		$button = "<button type='button' id='add-to-calendar' class='{$btn_class}' data-event-start='{$start}'" . ( ! empty( $end ) ? "data-event-end='{$end}'" : '' ) . "data-is-all-day='{$this->is_all_day}'>{$text}</button>";
		return $button;
	}

	/**
	 * Echo the event name.
	 *
	 * @return void
	 */
	public function the_name(): void {
		echo $this->get_the_name();
	}

	/**
	 * Echo the event description
	 *
	 * @return void
	 */
	public function the_description(): void {
		echo $this->get_the_description();
	}

	/**
	 * Echo the event start date and time.
	 *
	 * @param string $format the PHP time format
	 * @return void
	 */
	public function the_start_date_time( string $format = 'M d, Y @ g:i a' ): void {
		echo $this->get_the_start_date_time( $format );
	}

	/**
	 * Echo the event start date and time.
	 *
	 * @param string $format the PHP time format
	 * @return void
	 */
	public function the_start_date( string $format = 'M d, Y' ): void {
		echo $this->get_the_start_date( $format );
	}

	/**
	 * Echo the event end date and time.
	 *
	 * @param string $format the PHP time format
	 * @return void
	 */
	public function the_end_date_time( string $format = 'M d, Y @ g:i a' ): void {
		echo $this->get_the_end_date_time( $format );
	}

	/**
	 * Echoes the event full anchor tag of the website.
	 *
	 * @return void
	 */
	public function the_website(): void {
		$url = $this->get_the_website();
		if ( $url ) {
			echo "<a href='{$url}' target='_blank' rel='noopener noreferrer' id='event-website'>{$url}</a>";
		}
	}

	/**
	 * Echoes Start and End Dates. If Dates are the same, only start is returned.
	 *
	 * @param string $format date format for the output
	 * @return void
	 */
	public function the_dates( $format = 'M d' ): void {
		echo $this->get_the_dates( $format );
	}

	/**
	 * Echoes Start and End times. If times are the same, only start is returned.
	 *
	 * @param string $format time format for the output
	 * @param bool   $hide_minutes if minutes should be hidden in when equal to 0
	 *
	 * @return void
	 */
	public function the_times( $format = 'g:i a', $hide_minutes = false ): void {
		echo $this->get_the_times( $format, $hide_minutes );
	}

	/**
	 * Echoes the "Add to Calendar" Button
	 *
	 * @param string $btn_class the HTML classes to add
	 * @param string $text the button text
	 * @return void
	 */
	public function the_add_to_calendar_button( $btn_class = 'btn btn-primary mt-5 w-auto', $text = 'Add to Calendar' ): void {
		echo $this->get_the_add_to_calendar_button( $btn_class, $text );
	}

	/**
	 * Gets the excerpt
	 *
	 * @return string
	 */
	public function get_the_excerpt(): string {
		return $this->excerpt;
	}

	/**
	 * Echoes the excerpt
	 */
	public function the_excerpt(): void {
		echo $this->get_the_excerpt();
	}

	/**
	 * Gets the venue name
	 *
	 * @return string
	 */
	public function get_the_venue_name(): string {
		return $this->venue->get_the_name();
	}

	/**
	 * Gets the venue street address
	 *
	 * @return ?string The venue street address
	 */
	public function get_the_venue_street_address(): ?string {
		return $this->venue->get_the_street_address();
	}

	/**
	 * Gets the venue city
	 *
	 * @return string The venue city
	 */
	public function get_the_venue_city(): string {
		return $this->venue->get_the_city();
	}

	/**
	 * Gets the full address
	 *
	 * @return string The full address
	 */
	public function get_the_venue_address(): ?string {
		return $this->venue->get_the_address();
	}

	/**
	 * Echoes the venue name
	 *
	 * @return void
	 */
	public function the_venue_name(): void {
		echo $this->get_the_venue_name();
	}

	/**
	 * Echoes the venue street address
	 *
	 * @return void
	 */
	public function the_venue_street_address(): void {
		echo $this->get_the_venue_street_address();
	}

	/**
	 * Echoes the venue city
	 *
	 * @return void
	 */
	public function the_venue_city(): void {
		echo $this->get_the_venue_city();
	}

	/**
	 * Echoes the full address
	 *
	 * @return void
	 */
	public function the_venue_address(): void {
		echo $this->get_the_venue_address();
	}

	/**
	 * Gets the venue phone number
	 *
	 * @return ?string The venue phone number (or null if not set)
	 */
	public function get_the_venue_phone_number(): ?string {
		return $this->venue->get_the_phone();
	}

	/**
	 * Gets the venue website URL
	 *
	 * @return ?string The venue website URL (or null if not set)
	 */
	public function get_the_venue_website(): ?string {
		return $this->venue->get_the_website();
	}

	/**
	 * Echo the venue phone number
	 *
	 * @return void
	 */
	public function the_venue_phone_number(): void {
		echo $this->get_the_venue_phone_number();
	}

	/**
	 * Echo the venue website URL
	 *
	 * @return void
	 */
	public function the_venue_website(): void {
		echo $this->get_the_venue_website();
	}

	/**
	 * Gets the Tickets Button HTML, or a disabled "Sold Out" button if the event is marked as sold out and has no ticket URL
	 *
	 * @param string|string[] $classes additional classes to add to the button
	 * @param bool            $with_ticketmaster_addendum Whether to include the Ticketmaster addendum
	 */
	public function get_the_tickets_button( string|array $classes, bool $with_ticketmaster_addendum = true ): ?string {
		if ( empty( $this->tickets_link ) && ! $this->is_sold_out ) {
			return null;
		}
		$attributes  = array(
			'class' => is_array( $classes ) ? implode( ' ', $classes ) : $classes,
		);
		$button_text = 'Get Tickets';
		$tag         = 'a';
		if ( $this->tickets_link ) {
			$attributes['href']   = $this->tickets_link;
			$attributes['target'] = '_blank';
			$attributes['rel']    = 'noopener noreferrer';
		}
		if ( $this->is_sold_out ) {
			$tag                         = 'button';
			$attributes['type']          = 'button';
			$attributes['disabled']      = 'true';
			$attributes['aria-disabled'] = 'true';
			$button_text                 = 'Sold Out';
			unset( $attributes['href'], $attributes['target'], $attributes['rel'] );
		}
		$attribute_string = '';
		foreach ( $attributes as $key => $value ) {
			$attribute_string .= " {$key}='{$value}'";
		}

		$string = sprintf(
			'<%1$s %2$s>%3$s</%1$s>',
			$tag,
			$attribute_string,
			$button_text
		);
		if ( $with_ticketmaster_addendum && $this->tickets_link ) {
			$string .= $this->get_ticketmaster_addendum();
		}
		return $string;
	}

	/**
	 * Echoes the Tickets Button
	 *
	 * @param string|string[] $classes additional classes to add to the button
	 * @param bool            $with_ticketmaster_addendum Whether to include the Ticketmaster addendum
	 */
	public function the_tickets_button( string|array $classes = '', bool $with_ticketmaster_addendum = true ): void {
		echo $this->get_the_tickets_button( $classes, $with_ticketmaster_addendum );
	}

	/**
	 * Gets the Ticketmaster addendum text
	 *
	 * @return string the Ticketmaster addendum text
	 */
	public function get_ticketmaster_addendum(): string {
		if ( empty( $this->tickets_link ) ) {
			return '';
		}
		return '<p class="mb-0">Ticketmaster is the official ticketing agent of Choctaw Landing.</p>';
	}

	/**
	 * Echoes the Ticketmaster addendum text
	 */
	public function the_ticketmaster_addendum(): void {
		echo $this->get_ticketmaster_addendum();
	}
}
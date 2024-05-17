<?php
/**
 * Handles the Weather Widget
 *
 * @package ChoctawNation
 * @since 0.2
 * @see ChoctawNation\Weather
 */

namespace ChoctawNation;

use ChoctawNation\API;
use ChoctawNation\Weather;

// require API class
require_once __DIR__ . '/class-api.php';

// require Weather class
require_once __DIR__ . '/class-weather.php';

/**
 *  Gets the forecast and creates an accessible array of weather data.
 */
class Weather_Widget extends API {
	/** The ID of the page that loads the Weather Widget.
	 * Used to set/get "last_updated" custom field
	 *
	 * @var int $page_id
	 */
	private int $page_id;

	/**
	 * Array of weather data for current week
	 *
	 * @var Weather[] $data;
	 */
	private ?array $data;

	/** Whether enough time has passed to get the weather
	 *
	 * @var bool $can_get_weather
	 */
	private bool $can_get_weather;

	/** Standard DateTime String format
	 *
	 * @var string $date_format
	 */
	private string $date_format;

	/**
	 * When the weather data was last updated as `d/m/Y g:i a` in UTC Timezone
	 *
	 * @var $last_updated string
	 */
	private \DateTime $last_updated;

	/**
	 * When the weather data was last updated as `d/m/Y g:i a` in UTC Timezone
	 *
	 * @var $last_updated string
	 */
	private \DateTime $latest_update;

	/**
	 * An error message or data structure
	 *
	 * @var $error
	 */
	private $error;

	/** Inits the class
	 *
	 * @param int $page_id the ID of the page that loads the Weather Widget. Used to set/get "last_updated" custom field
	 */
	public function __construct( int $page_id ) {
		$this->page_id     = $page_id;
		$this->date_format = 'm/d/Y g:i a';
		$this->get_handle_update_headers();
		$this->can_get_weather = $this->can_fetch();
	}

	/** Gets the `last_updated` custom field value and `now()` and sets them both to their variables as `\DateTime` objects */
	private function get_handle_update_headers() {
		$last_updated = get_post_meta( $this->page_id, 'last_updated', true );
		$utc          = new \DateTimeZone( 'UTC' );
		if ( empty( $last_updated ) ) {
			$this->last_updated = new \DateTime( 'now', $utc );
		} else {
			$this->last_updated = new \DateTime( $last_updated, $utc );
		}
		$this->latest_update = new \DateTime( 'now', $utc );
	}

	/** Checks that at least 1 hour has passed between data fetches */
	private function can_fetch(): bool {
		$interval = $this->last_updated->diff( $this->latest_update );
		if ( $interval->h >= 1 || $interval->days > 0 ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Gets the Weather data and returns an associative array of Weather objects sorted by Day (e.g. 'Fri'), else returns a \WP_Error if there was an error.
	 *
	 * @return Weather[]|\WP_Error
	 */
	public function get_the_weather() {
		/** The stored weather data
		 *
		 * @var Weather[] $weather_data
		 */
		$weather_data = get_post_meta( $this->page_id, 'weather_data', true );
		if ( $this->can_get_weather || ! is_array( $weather_data ) ) {
			$this->the_weather();
			if ( $this->data ) {
				$weather_data = update_post_meta( $this->page_id, 'weather_data', $this->data );
				$this->set_last_updated();
				return $this->data;
			}
		}
		if ( $this->error ) {
			return new \WP_Error( 'weather_widget', $this->error );
		}
		return $weather_data;
	}

	/** Sets `$this->data` to the Weather or sets `$this->error` to the error message */
	private function the_weather() {
		// $data = $this->get_test_data(); phpcs:ignore Squiz.PHP.CommentedOutCode.Found
		$data = $this->get_weather_data();

		if ( isset( $data ) && is_array( $data ) ) {
			$this->data = array();
			foreach ( $data as $index => $weather_data ) {
				$weather = new Weather( $weather_data );
				$day     = $weather->date_obj->format( 'D' );
				if ( array_key_exists( $day, $this->data ) ) {
					continue;
				} else {
					$this->data[ $day ] = $weather;
				}
			}
		} else {
			$this->data  = null;
			$this->error = $data ?? 'No weather data found!';
		}
	}

	/** Sets */
	private function set_last_updated() {
		$timestamp = $this->latest_update->format( $this->date_format );
		$val       = update_post_meta( $this->page_id, 'last_updated', $timestamp );
		if ( false === $val ) {
			echo 'Something went wrong updating the last_updated header';
		}
	}
}

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


	/** Standard DateTime String format
	 *
	 * @var string $date_format
	 */
	private string $date_format;

	/** The length of time to cache the weather data
	 *
	 * @var int $cache_length
	 */
	private int $cache_length;

	/** Inits the class
	 *
	 * @param int $page_id the ID of the page that loads the Weather Widget. Used to set/get "last_updated" custom field
	 */
	public function __construct( int $page_id ) {
		$this->page_id      = $page_id;
		$this->date_format  = 'm/d/Y g:i a';
		$this->cache_length = 60 * 60 * 24;
	}

	/**
	 * Gets the Weather data and returns an associative array of Weather objects sorted by Day (e.g. 'Fri'), else returns a \WP_Error if there was an error.
	 *
	 * @return Weather[]|\WP_Error
	 */
	public function get_the_weather() {
		/** The stored weather data
		 *
		 * @var Weather[]|false $weather_data
		 */
		$weather_data = get_transient( 'weather_widget_weather_data' );
		if ( false === $weather_data ) {
			$data = $this->get_weather_data();

			if ( $this->data ) {
				set_transient( 'weather_widget_weather_data', $this->data, $this->cache_length );
				return $this->data;
			}
		}
		return $weather_data;
	}

	/** Sets `$this->data` to the Weather or sets `$this->error` to the error message */
	private function the_weather() {
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
}
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
	/**
	 * Array of weather data for current week
	 *
	 * @var Weather[] $data;
	 */
	private array $data;

	/**
	 * An error message or data structure
	 *
	 * @var $error
	 */
	private $error;

	public function __construct() {
		$data = $this->get_test_data();
		// $data = $this->get_weather_data();

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
			$this->error = $data ?? 'No weather data found!';
		}
	}

	/**
	 * Gets the Weather data and returns an associative array of Weather objects sorted by Day (e.g. 'Fri'), else returns a \WP_Error if there was an error.
	 *
	 * @return Weather[]|\WP_Error
	 */
	public function get_the_weather() {

		if ( $this->error ) {
			return new \WP_Error( 'weather_widget', $this->error );
		}
		return $this->data;
	}
}
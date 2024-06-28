<?php
/**
 * Handles the Weather Widget
 *
 * @package ChoctawNation
 * @subpackage WeatherWidget
 * @since 0.2
 */

namespace ChoctawNation\WeatherWidget;

use ChoctawNation\WeatherWidget\Weather;
use ChoctawNation\WeatherWidget\API;
use WP_Error;

/**
 *  Gets the forecast and creates an accessible array of weather data.
 */
class Weather_Widget extends API {
	/** The length of time to cache the weather data
	 *
	 * @var int $cache_length
	 */
	private int $cache_length = 60 * 60 * 24; // 1 Day

	/**
	 * The sorted Weather data as an associative array (e.g. 'Fri' => `Weather_Handler`)
	 *
	 * @var array $data
	 */
	private array $data;

	/**
	 * Whether or not there was an error
	 *
	 * @var bool $has_error
	 */
	private bool $has_error = false;

	/**
	 * The error message
	 *
	 * @var string $error
	 */
	private string $error;

	/**
	 * The Weather_Widget constructor.
	 */
	public function __construct() {
		/**
		 * The Weather data or WP_Error
		 *
		 * @var $data array|WP_Error
		 */
		$data = $this->get_the_weather();
		if ( is_wp_error( $data ) ) {
			$this->data      = array();
			$this->has_error = true;
			$this->error     = $data->get_error_message();
		} else {
			$this->data = $data;
		}
	}

	/**
	 * Returns the error status
	 *
	 * @return bool the error status
	 */
	public function has_error(): bool {
		return $this->has_error;
	}

	/**
	 * Returns the error message
	 *
	 * @return string the error message
	 */
	public function get_error_message(): string {
		if ( $this->has_error ) {
			return $this->error;
		} else {
			return '';
		}
	}


	/**
	 * Gets the Weather data and returns an associative array of Weather objects sorted by Day (e.g. 'Fri')
	 *
	 * @return array The Weather data as an associative array
	 */
	private function get_the_weather(): array|WP_Error {
		$weather_data = get_transient( 'weather_widget_weather_data' );
		if ( false === $weather_data ) {
			$data = $this->get_weather_data();
			if ( $data && is_array( $data ) ) {
				$weather_data = $this->create_data_array( $data );
				set_transient( 'weather_widget_weather_data', $weather_data, $this->cache_length );
			} else {
				return new WP_Error( 'weather_data_error', $data );
			}
		}
		return $weather_data;
	}

	/**
	 * Handles the data from the API
	 *
	 * @param array $data_points the data from the API
	 * @return array the data as an associative array
	 */
	private function create_data_array( array $data_points ): array {
		$weather_data = array();
		foreach ( $data_points as $data_point ) {
			$weather = new Weather( $data_point );
			$day     = $weather->date_obj->format( 'D' );
			if ( array_key_exists( $day, $weather_data ) ) {
				array_push( $weather_data[ $day ], $weather );
			} else {
				$weather_data[ $day ] = array( $weather );
			}
		}
		foreach ( $weather_data as $day => $weather ) {
			$weather_data[ $day ] = new Weather_Handler( $weather_data[ $day ] );
		}
		return $weather_data;
	}

	/**
	 * Returns the Weather data for today
	 *
	 * @return Weather_Handler the Weather data for today
	 */
	public function today(): Weather_Handler {
		$today_index = array_keys( $this->data )[0];
		return $this->data[ $today_index ];
	}

	/**
	 * Returns the Weather data
	 *
	 * @return array the Weather data
	 */
	public function get_the_weather_data(): array {
		return $this->data;
	}
}

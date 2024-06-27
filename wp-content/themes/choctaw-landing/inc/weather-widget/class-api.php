<?php
/**
 * API Class
 *
 * @package ChoctawNation
 * @since 0.2
 */

namespace ChoctawNation;

/**
 * Handles the API
 */
class API {
	/**
	 * The Base Open Weather API endpoint
	 *
	 * @var $base_url
	 */
	protected string $base_url = 'https://api.openweathermap.org/data/2.5/forecast?lat=34.1418916&lon=-94.7446644&units=imperial';

	/**
	 * Gets the data. Returns an associative array, a string (if error) or null (if cannot decode json to array).
	 *
	 * @return array|string|null The data
	 */
	protected function get_weather_data(): array|string|null {
		$weather_url = $this->base_url . '&appid=' . WEATHER_API_KEY;
		$response    = wp_remote_get( $weather_url );
		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			return $error_message;
		} else {
			$data = json_decode( wp_remote_retrieve_body( $response ), true );
			$data = $this->check_errors( $data );
			if ( is_array( $data ) ) {
				return $data['list'];
			} else {
				return $data;
			}
		}
	}


	/** Checks for errors and returns the appropriate message (or data)
	 *
	 * @param mixed $data the data
	 */
	private function check_errors( $data ) {
		if ( gettype( $data ) === 'string' ) {
			return $data;
		} elseif ( is_array( $data ) && '200' !== $data['cod'] ) {
				return $data['message'];
		} else {
			return $data;
		}
	}
}

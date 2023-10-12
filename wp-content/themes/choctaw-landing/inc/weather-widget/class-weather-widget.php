<?php
/**
 * Handles the Weather Widget
 *
 * @package ChoctawNation
 * @since 0.2
 */

namespace ChoctawNation;

use ChoctawNation\API;
use ChoctawNation\Weather;

// require API class
require_once __DIR__ . '/class-api.php';
require_once __DIR__ . '/class-weather.php';

class Weather_Widget extends API {
	/** Array of weather data for current week
	 *
	 * @var array $data;
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

		if ( is_array( $data ) ) {
			foreach ( $data as $weather_data ) {
				$this->data[] = new Weather( $weather_data );
			}
		} else {
			$this->error = $data;
		}
	}

	public function get_the_weather( int $index = 0 ) {

		if ( $this->error ) {
			return;
		}
		return $this->data;
	}
}
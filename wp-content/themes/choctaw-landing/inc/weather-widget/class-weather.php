<?php
/**
 * Handles the Weather Data.
 *
 * @package ChoctawNation
 * @since 0.2
 */

namespace ChoctawNation;

use DateTime;
use DateTimeZone;

/** Handles the weather data from the Open Weather API Response */
class Weather {
	private string $full_date;
	private int $temp;
	private int $humidity;
	private int $wind;
	private string $day;
	private string $icon;
	private string $description;
	private int $chance_of_rain;

	public function __construct( array $data ) {
		$this->set_the_date( $data['dt'] );
		$this->set_main_props( $data['main'] );
		$this->set_the_weather( $data['weather'][0] );
		if ( isset( $data['wind'] ) ) {
			$this->set_the_wind( $data['wind'] );
		}
		if ( isset( $data['pop'] ) ) {
			$this->chance_of_rain = ( 100 * $data['pop'] );
		}
	}

	private function set_the_date( int $date ) {
		$utc             = DateTime::createFromFormat( 'U', $date, new DateTimeZone( 'UTC' ) );
		$local           = new DateTimeZone( 'America/Chicago' );
		$central         = $utc->setTimezone( $local );
		$this->full_date = $central->format( 'l, j F' );
		$this->day       = $central->format( 'D' );
	}

	private function set_main_props( array $main ) {
		if ( isset( $main['temp'] ) ) {
			$this->temp = round( $main['temp'] );
		}
		if ( isset( $main['humidity'] ) ) {
			$this->humidity = round( $main['humidity'] );
		}
	}

	private function set_the_weather( array $data ) {
		$this->icon        = $this->set_the_icon( $data['main'] );
		$this->description = $data['description'];
	}

	private function set_the_icon( string $icon ): string {
		switch ( $icon ) {
			default:
				return 'null';
		}
	}

	private function set_the_wind( array $wind ) {
		if ( isset( $wind['speed'] ) ) {
			$this->wind = round( $wind['speed'] );
		}
	}

	public function get_the_temp(): int {
		return $this->temp;
	}

	public function the_temp() {
		echo $this->temp;
	}

	public function get_the_full_date(): string {
		return $this->full_date;
	}

	public function the_full_date() {
		echo $this->full_date;
	}

	public function get_the_humidity(): string {
		return $this->humidity;
	}

	public function the_humidity() {
		echo $this->humidity;
	}

	public function get_the_wind(): string {
		return $this->wind;
	}

	public function the_wind() {
		echo $this->wind;
	}

	public function get_the_day(): string {
		return $this->day;
	}

	public function the_day() {
		echo $this->day;
	}

	public function get_the_icon(): string {
		return $this->icon;
	}

	public function the_icon() {
		echo $this->icon;
	}

	public function get_the_description(): string {
		return $this->description;
	}

	public function the_description() {
		echo $this->description;
	}

	public function get_chance_of_rain(): string {
		return $this->chance_of_rain;
	}

	public function the_chance_of_rain() {
		echo $this->chance_of_rain;
	}
}
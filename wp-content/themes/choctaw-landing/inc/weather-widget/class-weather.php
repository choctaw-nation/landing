<?php
/**
 * Handles the Weather Data.
 *
 * @package ChoctawNation
 * @since 0.2
 */

namespace ChoctawNation;

use Bootstrap_Icons;
use DateTime;
use DateTimeZone;

/** Handles the weather data from the Open Weather API Response */
class Weather {
	private string $pretty_date_format = 'l, F j';
	private string $pretty_full_date;
	private int $temp;
	private int $humidity;
	private int $wind;
	private string $day;
	private string $icon;
	private string $description;
	private int $chance_of_rain;

	/** The date as a PHP DateTime object if it needs further manipulation
	 *
	 * @var DateTime $date_obj;
	 */
	public DateTime $date_obj;

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
		$utc                    = DateTime::createFromFormat( 'U', $date, new DateTimeZone( 'UTC' ) );
		$local                  = new DateTimeZone( 'America/Chicago' );
		$central                = $utc->setTimezone( $local );
		$this->pretty_full_date = $central->format( $this->pretty_date_format );
		$this->day              = $central->format( 'D' );
		$this->date_obj         = $central;
	}

	private function set_main_props( array $main ) {
		if ( isset( $main['temp'] ) ) {
			$this->temp = round( $main['temp'] );
		}
		if ( isset( $main['humidity'] ) ) {
			$this->humidity = round( $main['humidity'] );
		}
	}

	private function set_the_weather( array $weather ) {
		$this->icon        = $this->set_the_icon( $weather['main'] );
		$this->description = $weather['description'];
	}

	private function set_the_icon( string $icon_name ): string {
		$bs_icon = new Bootstrap_Icons();
		return $bs_icon->get_the_icon( $icon_name );
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

	/** Returns the pretty full date as "10 Jul, 2023" */
	public function get_the_full_date(): string {
		return $this->pretty_full_date;
	}

	/** Echoes the pretty full date as "10 Jul, 2023" */
	public function the_full_date() {
		echo $this->pretty_full_date;
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

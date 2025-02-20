<?php
/**
 * Specials Handler
 *
 * @package ChoctawNation
 */

namespace ChoctawNation;

use DateTime;
use DateTimeZone;
use WP_Query;
use WP_Post;

/**
 * Class Specials_Handler
 */
class Specials_Handler {
	/**
	 * The Current Specials
	 *
	 * @var ?WP_Post[] $specials
	 */
	public ?array $specials;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->get_current_specials();
		$cron_event_name = 'cno_daily_specials_update';
		if ( ! wp_next_scheduled( $cron_event_name ) ) {
			wp_schedule_event( strtotime( 'today 11:59pm CST' ), 'daily', $cron_event_name );
		}

		add_action( $cron_event_name, array( $this, 'update_specials' ) );
	}

	/**
	 * Get the Specials with a status of publish or future
	 */
	private function get_current_specials(): void {
		$specials       = get_posts(
			array(
				'post_type'      => 'special',
				'post_status'    => array( 'publish', 'future' ),
				'posts_per_page' => -1,
			)
		);
		$this->specials = empty( $specials ) ? null : $specials;
	}

	/**
	 * Update the Specials' statuses to draft if they are past their end date
	 */
	public function update_specials(): void {
		if ( empty( $this->specials ) ) {
			return;
		}
		$central_time = new DateTimeZone( 'CST' );
		$today        = new DateTime( 'now', $central_time );
		$today->setTime( 23, 59, 0 );
		foreach ( $this->specials as $special ) {
			$special_id   = $special->ID;
			$end_date     = get_field( 'end_date', $special_id );
			$end_date_obj = isset( $end_date ) ? new DateTime( $end_date, $central_time ) : null;
			if ( ! $end_date_obj ) {
				continue;
			}
			$end_date_obj->setTime( 23, 59, 0 );
			if ( $today >= $end_date_obj ) {
				wp_update_post(
					array(
						'ID'          => $special_id,
						'post_status' => 'draft',
					)
				);
			}
		}
	}
}

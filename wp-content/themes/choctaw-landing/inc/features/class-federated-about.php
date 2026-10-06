<?php
/**
 * Federated About class.
 * Supports getting the "About" Footer information from the CNO site
 *
 * @package ChoctawNation
 */

namespace ChoctawNation\Features;

/**
 * Class Federated_About
 */
class Federated_About {
	/**
	 * The post ID of the boilerplate content used for the "About" section in the footer. Should be pointing to "The Choctaw Nation" boilerplate.
	 */
	private const BOILERPLATE_ID = 1247;

	private const TRANSIENT_KEY = 'federated_about_content';

	private const CACHE_DURATION = 7 * DAY_IN_SECONDS;

	private const CRON_HOOK = 'federated_about_cron_hook';

	/**
	 * Gets the "About" content for the footer, either from the cache or by fetching it from the remote site.
	 *
	 * @return string The "About" content, or an empty string if unavailable.
	 */
	public static function get_about_content() {
		$content = get_transient( self::TRANSIENT_KEY );

		if ( false === $content ) {
			try {
				$content = self::fetch_content();
				if ( null === $content ) {
					$content = '';
				}
				set_transient( self::TRANSIENT_KEY, $content, self::CACHE_DURATION );
			} catch ( \Exception $e ) {
				$content = '';
			}
		}

		return $content;
	}

	/**
	 * Fetches the "About" content from the remote CNO site and caches it locally.
	 *
	 * @return string The "About" content, or an empty string if unavailable.
	 */
	public static function fetch_content(): ?string {
		$url      = 'https://www.choctawnation.com/wp-json/wp/v2/boilerplates/' . self::BOILERPLATE_ID;
		$url      = add_query_arg( '_fields', array( 'acf' ), $url );
		$response = wp_remote_get( $url );
		if ( is_wp_error( $response ) ) {
			return null;
		}

		$body = wp_remote_retrieve_body( $response );
		$data = json_decode( $body, true );
		if ( empty( $data ) || ! isset( $data['acf'] ) ) {
			return null;
		}
		$about_text = $data['acf']['about_company'];
		if ( empty( $about_text ) ) {
			return null;
		}
		return $about_text;
	}

	/**
	 * Schedules the fetching of the "About" content via a daily cron job.
	 *
	 * @return void
	 */
	public static function schedule_fetch(): void {
		$fetch_time      = new \DateTimeImmutable( '02:00', wp_timezone() );
		$fetch_timestamp = $fetch_time->getTimestamp();
		if ( ! wp_next_scheduled( self::CRON_HOOK ) ) {
			wp_schedule_event( $fetch_timestamp, 'daily', self::CRON_HOOK );
		}
		add_action( self::CRON_HOOK, array( __CLASS__, 'fetch_content' ) );
	}
}

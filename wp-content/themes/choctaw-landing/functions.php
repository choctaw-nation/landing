<?php
/**
 * The Functions
 *
 * @package ChoctawNation
 */

use ChoctawNation\Theme\Theme_Init;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$autoload_path = get_stylesheet_directory() . '/vendor/autoload.php';
if ( file_exists( $autoload_path ) ) {
	include $autoload_path;
} elseif ( is_admin() ) {
	wp_die(
		'Autoload file not found. Please run composer install inside the theme directory.',
		'Choctaw Landing Theme Error',
		array( 'response' => 500 )
	);
}

/**
 * Get the theme init class
*/
$theme = new Theme_Init();
add_action( 'after_setup_theme', array( $theme, 'setup_theme' ) );

add_action(
	'rest_api_init',
	function () {
		register_rest_route(
			'choctaw/v1',
			'/events',
			array(
				'methods'             => 'GET',
				'callback'            => 'cno_update_events',
				'permission_callback' => '__return_true',
			)
		);
	}
);
/**
 * Utility function to help with migration
 */
function cno_update_events() {
	$events = get_posts(
		array(
			'post_type'      => 'choctaw-events',
			'posts_per_page' => -1,
			'post_status'    => 'publish',
			'fields'         => 'ids',
		)
	);

	if ( empty( $events ) ) {
		return new WP_REST_Response(
			array(
				'message' => 'No events found to update',
			),
			404
		);
	}

	$field_map = array(
		'event_details_time_and_date_is_all_day' => 'field_69de59212323c',
		'event_details_time_and_date_start_date' => 'field_69de58a56589b',
		'event_details_time_and_date_end_date'   => 'field_69de58ca2323b',
		'event_details_time_and_date_start_time' => 'field_69de58a56589f',
		'event_details_time_and_date_end_time'   => 'field_69de58a5658a2',
		'event_details_archive_content'          => 'field_69de58a5658a8',
		'event_details_event_website'            => 'field_69de58a5658aa',
	);

	$updated_events = array();

	foreach ( $events as $event_id ) {
		$updated_fields = array();

		// remap acf
		foreach ( $field_map as $old_meta_key => $new_field_key ) {
			$value = get_post_meta( $event_id, $old_meta_key, true );

			if ( '' === $value || null === $value ) {
				continue;
			}
			if ( 'event_details_archive_content' === $old_meta_key && ! empty( $value ) ) {
				wp_update_post(
					array(
						'ID'           => $event_id,
						'post_excerpt' => wp_kses_post( $value ),
					)
				);
			}

			update_field( $new_field_key, $value, $event_id );

			$updated_fields[ $old_meta_key ] = $new_field_key;
		}
		// Update post content with event description if it exists
		$event_details  = get_field( 'event_details_event_description', $event_id );
		$featured_image = get_field( 'swiper_image', $event_id );
		$fallback_image = get_field( 'fallback_image', $event_id );
		if ( $featured_image && is_array( $featured_image ) ) {
			set_post_thumbnail( $event_id, $featured_image['ID'] );
		} elseif ( $fallback_image && is_array( $fallback_image ) ) {
			set_post_thumbnail( $event_id, $fallback_image['ID'] );
		}
		if ( ! empty( $event_details ) ) {
			wp_update_post(
				array(
					'ID'           => $event_id,
					'post_content' => wp_kses_post( $event_details ),
				)
			);
		}

		$updated_events[ $event_id ] = array(
			'title'  => get_the_title( $event_id ),
			'fields' => $updated_fields,
		);
	}

	return new WP_REST_Response(
		array(
			'message' => 'Events updated successfully',
			'events'  => $updated_events,
		),
		200
	);
}

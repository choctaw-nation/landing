<?php
/**
 * Featured Events Swiper
 * Gets the 6 featured events by "Featured" tag and displays them in a swiper
 *
 * @package ChoctawNation
 */

use ChoctawNation\Events\Choctaw_Event;
wp_enqueue_script( 'events-swiper' );
wp_enqueue_style( 'events-swiper' );

$base_args            = array(
	'post_type'      => 'choctaw-events',
	'posts_per_page' => 6,
	'meta_key'       => 'event_details_time_and_date_start_date',
	'orderby'        => 'meta_value_num',
	'order'          => 'ASC',
);
$featured_events_args = array(
	...$base_args,
	'tax_query' => array(
		array(
			'taxonomy' => 'post_tag',
			'field'    => 'slug',
			'terms'    => 'featured',
		),
	),
);
$featured_events      = get_posts( $featured_events_args );
$further_events_args  = array(
	'posts_per_page' => 6 - count( $featured_events ),
	'post__not_in'   => wp_list_pluck( $featured_events, 'ID' ),
	...$base_args,
);

$further_events = get_posts( $further_events_args );
$events         = array_merge( $featured_events, $further_events );

if ( empty( $events ) ) {
	return;
}
?>
<div class="offset-topo-bg py-5 my-5">
	<section id="featured-events" class="container">
		<div class="row events-list align-items-stretch">
			<div class="col-1 position-relative">
				<div class="swiper-button-prev events-swiper-button-prev"></div>
			</div>

			<div class="swiper h-100 col-10" id='events-swiper'>
				<div class="swiper-wrapper">
					<?php
					foreach ( $events as $event ) :
						$event   = is_array( $event ) ? $event['featured_event'] : $event;
						$feature = new Choctaw_Event( get_field( 'event_details', $event->ID ), $event->ID );
						echo "<div class='swiper-slide'>";
						get_template_part(
							'template-parts/events/content',
							'event-card',
							array(
								'event_id' => $event->ID,
							)
						);
						echo '</div>';
						?>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="col-1 position-relative">
				<div class="swiper-button-next events-swiper-button-next"></div>
			</div>
		</div>
		<div class="row position-relative mt-5">
			<div class="col">
				<div class="swiper-pagination events-swiper-pagination"></div>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col text-center text-uppercase">
				<a href="<?php echo user_trailingslashit( home_url( '/events' ) ); ?>" class="fs-6 fw-bold">View All Events <i class="fa-regular fa-circle-right"></i></a>
			</div>
		</div>
	</section>
</div>

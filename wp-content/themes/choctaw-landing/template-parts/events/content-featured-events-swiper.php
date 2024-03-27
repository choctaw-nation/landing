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

$featured_events = new WP_Query(
	array(
		'post_type'      => 'choctaw-events',
		'posts_per_page' => 6,
		'meta_key'       => 'event_details_time_and_date_start_date',
		'orderby'        => 'meta_value_num',
		'order'          => 'ASC',
		'tax_query'      => array(
			array(
				'taxonomy' => 'post_tag',
				'field'    => 'slug',
				'terms'    => 'featured',
			),
		),
	)
);
$featured_events = $featured_events->posts;
wp_reset_postdata();
$further_events = new WP_Query(
	array(
		'post_type'      => 'choctaw-events',
		'posts_per_page' => 6 - count( $featured_events ),
		'meta_key'       => 'event_details_time_and_date_start_date',
		'orderby'        => 'meta_value_num',
		'order'          => 'ASC',
		'post__not_in'   => wp_list_pluck( $featured_events, 'ID' ),
	)
);
$all_events     = array_merge( $featured_events, $further_events->posts );
if ( empty( $all_events ) ) {
	return;
}
?>
<section id="featured-events" class="container events">
	<div class="row events-list">
		<div class="col-1 position-relative d-lg-none">
			<div class="swiper-button-prev"></div>
		</div>
		<div class="swiper col-10 col-lg-12" id='events-swiper'>
			<div class="swiper-wrapper">
				<?php
				foreach ( $all_events as $event ) :
					$event   = is_array( $event ) ? $event['featured_event'] : $event;
					$feature = new Choctaw_Event( get_field( 'event_details', $event->ID ), $event->ID );
					?>
				<div class="swiper-slide h-100 events-list__item position-relative p-0">
					<?php
					if ( has_post_thumbnail( $event ) ) {
						echo get_the_post_thumbnail(
							$event,
							'large',
							array(
								'class'   => 'position-absolute h-100 object-fit-cover z-n1',
								'loading' => 'lazy',
							)
						);

					}
					?>
					<div class="d-flex flex-column justify-content-end h-100 event pb-2 ps-3 w-100">
						<h3 class='event__title text-white fs-5 fw-bold mb-1 text-uppercase'><?php $feature->the_name(); ?></h3>
						<p class='event__meta text-white fs-6 mb-0'><i class="fa-solid fa-calendar"></i>
							<?php echo ( $feature->has_time ) ? $feature->get_the_start_date_time( 'D, m/d/Y @ g:i a' ) : $feature->get_the_start_date( 'D, m/d/Y' ); ?></p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="col-1 position-relative d-lg-none">
			<div class="swiper-button-next"></div>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-12 position-relative">
			<div class="swiper-pagination"></div>
		</div>
		<div class="col-12 text-center text-uppercase">
			<a href="/events/all-events">View All Events <i class="fa-regular fa-circle-right"></i></a>
		</div>
	</div>
</section>

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
<section id="featured-events" class="container">
	<div class="row events-list">
		<div class="col-1 position-relative">
			<div class="swiper-button-prev"></div>
		</div>
		<div class="swiper col-10" id='events-swiper'>
			<div class="swiper-wrapper">
				<?php
				foreach ( $all_events as $event ) :
					$event   = is_array( $event ) ? $event['featured_event'] : $event;
					$feature = new Choctaw_Event( get_field( 'event_details', $event->ID ), $event->ID );
					?>
				<div class="swiper-slide d-flex flex-column justify-content-center">
					<?php
					if ( has_post_thumbnail( $event ) ) {
						echo "<figure class='ratio ratio-16x9'>" . get_the_post_thumbnail(
							$event,
							'large',
							array(
								'class'   => 'w-100 h-100 object-fit-cover',
								'loading' => 'lazy',
							)
						) . '</figure>';

					}
					?>
					<div class="d-flex flex-column justify-content-end h-100 event pb-2 w-100">
						<h3 class='event__title fs-5 fw-bold mb-1 text-uppercase'><?php $feature->the_name(); ?></h3>
						<p class="event__meta fs-6 mb-0"><i class="text-primary fa-solid fa-calendar"></i>
							<?php
							$feature->the_dates( 'l, M j, Y' );
							if ( $feature->has_time ) {
								echo ! empty( $feature->get_the_times() ) ? ( ' • ' . $feature->get_the_times( 'g:iA' ) ) : '';

							}
							?>
						</p>
						<?php if ( $feature->has_venue ) : ?>
						<p class='event__meta fs-6 mb-0'><i class="text-primary fa-solid fa-map-marker-alt"></i> <?php $feature->the_venue_name(); ?></p>
						<?php endif; ?>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="col-1 position-relative">
			<div class="swiper-button-next"></div>
		</div>
	</div>
	<div class="row my-5">
		<div class="col position-relative">
			<div class="swiper-pagination"></div>
		</div>
	</div>
	<div class="row">
		<div class="col text-center text-uppercase">
			<a href="<?php echo get_post_type_archive_link( 'choctaw-events' ); ?>">View All Events <i class="fa-regular fa-circle-right"></i></a>
		</div>
	</div>
</section>

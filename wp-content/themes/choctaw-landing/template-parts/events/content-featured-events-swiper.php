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
// Temporary fix while new event content is being implemented
$swiper_images = array();
foreach ( $events as $event ) {
	$event        = is_array( $event ) ? $event['featured_event'] : $event;
	$feature      = new Choctaw_Event( get_field( 'event_details', $event->ID ), $event->ID );
	$swiper_image = get_field( 'swiper_image', $event->ID );
	if ( ! $swiper_image ) {
		$swiper_image = get_field( 'fallback_image', $event->ID );
	}
	if ( $swiper_image ) {
		$swiper_images[] = $swiper_image['ID'];
	}
}
if ( empty( $swiper_images ) ) {
	return;
}
// End temporary fix.
// Please remove in future versions when ready.
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
						$event     = is_array( $event ) ? $event['featured_event'] : $event;
						$feature   = new Choctaw_Event( get_field( 'event_details', $event->ID ), $event->ID );
						$swiper_el = empty( $feature->get_the_description() ) ? 'div' : 'a';
						echo "<$swiper_el class='swiper-slide d-flex flex-column align-items-center border-primary border-2 border'" . ( 'a' === $swiper_el ? "href='" . get_permalink( $event->ID ) . "'" : '' ) . '>';
						$swiper_image = get_field( 'swiper_image', $event->ID );
						if ( ! $swiper_image ) {
							$swiper_image = get_field( 'fallback_image', $event->ID );
						}
						echo '<figure class="mb-0 position-relative">' . wp_get_attachment_image(
							$swiper_image['ID'],
							'full',
							false,
							array(
								'class'   => 'object-fit-cover w-auto',
								'loading' => 'lazy',
							)
						);
						?>
					<figcaption class="d-flex flex-column justify-content-end h-100 event pb-2 w-100 flex-grow-1 position-absolute top-0 z-2 px-3">
						<h3 class='event__title fs-5 fw-bold mb-1 text-uppercase text-white'><?php $feature->the_name(); ?></h3>
						<p class="event__meta fs-6 mb-0 text-white"><i class="fa-solid fa-calendar"></i>
							<?php
								$feature->the_dates( 'l, M j, Y' );
							if ( $feature->has_time ) {
								echo ! empty( $feature->get_the_times() ) ? ( ' • ' . $feature->get_the_times( 'g:iA' ) ) : '';
							}
							?>
						</p>
						<?php if ( $feature->has_venue ) : ?>
						<p class="event__meta fs-6 mb-0 text-white"><i class=" fa-solid fa-map-marker-alt"></i> <?php $feature->the_venue_name(); ?></p>
						<?php endif; ?>
					</figcaption>
						<?php
						echo '</figure>';
						echo "</{$swiper_el}>";
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

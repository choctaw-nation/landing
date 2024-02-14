<?php
/**
 * Template Name: Events
 *
 * @package ChoctawNation
 */

use ChoctawNation\ACF\Full_Width_Section;
use ChoctawNation\ACF\Hero_Section;
use ChoctawNation\ACF\Image;
use ChoctawNation\ACF\Title_Bar;
use ChoctawNation\ACF\Two_Col_Section;
use ChoctawNation\Events\Choctaw_Event;

get_header();
wp_enqueue_script( 'events-swiper' );
wp_enqueue_style( 'events-swiper' );
$hero            = new Hero_Section( get_the_ID(), get_field( 'hero' ) );
$title_bar       = new Title_Bar( get_the_ID(), get_field( 'title_bar' ) );
$featured_events = get_field( 'featured_events' );

if ( ! $featured_events ) {
	$featured_events = new WP_Query(
		array(
			'post_type'      => 'choctaw-events',
			'posts_per_page' => 6,
			'meta_key'       => 'event_details_time_and_date_start_date',
			'orderby'        => 'meta_value_num',
			'order'          => 'ASC',
		)
	);
	$featured_events = $featured_events->posts;
	$columns         = count( $featured_events );
	wp_reset_postdata();
} else {
	$columns = count( $featured_events );
}

$hero->the_hero();
$title_bar->the_title_bar();
?>

<section id="featured-events" class="container events">
	<div class="row events-title">
		<div class="col-12">
			<h2>Cypress Lawn</h2>
		</div>
	</div>
	<div class="row events-list">
		<div class="swiper" id='events-swiper' style='--swiper-pagination-color:var(--color-primary);--swiper-navigation-color:var(--color-primary);'>
			<div class="swiper-wrapper">
				<?php
				foreach ( $featured_events as $event ) :
					$event   = is_array( $event ) ? $event['featured_event'] : $event;
					$feature = new Choctaw_Event( get_field( 'event_details', $event->ID ), $event->ID );
					$image   = get_the_post_thumbnail_url( $event, 'large' );
					?>
				<div class="swiper-slide h-100 events-list__item" style="background-image:url('<?php echo $image; ?>')">
					<a href="<?php echo get_the_permalink( $event ); ?>">
						<div class="d-flex flex-column justify-content-end h-100 event">
							<h3 class='event__title'><?php $feature->the_name(); ?></h3>
							<p class='event__meta'><i class="fa-solid fa-calendar"></i>
								<?php echo ( $feature->has_time ) ? $feature->get_the_start_date_time( 'D, m/d/Y @ g:i a' ) : $feature->get_the_start_date( 'D, m/d/Y' ); ?></p>
							<!-- <a class='event__tickets' href="#"><i class="fa-solid fa-ticket"></i> Tickets</a> -->
						</div>
					</a>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div>
			<div class="swiper-pagination"></div>
		</div>

	</div>
	<div class="col-12 text-center py-5 text-uppercase">
		<a href="/events/all-events">View All Events <i class="fa-regular fa-circle-right"></i></a>
	</div>
</section>
<?php
$event_callouts = get_field( 'event_callouts' );
$banner         = new Image( $event_callouts['banner'] );
get_template_part(
	'template-parts/content',
	'banner-header',
	array(
		'url'   => $banner->src,
		'title' => array(
			'text'  => 'Special Moments',
			'class' => 'mb-4',
		),
	)
);
foreach ( $event_callouts['callouts'] as $callout ) {
	if ( $callout['is_image_full_width'] ) {
		$two_col_section = new Full_Width_Section( get_the_ID(), $callout );
	} else {
		$two_col_section = new Two_Col_Section( get_the_ID(), $callout );
	}
	$two_col_section->the_section();
}
get_footer();

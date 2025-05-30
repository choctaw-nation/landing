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
use ChoctawNation\Asset_Loader;
use ChoctawNation\Enqueue_Type;

new Asset_Loader( 'events', Enqueue_Type::script, 'pages' );
get_header();
$hero      = new Hero_Section( get_the_ID(), get_field( 'hero' ) );
$title_bar = new Title_Bar( get_the_ID(), get_field( 'title_bar' ) );
$hero->the_hero();
$title_bar->the_title_bar();
$event_callouts = get_field( 'event_callouts' );
if ( ! empty( $event_callouts['banner'] ) ) {
	$banner = new Image( $event_callouts['banner'] );
}
if ( ! empty( $event_callouts['callouts'] ) ) {
	echo '<div class="d-flex flex-column row-gap-5 my-5">';
	foreach ( $event_callouts['callouts'] as $callout ) {
		if ( $callout['is_image_full_width'] ) {
			$two_col_section = new Full_Width_Section( get_the_ID(), $callout );
		} else {
			$two_col_section = new Two_Col_Section( get_the_ID(), $callout );
			if ( $two_col_section->has_modal ) {
				$has_modal = true;
			}
		}
		$two_col_section->the_section();
	}
	if ( $has_modal ) {
		get_template_part( 'template-parts/content', 'modal' );
	}
	echo '</div>';
}

$special_events_taxonomy = get_field( 'special_events_taxonomy' );
$args                    = array(
	'post_type'      => 'choctaw-events',
	'posts_per_page' => -1,
	'meta_query'     => array(
		'relation'          => 'AND',
		'start_date_clause' => array(
			'key'  => 'event_details_time_and_date_start_date',
			'type' => 'NUMERIC',
		),
		'start_time_clause' => array(
			'key'  => 'event_details_time_and_date_start_time',
			'type' => 'TIME',
		),
	),
	'orderby'        => array(
		'start_date_clause' => 'ASC',
		'start_time_clause' => 'ASC',
	),
);

if ( ! empty( $special_events_taxonomy ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'choctaw-events-category',
			'field'    => 'term_id',
			'terms'    => $special_events_taxonomy,
		),
	);
}
$events = new WP_Query( $args );
?>
<section class="container d-flex flex-column row-gap-4 my-5" id="all-events">
	<?php if ( $events->have_posts() ) : ?>
	<div class="row">
		<div class="col">
			<h2 class="text-center">Upcoming Events</h2>
		</div>
	</div>
	<ul class="row row-gap-4 align-items-stretch justify-content-center justify-content-md-start list-unstyled events-list mb-0">
		<?php while ( $events->have_posts() ) : ?>
		<?php
			$events->the_post();
			$event_details = get_field( 'event_details' );
			if ( ! $event_details ) {
				continue;
			}
			?>
		<li class="event-preview-container col-auto col-md-6 col-lg-4 d-flex flex-column h-auto">
			<?php get_template_part( 'template-parts/events/content', 'event-card' ); ?>
		</li>
		<?php endwhile; ?>
	</ul>
	<?php else : ?>
	<div class="col">
		<p>No events found.</p>
	</div>
	<?php endif; ?>
</section>
<?php
wp_reset_postdata();
get_footer();
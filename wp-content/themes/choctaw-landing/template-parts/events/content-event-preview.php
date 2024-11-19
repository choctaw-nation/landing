<?php
/**
 * The Event Preview for Archive-Choctaw Events
 *
 * @package ChoctawNation
 * @subpackage Events
 */

use ChoctawNation\Events\Choctaw_Event;

$event_details = get_field( 'event_details' );
if ( $event_details ) {
	$event = new Choctaw_Event( $event_details, get_the_ID() );
} else {
	return;
}
$swiper_image = get_field( 'swiper_image' );
if ( empty( $swiper_image ) ) {
	$swiper_image = get_field( 'fallback_image' );
}
?>
<li class="event-preview__container col col-lg-4 d-flex flex-column h-auto">
	<div class="event-preview border border-primary border-1 shadow d-flex flex-column h-100">
		<?php
		if ( has_post_thumbnail() || ! empty( $swiper_image ) ) {
			echo '<figure class="mb-0 ratio ratio-1x1">';
			$image_args = array(
				'class'   => 'object-fit-cover w-100 h-100',
				'loading' => 'lazy',
			);
			if ( $swiper_image && ! has_post_thumbnail() ) {
				echo wp_get_attachment_image( $swiper_image['ID'], 'events-archive', false, $image_args );
			} else {
				the_post_thumbnail( 'choctaw-events-single', $image_args );
			}
			echo '</figure>';
		}
		?>
		<div class="event-preview__content m-3">
			<h2 class="post-preview__title fs-4 mb-0">
				<?php the_title(); ?>
			</h2>
			<div class="post-preview__dates fs-6 fw-bold">
				<?php
				$event->the_dates( 'M j, Y' );
				if ( $event->has_time ) {
					echo ' @ ';
					$event->the_times( 'g:iA' );
				}
				?>
			</div>
			<?php
			if ( $event->has_venue ) {
				echo '<p class="post-preview__location fs-6">Venue: ';
				$event->the_venue_name();
				echo '</p>';
			}
			if ( $event->get_the_description() ) {
				echo '<a class="btn btn-outline-primary fs-6" href="' . get_the_permalink() . '">View Details</a>';
			}
			?>
		</div>
	</div>
</li>

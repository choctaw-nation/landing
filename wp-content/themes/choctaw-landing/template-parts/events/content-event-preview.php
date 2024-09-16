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
?>
<li class="event-preview__container col-auto flex-grow-1 flex-shrink-1 event-preview border border-primary border-1 shadow d-flex flex-column row-gap-3 p-3">
	<?php if ( has_post_thumbnail() ) : ?>
	<div class="ratio ratio-16x9">
		<?php
			the_post_thumbnail(
				'choctaw-events-preview',
				array(
					'class'   => 'object-fit-cover w-100 h-100',
					'loading' => 'lazy',
				)
			);
		?>
	</div>
	<?php endif; ?>
	<div class="event-preview__content d-flex flex-column h-100">
		<h2 class="post-preview__title fs-4 mb-0">
			<?php the_title(); ?>
		</h2>
		<div class="post-preview__dates fs-6 mb-3 fw-bold">
			<?php $event->the_dates( 'M j, Y' ); ?> @
			<?php $event->the_times( 'g:iA' ); ?>
		</div>

		<?php
		if ( $event->has_venue ) {
			echo '<span class="post-preview__location fs-6 mt-auto">Venue: ';
			$event->the_venue_name();
			echo '</span>';
		}
		if ( $event->has_excerpt ) {
			echo '<div class="post-preview__excerpt fs-6">';
			$event->the_excerpt();
			echo '</div>';
		}
		?>
	</div>
</li>

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
<li class="post-preview__container row my-5">
	<div class="col">
		<div class="row">
			<?php $content_col_class = 'post-preview my-3 my-lg-0'; ?>
			<?php if ( has_post_thumbnail() ) : ?>
				<?php $content_col_class .= ' col-lg-8'; ?>
			<div class="col-lg-4">
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
			</div>
			<?php endif; ?>
			<div class="<?php echo $content_col_class; ?>">
				<div class="post-preview__dates fs-5">
					<?php $event->the_dates( 'M j, Y' ); ?>
					<?php $event->the_times( 'g:iA' ); ?>
				</div>
				<h2 class="post-preview__title">
					<?php the_title(); ?>
				</h2>
				<?php
				if ( $event->has_venue ) {
					echo '<p class="post-preview__location my-2 fw-bold fs-5">Venue: ';
					$event->the_venue_name();
					echo '</p>';
				}
				if ( $event->has_excerpt ) {
					echo '<div class="post-preview__excerpt fs-6">';
					$event->the_excerpt();
					echo '</div>';
				}
				?>
			</div>
		</div>
	</div>
</li>

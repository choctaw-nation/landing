<?php
/**
 * The Event Preview for Archive-Choctaw Events
 * Overrides the template-part in choctaw-events plugin
 *
 * @package ChoctawNation
 * @since 0.2
 */

use ChoctawNation\Events\Choctaw_Event;

$event_details = get_field( 'event_details' );
if ( $event_details ) {
	$event = new Choctaw_Event( get_field( 'event_details' ), get_the_ID() );
} else {
	return;
}
?>
<li class="post-preview__container d-block row d-flex my-5">
	<div class="col">
		<div class="row">
			<div class="col-lg-4">
				<a href="<?php the_permalink(); ?>" class="ratio ratio-16x9">
					<?php the_post_thumbnail( 'choctaw-events-preview', array( 'class' => 'object-fit-cover' ) ); ?>
				</a>
			</div>
			<div class="col-lg-8 post-preview my-3 my-lg-0">
				<div class="post-preview__dates">
					<?php $event->the_dates(); ?>
				</div>
				<h2 class="post-preview__title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h2>
				<?php if ( $event->venue ) : ?>
				<div class="post-preview__location my-2">
					<b>
						<?php $event->venue->the_name(); ?>
					</b>
					&nbsp;
					<?php $event->venue->the_address(); ?>
				</div>
				<?php endif; ?>
				<div class="post-preview__excerpt">
					<?php
					$event_excerpt = get_the_excerpt();
					$fallback      = strlen( $event_excerpt ) === 0 ? $event->the_description() : the_excerpt();
					?>
				</div>
			</div>
		</div>
	</div>
</li>
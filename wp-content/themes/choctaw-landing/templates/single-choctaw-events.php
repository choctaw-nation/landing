<?php
/**
 * The Single Display for the Events
 *
 * @package ChoctawNation
 * @subpackage Events
 */

use ChoctawNation\Events\Choctaw_Event;

wp_enqueue_script( 'choctaw-events-add-to-calendar' );
get_header();
$event = new Choctaw_Event( get_field( 'event_details' ), get_the_ID() );
?>
<div class="container pt-5 mb-5 d-flex flex-column row-gap-5" style="margin-top: var(--header-offset,110px);">
	<nav arial-label="breadcrumb">
		<ol class="breadcrumb m-0">
			<li class="breadcrumb-item fs-6"><a href="<?php echo user_trailingslashit( '/events' ); ?>">Events</a></li>
			<li class="breadcrumb-item fs-6 active" aria-current="page"><?php echo $event->get_the_name(); ?></li>
		</ol>
	</nav>
	<article <?php post_class( 'd-flex flex-column row-gap-4' ); ?> id="<?php echo 'post-' . get_the_ID(); ?>">
		<div class="event-header row row-gap-3 align-items-center">
			<?php
			$swiper_image = get_field( 'swiper_image' );
			if ( empty( $swiper_image ) ) {
				$swiper_image = get_field( 'fallback_image' );
			}
			?>
			<?php if ( has_post_thumbnail() || ! empty( $swiper_image ) ) : ?>
			<div class="col-lg-6">
				<?php
				$image_args = array(
					'class' => 'object-fit-cover w-100 h-100',
				);
				if ( $swiper_image && ! has_post_thumbnail() ) {
					echo wp_get_attachment_image( $swiper_image['ID'], 'full', false, $image_args );
				} else {
					the_post_thumbnail(
						'choctaw-events-single',
						array(
							'class'           => 'object-fit-cover w-100 h-100',
							'loading'         => 'eager',
							'data-spai-eager' => true,
						)
					);
				}
				?>
			</div>
			<?php endif; ?>
			<div class="col">
				<h1 class="event-header__title" id="event-name">
					<?php echo $event->get_the_name(); ?>
				</h1>
				<p class="event-header__date-time fs-5 fw-bold mb-0">
					<?php
					if ( $event->has_time ) {
						if ( ! empty( $event->get_the_end_date_time() ) ) {
							$format = 'M d, Y • g:i a';
							echo $event->get_the_start_date_time( $format ) . ' &ndash; ' . $event->get_the_end_date_time( $format );
						} else {
							$event->the_start_date_time();
						}
					} else {
						$event->the_start_date( 'F j, Y' );
					}
					?>
					<?php if ( $event->has_venue ) : ?>
					at <span id="venue-name"><?php $event->the_venue_name(); ?></span>
					<?php endif; ?>
				</p>
				<div class="fs-6" id="event-description">
					<?php $event->the_description(); ?>
				</div>
				<?php $event->the_add_to_calendar_button( 'btn btn-primary fs-6 mt-auto w-auto' ); ?>
			</div>
		</div>
	</article>
</div>

<?php
get_footer();

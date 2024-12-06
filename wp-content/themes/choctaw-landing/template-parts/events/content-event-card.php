<?php
/**
 * Event Preview (Card Style)
 *
 * @package ChoctawNation
 * @subpackage Events
 */

use ChoctawNation\Events\Choctaw_Event;

$event_id     = $args['event_id'] ?? get_the_ID();
$feature      = new Choctaw_Event( get_field( 'event_details', $event_id ), $event_id );
$swiper_image = get_field( 'swiper_image', $event_id );
if ( ! $swiper_image ) {
	$swiper_image = get_field( 'fallback_image', $event_id );
}
$should_wrap = ! empty( $feature->get_the_description() );
?>
<div class="event-preview border border-primary border-1 shadow d-flex flex-column h-100 position-relative">
	<?php
	if ( $should_wrap ) {
		echo "<a href='" . get_permalink( $event_id ) . "' class='d-block'>";
	}
	?>

	<figure class="mb-0 position-relative">
		<?php
		echo wp_get_attachment_image(
			$swiper_image['ID'],
			'full',
			false,
			array(
				'class'   => 'object-fit-cover w-100 h-auto',
				'loading' => 'lazy',
				'sizes'   => '(min-width:1400px) 414px, (min-width:1200px) 354px, (min-width: 991px) 293.984px, (min-width:767px) 334px, (min-width:576px) 514px, calc(100vw - 1.5rem)',
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
	</figure>
	<?php
	if ( $should_wrap ) {
		echo '</a>';
	}
	?>
</div>

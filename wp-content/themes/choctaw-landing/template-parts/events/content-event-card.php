<?php
/**
 * Event Preview (Card Style)
 *
 * @package ChoctawNation
 * @subpackage Events
 */

use ChoctawNation\Plugins\Events\Choctaw_Event;

$event_id     = $args['event_id'] ?? get_the_ID();
$feature      = new Choctaw_Event( get_field( 'event_details', $event_id ), $event_id );
$swiper_image = get_field( 'swiper_image', $event_id );
if ( ! $swiper_image ) {
	$swiper_image = get_field( 'fallback_image', $event_id );
}
$should_wrap = ! empty( $feature->get_the_description() ) && ! $feature->is_ticketed_event;
$classes     = array( 'event-preview', 'border', 'border-primary', 'border-1', 'shadow', 'd-flex', 'flex-column', 'h-100', 'position-relative' );
if ( $feature->is_sold_out ) {
	$classes[] = 'sold-out';
}
?>
<article class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<?php
	if ( $feature->is_sold_out ) {
		echo '<span class="visually-hidden">Sold Out</span>';
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
			<h3 class='event__title fs-5 fw-bold mb-1 text-uppercase text-white'>
				<?php
				if ( $should_wrap ) {
					printf(
						"<a href='%s' class='stretched-link text-decoration-none text-white'>%s</a>",
						get_permalink( $event_id ),
						$feature->get_the_name()
					);
				} else {
					$feature->the_name();
				}
				?>
			</h3>
			<time datetime="<?php echo $feature->get_the_start_date( DATE_ATOM ); ?>" class="event__meta fs-6 mb-0 text-white"><i class="fa-solid fa-calendar"></i>
				<?php
				if ( $feature->is_multiday_event ) {
					$feature->the_dates( 'F j, Y' );
				} else {
					$feature->the_dates( 'l, M j, Y' );
					if ( $feature->has_time ) {
						echo ! empty( $feature->get_the_times() ) ? ( ' • ' . $feature->get_the_times( 'g:iA' ) ) : '';
					}
				}

				?>
			</time>
			<?php
			if ( $feature->has_venue ) {
				printf(
					'<p class="event__meta fs-6 mb-0 text-white"><i class="fa-solid fa-map-marker-alt"></i> %s</p>',
					$feature->get_the_venue_name()
				);
			}
			if ( $feature->is_ticketed_event ) {
				$view_details_button = sprintf(
					'<a href="%s" class="btn btn-outline-white w-auto">%s</a>',
					get_permalink( $event_id ),
					'View Details'
				);
				printf(
					'<div class="d-flex align-items-center flex-wrap gap-2 mt-2">%s</div>',
					$feature->get_the_tickets_button( 'btn btn-outline-white w-auto', false ) . $view_details_button
				);
			}
			?>

		</figcaption>
	</figure>
</article>
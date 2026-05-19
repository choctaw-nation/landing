<?php
/**
 * The Venue Taxonomy Archive Page
 *
 * @package ChoctawNation
 */

get_header();
$venue        = get_queried_object();
$page_title   = $venue->name;
$custom_query = get_posts(
	array(
		'post_type'      => 'choctaw-events',
		'posts_per_page' => 8,
		'paged'          => get_query_var( 'paged', 1 ),
		'tax_query'      => array(
			array(
				'taxonomy' => 'choctaw-events-venue',
				'field'    => 'slug',
				'terms'    => $venue->slug,
			),
		),
		'meta_query'     => array(
			array(
				'key'     => 'start_date',
				'value'   => date( 'Ymd' ),
				'compare' => '>=',
				'type'    => 'NUMERIC',
			),
		),
		'orderby'        => 'meta_value_num',
		'meta_key'       => 'start_date',
		'order'          => 'ASC',
	)
);

$events_by_day = array_reduce(
	$custom_query,
	function ( $grouped_events, $event ) {
		$start_date                      = get_field( 'start_date', $event->ID );
		$start_time                      = ! empty( get_field( 'start_time', $event->ID ) ) ? get_field( 'start_time', $event->ID ) : '12:00 am';
		$start_datetime                  = DateTime::createFromFormat( 'F j, Y g:i a', $start_date . ' ' . $start_time );
		$event                           = array(
			'ID'        => $event->ID,
			'title'     => get_the_title( $event->ID ),
			'permalink' => get_permalink( $event->ID ),
			'read_more' => ! empty( get_the_content( null, false, $event->ID ) ),
			'datetime'  => $start_datetime,
		);
		$grouped_events[ $start_date ][] = $event;
		return $grouped_events;
	},
	array()
);
foreach ( $events_by_day as $date => $events ) {
	usort(
		$events,
		function ( $a, $b ) {
			return $a['datetime'] <=> $b['datetime'];
		}
	);
	$events_by_day[ $date ] = $events;
}

?>
<div <?php post_class( 'alignfull is-layout-constrained has-global-padding' ); ?> style="margin-top:var(--header-offset,110px);padding-block:3rem;">
	<nav aria-label="breadcrumb" class="alignwide">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
			<li class="breadcrumb-item"><a href="/events">Events</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo esc_html( $page_title ); ?></li>
		</ol>
	</nav>
	<?php if ( empty( $custom_query ) ) : ?>
	<main class="alignwide">
		<p>No upcoming events found for this venue. Please check back later.</p>
	</main>
	<?php else : ?>
	<main class="alignwide">
		<header class="d-flex flex-column align-items-center mb-5">
			<p class="has-sm-font-size mb-0">Upcoming Events at</p>
			<h1 class="text-center mb-0 has-xxxl-font-size"><?php echo $page_title; ?></h1>
		</header>
		<ol id="<?php echo "{$venue->slug}-events"; ?>" class="m-0 row list-unstyled row-cols-1 row-cols-sm-3 row-cols-lg-4 gap-4">
			<?php foreach ( $events_by_day as $date => $events ) : ?>
			<li class="position-relative border border-1 border-primary shadow p-3 flex-grow-1 flex-shrink-1">
				<h2 class="has-lg-font-size">
					<time datetime="<?php echo $date; ?>">
						<?php echo date( 'l, M d Y', strtotime( $date ) ); ?>
					</time>
				</h2>
				<?php if ( ! empty( $events ) ) : ?>
				<ol class="events-list p-0">
					<?php
					foreach ( $events as $event ) {
						printf(
							"<li><article id='%s' %s><p class='has-root-font-size'>%s at <time>%s</time></p></article></li>",
							'post-' . esc_attr( $event['ID'] ),
							'class="' . implode( ' ', get_post_class( 'event', $event['ID'] ) ) . '"',
							$event['read_more'] ? "<a href='" . $event['permalink'] . "'>" . esc_html( $event['title'] ) . '</a>' : esc_html( $event['title'] ),
							esc_html( get_field( 'start_time', $event['ID'] ) )
						);
					}
					?>
				</ol>
				<?php endif; ?>
			</li>
			<?php endforeach; ?>
		</ol>
	</main>
	<?php endif; ?>
</div>
<?php
get_footer();
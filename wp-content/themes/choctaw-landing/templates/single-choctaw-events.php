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
            <li class="breadcrumb-item fs-6"><a href="/all-events">All Events</a></li>
            <li class="breadcrumb-item fs-6 active" aria-current="page"><?php echo $event->get_the_name(); ?></li>
        </ol>
    </nav>
    <article <?php post_class( 'd-flex flex-column row-gap-4' ); ?> id="<?php echo 'post-' . get_the_ID(); ?>">
        <header class="event-header row row-gap-3 align-items-center">
            <?php if ( has_post_thumbnail() ) : ?>
            <div class="col-lg-6">
                <?php the_post_thumbnail( 'choctaw-events-single', array( 'class' => 'object-fit-cover w-100 h-100' ) ); ?>
            </div>
            <?php endif; ?>
            <div class="col">
                <h1 class="event-header__title" id="event-name">
                    <?php echo $event->get_the_name(); ?>
                </h1>
                <p class="event-header__date-time fs-6">
                    <?php
					if ( $event->has_time ) {
						$event->the_start_date_time();
					} else {
						$event->the_start_date( 'F j, Y' );
					}
					?>
                </p>
                <div class="fs-6" id="event-description">
                    <?php $event->the_description(); ?>
                </div>
                <?php $event->the_add_to_calendar_button( 'btn btn-primary fs-6 mt-auto w-auto' ); ?>
            </div>
        </header>
        <hr>
        <aside class="event-info row">
            <div class="event-details d-flex gap-4 flex-column col-sm-6 p-3 flex-grow-1">
                <h2 class="mb-0 h3 fw-bold">Details</h2>
                <div class="event-details__date">
                    <h3 class="h4 mb-0">Date:</h3>
                    <span class="fs-6"><?php $event->the_dates( 'M d, Y' ); ?></span>
                </div>
                <?php if ( ! $event->is_all_day && $event->has_time ) : ?>
                <div class="event-details__time">
                    <h3 class="h4 mb-0">Time:</h3>
                    <span class="fs-6"><?php $event->the_times(); ?></span>
                </div>
                <?php endif; ?>
                <?php $event_categories = $event->get_the_categories(); ?>
                <?php if ( $event_categories ) : ?>
                <div class="event-details__category">
                    <?php
					$category_count = count( $event_categories );
					echo ( $category_count > 1 ) ? '<h2 class="mb-0 h3 fw-bold">Event Categories:</h2>' : '<h2 class="mb-0 h3 fw-bold">Event Category:</h2>';
					$event_categories = array_map(
						function ( $category ) {
							echo '<span class="fs-6">' . $category->name . '</span>';
						},
						$event_categories
					);
					echo implode( ', ', $event_categories );
					?>
                </div>
                <?php endif; ?>
                <?php if ( $event->get_the_website() ) : ?>
                <div class="event-details__website">
                    <h3 class="h4 mb-0">Website:</h3>
                    <?php $event->the_website(); ?>
                </div>
                <?php endif; ?>
            </div>
            <?php if ( $event->has_venue ) : ?>
            <div class="event-venue d-flex gap-3 flex-column col-sm-6 p-3">
                <h2 class="mb-0 h3 fw-bold">About <span id='venue-name'><?php $event->the_venue_name(); ?></span></h2>
                <div class="event-venue__address">
                    <h3 class="h4 mb-0">Address:</h3>
                    <span class="fs-6" id="venue-address"><?php $event->the_venue_address(); ?></span>
                </div>
                <?php if ( $event->get_the_venue_phone_number() ) : ?>
                <div class="event-venue__phone">
                    <h3 class="h4 mb-0">Phone:</h3>
                    <span class="fs-6">
                        <?php $event->the_venue_phone_number(); ?>
                    </span>
                </div>
                <?php endif; ?>
                <?php if ( $event->get_the_venue_website() ) : ?>
                <div class="event-venue__website">
                    <h3 class="h4 mb-0">Venue Website</h3>
                    <span class="fs-6">
                        <?php $event->the_venue_website(); ?>
                    </span>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </aside>
        <hr>
    </article>
    <nav aria-label="Post Navigation">
        <ul class="pagination d-flex justify-content-between pagination-lg m-0">
            <li class="page-item"><?php echo get_previous_post_link( '%link' ); ?></li>
            <li class="page-item"><?php echo get_next_post_link( '%link' ); ?></li>
        </ul>
    </nav>
</div>

<?php
get_footer();
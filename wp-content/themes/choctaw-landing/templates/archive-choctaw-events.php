<?php
/**
 * The Archive Display for the Events
 *
 * @since 1.0
 * @package ChoctawNation
 */

get_header();
?>
<div class="container py-5" style="margin-top: var(--header-offset)" ;>
	<div class="row flex-row-reverse">
		<?php if ( have_posts() ) : ?>
		<div class="col-lg-4 position-relative">
			<figure class="ratio ratio-16x9 position-sticky top-0">an Image!</figure>
		</div>
		<div class="col-lg-8">
			<h1 class="mb-5">Upcoming Events</h1>
			<ul class="list-unstyled events-list">
				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'template-parts/events/content', 'event-preview' );
				}
				?>
			</ul>
		</div>
		<?php else : ?>
		<div class="col">
			<p>No events found.</p>
		</div>
		<?php endif; ?>
	</div>
</div>
<?php
get_footer();

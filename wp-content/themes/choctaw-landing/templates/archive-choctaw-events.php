<?php
/**
 * The Archive Display for the Events
 * Overrides the Template in Choctaw Events Plugin
 *
 * @since 0.2
 * @package ChoctawNation
 */

get_header();
?>
<div class="container my-5 py-5">
	<section class="search row">
		<form class="flex-grow-1" method="GET" action=<?php echo esc_url( site_url( '/events' ) ); ?>>
			<div class="form-group row">
				<div class="col p-0">
					<input type="search" class="form-control" name="s" id="search-input" placeholder="Search for events" />
				</div>
				<div class="col-2">
					<input type="submit" value="Find Events" class='btn btn-primary text-white' id='search-button' aria-label="Find Events">
				</div>
			</div>
		</form>
	</section>
	<?php if ( have_posts() ) : ?>
	<section class="results">
		<ol class="list-unstyled">
			<?php
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/events/content', 'event-preview' );
			}
			?>
		</ol>
		<?php else : ?>
		<p>No events found.</p>
		<?php endif; ?>
	</section>
</div>
<?php
wp_footer();
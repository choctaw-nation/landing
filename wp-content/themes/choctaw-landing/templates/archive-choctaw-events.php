<?php
/**
 * The Archive Display for the Events
 *
 * @since 1.0
 * @package ChoctawNation
 */

use ChoctawNation\ACF\Image;

get_header();
$floating_images = get_field( 'floating_images', 'options' );
if ( ! empty( $floating_images ) ) {
	$floating_images = array_map(
		function ( $image ): Image {
			return new Image( $image );
		},
		$floating_images
	);
}
?>
<div class="container py-5" style="margin-top: var(--header-offset)" ;>
	<div class="row flex-row-reverse">
		<?php if ( have_posts() ) : ?>
		<?php if ( ! empty( $floating_images ) ) : ?>
		<div class="col-lg-4 position-relative">
			<figure class="ratio ratio-16x9 position-sticky shadow-sm" style="top:20%;"><?php $floating_images[0]->the_image( 'w-100 h-100 object-fit-cover' ); ?></figure>
		</div>
		<?php endif; ?>
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

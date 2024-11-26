<?php
/**
 * The Archive Display for the Events
 *
 * @since 1.0
 * @package ChoctawNation
 */

wp_safe_redirect( user_trailingslashit( home_url( '/events' ) ), 301 );
exit;
// phpcs:disable Squiz.PHP.NonExecutableCode.Unreachable
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
<header class="hero position-relative">
	<figure class="ratio ratio-21x9 mx-auto hero__bg-container">
		<?php $floating_images[0]->the_image( 'position-absolute top-0 w-100 h-100 object-fit-cover' ); ?>
	</figure>
</header>
<div class="container py-5">
	<div class="row my-5">
		<div class="col">
			<h1 class="text-center">Upcoming Events</h1>
		</div>
	</div>
	<?php if ( have_posts() ) : ?>
	<ul class="row row-gap-4 align-items-stretch list-unstyled events-list mb-0">
		<?php
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/events/content', 'event-preview' );
		}
		?>
	</ul>
	<?php else : ?>
	<div class="col">
		<p>No events found.</p>
	</div>
	<?php endif; ?>
</div>
</div>
<?php
get_footer();
// phpcs:enable Squiz.PHP.NonExecutableCode.Unreachable
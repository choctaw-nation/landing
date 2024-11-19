<?php
/**
 * The Events Category Archive Page
 *
 * @since 1.0
 * @package ChoctawNation
 * @subpackage Events
 */

$category        = get_queried_object();
$category_type   = $category->slug;
$should_redirect = array(
	'cultural',
	'entertainment',
);
if ( in_array( $category_type, $should_redirect, true ) ) {
	wp_safe_redirect( user_trailingslashit( home_url( '/events' ) ) );
	exit;
}
get_header();
$page_title = substr( get_the_archive_title(), 16 );
?>

<div class="container py-5" style="margin-top:var(--header-offset,86px);">
	<div class="row my-5">
		<div class="col">
			<h1 class="text-center"><?php echo "Upcoming {$page_title} Events"; ?></h1>
			<p class="fs-4"><?php echo get_the_archive_description(); ?></p>
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
		<p>No <?php echo strtolower( $page_title ); ?> events found.</p>
	</div>
	<?php endif; ?>
</div>
</div>
<?php
get_footer();

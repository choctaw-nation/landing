<?php
/**
 * The Single Display for the Events
 *
 * @package ChoctawNation
 * @subpackage Events
 */

$children = get_pages(
	array(
		'child_of'  => get_the_ID(),
		'post_type' => 'choctaw-events',
	)
);
get_header();
?>
<div <?php post_class( array( 'alignfull', 'has-global-padding', 'is-layout-constrained' ) ); ?> style="margin-top: var(--header-offset);margin-bottom:3rem;">
	<?php if ( empty( $children ) ) : ?>
	<div class="alignwide pt-5 mb-5 d-flex flex-column row-gap-5">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb m-0">
				<li class="breadcrumb-item fs-6"><a href="<?php echo user_trailingslashit( '/events' ); ?>" class="text-decoration-none">Events</a></li>
				<li class="breadcrumb-item fs-6 active" aria-current="page"><?php the_title(); ?></li>
			</ol>
		</nav>
	</div>
	<?php endif; ?>
	<?php the_content(); ?>
</div>
<?php
get_footer();

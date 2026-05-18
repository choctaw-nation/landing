<?php
/**
 * The Single Display for the Events
 *
 * @package ChoctawNation
 * @subpackage Events
 */

wp_enqueue_script( 'choctaw-events-add-to-calendar' );
get_header();
?>
<main <?php post_class( array( 'alignfull', 'has-global-padding', 'is-layout-constrained' ) ); ?> style="margin-top: var(--header-offset);">
	<div class="alignwide pt-5 mb-5 d-flex flex-column row-gap-5" style="margin-top: var(--header-offset,110px);">
		<nav arial-label="breadcrumb">
			<ol class="breadcrumb m-0">
				<li class="breadcrumb-item fs-6"><a href="<?php echo user_trailingslashit( '/events' ); ?>" class="text-decoration-none">Events</a></li>
				<li class="breadcrumb-item fs-6 active" aria-current="page"><?php the_title(); ?></li>
			</ol>
		</nav>
	</div>
	<?php the_content(); ?>
	</div>
</main>
<?php
get_footer();
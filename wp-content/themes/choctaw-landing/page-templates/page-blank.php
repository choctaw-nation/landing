<?php
/**
 * Template Name: Blank
 *
 * @package ChoctawNation
 */

get_header();
?>
<main id="main" class="site-main container" style="margin-top: 110px;">
	<div class="entry-content row my-5 py-5">
		<div class="col-12">
			<?php echo get_field( 'page_content' ); ?>
		</div>
	</div>
</main>

<?php
get_footer();
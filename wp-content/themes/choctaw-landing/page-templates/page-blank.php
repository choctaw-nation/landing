<?php
/**
 * Template Name: Blank
 *
 * @package ChoctawNation
 */

get_header();
?>
<main id="main" class="site-main container" style="margin-top: var(--header-offset,110px);">
	<div class="entry-content row my-5 py-5 justify-content-center">
		<div class="col-lg-10 fs-6">
			<h1><?php the_title(); ?></h1>
			<?php the_field( 'page_content' ); ?>
		</div>
	</div>
</main>

<?php
get_footer();
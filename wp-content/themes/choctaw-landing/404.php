<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package ChoctawNation
 */

get_header();
?>
<div id="content" class="site-content container py-5" style="margin-top: 150px;">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="error-404 not-found row">
				<div class="page-404 col">
					<h1 class="mb-3 fs-2">404</h1>
					<p class="fs-5">Page not found.</p>
					<a href="<?php echo site_url(); ?>" class="btn btn-default">Back to home</a>
				</div>
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #content -->

<?php
get_footer();

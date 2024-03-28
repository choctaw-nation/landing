<?php
/**
 * The Archive Display for the Events
 *
 * @package ChoctawNation
 * @subpackage News
 */

get_header();
?>
<div class="container mb-5 py-5" style="margin-top:110px">
	<h1>Newsroom</h1>
	<?php if ( have_posts() ) : ?>
	<section class="results">
		<ol class="list-unstyled">
			<?php
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/news/content', 'news-preview' );
			}
			?>
		</ol>
		<?php else : ?>
		<p>No articles found.</p>
		<?php endif; ?>
	</section>
</div>
<?php
get_footer();
<?php
/**
 * Template Name: Full Width Image
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
?>
<main <?php post_class(); ?>>
	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
	<header class="entry-header featured-full-width-img height-75 bg-dark text-light mb-3" style="background-image: url('<?php echo $thumb['0']; ?>')">
		<div class="container entry-header h-100 d-flex align-items-end pb-3">
			<div>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</div>
		</div>
	</header>
	<div class="container pb-5">
		<div class="row">
			<div class="<?php echo bootscore_main_col_class(); ?>">
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
				<footer class="entry-footer">
					<?php comments_template(); ?>
				</footer>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>
<?php
get_footer();
<?php
/**
 * The News Article Preview
 *
 * @package ChoctawNation
 * @subpackage News
 */

use ChoctawNation\News\News;

$news = new News( $post->ID );
?>
<li class="row my-4 position-relative row-gap-2">
	<?php if ( $news->has_photo ) : ?>
	<div class="col-lg-5">
		<figure class="mb-0 ratio ratio-16x9">
			<?php
			$news->the_photo(
				'choctaw-news-preview',
				array(
					'class' => 'object-fit-cover',
				)
			);
			?>

		</figure>
	</div>
	<?php endif; ?>
	<div class="col d-flex flex-column">
		<?php the_title( '<h2>', '</h2>' ); ?>
		<div class="fs-6 mb-3">
			<?php $news->the_excerpt(); ?>
		</div>
		<a href="<?php the_permalink(); ?>" class="btn btn-outline-primary stretched-link d-block align-self-start mt-auto align-self-start fs-5">Read More</a>
	</div>
</li>

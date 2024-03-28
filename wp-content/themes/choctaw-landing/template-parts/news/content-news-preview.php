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
<li class="row my-4">
	<?php if ( $news->has_photo ) : ?>
	<div class="col-lg-5">
		<div class="ratio ratio-16x9">
			<?php
			$news->the_photo(
				'choctaw-news-preview',
				array(
					'class' => 'object-fit-cover',
				)
			);
			?>
		</div>
	</div>
	<?php endif; ?>
	<div class="col d-flex flex-column">
		<a href="<?php the_permalink(); ?>">
			<?php the_title( '<h2>', '</h2>' ); ?>
		</a>
		<div class='fs-5 mb-3'>
			<?php $news->the_excerpt(); ?>
		</div>
		<a href="<?php the_permalink(); ?>" class="btn btn-default d-block align-self-start mt-auto align-self-start fs-5">Read More</a>
	</div>
</li>
<?php
/**
 * The "Specials" CPT Hero Section when no hero image is present
 *
 * @package ChoctawNation
 */

$content = $args['content'];
?>
<section class="py-5" style="margin-top: var(--header-offset,110px)" ;>
	<div class=" container">
		<div class="row align-items-center row-gap-3">
			<?php if ( has_post_thumbnail() ) : ?>
			<div class="col-lg-6">
				<figure class="ratio ratio-1x1 mb-0">
					<?php
					the_post_thumbnail(
						'full',
						array(
							'class'           => 'w-100 h-100 object-fit-cover',
							'loading'         => 'eager',
							'data-spai-eager' => true,
						)
					);
					?>
				</figure>
			</div>
			<?php endif; ?>
			<div class="col">
				<h1 class="mb-0"><?php the_title(); ?></h1>
				<div class="fs-6 mb-4"><?php the_field( 'description' ); ?></div>
				<?php if ( $content->get_the_menu_link() ) : ?>
				<a class="featured-eats__menu-link fs-6 btn btn-outline-primary px-4 py-2" href="<?php echo $content->get_the_menu_link(); ?>" target="_blank" rel="noopener noreferrer">
					<i class="fa-solid fa-utensils fs-5"></i> View Menu
				</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
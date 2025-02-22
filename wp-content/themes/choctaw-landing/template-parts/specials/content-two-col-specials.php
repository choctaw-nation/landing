<?php
/**
 * Template part for displaying specials as media + text in a two column layout
 *
 * @package ChoctawNation
 */

$special        = $args['special'];
$index          = $args['index'];
$should_reverse = 0 === $index % 2 ? '' : ' flex-row-reverse';
?>
<div class="<?php echo "row row-gap-3 justify-content-center align-items-center{$should_reverse}"; ?>">
	<?php if ( $special->get_the_image() ) : ?>
	<div class="col">
		<figure class="mb-0 ratio ratio-1x1">
			<?php echo $special->get_the_image(); ?>
		</figure>
	</div>
	<?php endif; ?>
	<div class="col-lg-7">
		<div class="row justify-content-lg-end">
			<div class="col-lg-9 col-xl-10 <?php echo ! empty( $special->get_the_price() ) ? '' : 'flex-grow-1'; ?>">
				<h3 class="mb-0"><?php $special->the_title(); ?></h3>
			</div>
		</div>
		<div class="row position-relative">
			<?php if ( ! empty( $special->get_the_price() ) ) : ?>
			<div class="col-3 col-xl-2 d-none d-lg-block">
				<div class="vertical-line"></div>
			</div>
			<?php endif; ?>
			<div class="col">
				<p class="h5 text-secondary"><?php $special->the_date(); ?></p>
				<div class="fs-5"><?php $special->the_description(); ?></div>
				<?php if ( ! empty( $special->get_the_price() ) ) : ?>
					<?php $div_class = 'd-none d-lg-block ' . ( $special->has_asset() ? 'my-4' : 'mt-4' ); ?>
				<div class="<?php echo $div_class; ?>">
					<figure class="mb-0 arrow position-absolute">
						<?php get_template_part( 'template-parts/ui/content', 'double-arrow' ); ?>
					</figure>
					<p class="h5 fw-bold mb-0"><?php $special->the_price(); ?></p>
				</div>
				<?php endif; ?>
				<?php
				if ( $special->has_asset() ) {
					$special->the_asset();
				}
				?>
			</div>
		</div>

	</div>
</div>

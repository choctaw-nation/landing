<?php
/**
 * Template: Single Eat and Drink (CPT)
 * This shouldn't be viewable, but just in case.
 *
 * @package ChoctawNation
 */

use ChoctawNation\ACF\Featured_Eat;
use ChoctawNation\ACF\Title_Bar;

get_header();
$content = new Featured_Eat( $post, false )
?>
<main <?php post_class( 'd-flex flex-column row-gap-5 mb-5' ); ?>>
	<?php if ( $content->hero_image ) : ?>
	<header id="header-img" class="position-relative d-flex justify-content-center align-items-center hero__bg-container" style="height:clamp(20vw,30vw,40vw);">
		<?php $content->hero_image->the_image( 'hero__image object-fit-cover skip-lazy' ); ?>
	</header>
		<?php
		$acf_fields = array(
			'headline'    => get_the_title(),
			'subheadline' => get_field( 'description' ),
		);
		$title_bar  = new Title_Bar( get_the_ID(), $acf_fields );
		$title_bar->the_title_bar();
		?>
	<?php else : ?>
	<section class="text-bg-secondary hero__bg-container py-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10 text-center">
					<h1 class="text-white"><?php the_title(); ?></h1>
					<div class="fs-5 text-white"><?php the_field( 'description' ); ?></div>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
	<div class="container d-flex flex-column row-gap-5">
		<section class="row row-gap-4" id="details">
			<div class="col-12">
				<h2>Details</h2>
				<?php echo $content->get_the_hours( false ); ?>
			</div>
			<div class="col-auto">
				<a class="featured-eats__menu-link fs-6 btn btn-outline-primary px-4 py-2" href="<?php echo $content->get_the_menu_link(); ?>" target="_blank" rel="noopener noreferrer">
					<i class="fa-solid fa-utensils fs-5"></i> View Menu
				</a>
			</div>
		</section>
		<?php if ( $content->specials ) : ?>
		<section class="d-flex flex-column row-gap-5" id="specials">
			<div class="row">
				<div class="col text-center">
					<h2 class="h1">Specials</h2>
				</div>
			</div>
			<?php foreach ( $content->specials as $index => $special ) : ?>
				<?php $should_reverse = 0 === $index % 2 ? '' : ' flex-row-reverse'; ?>
			<div class="<?php echo "row justify-content-center{$should_reverse}"; ?>">
				<?php if ( $special->get_the_image() ) : ?>
				<div class="col">
					<figure class="mb-0 ratio ratio-1x1">
						<?php echo $special->get_the_image(); ?>
					</figure>
				</div>
				<?php endif; ?>
				<div class="col-lg-7">
					<div class="row justify-content-end">
						<div class="col-9 col-xl-10">
							<h3><?php $special->the_title(); ?></h3>
						</div>
					</div>
					<div class="row position-relative">
						<div class="col-3 col-xl-2 d-none d-md-block">
							<div class="vertical-line"></div>
						</div>
						<div class="col">
							<p class="h5 text-secondary"><?php $special->the_date(); ?></p>
							<div class="fs-5"><?php $special->the_description(); ?></div>
							<div class="py-4 d-none d-md-block">
								<figure class="mb-0 arrow position-absolute">
									<?php get_template_part( 'template-parts/ui/content', 'double-arrow' ); ?>
								</figure>
								<p class="h5 fw-bold mb-0"><?php $special->the_price(); ?></p>
							</div>
						</div>
					</div>

				</div>
			</div>
			<?php endforeach; ?>
		</section>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
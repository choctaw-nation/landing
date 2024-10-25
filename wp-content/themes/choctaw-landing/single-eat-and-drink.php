<?php
/**
 * Template: Single Eat and Drink (CPT)
 * This shouldn't be viewable, but just in case.
 *
 * @package ChoctawNation
 */

use ChoctawNation\ACF\Featured_Eat;

get_header();
$content = new Featured_Eat( $post, false )
?>
<main <?php post_class( 'd-flex flex-column row-gap-5 mb-5' ); ?>>
    <?php
	if ( $content->hero_image ) {
		get_template_part( 'template-parts/specials/section', 'hero', array( 'content' => $content ) );
	} else {
		get_template_part( 'template-parts/specials/section', 'no-hero', array( 'content' => $content ) );
	}
	?>
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
            <?php
			foreach ( $content->specials as $index => $special ) {
				get_template_part(
					'template-parts/specials/content',
					'two-col-specials',
					array(
						'special' => $special,
						'index'   => $index,
					)
				);
			}
			?>
        </section>
        <?php endif; ?>
    </div>
</main>
<?php
get_footer();
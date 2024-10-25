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
            <div class="col-lg-9 col-xl-10">
                <h3 class="mb-0"><?php $special->the_title(); ?></h3>
            </div>
        </div>
        <div class="row position-relative">
            <div class="col-3 col-xl-2 d-none d-md-block">
                <div class="vertical-line"></div>
            </div>
            <div class="col">
                <p class="h5 text-secondary"><?php $special->the_date(); ?></p>
                <div class="fs-5"><?php $special->the_description(); ?></div>
                <div class="mt-3 d-none d-md-block">
                    <figure class="mb-0 arrow position-absolute">
                        <?php get_template_part( 'template-parts/ui/content', 'double-arrow' ); ?>
                    </figure>
                    <p class="h5 fw-bold mb-0"><?php $special->the_price(); ?></p>
                </div>
            </div>
        </div>

    </div>
</div>
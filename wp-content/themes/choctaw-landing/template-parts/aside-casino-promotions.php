<?php
/**
 * Casino Promotions
 *
 * @package ChoctawNation
 */

use ChoctawNation\Promotion_Handler;

$api        = new Promotion_Handler();
$promotions = $api->get_the_promotions();
if ( ! $api->has_promotions || null === $promotions ) {
	return;
}
?>
<aside class="bg-black pt-4 pb-5" id="casino-promotions">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-white text-center">Promotions</h2>
            </div>
        </div>
        <div class="row" style="--swiper-navigation-color:white">
            <div class="col-1 position-relative">
                <div class="swiper-button-prev"></div>
            </div>
            <div class="col-10 swiper">
                <div class="swiper-wrapper align-items-stretch h-100">
                    <?php foreach ( $promotions as $promotion ) : ?>
                    <div class="swiper-slide">
                        <div class="card bg-dark text-white h-100">
                            <figure class="ratio ratio-16x9 mb-0">
                                <img src="<?php echo $promotion['image']['src']; ?>" class="card-img-top" alt="<?php echo $promotion['image']['alt']; ?>" loading="lazy" />
                            </figure>
                            <div class="card-body m-4">
                                <p class="card-title text-white fw-bold h4"><?php echo $promotion['title']; ?></p>
                                <div class="card-text fs-6 text-white mb-4"><?php echo $promotion['content']; ?></div>
                                <a href="<?php echo $promotion['link']; ?>" class="btn btn-outline-light" target="_blank">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-1 position-relative">
                <div class="swiper-button-next"></div>
            </div>
            <div class="col-12 position-relative my-5">
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</aside>

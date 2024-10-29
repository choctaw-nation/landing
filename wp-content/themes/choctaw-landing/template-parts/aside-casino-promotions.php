<?php
/**
 * Casino Promotions
 *
 * @package ChoctawNation
 */

use ChoctawNation\Promotions_Handler;

$api        = new Promotions_Handler();
$promotions = $api->get_the_promotions();
if ( ! $api->has_promotions || null === $promotions ) {
	return;
}
?>
<aside class="bg-black pt-4 pb-5" id="casino-promotions">
	<div class="container d-flex flex-column row-gap-4">
		<div class="row">
			<div class="col">
				<h2 class="text-white text-center">Promotions</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-1 position-relative">
				<div class="swiper-button-prev"></div>
			</div>
			<div class="col-10 swiper">
				<div class="swiper-wrapper align-items-stretch h-100">
					<?php foreach ( $promotions as $promotion ) : ?>
					<div class="swiper-slide h-100">
						<div class="card bg-dark text-white d-flex flex-column position-relative">
							<figure class="ratio ratio-16x9 mb-0">
								<img src="<?php echo $promotion['image']['src']; ?>" class="card-img-top" alt="<?php echo $promotion['image']['alt']; ?>" loading="lazy" />
							</figure>
							<div class="card-body m-4 d-flex flex-column">
								<p class="card-title text-white fw-bold h4"><?php echo $promotion['title']; ?></p>
								<div class="card-text fs-6 text-white mb-4">
									<div class="fst-italic mb-3"><i class="fa-regular fa-calendar"></i>&nbsp;<?php echo $promotion['acf']['dates_description']; ?></div>
									<?php echo $promotion['content']; ?>
								</div>
								<a href="<?php echo $promotion['link']; ?>" class="btn btn-outline-light mt-auto align-self-start stretched-link" target="_blank">Learn More</a>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="col-1 position-relative">
				<div class="swiper-button-next"></div>
			</div>
			<div class="col-12 position-relative">
				<div class="swiper-pagination"></div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-auto">
				<a href="https://www.choctawcasinos.com/hochatown" target="_blank" class="btn btn-outline-light">View All</a>
			</div>
		</div>
	</div>
</aside>

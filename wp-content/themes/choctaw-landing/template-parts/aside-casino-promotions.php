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
				<div class="swiper-button-prev casino-promos-button-prev"></div>
			</div>
			<div class="col-10 swiper">
				<div class="swiper-wrapper align-items-stretch h-100">
					<?php foreach ( $promotions as $promotion ) : ?>
					<div class="swiper-slide">
						<div class="card bg-dark text-white d-flex flex-column position-relative h-100">
							<figure class="ratio ratio-16x9 mb-0">
								<img src="<?php echo $promotion['image']['src']; ?>" class="card-img-top" alt="<?php echo $promotion['image']['alt']; ?>" loading="lazy" />
							</figure>
							<div class="card-body m-4 d-flex flex-column h-100">
								<h3 class="card-title text-white fw-bold h4 mb-0">
									<?php echo $promotion['title']; ?>
								</h3>
								<div class="card-text fs-6 text-white mb-4">
									<div class="fst-italic mb-3">
										<?php
										if ( ! empty( $promotion['acf']['dates_description'] ) ) {
											echo '<i class="fa-regular fa-calendar"></i>&nbsp;' . acf_esc_html( $promotion['acf']['dates_description'] );
										}
										?>
									</div>
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
				<div class="swiper-button-next casino-promos-button-next"></div>
			</div>
			<div class="col-12 position-relative mt-5">
				<div class="swiper-pagination casino-promos-pagination"></div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-auto">
				<a href="https://www.choctawcasinos.com/promotions/?locations=hochatown" target="_blank" class="btn btn-outline-light">View All</a>
			</div>
		</div>
	</div>
</aside>
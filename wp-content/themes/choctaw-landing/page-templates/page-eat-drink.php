<?php
/**
 * Template Name: Eat & Drink
 *
 * @package ChoctawNation
 * @since 0.2
 */

use ChoctawNation\ACF\Featured_Eats;
use ChoctawNation\ACF\Hero_Section;
use ChoctawNation\ACF\Restaurant_Highlight;
use ChoctawNation\ACF\Title_Bar;

wp_enqueue_script( 'eat-drink-swiper' );
wp_enqueue_style( 'eat-drink-swiper' );
get_header();
$hero = new Hero_Section( get_the_ID(), get_field( 'hero' ) );
$hero->the_hero();
$title_bar = new Title_Bar( get_the_ID(), get_field( 'title_bar' ) );
$title_bar->the_title_bar();

$featured_eats = get_field( 'featured_eats' );
foreach ( $featured_eats as $featured_eat ) {
	$feature = new Featured_Eats( get_the_ID(), $featured_eat );
	$feature->the_section();
}
?>

<div id="containers" class="container-fluid blue-topo-bg py-5">
	<div class="container-fluid container-xl">
		<div class="row justify-content-center">
			<div class="col-10">
				<div class="swiper" id='restaurant-swiper' style="--swiper-navigation-sides-offset:20px;--swiper-pagination-color:white;--swiper-navigation-color:white">
					<div class="swiper-wrapper">
						<?php
						$restaurant_highlights = get_field( 'restaurant_highlights' );
						foreach ( $restaurant_highlights as $restaurant ) {
							$highlight = new Restaurant_Highlight( get_the_ID(), $restaurant );
							$highlight->the_card( 'swiper-slide', 'h2' );
						}
						?>
					</div>
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
					<div class="swiper-pagination"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
$the_mercantile = new Featured_Eats( get_the_ID(), get_field( 'the_mercantile' ) );
$the_mercantile->the_section();
get_footer();
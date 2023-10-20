<?php
/**
 * Template Name: Eat & Drink
 *
 * @package ChoctawNation
 * @since 0.2
 */

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
	<div class="container">
		<div class="row">
			<?php
			$restaurant_highlights = get_field( 'restaurant_highlights' );
			foreach ( $restaurant_highlights as $restaurant ) {
				$highlight = new Restaurant_Highlight( get_the_ID(), $restaurant );
				$highlight->the_card( 'col-12 col-lg-4 px-4 py-5', 'h2' );
			}
			?>
		</div>
	</div>
</div>
<?php
$the_mercanitle = new Featured_Eats( get_the_ID(), get_field( 'the_mercantile' ) );
$the_mercanitle->the_section();
get_footer();
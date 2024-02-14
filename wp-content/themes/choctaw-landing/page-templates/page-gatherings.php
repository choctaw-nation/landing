<?php
/**
 * Template Name: Gatherings
 *
 * @package ChoctawNation
 * @since 0.2
 */

use ChoctawNation\ACF\Card;
use ChoctawNation\ACF\Hero_Section;
use ChoctawNation\ACF\Image;
use ChoctawNation\ACF\Title_Bar;
use ChoctawNation\ACF\Two_Col_Section;

get_header();
$hero = new Hero_Section( get_the_ID(), get_field( 'hero' ) );
$hero->the_hero();
$title_bar = new Title_Bar( get_the_ID(), get_field( 'title_bar' ) );
$title_bar->the_title_bar();

$features_group = get_field( 'features' );
$banner         = new Image( $features_group['banner_image'] );
get_template_part(
	'template-parts/content',
	'banner-header',
	array(
		'url' => $banner->src,
		'id'  => 'featured-sections',
	)
);
?>

<section id="features">
	<?php
	foreach ( $features_group['featured_sections'] as $featured_item ) {
		$feature = new Two_Col_Section( get_the_ID(), $featured_item, 'div' );
		$feature->the_section();
	}
	?>
</section>

<section id="teammates" class="container my-5">
	<div class="row">
		<div class="col">
			<h2>Meet the Team</h2>
		</div>
	</div>
	<?php
	foreach ( $features_group['meet_the_team'] as $row ) {
		echo '<div class="row">';
		foreach ( $row as $teammate ) {
			$teammate_card = new Card( get_the_ID(), $teammate );
			$teammate_card->the_card( 'col-12 col-md-6 col-xl-3 p-3' );
		}
		echo '</div>';
	}
	?>
</section>


<?php
get_footer();

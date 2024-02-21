<?php
/**
 * Template Name: The Mercantile
 *
 * @package ChoctawNation
 * @since 0.2
 */

use ChoctawNation\ACF\Hero_Section;
use ChoctawNation\ACF\Link_Card;
use ChoctawNation\ACF\Title_Bar;
use ChoctawNation\ACF\Two_Col_Section;

get_header();

// HERO
$hero = new Hero_Section( get_the_ID(), get_field( 'hero' ) );
$hero->the_hero();

// TITLE BAR (SECTION 2)
$title_bar = new Title_Bar( get_the_ID(), get_field( 'title_bar' ) );
$title_bar->the_title_bar();

// SECTION 3
echo "<section id='section-3' class='container'>";
$section_3         = get_field( 'section_3' );
$section_3_columns = $section_3['section_3_columns'];
foreach ( $section_3_columns as $row ) {
	echo '<div class="row">';
	foreach ( $row as $col ) {
		$col_card = new Link_Card( get_the_ID(), $col );
		$col_card->the_card( 'col-12 col-md-6 col-lg-4 my-5 my-md-0', 'h2' );
	}
	echo '</div>';
}
echo '</section>';

// SECTION 4 (TWO-COL REPEATER)
$features = get_field( 'features' );
foreach ( $features as $feature ) {
	$feat = new Two_Col_Section( get_the_ID(), $feature );
	$feat->the_section();
}

get_footer();

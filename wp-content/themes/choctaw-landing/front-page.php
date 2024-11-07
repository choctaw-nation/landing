<?php
/**
 * Front Page
 *
 * @package ChoctawNation
 */

use ChoctawNation\ACF\Full_Width_Section;
use ChoctawNation\ACF\Hero_Section;
use ChoctawNation\ACF\Two_Col_Section;
use ChoctawNation\Asset_Loader;
use ChoctawNation\Enqueue_Type;

new Asset_Loader( 'frontPage', Enqueue_Type::script, 'pages' );
get_header();
echo "<h1 class='visually-hidden'>Choctaw Landing</h1>";
$hero = new Hero_Section( get_the_ID(), get_field( 'hero' ) );
$hero->the_hero();
get_template_part( 'template-parts/form', 'booking-module' );

$sections  = get_field( 'page_content' );
$has_modal = false;
echo "<div class='d-flex flex-column row-gap-5 my-5'>";
foreach ( $sections as $section ) {
	if ( $section['is_image_full_width'] ) {
		$two_col_section = new Full_Width_Section( get_the_ID(), $section );
	} else {
		$two_col_section = new Two_Col_Section( get_the_ID(), $section );
		if ( $two_col_section->has_modal ) {
			$has_modal = true;
		}
	}
	$two_col_section->the_section();
}
echo '</div>';
if ( $has_modal ) {
	get_template_part( 'template-parts/content', 'modal' );
}
get_footer();

<?php
/**
 * Template Name: Blank
 *
 * @package ChoctawNation
 */

use ChoctawNation\ACF\Full_Width_Section;
use ChoctawNation\ACF\Title_Bar;
use ChoctawNation\ACF\Two_Col_Section;

get_header();
?>
<main id="main" class="site-main" style="margin-top: 110px;">
	<h1><?php the_title(); ?></h1>
	<?php
	$title_bar_content = get_field( 'title_bar' );
	if ( $title_bar_content ) {
		$title_bar = new Title_Bar( get_the_ID(), $title_bar_content );
		$title_bar->the_title_bar();
	}

	$sections = get_field( 'page_content' );
	foreach ( $sections as $section ) {
		if ( $section['is_image_full_width'] ) {
			$two_col_section = new Full_Width_Section( get_the_ID(), $section );
		} else {
			$two_col_section = new Two_Col_Section( get_the_ID(), $section );
		}
		$two_col_section->the_section();
	}
	?>
</main>

<?php
get_footer();
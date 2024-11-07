<?php
/**
 * Template Name: Events
 *
 * @package ChoctawNation
 */

use ChoctawNation\ACF\Full_Width_Section;
use ChoctawNation\ACF\Hero_Section;
use ChoctawNation\ACF\Image;
use ChoctawNation\ACF\Title_Bar;
use ChoctawNation\ACF\Two_Col_Section;
use ChoctawNation\Asset_Loader;
use ChoctawNation\Enqueue_Type;

new Asset_Loader( 'events', Enqueue_Type::script, 'pages' );
get_header();
$hero      = new Hero_Section( get_the_ID(), get_field( 'hero' ) );
$title_bar = new Title_Bar( get_the_ID(), get_field( 'title_bar' ) );

$hero->the_hero();
$title_bar->the_title_bar();
get_template_part( 'template-parts/events/content', 'featured-events-swiper' );
$event_callouts = get_field( 'event_callouts' );
if ( ! empty( $event_callouts['banner'] ) ) {
	$banner = new Image( $event_callouts['banner'] );
}
echo '<div class="d-flex flex-column row-gap-5 my-5">';
foreach ( $event_callouts['callouts'] as $callout ) {
	if ( $callout['is_image_full_width'] ) {
		$two_col_section = new Full_Width_Section( get_the_ID(), $callout );
	} else {
		$two_col_section = new Two_Col_Section( get_the_ID(), $callout );
		if ( $two_col_section->has_modal ) {
			$has_modal = true;
		}
	}
	$two_col_section->the_section();
}
if ( $has_modal ) {
	get_template_part( 'template-parts/content', 'modal' );
}
echo '</div>';
get_footer();

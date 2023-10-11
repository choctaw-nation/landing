<?php
/**
 * Template Name: Homepage
 *
 * @package ChoctawNation
 * @since 0.1
 */

get_header();
$hero = new Hero_Section( get_the_ID(), get_field( 'hero' ) );

$hero->the_hero();
get_template_part( 'template-parts/form', 'booking-module' );

// TODO: Figure out what to do with these section ids.
$section_ids = array( 'luxury', 'adventure', 'winner', 'meet' );


$sections = get_field( 'page_content' );
foreach ( $sections as $section ) {
	$two_col_section = new Two_Col_Section( get_the_ID(), $section );
	$two_col_section->the_section();
}

get_footer();
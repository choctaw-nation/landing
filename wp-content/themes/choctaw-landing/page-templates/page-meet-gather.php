<?php
/**
 * Template Name: Meet & Gather
 *
 * @package ChoctawNation
 */

use ChoctawNation\ACF\Full_Width_Section;
use ChoctawNation\ACF\Hero_Section;
use ChoctawNation\ACF\Title_Bar;
use ChoctawNation\ACF\Two_Col_Section;

get_header();
$hero_content = get_field( 'hero' );
if ( $hero_content ) {
	$hero = new Hero_Section( get_the_ID(), $hero_content );
	$hero->the_hero();
}
$title_bar_content = get_field( 'title_bar' );
if ( $title_bar_content ) {
	$title_bar = new Title_Bar( get_the_ID(), $title_bar_content );
	$title_bar->the_title_bar();
}
echo '<div class="d-flex flex-column my-5 row-gap-5">';
$sections = get_field( 'page_content' );
if ( ! empty( $sections ) ) {
	foreach ( $sections as $section ) {
		if ( $section['is_image_full_width'] ) {
			$two_col_section = new Full_Width_Section( get_the_ID(), $section );
		} else {
			$two_col_section = new Two_Col_Section( get_the_ID(), $section );
		}
		$two_col_section->the_section();
	}
}

if ( have_rows( 'rooms' ) ) {
	get_template_part( 'template-parts/content', 'room-details' );
} ?>
<?php $contact_form = get_field( 'contact_form' ); ?>
<?php if ( $contact_form ) : ?>
<section class="container" id="contact-us">
    <div class="row">
        <div class="col-12">
            <h2>Contact Us to Reserve Your Space</h2>
            <?php echo do_shortcode( '[gravityform id="' . $contact_form . '" title="false"]' ); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php
echo '</div>';
get_footer();
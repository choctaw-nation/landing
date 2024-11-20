<?php
/**
 * The "Specials" CPT Hero Section
 *
 * @package ChoctawNation
 */

use ChoctawNation\ACF\Title_Bar;

$content = $args['content'];
if ( ! $content ) {
	return;
}
?>
<header id="header-img" class="position-relative d-flex justify-content-center align-items-center hero__bg-container mx-auto" style="height:clamp(20vw,30vw,40vw);">
	<?php $content->hero_image->the_image( 'hero__image object-fit-cover', false ); ?>
</header>
<?php
$acf_fields = array(
	'headline'    => get_the_title(),
	'subheadline' => get_field( 'description' ),
);
$title_bar  = new Title_Bar( get_the_ID(), $acf_fields );
$title_bar->the_title_bar();
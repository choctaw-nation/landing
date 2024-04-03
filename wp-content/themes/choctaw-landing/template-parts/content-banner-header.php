<?php
/**
 * The Full-Width Image Banner that labels a new section
 *
 * @since 0.2
 * @package ChoctawNation
 */

$url           = $args['url'] ?? null;
$srcset        = $args['srcset'] ?? null;
$banner_title  = empty( $args['title']['text'] ) ? '' : $args['title']['text'];
$title_element = isset( $args['title']['element'] ) ? $args['title']['element'] : 'h2';
$title_class   = isset( $args['title']['class'] ) ? $args['title']['class'] : 'text-light mb-4';

if ( empty( $args['id'] ) ) {
	$banner_id = cno_get_the_section_id( $banner_title );
} else {
	$banner_id = isset( $args['id'] ) ?: '';
}
?>
<header id="<?php echo $banner_id; ?>" class="banner-bg-header position-relative container-fluid my-5 g-0" style='height:600px'>
	<?php if ( $url ) : ?>
	<div class="banner-bg-header__image--blur top-0 d-none d-xxl-block position-absolute z-1 w-100 h-100">
		<img src="<?php echo $url; ?>" class='w-100 h-100 object-fit-cover mx-auto d-block' <?php echo $srcset ? "srcset='{$srcset}'" : ''; ?> aria-hidden="true" loading='lazy' />
	</div>
	<img src="<?php echo $url; ?>" class='position-relative w-100 h-100 z-2 object-fit-cover mx-auto d-block' style='max-width:1920px' <?php echo $srcset ? "srcset='{$srcset}'" : ''; ?>
		aria-hidden="true" loading='lazy' />
	<?php else : ?>
	<div class="banner-bg-header__color position-absolute z-2 mx-auto w-100 h-100 bg-primary"></div>
	<?php endif; ?>
</header>

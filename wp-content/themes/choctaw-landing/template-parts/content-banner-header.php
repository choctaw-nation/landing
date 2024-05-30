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
	$banner_id = isset( $args['id'] ) ?: 'id="' . $args['id'] . '"';
}
?>
<div <?php echo $banner_id; ?> class="banner-bg-header position-relative container-fluid my-5 g-0 overflow-hidden d-flex flex-column">
	<?php if ( $url ) : ?>
	<img src="<?php echo $url; ?>" class="banner-bg-header__image--blur d-none d-xxl-block position-absolute z-n1 object-fit-cover w-100 h-100"
		 <?php echo $srcset ? "srcset='{$srcset}'" : ''; ?> aria-hidden="true" alt="" loading="lazy" />
	<img src="<?php echo $url; ?>" class="banner-bg-header__image mx-auto w-100 h-auto" <?php echo $srcset ? "srcset='{$srcset}'" : ''; ?> aria-hidden="true" alt="" loading="lazy" />
	<?php else : ?>
	<div class="banner-bg-header__color position-absolute z-2 mx-auto w-100 h-100 bg-primary"></div>
	<?php endif; ?>
</div>

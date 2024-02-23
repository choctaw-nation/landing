<?php
/**
 * The Full-Width Image Banner that labels a new section
 *
 * @since 0.2
 * @package ChoctawNation
 */

$url           = $args['url'] ?? null;
$banner_title  = empty( $args['title']['text'] ) ? '' : $args['title']['text'];
$title_element = isset( $args['title']['element'] ) ? $args['title']['element'] : 'h2';
$title_class   = isset( $args['title']['class'] ) ? $args['title']['class'] : 'text-light mb-4';

if ( empty( $args['id'] ) ) {
	$banner_id = cno_get_the_section_id( $banner_title );
} else {
	$banner_id = isset( $args['id'] ) ?: '';
}
?>
<header id="<?php echo $banner_id; ?>" class="banner-bg-header position-relative container-fluid my-5 g-0">
	<?php if ( $url ) : ?>
	<div class="banner-bg-header__image--blur d-none d-xxl-block position-absolute z-1 w-100 h-100" style="background-image: url('<?php echo $url; ?>');"></div>
	<div class="banner-bg-header__image position-absolute z-2 mx-auto w-100 h-100" style="background-image: url('<?php echo $url; ?>');"></div>
	<?php else : ?>
	<div class="banner-bg-header__color position-absolute z-2 mx-auto w-100 h-100 bg-primary"></div>
	<?php endif; ?>
	<div class="container position-relative z-3">
		<div class="row">
			<div class="col-12 d-flex align-items-end" style="height: 600px;">
				<?php echo "<{$title_element} class='{$title_class}'>{$banner_title}</{$title_element}>"; ?>
			</div>
		</div>
	</div>
</header>

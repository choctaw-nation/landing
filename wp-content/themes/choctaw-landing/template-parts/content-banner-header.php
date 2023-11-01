<?php
/**
 * The Full-Width Image Banner that labels a new section
 *
 * @since 0.2
 * @package ChoctawNation
 */

$url           = $args['url'];
$banner_title  = empty( $args['title']['text'] ) ? '' : $args['title']['text'];
$banner_id     = empty( $args['id'] ) ? cno_get_the_section_id( $args['title']['text'] ) : $args['id'];
$title_element = isset( $args['title']['element'] ) ? $args['title']['element'] : 'h2';
$title_class   = isset( $args['title']['class'] ) ? $args['title']['class'] : 'text-light mb-4';

?>
<header id="<?php echo $banner_id; ?>" class="container-fluid my-5 banner-bg-header" style="background: url('<?php echo $url; ?>');">
	<div class="container">
		<div class="row">
			<div class="col-12 d-flex align-items-end" style="height: 600px;">
				<?php echo "<{$title_element} class='{$title_class}'>{$banner_title}</{$title_element}>"; ?>
			</div>
		</div>
	</div>
</header>
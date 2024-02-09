<?php
/**
 * The template for displaying carousel content
 */

$counter = 0;
?>
<div id="renderImgCarousel" class="carousel slide" data-bs-ride="carousel">
	<div class="carousel-inner" role="listbox">
		<?php
		while ( have_rows( 'gallery_images' ) ) :
			the_row();
			$image           = get_sub_field( 'image' );
			$carousel_class  = 'carousel-item' . ( ( 0 === $counter ) ? ' active' : '' );
			$gallery_content = '<a href="' . $image['url'] . '">' . wp_get_attachment_image( $image['ID'], 'carousel' ) . '</a>';
			?>
		<div class="<?php echo $carousel_class; ?>">
			<div class="col-md-6 px-5">
				<?php
				if ( function_exists( 'slb_activate' ) ) {
					$gallery_content = slb_activate( $gallery_content );
				}
				echo $gallery_content;
				++$counter;
				?>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
	<a class="carousel-control-prev bg-transparent" href="#renderImgCarousel" role="button" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
	</a>
	<a class="carousel-control-next bg-transparent" href="#renderImgCarousel" role="button" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
	</a>
</div>

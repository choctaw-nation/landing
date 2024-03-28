<?php
/**
 * Template Name: Stay
 *
 * @package ChoctawNation
 */

use ChoctawNation\ACF\Card;
use ChoctawNation\ACF\Hero_Section;
use ChoctawNation\ACF\Image;
use ChoctawNation\ACF\Title_Bar;
use ChoctawNation\ACF\Two_Col_Section;
use ChoctawNation\Asset_Loader;
use ChoctawNation\Enqueue_Type;

new Asset_Loader( 'stay', Enqueue_Type::both, 'pages' );
get_header();

$hero = new Hero_Section( get_the_ID(), get_field( 'hero' ) );
$hero->the_hero();
get_template_part( 'template-parts/form', 'booking-module' );
$title_bar = new Title_Bar( get_the_ID(), get_field( 'title_bar' ), false );
$title_bar->the_title_bar();
$room_images = get_field( 'room_images' );
?>
<section id="rooms" class="container mb-5" style="--swiper-navigation-color:var(--bs-primary);--swiper-navigation-sides-offset:2px;">
	<?php if ( $room_images ) : ?>
	<div class="row">
		<div class="col-1 position-relative p-0">
			<div class="swiper-button-prev"></div>
		</div>
		<div class="swiper col-10" id="rooms-gallery">
			<div class="swiper-wrapper">
				<?php foreach ( $room_images as $room_image ) : ?>
				<div class="swiper-slide">
					<figure class="ratio ratio-1x1">
						<?php
						echo wp_get_attachment_image(
							$room_image['ID'],
							'full',
							false,
							array(
								'loading' => 'lazy',
								'class'   => 'object-fit-cover w-100 h-100',
							)
						);
						?>
					</figure>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="col-1 position-relative p-0">
			<div class="swiper-button-next"></div>
		</div>
		<?php endif; ?>
	</div>
	<div class="row d-lg-none justify-content-center">
		<div class="col-auto text-center p-0">
			<a href="#" class="btn btn-primary rounded-0 text-capitalize fs-5">Book Now</a>
		</div>
	</div>
</section>

<?php
$amenities_group = get_field( 'amenities' );
$banner          = new Image( $amenities_group['amenities_banner'] );
get_template_part(
	'template-parts/content',
	'banner-header',
	array(
		'url'    => $banner->src,
		'srcset' => $banner->srcset,
	)
);
?>
<section id='featured-amenities' class="container-fluid gx-0">
	<?php
	$featured_amenities = $amenities_group['featured_amenities'];
	foreach ( $featured_amenities as $featured_amenity ) {
		$feature = new Two_Col_Section( get_the_ID(), $featured_amenity, 'div' );
		$feature->the_section();
	}
	?>
</section>


<section id="amenities-list" class="container my-5">
	<div class="row">
		<div class="col-12">
			<h2 class='fs-1'>Amenities</h2>
		</div>
		<?php
		$amenities_columns = $amenities_group['amenities_columns'];
		foreach ( $amenities_columns as $row ) {
			echo '<div class="row">';
			foreach ( $row as $amenity ) {
				$amenity_card = new Card( get_the_ID(), $amenity );
				$amenity_card->the_card( 'col-12 col-md-6 col-xl-3 p-3' );
			}
			echo '</div>';
		}
		?>
	</div>
</section>

<?php
get_footer();
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
					<a href="<?php echo $room_image['url']; ?>" class="ratio ratio-1x1 lightbox-init lightbox-init" data-gallery="rooms-gallery">
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
					</a>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="col-1 position-relative p-0">
			<div class="swiper-button-next"></div>
		</div>
		<?php endif; ?>
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

<?php $property_map_fields = get_field( 'property_map' ); ?>
<?php if ( ! empty( $property_map_fields['preview_image'] ) ) : ?>
<?php $property_map = new Image( $property_map_fields['preview_image'] ); ?>
<section class="container my-5">
	<div class="row row-gap-4">
		<div class="col-lg-8 flex-grow-1">
			<figure data-bs-toggle="modal" data-bs-target="#property-map-modal">
				<?php $property_map->the_image( 'w-100 h-100 object-fit-contain' ); ?>
			</figure>
		</div>
		<?php if ( ! empty( $property_map_fields['downloadable_pdf'] ) ) : ?>
		<div class="col-lg-4 d-flex flex-column justify-content-center">
			<a href="<?php echo $property_map_fields['downloadable_pdf']['url']; ?>" class='btn btn-primary text-capitalize fs-5 align-self-center align-self-lg-start' target='_blank'>
				View Property Map (PDF)
			</a>
		</div>
		<?php endif; ?>
	</div>
</section>
<div class="modal fade" tabindex="-1" id="property-map-modal" aria-labelledby="property-map-modal-title">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="property-map-modal-title">Property Map</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?php $property_map->the_image( 'w-100 h-100 object-fit-contain' ); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<?php
endif;
get_footer();
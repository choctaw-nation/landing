<?php
/**
 * Template Name: Stay
 *
 * @package ChoctawNation
 */

get_header();

$hero = new Hero_Section( get_the_ID(), get_field( 'hero' ) );
$hero->the_hero();
get_template_part( 'template-parts/form', 'booking-module' );
$title_bar = new Title_Bar( get_the_ID(), get_field( 'title_bar' ), false );
$title_bar->the_title_bar();
?>

<section id="room-list" class="container my-5">
	<div class="row">
		<div class="col-12">
			<h2>Room Types</h2>
		</div>
	</div>
	<div class="row">
		<?php
		$room_types = get_field( 'room_types' );
		foreach ( $room_types as $room_type ) {
			$room = new Room_Types( get_the_ID(), $room_type );
			$room->the_card( 'col-12 col-xl-6 pt-3 pb-5' );
		}
		?>
	</div>
</section>

<?php
$amenities_group = get_field( 'amenities' );
$banner          = new ACF_Image( $amenities_group['amenities_banner'] );
get_template_part(
	'template-parts/content',
	'banner-header',
	array(
		'url'   => $banner->src,
		'title' => array(
			'text' => 'Amenities',
		),
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
			<h2>Amenities</h2>
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

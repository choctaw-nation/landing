<?php
/**
 * Template Name: Things To Do
 *
 * @package ChoctawNation
 * @since 0.2
 */

get_header();
$hero = new Hero_Section( get_the_ID(), get_field( 'hero' ) );
$hero->the_hero();
$title_bar = new Title_Bar( get_the_ID(), get_field( 'title_bar' ) );
$title_bar->the_title_bar();
$weather_widget_photo = new ACF_Image( get_field( 'weather_widget_photo' ) );
?>

<aside id="weather" class="container">
	<div class="row pt-2 pb-5">
		<div class="col-12 col-xl-6 col-xxl-8 py-3">
			<?php $weather_widget_photo->the_image( 'w-100' ); ?>
		</div>
		<div id="weather-widget" class="col-12 col-xl-6 col-xxl-4 text-center py-3 px-4">
			<div class="row position-relative h-100">
				<div class="col-12 justify-content-around d-flex flex-column">
					<div class="row">
						<div class="col">
							<h2 class="my-3"><i class="fa-solid fa-sun"></i> 74°</h2>
							<div class="mb-2">Friday, 14 April, 13:50</div>
							<div class="mb-2">Sunny Day</div>
						</div>
					</div>

					<div class="row my-4">
						<div class="col-4">
							<div><i class="fa-solid fa-wind"></i></div>
							<div class="my-2"><span class="h3">11</span><small>mph</small></div>
							<div>WIND</div>
						</div>
						<div class="col-4">
							<div><i class="fa-solid fa-cloud-showers-heavy"></i></div>
							<div class="my-2"><span class="h3">2</span><small>%</small></div>
							<div>RAIN</div>
						</div>
						<div class="col-4">
							<div><i class="fa-solid fa-droplet"></i></div>
							<div class="my-2"><span class="h3 my-3">30</span><small>%</small></div>
							<div>HUMIDITY</div>
						</div>
					</div>

					<div class="row">
						<div class="col-4 col-md-2 mb-3">
							<div class="day">TUES</div>
							<div class="my-3"><i class="fa-solid fa-sun"></i></div>
							<div>81°</div>
						</div>
						<div class="col-4 col-md-2 mb-3">
							<div class="day">WED</div>
							<div class="my-3"><i class="fas fa-cloud-sun"></i></div>
							<div>79°</div>
						</div>
						<div class="col-4 col-md-2 mb-3">
							<div class="day">THU</div>
							<div class="my-3"><i class="fas fa-cloud-showers-heavy"></i></div>
							<div>71°</div>
						</div>
						<div class="col-4 col-md-2 mb-3">
							<div class="day">FRI</div>
							<div class="my-3"><i class="fa-solid fa-sun"></i></div>
							<div>87°</div>
						</div>
						<div class="col-4 col-md-2 mb-3">
							<div class="day">SAT</div>
							<div class="my-3"><i class="fas fa-cloud-sun"></i></div>
							<div>77°</div>
						</div>
						<div class="col-4 col-md-2 mb-3">
							<div class="day">SUN</div>
							<div class="my-3"><i class="fas fa-cloud-rain"></i></div>
							<div>68°</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</aside>

<section id="featured-activities">
	<?php
	$featured_activities = get_field( 'featured_activities' );
	foreach ( $featured_activities as $featured_activity ) {
		$feature = new Two_Col_Section( get_the_ID(), $featured_activity, 'div' );
		$feature->the_section();
	}
	?>
</section>

<?php
$attractions = get_field( 'attractions' );
$banner      = new ACF_Image( $attractions['banner_image'] );
?>

<header id="area-attractions" class="container-fluid my-5 banner-bg-header" style="background: url('<?php echo $banner->src; ?>');">
	<div class="container">
		<div class="row">
			<div class="col-12 d-flex align-items-end" style="height: 600px;">
				<h2 class="text-light mb-4">Area Attractions</h2>
			</div>
		</div>
	</div>
</header>

<section id="area-attractions-list" class="container my-5">
	<?php
		$attractions_columns = $attractions['attractions_columns'];
	foreach ( $attractions_columns as $row ) {
		echo '<div class="row">';
		foreach ( $row as $attraction ) {
			$attraction_card = new Card( get_the_ID(), $attraction );
			$attraction_card->the_card();
		}
		echo '</div>';
	}
	?>
</section>


<?php
get_footer();
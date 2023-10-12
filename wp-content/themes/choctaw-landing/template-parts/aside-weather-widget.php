<?php
/**
 * The Weather Widget, powered by Open Weather Map
 *
 * @link https://openweathermap.org/forecast5#list
 * @package ChoctawNation
 * @since 0.2
 */

use ChoctawNation\Weather_Widget;

// Include the class
require_once get_stylesheet_directory() . '/inc/weather-widget/class-weather-widget.php';

$weather      = new Weather_Widget();
$weather_data = $weather->get_the_weather();
$today        = $weather_data[0];

?>
<div id="weather-widget" class="col-12 col-xl-6 col-xxl-4 text-center py-3 px-4">
	<div class="row position-relative h-100">
		<div class="col-12 justify-content-around d-flex flex-column">
			<div class="row">
				<div class="col">
					<h2 class="my-3"><i class="fa-solid fa-sun"></i> <?php $today->the_temp(); ?>°</h2>
					<div class="mb-2"><?php $today->the_full_date(); ?></div>
					<div class="mb-2 text-capitalize"><?php $today->the_description(); ?></div>
				</div>
			</div>

			<div class="row my-4">
				<div class="col-4">
					<div><i class="fa-solid fa-wind"></i></div>
					<div class="my-2"><span class="h3"><?php $today->the_wind(); ?></span><small>mph</small></div>
					<div>WIND</div>
				</div>
				<div class="col-4">
					<div><i class="fa-solid fa-cloud-showers-heavy"></i></div>
					<div class="my-2"><span class="h3"><?php $today->the_chance_of_rain(); ?></span><small>%</small></div>
					<div>RAIN</div>
				</div>
				<div class="col-4">
					<div><i class="fa-solid fa-droplet"></i></div>
					<div class="my-2"><span class="h3 my-3"><?php $today->the_humidity(); ?></span><small>%</small></div>
					<div>HUMIDITY</div>
				</div>
			</div>

			<div class="row">

				<?php $total = count( $weather_data ); ?>
				<?php for ( $i = 1; $i < $total; $i++ ) : ?>
				<?php $day = $weather_data[ $i ]; ?>
				<div class="col-4 col-md-2 mb-3">
					<div class="day"><?php $day->the_day(); ?></div>
					<div class="my-3"><i class="fa-solid fa-sun"></i></div>
					<div><?php $day->the_temp(); ?>°</div>
				</div>
				<?php endfor; ?>
			</div>

		</div>
	</div>
</div>
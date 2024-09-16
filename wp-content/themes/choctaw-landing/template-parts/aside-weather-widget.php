<?php
/**
 * The Weather Widget, powered by Open Weather Map
 *
 * @link https://openweathermap.org/forecast5#list
 * @package ChoctawNation
 * @since 0.2
 */

use ChoctawNation\WeatherWidget\Weather_Widget;

$weather = new Weather_Widget();
?>
<div id="weather-widget" class="col-12 col-lg-6 col-xl-4 text-center position-relative overflow-hidden d-flex flex-column align-items-stretch text-white">
	<img src="<?php echo get_stylesheet_directory_uri() . '/img/bg-images/brown-basket-bg.webp'; ?>" alt="" aria-hidden="true" class="position-absolute z-n1 bg-image h-100" loading="lazy" />
	<?php if ( $weather->has_error() ) : ?>
	<div class="alert alert-warning">
		<?php echo 'Weather Widget Error: ' . $weather->get_error_message(); ?>
	</div>
	<?php else : ?>
		<?php
		$icon_generator = new Bootstrap_Icons();
		$today          = $weather->today();
		?>
	<div class="row position-relative h-100">
		<div class="col-12 justify-content-around d-flex flex-column">
			<div class="row">
				<div class="col">
					<h2 class="my-3 text-white"><?php $today->the_icon(); ?> <?php $today->the_temp(); ?>°</h2>
					<div class="mb-2"><?php $today->the_full_date(); ?></div>
					<div class="mb-2 text-capitalize"><?php $today->the_description(); ?></div>
				</div>
			</div>

			<div class="row my-4 justify-content-evenly">
				<div class="col-4">
					<div><?php $icon_generator->the_icon( 'windy' ); ?></div>
					<div class="my-2">
						<span class="h3 text-white"><?php $today->the_wind(); ?></span><small>mph</small>
					</div>
					<div>WIND</div>
				</div>
				<div class="col-4">
					<div><?php $icon_generator->the_icon( 'rainy' ); ?></i></div>
					<div class="my-2">
						<span class="h3 text-white"><?php $today->the_chance_of_rain(); ?></span><small>%</small>
					</div>
					<div>RAIN</div>
				</div>
				<div class="col-4">
					<div><?php $icon_generator->the_icon( 'droplet' ); ?></div>
					<div class="my-2">
						<span class="h3 text-white my-3"><?php $today->the_humidity(); ?></span><small>%</small>
					</div>
					<div>HUMIDITY</div>
				</div>
			</div>

			<div class="row justify-content-evenly flex-sm-nowrap">
				<?php
				$weather_data = $weather->get_the_weather_data();
				$total        = count( $weather_data );
				?>
				<?php for ( $i = 1; $i < $total; $i++ ) : ?>
					<?php
					$day_index = array_values( $weather_data )[ $i ]->get_the_day();
					$day       = $weather_data[ $day_index ];
					?>
				<div class="col-2 col-md-2 mb-3">
					<div class="day"><?php $day->the_day(); ?></div>
					<div class="my-3"><?php $day->the_icon(); ?></div>
					<div><?php $day->the_temp(); ?>°</div>
				</div>
				<?php endfor; ?>
			</div>

		</div>
	</div>
	<?php endif; ?>
</div>

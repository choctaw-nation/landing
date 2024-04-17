<?php
/**
 * The Weather Widget, powered by Open Weather Map
 *
 * @link https://openweathermap.org/forecast5#list
 * @package ChoctawNation
 * @since 0.2
 */

use ChoctawNation\Weather_Widget;

// Include the Weather Widget Class
require_once get_stylesheet_directory() . '/inc/weather-widget/class-weather-widget.php';

// Include the Bootstrap Icons
require_once get_stylesheet_directory() . '/inc/weather-widget/class-bootstrap-icons.php';

$things_to_do_page_id = 49;
$weather              = new Weather_Widget( $things_to_do_page_id );
$weather_data         = $weather->get_the_weather();
?>
<div id="weather-widget" class="col-12 col-lg-6 col-xl-4 text-center position-relative overflow-hidden d-flex flex-column align-items-stretch">
	<img src="<?php echo get_stylesheet_directory_uri() . '/img/bg-images/brown-basket-bg.webp'; ?>" alt="" aria-hidden="true" class="position-absolute z-n1 top-0 w-100 h-100"
		loading="lazy" />
	<?php if ( is_wp_error( $weather_data ) ) : ?>
	<div class="alert alert-warning">
		<?php echo 'Weather Widget Error: ' . $weather_data->get_error_message( 'weather_widget' ); ?>
	</div>
	<?php else : ?>
		<?php
		$icon_generator = new Bootstrap_Icons();
		$today_index    = array_values( $weather_data )[0]->get_the_day();
		$today          = $weather_data[ $today_index ];
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
				<?php $total = count( $weather_data ); ?>
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

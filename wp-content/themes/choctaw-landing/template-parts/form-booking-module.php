<?php
/**
 * The Booking Module Markup.
 * Powered by JS Libraries Moment, jQuery and Date Range Picker.
 *
 * @package ChoctawNation
 * @since 0.2
 */

cno_enqueue_date_range_picker();
?>
<form id="booking-bar" class="container position-relative overflow-hidden z-3 p-0">
	<img src="
	<?php
	echo get_stylesheet_directory_uri() . '/img/bg-images/brown-basket-bg.webp';
	?>
	" class="top-0 w-100 h-auto position-absolute z-1" alt="" aria-hidden="true" loading="lazy" />
	<div class="row py-5 px-3 position-relative z-2">
		<div class="col-12 col-xl-4 d-flex flex-column align-items-center justify-content-end pb-3">
			<h2 class="fw-bold text-uppercase text-white mb-0">Stay With Us</h2>
		</div>
		<div class="col-12 col-md-6 col-xl-3 d-flex flex-column justify-content-center pb-3">
			<label for="startDate">Arrival-Departure Date</label>
			<div class="d-block position-relative">
				<input id="startDate" class="form-control text-white" type="text" name="dates" />
				<i class="fa-solid position-absolute fa-chevron-right form-arrow"></i>
			</div>
		</div>
		<div class="col-12 col-md-6 col-xl-2 d-flex flex-column justify-content-center pb-3">
			<label for="numGuests">Number of Guests</label>
			<div class="d-block position-relative">
				<div class="select">
					<select id="numGuests" aria-label="Number of guests">
						<option selected># of Guest(s)</option>
						<?php
						$guests = 4;
						for ( $i = 1; $i <= $guests; $i++ ) {
							echo "<option value='{$i}'>{$i}</option>";
						}
						?>
					</select>
				</div>
				<i class=" fa-solid fa-chevron-right form-arrow position-absolute"></i>
			</div>
		</div>
		<div class="col-12 col-xl-3 d-flex flex-column align-items-start justify-content-end pb-3">
			<input type='submit' value='Reserve Now' id="reserveBtn" class="btn btn-reserve fw-medium" />
		</div>
	</div>
</form>
<?php get_template_part( 'template-parts/alert', 'bootstrap-toast' ); ?>

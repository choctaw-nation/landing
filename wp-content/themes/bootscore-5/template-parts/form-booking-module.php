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
<aside class="booking">
	<form id="booking-bar" class="container position-relative zi-1030 bg-dark text-light">
		<div class="row py-5 px-3">
			<div class="col-12 col-xl-4 d-flex flex-column align-items-center justify-content-end pb-3">
				<h2 class="fw-bold text-uppercase">Stay With Us</h2>
			</div>
			<div class="col-12 col-md-6 col-xl-3 d-flex flex-column justify-content-center pb-3">
				<label for="startDate">Arrival-Departure Date</label>
				<div class="d-block position-relative">
					<input id="startDate" class="form-control" type="text" name="dates" />
					<i class="fas fa-chevron-right form-arrow"></i>
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
					<i class="fas fa-chevron-right form-arrow"></i>
				</div>
			</div>
			<div class="col-12 col-xl-3 d-flex flex-column align-items-center align-items-md-end align-items-xl-start justify-content-end pb-3">
				<input type='submit' value='Reserve Now' id="reserveBtn" class="btn btn-outline-light" />
			</div>
		</div>
	</form>
	<?php get_template_part( 'template-parts/alert', 'bootstrap-toast' ); ?>
</aside>

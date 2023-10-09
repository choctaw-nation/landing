<?php
/**
 * The Booking Module
 *
 * @package ChoctawNation
 * @since 0.2
 */

add_action( 'wp_enqueue_scripts', 'cno_enqueue_date_range_picker' );
?>
<aside id="booking-bar" class="container">
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
			<select id="numGuests" aria-label="Default select example">
			<option selected>1 Guest(s)</option>
			<option value="1">One</option>
			<option value="2">Two</option>
			<option value="3">Three</option>
			</select>
		</div>
		<i class="fas fa-chevron-right form-arrow"></i>
		</div>
	</div>
	<div class="col-12 col-xl-3 d-flex flex-column align-items-start justify-content-end pb-3">
		<button id="reserveBtn" type="button" class="btn btn-reserve">Reserve Now</button>
	</div>
	</div>
</aside>
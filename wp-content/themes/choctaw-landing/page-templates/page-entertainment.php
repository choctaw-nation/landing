<?php

/**
 * Template Name: Entertainment
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
$hero = new Hero_Section( get_the_ID(), get_field( 'hero' ) );
$hero->the_hero();
$title_bar = new Title_Bar( get_the_ID(), get_field( 'title_bar' ) );
$title_bar->the_title_bar();
?>

<div id="title-bar" class="container mb-5 position-relative">
	<div class="row justify-content-center py-5 my-3">
		<div class="col-10 py-3">
			<h1 class="fw-bold text-center">Entertainment</h1>
			<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et
				accusam et justo duo dolores et ea rebum.</p>
		</div>
	</div>
</div>

<div id="room-list" class="container events">
	<div class="row events-title">
		<div class="col-12">
			<h2>Cypress Lawn</h2>
		</div>
	</div>
	<div class="row events-list">
		<div class="col-6 col-md-3 events-list-item">
			<div class="d-flex flex-column justify-content-end h-100 events-list-item-bg">
				<h3>Talent / Act</h3>
				<p><i class="fa-solid fa-calendar"></i> Day, Date, Time</p>
				<p><i class="fa-solid fa-ticket"></i> Tickets</p>
			</div>
		</div>
		<div class="col-6 col-md-3 events-list-item">
			<div class="d-flex flex-column justify-content-end h-100 events-list-item-bg">
				<h3>Talent / Act</h3>
				<p><i class="fa-solid fa-calendar"></i> Day, Date, Time</p>
				<p><i class="fa-solid fa-ticket"></i> Tickets</p>
			</div>
		</div>
		<div class="col-6 col-md-3 events-list-item">
			<div class="d-flex flex-column justify-content-end h-100 events-list-item-bg">
				<h3>Talent / Act</h3>
				<p><i class="fa-solid fa-calendar"></i> Day, Date, Time</p>
				<p><i class="fa-solid fa-ticket"></i> Tickets</p>
			</div>
		</div>
		<div class="col-6 col-md-3 events-list-item">
			<div class="d-flex flex-column justify-content-end h-100 events-list-item-bg">
				<h3>Talent / Act</h3>
				<p><i class="fa-solid fa-calendar"></i> Day, Date, Time</p>
				<p><i class="fa-solid fa-ticket"></i> Tickets</p>
			</div>
		</div>
		<div class="col-12 text-center py-5 text-uppercase">
			<a href="#">View All Events <i class="fa-regular fa-circle-right"></i></a>
		</div>
	</div>
</div>

<div id="amenities-header" class="container-fluid my-5"
	 style="background: url('/wp-content/uploads/2023/09/banner-bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
	<div class="container">
		<div class="row">
			<div class="col-12 d-flex align-items-end" style="height: 600px;">
			</div>
		</div>
	</div>
</div>

<div id="win-big" class="container">
	<div class="row align-items-center pt-2 pb-5">
		<div class="col-12 col-lg-5 order-1 order-lg-2">
			<img class="w-100 my-5 border border-primary border-2" src="/wp-content/uploads/2023/09/square-placeholder.jpg" alt="Win Big" />
		</div>
		<div class="col-12 col-lg-7 order-2 order-lg-1">
			<div class="row position-relative">
				<div class="col-3 col-xl-2 d-none d-md-block"></div>
				<div class="col-12 col-md-9 col-xl-10">
					<h2>Win Big</h2>
				</div>
				<div class="col-3 col-xl-2 d-none d-md-block">
					<div class="vertical-line"></div>
				</div>
				<div class="col-12 col-md-9 col-xl-10">
					<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos
						et accusam et justo duo dolores et ea rebum.</p>
					<p class="py-4 d-none d-md-block"><img src="/wp-content/uploads/2023/08/double-arrow.svg" class="arrow position-absolute" /><a href="#" download class="arrow-link">Try
							Your Luck</a></p>
					<p class="py-4 d-block d-md-none"><a href="#" download class="btn-default">Try Your Luck</a></p>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="cultural-activities" class="container offset-topo-bg">
	<div class="row align-items-center pt-2 pb-5">
		<div class="col-12 col-lg-5">
			<img class="w-100 my-5 border border-primary border-2" src="/wp-content/uploads/2023/09/square-placeholder.jpg" alt="Cultural Activities" />
		</div>
		<div class="col-12 col-lg-7">
			<div class="row position-relative">
				<div class="col-3 col-xl-2 d-none d-md-block"></div>
				<div class="col-12 col-md-9 col-xl-10">
					<h2>Cultural Activities</h2>
				</div>
				<div class="col-3 col-xl-2 d-none d-md-block">
					<div class="vertical-line"></div>
				</div>
				<div class="col-12 col-md-9 col-xl-10">
					<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos
						et accusam et justo duo dolores et ea rebum.</p>
					<p class="py-4 d-none d-md-block"><img src="/wp-content/uploads/2023/08/double-arrow.svg" class="arrow position-absolute" /><a href="#" download class="arrow-link">Learn
							More</a></p>
					<p class="py-4 d-block d-md-none"><a href="#" download class="btn-default">Learn More</a></p>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="other-venue" class="container">
	<div class="row align-items-center pt-2 pb-5">
		<div class="col-12 col-lg-5 order-1 order-lg-2">
			<img class="w-100 my-5 border border-primary border-2" src="/wp-content/uploads/2023/09/square-placeholder.jpg" alt="Other Venue" />
		</div>
		<div class="col-12 col-lg-7 order-2 order-lg-1">
			<div class="row position-relative">
				<div class="col-3 col-xl-2 d-none d-md-block"></div>
				<div class="col-12 col-md-9 col-xl-10">
					<h2>Other Venue</h2>
				</div>
				<div class="col-3 col-xl-2 d-none d-md-block">
					<div class="vertical-line"></div>
				</div>
				<div class="col-12 col-md-9 col-xl-10">
					<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos
						et accusam et justo duo dolores et ea rebum.</p>
					<p class="py-4 d-none d-md-block"><img src="/wp-content/uploads/2023/08/double-arrow.svg" class="arrow position-absolute" /><a href="#" download class="arrow-link">Learn
							More</a></p>
					<p class="py-4 d-block d-md-none"><a href="#" download class="btn-default">Learn More</a></p>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
jQuery(function($) {
	$(document).ready(function() {
		$('input[name="dates"]').daterangepicker();
	});
});
</script>

<?php
get_footer();
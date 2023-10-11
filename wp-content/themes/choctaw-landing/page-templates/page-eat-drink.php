<?php

/**
 * Template Name: Eat & Drink
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
$hero = new Hero_Section( get_the_ID(), get_field( 'hero' ) );
$hero->the_hero();
?>

<div id="title-bar" class="container mb-5">
	<div class="row justify-content-center py-5 my-3">
		<div class="col-10 py-3">
			<h1 class="fw-bold text-center">Dining Options</h1>
			<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et
				accusam et justo duo dolores et ea rebum.</p>
		</div>
	</div>
</div>

<div id="tuklo" class="container py-5">
	<div class="row align-items-center pt-2 pb-5">
		<div class="col-12 col-lg-5 order-1 order-lg-2">
			<img class="w-100 my-5" src="/wp-content/uploads/2023/09/food-tuklo.jpg" alt="Tuklo" />
		</div>
		<div class="col-12 col-lg-7 order-2 order-lg-1">
			<div class="row position-relative">
				<div class="col-3 col-xl-2 d-none d-md-block"></div>
				<div class="col-12 col-md-9 col-xl-10 mb-5">
					<h2>Tuklo</h2>
					<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
				</div>
				<div class="col-3 col-xl-2 d-none d-md-block">
					<div class="vertical-line"></div>
				</div>
				<div class="col-12 col-md-9 col-xl-10">
					<div class="row">
						<div class="col menu"><a class="menu-link" href="#"><i class="fas fa-utensils"></i> Menu</a></div>
						<div class="col">American Variety</div>
						<div class="col"><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign opacity-25"></i><i
							   class="fas fa-dollar-sign opacity-25"></i></div>
					</div>
					<hr class="my-4" />
					<ul class="dining-hours">
						<li>Sunday - Thursday | 6:30AM - 10:00PM</li>
						<li>Friday - Saturday | 6:30AM - 11:00PM</li>
					</ul>
					<hr class="my-4" />
					<p class="py-4 d-none d-md-block"><img src="/wp-content/uploads/2023/08/double-arrow.svg" class="arrow position-absolute" /><a href="#" class="arrow-link">Make
							Reservations</a> | <a href="#" class="arrow-link">Order Online</a></p>
					<p class="py-4 d-block d-md-none"><a href="#" download class="btn-default">Make Reservations</a><br /><a href="#" class="btn-default">Order Online</a></p>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="oka-sita" class="container py-5">
	<div class="row align-items-center pt-2 pb-5">
		<div class="col-12 col-lg-5">
			<img class="w-100 my-5" src="/wp-content/uploads/2023/09/food-oka-sita.jpg" alt="Oka Sita" />
		</div>
		<div class="col-12 col-lg-7">
			<div class="row position-relative">
				<div class="col-3 col-xl-2 d-none d-md-block"></div>
				<div class="col-12 col-md-9 col-xl-10 mb-5">
					<h2>Tuklo</h2>
					<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
				</div>
				<div class="col-3 col-xl-2 d-none d-md-block">
					<div class="vertical-line"></div>
				</div>
				<div class="col-12 col-md-9 col-xl-10">
					<div class="row">
						<div class="col menu"><a class="menu-link" href="#"><i class="fas fa-utensils"></i> Menu</a></div>
						<div class="col">American Variety</div>
						<div class="col"><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign opacity-25"></i>
						</div>
					</div>
					<hr class="my-4" />
					<ul class="dining-hours">
						<li>Sunday - Thursday | 6:30AM - 10:00PM</li>
						<li>Friday - Saturday | 6:30AM - 11:00PM</li>
					</ul>
					<hr class="my-4" />
					<p class="py-4 d-none d-md-block"><img src="/wp-content/uploads/2023/08/double-arrow.svg" class="arrow position-absolute" /><a href="#" class="arrow-link">Make
							Reservations</a> | <a href="#" class="arrow-link">Order Online</a></p>
					<p class="py-4 d-block d-md-none"><a href="#" download class="btn-default">Make Reservations</a><br /><a href="#" class="btn-default">Order Online</a></p>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="containers" class="container-fluid blue-topo-bg py-5">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4 px-4 py-5">
				<img src="/wp-content/uploads/2023/09/food-container.jpg" alt="Container 1" />
				<h2>Container 1</h2>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
				<hr class="my-4" />
				<div class="row">
					<div class="col">American Variety</div>
					<div class="col"><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign opacity-25"></i><i
						   class="fas fa-dollar-sign opacity-25"></i></div>
				</div>
			</div>
			<div class="col-12 col-lg-4 px-4 py-5">
				<img src="/wp-content/uploads/2023/09/food-container.jpg" alt="Container 2" />
				<h2>Container 2</h2>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
				<hr class="my-4" />
				<div class="row">
					<div class="col">American Variety</div>
					<div class="col"><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign opacity-25"></i><i class="fas fa-dollar-sign opacity-25"></i><i
						   class="fas fa-dollar-sign opacity-25"></i></div>
				</div>
			</div>
			<div class="col-12 col-lg-4 px-4 py-5">
				<img src="/wp-content/uploads/2023/09/food-container.jpg" alt="Container 3" />
				<h2>Container 3</h2>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
				<hr class="my-4" />
				<div class="row">
					<div class="col">American Variety</div>
					<div class="col"><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign opacity-25"></i></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="the-mercantile" class="container py-5">
	<div class="row align-items-center pt-2 pb-5">
		<div class="col-12 col-lg-5 order-1 order-lg-2">
			<img class="w-100 my-5" src="/wp-content/uploads/2023/09/food-mercantile.jpg" alt="The Mercantile" />
		</div>
		<div class="col-12 col-lg-7 order-2 order-lg-1">
			<div class="row position-relative">
				<div class="col-3 col-xl-2 d-none d-md-block"></div>
				<div class="col-12 col-md-9 col-xl-10 mb-5">
					<h2>The Mercantile</h2>
					<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
				</div>
				<div class="col-3 col-xl-2 d-none d-md-block">
					<div class="vertical-line"></div>
				</div>
				<div class="col-12 col-md-9 col-xl-10">
					<div class="row">
						<div class="col menu"><a class="menu-link" href="#"><i class="fas fa-utensils"></i> Menu</a></div>
						<div class="col">American Variety</div>
						<div class="col"><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign opacity-25"></i><i class="fas fa-dollar-sign opacity-25"></i><i
							   class="fas fa-dollar-sign opacity-25"></i></div>
					</div>
					<hr class="my-4" />
					<ul class="dining-hours">
						<li>Sunday - Thursday | 6:30AM - 10:00PM</li>
						<li>Friday - Saturday | 6:30AM - 11:00PM</li>
					</ul>
					<hr class="my-4" />
					<p class="py-4 d-none d-md-block"><img src="/wp-content/uploads/2023/08/double-arrow.svg" class="arrow position-absolute" /><a href="#" class="arrow-link">Make
							Reservations</a> | <a href="#" class="arrow-link">Order Online</a></p>
					<p class="py-4 d-block d-md-none"><a href="#" download class="btn-default">Make Reservations</a><br /><a href="#" class="btn-default">Order Online</a></p>
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
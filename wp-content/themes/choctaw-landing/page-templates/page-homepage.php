<?php
/**
 * Template Name: Homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ChoctawNation
 */

get_header();
?>

<div id="header-img" class="container-fluid gx-0">
	<img src="/wp-content/uploads/2023/07/Homepage-Header.jpg" alt="Homepage Header" class="w-100" />
</div>

<?php get_template_part( 'template-parts/aside', 'booking-module' ); ?>

<div id="luxury" class="container py-5">
	<div class="row align-items-center pt-2 pb-5">
		<div class="col-12 col-lg-5">
			<img class="w-100 my-5" src="/wp-content/uploads/2023/08/luxury-has-landed-homepage.jpg" alt="Luxury Has Landed" />
		</div>
		<div class="col-12 col-lg-7">
			<div class="row position-relative">
				<div class="col-3 col-xl-2 d-none d-md-block"></div>
				<div class="col-12 col-md-9 col-xl-10">
					<h2>Luxury Has Landed</h2>
				</div>
				<div class="col-3 col-xl-2 d-none d-md-block">
					<div class="vertical-line"></div>
				</div>
				<div class="col-12 col-md-9 col-xl-10">
					<p>Get ready for a new resort experience coming soon to Hochatown, OK. Located less than an hour north of the Oklahoma/Texas border, Choctaw Landing promises to be the
						hub of Broken Bow-area entertainment.</p>
					<p class="py-4 d-none d-md-block"><img src="/wp-content/uploads/2023/08/double-arrow.svg" class="arrow position-absolute" /><a href="#" download class="arrow-link">Plan
							Your Trip</a></p>
					<p class="py-4 d-block d-md-none"><a href="#" download class="btn-default">Plan Your Trip</a></p>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="adventure" class="container-fluid py-5"
	 style="background: url('/wp-content/uploads/2023/08/adventure-home-bg.jpg'); background-position:bottom; background-repeat: no-repeat; background-size: cover;">
	<div class="container pt-5">
		<div class="row py-5">
			<div class="col-12 col-xl-7">
				<div class="row position-relative">
					<div class="col-3 col-lg-2 d-none d-md-block"></div>
					<div class="col-9 col-lg-10">
						<h2 class="text-light">Adventure Playground</h2>
					</div>
				</div>
				<div class="row position-relative">
					<div class="col-3 col-lg-2 d-none d-md-block">
						<div class="vertical-line vertical-line-white"></div>
					</div>
					<div class="col-9 col-lg-10">
						<p class="text-light">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed
							diam voluptua.</p>
						<p class="py-4 d-none d-md-block text-light"><img src="/wp-content/uploads/2023/08/double-arrow.svg" class="arrow arrow-white position-absolute" /><a href="#"
							   download class="arrow-link arrow-link-white">Start Your Adventure</a></p>
						<p class="py-4 d-block d-md-none"><a href="#" download class="btn-secondary">Start Your Adventure</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="winner" class="container offset-topo-bg py-5">
	<div class="row align-items-center pt-2 pb-5">
		<div class="col-12 col-lg-5 order-1 order-lg-2">
			<img class="w-100 my-5" src="/wp-content/uploads/2023/08/youre-a-winner-homepage.jpg" alt="You're a Winner" />
		</div>
		<div class="col-12 col-lg-7 order-2 order-lg-1">
			<div class="row position-relative">
				<div class="col-3 col-xl-2 d-none d-md-block"></div>
				<div class="col-12 col-md-9 col-xl-10">
					<h2>You're A Winner!</h2>
				</div>
				<div class="col-3 col-xl-2 d-none d-md-block">
					<div class="vertical-line"></div>
				</div>
				<div class="col-12 col-md-9 col-xl-10">
					<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
					<p class="py-4 d-none d-md-block"><img src="/wp-content/uploads/2023/08/double-arrow.svg" class="arrow position-absolute" /><a href="#" download class="arrow-link">Try
							Your Luck</a></p>
					<p class="py-4 d-block d-md-none"><a href="#" download class="btn-default">Try Your Luck</a></p>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="meet" class="container py-5">
	<div class="row align-items-center pt-2 pb-5">
		<div class="col-12 col-lg-5">
			<img class="w-100 my-5" src="/wp-content/uploads/2023/08/meet-and-gather-homepage.jpg" alt="Meet & Gather" />
		</div>
		<div class="col-12 col-lg-7">
			<div class="row position-relative">
				<div class="col-3 col-xl-2 d-none d-md-block"></div>
				<div class="col-12 col-md-9 col-xl-10">
					<h2>Meet &amp; Gather</h2>
				</div>
				<div class="col-3 col-xl-2 d-none d-md-block">
					<div class="vertical-line"></div>
				</div>
				<div class="col-12 col-md-9 col-xl-10">
					<p>Get ready for a new resort experience coming soon to Hochatown, OK. Located less than an hour north of the Oklahoma/Texas border, Choctaw Landing promises to be the
						hub of Broken Bow-area entertainment.</p>
					<p class="py-4 d-none d-md-block"><img src="/wp-content/uploads/2023/08/double-arrow.svg" class="arrow position-absolute" /><a href="#" download
						   class="arrow-link">Reserve Your Space</a></p>
					<p class="py-4 d-block d-md-none"><a href="#" download class="btn-default">Reserve Your Space</a></p>
				</div>
			</div>
		</div>
	</div>
</div>



<?php
get_footer();
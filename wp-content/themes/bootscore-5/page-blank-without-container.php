<?php
/**
 * Template Name: Blank without container
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();


$events = array(
	array(
		'title'   => 'Choctaw Community Center',
		'address' => '1346 E Martin Luther King Dr, Broken Bow, OK',
		'link'    => 'https://maps.app.goo.gl/e1y26jwg9Wrg72C68',
		'date'    => 'Feb 13 2024 @ 11am-6pm',
	),
	array(
		'title'   => 'Choctaw Community Center',
		'address' => '3839 Battiest Pickens Road, Battiest, OK',
		'link'    => 'https://maps.app.goo.gl/iyAhYaaX5X85qYMh9',
		'date'    => 'Feb 22 2024 @ 11am-6pm',
	),
	array(
		'title'   => 'Choctaw Community Center',
		'address' => '2408 E Lincoln Rd, Idabel, OK',
		'link'    => 'https://maps.app.goo.gl/5tJJTNYV7i7nobjZ7',
		'date'    => 'Feb 29 2024 @ 11am-6pm',
	),
	array(
		'title'   => 'Ouachita Center at the University of Arkansas - Rich Mountain',
		'address' => '1100 College Dr, Mena, AR 71953',
		'link'    => 'https://maps.app.goo.gl/i3tu7qnpcchAcGhp7',
		'date'    => 'Mar 7 2024 @ 11am-6pm',
	),
	array(
		'title'   => 'Choctaw Community Center',
		'address' => '1346 E Martin Luther King Dr, Broken Bow, OK',
		'link'    => 'https://maps.app.goo.gl/e1y26jwg9Wrg72C68',
		'date'    => 'Mar 21 2024 @ 11am-6pm',
	),
	array(
		'title'   => 'Choctaw Community Center',
		'address' => '1346 E Martin Luther King Dr, Broken Bow, OK',
		'link'    => 'https://maps.app.goo.gl/e1y26jwg9Wrg72C68',
		'date'    => 'Mar 28 2024 @ 11am-6pm',
	),
	array(
		'title'   => 'Choctaw Community Center',
		'address' => '1346 E Martin Luther King Dr, Broken Bow, OK',
		'link'    => 'https://maps.app.goo.gl/e1y26jwg9Wrg72C68',
		'date'    => 'Apr 4 2024 @ 11am-6pm',
	),
	array(
		'title'   => 'Choctaw Community Center',
		'address' => '1346 E Martin Luther King Dr, Broken Bow, OK',
		'link'    => 'https://maps.app.goo.gl/e1y26jwg9Wrg72C68',
		'date'    => 'Apr 11 2024 @ 11am-6pm',
	),
);
?>

<div id="content" class="site-content">
	<div id="primary" class="content-area">

		<main id="main" class="site-main">
			<div class="entry-content">
				<section class="container-fluid p-0">
					<img src="<?php the_field( 'featured_image' ); ?>" class="header-image" />
				</section>
				<?php get_template_part( 'template-parts/form', 'booking-module' ); ?>
				<section class="container-fluid py-5 bg-light text-dark">
					<div class="container my-3">
						<div class="container mt-3 py-3 px-3">
							<div class="row d-flex justify-content-center align-items-center">
								<div class="col-12 col-md-6 col-lg-3 mb-3 text-center">
									<!-- <div class='ratio ratio-16x9'>
										<?php // the_field( 'video' ); ?>
									</div> -->
									<img src="/wp-content/uploads/2023/11/choctaw-c-in-the-trees.jpg" alt="Choctaw C in the Trees" />
								</div>
								<div class="col-12 col-md-6 col-lg-7 mb-3">
									<?php the_field( 'top_text' ); ?>
								</div>

							</div>
						</div>
					</div>
				</section>

				<section class="container-fluid py-5">
					<div class="container text-center my-3">
						<div class="row mx-auto my-auto justify-content-center">
							<?php
							if ( have_rows( 'gallery_images' ) ) {
								get_template_part( 'template-parts/content', 'carousel' );
							}
							?>
						</div>
					</div>
				</section>

				<?php
				// if ( have_rows( 'highlights' ) ) {
				// get_template_part( 'template-parts/content', 'highlights' );
				// }
				?>
				<div class="container-fluid bg-light text-dark py-5" id="events">
					<div class="container text-center my-3">
						<div class="row mx-auto my-auto justify-content-center">
							<div class="col-12 mb-4">
								<h2>Upcoming Hiring Events</h2>
							</div>
						</div>
						<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 mx-auto my-auto justify-content-center">
							<?php foreach ( $events as $event ) : ?>
								<?php
								$event_date = DateTime::createFromFormat( 'M j Y @ ga-ga', $event['date'], new DateTimeZone( 'America/Chicago' ) );
								$now        = new DateTime( 'now', new DateTimeZone( 'America/Chicago' ) );
								$diff       = $now->diff( $event_date );
								if ( $now > $event_date ) {
									continue;
								}
								?>
							<div class="col my-3">
								<div class="bg-dark text-light py-4 px-3 h-100">
									<h3><?php echo $event['title']; ?></h3>
									<p>
										<a href="<?php echo $event['link']; ?>" target="_blank"><?php echo $event['address']; ?></a>
									</p>
									<p><?php echo $event['date']; ?></p>
								</div>
							</div>
							<?php endforeach; ?>
							<div class="col-12 col-lg-6 pt-4 d-none">
								<a class="d-block btn btn-primary btn-lg m-3" href="https://careers.choctawnation.com/events/"><i class="fas fa-calendar"></i> All Hiring Events</a>
								<a class="d-block btn btn-primary btn-lg m-3" href="https://careers.choctawnation.com/why-choctaw/#benefits-nav"><i class="fas fa-hand-holding-usd"></i>
									Benefits</a>
								<a class="d-block btn btn-primary btn-lg m-3"
									href="https://egoh.fa.us2.oraclecloud.com/hcmUI/CandidateExperience/en/sites/CX_1001/requisitions?lastSelectedFacet=LOCATIONS&selectedLocationsFacet=300000562140379"><i
										class="fas fa-briefcase"></i> Current Job Listings</a>
							</div>
						</div>
					</div>
				</div>

				<?php
				if ( have_rows( 'new_releases' ) ) {
					get_template_part( 'template-parts/content', 'news-releases' );
				}
				?>
			</div>

		</main><!-- #main -->

	</div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();

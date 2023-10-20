<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 *
 * @version 5.3.0
 */

?>

<footer class="pt-5">

	<div class="border-top py-5">
	<div class="container">

		<!-- Top Footer Widget -->
		<?php if ( is_active_sidebar( 'top-footer' ) ) : ?>
			<?php dynamic_sidebar( 'top footer' ); ?>
		<?php endif; ?>

		<div class="row">

		<!-- Footer 1 Widget -->
		<div class="col-md-6 col-lg-4">
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<?php dynamic_sidebar( 'footer-1' ); ?>
			<?php endif; ?>
		</div>

		<div class="col-md-6 col-lg-8">
			<div class="row justify-content-around">
			<!-- Footer 2 Widget -->
			<div class="col-sm-6 col-md-12 col-lg-4">
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<?php dynamic_sidebar( 'footer-2' ); ?>
				<?php endif; ?>
			</div>

			<!-- Footer 3 Widget -->
			<div class="col-sm-6 col-md-12 col-lg-4">
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<?php dynamic_sidebar( 'footer-3' ); ?>
				<?php endif; ?>
			</div>
			</div>
		</div>

		</div>

	</div>
	</div>

	<div class="footer-info pt-3">
	<div class="<?php echo bootscore_container_class(); ?>">
		<div class="row align-items-center">
		<div class="col-12 col-md-7 pb-3 copyright">
			<p class="m-0"><span class="cr-symbol">&copy;</span>&nbsp;<?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved.</p>
		</div>
		<div class="col-12 col-md-5 pb-3">
			<!-- Bootstrap 5 Nav Walker Footer Menu -->
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer-menu',
					'container'      => false,
					'menu_class'     => 'd-flex justify-content-around',
					'fallback_cb'    => '__return_false',
					'items_wrap'     => '<ul id="footer-menu" class="nav %2$s">%3$s</ul>',
					'depth'          => 1,
				)
			);
			?>
		</div>
		</div>
	</div>
	</div>

</footer>

<!-- To top button -->
<a href="#" class="btn btn-diamond-white border-0 shadow top-button position-fixed zi-1020 mb-5"><i class="fa-solid fa-chevron-up"></i><span class="visually-hidden-focusable">To top</span></a>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

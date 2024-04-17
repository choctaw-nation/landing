<?php
/**
 * The template for displaying the footer
 *
 * @package ChoctawNation
 *
 * @since 1.0.2
 */

?>

<footer class="pt-5 position-relative">
	<img class="position-absolute top-0 w-100 h-100 z-n1" src="<?php echo get_stylesheet_directory_uri() . '/img/bg-images/footer-bg.webp'; ?>" alt="" aria-hidden="true" loading="lazy" />
	<div class="border-top py-5">
		<div class="container">
			<?php
			if ( is_active_sidebar( 'top-footer' ) ) {
				dynamic_sidebar( 'top footer' );
			}
			?>
			<div class=" row">
				<div class="col-md-6 col-lg-4">
					<?php
					if ( is_active_sidebar( 'footer-1' ) ) {
						dynamic_sidebar( 'footer-1' );
					}
					?>
				</div>
				<div class="col-md-6 col-lg-8">
					<div class="row justify-content-around">
						<div class="col-sm-6 col-md-12 col-lg-4">
							<?php
							if ( is_active_sidebar( 'footer-2' ) ) {
								dynamic_sidebar( 'footer-2' );
							}
							?>
						</div>
						<div class="col-sm-6 col-md-12 col-lg-4">
							<?php
							if ( is_active_sidebar( 'footer-3' ) ) {
								dynamic_sidebar( 'footer-3' );
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-info pt-3">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-12 col-md-7 pb-3 copyright">
					<p class="m-0"><span class="cr-symbol">&copy;</span>&nbsp;<?php echo gmdate( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved.</p>
				</div>
				<div class="col-12 col-md-5 pb-3">
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
<a href="#" class="btn btn-diamond-white border-0 shadow top-button position-fixed zi-1020 mb-5">
	<i class="fa-solid fa-chevron-up"></i>
	<span class="visually-hidden-focusable">To top</span>
</a>
<?php wp_footer(); ?>

</body>

</html>

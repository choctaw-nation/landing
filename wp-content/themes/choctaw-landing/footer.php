<?php
/**
 * The template for displaying the footer
 *
 * @package ChoctawNation
 *
 * @since 1.0.2
 */

use ChoctawNation\Features\Federated_About;

?>

<footer class="pt-5 position-relative">
	<img class="position-absolute top-0 w-100 h-100 z-n1 object-fit-cover" src="<?php echo get_stylesheet_directory_uri() . '/img/bg-images/footer-bg.webp'; ?>" alt="" aria-hidden="true"
		loading="lazy" />
	<div class="border-top py-5">
		<div class="container">
			<div class="row row-gap-4">
				<div class="col-md-6 col-lg-4">
					<h2 class="fs-5 text-white fw-normal">About Us</h2>
					<div>
						<?php
						if ( get_field( 'use_federated_about', 'option' ) ) {
							echo esc_html( Federated_About::get_about_content() );
						} else {
							the_field( 'custom_about', 'option' );
						}
						?>
					</div>
				</div>
				<div class="col-md-6 col-lg-8">
					<div class="row justify-content-around row-gap-4">
						<div class="col-sm-6 col-md-12 col-lg-4">
							<h2 class="fs-5 text-white fw-normal">Information</h2>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'footer-info-menu',
									'container'      => 'nav',
									'menu_id'        => 'footer-info-menu',
									'menu_class'     => 'list-unstyled m-0 d-flex flex-column row-gap-2',
									'fallback_cb'    => '__return_false',
								)
							);
							?>
						</div>
						<div class="col-sm-6 col-md-12 col-lg-4">
							<h2 class="fs-5 text-white fw-normal">Contact</h2>
							<?php
							the_field( 'contact_information', 'option' );
							if ( have_rows( 'socials', 'option' ) ) {
								echo '<ul class="socials list-unstyled row row-cols-auto gx-0 column-gap-3 mb-0">';
								while ( have_rows( 'socials', 'option' ) ) {
									the_row();
									$platform     = get_sub_field( 'platform' );
									$profile_link = get_sub_field( 'profile_link' );
									$link_label   = get_sub_field( 'link_label' );
									printf(
										'<li class="col"><a href="%s" target="_blank" rel="noopener noreferrer" aria-label="%s"><i class="fa-brands fa-%s fa-2xl"></i></a></li>',
										esc_url( $profile_link ),
										esc_attr( $link_label ),
										esc_attr( $platform )
									);
								}
								echo '</ul>';
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
<a href="#" class="btn btn-diamond--white border-0 shadow top-button position-fixed zi-1020 mb-5">
	<i class="fa-solid fa-chevron-up"></i>
	<span class="visually-hidden-focusable">To top</span>
</a>
<?php wp_footer(); ?>

</body>

</html>
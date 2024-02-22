<?php
/**
 * The header for our theme
 *
 * @package ChoctawNation
 * @version 1.0.0
 */

use ChoctawNation\Mega_Menu;

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/site.webmanifest">
	<link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/safari-pinned-tab.svg" color="#0d6efd">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<header id="masthead" class="site-header fixed-top">
			<div class="header-bar position-relative">
				<div class="header-bg position-absolute top-0 w-100 h-100 z-n1">
					<?php echo wp_get_attachment_image( 16, 'full', false, array( 'class' => 'w-100 h-100 object-fit-cover' ) ); ?>
				</div>
				<nav id="nav-main" class="navbar navbar-expand-xl py-0">
					<div class="container">
						<a class="navbar-brand sm p-3" href="<?php echo esc_url( home_url() ); ?>">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/logo/logo.svg" alt="Choctaw Landing Logo" class="logo">
						</a>
						<button class="btn btn-diamond d-xl-none ms-1 ms-md-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-navbar" aria-controls="offcanvas-navbar">
							<i class="fa-solid fa-bars"></i>
							<span class="visually-hidden-focusable">Menu</span>
						</button>

						<div class="offcanvas offcanvas-end pb-3 pb-lg-0" tabindex="-1" id="offcanvas-navbar"
							style='background-image: url(<?php echo wp_get_attachment_url( 16, 'full' ); ?>)'>
							<div class="offcanvas-header border-bottom border-2 border-white">
								<ul class="navbar-nav ">
									<li class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-18">
										<a href="/" class="nav-link ">Home</a>
									</li>
								</ul>
								<button class="btn btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
							</div>
							<div class="offcanvas-body pt-0">
								<?php
									wp_nav_menu(
										array(
											'theme_location' => 'main-menu',
											'container'   => false,
											'menu_class'  => 'navbar-nav ms-auto justify-content-xl-end align-items-xl-center',
											'menu_id'     => 'cno-navbar',
											'fallback_cb' => '__return_false',
											'depth'       => 3,
											'walker'      => new Mega_Menu(),
										)
									);
									?>
							</div>
						</div>
					</div>
				</nav>
			</div>
		</header>

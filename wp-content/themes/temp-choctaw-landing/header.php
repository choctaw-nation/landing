<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#000000">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff">
	<?php wp_head(); ?>
	<meta name="facebook-domain-verification" content="p7k8b3wboq8ytze35uncny0182e3jz" />
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<div class="container pt-3">
			<div class="row">
				<div class="col-12 col-sm-6 text-center text-sm-start mb-3">
					<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>"><img src="<?php the_field( 'logo', 2 ); ?>" alt="Choctaw Landing" class="logo"></a>
				</div>
				<div class="col-12 col-sm-6 d-flex align-items-center social-icons mb-3">
					FOLLOW FOR UPDATES <a href="#" class="ms-3 text-light"><i class="fab fa-facebook"></i></a>
				</div>
			</div>
		</div>

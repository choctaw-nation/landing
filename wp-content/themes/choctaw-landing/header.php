<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 *
 * @version 5.3.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/site.webmanifest">
  <link rel="mask-icon" href="<?= get_stylesheet_directory_uri(); ?>/img/favicon/safari-pinned-tab.svg" color="#0d6efd">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="page" class="site">

  <header id="masthead" class="site-header">

    <div class="fixed-top bg-body-tertiary header-bar">

      <nav id="nav-main" class="navbar navbar-expand-xl py-0">

        <div class="<?= bootscore_container_class(); ?>">

          <!-- Navbar Brand -->
          <a class="navbar-brand sm p-3" href="<?= esc_url(home_url()); ?>"><img src="<?= esc_url(get_stylesheet_directory_uri()); ?>/img/logo/logo.svg" alt="logo" class="logo sm"></a>

          <!-- Offcanvas Navbar -->
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas-navbar" style="height:fit-content;">
            <div class="offcanvas-header pb-0">
              <!-- <span class="h5 offcanvas-title"><?php esc_html_e('Menu', 'bootscore'); ?></span> -->
              <ul class="navbar-nav "><li class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-18"><a href="/" class="nav-link ">Home</a></li></ul>
              <a href="#" class="btn btn-mobile-nav" data-bs-dismiss="offcanvas" aria-label="Close">x</a>
            </div>
            <div class="offcanvas-body pt-0">

              <!-- Bootstrap 5 Nav Walker Main Menu -->
              <?php
              wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container'      => false,
                'menu_class'     => '',
                'fallback_cb'    => '__return_false',
                'items_wrap'     => '<ul id="bootscore-navbar" class="navbar-nav ms-auto %2$s">%3$s</ul>',
                'depth'          => 3,
                'walker'         => new bootstrap_5_wp_nav_menu_walker()
              ));
              ?>

              <!-- Top Nav 2 Widget -->
              <?php if (is_active_sidebar('top-nav-2')) : ?>
                <?php dynamic_sidebar('top-nav-2'); ?>
              <?php endif; ?>

            </div>
          </div>

          <div class="header-actions d-flex align-items-center">

            <!-- Top Nav Widget -->
            <?php if (is_active_sidebar('top-nav')) : ?>
              <?php dynamic_sidebar('top-nav'); ?>
            <?php endif; ?>

            <?php
            if (class_exists('WooCommerce')) :
              get_template_part('template-parts/header/actions', 'woocommerce');
            else :
              get_template_part('template-parts/header/actions');
            endif;
            ?>

            <!-- Navbar Toggler -->
            <button class="btn btn-diamond d-xl-none ms-1 ms-md-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-navbar" aria-controls="offcanvas-navbar">
              <i class="fa-solid fa-bars"></i><span class="visually-hidden-focusable">Menu</span>
            </button>

          </div><!-- .header-actions -->

        </div><!-- bootscore_container_class(); -->

      </nav><!-- .navbar -->

      <?php
      if (class_exists('WooCommerce')) :
        get_template_part('template-parts/header/top-nav-search-collapse', 'woocommerce');
      else :
        get_template_part('template-parts/header/top-nav-search-collapse');
      endif;
      ?>

    </div><!-- .fixed-top .bg-light -->

    <!-- Offcanvas User and Cart -->
    <?php
    if (class_exists('WooCommerce')) :
      get_template_part('template-parts/header/offcanvas', 'woocommerce');
    endif;
    ?>

  </header><!-- #masthead -->

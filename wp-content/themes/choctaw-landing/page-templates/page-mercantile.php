<?php

/**
 * Template Name: The Mercantile
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
?>

<div id="header-img" class="container-fluid gx-0">
  <img src="/wp-content/uploads/2023/09/mercantile-header.jpg" alt="Mercantile Header" class="w-100" />
</div>

<div id="title-bar" class="container mb-5">
  <div class="row justify-content-center py-5 my-3">
    <div class="col-10 py-3">
      <h1 class="fw-bold text-center">The Mercantile</h1>
      <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
    </div>
  </div>
</div>

<div id="weather" class="container">
  <div class="row">
    <div class="col-4">
      <img class="pb-3 w-100" src="/wp-content/uploads/2023/09/mercantile-call-to-action-placeholder.jpg" alt="#" />
      <h2>Title</h2>
      <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
    </div>
    <div class="col-4">
      <img class="pb-3 w-100" src="/wp-content/uploads/2023/09/mercantile-call-to-action-placeholder.jpg" alt="#" />
      <h2>Title</h2>
      <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
    </div>
    <div class="col-4">
      <img class="pb-3 w-100" src="/wp-content/uploads/2023/09/mercantile-call-to-action-placeholder.jpg" alt="#" />
      <h2>Title</h2>
      <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
    </div>
  </div>
</div>

<div id="fuel-convenience" class="container py-5">
  <div class="row align-items-center pt-2 pb-5">
    <div class="col-12 col-lg-5">
      <img class="w-100 my-5 border border-primary border-2" src="/wp-content/uploads/2023/09/square-placeholder.jpg" alt="Fuel & Convenience" />
    </div>
    <div class="col-12 col-lg-7">
      <div class="row position-relative">
        <div class="col-3 col-xl-2 d-none d-md-block"></div>
        <div class="col-12 col-md-9 col-xl-10">
          <h2>Fuel &amp; Convenience</h2>
        </div>
        <div class="col-3 col-xl-2 d-none d-md-block">
          <div class="vertical-line"></div>
        </div>
        <div class="col-12 col-md-9 col-xl-10">
          <p>Get ready for a new resort experience coming soon to Hochatown, OK. Located less than an hour north of the Oklahoma/Texas border, Choctaw Landing promises to be the hub of Broken Bow-area entertainment.</p>
          <p class="py-4 d-none d-md-block"><img src="/wp-content/uploads/2023/08/double-arrow.svg" class="arrow position-absolute" /><a href="#" class="arrow-link">Learn More</a></p>
          <p class="py-4 d-block d-md-none"><a href="#" download class="btn-default">Learn More</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="choctaw-beef" class="container py-5">
  <div class="row align-items-center pt-2 pb-5">
    <div class="col-12 col-lg-5 order-1 order-lg-2">
      <img class="w-100 my-5 border border-primary border-2" src="/wp-content/uploads/2023/09/square-placeholder.jpg" alt="Choctaw Beef" />
    </div>
    <div class="col-12 col-lg-7 order-2 order-lg-1">
      <div class="row position-relative">
        <div class="col-3 col-xl-2 d-none d-md-block"></div>
        <div class="col-12 col-md-9 col-xl-10">
          <h2>Choctaw Beef</h2>
        </div>
        <div class="col-3 col-xl-2 d-none d-md-block">
          <div class="vertical-line"></div>
        </div>
        <div class="col-12 col-md-9 col-xl-10">
          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
          <p class="py-4 d-none d-md-block"><img src="/wp-content/uploads/2023/08/double-arrow.svg" class="arrow position-absolute" /><a href="#" class="arrow-link">Learn More</a></p>
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

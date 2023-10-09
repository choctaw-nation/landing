<?php

/**
 * Template Name: Stay
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
?>

<div id="header-img" class="container-fluid gx-0">
  <img src="/wp-content/uploads/2023/09/stay-header.jpg" alt="Stay Header" class="w-100" />
</div>

<div id="booking-bar" class="container">
  <div class="row py-5 px-3">
    <div class="col-12 col-xl-4 d-flex flex-column align-items-center justify-content-end pb-3">
      <h2 class="fw-bold text-uppercase">Stay With Us</h2>
    </div>
    <div class="col-12 col-md-6 col-xl-3 d-flex flex-column justify-content-center pb-3">
      <label for="startDate">Arrival-Departure Date</label>
      <div class="d-block position-relative">
        <input id="startDate" class="form-control" type="text" name="dates" />
        <i class="fas fa-chevron-right form-arrow"></i>
      </div>
    </div>
    <div class="col-12 col-md-6 col-xl-2 d-flex flex-column justify-content-center pb-3">
      <label for="numGuests">Number of Guests</label>
      <div class="d-block position-relative">
        <div class="select">
          <select id="numGuests" aria-label="Default select example">
            <option selected>1 Guest(s)</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
        <i class="fas fa-chevron-right form-arrow"></i>
      </div>
    </div>
    <div class="col-12 col-xl-3 d-flex flex-column align-items-start justify-content-end pb-3">
      <button id="reserveBtn" type="button" class="btn btn-reserve">Reserve Now</button>
    </div>
  </div>
</div>

<div id="luxury" class="container my-5">
  <div class="row justify-content-center pt-2 pb-5">
    <div class="col-10 text-center">
      <h1>Luxury Has Landed</h1>
      <p>Get ready for a new resort experience coming soon to Hochatown, OK. Located less than an hour north of the Oklahoma/Texas border, Choctaw Landing promises to be the hub of Broken Bow-area entertainment.</p>
    </div>
  </div>
</div>

<div id="room-list" class="container my-5">
  <div class="row">
    <div class="col-12">
      <h2>Room Types</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-xl-6 pt-3 pb-5">
      <div class="row align-items-center">
        <div class="col-12 col-lg-5 col-xl-12">
          <img src="http://choctaw-landing-prod.local/wp-content/uploads/2023/08/one-king-bed.jpg" alt="One King Bed" />
        </div>
        <div class="col-12 col-lg-7 col-xl-12 pt-3 pb-5">
          <div class="row position-relative">
            <div class="col-3 col-xxl-2 d-none d-md-block"></div>
            <div class="col-12 col-md-9 py-3">
              <h3>One King Bed</h3>
            </div>
            <div class="col-3 col-xxl-2 d-none d-md-block">
              <div class="vertical-line-rooms"></div>
            </div>
            <div class="col-12 col-md-9">
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
              <p class="py-2 d-none d-md-block"><img src="/wp-content/uploads/2023/08/double-arrow.svg" class="arrow position-absolute" /><a href="#" download class="arrow-link">Make Reservations</a></p>
              <p class="py-2 d-block d-md-none"><a href="#" download class="btn-default">Make Reservations</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-xl-6 pt-3 pb-5">
      <div class="row align-items-center">
        <div class="col-12 col-lg-5 col-xl-12">
          <img src="http://choctaw-landing-prod.local/wp-content/uploads/2023/08/two-queen-beds.jpg" alt="Two Queen Beds" />
        </div>
        <div class="col-12 col-lg-7 col-xl-12 pt-3 pb-5">
          <div class="row position-relative">
            <div class="col-3 col-xxl-2 d-none d-md-block"></div>
            <div class="col-12 col-md-9 py-3">
              <h3>Two Queen Beds</h3>
            </div>
            <div class="col-3 col-xxl-2 d-none d-md-block">
              <div class="vertical-line-rooms"></div>
            </div>
            <div class="col-12 col-md-9">
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
              <p class="py-2 d-none d-md-block"><img src="/wp-content/uploads/2023/08/double-arrow.svg" class="arrow position-absolute" /><a href="#" download class="arrow-link">Make Reservations</a></p>
              <p class="py-2 d-block d-md-none"><a href="#" download class="btn-default">Make Reservations</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-12 col-xl-6 pt-3 pb-5">
      <div class="row align-items-center">
        <div class="col-12 col-lg-5 col-xl-12">
          <img src="http://choctaw-landing-prod.local/wp-content/uploads/2023/08/family-suite.jpg" alt="Family Suite" />
        </div>
        <div class="col-12 col-lg-7 col-xl-12 pt-3 pb-5">
          <div class="row position-relative">
            <div class="col-3 col-xxl-2 d-none d-md-block"></div>
            <div class="col-12 col-md-9 py-3">
              <h3>Family Suite</h3>
            </div>
            <div class="col-3 col-xxl-2 d-none d-md-block">
              <div class="vertical-line-rooms"></div>
            </div>
            <div class="col-12 col-md-9">
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
              <p class="py-2 d-none d-md-block"><img src="/wp-content/uploads/2023/08/double-arrow.svg" class="arrow position-absolute" /><a href="#" download class="arrow-link">Make Reservations</a></p>
              <p class="py-2 d-block d-md-none"><a href="#" download class="btn-default">Make Reservations</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-12 col-xl-6 pt-3 pb-5">
      <div class="row align-items-center">
        <div class="col-12 col-lg-5 col-xl-12">
          <img src="http://choctaw-landing-prod.local/wp-content/uploads/2023/08/luxury-suite.jpg" alt="Luxury Suite" />
        </div>
        <div class="col-12 col-lg-7 col-xl-12 pt-3 pb-5">
          <div class="row position-relative">
            <div class="col-3 col-xxl-2 d-none d-md-block"></div>
            <div class="col-12 col-md-9 py-3">
              <h3>Luxury Suite</h3>
            </div>
            <div class="col-3 col-xxl-2 d-none d-md-block">
              <div class="vertical-line-rooms"></div>
            </div>
            <div class="col-12 col-md-9">
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
              <p class="py-2 d-none d-md-block"><img src="/wp-content/uploads/2023/08/double-arrow.svg" class="arrow position-absolute" /><a href="#" download class="arrow-link">Make Reservations</a></p>
              <p class="py-2 d-block d-md-none"><a href="#" download class="btn-default">Make Reservations</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<div id="amenities" class="container-fluid my-5" style="background: url('/wp-content/uploads/2023/09/amenities-bg.jpg'); background-position: center; background-size: cover; background-repeat: no-repeat;">
  <div class="container">
    <div class="row">
      <div class="col-12 d-flex align-items-end" style="height: 600px;">
        <h2 class="text-light mb-4">Amenities</h2>
      </div>
    </div>
  </div>
</div>

<div id="experiences" class="container">
  <div class="row align-items-center pt-2 pb-5">
    <div class="col-12 col-lg-5 order-1 order-lg-2">
      <img class="w-100 my-5" src="/wp-content/uploads/2023/09/amenities-unique-experiences.jpg" alt="Unique Experiences" />
    </div>
    <div class="col-12 col-lg-7 order-2 order-lg-1">
      <div class="row position-relative">
        <div class="col-3 col-xl-2 d-none d-md-block"></div>
        <div class="col-12 col-md-9 col-xl-10">
          <h2>Unique Experiences</h2>
        </div>
        <div class="col-3 col-xl-2 d-none d-md-block">
          <div class="vertical-line"></div>
        </div>
        <div class="col-12 col-md-9 col-xl-10">
          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
          <p class="py-4 d-none d-md-block"><img src="/wp-content/uploads/2023/08/double-arrow.svg" class="arrow position-absolute" /><a href="#" download class="arrow-link">Book Your Experiences</a></p>
          <p class="py-4 d-block d-md-none"><a href="#" download class="btn-default">Book Your Experiences</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="relax" class="container offset-topo-bg">
  <div class="row align-items-center pt-2 pb-5">
    <div class="col-12 col-lg-5">
      <img class="w-100 my-5" src="/wp-content/uploads/2023/09/amenities-relax.jpg" alt="Relax & Unwind" />
    </div>
    <div class="col-12 col-lg-7">
      <div class="row position-relative">
        <div class="col-3 col-xl-2 d-none d-md-block"></div>
        <div class="col-12 col-md-9 col-xl-10">
          <h2>Relax &amp; Unwind</h2>
        </div>
        <div class="col-3 col-xl-2 d-none d-md-block">
          <div class="vertical-line"></div>
        </div>
        <div class="col-12 col-md-9 col-xl-10">
          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
          <p class="py-4 d-none d-md-block"><img src="/wp-content/uploads/2023/08/double-arrow.svg" class="arrow position-absolute" /><a href="#" download class="arrow-link">Book Your Spa Day</a></p>
          <p class="py-4 d-block d-md-none"><a href="#" download class="btn-default">Book Your Spa Day</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="physical" class="container">
  <div class="row align-items-center pt-2 pb-5">
    <div class="col-12 col-lg-5 order-1 order-lg-2">
      <img class="w-100 my-5" src="/wp-content/uploads/2023/09/amenities-physical.jpg" alt="Get Physical" />
    </div>
    <div class="col-12 col-lg-7 order-2 order-lg-1">
      <div class="row position-relative">
        <div class="col-3 col-xl-2 d-none d-md-block"></div>
        <div class="col-12 col-md-9 col-xl-10">
          <h2>Get Physical</h2>
        </div>
        <div class="col-3 col-xl-2 d-none d-md-block">
          <div class="vertical-line"></div>
        </div>
        <div class="col-12 col-md-9 col-xl-10">
          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
          <p class="py-4 d-none d-md-block"><img src="/wp-content/uploads/2023/08/double-arrow.svg" class="arrow position-absolute" /><a href="#" download class="arrow-link">Check Out Our Gym</a></p>
          <p class="py-4 d-block d-md-none"><a href="#" download class="btn-default">Check Out Our Gym</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="meeting" class="container">
  <div class="row align-items-center pt-2 pb-5">
    <div class="col-12 col-lg-5">
      <img class="w-100 my-5" src="/wp-content/uploads/2023/09/amenities-meetings.jpg" alt="Meet & Gather" />
    </div>
    <div class="col-12 col-lg-7">
      <div class="row position-relative">
        <div class="col-3 col-xl-2 d-none d-md-block"></div>
        <div class="col-12 col-md-9 col-xl-10">
          <h2>Meetings &amp; Gatherings</h2>
        </div>
        <div class="col-3 col-xl-2 d-none d-md-block">
          <div class="vertical-line"></div>
        </div>
        <div class="col-12 col-md-9 col-xl-10">
          <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
          <p class="py-4 d-none d-md-block"><img src="/wp-content/uploads/2023/08/double-arrow.svg" class="arrow position-absolute" /><a href="#" download class="arrow-link">Reserve Your Space</a></p>
          <p class="py-4 d-block d-md-none"><a href="#" download class="btn-default">Reserve Your Space</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="amenities-list" class="container my-5">
  <div class="row">
    <div class="col-12">
      <h2>Amenities</h2>
    </div>
    <div class="col-12 col-md-6 col-xl-3 p-3">
      <img class="pb-3" src="/wp-content/uploads/2023/09/amenities-thumbnail.jpg" alt="amenities" />
      <h3>Room Service</h3>
      <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore</p>
    </div>
    <div class="col-12 col-md-6 col-xl-3 p-3">
      <img class="pb-3" src="/wp-content/uploads/2023/09/amenities-thumbnail.jpg" alt="amenities" />
      <h3>Lorem Ipsum</h3>
      <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore</p>
    </div>
    <div class="col-12 col-md-6 col-xl-3 p-3">
      <img class="pb-3" src="/wp-content/uploads/2023/09/amenities-thumbnail.jpg" alt="amenities" />
      <h3>Lorem Ipsum</h3>
      <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore</p>
    </div>
    <div class="col-12 col-md-6 col-xl-3 p-3">
      <img class="pb-3" src="/wp-content/uploads/2023/09/amenities-thumbnail.jpg" alt="amenities" />
      <h3>Lorem Ipsum</h3>
      <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore</p>
    </div>
  </div>
</div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
  jQuery(function($) {
    $(document).ready(function() {
      $('input[name="dates"]').daterangepicker();
    });
  });
</script>

<?php
get_footer();

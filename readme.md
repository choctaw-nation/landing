# Overview

The WP Theme for the Choctaw Landing page.

# Changelog

## v1.0.11

-   Add redirects to prevent `single-*` templates from being viewed
-   Prep the Newsroom by updating slugs
-   Fix bugs
-   Update plugins with submodules

## v1.0.8

-   Update packages
-   Add `margin-top:110px` back to the `.hero` class now that the alert banner bar is removed
-   Bundle daterangepicker css
-   Add a `visually-hidden` H1 on the homepage
-   Swap `Title_Bar` `h2` for `h1`
-   Add Moment & Date Range Picker asset `import` statements in the CNO version of the file

    -   Removed CDN enqueue from `theme_init` for Date Range Picker since it's now bundled + minified
    -   Removed Moment from enqueue as it ships with WordPress
    -   Updated `dependencies` for the style/script enqueue to use the `*.asset.php` file

-   TODO: Make the .hero class or the alert-banner-bar plugin styles more resilient

## v1.0.2

-   Fix favicon URI path issue

## v1.0.1

-   Remove manual declaration of GTM scripts in favor of Google Site Kit
-   Bump package dependencies and rebuild site assets

## v1.0.0

-   Release! 🎉
-   Reset Changelog to back-version all previous updates as `0.x.x.x`

## v0.2.2.2

-   Fix header styles

## v0.2.2.1

-   Fix booking url bug

## v0.2.1.0

-   Allow dropdown toggle visibility on the header

## v0.2.0.0

-   **Breaking Change:** Migrated Events into Repo and changed link structure
-   **Breaking Change:** Swapped "Entertainment" for "Events" and updated link structure

## v0.1.0.3

-   First official release!
-   All accessibility issue solved, awaiting actual content.

## v0.0.2.5

-   Partial fix to [#11](https://github.com/choctaw-nation/landing/issues/11) accessibility ([see comment](https://github.com/choctaw-nation/landing/issues/11#issuecomment-1792691926)), but still some issues to solve for full usability.

## v0.0.2.4

-   Adds Gathering Page Template

## v0.0.2.3

-   Update sections to use Swiper

## v0.0.2.2

-   Updated weather widget to use custom fields to handle data fetching and rate limiting with the weather API

## v0.0.2.1

-   Added a wrapper for `Two_Col_Section::get_the_section_id` to not throw errors
-   Removed superfluous scss (outside of `src` folder).

## v0.0.2

-   bug fixes and improvements (see [Github Issue #1](https://github.com/choctaw-nation/landing/issues/1))
-   Init Bootstrap Toasts
-   Init Component Section Class
-   init Composre & NPM
-   Cleanup functions.php
-   Optimize Bootstrap/Bootscore bundle sizes
-   Created the `cno-navwalker` class to appropiately scope our team's changes to a specific subclass while not touching the underyling logic (see _[polymorphism](https://www.javatpoint.com/polymorphism-in-php)_).
-   Created all of the ACF class fields for content generation

### Weather Widget

-   Powered by Open Weather Map. See `wp-config-sample.php` & @kjroelke for details
-   Weather Widget uses the `ChoctawNation` namespace for simple, non-conflicting class names (e.g. `Weather` and `API`)
-   Also uses Bootstrap Icons package for weather icons (generates svg code)

### Booking Module

-   Got refactored (per [#1](https://github.com/choctaw-nation/landing/issues/1))
    -   Refactored into template part
    -   Template Part loads scripts & styles in the right place
-   Improved UI with Toast message handling
-   Updated HTML/CSS for better accessibility
    -   BUG: Initial date picker is not ideal for keyboard-only users, but _technically_ workable.

---

## v0.0.1.1

-   Remove WooCommerce Styles from SCSS compiler
-   Rename theme & match version control (with further checks for WP + PHP version).

---

## v0.0.1

-   Init github repo
-   init package manager configs
-   All of @blake-perkins-dev's changes.

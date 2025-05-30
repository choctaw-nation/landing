# Overview

The WP Theme for the Choctaw Landing page.

# Changelog

## v2.7.0

-   Added: Single Eat & Drink posts now support online order links!

## v2.6.5

-   Fixed: Single "Featured Special" looks nicer now when 2+ are present

## v2.6.4

-   Fixed: Single "Featured Special" looks nice now

## v2.6.3

-   Fixed: Events are now sorted first by start date _and then_ by start time.
-   Chore: Updated packages.

## v2.6.2

-   Fixed: `$specials` property is now being set correctly when specials are assigned but unpublished.
-   Chore: Update Packages
-   Chore: Update theme compat to 6.7.2

## v2.6.1

-   Button links on `single-news.php` pages no longer have underlines

## v2.6.0

-   Specials now have an additional "end date" field to auto handle expirations

## v2.5.2

-   Fixed a bug that caused federated Casino Promos not to appear
-   Patched a security vulnerability

## v2.5.1

-   Updated the Event Single pages to show dates and times appropriately

## v2.5.0

-   Added new ACF field for selecting a specific event to highlight on the "Events" page template
-   Fixed image loading for single events pages' hero images to be eagerly-loaded (since it's above-the-fold content)
-   Fixed a bug where the single events pages would break if a venue wasn't set

## v2.4.6

-   Added webpack config to remove dead `.js` files
-   Updated packages
-   Updated: Promotions API Bugs & Code Quality
    -   API asks for 100 (max) posts per page to reduce the need for paginated (chained) requests
    -   API now handles pagination in the rest request
    -   API uses an associative array (dictionary/map) to clearly identify `casino_locations` taxonomy IDs from choctawcasinos.com instead of using magic numbers

## v2.4.5

-   Updated npm packages
-   Fixed a bug that allowed Specials to appear, even when their status was "draft"

## v2.4.4

-   Updated npm packages
-   Introduced new events page card style
-   Fixed a bug where end date wasn't appearing when it should be

## v2.4.3

-   Fixed an issue where the featured events swiper button wasn't pointing to the correct events page

## v2.4.2

-   Fixed an issue where `/events` archive wasn't redirecting properly

## v2.4.1

-   Updated Casino Promotions Handler logic to filter promotions based on ACF "start/end date" parameter (regardless of post status)

## v2.4.0

-   Added extra information to "featured special" cards on /eat-drink
-   Optimized image loading for ShortPixel AI's engine

## v2.3.2

-   Fixed a bug where two-col settings with the topographic background didn't have the appropriate padding on them.

## v2.3.1

-   Hide events swiper when no swiper images available
-   Test with WP 6.7 and get working (see [the new `sizes` attr fix](https://core.trac.wordpress.org/ticket/61847#comment:23))
-   Update ACF fields

## v2.3.0

-   Rebuild `/events` to combine the UX of `/all-events` and redirect `/all-events` to the Events page

## v2.2.1

-   Handled a use-case where there may be nothing to loop through on /events page

## v2.2.0

-   Fixed a bug where the SVG & `.vertical-line` arrow were out of alignment on odd screen sizes < 991px
-   Fixed a bug where the SVG went too far down on screen sizes less than bs `lg`
-   Added "Specials" CPT support for PDF assets

## v2.1.2

-   Add (and use) new image sizes
-   Update packages
-   Update link for Casino Promos swiper "View All" CTA

## v2.1.1

-   Add "View All" to promos
-   Update Spacing on promos
-   Update text content on promos

## v2.1.0

-   Update Events `single.php` page template
-   Update Events swiper to use 9:16 images
-   Add new ACF fields
-   Clean up spacing & double-arrow styles

## v2.0.1

-   Update Bootstrap to use font-base of 1rem = 16px (was previously 1rem = 10px).
-   Tighten up spacing on two-col elements when wrapping to 1 column
-   Use svg instead of image for double-arrow

## v1.9.2

-   When "View Specials" CTA is present, anchor now takes a user directly to the specials section
-   Links are wrapped in `user_trailingslashit`

## v1.9.1

-   Updated the look of /specials single when no hero image is provided

## v1.9.0

-   Added new "Specials" options on eat and drink
-   Added new Promotions Swiper on /things-to-do
-   Updated /events to use the Featured Events Swiper (as seen on /things-to-do)
-   Updated spacing on /events

## v1.8.1

-   Fixed `<header>` margin on `single-eat-and-drink.php` layout

## v1.8.0

-   Site now handles F&B Specials!

## v1.7.1

-   Fixed a bug where an optional value (in ACF fields) was causing pages to break if not filled out correctly

## v1.7.0

-   Update page-mercantile to handle empty content sections
-   Add ability for homepage CTA for sections to fire a modal

## v1.6.7

-   Update packages and deploys

## v1.6.6

-   Updated layout for `/all-events` to a masonry grid
-   Fixed a bug with the header offset. White bar is removed and nav items should scroll to appropriate place.
-   Updated npm packages to remove security vulnerabilities
-   Updated `composer.lock` to use latest configs
-   Added new CSS `.text-transform-none` class to `_utilities.scss`
-   Fixed mega-menu bug where hover would fail on desktop screens

## v1.6.5

-   Further fixed a bug that disallowed users from using top-level navs as expected.

## v1.6.4

-   Update the weather widget to use the Transients API and to average the weather data (or get the highest amount if no average).

## v1.6.3

-   Fixed a bug that disallowed users from using top-level navs as expected.

## v1.6.2

-   Updated `meta` tags for event `singles` for better SEO
-   Refactored `theme-functions` and `Theme_Init` for cleaner, OOP-style handling of hooks/filters for plugins (e.g. modifying CNO plugins and Yoast)

## v1.6.1

-   Fix a bug where nav menu anchors were overshooting the content on page scroll.
-   `user_trailingslashit` function is now used profusely.

## v1.6.0

-   Added ability to fire a modal on `/things-to-do` featured sections
-   Added [new image sizes](https://github.com/choctaw-nation/landing/wiki/Images) and updated classes to use them

## v1.5.0

-   Added lightbox + carousel to `/stay` image gallery

## v1.4.4

-   Update weather widget bg
-   Update nav spacing
-   Refactor header offset function into a class and attach a method to the `window.resize` event
-   Update booking bar bg

## v1.4.3

-   If no events, hide the featured event swiper's `topo-bg` div.

## v1.4.0

-   Added Room Types repeater fields on /meet-gather page

## v1.3.0

-   Added a new Options Page (and fields) to power the Events Archive floating image

## v1.2.0

-   Adds a new ACF field to `/stay` to allow a user to upload property map image/pdf
-   Refactor Buttons to reduce CSS in favor of customized Bootstrap classes
-

## v1.1.3

-   Fix booking form bg-image

## v1.1.2

-   Added console warning if CSS Custom Property `header-offset` isn't set with JS.
-   Updated featured events swiper layout

## v1.1.1

-   Update newsroom styles and layout

## v1.1.0

-   Refactored Events swiper to be powered by "Featured" tag and usable in multiple places
-   Added Image swiper for Room photos
-   Optimized background image loading
-   Built a new Meet & Gather page template
-   Added better handling if content doesn't exist in certain ACF fields (doesn't break site)

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

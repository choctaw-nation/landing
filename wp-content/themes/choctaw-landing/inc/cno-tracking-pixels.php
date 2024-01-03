<?php
/**
 * CNO Tracking Pixels
 * Added in compliance with WorkFront task
 *
 * @link https://choctawnation.my.workfront.com/issue/6541112c0011076187483d4851f44519/updates
 * @since 0.2.3
 * @package ChoctawNation
 */

/** The pixels to add to the `<head>` of every page */
function cno_add_pixels() {
	$is_prod_env = 'prod' === $_ENV['CNO_ENV'];
	$is_end_user = ! is_user_logged_in();
	if ( ! $is_prod_env && ! $is_end_user ) {
		return;
	}
	// GTM
	echo "<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-NHND93MH');</script>
	<!-- End Google Tag Manager -->";

	// Facebook
	echo '<meta name="facebook-domain-verification" content="p7k8b3wboq8ytze35uncny0182e3jz" />';
}
/**
 * Prints scripts or data in the head tag on the front end.
*/
add_action( 'wp_head', 'cno_add_pixels' );


function cno_google_in_body(): void {
	echo '<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NHND93MH"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->';
}
add_action( 'wp_body_open', 'cno_google_in_body' );
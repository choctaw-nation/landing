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
	echo "<!-- Meta Pixel Code --><script type='text/javascript'>!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window, document,'script','https://connect.facebook.net/en_US/fbevents.js');fbq('init', '1718710355276208');fbq('track','PageView');</script><noscript><img height='1' width='1' style='display:none'src='https://www.facebook.com/tr?id=1718710355276208&ev=PageView&noscript=1'/></noscript><!-- End Meta Pixel Code -->";
	echo '<meta name="facebook-domain-verification" content="p7k8b3wboq8ytze35uncny0182e3jz" />';
}
/**
 * Prints scripts or data in the head tag on the front end.
*/
add_action( 'wp_head', 'cno_add_pixels' );
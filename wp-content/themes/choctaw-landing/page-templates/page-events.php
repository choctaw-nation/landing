<?php
/**
 * Template Name: Events
 *
 * @package ChoctawNation
 */

use ChoctawNation\Asset_Loader;
use ChoctawNation\Enqueue_Type;

new Asset_Loader( 'eventsArchive', Enqueue_Type::style, 'pages' );
get_header();
?>
<main <?php post_class( array( 'alignfull', 'is-layout-constrained', 'has-global-padding' ) ); ?> style="margin-top:var(--header-offset);margin-bottom:var(--wp--preset--spacing--xl);">
	<?php the_content(); ?>
</main>
<?php
get_footer();

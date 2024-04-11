<?php
/**
 * Template: Single Eat and Drink (CPT)
 * This shouldn't be viewable, but just in case.
 *
 * @package ChoctawNation
 */

use ChoctawNation\ACF\Featured_Eat;

get_header();
$content = new Featured_Eat( $post, false )
?>
<div <?php post_class( 'container' ); ?> style="margin-top: var(--header-offset);">
	<nav class="breadcrumb mt-5">
		<a href="/eat-drink" class='breadcrumb-item'>Back to Eat & Drink</a>
	</nav>
	<article class="mt-5 py-5">
		<div class="row justify-content-center">
			<?php echo $content->get_col_1() . $content->get_col_2(); ?>
		</div>
	</article>
</div>
<?php
get_footer();

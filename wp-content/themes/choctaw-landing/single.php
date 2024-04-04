<?php
/**
 * Single.php
 *
 * @package ChoctawNation
 */

get_header();
?>

<article class="container" style="margin-top: var(--header-offset);">
	<div class="row justify-content-center my-5 py-5">
		<div class="col-12 col-lg-10">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'full', array( 'class' => 'img-fluid object-fit-cover' ) );
			}
			the_title( '<h1>', '</h1>' );
			the_content();
			?>
		</div>
	</div>

</article>

<?php
get_footer();

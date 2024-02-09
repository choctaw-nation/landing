<?php
/**
 * The template for displaying news releases
 */

?>
<div class="container-fluid py-5">
	<div class="container mt-3 pt-3 pb-5 px-3">
		<h2 class="mb-4 text-uppercase">News Releases</h2>
		<?php
		while ( have_rows( 'new_releases' ) ) :
			the_row();
			?>
		<p>
			<a href="<?php the_sub_field( 'url' ); ?>" target="_blank">
				<?php the_sub_field( 'link_title' ); ?>
			</a>
		</p>
		<?php endwhile; ?>
	</div>
</div>

<?php
/**
 * Highlights Section
 */

?>
<section class="container-fluid py-5 bg-light text-dark">
	<div class="container text-center mt-3 pt-3 px-3">
		<div class="row">
			<?php
			while ( have_rows( 'highlights' ) ) :
				the_row();
				?>
			<div class="col-12 col-lg-4 d-flex flex-column mb-5">
				<div class="text-center">
					<img src="<?php the_sub_field( 'image' ); ?>" alt="<?php the_sub_field( 'title' ); ?>" class="mb-3 feature-logo" />
				</div>
				<div>
					<?php the_sub_field( 'description' ); ?>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>

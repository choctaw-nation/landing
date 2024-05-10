<?php
/**
 * Room Details
 *
 * @package ChoctawNation
 */

?>
<section class="my-5">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2>Room Details</h2>
			</div>
		</div>
		<div class="row row-cols-1 row-cols-md-2 row-gap-4">
			<?php while ( have_rows( 'rooms' ) ) : ?>
			<?php the_row(); ?>
			<div class='col'>
				<div class="room h-100 w-100 border border-1 border-primary rounded-0 shadow p-3">
					<h3 class="fs-4 mb-4"><?php the_sub_field( 'room_name' ); ?> (<?php the_sub_field( 'sq_ft' ); ?> sq. ft.)</h3>
					<?php
					if ( have_rows( 'capacities' ) ) {
						echo '<ul>';
						while ( have_rows( 'capacities' ) ) {
							the_row();
							echo '<li>For ' . esc_textarea( get_sub_field( 'capacity_label' ) ) . ' meeting type: ' . absint( get_sub_field( 'capacity' ) );
							echo '</li>';
						}
						echo '</ul>';
					}
					?>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>
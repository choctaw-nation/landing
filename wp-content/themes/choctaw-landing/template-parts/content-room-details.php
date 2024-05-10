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
			<?php
			while ( have_rows( 'rooms' ) ) {
				the_row();
				echo "<div class='col-10'>";
				the_sub_field( 'room_name' );
				the_sub_field( 'sq_ft' );
				if ( have_rows( 'capacities' ) ) {
					echo '<ul>';
					while ( have_rows( 'capacities' ) ) {
						the_row();
						echo '<li>';
						the_sub_field( 'capacity_type' );
						the_sub_field( 'capacity' );
						echo '</li>';
					}
					echo '</ul>';
				}
				echo '</div>';
			}
			?>
		</div>
	</div>
</section>
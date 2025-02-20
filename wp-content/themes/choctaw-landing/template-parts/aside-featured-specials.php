<?php
/**
 * Featured Specials Aside
 *
 * @package ChoctawNation
 * @subpackage EatAndDrink
 */

use ChoctawNation\ACF\FB_Specials;

$featured_specials = array();
foreach ( $args['featured_specials'] as $special ) {
	if ( 'publish' === $special->post_status ) {
		$featured_specials[] = new FB_Specials( $special );
	}
}

$cols_map = array(
	1 => 'col',
	2 => 'col col-xl-6 flex-grow-1',
	3 => 'col col-xl-4',
);
if ( array_key_exists( count( $featured_specials ), $cols_map ) ) {
	$col_classes = $cols_map[ count( $featured_specials ) ];
}

?>
<aside id="featured-specials" class="blue-topo-bg mt-5 pt-4 pb-5">
	<h2 class="text-center text-white fw-bold fs-2 mb-4">Featured <?php echo count( $featured_specials ) > 1 ? 'Specials' : 'Special'; ?></h2>
	<div class="container gx-lg-0">
		<div class="row justify-content-center">
			<div class="<?php echo count( $featured_specials ) > 2 ? 'col-10' : 'col'; ?>">
				<div class="row row-cols-auto row-gap-3 align-items-stretch justify-content-center">
					<?php foreach ( $featured_specials as $special ) : ?>
					<div class="<?php echo $col_classes; ?>">
						<?php
						get_template_part(
							'template-parts/card',
							'fb-special',
							array(
								'special'     => $special,
								'orientation' => count( $featured_specials ) > 2 ? 'vertical' : 'horizontal',
							)
						);
						?>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</aside>

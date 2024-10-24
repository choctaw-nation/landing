<?php
/**
 * Featured Specials Aside
 *
 * @package ChoctawNation
 */

use ChoctawNation\ACF\FB_Specials;

$featured_specials = array_map(
	function ( $special ) {
		return new FB_Specials( $special );
	},
	$args['featured_specials']
);

$cols_map = array(
	2 => 'col-xl-6',
	3 => 'col-xl-4',
);
if ( array_key_exists( count( $featured_specials ), $cols_map ) ) {
	$cols = $cols_map[ count( $featured_specials ) ];
}
?>
<aside id="featured-specials" class="blue-topo-bg mt-5 pt-4 pb-5">
    <h2 class="text-center text-white fw-bold fs-2 mb-4">Featured Specials</h2>
    <div class="container gx-lg-0">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row row-cols-auto row-gap-3 align-items-stretch justify-content-center">
                    <?php foreach ( $featured_specials as $special ) : ?>
                    <div class="col <?php echo $cols; ?> flex-grow-1">
                        <div class="card h-100 text-bg-light d-flex flex-column shadow">
                            <?php if ( $special->has_image() ) : ?>
                            <figure class="ratio ratio-1x1">
                                <?php $special->the_image( 'full', array( 'class' => 'w-100 h-100 object-fit-cover' ) ); ?>
                            </figure>
                            <?php endif; ?>
                            <div class="card-body m-4">
                                <div class="header">
                                    <h3 class="fw-bold mb-0 lh-sm">
                                        <?php $special->the_title(); ?>
                                    </h3>
                                    <p class="fw-bold fs-6">
                                        <?php $special->the_date(); ?>
                                    </p>
                                </div>
                                <div class="content d-flex flex-column mb-4">
                                    <div class="fs-6">
                                        <?php $special->the_description(); ?>
                                    </div>
                                </div>
                            </div>
                            <?php $locations = $special->get_the_related_posts(); ?>
                            <?php if ( $locations ) : ?>
                            <div class="card-footer mt-auto mx-4">
                                <?php
								$location_anchors = array();
								foreach ( $locations as $location ) {
									$location_anchors[] = '<a href="' . get_the_permalink( $location ) . '" class="text-decoration-underline">' . get_the_title( $location ) . '</a>';
								}
								?>
                                <p class="fs-6 fst-italic">
                                    Available at: <?php echo implode( ', ', $location_anchors ); ?>
                                </p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</aside>

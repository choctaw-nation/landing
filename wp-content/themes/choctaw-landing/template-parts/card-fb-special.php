<?php
/**
 * F&B Special Card
 *
 * @package ChoctawNation
 * @subpackage EatAndDrink
 */

$special     = $args['special'];
$orientation = $args['orientation'];

$card_classes = array(
	'card',
	'h-100',
	'text-bg-light',
	'shadow',

);

$is_horizontal = 'horizontal' === $orientation;
if ( $is_horizontal ) {
	$horizontal_classes = array(
		'row',
		'row-cols-md-2',
		'w-auto',
		'align-items-center',
	);
	$card_classes       = array_merge( $card_classes, $horizontal_classes );
}
?>
<div class="<?php echo implode( ' ', $card_classes ); ?>">
	<?php if ( $special->has_image() ) : ?>
		<?php if ( $is_horizontal ) : ?>
	<div class="gx-0 flex-grow-1">
		<?php endif; ?>
		<figure class="ratio ratio-1x1 <?php echo $is_horizontal ? 'mb-md-0' : ''; ?>">
			<?php $special->the_image( 'full', array( 'class' => 'w-100 h-100 object-fit-cover' ) ); ?>
		</figure>
		<?php if ( $is_horizontal ) : ?>
	</div>
	<?php endif; ?>
	<?php endif; ?>
	<div class="card-body mx-4 mb-3 d-flex flex-column">
		<div class="header">
			<h3 class="fw-bold mb-0 lh-sm" style="font-size:clamp(32px,95%,48px);">
				<?php $special->the_title(); ?>
			</h3>
			<p class="fw-bold fs-6">
				<?php $special->the_date(); ?>
			</p>
		</div>
		<div class="content mb-2">
			<div class="fs-6">
				<?php $special->the_description(); ?>
			</div>
		</div>
		<?php $locations = $special->get_the_related_posts(); ?>
		<?php if ( $locations ) : ?>
		<div class="card-footer mt-auto">
			<?php
			$location_anchors = array();
			foreach ( $locations as $location ) {
				$location_anchors[] = '<a href="' . get_the_permalink( $location ) . '" class="text-decoration-underline">' . get_the_title( $location ) . '</a>';
			}
			?>
			<p class="fs-6 fst-italic mb-0">
				Available at: <?php echo implode( ', ', $location_anchors ); ?>
			</p>
		</div>
		<?php endif; ?>
	</div>
</div>

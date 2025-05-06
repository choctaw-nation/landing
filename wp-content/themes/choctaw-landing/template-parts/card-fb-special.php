<?php
/**
 * F&B Special Card
 *
 * @package ChoctawNation
 * @subpackage EatAndDrink
 */

$special     = $args['special'];
$orientation = $args['orientation'];

$card_classes  = array(
	'card',
	'h-100',
	'text-bg-light',
	'shadow',
);
$is_horizontal = 'horizontal' === $orientation;

$additional_classes = $is_horizontal ? array(
	'row',
	'row-cols-md-2',
	'w-auto',
	'align-items-center',
) : array( 'd-flex', 'flex-column' );

$card_classes = array_merge( $card_classes, $additional_classes );
?>
<div class="<?php echo implode( ' ', $card_classes ); ?>">
	<?php
	if ( $special->has_image() ) {
		$figure_classes = 'ratio ratio-1x1' . ( $is_horizontal ? ' mb-md-0' : '' );
		$figure_markup  = "<figure class='{$figure_classes}'>" . $special->get_the_image( 'full', array( 'class' => 'w-100 h-100 object-fit-cover' ) ) . '</figure>';
		if ( $is_horizontal ) {
			echo '<div class="gx-0">' . $figure_markup . '</div>';
		} else {
			echo $figure_markup;
		}
	}
	$card_body_classes = array(
		'card-body',
		'd-flex',
		'flex-column',
		'mb-3',
	);
	if ( ! $is_horizontal ) {
		$card_body_classes = array_merge( $card_body_classes, array( 'flex-grow-1', 'mx-4' ) );
	}
	if ( $is_horizontal ) {
		$card_body_classes = array_merge( $card_body_classes, array( 'mb-lg-0' ) );
	}
	?>
	<div class="<?php echo implode( ' ', $card_body_classes ); ?>">
		<div class="header">
			<h3 class="fw-bold mb-0 lh-sm" style="font-size:clamp(32px,95%,48px);">
				<?php $special->the_title(); ?>
			</h3>
			<div class="fs-6 fw-bold">
				<span>
					<?php
					echo rtrim( $special->get_the_date() );
					if ( $special->get_the_price() ) {
						echo ',&nbsp;' . $special->get_the_price();
					}
					?>
				</span>
			</div>
		</div>
		<div class="content mb-2">
			<div class="fs-6">
				<?php $special->the_description(); ?>
			</div>
			<?php if ( $special->has_asset() ) : ?>
			<div class="my-3">
				<?php $special->the_asset(); ?>
			</div>
			<?php endif; ?>
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
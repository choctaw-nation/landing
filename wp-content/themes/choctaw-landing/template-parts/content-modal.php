<?php
/**
 * Modal
 *
 * @package ChoctawNation
 */

$modal_id = empty( $args['id'] ) ? 'the-modal' : $args['id'];
?>
<div class="modal fade" id="<?php echo $modal_id; ?>" tabindex="-1" aria-labelledby="<?php echo "{$modal_id}-label"; ?>" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="<?php echo "{$modal_id}-label"; ?>"></h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

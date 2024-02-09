<?php
/**
 * Handles Bootstrap's Toasts
 *
 * @since 0.2
 * @package ChoctawNation
 */

?>
<div class="toast-container position-fixed bottom-0 end-0 p-3 zi-1030">
	<div class="toast bg-warning text-white" role="alert" aria-live="assertive" aria-atomic="true" id='bootstrap-toast'>
		<section class="toast-body d-inline-flex flex-nowrap">
			<div class="toast-message fs-5 me-3"><?php echo empty( $args['message'] ) ? 'Something went wrong!' : $args['message']; ?></div>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</section>
	</div>
</div>

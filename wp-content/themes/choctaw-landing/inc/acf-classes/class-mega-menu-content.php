<?php
/**
 * The Mega Menu Content API
 *
 * @package ChoctawNation
 * @since 0.2
 */

/** The Mega Menu Content Page */
class Mega_Menu_Content extends ACF_Generator {
	private bool $has_cta;
	private array $cta_link;
	private array $featured_event;

	protected function init_props( array $acf ) {
		$this->set_the_image( $acf['image'] );
		$this->has_cta = $acf['has_cta'];
		if ( $this->has_cta ) {
			$this->cta_link = $acf['cta_link'];
		}
		if ( $acf['featured_event'] ) {
			$this->featured_event = $acf['featured_event'];
		}
	}

	public function get_the_content(): string {
		$markup = '';
		if ( isset( $this->featured_event ) ) {
			$markup = $this->get_the_featured_event();
		} else {
			$markup;
		}
		return $markup;
	}

	public function get_the_featured_event() {
		// do something
		return;
	}
}
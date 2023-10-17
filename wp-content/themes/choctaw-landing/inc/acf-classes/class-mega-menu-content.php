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
	private array $cta;
	private array $featured_event;

	// phpcs:ignore
	protected function init_props( array $acf ) {
		$this->set_the_image( $acf['image'] );
		$this->has_cta = $acf['has_cta'];
		if ( $this->has_cta ) {
			$this->cta = $acf['cta_link'];
		}
		if ( isset( $acf['featured_event'] ) ) {
			$this->featured_event = $acf['featured_event'];
		}
	}

	public function get_the_content(): string {
		$markup = '';
		if ( isset( $this->featured_event ) ) {
			$markup = $this->get_the_featured_event();
		} else {
			$markup = $this->image->get_the_image( 'mega-menu__image' );
			if ( $this->has_cta ) {
				$markup .= $this->get_the_cta();
			}
		}
		return $markup;
	}

	public function get_the_featured_event(): string {
		return 'The Featured Event';
	}

	/**
	 * Generate the HTML markup for the Call to Action (CTA) element.
	 *
	 * @return string - The HTML markup for the CTA.
	 */
	private function get_the_cta(): string {
		$href   = esc_url( $this->cta['url'] );
		$text   = esc_textarea( $this->cta['title'] );
		$target = $this->cta['target'];
		$cta    = "<a href='{$href}' class='mega-menu__btn mt-3 d-inline-block w-100 text-uppercase text-center' target='{$target}'>{$text}</a>";
		return $cta;
	}
}
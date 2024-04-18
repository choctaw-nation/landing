<?php
/**
 * Hero Section Class
 *
 * @package ChoctawNation
 * @subpackage ACF
 */

namespace ChoctawNation\ACF;

/**
 * Generates the Hero Section
 */
class Hero_Section extends Generator {
	/**
	 * The headline text, or null
	 *
	 * @var ?string $headline
	 */
	private ?string $headline;

	/**
	 * Headline Position
	 *
	 * Options: [bottom-right, bottom-left, top-right, top-left, center-left, center, center-right]
	 *
	 * @var string $headline_position
	 */
	private string $headline_position;

	/**
	 * The video iframe
	 *
	 * @var ?string $video
	 */
	private ?string $video;

	// phpcs:ignore
	protected function init_props( array $acf ) {
		$this->headline = empty( $acf['headline'] ) ? null : acf_esc_html( $acf['headline'] );
		$this->video    = empty( $acf['video'] ) ? null : $acf['video'];
		if ( $this->video ) {
			$this->handle_video_params();
		}
		if ( ! empty( $acf['image'] ) ) {
			$this->set_the_image( $acf['image'] );
		} else {
			$this->image = null;
		}
		$this->headline_position = 'position-absolute z-3 center';
	}

	/**
	 * Add extra parameters to the video iframe
	 */
	private function handle_video_params() {
		$iframe = $this->video;
		preg_match( '/src="(.+?)"/', $iframe, $matches );
		$src = $matches[1];

		// Add extra parameters to src and replace HTML.
		$params  = array(
			'controls' => 0,
			'hd'       => 1,
			'autohide' => 1,
			'loop'     => 1,
			'muted'    => 1,
			'autoplay' => 1,
		);
		$new_src = add_query_arg( $params, $src );
		$iframe  = str_replace( $src, $new_src, $iframe );

		// Add extra attributes to iframe HTML.
		$attributes  = 'frameborder="0" autoplay="true" muted="true" allow="autoplay"';
		$iframe      = str_replace( '></iframe>', ' ' . $attributes . '></iframe>', $iframe );
		$this->video = $iframe;
	}

	/**
	 * Get the video markup with a responsive container
	 */
	private function get_the_video(): string {
		return "<div class='ratio ratio-21x9 h-100 d-none d-md-block mx-auto  hero__bg-container'>{$this->video}</div>";
	}

	/**
	 * Generate the markup for the hero section
	 */
	public function get_the_hero(): string {
		$has_media_bg       = $this->video || $this->image;
		$headline_classes   = array( 'hero-headline', 'text-uppercase', 'd-flex', 'flex-column' );
		$headline_classes[] = $has_media_bg ? "text-white {$this->headline_position}" : 'text-primary';
		$headline_classes   = implode( ' ', $headline_classes );
		$headline           = $this->headline ? "<h1 class='{$headline_classes}'>{$this->headline}</h1>" : '';
		$markup             = "<header id='header-img'" . ( $has_media_bg ? '' : " class='position-relative d-flex justify-content-center align-items-center' style='height:clamp(20vw,30vw,40vw);'" ) . '>';
		$markup            .= $has_media_bg ? $this->get_the_hero_bg() : '';
		$markup            .= "{$headline}</header>";
		return $markup;
	}

	/**
	 * Get the hero background markup. Returns a video, an image, both, or a blank container with a bg color.
	 */
	private function get_the_hero_bg(): string {
		$markup = '';
		if ( $this->video && $this->image ) {
			$markup  = $this->get_the_video();
			$markup .= $this->image->get_the_image( 'd-md-none skip-lazy', false );
		} elseif ( ! $this->video && $this->image ) {
			$markup  = "<div class='ratio ratio-21x9 mx-auto hero__bg-container'>";
			$markup .= $this->image->get_the_image( 'hero__image object-fit-cover skip-lazy', false );
			$markup .= '</div>';
		} elseif ( $this->video && ! $this->image ) {
			$markup = $this->get_the_video();
		}
		return $markup;
	}

	/**
	 * Echoes the hero section
	 */
	public function the_hero() {
		echo $this->get_the_hero();
	}
}

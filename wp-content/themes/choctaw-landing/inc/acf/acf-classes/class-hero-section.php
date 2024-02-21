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
	private string $headline;
	private string $headline_position;
	private ?string $video;

	protected function init_props( array $acf ) {
		$this->headline = esc_textarea( $acf['headline'] );
		$this->video    = empty( $acf['video'] ) ? null : $acf['video'];
		$this->handle_video_params();
		$this->set_the_image( $acf['image'] );
		$this->headline_position = $acf['headline_position'];
	}

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

	private function get_the_video(): string {
		return "<div class='ratio ratio-16x9'>{$this->video}</div>";
	}

	public function get_the_hero(): string {
		$headline = "<h1 class='hero-headline text-white text-uppercase d-flex flex-column position-absolute z-3 fw-normal {$this->headline_position}'><span class='hero-headline__line-1 ms-2 ms-sm-0'>A place to</span><span class='hero-headline__line-2'>{$this->headline}</span></h1>";
		$markup   = "<header id='header-img' class='hero container-fluid gx-0 position-relative'>";
		if ( ! empty( $this->video ) ) {
			$markup .= $this->get_the_video();
		} else {
			$markup .= $this->image->get_the_image();
		}
		$markup .= "{$headline}</header>";
		return $markup;
	}

	public function the_hero() {
		echo $this->get_the_hero();
	}
}

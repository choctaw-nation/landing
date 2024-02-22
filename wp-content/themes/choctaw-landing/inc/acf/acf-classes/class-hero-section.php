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
	private ?string $video;

	protected function init_props( array $acf ) {
		$this->headline = empty( $acf['headline'] ) ? null : esc_textarea( $acf['headline'] );
		$this->video    = empty( $acf['video'] ) ? null : $acf['video'];
		if ( $this->video ) {
			$this->handle_video_params();
		}
		$this->set_the_image( $acf['image'] );
		$this->headline_position = 'position-absolute z-3 center';
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
		return "<div class='ratio ratio-21x9 h-100 d-none d-md-block'>{$this->video}</div>";
	}

	public function get_the_hero(): string {
		$headline = $this->headline ? "<h1 class='hero-headline text-white text-uppercase d-flex flex-column w-normal {$this->headline_position}'>{$this->headline}</h1>" : '';
		$markup   = "<header id='header-img' class='hero container-fluid gx-0 position-relative'>";
		$markup  .= $this->get_the_video();
		$markup  .= $this->image->get_the_image( 'd-md-none' );
		$markup  .= "{$headline}</header>";
		return $markup;
	}

	public function the_hero() {
		echo $this->get_the_hero();
	}
}

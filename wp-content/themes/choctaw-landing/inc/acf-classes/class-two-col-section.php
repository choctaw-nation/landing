<?php
/**
 * Component Section Generator class
 *
 * @package ChoctawNation
 * @since 0.2
 */

/** Used to handle ACF markup */
class Two_Col_Section extends ACF_Generator {
	private string|int|null $section_id;
	private string $headline;
	private string $subheadline;
	private bool $has_cta;
	private array $cta;
	private array $img;
	private bool $has_topography_bg;
	private bool $should_reverse;
	private bool $img_is_full_width;

	/** Inits the class
	 *
	 * @param int             $post_id the post id
	 * @param array           $acf_fields the acf fields
	 * @param string|int|null $section_id the section_id
	 */
	public function __construct( int $post_id, array $acf_fields, string|int|null $section_id = null ) {
		$this->post_id    = $post_id;
		$this->section_id = $section_id;
		$this->init_props( $acf_fields );
	}

	/** Sets the Class variables based on ACF fields
	 *
	 * @param array $acf the ACF fields
	 */
	protected function init_props( array $acf ) {
		$this->headline          = esc_textarea( $acf['headline'] );
		$this->subheadline       = acf_esc_html( $acf['subheadline'] );
		$this->has_cta           = $acf['has_cta'];
		$this->cta               = $acf['cta'];
		$this->should_reverse    = $acf['should_reverse'];
		$this->img               = $acf['image'];
		$this->img_is_full_width = $acf['is_image_full_width'];
		$this->has_topography_bg = $acf['has_topography_bg'];
	}

	/** Generates the markup
	 *
	 * @return string the markup
	 */
	public function get_the_markup(): string {
		if ( $this->img_is_full_width ) {
			$bg_img  = $this->img['url'];
			$markup  = '<section class="container-fluid py-5 two-col two-col--full-width" style="background-image:url(' . "'{$bg_img}')" . '">';
			$markup .= "<div class='container pt-5'><div class='row-py-5'>";
			$markup .= $this->get_fullwidth_content_col();
			$markup .= '</div>';
		} else {
			$section_class = $this->set_the_class( 'section' );
			$row_class     = $this->set_the_class( 'row' );
			$markup        = "<section class='{$section_class}' id='{$this->section_id}'>";
			$markup       .= "<div class='{$row_class}'>";
			$markup       .= $this->get_col_1();
			$markup       .= $this->get_col_2();
		}
		$markup .= '</div>';
		$markup .= '</section>';
		return $markup;
	}

	public function the_section() {
		$markup = $this->get_the_markup();
		echo $markup;
	}

	private function set_the_class( string $el ) {
		$class = '';
		switch ( $el ) {
			case 'section':
				$class = 'container two-col';
				if ( $this->has_topography_bg ) {
					$class .= ' offset-topo-bg';
				}
				break;
			case 'row':
				$class = 'row align-items-center pt-2 pb-5';
				if ( $this->should_reverse ) {
					$class .= ' flex-row-reverse';
				}
				break;
			case 'col-1':
				$class = 'col-12 col-lg-5';
				break;
			case 'col-2':
				$class = 'col-12 col-lg-7';
				break;
		}
		return $class;
	}

	private function get_col_1(): string {
		$col_1   = $this->set_the_class( 'col-1' );
		$srcset  = wp_get_attachment_image_srcset( $this->img['id'] );
		$markup  = "<div class='{$col_1}'>";
		$markup .= "<img class='w-100 my-5' src='{$this->img['url']}' alt='{$this->img['alt']}' srcset='{$srcset}' />";
		$markup .= '</div>';
		return $markup;
	}

	private function get_col_2( $col_class = '' ): string {
		$col_2   = empty( $col_class ) ? $this->set_the_class( 'col-2' ) : $col_class;
		$markup  = "<div class='{$col_2}'>";
		$markup .= "<div class='row position-relative'>";
		$markup .= "<div class='col-3 col-xl-2 d-none d-md-block'></div>";
		$markup .= $this->get_the_headline();
		$markup .= "<div class='col-3 col-xl-2 d-none d-md-block'><div class='vertical-line'></div></div>";
		$markup .= $this->get_the_subheadline();
		$markup .= '</div>';
		$markup .= '</div>';
		return $markup;
	}

	private function get_fullwidth_content_col(): string {
		$markup  = "<div class='col-12 col-xl-7'>";
		$markup .= $this->get_inner_row_1();
		$markup .= $this->get_inner_row_2();
		$markup .= '</div>';
		return $markup;
	}

	private function get_the_headline( bool $is_fullwidth = false ): string {
		if ( $is_fullwidth ) {
			return "<div class='col-9 col-lg-10'>
			<h2 class='text-light'>{$this->headline}</h2>
		</div>";
		} else {
			return "<div class='col-12 col-md-9 col-xl-10'><h2>{$this->headline}</h2></div>";
		}
	}

	private function get_the_subheadline(): string {
		$markup = "<div class='col-12 col-md-9 col-xl-10'><div class='two-col__subheadline'>{$this->subheadline}</div>";
		if ( $this->has_cta ) {
			$markup .= $this->get_the_cta();
		}
		$markup .= '</div>';
		return $markup;
	}

	private function get_the_cta( bool $is_fullwidth = false ): string {
		$href   = esc_url( $this->cta['url'] );
		$text   = esc_textarea( $this->cta['title'] );
		$target = $this->cta['target'];

		if ( $is_fullwidth ) {
			$markup = "<p class='py-4 d-none d-md-block text-light'><img src='/wp-content/uploads/2023/08/double-arrow.svg' class='arrow arrow-white position-absolute' />";
		} else {
			// desktop
			$markup = "<p class='py-4 d-none d-md-block'><img src='/wp-content/uploads/2023/08/double-arrow.svg' class='arrow position-absolute' />";
		}

		$desktop_link_class = $is_fullwidth ? 'arrow-link arrow-link-white' : 'arrow-link';
		$markup            .= "<a href='{$href}' download class='{$desktop_link_class}'" . ( empty( $target ) ? '' : "target='{$target}'" ) . ">{$text}</a></p>";
		// mobile
		$mobile_link_class = $is_fullwidth ? 'btn-secondary' : 'btn-default';
		$markup           .= "<p class='py-4 d-block d-md-none'><a href='{$href}' download class='{$mobile_link_class}'" . ( empty( $target ) ? '' : "target='{$target}'" ) . ">{$text}</a></p>";
		return $markup;
	}

	/** For use inside of full-width sections */
	private function get_inner_row_1(): string {
		$markup  = '<div class="position-relative row">';
		$markup .= '<div class="col-3 col-lg-2 d-none d-md-block"></div>';
		$markup .= $this->get_the_headline( true );
		$markup .= '</div>';
		return $markup;
	}

	/** For use inside of full-width sections */
	private function get_inner_row_2(): string {
		$markup  = '<div class="row position-relative"><div class="col-3 col-lg-2 d-none d-md-block"><div class="vertical-line vertical-line-white"></div></div>';
		$markup .= '<div class="col-9 col-lg-10">';
		$markup .= "<div class='two-col__subheadline'>{$this->subheadline}</div>";
		if ( $this->has_cta ) {
			$markup .= $this->get_the_cta( true );
		}
		$markup .= '</div>';
		$markup .= '</div>';
		return $markup;
	}
}
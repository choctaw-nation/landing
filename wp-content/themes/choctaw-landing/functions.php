<?php
/**
 * The Functions
 *
 * @package ChoctawNation
 * @since 0.2
 */

use ChoctawNation\Theme_Init;

// Include Theme Init
require_once __DIR__ . '/inc/theme/class-theme-init.php';
$theme = new Theme_Init();

// Include Bootscore Functions
require_once __DIR__ . '/inc/bootscore/theme-functions.php';

class HeaderAlert {
	private ?string $text_content;
	private bool $is_dismissable;
	private ?string $cta_text;
	private ?string $cta_link;
	private ?array $custom_colors;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->init_props();

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'wp_body_open', array( $this, 'header_alert' ) );
	}

	/**
	 * Initialize Properties
	 */
	private function init_props() {
		$this->text_content   = empty( get_field( 'text_content', 'options' ) ) ? null : acf_esc_html( get_field( 'text_content', 'options' ) );
		$this->is_dismissable = get_field( 'dismissable', 'options' );
		$cta                  = get_field( 'cta', 'options' );
		$allow_custom_colors  = $cta['allow_custom_colors'];
		$this->cta_text       = empty( $cta['button_text'] ) ? null : esc_textarea( $cta['button_text'] );
		$this->cta_link       = empty( $cta['button_link'] ) ? null : esc_textarea( $cta['button_link'] );
		$this->custom_colors  = ( $allow_custom_colors ) ? $cta['custom_colors'] : null;
	}

	/**
	 * Enqueue Scripts
	 */
	public function enqueue_scripts() {
		$header_bar_assets = require_once get_template_directory() . '/dist/headerBar.asset.php';
		wp_enqueue_script(
			'headerBar',
			get_template_directory_uri() . '/dist/headerBar.js',
			$header_bar_assets['dependencies'],
			$header_bar_assets['version'],
			array( 'strategy' => 'defer' )
		);
	}

	public function header_alert(): void {
		$markup  = $this->alert_styles();
		$markup .= $this->alert_markup();
		echo $markup;
	}

	/**
	 * Simple Alert Styles to remove padding on `p` tags
	 *
	 * @return string
	 */
	private function alert_styles(): string {
		return '<style>#cno-alert-header-bar {background-color: var(--cno-primary);transition: all .25s ease-in-out;}</style>';
	}

	/**
	 * Alert Markup
	 *
	 * @return string
	 */
	private function alert_markup(): string {
		$markup            = '';
		$container_classes = array(
			'p-3',
			'text-bg-secondary',
			'd-flex',
			'justify-content-evenly',
			'align-items-center',
			'text-center',
			'w-100',
			'position-absolute',
			'top-0',
		);
		$container_classes = implode( ' ', $container_classes );

		$markup  = "<aside class='{$container_classes}' id='cno-alert-header-bar'><div class='fs-6'>{$this->text_content}</div>";
		$markup .= $this->cta_text ? $this->alert_cta() : '';
		$markup .= $this->is_dismissable ? "<button class='btn-close' aria-label='Close'></button>" : '';
		$markup .= '</aside>';
		return $markup;
	}

	private function alert_cta(): string {
		$cta_styles = $this->custom_colors ? "style='background-color: rgba({$this->custom_colors['button_background']}); color: rgba({$this->custom_colors['button_color']});'" : '';

		$markup = "<a href='{$this->cta_link}' class='btn btn-primary' {$cta_styles}target='_blank'>{$this->cta_text}</a>";
		return $markup;
	}
}
new HeaderAlert();

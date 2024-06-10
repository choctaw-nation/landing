<?php
/**
 * Initializes the Theme
 *
 * @package ChoctawNation
 * @since 1.3
 */

namespace ChoctawNation;

/** Builds the Theme */
class Theme_Init {

	/** Constructor */
	public function __construct() {
		$this->load_required_files();
		$this->cno_set_environment();
		$this->disable_discussion();
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_cno_scripts' ) );
		add_action( 'after_setup_theme', array( $this, 'cno_theme_support' ) );
		add_action( 'init', array( $this, 'alter_post_types' ) );
	}

	/** Load required files. */
	private function load_required_files() {
		$base_path = get_template_directory() . '/inc';
		require_once $base_path . '/theme/theme-functions.php';

		$acf_classes = array(
			'image',
			'generator',
			'hero-section',
			'card',
			'hero-section',
			'mega-menu-content',
			'title-bar',
			'modal-generator',
			'two-col-section',
			'full-width-section',
			'mega-menu-content',
			'link-card',
			'featured-eat',
			'eat-and-drink',
		);
		foreach ( $acf_classes as $acf_class ) {
			require_once $base_path . '/acf/acf-classes/class-' . $acf_class . '.php';
		}

		$asset_loaders = array( 'enum-enqueue-type', 'class-asset-loader' );
		foreach ( $asset_loaders as $asset_loader ) {
			require_once $base_path . '/theme/asset-loader/' . $asset_loader . '.php';
		}

		$navwalkers = array( 'navwalker', 'mega-menu' );
		foreach ( $navwalkers as $navwalker ) {
			require_once $base_path . '/theme/navwalkers/class-' . $navwalker . '.php';
		}

		require_once $base_path . '/theme/class-allow-svg.php';
		$svg = new Allow_SVG();
	}

	/** Remove comments, pings and trackbacks support from posts types. */
	private function disable_discussion() {
		// Close comments on the front-end
		add_filter( 'comments_open', '__return_false', 20, 2 );
		add_filter( 'pings_open', '__return_false', 20, 2 );

		// Hide existing comments.
		add_filter( 'comments_array', '__return_empty_array', 10, 2 );

		// Remove comments page in menu.
		add_action(
			'admin_menu',
			function () {
				remove_menu_page( 'edit-comments.php' );
			}
		);

		// Remove comments links from admin bar.
		add_action(
			'init',
			function () {
				if ( is_admin_bar_showing() ) {
					remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
				}
			}
		);
	}

	/** Sets an Environment Variable */
	private function cno_set_environment() {
		$server_name = $_SERVER['SERVER_NAME'];

		if ( false !== strpos( $server_name, '.local' ) ) {
			$_ENV['CNO_ENV'] = 'dev';
		} elseif ( false !== strpos( $server_name, 'wpengine' ) ) {
			$_ENV['CNO_ENV'] = 'stage';
		} else {
			$_ENV['CNO_ENV'] = 'prod';
		}
	}

	/**
	 * Adds scripts with the appropriate dependencies
	 */
	public function enqueue_cno_scripts() {
		// Adobe Font Typekit CSS
		wp_enqueue_style(
			'typekit',
			'https://use.typekit.net/jqq3pwr.css',
			array(),
            null // phpcs:ignore
		);

		new Asset_Loader(
			'bootstrap',
			Enqueue_Type::both,
			'vendors',
			array(
				'scripts' => array( 'jquery' ),
				'styles'  => array(),
			),
		);

		new Asset_Loader(
			'global',
			Enqueue_Type::both,
			null,
			array(
				'scripts' => array( 'bootstrap' ),
				'styles'  => array( 'bootstrap' ),
			)
		);
		wp_localize_script( 'global', 'cnoSiteData', array( 'rootUrl' => home_url() ) );

		// style.css
		wp_enqueue_style(
			'main',
			get_stylesheet_uri(),
			array( 'global' ),
			wp_get_theme()->get( 'Version' )
		);

		$this->remove_wordpress_styles(
			array(
				'classic-theme-styles',
				'wp-block-library',
				'dashicons',
				'global-styles',
			)
		);

		$this->register_swipers();
		$this->register_daterangepicker();
	}

	/**
	 * Registers swiper scripts and styles
	 */
	private function register_swipers() {
		$eat_drink_swiper = require_once get_stylesheet_directory() . '/dist/modules/swiper/eat-drink-swiper.asset.php';
		wp_register_script(
			'eat-drink-swiper',
			get_stylesheet_directory_uri() . '/dist/modules/swiper/eat-drink-swiper.js',
			array( 'bootstrap' ),
			$eat_drink_swiper['version'],
			array( 'strategy' => 'defer' )
		);
		wp_register_style(
			'eat-drink-swiper',
			get_stylesheet_directory_uri() . '/dist/modules/swiper/eat-drink-swiper.css',
			array( 'bootstrap' ),
			$eat_drink_swiper['version'],
		);

		$events_swiper = require_once get_stylesheet_directory() . '/dist/modules/swiper/events-swiper.asset.php';
		wp_register_script(
			'events-swiper',
			get_stylesheet_directory_uri() . '/dist/modules/swiper/events-swiper.js',
			array( 'bootstrap' ),
			$events_swiper['version'],
			array( 'strategy' => 'defer' )
		);
		wp_register_style(
			'events-swiper',
			get_stylesheet_directory_uri() . '/dist/modules/swiper/events-swiper.css',
			array( 'bootstrap' ),
			$events_swiper['version'],
		);
	}

	/**
	 * Registers date range picker scripts and styles
	 */
	private function register_daterangepicker() {
		$cno_date_range_picker = require_once get_stylesheet_directory() . '/dist/modules/date-range-picker.asset.php';
		wp_register_script(
			'cno-date-range-picker',
			get_stylesheet_directory_uri() . '/dist/modules/date-range-picker.js',
			$cno_date_range_picker['dependencies'],
			$cno_date_range_picker['version'],
			array( 'strategy' => 'defer' )
		);
		wp_register_style(
			'cno-date-range-picker',
			get_stylesheet_directory_uri() . '/dist/modules/date-range-picker.css',
			array( 'global' ),
			$cno_date_range_picker['version'],
		);
	}

	/**
	 * Provide an array of handles to dequeue.
	 *
	 * @param array $handles the script/style handles to dequeue.
	 */
	private function remove_wordpress_styles( array $handles ) {
		foreach ( $handles as $handle ) {
			wp_dequeue_style( $handle );
		}
	}

	/** Registers Theme Supports */
	public function cno_theme_support() {
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_image_size( 'rooms-gallery-thumb', '850', '850' );

		register_nav_menus(
			array(
				'main-menu'   => 'Main Menu',
				'footer-menu' => 'Footer Menu',
			)
		);
	}

	/** Remove post type support from posts types. */
	public function alter_post_types() {
		$post_types = array( 'post', 'page' );
		foreach ( $post_types as $post_type ) {
			$this->disable_post_type_support( $post_type );
		}
	}

	/** Disable post-type-supports from posts
	 *
	 * @param string $post_type the post type to remove supports from.
	 */
	private function disable_post_type_support( string $post_type ) {
		$supports = array( 'editor', 'comments', 'trackbacks', 'revisions', 'author' );
		foreach ( $supports as $support ) {
			if ( post_type_supports( $post_type, $support ) ) {
				remove_post_type_support( $post_type, $support );
			}
		}
	}
}

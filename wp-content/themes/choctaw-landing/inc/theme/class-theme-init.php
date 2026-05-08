<?php
/**
 * Initializes the Theme
 *
 * @package ChoctawNation
 * @since 1.3
 */

namespace ChoctawNation\Theme;

use ChoctawNation\Asset_Loader;
use ChoctawNation\Enqueue_Type;
use ChoctawNation\Plugins\Plugin_Handler;

/** Builds the Theme */
class Theme_Init {

	/** Setup Theme */
	public function setup_theme() {
		$this->edit_roles();
		$this->handle_plugins();
		$this->load_required_files();
		$this->cno_theme_support();
		$this->allow_svg();
		$this->gutenberg_support();
		$this->handle_specials();
		$this->disable_discussion();
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_cno_scripts' ), 50 );
		add_action( 'init', array( $this, 'alter_post_types' ) );
		add_filter(
			'wp_get_attachment_image_attributes',
			array( $this, 'wp_six_point_seven_image_sizes_fix' )
		);
		add_filter( 'allowed_redirect_hosts', array( $this, 'add_allowed_redirect_hosts' ) );
		add_filter( 'wp_speculation_rules_configuration', array( $this, 'handle_speculative_loading' ) );
		add_filter( 'wp_resource_hints', array( $this, 'add_resource_hints' ), 10, 2 );
		add_filter( 'style_loader_tag', array( $this, 'preload_stylesheets' ), 10, 3 );
	}

	/**
	 * Edit user roles and capabilities
	 */
	private function edit_roles() {
		$role_editor = new Role_Editor();
		add_action( 'after_switch_theme', array( $role_editor, 'create_custom_roles' ) );
		add_action( 'admin_init', array( $role_editor, 'maybe_sync_roles_and_capabilities' ) );
	}

	/**
	 * Handle plugin functionality, such as ACF and Gravity Forms
	 */
	private function handle_plugins() {
		$plugin_handler = new Plugin_Handler();
		$plugin_handler->handle_yoast();
		$plugin_handler->handle_acf();
		$plugin_handler->handle_gravity_forms();
		$plugin_handler->handle_cno_plugins();
		add_filter( 'auto_update_plugin', array( $plugin_handler, 'handle_auto_update_plugin' ) );
		add_action( 'admin_init', array( $plugin_handler, 'disable_plugins_per_environment' ) );
	}

	/**
	 * Add Gutenberg support and editor styles
	 */
	public function gutenberg_support() {
		$gutenberg = new Gutenberg_Handler();
		add_action( 'init', array( $gutenberg, 'init_block_theme' ) );
		add_action( 'enqueue_block_assets', array( $gutenberg, 'enqueue_global_block_assets' ) );
		add_action( 'enqueue_block_editor_assets', array( $gutenberg, 'enqueue_block_assets' ) );
		add_action( 'after_setup_theme', array( $gutenberg, 'cno_block_theme_support' ), 50 );
		add_filter( 'block_editor_settings_all', array( $gutenberg, 'restrict_gutenberg_ui' ), 10, 1 );
		add_filter( 'allowed_block_types_all', array( $gutenberg, 'restrict_block_types' ), 10, 2 );
		add_filter( 'use_block_editor_for_post_type', array( $gutenberg, 'handle_page_templates' ), 10, 0 );
	}

	/**
	 * Allow SVG uploads
	 */
	private function allow_svg() {
		$svg = new Allow_SVG();
		add_filter( 'upload_mimes', array( $svg, 'cc_mime_types' ) );
		add_action( 'admin_head', array( $svg, 'fix_svg' ) );
	}

	/** Load required files. */
	private function load_required_files() {
		$base_path = get_template_directory() . '/inc';
		require_once $base_path . '/theme/theme-functions.php';
		require_once $base_path . '/bootscore/theme-functions.php';
	}

	/**
	 * Handle Specials cron event
	 */
	public function handle_specials() {
		$specials_handler = new Specials_Handler();
		if ( ! wp_next_scheduled( $specials_handler->cron_key ) ) {
			wp_schedule_event( strtotime( 'today 11:59pm CST' ), 'daily', $specials_handler->cron_key );
		}

		add_action( $specials_handler->cron_key, array( $specials_handler, 'update_specials' ) );
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

	/**
	 * Adds scripts with the appropriate dependencies
	 */
	public function enqueue_cno_scripts() {
		// Check if Popup Maker is activated
		if ( is_plugin_active( 'popup-maker/popup-maker.php' ) ) {
			$asset_file = require_once get_stylesheet_directory() . '/dist/vendors/cno-pum.asset.php';
			wp_enqueue_style(
				'cno-pum-styles',
				get_template_directory_uri() . '/dist/vendors/cno-pum.css',
				array( 'bootstrap' ),
				$asset_file['version']
			);
			wp_dequeue_style( 'popup-maker-site' );
		}

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
		wp_localize_script(
			'global',
			'cnoSiteData',
			array(
				'rootUrl'    => home_url(),
				'isHomePage' => is_front_page() ? 'yes' : 'no',
			)
		);

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
			)
		);

		$this->register_swipers();
		$this->register_daterangepicker();
		$this->register_reservation_script();
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
			array( 'global' ),
			$events_swiper['version'],
			array( 'strategy' => 'defer' )
		);
		wp_register_style(
			'events-swiper',
			get_stylesheet_directory_uri() . '/dist/modules/swiper/events-swiper.css',
			array( 'global' ),
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
	 * Registers Seven Rooms reservation widget script
	 */
	private function register_reservation_script() {
		wp_register_script(
			'seven-rooms-widget',
			'https://www.sevenrooms.com/widget/embed.js',
			array(),
			null, // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
			array( 'strategy' => 'async' )
		);
		$reservation_script = require_once get_stylesheet_directory() . '/dist/vendors/seven-rooms.asset.php';
		wp_register_script(
			'seven-rooms-script',
			get_stylesheet_directory_uri() . '/dist/vendors/seven-rooms.js',
			array( 'seven-rooms-widget' ),
			$reservation_script['version'],
			array( 'strategy' => 'defer' )
		);
		$pages_using_reservation_script = array( 43, 949 );
		if ( in_array( get_the_ID(), $pages_using_reservation_script, true ) ) {
			wp_enqueue_script( 'seven-rooms-widget' );
			wp_enqueue_script( 'seven-rooms-script' );
		}
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
		$this->register_image_sizes();
		register_nav_menus(
			array(
				'main-menu'   => 'Main Menu',
				'footer-menu' => 'Footer Menu',
			)
		);
	}

	/**
	 * Registers image sizes
	 */
	private function register_image_sizes(): void {
		$image_sizes = array(
			'two-col'             => array( 1392 ),
			'rooms-gallery-thumb' => array( 850 ),
			'card'                => array( 1038 ),
			'container-swiper'    => array( 1594 ),
			'banner'              => array( 3840, 1200 ), // 16:5
			'hero-desktop'        => array( 3840, 1646 ), // 21:9
			'events-archive'      => array( 828 ),
			'events-single'       => array( 1272, 1884 ), // 9:16
			'events-swiper'       => array( 698, 1242 ), // 9:16
		);

		foreach ( $image_sizes as $name => $size ) {
			if ( count( $size ) === 1 ) {
				add_image_size( $name, $size[0], $size[0] );
			} else {
				add_image_size( $name, $size[0], $size[1] );
			}
		}
	}

	/** Remove post type support from posts types. */
	public function alter_post_types() {
		$post_types = array( 'post', 'page' );
		foreach ( $post_types as $post_type ) {
			$this->disable_post_type_support( $post_type );
		}
		add_post_type_support( 'page', 'excerpt' );
		/**
		 * This will get turned on when ready
		 */
		// add_post_type_support( 'choctaw-events', array( 'editor' ) ); phpcs:ignore Squiz.PHP.CommentedOutCode.Found
	}

	/** Disable post-type-supports from posts
	 *
	 * @param string $post_type the post type to remove supports from.
	 */
	private function disable_post_type_support( string $post_type ) {
		$supports = array( 'comments', 'trackbacks', 'revisions', 'author' );
		foreach ( $supports as $support ) {
			if ( post_type_supports( $post_type, $support ) ) {
				remove_post_type_support( $post_type, $support );
			}
		}
	}

	/**
	 * Fixes image sizes for WordPress 6.7. This is a temporary solution until a more robust dev solution can be found
	 * TODO: #243 Remove this function when a better solution is found
	 *
	 * @see https://make.wordpress.org/core/2024/10/18/auto-sizes-for-lazy-loaded-images-in-wordpress-6-7/
	 * @see https://core.trac.wordpress.org/ticket/61847#comment:23
	 *
	 * @param array $attr the image attributes.
	 * @return array
	 */
	public function wp_six_point_seven_image_sizes_fix( $attr ) {
		if ( isset( $attr['sizes'] ) ) {
			$attr['sizes'] = preg_replace( '/^auto, /', '', $attr['sizes'] );
		}
		return $attr;
	}

	/**
	 * Adds allowed redirect hosts for `wp_safe_redirect`
	 *
	 * @param array $hosts Current allowed hosts.
	 * @return array
	 */
	public function add_allowed_redirect_hosts( array $hosts ): array {
		$allowed_hosts = array(
			'choctawnation.com',
			'www.choctawnation.com',
		);
		return array_merge( $hosts, $allowed_hosts );
	}

	/**
	 * Handle speculative loading
	 *
	 * @since WP 6.8.0
	 * @link https://make.wordpress.org/core/2025/03/06/speculative-loading-in-6-8/
	 *
	 * @param ?array $config the configuration array. Null if user is logged-in.
	 * @return ?array The new config file, or null
	 */
	public function handle_speculative_loading( ?array $config ): ?array {
		if ( is_array( $config ) ) {
			$config['mode']      = 'auto';
			$config['eagerness'] = 'moderate';
		}
		return $config;
	}

	/**
	 * Add resource hints for Typekit
	 *
	 * @param array  $hints         The array of resource hints.
	 * @param string $relation_type The relation type the hints are for.
	 * @return array The modified array of resource hints.
	 */
	public function add_resource_hints( array $hints, string $relation_type ) {
		if ( 'preconnect' === $relation_type ) {
			$hints[] = array(
				'href'        => 'https://use.typekit.net',
				'crossorigin' => 'anonymous',
			);
		}
		return $hints;
	}

	/**
	 * Preload specific stylesheets
	 *
	 * @param string $html   The link tag HTML.
	 * @param string $handle The style handle.
	 * @param string $href   The stylesheet URL.
	 * @return string The modified link tag HTML.
	 */
	public function preload_stylesheets( string $html, string $handle, string $href ): string {
		$preload_handles = array(
			'typekit'   => 'external',
			'bootstrap' => null,
		);
		if ( in_array( $handle, array_keys( $preload_handles ), true ) ) {
			$is_crossorigin = 'external' === $preload_handles[ $handle ];
			// Add a preload link before the stylesheet link.
			$preload = sprintf(
				"<link rel='preload' as='style' href='%s' %s />\n",
				$href,
				$is_crossorigin ? 'crossorigin="anonymous"' : ''
			);
			// Add crossorigin attribute if needed.
			if ( $is_crossorigin && ! str_contains( $html, 'crossorigin' ) ) {
				$html = str_replace( "/>\n", ' crossorigin="anonymous" />' . "\n", $html );
			}
			$html = $preload . $html;
		}
		return $html;
	}
}
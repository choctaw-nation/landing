<?php
/**
 * Bootscore functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bootscore
 */

// Register Comment List
if ( ! function_exists( 'register_comment_list' ) ) :
	function register_comment_list() {
		// Register Comment List
		require_once get_template_directory() . '/inc/bootscore/comment-list.php';
	}
endif;
add_action( 'after_setup_theme', 'register_comment_list' );
// Register Comment List END


if ( ! function_exists( 'bootscore_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bootscore_setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Bootscore, use a find and replace
		* to change 'bootscore' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'bootscore', get_template_directory() . '/languages' );

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'bootscore_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bootscore_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'bootscore_content_width', 640 );
}

add_action( 'after_setup_theme', 'bootscore_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// Widgets
if ( ! function_exists( 'bootscore_widgets_init' ) ) :

	function bootscore_widgets_init() {

		// Top Nav
		register_sidebar(
			array(
				'name'          => esc_html__( 'Top Nav', 'bootscore' ),
				'id'            => 'top-nav',
				'description'   => esc_html__( 'Add widgets here.', 'bootscore' ),
				'before_widget' => '<div class="top-nav-widget ms-1 ms-md-2">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-title d-none">',
				'after_title'   => '</div>',
			)
		);

		// Top Nav 2
		// Adds a widget next to the Top Nav position but moves to offcanvas on <lg breakpoint
		register_sidebar(
			array(
				'name'          => esc_html__( 'Top Nav 2', 'bootscore' ),
				'id'            => 'top-nav-2',
				'description'   => esc_html__( 'Add widgets here.', 'bootscore' ),
				'before_widget' => '<div class="top-nav-widget-2 d-lg-flex align-items-lg-center mt-2 mt-lg-0 ms-lg-2">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-title d-none">',
				'after_title'   => '</div>',
			)
		);

		// Top Nav Search
		register_sidebar(
			array(
				'name'          => esc_html__( 'Top Nav Search', 'bootscore' ),
				'id'            => 'top-nav-search',
				'description'   => esc_html__( 'Add widgets here.', 'bootscore' ),
				'before_widget' => '<div class="top-nav-search">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-title d-none">',
				'after_title'   => '</div>',
			)
		);

		// Sidebar
		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar', 'bootscore' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'bootscore' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s card card-body mb-4">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title card-header h5">',
				'after_title'   => '</h2>',
			)
		);

		// Top Footer
		register_sidebar(
			array(
				'name'          => esc_html__( 'Top Footer', 'bootscore' ),
				'id'            => 'top-footer',
				'description'   => esc_html__( 'Add widgets here.', 'bootscore' ),
				'before_widget' => '<div class="footer_widget mb-5">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		// Footer 1
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer 1', 'bootscore' ),
				'id'            => 'footer-1',
				'description'   => esc_html__( 'Add widgets here.', 'bootscore' ),
				'before_widget' => '<div class="footer_widget mb-4">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title h5">',
				'after_title'   => '</h2>',
			)
		);

		// Footer 2
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer 2', 'bootscore' ),
				'id'            => 'footer-2',
				'description'   => esc_html__( 'Add widgets here.', 'bootscore' ),
				'before_widget' => '<div class="footer_widget mb-4">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title h5">',
				'after_title'   => '</h2>',
			)
		);

		// Footer 3
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer 3', 'bootscore' ),
				'id'            => 'footer-3',
				'description'   => esc_html__( 'Add widgets here.', 'bootscore' ),
				'before_widget' => '<div class="footer_widget mb-4">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title h5">',
				'after_title'   => '</h2>',
			)
		);

		// Footer 4
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer 4', 'bootscore' ),
				'id'            => 'footer-4',
				'description'   => esc_html__( 'Add widgets here.', 'bootscore' ),
				'before_widget' => '<div class="footer_widget mb-4">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title h5">',
				'after_title'   => '</h2>',
			)
		);

		// Footer Info
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Info', 'bootscore' ),
				'id'            => 'footer-info',
				'description'   => esc_html__( 'Add widgets here.', 'bootscore' ),
				'before_widget' => '<div class="footer_widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-title d-none">',
				'after_title'   => '</div>',
			)
		);

		// 404 Page
		register_sidebar(
			array(
				'name'          => esc_html__( '404 Page', 'bootscore' ),
				'id'            => '404-page',
				'description'   => esc_html__( 'Add widgets here.', 'bootscore' ),
				'before_widget' => '<div class="mb-4">',
				'after_widget'  => '</div>',
				'before_title'  => '<h1 class="widget-title">',
				'after_title'   => '</h1>',
			)
		);
	}

	add_action( 'widgets_init', 'bootscore_widgets_init' );

endif;
// Widgets END


// Shortcode in HTML-Widget
add_filter( 'widget_text', 'do_shortcode' );
// Shortcode in HTML-Widget End

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/bootscore/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/bootscore/template-functions.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/bootscore/jetpack.php';
}


// Amount of posts/products in category
if ( ! function_exists( 'wpsites_query' ) ) :

	function wpsites_query( $query ) {
		if ( $query->is_archive() && $query->is_main_query() && ! is_admin() ) {
			$query->set( 'posts_per_page', 24 );
		}
	}

	add_action( 'pre_get_posts', 'wpsites_query' );

endif;
// Amount of posts/products in category END


// Pagination Categories
if ( ! function_exists( 'bootscore_pagination' ) ) :

	function bootscore_pagination( $pages = '', $range = 2 ) {
		$showitems = ( $range * 2 ) + 1;
		global $paged;
		// default page to one if not provided
		if ( empty( $paged ) ) {
			$paged = 1;
		}
		if ( $pages == '' ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;

			if ( ! $pages ) {
				$pages = 1;
			}
		}

		if ( 1 != $pages ) {
			echo '<nav aria-label="Page navigation" role="navigation">';
			echo '<span class="sr-only">' . esc_html__( 'Page navigation', 'bootscore' ) . '</span>';
			echo '<ul class="pagination justify-content-center mb-4">';

			if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
				echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( 1 ) . '" aria-label="' . esc_html__( 'First Page', 'bootscore' ) . '">&laquo;</a></li>';
			}

			if ( $paged > 1 && $showitems < $pages ) {
				echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( $paged - 1 ) . '" aria-label="' . esc_html__( 'Previous Page', 'bootscore' ) . '">&lsaquo;</a></li>';
			}

			for ( $i = 1; $i <= $pages; $i++ ) {
				if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
					echo ( $paged == $i ) ? '<li class="page-item active"><span class="page-link"><span class="sr-only">' . __( 'Current Page', 'bootscore' ) . ' </span>' . $i . '</span></li>' : '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( $i ) . '"><span class="sr-only">' . __( 'Page', 'bootscore' ) . ' </span>' . $i . '</a></li>';
				}
			}

			if ( $paged < $pages && $showitems < $pages ) {
				echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( ( $paged === 0 ? 1 : $paged ) + 1 ) . '" aria-label="' . esc_html__( 'Next Page', 'bootscore' ) . '">&rsaquo;</a></li>';
			}

			if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
				echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( $pages ) . '" aria-label="' . esc_html__( 'Last Page', 'bootscore' ) . '">&raquo;</a></li>';
			}

			echo '</ul>';
			echo '</nav>';
			// Uncomment this if you want to show [Page 2 of 30]
			// echo '<div class="pagination-info mb-5 text-center">[ <span class="text-muted">' . __('Page', 'bootscore') . '</span> '.$paged.' <span class="text-muted">' . __('of', 'bootscore') . '</span> '.$pages.' ]</div>';
		}
	}

endif;
// Pagination Categories END


// Pagination Buttons Single Posts
add_filter( 'next_post_link', 'post_link_attributes' );
add_filter( 'previous_post_link', 'post_link_attributes' );

function post_link_attributes( $output ) {
	$code = 'class="page-link"';

	return str_replace( '<a href=', '<a ' . $code . ' href=', $output );
}

// Pagination Buttons Single Posts END


// Excerpt to pages
add_post_type_support( 'page', 'excerpt' );
// Excerpt to pages END


// Breadcrumb
if ( ! function_exists( 'the_breadcrumb' ) ) :
	function the_breadcrumb() {

		if ( ! is_home() ) {
			echo '<nav aria-label="breadcrumb" class="breadcrumb-scroller mb-4 mt-2 py-2 px-3 bg-body-tertiary rounded">';
			echo '<ol class="breadcrumb mb-0">';
			echo '<li class="breadcrumb-item"><a href="' . home_url() . '">' . '<i class="fa-solid fa-house"></i>' . '</a></li>';
			// display parent category names with links
			if ( is_category() || is_single() ) {
				$cat_IDs = wp_get_post_categories( get_the_ID() );
				foreach ( $cat_IDs as $cat_ID ) {
					$cat = get_category( $cat_ID );
					echo '<li class="breadcrumb-item"><a href="' . get_term_link( $cat->term_id ) . '">' . $cat->name . '</a></li>';
				}
			}
			// display current page name
			if ( is_page() || is_single() ) {
				echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
			}
			echo '</ol>';
			echo '</nav>';
		}
	}

	add_filter( 'breadcrumbs', 'breadcrumbs' );
endif;
// Breadcrumb END


// Comment Button
if ( ! function_exists( 'bootscore_comment_button' ) ) :
	function bootscore_comment_button( $args ) {
		$args['class_submit'] = 'btn btn-outline-primary'; // since WP 4.1

		return $args;
	}

	add_filter( 'comment_form_defaults', 'bootscore_comment_button' );
endif;
// Comment Button END


// Password protected form
if ( ! function_exists( 'bootscore_pw_form' ) ) :
	function bootscore_pw_form() {
		$output = '
        <form action="' . get_option( 'siteurl' ) . '/wp-login.php?action=postpass" method="post" class="input-group pw_form">' . "\n"
				. '<input name="post_password" type="password" size="" class="form-control" placeholder="' . __( 'Password', 'bootscore' ) . '"/>' . "\n"
				. '<input type="submit" class="btn btn-outline-primary input-group-text" name="Submit" value="' . __( 'Submit', 'bootscore' ) . '" />' . "\n"
				. '</form>' . "\n";

		return $output;
	}

	add_filter( 'the_password_form', 'bootscore_pw_form' );
endif;
// Password protected form END

// Hook after #primary
function bs_after_primary() {
	do_action( 'bs_after_primary' );
}

// Hook after #primary END


// Open links in comments in new tab
if ( ! function_exists( 'bs_comment_links_in_new_tab' ) ) :
	function bs_comment_links_in_new_tab( $text ) {
		return str_replace( '<a', '<a target="_blank" rel=”nofollow”', $text );
	}

	add_filter( 'comment_text', 'bs_comment_links_in_new_tab' );
endif;
// Open links in comments in new tab END


// Disable Gutenberg blocks in widgets (WordPress 5.8)
// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );
// Disable Gutenberg blocks in widgets (WordPress 5.8) END



// Allow SVG
add_filter(
	'wp_check_filetype_and_ext',
	function ( $data, $file, $filename, $mimes ) {

		global $wp_version;
		if ( $wp_version !== '4.7.1' ) {
			return $data;
		}

		$filetype = wp_check_filetype( $filename, $mimes );

		return array(
			'ext'             => $filetype['ext'],
			'type'            => $filetype['type'],
			'proper_filename' => $data['proper_filename'],
		);
	},
	10,
	4
);

<?php
/**
 * Bootscore functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bootscore
 */

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
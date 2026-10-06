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
	}

	add_action( 'widgets_init', 'bootscore_widgets_init' );

endif;
// Widgets END
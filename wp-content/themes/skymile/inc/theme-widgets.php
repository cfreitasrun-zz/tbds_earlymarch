<?php

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function skymile_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'skymile' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'skymile' ),
		'before_widget' => ' <div class="sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '<i class="glyphicon glyphicon-triangle-bottom"></i></h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Home Page Widget Area', 'skymile' ),
		'id' => 'home-widget-area',
		'description' => __( 'The home page widget area', 'skymile' ),
		'before_widget' => ' <div class="sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '<i class="glyphicon glyphicon-triangle-bottom"></i></h4>',
	) );
	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'skymile' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'skymile' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	) );
	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'skymile' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'skymile' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	) );
	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'skymile' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'skymile' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	) );
	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'skymile' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'skymile' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	) );
}

add_action( 'widgets_init', 'skymile_widgets_init' );

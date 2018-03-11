<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

// Custom post types function
   function create_custom_post_types() {
 // Create a case study custom post type
     register_post_type('case_studies',
       array(
         'labels' => array(
           'name' => _( 'Case Studies'),
           'singular_name' => _( 'Case Study' )
           ),
         'public' => true,
         'has_archive' => true,
         'rewrite' => array(
           'slug' => 'case_studies'
         ),
       )
     );
     register_post_type('sites',
       array(
         'labels' => array(
           'name' => _( 'Sites'),
           'singular_name' => _( 'Site' )
           ),
         'public' => true,
         'has_archive' => true,
         'rewrite' => array(
           'slug' => 'sites'
         ),
       )
     );
     register_post_type('concepts',
       array(
         'labels' => array(
           'name' => _( 'Concepts'),
           'singular_name' => _( 'Concept' )
           ),
         'public' => true,
         'has_archive' => true,
         'rewrite' => array(
           'slug' => 'concept'
         ),
       )
     );
     register_post_type('pieces',
       array(
         'labels' => array(
           'name' => _( 'Pieces'),
           'singular_name' => _( 'Piece' )
           ),
         'public' => true,
         'has_archive' => true,
         'rewrite' => array(
           'slug' => 'pieces'
         ),
       )
     );
     register_post_type('services',
       array(
         'labels' => array(
           'name' => __( 'Services' ),
           'singular_name' => __( 'Service' )
           ),
         'public' => true,
         'has_archive' => false,
         )
     );
   }

 // Hook this custom post type function into the theme
 add_action( 'init', 'create_custom_post_types' );

 add_filter( 'body_class','tinybirddesignstudio_body_classes' );
 function tinybirddesignstudio_body_classes( $classes ) {

   if (is_page('contact') ) {
     $classes[] = 'contact';
   }

     return $classes;

 }

// create a dynamic sidebar //
function tinybirddesignstudio_theme_child_widget_init() {
    register_sidebar( array(
      'name' =>__( 'Homepage sidebar', 'tinybirddesignstudio-theme-child'),
      'id' => 'sidebar-2',
      'description' => __( 'Appears on the static front page template', 'tinybirddesignstudio-theme-child' ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    ));

  }
  add_action( 'widgets_init', 'tinybirddesignstudio_theme_child_widget_init' );

/*custom fonts*/
function tbds_stylesANDscripts() {

  wp_enqueue_style('custom-google_fonts' , 'https://fonts.googleapis.com/css?family=Cormorant+Garamond|EB+Garamond|Lora|Source+Serif+Pro|Taviraj');
}

add_action('wp_enqueue_style', 'tbds_styleANDscripts');

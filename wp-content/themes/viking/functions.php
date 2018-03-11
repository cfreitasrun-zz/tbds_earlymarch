<?php
/**
 * Viking functions and definitions
 *
 * @package viking
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 630; /* pixels */
}

if ( ! function_exists( 'viking_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs
	 * before the init hook. The init hook is too late for some features, such as indicating
	 * support post thumbnails.
	 */
	function viking_setup() {

		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 * If you're building a theme based on viking, use a find and replace
		 * to change 'viking' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'viking' );

		/**
		 * Add default posts and comments RSS feed links to head
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Enable support for Post Thumbnails on posts and pages
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'title-tag' );
		/**
		 * This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'viking' ),
		) );

		add_editor_style();

		/**
		 * Setup the WordPress core custom background feature.
		 */
		add_theme_support( 'custom-background', apply_filters( 'viking_custom_background_args', array(
			'default-color' => '635742',
			'default-image' => '',
		) ) );

		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		// Custom header settings.
		$viking_custom_header = array(
		'default-image'          => get_template_directory_uri() . '/images/sleipner-header.png',
		'width'                  => 1000,
		'height'                 => 150,
		'uploads'                => true,
		'default-text-color'     => 'ffffff',
		);
		add_theme_support( 'custom-header', $viking_custom_header );

		register_default_headers( array(
			'Sleipner' => array(
				'url' => '%s/images/sleipner-header.png',
				'thumbnail_url' => '%s/images/sleipner-header.png',
				),
			'Sleipner2' => array(
				'url' => '%s/images/sleipner-header1.png',
				'thumbnail_url' => '%s/images/sleipner-header1.png',
				),
			'Sleipner3' => array(
				'url' => '%s/images/sleipner-header-bw.png',
				'thumbnail_url' => '%s/images/sleipner-header-bw.png',
				),
			'Snake' => array(
				'url' => '%s/images/snake-header.png',
				'thumbnail_url' => '%s/images/snake-header.png',
				),
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'viking_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function viking_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'viking' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'viking_widgets_init' );

if ( ! function_exists( 'viking_fonts_url' ) ) :
	function viking_fonts_url() {
		$vikingfont = esc_attr( get_theme_mod( 'viking_font', 'sans-serif' ) );
		if ( 'sans-serif' !== $vikingfont ) {
			$fonts_url = '//fonts.googleapis.com/css?family=' . $vikingfont;
			return $fonts_url;
		}
	}
endif;

/**
 * Enqueue scripts and styles
 */
function viking_scripts() {
	wp_enqueue_style( 'viking-style', get_stylesheet_uri() );
	if ( viking_fonts_url() ){
		wp_enqueue_style( 'viking-fonts', viking_fonts_url() );
	}

	if ( ! is_admin() ) {
		wp_enqueue_script( 'viking-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
		wp_enqueue_script( 'viking-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'viking_scripts' );


/* Add a title to posts that are missing title */
add_filter( 'the_title', 'viking_post_title' );
function viking_post_title( $title ) {
	if ( '' === $title  ) {
		return __( 'Untitled', 'viking' );
	} else {
		return $title;
	}
}

function viking_customize_css() {
	echo '<style type="text/css">
		.site-title a,
		.site-description {
			color: #' . esc_attr( get_header_textcolor() ) . ';}' . "\n";

	if ( get_header_image() ) {
		echo '.header-image{background: url("' . get_header_image() . '")no-repeat center; }' . "\n";
	}
	/* increase the width of the content if no sidebar is used. */
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		echo '.content-area{width:80%; margin:0 auto; float:none;}' . "\n";
	}
	if ( get_theme_mod( 'viking_font' ) ) {
		echo '.site-title a,
		.site-description,
		.entry-title,
		.widget-title,
		.search-form label,
		.page-title,
		.navigation {font-family: ' . str_replace( '+',' ', esc_attr( get_theme_mod( 'viking_font', 'sans-serif' ) ) ) . '}' . "\n";
	}
	echo '</style>';
}
add_action( 'wp_head', 'viking_customize_css' );

require get_template_directory() . '/inc/customizer.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


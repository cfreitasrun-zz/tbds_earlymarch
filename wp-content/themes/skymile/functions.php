<?php
if ( !defined( 'SKYMILE_TEMPLATE_DIR' ) ) {
	define( 'SKYMILE_TEMPLATE_DIR', get_template_directory() . '/' );
}
if ( !defined( 'SKYMILE_TEMPLATE_URI' ) ) {
	define( 'SKYMILE_TEMPLATE_URI', get_template_directory_uri() . '/' );
}
/**
 * Load functions
 */
require SKYMILE_TEMPLATE_DIR . 'inc/theme-elements.php';
require SKYMILE_TEMPLATE_DIR . 'inc/theme-widgets.php';
require SKYMILE_TEMPLATE_DIR . 'inc/extras.php';
require SKYMILE_TEMPLATE_DIR . 'inc/customizer.php';
require SKYMILE_TEMPLATE_DIR . 'inc/jetpack.php';
require SKYMILE_TEMPLATE_DIR . 'inc/aq_resizer.php';
require SKYMILE_TEMPLATE_DIR . 'inc/class-sliders.php';

define( 'skymile', 'skymile' );
/**
 * skymile functions and definitions
 *
 * @package skymile
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( !isset( $content_width ) ) {
	$content_width = 590; /* pixels */
}

if ( !function_exists( 'skymile_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function skymile_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on skymile, use a find and replace
		 * to change 'skymile' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'skymile', SKYMILE_TEMPLATE_DIR . 'languages' );

		/**
		 * Support custom logo
		 */
		add_theme_support( 'custom-logo' );

		/**
		 * Support title tag
		 */
		add_theme_support( "title-tag" );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Post thumbnail
		 */
		add_theme_support( 'post-thumbnails' );


		// This theme uses wp_nav_menu() in one location.

		define( 'CUSTOM_MENU', 'custom_menu' );

		register_nav_menus( array(
			CUSTOM_MENU => __( 'Main Menu', 'skymile' ),
		) );


		// Enable support for HTML5 markup.
		add_theme_support( 'html5', array(
			'comment-list',
			'search-form',
			'comment-form',
			'gallery',
			'caption',
		) );
	}

endif; // skymile_setup
add_action( 'after_setup_theme', 'skymile_setup' );

/**
 * Get value from theme option
 */
function skymile_option( $option_id, $default = null ) {
	if ( function_exists( 'get_theme_mod' ) ) {
		$options = get_theme_mod( $option_id, $default );
		return $options;
	}

	return $default;
}

/**
 * Default nav fallback
 */
function skymile_nav_fallback() {
	?>
	<div id="menu">
		<ul class="pkmenu">
			<?php
			wp_list_pages( 'title_li=&show_home=1&sort_column=menu_order' );
			?>
		</ul>
	</div>
	<?php
}

/**
 * Nav menu
 */
function skymile_nav() {
	if ( function_exists( 'wp_nav_menu' ) ) {
		wp_nav_menu( array(
			'theme_location' => 'custom_menu',
			'container_id' => 'menu',
			'menu_class' => 'pkmenu',
			'fallback_cb' => 'skymile_nav_fallback'
		) );
	} else {
		skymile_nav_fallback();
	}
}

function skymile_the_custom_logo() {
   if ( function_exists( 'the_custom_logo' ) ) {
      the_custom_logo();
   }
}

/**
 * For attachment page
 */
if ( !function_exists( 'skymile_posted_in' ) ) :

	/**
	 * Prints HTML with meta information for the current post (category, tags and permalink).
	 *
	 */
	function skymile_posted_in() {
		// Retrieves tag list of current post, separated by commas.
		$tag_list = get_the_tag_list( '', ', ' );
		if ( $tag_list ) {
			$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'skymile' );
		} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
			$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'skymile' );
		} else {
			$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'skymile' );
		}
		// Prints the string, replacing the placeholders.
		printf(
				$posted_in, get_the_category_list( ', ' ), $tag_list, esc_url( get_permalink() ), the_title_attribute( 'echo=0' )
		);
	}

endif;

/**
 * Pagination
 */
function skymile_pagination( $pages = '' ) {
	?>
	<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts', $pages ); ?></div>
	<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
	<?php
}

/**
 * Breadcrumbs
 *
 * @global type $post
 * @global type $wp_query
 * @global type $author
 */
function skymile_breadcrumbs() {
	$delimiter = '&raquo;';
	$home = 'Home'; // text for the 'Home' link
	$before = '<span class="current">'; // tag before the current crumb
	$after = '</span>'; // tag after the current crumb
	echo '<div id="crumbs">';
	global $post;
	$homeLink = home_url();
	echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
	if ( is_category() ) {
		global $wp_query;
		$cat_obj = $wp_query->get_queried_object();
		$thisCat = $cat_obj->term_id;
		$thisCat = get_category( $thisCat );
		$parentCat = get_category( $thisCat->parent );
		if ( $thisCat->parent != 0 ) {
			echo(get_category_parents( $parentCat, true, ' ' . $delimiter . ' ' ));
		}
		echo $before . 'Archive by category "' . single_cat_title( '', false ) . '"' . $after;
	} elseif ( is_day() ) {
		echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a> ' . $delimiter . ' ';
		echo '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a> ' . $delimiter . ' ';
		echo $before . get_the_time( 'd' ) . $after;
	} elseif ( is_month() ) {
		echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a> ' . $delimiter . ' ';
		echo $before . get_the_time( 'F' ) . $after;
	} elseif ( is_year() ) {
		echo $before . get_the_time( 'Y' ) . $after;
	} elseif ( is_single() && !is_attachment() ) {
		if ( get_post_type() != 'post' ) {
			$post_type = get_post_type_object( get_post_type() );
			$slug = $post_type->rewrite;
			echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;
		} else {
			$cat = get_the_category();
			$cat = $cat[0];
			echo get_category_parents( $cat, true, ' ' . $delimiter . ' ' );
			echo $before . get_the_title() . $after;
		}
	} elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
		$post_type = get_post_type_object( get_post_type() );
		echo $before . $post_type->labels->singular_name . $after;
	} elseif ( is_attachment() ) {
		$parent = get_post( $post->post_parent );
		$cat = get_the_category( $parent->ID );
		$cat = $cat[0];
		echo get_category_parents( $cat, true, ' ' . $delimiter . ' ' );
		echo '<a href="' . esc_url( get_permalink( $parent ) ) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
		echo $before . get_the_title() . $after;
	} elseif ( is_page() && !$post->post_parent ) {
		echo $before . get_the_title() . $after;
	} elseif ( is_page() && $post->post_parent ) {
		$parent_id = $post->post_parent;
		$breadcrumbs = array();
		while ( $parent_id ) {
			$page = get_page( $parent_id );
			$breadcrumbs[] = '<a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . get_the_title( $page->ID ) . '</a>';
			$parent_id = $page->post_parent;
		}
		$breadcrumbs = array_reverse( $breadcrumbs );
		foreach ( $breadcrumbs as $crumb ) {
			echo $crumb . ' ' . $delimiter . ' ';
		}
		echo $before . get_the_title() . $after;
	} elseif ( is_search() ) {
		echo $before . 'Search results for "' . get_search_query() . '"' . $after;
	} elseif ( is_tag() ) {
		echo $before . 'Posts tagged "' . single_tag_title( '', false ) . '"' . $after;
	} elseif ( is_author() ) {
		global $author;
		$userdata = get_userdata( $author );
		echo $before . 'Articles posted by ' . $userdata->display_name . $after;
	} elseif ( is_404() ) {
		echo $before . 'Error 404' . $after;
	}
	if ( get_query_var( 'paged' ) ) {
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
			echo ' (';
		}
		echo __( 'Page', 'skymile' ) . ' ' . get_query_var( 'paged' );
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
			echo ')';
		}
	}
	echo '</div>';
}

function skymile_resize_image( $width, $height, $url = '', $crop = true, $is_url = false, $class = '' ) {
	global $post;
	if ( !$url ) {
		$url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
	}
	$img = aq_resize( $url, $width, $height, $crop );
	if ( $is_url ) {
		return $img;
	}
	if ( $url ) {
		return "<img class='postimg $class' src='{$img}' width='{$width}' height='{$height}' />";
	}
}

/**
 * Alter default excerpt length
 */
function skymile_excerpt_length( $length ) {
	return 35;
}

add_filter( 'excerpt_length', 'skymile_excerpt_length' );

/**
 * Custom excerpt
 */
function skymile_trim_excerpt( $length ) {
	global $post;
	$explicit_excerpt = $post->post_excerpt;
	if ( '' == $explicit_excerpt ) {
		$text = get_the_content( '' );
		$text = apply_filters( 'the_content', $text );
		$text = str_replace( ']]>', ']]>', $text );
	} else {
		$text = apply_filters( 'the_content', $explicit_excerpt );
	}
	$text = strip_shortcodes( $text ); // optional
	$text = strip_tags( $text );
	$excerpt_length = $length;
	$words = explode( ' ', $text, $excerpt_length + 1 );
	if ( count( $words ) > $excerpt_length ) {
		array_pop( $words );
		array_push( $words, '[&hellip;]' );
		$text = implode( ' ', $words );
		$text = apply_filters( 'the_excerpt', $text );
	}

	return $text;
}

/**
 * Enqueuing css
 */
function skymile_css() {
	wp_enqueue_style( 'skymile-bootstrapframework', get_template_directory_uri() . '/assets/css/bootstrap.css' );
	wp_enqueue_style( 'skymile-bootstrapthemecss', get_template_directory_uri() . '/assets/css/bootstrap-theme.css' );
	wp_enqueue_style( 'skymile-htmlreset', get_template_directory_uri() . '/assets/css/reset.css' );

	$query_args = array(
		'family' => 'Open+Sans:400,700,600,300',
		'subset' => 'latin,latin-ext',
	);
	wp_enqueue_style( 'skymile-google-font', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
	wp_enqueue_style( 'skymile-style', get_stylesheet_uri() );
	wp_enqueue_style( 'skymile-meanmenu', get_template_directory_uri() . '/assets/css/meanmenu.css' );
	wp_enqueue_style( 'skymile-font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.css' );
	wp_enqueue_style( 'skymile-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
	wp_enqueue_style( 'skymile-animate', get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'skymile-hovercss', get_template_directory_uri() . '/assets/css/hover.css' );
	wp_enqueue_style( 'skymile-element-animate', get_template_directory_uri() . '/assets/css/element-animate.css' );

	/**
	 * Sliders css
	 */
	$sliders = skymile_option( 'select_slider', 'flex-slider' );
	if ( $sliders == 'flex-slider' ) {
		
	} else {
		wp_enqueue_style( 'skymile-camera-css', get_template_directory_uri() . '/assets/css/camera.css' );
	}

	/**
	 * Color css
	 */
	$color_scheme = skymile_option( 'theme_color_template', 'default' );
	if ( $color_scheme != 'default' ) {
		wp_enqueue_style( 'skymile-theme-color', get_template_directory_uri() . '/assets/css/color/' . $color_scheme . '.css' );
	}

	/**
	 * Theme skins
	 */
	$skins = skymile_option( 'layout_skins', 'closed-skin' );
	wp_enqueue_style( 'skymile-skins', get_template_directory_uri() . '/assets/css/skins/' . $skins . '.css' );
}

add_action( 'wp_enqueue_scripts', 'skymile_css' );

/**
 * Enqueue scripts and styles.
 */
function skymile_scripts() {
	wp_enqueue_script( 'skymile-menu', get_template_directory_uri() . '/assets/js/menu.js', array( 'jquery' ), '1.0', true );	
	wp_enqueue_script( 'skymile-meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.js', array( 'jquery' ), '2.0.7', true );
	wp_enqueue_script( 'skymile-buttons', get_template_directory_uri() . '/assets/js/buttons.js', array( 'jquery' ), '2.0', true );
	wp_enqueue_script( 'skymile-init', get_template_directory_uri() . '/assets/js/init.js', array( 'jquery' ), '1.0', true );
	/**
	 * Slider js
	 */
	$sliders = skymile_option( 'select_slider', 'flex-slider' );
	if ( $sliders == 'flex-slider' ) {
		wp_enqueue_script( 'skymile-flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js', array( 'jquery' ), false, true );
	}

	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'skymile_scripts' );

function skymile_posted_in() {
// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'skymile' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'skymile' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'skymile' );
	}
// Prints the string, replacing the placeholders.
	printf(
			$posted_in, get_the_category_list( ', ' ), $tag_list, esc_url( get_permalink() ), the_title_attribute( 'echo=0' )
	);
}

function skymile_get_categories_array() {
	$categories = get_categories( array(
		'orderby' => 'name',
		'order' => 'ASC'
	) );

	$cat_array = array();
	$cat_array[] = esc_attr__( 'Choose Category', 'skymile' );
	foreach ( $categories as $key => $cat ) {
		$cat_array[$cat->term_id] = $cat->name;
	}
	return $cat_array;
}

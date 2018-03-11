<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package viking
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'viking' ); ?></a>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">	
		<?php
		if ( display_header_text() ) {	?>
			<div class="site-branding">
				<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				<?php endif;?>
			</div><!-- .site-branding -->
			<?php
		} else {
				/*No visible title? make sure the page has a h1 for screen readers*/
				?>
				<h1 class="screen-reader-text"><?php bloginfo( 'name' ); ?></h1>
		<?php
		}
		if ( get_header_image() ) { ?>
				<div class="header-image"></div>
		<?php
		}
		if ( has_nav_menu( 'primary' ) ) {?>
			<nav id="site-navigation" class="navigation-main" role="navigation">
				<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'viking' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => false, ) ); ?>
			</nav><!-- #site-navigation -->
		<?php
		}
		?> 
	</header><!-- #masthead -->

	<div id="main" class="site-main">

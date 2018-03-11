<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package viking
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php
			while ( have_posts() ) : the_post();
				 get_template_part( 'content', 'page' );
				// If comments are open, load up the comment template.
				if ( comments_open() ) {
					comments_template();
				}
			 endwhile; // End of the loop.
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();

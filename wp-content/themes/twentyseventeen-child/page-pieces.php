<?php
/**
 * Template name: page-pieces
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

 get_header(); ?>

 <div id="primary" class="content-area">
 	<main id="main" class="site-main" role="main">

 <section class="home-page">
 		<?php while ( have_posts() ) : the_post(); ?>
 			<div class='homepage-hero'>
 				<h1>My Virtual Playgrond</h1>

 			</div>
 		<?php endwhile; // end of the loop. ?>
 	<!-- .container -->
 </section><!-- .home-page -->

 <section class="grid-gallery">
 	<div class="site-content">
 		<h4>In Puzzle Pieces</h4>

 		<ul class="grid-gallery-work">
 		<?php query_posts('posts_per_page=6&post_type=pieces'); ?>
 	  				<?php while ( have_posts() ) : the_post();
 										$image_1 = get_field("image_1");
 										$size = "medium";
 						?>
 						<li class="individual-piece">
 									<figure>
 												<?php echo wp_get_attachment_image($image_1, $size); ?>
 									</figure>

 		 							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

 									<h3><?php the_content(); ?></h3>
 									<p><strong><a href="<?php echo $link; ?>">Visit Live Site</a></strong></p>
 						</li>

 	  				<?php endwhile; // end of loop. ?>
 	  				<?php wp_reset_query(); ?>
 		</ul>

 		</div>
 </section>
 </div>

 <?php get_footer(); ?>

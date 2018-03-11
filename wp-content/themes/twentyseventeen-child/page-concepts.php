<?php
/**
 * Template name: Page-Concepts
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

 			</div>
 		<?php endwhile; // end of the loop. ?>
 	<!-- .container -->
 </section><!-- .home-page -->

 <section class="featured-work">
 	<div class="site-content">
 		<h4>New Sites Page</h4>

 		<ul class="homepage-featured-work">
 		<?php query_posts('posts_per_page=6&post_type=concepts'); ?>
 	  				<?php while ( have_posts() ) : the_post();
 										$image_1 = get_field("image_1");
                    $image_2 = get_field("image_2");
                    $image_3 = get_field("image_3");
 										$size = "medium";
 						?>
 						<li class="individual-featured-work">
 									<figure>
 												<?php echo wp_get_attachment_image($image_1, $size); ?>
 									</figure>
                  <figure>
                        <?php echo wp_get_attachment_image($image_2, $size); ?>
                  </figure>
                  <figure>
                        <?php echo wp_get_attachment_image($image_3, $size); ?>
                  </figure>

 		 							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

 									<h3><?php the_content(); ?></h3>
 									<p><strong><a href="<?php echo $link; ?>">Visit Live Site</a></strong></p>

 						</li>

 	  				<?php endwhile; // end of loop. ?>
 	  				<?php wp_reset_query(); ?>
 		</ul>

 		</div>
    <?php	echo paginate_links(); ?>
 </section>

 </div>

 <?php get_footer(); ?>

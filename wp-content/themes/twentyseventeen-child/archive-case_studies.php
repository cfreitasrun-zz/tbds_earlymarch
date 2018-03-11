<?php
/**
 * The template for displaying the case studies archive page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage tinybirddesignstudio Marketing
 * @since tinybirddesignstudio Marketing 1.0
 */

 get_header(); ?>

 <div id="primary" class="content-area">
 	<main id="main" class="site-main" role="main">

 <section class="home-page">
 		<?php while ( have_posts() ) : the_post(); ?>
 			<div class='homepage-hero'>
 				<?php the_content(); ?>

 			</div>
 		<?php endwhile; // end of the loop. ?>
 	<!-- .container -->
 </section><!-- .home-page -->

 <section class="featured-work">
 	<div class="site-content">
 		<h4>Featured Work</h4>

 		<ul class="homepage-featured-work">
 		<?php query_posts('posts_per_page=3&post_type=case_studies'); ?>
 	  				<?php while ( have_posts() ) : the_post();
 										$image_1 = get_field("image_1");
 										$size = "medium";
 						?>
 						<li class="individual-featured-work">
 									<figure>
 												<?php echo wp_get_attachment_image($image_1, $size); ?>
 									</figure>

 		 							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
 						</li>

 	  				<?php endwhile; // end of loop. ?>
 	  				<?php wp_reset_query(); ?>
 		</ul>

 		<h4>Services</h4>

 		<ul class="homepage-featured-work">
 		<?php query_posts('posts_per_page=4&post_type=services'); ?>
 	  				<?php while ( have_posts() ) : the_post();
 										$image_1 = get_field("image_1");
 										$size = "medium";
 						?>
 						<li class="individual-featured-work">


 									<figure>
 												<?php echo wp_get_attachment_image($image_1, $size); ?>
 												<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
 									</figure>


 						</li>
 	  				<?php endwhile; // end of loop. ?>
 	  				<?php wp_reset_query(); ?>
 		</ul>

 	</div>
 </section>
 </div>



 	</div><!--site content-->
 </section>

 <?php get_footer(); ?>



get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		<?php while ( have_posts() ) : the_post();
            $image_1 = get_field('image_1');
            $size = "medium";
            $services = get_field('services'); ?>

        <article class="case-study">
					<div class="case-study-images">
							<a href="<?php the_permalink(); ?>">
									<?php echo wp_get_attachment_image($image_1, $size); ?>
							</a>
					</div>
          <aside class="case-study-sidebar">
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <h5><?php echo $services; ?></h5>
              <?php the_excerpt(); ?>
              <p><strong><a href="<?php the_permalink(); ?>">View Project</a></strong></p>
          </aside>

        </article>
      <?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>

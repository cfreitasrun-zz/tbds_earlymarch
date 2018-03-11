<?php
/**
 * Template Name: About Page
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 1.0
 */

get_header(); ?>

<section class="about-page">
	<div id="primary" class="about-area">
		<main id="main" class="about-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
		<?php endwhile; // end of the loop. ?>
</div>
</section><!-- .about-page -->


<section class="about-description">
	<div class="about-content">
			<h2><?php the_content(); ?></h2>
		</div>

		</section><!-- .about-page -->

<?php get_footer(); ?>

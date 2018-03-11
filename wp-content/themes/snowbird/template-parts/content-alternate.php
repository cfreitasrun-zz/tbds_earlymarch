<?php
/**
 * Template part for displaying posts.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemtype="http://schema.org/BlogPosting"
         itemscope="itemscope" itemprop="blogPost">

	<div class="xf__container">
		<header class="xf__post-header">
			<?php
			/**
			 * Post Meta
			 */
			get_template_part( 'template-parts/post-meta' ); ?>

			<?php
			/**
			 * Post Title
			 */
			the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header>
	</div>

	<?php
	/**
	 * Featured Image
	 */
	get_template_part( 'template-parts/featured-image-alternate' ); ?>

	<?php if ( 'none' !== Snowbird()->mod( 'loop_content' ) ) : ?>
		<div class="xf__post-wrapper">
			<div class="xf__container xf__entry-container">
				<?php
				/**
				 * Post Sidebar
				 */
				get_template_part( 'template-parts/loop-sidebar' );

				/**
				 * Post Content
				 */
				if ( 'excerpt' === Snowbird()->mod( 'loop_content' ) && get_the_excerpt() ) :
					/**
					 * Post Excerpt
					 */
					?>
					<div class="content entry-content entry-summary" itemprop="text">
						<?php the_excerpt(); ?>
					</div>
					<?php
				elseif ( 'full' === Snowbird()->mod( 'loop_content' ) && get_the_content() ) :
					/**
					 * Full Content
					 */
					?>
					<div class="content entry-content" itemprop="text">
						<?php the_content(); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>

</article>

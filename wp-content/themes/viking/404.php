<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package viking
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<article id="post-0" class="post not-found">
				<div class="entry-content">
				<h1 class="entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'viking' ); ?></h1>
					<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'viking' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 .post .not-found -->
		</div><!-- #content -->
	</div><!-- #primary -->
<?php
get_footer();

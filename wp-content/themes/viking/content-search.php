<?php
/**
 * @package viking
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		}
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'viking' ),
			'after'  => '</div>',
		) );
		?>
		<footer class="entry-meta">
			<?php
			viking_posted_on();

			edit_post_link( sprintf( __( 'Edit %s', 'viking' ), get_the_title() ), '<span class="edit-link">', '</span>' );
			?>
		</footer><!-- .entry-meta -->
	</div><!-- .entry-content -->
</article><!-- #post-## -->

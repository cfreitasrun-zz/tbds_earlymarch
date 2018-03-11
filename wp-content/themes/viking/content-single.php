<?php
/**
 * @package viking
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<h1 class="entry-title"><?php the_title(); ?></h1>
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

<?php
/**
 * @package viking
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-content">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php
			if ( is_search() ) { // Only display Excerpts for Search.
				the_excerpt();
			} else {
				if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				}
				?>
				<?php the_content( viking_continue_reading( get_the_ID() ) );
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'viking' ),
						'after'  => '</div>',
					) );
				?>
				<footer class="entry-meta">
				<?php
				viking_posted_on();
				if ( ! post_password_required() && ( comments_open() || '0' !== get_comments_number() ) ) {
				?>
					<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'viking' ), __( '1 Comment', 'viking' ), __( '% Comments', 'viking' ) ); ?></span>
				<?php
				}
				?>
		<?php edit_post_link( sprintf( __( 'Edit %s', 'viking' ), get_the_title() ), '<span class="edit-link">', '</span>' );  ?>
		</footer><!-- .entry-meta -->
		</div><!-- .entry-content -->
			<?php
			}
			?>
</article><!-- #post-## -->

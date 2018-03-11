<?php
/**
 * The template used for displaying page content in page.php
 *
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
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'viking' ),
			'after' => '</div>',
		) );

		edit_post_link( sprintf( esc_html__( 'Edit %s', 'viking' ), get_the_title() ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

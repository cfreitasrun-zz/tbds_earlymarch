<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to viking_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package viking
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php
	if ( have_comments() ) {?>
		<h2 class="comments-title"><?php comments_number(); ?></h2>
		<?php the_comments_navigation(); ?>
		<ol class="comment-list">
			<?php
			wp_list_comments();
			?>
		</ol><!-- .comment-list -->
		<?php
		the_comments_navigation();
	}
	?>
	<?php comment_form(); ?>
</div><!-- #comments -->

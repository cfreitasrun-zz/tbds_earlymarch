<?php
if (post_password_required()) {
    ?>
    <p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments.", 'skymile'); ?></p>
    <?php
    return;
}
?>
<!--Start Comment box-->
<div id="commentsbox">
    <?php if (have_comments()) : ?>
        <div class="post-info">
            <h3><?php _e('Comments', 'skymile'); ?></h3>
        </div>
        <ol class="commentlist">
            <?php
            wp_list_comments(array(
                'style' => 'ol',
                'short_ping' => true,
                'avatar_size' => 74,
            ));
            ?>
        </ol><!-- .comment-list -->
        <?php
        // Are there comments to navigate through?
        if (get_comment_pages_count() > 1 && get_option('page_comments')) :
            ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php _e('Comment navigation', 'skymile'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'skymile')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'skymile')); ?></div>
            </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation  ?>
    <?php endif; ?>
    <?php if (comments_open()) { ?>
        <div class="post-info"><h2><?php _e('Leave a Comment', 'skymile'); ?></h2></div>
        <div id="comment-form">
            <?php comment_form(); ?>
        </div>
    <?php } else { // comments are closed     ?>
        <!-- If comments are closed. -->
        <p class="nocomments"><?php _e('Comments are closed.', 'skymile'); ?></p>
    <?php } ?>
</div>
<!--End Comment box--> 

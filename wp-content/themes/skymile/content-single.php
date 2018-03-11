<div id="id-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h1 class="post-title"><?php the_title(); ?></h1>
    <div class="meta-strip">
        <span class="author"><?php _e('By','skymile'); ?> <?php the_author_posts_link(); ?></span>
<!--        <span class="views">Our Bestseller: thememile WP </span>-->
    </div>
    <div class="post-meta">
        <ul id="post_meta">
            <li class="time"><?php the_time(get_option('date_format')); ?></li>
            <li class="category"><?php the_category(', '); ?></li>
            <li class="comment"><?php comments_popup_link( '0 Comments', '1 Comment', '% Comments' ); ?></li>
        </ul>
        <span class="comment-count"></span>
    </div>
    <div class="post-content">
     <?php the_content(); ?>
    </div>                                       
</div>
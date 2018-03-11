<div id="id-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'skymile'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
    <div class="meta-strip">
        <span class="author"><?php _e('By', 'skymile'); ?> <?php the_author_posts_link(); ?></span>
    </div>
    <div class="post-meta">
        <ul id="post_meta">
            <li class="time"><?php the_time(get_option('date_format')); ?></li>
            <li class="category"><?php the_category(', '); ?></li>
            <li class="comment"><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></li>
        </ul>
        <span class="comment-count"></span>
    </div>
    <?php if (skymile_resize_image(595, 273)) { ?>
        <a class="post_thumbnail" href="<?php the_permalink() ?>">
            <span class="glyphicon glyphicon-link animated"></span>
            <span class="inner-shadow"></span>
            <?php
            //the_post_thumbnail(array(595, 224 ), array('class' => 'postimg'));
            echo skymile_resize_image(595, 273);
            ?>
        </a>
    <?php } ?>
    <div class="post-content">
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>"><?php _e('Read More', 'skymile'); ?></a>
    </div>                                       
</div>
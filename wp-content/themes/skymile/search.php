<?php get_header(); ?>
<div class="content-wrapper">
    <h1 class="page-title"><?php printf(__('Search Results for: %s', 'skymile'), '' . get_search_query() . ''); ?></h1>
    <div class="row">
        <div class="col-md-8">
            <div class="content">
                <section class="recent-post">
                    <?php
                    if (have_posts()):
                        while (have_posts()): the_post();
                            get_template_part('content');
                        endwhile;

                        /**
                         * Display post pagination
                         */
                        skymile_pagination();
                        ?>
                    <?php else : ?>
                        <h2><?php _e('Sorry, but Nothing Found', 'skymile'); ?></h2>
                        <p><?php _e('Search tips:', 'skymile'); ?></p>
                        <ul>
                            <li><?php _e('Try using single words (such as Theme Title or Category)', 'skymile'); ?></li>
                            <li><?php _e('Search for a less specific term', 'skymile'); ?></li>
                            <li><?php _e('Double-check your spelling', 'skymile'); ?></li>
                        </ul>
                        <?php get_search_form(); ?>
                    <?php endif; ?>
                    <div class = "clear"></div>
                </section>
            </div>
        </div>
        <div class="col-md-4">
            <?php get_sidebar();
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
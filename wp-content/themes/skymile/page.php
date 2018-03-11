<?php get_header(); ?>
<div class="content-wrapper">
    <h1 class="page-title"><?php the_title(); ?></h1>
    <div class="row">
        <div class="col-md-8">
            <div class="content">
                <?php
                if (have_posts()): while (have_posts()): the_post();
                        the_content();
                        wp_link_pages(array(
                            'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'skymile') . '</span>',
                            'after' => '</div>',
                            'link_before' => '<span>',
                            'link_after' => '</span>',
                        ));
                    endwhile;
                endif;
                ?>  
                <div class="clear"></div>
                <?php comments_template(); ?>
            </div>
        </div>
        <div class="col-md-4">
            <?php get_sidebar();
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
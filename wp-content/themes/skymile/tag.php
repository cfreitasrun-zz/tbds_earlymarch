<?php get_header(); ?>
<div class="content-wrapper">
    <h1 class="page-title"><?php printf(__('Tag Archives: %s', 'skymile'), '' . single_cat_title('', false) . ''); ?></h1>
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
                        <?php get_template_part('content', 'none'); ?>
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
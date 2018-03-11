<?php get_header(); ?>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-8">
            <div class="content">
                <section class="recent-post">
                    <?php
                    if (have_posts()):
                        while (have_posts()): the_post();
                            get_template_part('content', 'single');
                        endwhile;
                        ?>
                    <?php endif; ?>
                    <div class="clear"></div>
                    <?php comments_template(); ?>
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
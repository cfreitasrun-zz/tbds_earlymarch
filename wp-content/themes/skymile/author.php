<?php get_header(); ?>
<div class="content-wrapper">
    <h1 class="page-title">
        <?php
        if (is_category()) :
            single_cat_title();

        elseif (is_tag()) :
            single_tag_title();

        elseif (is_author()) :
            printf(__('Author: %s', 'skymile'), '<span class="vcard">' . esc_html(get_the_author()) . '</span>');

        elseif (is_day()) :
            printf(__('Day: %s', 'skymile'), '<span>' . esc_html(get_the_date()) . '</span>');

        elseif (is_month()) :
            printf(__('Month: %s', 'skymile'), '<span>' . esc_html(get_the_date(_x('F Y', 'monthly archives date format', 'skymile'))) . '</span>');

        elseif (is_year()) :
            printf(__('Year: %s', 'skymile'), '<span>' . esc_html(get_the_date(_x('Y', 'yearly archives date format', 'skymile'))) . '</span>');

        elseif (is_tax('post_format', 'post-format-aside')) :
            _e('Asides', 'skymile');

        elseif (is_tax('post_format', 'post-format-gallery')) :
            _e('Galleries', 'skymile');

        elseif (is_tax('post_format', 'post-format-image')) :
            _e('Images', 'skymile');

        elseif (is_tax('post_format', 'post-format-video')) :
            _e('Videos', 'skymile');

        elseif (is_tax('post_format', 'post-format-quote')) :
            _e('Quotes', 'skymile');

        elseif (is_tax('post_format', 'post-format-link')) :
            _e('Links', 'skymile');

        elseif (is_tax('post_format', 'post-format-status')) :
            _e('Statuses', 'skymile');

        elseif (is_tax('post_format', 'post-format-audio')) :
            _e('Audios', 'skymile');

        elseif (is_tax('post_format', 'post-format-chat')) :
            _e('Chats', 'skymile');

        else :
            _e('Archives', 'skymile');

        endif;
        ?>
    </h1>
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
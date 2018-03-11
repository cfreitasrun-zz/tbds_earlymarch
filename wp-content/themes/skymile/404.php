<?php get_header(); ?>
<div class="content-wrapper">
    <h1 class="page-title"><?php _e('404: The Page you are looking for is not found.', 'skymile'); ?></h1>
    <div class="row">
        <div class="col-md-8">
            <div class="content">
                <p><?php _e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable. Please try the following:', 'skymile'); ?></p>
                <ul>
                    <li><?php _e('Make sure that the Web site address displayed in the address bar of your browser is spelled and formatted correctly', 'skymile'); ?></li>
                    <li><?php _e('If you reached this page by clicking a link, contact us to alert us that the link is incorrectly formatted', 'skymile'); ?></li>
                    <li><?php _e('Forget that this ever happened, and go browse the files :)', 'skymile'); ?></li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <?php get_sidebar();
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
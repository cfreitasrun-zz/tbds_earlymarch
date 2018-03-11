<?php
$slider_query = new WP_Query(array(
    'posts_per_page' => skymile_option('slider_count', 5),
    'category__in' => skymile_option('slider_category')
        ));
if ($slider_query->have_posts()) {
    ?>            
    <!--Start Slider Wrapper-->
    <div class="flexslider">
        <ul class="slides">
            <?php
            while ($slider_query->have_posts()) {
                $slider_query->the_post();
                if (has_post_thumbnail()) {
                    ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php echo skymile_resize_image(920, 374); ?></a>
                        <div class="caption">
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
    <!--End Slider Wrapper-->
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            /**
             * Flex slider
             */
            $('.flexslider').flexslider({
                animation: "slide",
            });
        });
    </script>
    <?php
}
wp_reset_query();
?>
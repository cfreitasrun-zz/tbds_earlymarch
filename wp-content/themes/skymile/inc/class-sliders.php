<?php

class skymileSliders {

    static function get_sliders() {
        $ob = new self();
        do_action('skymile_before_home_slider');
        $sliders = skymile_option('select_slider', 'flex-slider');
        if (skymile_option('slider_acde', false) == true) {
            echo '<div id="slider_wrapper">';
            switch ($sliders) {
                case 'flex-slider':
                    $ob->flex_slider();
                    break;
            }
            echo '</div>';
            echo '<div class="clear"></div>';
        }
        do_action('skymile_after_home_slider');
    }

    function flex_slider() {
        include_once get_template_directory() . '/inc/sliders/flex-slider.php';
    }

}

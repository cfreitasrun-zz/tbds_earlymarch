<div class="clear"></div>
<?php
$skins = skymile_option('layout_skins');
if ($skins == 'open-skin') {
    ?>
    </div>
    <!--End Main-->
    </div>
    </div>
    </div>
    <div id="main_footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php } ?>
                <!--Start Footer-->
                <footer id="footer">
                    <?php get_sidebar('footer'); ?>
                </footer>
                <!--End Footer-->
                <?php if ($skins == 'open-skin') { ?>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php } ?>
                <!--Start footer bottom-->
                <footer id="footer_bottom">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <?php
                            $default_copyright = __('Skymile Theme by Thememile.com, Powered by WordPress', 'skymile');
                            $footer_copyright = skymile_option('copyright_text', $default_copyright);
                            ?>
                            <p class="copy-right"><a href="<?php echo esc_url('http://thememile.com'); ?>" target="_blank"><?php echo esc_html($footer_copyright); ?></a></p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <?php
                            $social_links = skymile_option('social_icons');
                            if (!empty($social_links)) {
                                ?>
                                <ul class="social-icon">
                                    <?php
                                    foreach ($social_links as $key => $value) {
                                        if ($value['link'] != '') {
                                            $target = ($value['new_tab']) ? 'target="new"' : '';
                                            ?>
                                            <li><a <?php echo esc_html($target); ?>  title="<?php echo ucfirst(esc_attr($value['type'])); ?>" class="<?php echo esc_attr($value['type']); ?>" href="<?php echo esc_url($value['link']); ?>"></a></li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                </footer>
                <!--End footer bottom-->
            </div>
        </div>
    </div> 
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>

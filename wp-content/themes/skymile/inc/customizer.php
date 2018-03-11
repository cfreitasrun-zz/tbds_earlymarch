<?php

/**
 * Skymile Theme Customizer
 *
 * @package Skymile
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function skymile_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
}

add_action('customize_register', 'skymile_customize_register');

if (class_exists('Kirki')) {

    class SkymileCustomizer {

        function setup() {
            /**
             * Add the configuration.
             * This way all the fields using the 'kirki_demo' ID
             * will inherit these options
             */
            Kirki::add_config('skymile_option', array(
                'capability' => 'edit_theme_options',
                'option_type' => 'theme_mod',
            ));

            $this->panel();
            $this->sections();
            $this->settings();
        }

        function panel() {
            /**
             * Add Panel
             */
            Kirki::add_panel('skymile_theme_option', array(
                'title' => esc_attr__('Theme Option', 'skymile'),
                'priority' => 1,
                'description' => esc_attr__('Skymile theme option', 'skymile'),
                'capability' => 'edit_theme_options',
            ));
        }

        function sections() {

            /**
             * Add sections
             */
            Kirki::add_section('skymile_general', array(
                'title' => esc_attr__('General Settings', 'skymile'),
                'priority' => 1,
                'panel' => 'skymile_theme_option',
                'capability' => 'edit_theme_options',
            ));

            /**
             * Header
             */
            Kirki::add_section('skymile_header', array(
                'title' => esc_attr__('Header', 'skymile'),
                'priority' => 1,
                'panel' => 'skymile_theme_option',
                'capability' => 'edit_theme_options',
            ));

            Kirki::add_section('skymile_slider_setting', array(
                'title' => esc_attr__('Slider Setting', 'skymile'),
                'priority' => 1,
                'panel' => 'skymile_theme_option',
                'capability' => 'edit_theme_options',
            ));

            Kirki::add_section('skymile_home_feature', array(
                'title' => esc_attr__('Home Feature Setting', 'skymile'),
                'priority' => 1,
                'panel' => 'skymile_theme_option',
                'capability' => 'edit_theme_options',
            ));

            Kirki::add_section('skymile_home_tagline', array(
                'title' => esc_attr__('Home Page Tagline', 'skymile'),
                'priority' => 1,
                'panel' => 'skymile_theme_option',
                'capability' => 'edit_theme_options',
            ));


            Kirki::add_section('skymile_social_icons', array(
                'title' => esc_attr__('Social Icons', 'skymile'),
                'priority' => 1,
                'panel' => 'skymile_theme_option',
                'capability' => 'edit_theme_options',
            ));

            Kirki::add_section('skymile_footer_setting', array(
                'title' => esc_attr__('Footer Settings', 'skymile'),
                'priority' => 1,
                'panel' => 'skymile_theme_option',
                'capability' => 'edit_theme_options',
            ));
        }

        function settings() {


            /**
             * Header contact detail
             */
            Kirki::add_field('skymile_option', array(
                'type' => 'text',
                'settings' => 'contact_address',
                'label' => esc_attr__('Contact Address', 'skymile'),
                'description' => esc_attr__('Enter your contact address.', 'skymile'),
                'help' => esc_attr__('This will displayed on your site header.', 'skymile'),
                'section' => 'skymile_header',               
                'priority' => 10,
            ));

            Kirki::add_field('skymile_option', array(
                'type' => 'text',
                'settings' => 'contact_number',
                'label' => esc_attr__('Contact Number', 'skymile'),
                'description' => esc_attr__('Enter your contact number.', 'skymile'),
                'help' => esc_attr__('You entered contact number also displayed as tap to call on mobile phones.', 'skymile'),
                'section' => 'skymile_header',               
                'priority' => 10,
            ));

            /**
             * Home slider
             */
            Kirki::add_field('skymile_option', array(
                'type' => 'switch',
                'settings' => 'slider_acde',
                'label' => esc_attr__('Slider On/ Off', 'skymile'),
                'description' => esc_attr__('Enable / disable home slider.', 'skymile'),
                'help' => esc_attr__('You can enable or disable to the home slider.', 'skymile'),
                'section' => 'skymile_slider_setting',                
                'priority' => 10,
            ));

            $categories = skymile_get_categories_array();

            Kirki::add_field('skymile_option', array(
                'type' => 'select',
                'settings' => 'slider_category',
                'label' => esc_attr__('Choose Category For Slider', 'skymile'),
                'description' => esc_attr__('Choose a category from where you want to show the slider content. Note: your post must have featute image to show the slider.', 'skymile'),               
                'section' => 'skymile_slider_setting',               
                'priority' => 10,
                'choices' => $categories,
            ));

            Kirki::add_field('skymile_option', array(
                'type' => 'number',
                'settings' => 'slider_count',
                'label' => esc_attr__('Number Of Slider', 'skymile'),
                'description' => esc_attr__('Enter an amount that would be applied in the slider.', 'skymile'),                
                'section' => 'skymile_slider_setting',               
                'priority' => 10,
            ));

            /**
             * Home Features
             */
            Kirki::add_field('skymile_option', array(
                'type' => 'switch',
                'settings' => 'home_feature_acde',
                'label' => esc_attr__('Slider On/ Off', 'skymile'),
                'description' => esc_attr__('Enable / disable home feature section.', 'skymile'),
                'help' => esc_attr__('You can enable or disable to the home feature section.', 'skymile'),
                'section' => 'skymile_home_feature',                
                'priority' => 10,
            ));

            $categories = skymile_get_categories_array();

            Kirki::add_field('skymile_option', array(
                'type' => 'select',
                'settings' => 'feature_category',
                'label' => esc_attr__('Choose Category For Feature', 'skymile'),
                'description' => esc_attr__('Choose a category from where you want to show the feature content.', 'skymile'),              
                'section' => 'skymile_home_feature',                
                'priority' => 10,
                'choices' => $categories,
            ));

            Kirki::add_field('skymile_option', array(
                'type' => 'number',
                'settings' => 'feature_count',
                'label' => esc_attr__('Number Of Feature Box', 'skymile'),
                'description' => esc_attr__('Enter an amount that would be applied in the feature box.', 'skymile'),               
                'section' => 'skymile_home_feature',               
                'priority' => 10,
            ));


            /**
             * Tag line
             */
            Kirki::add_field('skymile_option', array(
                'type' => 'text',
                'settings' => 'home_tag_line_heading',
                'label' => esc_attr__('Tag Line Heading', 'skymile'),
                'description' => esc_attr__('Enter your text for this field. This field would be displayed on home page above the footer section.', 'skymile'),
                'help' => esc_attr__('You can show your tag line on the home page.', 'skymile'),
                'section' => 'skymile_home_tagline',                
                'priority' => 10,
            ));

            Kirki::add_field('skymile_option', array(
                'type' => 'textarea',
                'settings' => 'home_tag_line_desc',
                'label' => esc_attr__('Tag Line Description', 'skymile'),
                'description' => esc_attr__('Enter your text for this field. This field would be displayed on home page above the footer section.', 'skymile'),
                'help' => esc_attr__('You can show your tag line on the home page.', 'skymile'),
                'section' => 'skymile_home_tagline',               
                'priority' => 10,
            ));

            Kirki::add_field('skymile_option', array(
                'type' => 'text',
                'settings' => 'tagline_button_text',
                'label' => esc_attr__('Tagline Button Text', 'skymile'),
                'description' => esc_attr__('Enter tagline button text.', 'skymile'),
                'help' => esc_attr__('You can change the text of the button.', 'skymile'),
                'section' => 'skymile_home_tagline',
                'priority' => 10,
            ));

            Kirki::add_field('skymile_option', array(
                'type' => 'text',
                'settings' => 'tagline_button_link',
                'label' => esc_attr__('Tagline Button Link', 'skymile'),
                'description' => esc_attr__('Enter tagline button link url.', 'skymile'),
                'help' => esc_attr__('You can change the url of the button.', 'skymile'),
				'sanitize_callback' => 'esc_url',
                'section' => 'skymile_home_tagline',
                'priority' => 10,
            ));

            Kirki::add_field('skymile_option', array(
                'type' => 'repeater',
                'settings' => 'social_icons',
                'label' => esc_attr__('Social Icons', 'skymile'),
                'description' => esc_attr__('Setup your social icons here.', 'skymile'),
                'help' => esc_attr__('You can add different social icons from here.', 'skymile'),
                'section' => 'skymile_social_icons',
                'priority' => 10,
                'fields' => array(
                    'type' => array(
                        'type' => 'select',
                        'label' => esc_attr__('Select Social Plateform', 'skymile'),
                        'description' => esc_attr__('Select a social plateform from this list.', 'skymile'),                       
                        'choices' => array(
                            '' => esc_attr__('Select A Icon', 'skymile'),
                            'facebook' => esc_attr__('Facebook', 'skymile'),
                            'twitter' => esc_attr__('Twitter', 'skymile'),
                            'google' => esc_attr__('Google Plus', 'skymile'),
                            'rss' => esc_attr__('Rss Feed', 'skymile'),
                            'pinterest' => esc_attr__('Pinterest', 'skymile'),
                            'linkedin' => esc_attr__('Linkedin', 'skymile'),
                            'stumble' => esc_attr__('Stumble Upon', 'skymile'),
                        ),
                    ),
                    'link' => array(
                        'type' => 'text',
                        'label' => esc_attr__('Link Url', 'skymile'),
                        'description' => esc_attr__('Enter your social link url.', 'skymile'),
						'sanitize_callback' => 'esc_url',
                    ),
                    'new_tab' => array(
                        'type' => 'checkbox',
                        'label' => esc_attr__('Open New Tab?', 'skymile'),
                        'description' => esc_attr__('Check if you want to open the link in new tab.', 'skymile'),
                    ),
                )
            ));

            Kirki::add_field('skymile_option', array(
                'type' => 'editor',
                'settings' => 'copyright_text',
                'label' => esc_attr__('Footer Detail', 'skymile'),
                'description' => esc_attr__('Enter your site footer detail here.', 'skymile'),
                'help' => esc_attr__('You can set your site footer detail from here.', 'skymile'),
                'section' => 'skymile_footer_setting',
                'priority' => 10,
            ));
        }

    }

    $Skymile_customizer = new SkymileCustomizer();
    $Skymile_customizer->setup();
} 
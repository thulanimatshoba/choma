<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'choma_post_meta');
function choma_post_meta()
{
    /* Home Page Partners */
    Container::make('post_meta', __('Our Partners', 'choma'))
        ->show_on_page('home')
        ->add_fields([
            Field::make('text', 'choma_partners_title'),
            Field::make('complex', 'choma_partners', '')
                ->set_layout('tabbed-vertical')
                ->add_fields([
                    Field::make('text', 'partner_name', 'Partner Name')->set_width(20),
                    Field::make('text', 'partner_link', 'Partner Link Url')->set_width(20)
                        ->set_help_text(__('https://xxxx.com')),
                    Field::make('image', 'partner_logo', 'Partner Logo')->set_width(50),
                ])
                ->set_header_template(
                    '
                <% if (partner_name) { %>
                    <%- partner_name %>
                <% } else { %>
                    empty
                <% } %> '
                ),
        ]);

    /* Choma options page */
    $basic_options_container = Container::make('theme_options', __('Choma Options'))
        ->set_page_menu_position(2)
        ->set_icon('dashicons-image-filter')
        ->add_tab(__('Google Analytics'), [
            Field::make('text', 'choma_gtm_code', __('Google Tag Manager Code'))
                ->set_attribute('placeholder', 'GTM-XXX'),
            Field::make('text', 'choma_ua_code', __('Google Universal Analytics Tracking ID'))
                ->set_attribute('placeholder', 'UA-XXX'),
        ])
        ->add_tab(__('ReCaptcha'), [
            Field::make('text', 'choma_recaptcha_client_key', __('ReCaptcha Site Key')),
            Field::make('text', 'choma_recaptcha_server_key', __('ReCaptcha Secret Key')),
        ])
        ->add_tab(__('Scripts'), [
            Field::make('header_scripts', 'choma_header_script', __('Header Script')),
            Field::make('footer_scripts', 'choma_footer_script', __('Footer Script')),
        ])
        ->add_tab(__('Blog'), [
            Field::make('text', 'choma_blog_title', __('Blog Title'))
                ->set_help_text(__('This is the title displayed on the homepage blog section')),
            Field::make('select', 'number_of_articles_select', __('Number of Articles'))
                ->set_help_text(__('Choose the number of articles to display on the homepage carousel'))
                ->set_options([
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                    '7' => 7,
                ]),
            Field::make('select', 'choma_featured_category')
                ->set_options([
                    [
                        'type' => 'term',
                        'taxonomy' => []
                    ],
                ]),

            Field::make('select', 'home_feature_category', __('Featured Category'))
                ->set_help_text(__('Choose the featured category to display on the homepage latest news section'))
            //->add_options(get_product_cats()),
        ]);


    // Add second options page under 'Basic Options'
    Container::make('theme_options', __('Social Links'))
        ->set_page_parent($basic_options_container) // reference to a top level container
        ->add_fields([
            Field::make('text', 'choma_facebook_link', __('Facebook Link')),
            Field::make('text', 'choma_twitter_link', __('Twitter Link')),
        ]);
}
add_action('after_setup_theme', 'choma_load');

function choma_load()
{
    //require_once( ABSPATH . '/vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

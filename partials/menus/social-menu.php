<?php
/**
 * This is for social menu
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package choma
 */

if (!has_nav_menu('social')) {
    return;
}

wp_nav_menu(
    [
        'theme_location'  => 'social',
        'container'       => 'div',
        'container_id'    => 'menu-social',
        'container_class' => 'menu',
        'menu_id'         => 'menu-social-items',
        'menu_class'      => 'menu-items',
        'depth'           => 1,
        'link_before'     => '<span class="screen-reader-text">',
        'link_after'      => '</span>',
        'fallback_cb'     => '',
    ]
);
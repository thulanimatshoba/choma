<?php

if (!has_nav_menu('header')) {
    return;
}

wp_nav_menu(
    [
        'theme_location' => 'header',
        'container_class' => 'choma-menu',
        'menu_id' => 'primary-menu',
    ]
);

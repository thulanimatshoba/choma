<?php

if (!has_nav_menu('offcanvas')) {
    return;
}

wp_nav_menu(
    [
        'theme_location' => 'offcanvas',
        'container_class' => 'uk-navbar-nav uk-margin-medium-top',
        'menu_class' => 'uk-nav'
    ]
);

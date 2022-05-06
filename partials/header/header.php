<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'choma' ); ?></a>

    <div class="top-header">
        <div class="uk-container uk-padding-small uk-padding-remove-left uk-padding-remove-right">
            <div class="socials uk-float-right">
                <?php get_template_part('partials/menus/social', 'menu'); ?>
            </div>
        </div>
    </div>
    <header id="masthead" class="site-header" uk-sticky="top: 100; animation: uk-animation-slide-top; bottom: #sticky-on-scroll-up" style="background-image: url(<?php header_image(); ?>); background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <div class="uk-container uk-navbar">
            <div class="site-branding uk-navbar-left">
               <?php get_template_part('partials/header/branding'); ?>
            </div><!-- .site-branding -->

            <div class="uk-navbar-right">
                <div class="login-block">
                    <?php
                    if (!is_user_logged_in()) : ?>
                    <button class="uk-button-small uk-button-primary choma-button" uk-toggle="target: #ninjah-login-modal"><i class="fa fa-user"></i> Sign in</button>
                    <?php else :
                    $current_user = wp_get_current_user(); ?>
                    <div class="uk-float-left">
                        <button class="uk-button-small uk-button-primary choma-button"><i class="fa fa-user"></i> Profile</button>
                    </div>
                    <?php endif;?>
                    <a class="" href="#search-modal" uk-search-icon uk-toggle></a>
                    <?php get_template_part('template-parts/search/search'); ?>
                </div>
            </div>

            <div class="uk-navbar-center">
                <nav id="site-navigation" class="main-navigation">
                    <i class="fa fa-bars" aria-hidden="true" uk-toggle="target: #offcanvas-push"></i>
                    <?php get_template_part('partials/menus/header', 'menu'); ?>
                </nav><!-- #site-navigation -->
            </div>
        </div>
        <?php get_template_part('partials/components/striped-border'); ?>
    </header><!-- #masthead -->
<?php get_template_part('partials/header/offcanvas'); ?>

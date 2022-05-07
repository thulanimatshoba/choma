<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'choma' ); ?></a>

    <div class="top-header">
        <div class="uk-container uk-padding-small uk-padding-remove-left uk-padding-remove-right">
            <div class="socials uk-float-right">
                <?php get_template_part('partials/menus/social', 'menu'); ?>
                <a class="uk-float-left choma-search" href="#search-modal" uk-search-icon uk-toggle></a>
            </div>
        </div>
    </div>
    <header id="masthead" class="site-header" uk-sticky="top: 100; animation: uk-animation-slide-top; bottom: #sticky-on-scroll-up" style="background-image: url(<?php header_image(); ?>); background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <div class="uk-container uk-navbar">
            <div class="site-branding uk-navbar-left">
               <?php get_template_part('partials/header/branding'); ?>
            </div><!-- .site-branding -->

            <div class="uk-navbar-right user-sign-in">
                <div class="login-block">
                    <?php get_template_part('partials/header/login','button'); ?>
                </div>
            </div>

            <div class="uk-navbar-center header-nav-container">
                <nav id="site-navigation" class="main-navigation">
                    <i class="fa fa-bars" aria-hidden="true" uk-toggle="target: #offcanvas-push"></i>
                    <?php get_template_part('partials/menus/header', 'menu'); ?>
                </nav><!-- #site-navigation -->
            </div>
        </div>
        <?php get_template_part('partials/components/striped-border'); ?>
    </header><!-- #masthead -->
<?php get_template_part('partials/header/offcanvas'); ?>

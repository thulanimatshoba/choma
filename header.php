<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package choma
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'choma' ); ?></a>

    <div class="top-header">
        <div class="uk-container">
            <div class="socials uk-float-right">
                <?php //get_template_part('inc/social', 'sharing'); ?>
                <?php get_template_part('partials/menus/social', 'menu'); ?>
            </div>
        </div>
    </div>
	<header id="masthead" class="site-header" uk-sticky="top: 100; animation: uk-animation-slide-top; bottom: #sticky-on-scroll-up" style="background-image: url(<?php header_image(); ?>); background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <div class="uk-container uk-navbar">
            <div class="site-branding uk-navbar-left">
                <?php
                the_custom_logo();
                if ( is_front_page() && is_home() ) :
                    ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php
                else :
                    ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php
                endif;
                $choma_description = get_bloginfo( 'description', 'display' );
                if ( $choma_description || is_customize_preview() ) :
                    ?>
                    <p class="site-description"><?php echo $choma_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                <?php endif; ?>
            </div><!-- .site-branding -->

            <div class="uk-navbar-right">
                <div class="search">
                    <?php
                    if (!is_user_logged_in()) : ?>
                        <a href="#"><i class="fa fa-user" uk-toggle="target: #ninjah-login-modal"></i></a>
                    <?php else :
                    $current_user = wp_get_current_user(); ?>
                    <a class="uk-float-left" >
                        <?php
                        if (!$current_user->first_name) {
                            echo $current_user->user_nicename;
                        } else {
                            echo $current_user->user_firstname;
                        }
                        endif; ?>
                    </a>

                    <div uk-dropdown="animation: uk-animation-slide-top-small; duration: 1000">
                        <ul class="uk-nav uk-dropdown-nav">
                            <li><a href="#">Item</a></li>
                            <li class="uk-nav-divider"></li>
                            <li><a href="#">Item</a></li>
                            <li class="uk-nav-divider"></li>
                            <li><a href="<?php echo wp_logout_url( get_permalink() ); ?>">Logout</a></li>
                        </ul>
                    </div>

                    <a class="" href="#search-modal" uk-search-icon uk-toggle></a>
                    <?php get_template_part('template-parts/search/search'); ?>
                </div>
            </div>

            <div class="uk-navbar-center">
            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'choma' ); ?></button>
                <?php
                wp_nav_menu(
                    [
                        'theme_location' => 'header',
                        'menu_id'        => 'primary-menu',
                    ]
                );
                ?>
            </nav><!-- #site-navigation -->
            </div>

    </div>
        <div class="mcborder">
            <span class="red-bg"></span>
            <span class="pink-bg two"></span>
            <span class="yellow-bg"></span>
            <span class="green-bg"></span>
            <span class="purple-bg three"></span>
            <span class="blue-bg two"></span>
        </div>
	</header><!-- #masthead -->

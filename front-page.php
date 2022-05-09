<?php
/**
 * Template Name: Home Page
 *
 * This is the template that the home page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package choma
 */

get_header();
?>


<div id="primary" class="content-area">
    <main id="main" class="site-main">


<!--        --><?php //while (have_posts()) :
//            the_post();
//            get_template_part('template-parts/pages/content', 'home');
//        endwhile; ?>

        <div class="slider-posts">
            <?php get_template_part('partials/components/homepage-post', 'slider'); ?>
        </div>


        <div class="featured-posts">
            <div class="uk-container uk-padding-small">
                <?php get_template_part('partials/components/featured', 'posts'); ?>
            </div>
        </div>
        <div class="ad">
            <div class="uk-container uk-text-center">
                <?php if (!dynamic_sidebar('home-ad1')): endif; ?>
            </div>
        </div>

        <div class="popular-posts">
            <div class="uk-container uk-padding-small">
                <?php get_template_part('partials/components/popular', 'posts'); ?>
            </div>
        </div>

        <div class="popular-posts">
            <div class="uk-container uk-padding-small">
                <?php get_template_part('partials/components/home', 'partners'); ?>
            </div>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->
    <div class="our-map">
    <div class="feature map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d221355.72376296413!2d27.913692940533434!3d-26.175419557668107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e950c68f0406a51%3A0x238ac9d9b1d34041!2sJohannesburg!5e0!3m2!1sen!2sza!4v1651078133903!5m2!1sen!2sza" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    </div>
<?php
get_footer();

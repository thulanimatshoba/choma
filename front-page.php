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
            <div class="uk-container uk-padding-large">
                <?php get_template_part('partials/components/featured', 'posts'); ?>
            </div>
        </div>
        <div class="ad">
            <div class="uk-container uk-text-center">
                <?php if (!dynamic_sidebar('home-ad1')): endif; ?>
            </div>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();

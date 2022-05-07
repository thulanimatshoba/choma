<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package choma
 */

?>

	<footer id="colophon" class="site-footer">
        <?php get_template_part('partials/components/striped-border'); ?>
        <div class="uk-container">
            <div class="footer-top uk-margin-medium-top uk-margin-small-bottom uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-4@m" uk-grid>
                <div class="uk-animation-scale-up">
                   <?php if (!dynamic_sidebar('footer-info')): endif; ?>
                </div>
                <div class="uk-animation-scale-up">
                   <?php if (!dynamic_sidebar('footer-nav')): endif; ?>
                </div>
                <div class="uk-animation-scale-up">
                   <?php if (!dynamic_sidebar('footer-contacts')): endif; ?>
                </div>
                <div class="uk-animation-scale-up">
                   <?php if (!dynamic_sidebar('footer-newsletter')): endif; ?>
                </div>
            </div>
        </div>

        <div id="bottom-footer">
            <div class="uk-container uk-padding-small">
                <div class="uk-float-left">
                    <?php _e('All rights reserved &copy;');?> <?php echo date("Y"); echo " "; bloginfo('name'); ?>
                </div>
                <div class="uk-float-right">
                    <?php printf( esc_html__( 'Developed by: %2$s', 'choma' ), 'choma', '<a title="2lanie Matshoba" target="_blank" href="http://thulanimatshoba.co.za">2lanie</a>' ); ?>
                </div>
            </div><!-- .uk-container -->
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<?php
    get_template_part('partials/modals/login-register');
    get_template_part('template-parts/search/search'); ?>

<script src="//cdn.jsdelivr.net/npm/uikit@3.14.1/dist/js/uikit.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/uikit@3.14.1/dist/js/uikit-icons.min.js"></script>

</body>
</html>

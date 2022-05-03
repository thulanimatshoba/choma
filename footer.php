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
        <div class="uk-container">
            <div class="site-info">
                <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'choma' ) ); ?>">
                    <?php
                    /* translators: %s: CMS name, i.e. WordPress. */
                    printf( esc_html__( 'Proudly powered by %s', 'choma' ), 'WordPress' );
                    ?>
                </a>
                <span class="sep"> | </span>
                    <?php
                    /* translators: 1: Theme name, 2: Theme author. */
                    printf( esc_html__( 'Theme: %1$s by %2$s.', 'choma' ), 'choma', '<a href="http://thulanimatshoba.co.za">Thulani Matshoba</a>' );
                    ?>
            </div><!-- .site-info -->
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<?php get_template_part('partials/modals/login-register'); ?>

<script src="//cdn.jsdelivr.net/npm/uikit@3.14.1/dist/js/uikit.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/uikit@3.14.1/dist/js/uikit-icons.min.js"></script>

</body>
</html>

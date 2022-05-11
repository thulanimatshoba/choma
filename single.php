<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package choma
 */

get_header();
?>
    <div class="breadcrumbs">
        <div class="uk-container uk-padding-small">
            <?php if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb('<p id="breadcrumbs" class="">','</p>');
            } ?>
        </div>
    </div>
	<main id="primary" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
            choma_update_post_views(get_the_ID());
			get_template_part( 'template-parts/pages/content', 'article' ); ?>

        <div class="uk-container">
            <?php
                the_post_navigation(
                    [
                        'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'choma' ) . '</span> <span class="nav-title">%title</span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'choma' ) . '</span> <span class="nav-title">%title</span>',
                    ]
                );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

                endwhile; // End of the loop.
            ?>
        </div>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();

<?php
/**
 * Template part for displaying articles
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package choma
 */
require_once 'article-info.php';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(( ( $is_sponsor ) ? 'sponsored' : '' )); ?>>
    <div class="entry-content">
        <div class="uk-container">
            <div uk-grid>
                <div class="uk-width-3-4@m">
                    <header class="entry-header">
                        <?php
                            get_custom_label($post_id, 'post', $is_sponsor);
                            the_title('<h1 class="choma-article-title uk-margin-bottom uk-margin-top uk-h2">', '</h1>');
                        ?>
                    </header><!-- .entry-header -->

                    <div class="uk-container">
                        <?php
                        if ( ! empty( $get_video_url[0] ) ) {
                            ?>
                            <video class="article-header hidden-xs" controls>
                                <source src="<?php echo $get_video_url; ?>" type="video/mp4">
                            </video>
                            <?php
                            if ( $get_post_thumbnail_url ) {
                                echo '<img src="' . $get_post_thumbnail_url . '"class="img-responsive article-header-image visible-xs">';
                            }
                        } elseif ( $get_post_thumbnail_url ) {
                            $featured_image = wp_get_attachment_image_src( $thumbnail_id, 'extra_large' );
                            echo '<img src="' . $featured_image[0] . '" class="img-responsive article-header-image">';
                        }

                        if ( ! empty( $photo_caption ) ) {
                            ?>
                            <span class="image-caption uk-margin-small-bottom">
                                <i class="fa fa-camera" aria-hidden="true"></i>
                                <?php
                                echo $photo_caption;
                                echo ( ( ! empty( $photo_description ) && $photo_description != $photo_caption ) ? ' ' . $photo_description : '' );
                                ?>
                            </span>
                        <?php } ?>
                    </div>
                    <div uk-grid>
                        <div class="uk-width-1-6@s">
                            <div class="uk-margin-top" style="position: sticky; top: 70px;">
                                <?php get_template_part('inc/social-sharing'); ?>
                            </div>
                        </div>
                        <div class="uk-width-expand@m">
                            <div class="uk-margin-top">
                                <?php if ( 'post' === get_post_type() ) : ?>
                                    <div class="entry-meta">
                                        <?php
                                            echo get_avatar($author_id, 40);
                                            choma_posted_by();
                                            choma_posted_on();
                                        ?>
                                        <span class="post-comments uk-text-muted">| <a href="#comments"><i class="fa fa-comments">  <?php comments_number(0, 1, '%'); ?></i></span></a>
                                    </div><!-- .entry-meta -->
                                <?php endif; ?>
                                <?php
                                the_content( sprintf(
                                    wp_kses(
                                    /* translators: %s: Name of current post. Only visible to screen readers */
                                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'choma' ),
                                        [
                                            'span' => [
                                                'class' => [],
                                            ],
                                        ]
                                    ),
                                    get_the_title()
                                ) );

                                wp_link_pages( [
                                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'choma' ),
                                    'after'  => '</div>',
                                ] );
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-4@m">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <div class="uk-container uk-container-small uk-padding-small">
            <hr>
            <?php choma_entry_footer(); ?>
            <hr>
            <?php //choma_related_posts(); ?>
        </div>
    </footer><!-- .entry-footer -->
    <hr>
</article><!-- #post-<?php the_ID(); ?> -->

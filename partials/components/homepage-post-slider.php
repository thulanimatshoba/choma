<div uk-slider="autoplay: true; autoplay-interval: 9000">
    <div class="uk-position-relative uk-visible-toggle" tabindex="-1">
        <div class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-3@m uk-grid">
            <?php
            if (is_page()) {
                $cat = get_cat_ID('Fashion & Beauty'); //use page title to get a category ID
                $posts = get_posts("cat=$cat&showposts=5");

                if ($posts) {
                    foreach ($posts as $post) :
                        setup_postdata($post); ?>
                        <div class="blog-item">
                            <div class="article-featured-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
                                        the_post_thumbnail('featured-thumb',  array('class' => 'skinny-thumb'));
                                    } else {
                                        'no image dawg';//skinny_ninjah_placeholder_image();
                                    } ?>
                                    <div class="choma-overlay"></div>
                                </a>
                            </div>
                                <div class="bottom-block uk-padding-small">
                            <div class="uk-meta">
                                <?php
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                    echo '<span class="cat">' . esc_html( $categories[0]->name ) . '</span>';
                                } ?>
<br>
                                <span class="uk-float-left uk-margin-small-right"><?= get_the_date('d. M. Y'); ?></span>
                                <span class="uk-margin-small-right "><i class="fa fa-eye"></i>
                                    <?php $views = choma_get_post_views(get_the_ID());
                                    if (choma_get_post_views(get_the_ID()) == 1) {
                                        printf(__('%d View', 'skinny_ninjah'), $views);
                                    } else {
                                        printf(__('%d views', 'skinny_ninjah'), $views);
                                    }
                                    ?></span>
                                <span class="post-comments"><i class="fa fa-comments"> <?php comments_number(0, 1, '%'); ?></i></span>
                            </div>
                            <div class="article-title">
                                <?php if (strlen(the_title('', '', FALSE)) > 16) {
                                    $title_short = substr(the_title('', '', FALSE), 0, 16);
                                    preg_match('/^(.*)\s/s', $title_short, $matches);
                                    if ($matches[1]) $title_short = $matches[1];
                                    $title_short = $title_short . ' ...';
                                } else {
                                    $title_short = the_title('', '', FALSE);
                                } ?>

                                <a class="the-title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <h4><?php the_title(); ?></h4>
                                </a>
                            </div>
                        </div>
                        </div>
                    <?php endforeach;

                    wp_reset_postdata();
                }
            }
            ?>
        </div>
        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
    </div>
    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
</div>
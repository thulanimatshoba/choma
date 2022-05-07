
<h2 class="widget-title uk-text-center uk-padding-small uk-margin-small-bottom"><?php _e( 'Featured Articles' ); ?> </h2>

<div class="uk-child-width-expand@s" uk-grid uk-scrollspy="cls: uk-animation-fade; target: > .category-article; delay: 500; repeat: false">
    <?php
    if (is_page()) {
        $cat = get_cat_ID('Health'); //use page title to get a category ID
        $posts = get_posts("cat=$cat&showposts=5");
        $c = 0;
        if ($posts) {
            foreach ($posts as $post) :
                setup_postdata($post);
                $c++;?>
                <div <?php ($c === 1 ? post_class('blog-item category-article uk-width-2-3@s featured-post') : post_class('category-article uk-width-1-3@s')); ?>>
                    <div class="article-featured-image">
                        <a href="<?php the_permalink(); ?>">
                            <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
                                the_post_thumbnail('featured-thumb',  array('class' => 'skinny-thumb'));
                            } else {
                                'no image dawg';//skinny_ninjah_placeholder_image();
                            } ?>
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
                                                    ?>
                                                </span>
                            <span class="post-comments"><i class="fa fa-comments"> <?php comments_number(0, 1, '%'); ?></i></span>
                        </div>

                        <div class="article-story-content">
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
                            <p><?php echo wp_trim_excerpt(); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach;
            wp_reset_postdata();
        }
    }
    ?>
</div>

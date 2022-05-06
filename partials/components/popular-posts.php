
<h2 class="widget-title uk-text-center uk-padding-small uk-margin-large-bottom"><?php _e( 'Featured Articles' ); ?> </h2>

<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: push">
    <ul class="uk-slideshow-items">
    <?php
    if (is_page()) {
        $cat = get_cat_ID('Fashion & Beauty'); //use page title to get a category ID
        $posts = get_posts("cat=$cat&showposts=4");
        $c = 0;
        if ($posts) {
            foreach ($posts as $post) :
                setup_postdata($post);
                $c++;?>
                <li <?php ($c === 1 ? post_class('blog-item category-article featured-post') : post_class('category-article')); ?>>
                    <div class="article-featured-image">
                        <a href="<?php the_permalink(); ?>">
                            <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
                                the_post_thumbnail('featured-thumb',  array('class' => 'skinny-thumb'));
                            } else {
                                'no image dawg';//skinny_ninjah_placeholder_image();
                            } ?>
                        </a>
                    </div>

                    <div class="bottom-block uk-padding-small uk-transition-slide-bottom">
                        <div class="uk-meta">
                            <?php
                            $categories = get_the_category();
                            if ( ! empty( $categories ) ) {
                                echo '<span class="cat" uk-slideshow-parallax="x: 100,-100">' . esc_html( $categories[0]->name ) . '</span>';
                            } ?>
                            <br>
                            <span class="uk-float-left uk-margin-small-right"><?= get_the_date('d. M. Y'); ?></span>
                            <span class="uk-margin-small-right"><i class="fa fa-eye"></i>
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
                </li>
            <?php endforeach;
            wp_reset_postdata();
        }
    }
    ?>
    </ul>
    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

</div>


<!--<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: push">-->
<!---->
<!--    <ul class="uk-slideshow-items">-->
<!--        <li>-->
<!--            <img src="images/photo.jpg" alt="" uk-cover>-->
<!--            <div class="uk-position-center uk-position-small uk-text-center">-->
<!--                <h2 uk-slideshow-parallax="x: 100,-100">Heading</h2>-->
<!--                <p uk-slideshow-parallax="x: 200,-200">Lorem ipsum dolor sit amet.</p>-->
<!--            </div>-->
<!--        </li>-->
<!--        <li>-->
<!--            <img src="images/dark.jpg" alt="" uk-cover>-->
<!--            <div class="uk-position-center uk-position-small uk-text-center">-->
<!--                <h2 uk-slideshow-parallax="x: 100,-100">Heading</h2>-->
<!--                <p uk-slideshow-parallax="x: 200,-200">Lorem ipsum dolor sit amet.</p>-->
<!--            </div>-->
<!--        </li>-->
<!--        <li>-->
<!--            <img src="images/light.jpg" alt="" uk-cover>-->
<!--            <div class="uk-position-center uk-position-small uk-text-center">-->
<!--                <h2 uk-slideshow-parallax="y: -50,0,0; opacity: 1,1,0">Heading</h2>-->
<!--                <p uk-slideshow-parallax="y: 50,0,0; opacity: 1,1,0">Lorem ipsum dolor sit amet.</p>-->
<!--            </div>-->
<!--        </li>-->
<!--    </ul>-->
<!---->
<!--    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>-->
<!--    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>-->
<!---->
<!--</div>-->

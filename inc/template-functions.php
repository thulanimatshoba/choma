<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package choma
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function choma_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'choma_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function choma_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'choma_pingback_header' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function choma_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'choma_content_width', 640 );
}
add_action( 'after_setup_theme', 'choma_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function choma_widgets_init() {
    register_sidebar(
        [
            'name'          => esc_html__( 'Home Page 1170x90 Ad', 'choma' ),
            'id'            => 'home-ad1',
            'description'   => esc_html__( 'Add widgets here.', 'choma' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]
    );

    register_sidebar(
        [
            'name'          => esc_html__( 'Sidebar', 'choma' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'choma' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]
    );

    register_sidebar(
        [
            'name'          => esc_html__( 'Footer Info', 'choma' ),
            'id'            => 'footer-info',
            'description'   => esc_html__( 'Add widgets here.', 'choma' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]
    );

    register_sidebar(
        [
            'name'          => esc_html__( 'Footer Navigation', 'choma' ),
            'id'            => 'footer-nav',
            'description'   => esc_html__( 'Add widgets here.', 'choma' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]
    );

    register_sidebar(
        [
            'name'          => esc_html__( 'Footer Contacts', 'choma' ),
            'id'            => 'footer-contacts',
            'description'   => esc_html__( 'Add widgets here.', 'choma' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]
    );

    register_sidebar(
        [
            'name'          => esc_html__( 'Footer Newsletter', 'choma' ),
            'id'            => 'footer-newsletter',
            'description'   => esc_html__( 'Add widgets here.', 'choma' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]
    );
}
add_action( 'widgets_init', 'choma_widgets_init' );


//Track Post Views
if (!function_exists('choma_get_post_views')) :
    function choma_get_post_views($postID)
    {
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if ($count == '') {
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
            return 0;
        }
        return $count;
    }
endif;


/**
 * Track Article Views
 */
if (!function_exists('choma_update_post_views')) :
    function choma_update_post_views($postID)
    {
        if (!current_user_can('administrator')) {
            $user_ip = $_SERVER['REMOTE_ADDR']; //retrieve the current IP address of the visitor
            $key = $user_ip . 'x' . $postID; //combine post ID & IP to form unique key
            $value = array($user_ip, $postID); // store post ID & IP as separate values (see note)
            $visited = get_transient($key); //get transient and store in variable

            //check to see if the Post ID/IP ($key) address is currently stored as a transient
            if (false === ($visited)) {
                //store the unique key, Post ID & IP address for 12 hours if it does not exist
                set_transient($key, $value, 60 * 60 * 12);

                // now run post views function
                $count_key = 'post_views_count';
                $count = get_post_meta($postID, $count_key, true);
                if ($count == '') {
                    $count = 0;
                    delete_post_meta($postID, $count_key);
                    add_post_meta($postID, $count_key, '0');
                } else {
                    $count++;
                    update_post_meta($postID, $count_key, $count);
                }
            }
        }
    }
endif;

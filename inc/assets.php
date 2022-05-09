<?php
/**
 * Enqueue scripts and styles.
 */
function choma_scripts() {
    wp_enqueue_style( 'choma-style', get_stylesheet_uri(), array(), CHOMA_VERSION );
    wp_enqueue_style('choma-uikit', get_template_directory_uri() . '/uikit.css', [], CHOMA_VERSION);

    wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_script( 'choma-navigation', get_template_directory_uri() . '/js/navigation.js', array(), CHOMA_VERSION, true );
    wp_enqueue_script( 'choma', get_template_directory_uri() . '/js/choma.js', array(), CHOMA_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'choma_scripts' );

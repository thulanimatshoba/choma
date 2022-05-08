<?php
/**
 * choma functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package choma
 */

if ( ! defined( 'CHOMA_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'CHOMA_VERSION', '1.0.0' );
}

require get_template_directory() . '/inc/theme-support.php';
require get_template_directory() . '/inc/assets.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
//if ( class_exists( 'WooCommerce' ) ) {
//	require get_template_directory() . '/inc/woocommerce.php';
//}

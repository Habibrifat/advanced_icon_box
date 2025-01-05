<?php
/**
 * Plugin Name: Advanced Icon Box
 * Description: Simple Advanced Icon Box widgets for Elementor.
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: ad_icon_box
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.24.0
 * Elementor Pro tested up to: 3.24.0
 */


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
function register_advanced_icon_box_widget( $widgets_manager ) {

    require_once( __DIR__ . '/widgets/advanced-icon-box-widget.php' );

    $widgets_manager->register( new \Advanced_Icon_Box_Widget() );

}
add_action( 'elementor/widgets/register', 'register_advanced_icon_box_widget' );



function register_advanced_icon_assets ($widgets_manager ) {

    wp_register_style( 'advanced-icon-box-css', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );
    wp_enqueue_style( 'advanced-icon-box-css');
    wp_register_script( 'advanced-icon-box-js', plugin_dir_url( __FILE__ ) . 'assets/JS/animation.js' );
    wp_enqueue_script( 'advanced-icon-box-js');

//    wp_register_script('lottie-player', 'https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.10.0/lottie.min.js', [], '5.10.0', true);
    wp_enqueue_script('lottie-web', 'https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.0/lottie.min.js', [], null, true);

    wp_register_script('lottie-player', 'https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.10.0/lottie.min.js', [], '5.10.0', true);

    // Register your custom initialization script
    wp_register_script(
        'ad-icon-box',
        plugins_url('assets/js/ad-icon-box.js', __FILE__), // Adjust path as necessary
        ['jquery', 'lottie-player'],
        '1.0.0',
        true
    );

}
add_action( 'elementor/widgets/register', 'register_advanced_icon_assets' );




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

}
add_action( 'elementor/widgets/register', 'register_advanced_icon_assets' );



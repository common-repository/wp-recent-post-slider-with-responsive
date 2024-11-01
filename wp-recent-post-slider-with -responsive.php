<?php
/**
 Plugin Name: WP Recent Post Slider with Responsive
 Plugin URL: https://profiles.wordpress.org/bhargavdholariya
 Description: Display wordpress Post on your website in slider, with four Different Designs.
 Text Domain: wp-recent-post-slider-with-responsive
 Domain Path: /languages/
 Description: Easy to add and display Wordpress Default Post Slider  
 Author: wp online help
 Version: 1.0
 Author URI: https://www.wponlinehelp.com/ 
  */

/**
 * Basic plugin definitions
 * 
 * @package WP Recent Post Slider with Responsive
 * @since 1.0.0
 */
if( !defined( 'WPRPSWR_VERSION' ) ) {
    define( 'WPRPSWR_VERSION', '1.0' ); // Version of plugin
}
if( !defined( 'WPRPSWR_DIR' ) ) {
    define( 'WPRPSWR_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( !defined( 'WPRPSWR_URL' ) ) {
    define( 'WPRPSWR_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}
if( !defined( 'WPRPSWR_POST_TYPE' ) ) {
    define( 'WPRPSWR_POST_TYPE', 'wpoh-post' ); // Plugin post type
}

add_action('plugins_loaded', 'wprpswr_load_textdomain');
function wprpswr_load_textdomain() {
	load_plugin_textdomain( 'wp-recent-post-slider-with-responsive', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
} 
// Function file
require_once( WPRPSWR_DIR . '/includes/wprpswr-function.php');

// Script Fils
require_once( WPRPSWR_DIR . '/includes/class-wprpswr-script.php');

// Shortcodes
require_once( WPRPSWR_DIR . '/includes/shortcodes/wprpswr-slider.php');

// How it work file, Load admin files
if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
    require_once( WPRPSWR_DIR . '/includes/admin/wprpswr-how-it-work.php');
}
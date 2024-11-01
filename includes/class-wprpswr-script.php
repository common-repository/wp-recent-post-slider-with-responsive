<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package WP Recent Post Slider with Responsive
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
class Wprpswr_Script {	
	function __construct() {		
		// Action to add style at front side
		add_action( 'wp_enqueue_scripts', array($this, 'wprpswr_front_style') );		
		// Action to add script at front side
		add_action( 'wp_enqueue_scripts', array($this, 'wprpswr_front_script') );		
	}
	/**
	 * Function to add style at front side
	 * 
	 * @package WP Recent Post Slider with Responsive
	 * @since 1.0.0
	 */
	function wprpswr_front_style() {		
		// Registring and enqueing slick slider css
		if( !wp_style_is( 'wpoh-slick-style', 'registered' ) ) {
			wp_register_style( 'wpoh-slick-style', WPRPSWR_URL.'assets/css/slick.css', array(), WPRPSWR_VERSION);
			wp_enqueue_style( 'wpoh-slick-style');
		}		
		// Registring and enqueing public css
		wp_register_style( 'wprpswr-public-style', WPRPSWR_URL.'assets/css/wprpswr-public-slider.css', array(), WPRPSWR_VERSION);
		wp_enqueue_style( 'wprpswr-public-style');
	}	
	/**
	 * Function to add script at front side
	 * 
	 * @package WP Recent Post Slider with Responsive
	 * @since 1.0.0
	 */
	function wprpswr_front_script() {		
		// Registring slick slider script
		if( !wp_script_is( 'wpoh-slick-jquery', 'registered' ) ) {
			wp_register_script( 'wpoh-slick-jquery', WPRPSWR_URL.'assets/js/slick.min.js', array('jquery'), WPRPSWR_VERSION, true );
		}		
		// Registring and enqueing public script
		wp_register_script( 'wprpswr-public-script', WPRPSWR_URL.'assets/js/wprpswr-public.js', array('jquery'), WPRPSWR_VERSION, true );
		wp_localize_script( 'wprpswr-public-script', 'Wprpswr', array(
																	'is_mobile' => (wp_is_mobile()) ? 1 : 0,
																	'is_rtl' 	=> (is_rtl()) 		? 1 : 0
																	));
	}	
}
$wprpswr_script = new Wprpswr_Script();
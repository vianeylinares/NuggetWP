<?php
/*
 * Plugin name: Businesses
 * Plugin URI: entuciudad.net
 * Description: Businesses
 * Author: ingeniousMktg
 * Version: 1.0.0
 * License: Open
 * 
 */

//Exit if accessed directly
if(!defined('ABSPATH')){
       exit;
}

include( plugin_dir_path( __FILE__ ) . 'backend/post-types.php' );
include( plugin_dir_path( __FILE__ ) . 'backend/sanitize.php' );
include( plugin_dir_path( __FILE__ ) . 'backend/business-options.php' );
include( plugin_dir_path( __FILE__ ) . 'backend/registers-display.php' );
include( plugin_dir_path( __FILE__ ) . 'frontend/subsite-home-content-display.php' );
include( plugin_dir_path( __FILE__ ) . 'frontend/rootsite-home-content-display.php' );


function business_backend_enqueue_styles_and_scripts(){

	// Added styles
    wp_enqueue_style( 'business-styles', plugins_url( 'backend/styles.css', __FILE__ ) );
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style( 'jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css' );
    //wp_enqueue_style( 'jquery-ui' );
    wp_enqueue_style( 'thickbox' );

    // Added js
    wp_enqueue_script( 'media-upload' );
    wp_enqueue_script( 'thickbox' );
	wp_enqueue_script( 'business-test-js',  plugins_url( 'backend/functions.js', __FILE__ ), false );
	wp_enqueue_script( 'color-picker-js', plugins_url( 'backend/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js' );
	wp_enqueue_script( 'jquery-ui-datepicker' );
	
}
add_action( 'admin_enqueue_scripts', 'business_backend_enqueue_styles_and_scripts' );


function business_add_page_options_tab(){
	if(network_site_url() != home_url() . "/"){
		add_menu_page('Business General Options', 'Negocio', 'manage_options', 'business-options-page', 'business_general_options');
		add_action( 'admin_init', 'register_business_options_settings' );
	}
}
add_action('admin_menu', 'business_add_page_options_tab');


function registers_add_page_options_tab(){

	$business_type = (get_option('business_type') === false)? "" : get_option('business_type') ;

		if($business_type != 'basic'){
			add_menu_page('Registros', 'Registros', 'manage_options', 'registers-options-page', 'register_options');
			//add_action( 'admin_init', 'registers_options_settings' );
		}
	
}
add_action( 'admin_menu', 'registers_add_page_options_tab' );
<?php
 
/*

Plugin Name: Insert Script In Headers And Footers

Description: a plugin to insert script in headers and footers

Author: Geek Web Solution

Version: 1.2

Author URI: http://geekwebsolution.com/

*/

if( !defined( 'ABSPATH' ) ) exit;

require_once( plugin_dir_path (__FILE__) .'functions.php' );

add_action('admin_menu', 'ishf_admin_menu_header_footer_script' );

add_action( 'admin_init', 'ishf_registerSettings' );

add_action( 'admin_enqueue_scripts', 'ishf_enqueue_styles_scripts_header_footer_script' );

add_action('wp_head', 'ishf_frontendHeaderScript',100);

add_action('wp_footer', 'ishf_frontendFooterScript',100);

register_activation_hook( __FILE__, 'ishf_plugin_active_header_footer_script' );



function ishf_plugin_active_header_footer_script(){
	
	 $header_script= ishf_get_option_header_script();
	 $footer_script= ishf_get_option_footer_script();
	 

	 if(empty($header_script))

	 {

		 update_option('insert_header_script_gk', $header_script);

	 }

	 if(empty($footer_script))

	 { 

		update_option('insert_footer_script_gk', $footer_script);

	 }

	
}

function ishf_registerSettings() {
		$plugin_data = get_plugin_data( __FILE__ );
		$plugin_name = $plugin_data['Name'];
		register_setting( $plugin_name, 'insert_header_script_gk', 'trim' );
		register_setting( $plugin_name, 'insert_footer_script_gk', 'trim' );
}


function ishf_frontendHeaderScript(){
	
	ishf_output('insert_header_script_gk');
}

function ishf_frontendFooterScript(){
	
	ishf_output('insert_footer_script_gk');
	
}

function ishf_admin_menu_header_footer_script(){
	
	add_options_page( 'Insert Script In Headers And Footers', 'Insert Script In Headers And Footers', 'manage_options', 'insert-script-in-header-and-footer-option', 'ishf_options_menu_header_footer_script');
}

function ishf_options_menu_header_footer_script(){
	
	if(!current_user_can('manage_options') ){
			
		wp_die( __('You do not have sufficient permissions to access this page.') );
		
	}
	
	include( plugin_dir_path( __FILE__ ) . 'options.php' );
}

function ishf_enqueue_styles_scripts_header_footer_script()

{

    if( is_admin() ) {              

        $css= plugins_url() . '/'.  basename(dirname(__FILE__)) . "/style.css";               

        wp_enqueue_style( 'main-header-footer-script-css', $css );

    }

}
?>
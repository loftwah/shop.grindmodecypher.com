<?php
/**
 * @author flatfull.com
 */

class Admin_Theme_Login{
	
	private $setting;

	function __construct($setting) {
		$this->setting = $setting;
		
		add_action( 'admin_screen_col_1', array( $this, 'admin_screen' ));
		if($this->setting->get_setting('login_disable')){
			return;
		}
		add_action( 'login_enqueue_scripts', array( $this, 'login_style' ), 99 );
		add_action( 'login_enqueue_scripts', array( $this, 'login_script' ), 1 );
		add_action( 'login_message', array( $this, 'login_message' ) );
		add_action( 'login_footer', array( $this, 'login_footer' ) );
		add_action( 'login_footer', array( $this, 'login_css' ) );
	}

	// login
	function login_style() {
		$this->setting->set_setting();
		add_filter( 'login_headerurl', array( $this, 'login_headerurl' ) );
		add_filter( 'login_headertext', array( $this, 'login_headertitle' ) );
		wp_enqueue_style( 'admin-theme-login', $this->setting->plugin_url.( "scss/scss.php?p=login.scss" ) ); 
	}

	function login_script() {
		wp_enqueue_script( 'form', $this->setting->plugin_url.( "assets/js/form.js" ), array('jquery'));
	}

	function login_headerurl() {
		return esc_url( trailingslashit( get_bloginfo( 'url' ) ) );
	}

	function login_headertitle() {
		return esc_attr( get_bloginfo( 'name' ) );
	}

	function login_message(){
		echo sprintf('<div class="login-subtitle">%s</div><div>', $this->setting->get_setting('login_subtitle') );
	}

	function login_footer(){
		echo sprintf('<div class="login-footer">%s</div></div>', $this->setting->get_setting('login_footer') );
	}

	function login_css(){
		$css = '';

		$bg_color = $this->setting->get_setting('login_bg_color');
		if( $bg_color ) { $css .= sprintf('html{background-color: %s}', $bg_color); }

		$bg_img = $this->setting->get_setting('login_bg_img');
		if( $bg_img ) { $css .= sprintf('html{background-image: url( %s )}', $bg_img); }

		$text_color = $this->setting->get_setting('login_text_color');
		if( $text_color ) { $css .= sprintf('body{color: %s}', $text_color); }

		$logo = $this->setting->get_setting('login_logo');
		if( $logo ) { $css .= sprintf('body.login div#login h1{background-image: url( %s )} body.login div#login h1 a {background-image: none;}', $logo); }

		echo sprintf('<style type="text/css">%s</style>', $css.$this->setting->get_setting('login_css'));
	}

	function admin_screen() {
		include 'tpl.php';
	}
}

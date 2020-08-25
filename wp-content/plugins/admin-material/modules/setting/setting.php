<?php
/**
 * @author flatfull.com
 */

class Admin_Theme_Setting{

	public   $menus
			,$submenus
			,$setting
			,$setting_name
			,$page_title
			,$menu_title
			,$menu_slug
			,$plugin_url
			,$plugin_path
			,$plugin_file
			,$plugin_post  = 'options.php'
			,$file_menu    = '/scss/scss/_variables_menu.scss'
			,$file_bar     = '/scss/scss/_variables_bar.scss'
			,$file__menu   = '/scss/scss/_variables_menu_%s.scss'
			,$file__bar    = '/scss/scss/_variables_bar_%s.scss'
			;
	function __construct($arg) {
		foreach ($arg as $k => $value) {
		    $this->{$k} = $value;
		}

		$this->plugin_url = plugins_url('', $this->plugin_file ).'/';
		$this->plugin_path = plugin_dir_path( $this->plugin_file );

		$this->set_setting();
		
		add_action( 'admin_menu', array( $this, 'add_menu' ) );
		add_action( 'admin_init', array( $this, 'register_setting' ) );
		add_action( 'admin_init', array( $this, 'set_setting' ) );
		add_action( 'admin_init', array( $this, 'process_setting_import' ) );
		add_action( 'admin_init', array( $this, 'process_setting_export' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );

		add_filter( 'gettext_with_context', array( $this, 'disable_open_sans' ), 888, 4 );
		register_deactivation_hook( $this->plugin_file, array($this, "deactivation"));
	}

	// add plugin to setting menu
	function add_menu() {
		if($this->active){
			$page = add_submenu_page( 'themes.php', $this->page_title, $this->menu_title, 'switch_themes', $this->menu_slug, array( $this, 'admin_screen' ) );
			add_action('load-'.$page, array( $this, 'admin_help' ));
		}
	}

	// register
	function register_setting() {
		register_setting( $this->setting_name.'_group', $this->setting_name );
		add_filter( 'pre_update_option_'.$this->setting_name, array($this, 'update_variables'), 10, 2 );
	}

	function set_setting(){
		$this->active = true;
		if ( is_multisite() ) {
			$this->setting = get_blog_option(1, $this->setting_name );
			if(get_current_blog_id() != 1){
				if($this->get_setting('network') == true){
					$this->active = false;
				}else{
					$this->setting = get_option( $this->setting_name );
				}
			}
		}else{
			$this->setting = get_option( $this->setting_name );
		}
	}

	// get setting
	public function get_setting($arg){
		$settings = isset($_SESSION[$this->setting_name]) ? $_SESSION[$this->setting_name] : $this->setting;
	    foreach (func_get_args() as $arg) {
	        if (!is_array($settings) || !is_scalar($arg) || !isset($settings[$arg])) {
	            return NULL;
	        }
	        $settings = $settings[$arg];
	    }
	    return $settings;
	}

	function update_variables( $new_value, $old_value ) {
		if( isset($new_value['use-default-color']) ){
			$this->use_default_style($new_value['default-color']);
		}else{
			// menu
		    $output = "";
		    if(isset($new_value['color'])){
			    foreach ( $new_value['color'] as $variable => $vvalue ) {
			    	if($vvalue != ''){
			        	$output .= '$' . $variable . ': ' . $vvalue . ';' . PHP_EOL;
			        }
			    }
			    file_put_contents($this->plugin_path.$this->file_menu, $output, FILE_TEXT );
		    }
		  	// bar
			$output = "";
			if(isset($new_value['bar'])){
			    foreach ( $new_value['bar'] as $variable => $vvalue ) {
			    	if($vvalue != ''){
			        	$output .= '$' . $variable . ': ' . $vvalue . ';' . PHP_EOL;
			        }
			    }
			}
		    file_put_contents($this->plugin_path.$this->file_bar, $output, FILE_TEXT );
		}
		return $new_value;
	}

	function use_default_style($style) {
		$file___menu = $this->plugin_path.sprintf($this->file__menu, $style);
		$file___bar  = $this->plugin_path.sprintf($this->file__bar,  $style);
		if(file_exists($file___menu)){
		    file_put_contents($this->plugin_path.$this->file_menu, file_get_contents($file___menu), FILE_TEXT );
		}
		if(file_exists($file___bar)){
		    file_put_contents($this->plugin_path.$this->file_bar, file_get_contents($file___bar), FILE_TEXT );
		}
	}

	/**
	 * Process a setting export to a json file
	 */
	function process_setting_export() {
		if( empty( $_POST['setting_action'] ) || 'export_setting' != $_POST['setting_action'] )
			return;
		if( ! wp_verify_nonce( $_POST['setting_export_nonce'], 'setting_export_nonce' ) )
			return;
		if( ! current_user_can( 'manage_options' ) )
			return;
		
		$setting = get_option( $this->setting_name );
		ignore_user_abort( true );
		nocache_headers();
		header( 'Content-Type: application/json; charset=utf-8' );
		header( 'Content-Disposition: attachment; filename=admin-theme-setting-export-' . date( 'm-d-Y' ) . '.json' );
		header( "Expires: 0" );
		echo json_encode( $setting );
		exit;
	}

	/**
	 * Process a setting import from a json file
	 */
	function process_setting_import() {
		if( empty( $_POST['setting_action'] ) || 'import_setting' != $_POST['setting_action'] )
			return;
		if( ! wp_verify_nonce( $_POST['setting_import_nonce'], 'setting_import_nonce' ) )
			return;
		if( ! current_user_can( 'manage_options' ) )
			return;

		$import_file = $_FILES['import_file']['tmp_name'];
		if( empty( $import_file ) ) {
			wp_die( __( 'Please upload a file to import' ) );
		}
		// Retrieve the setting from the file and convert the json object to an array.
		$setting = (array) json_decode( file_get_contents( $import_file ), true );
		update_option( $this->setting_name, $setting );
		wp_safe_redirect( admin_url( 'admin.php?page='.$this->menu_slug ) ); exit;
	}

	// help
	function admin_help() {
		$current_screen = get_current_screen();

		// Overview
		$current_screen->add_help_tab(
			array(
				'id'		=> 'overview',
				'title'		=> __( 'Overview', 'AT' ),
				'content'	=>
					'<p><strong>' . __( 'Admin Theme by flatfull.com', 'AT' ) . '</strong></p>' .
					'<p>' . __( 'Admin Theme changes your wordpress admin appearance', 'AT' ) . '</p>' .
					'<p>' . __( 'Have fun.', 'AT' ) . '</p>',
			)
		);

		// Help Sidebar
		$current_screen->set_help_sidebar(
			'<p><strong>' . __( 'For more information:', 'AT' ) . '</strong></p>' .
			'<p><a href="http://flatfull.com/" target="_blank">'     . __( 'FAQ',     'AT' ) . '</a></p>' .
			'<p></p>'
		);
	}

	function admin_scripts() {
		wp_enqueue_media();
		wp_enqueue_style( 'wp-color-picker');
		wp_enqueue_script('wp-color-picker');

		wp_enqueue_style( 'admin-theme-style', $this->plugin_url.( "assets/css/style.css" ) );
		wp_enqueue_script( 'admin-theme-main', $this->plugin_url.( "assets/js/main.js" ) );
	}

	// deactivation
	function deactivation() {
		delete_option( $this->setting_name );
	}

	// disable the google webfonts api
	function disable_open_sans( $translations, $text, $context, $domain ) {
		if ( 'Open Sans font: on or off' == $context && 'on' == $text ) {
			$translations = 'off';
		}
		return $translations;
	}

	function admin_screen() {
		do_action('admin_screen_start');
		include 'tpl.php';
		do_action('admin_screen_end');
	}
}

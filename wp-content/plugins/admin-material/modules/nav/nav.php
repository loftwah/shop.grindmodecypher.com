<?php
/**
 * @author flatfull.com
 */

class Admin_Theme_Nav{

	private $setting
			,$menu
			,$submenu
			,$nav
			,$subnav
			;

	function __construct($setting) {
		$this->setting = $setting;
		add_action( 'admin_bar_menu', array( $this, 'admin_bar'), 999 );
		add_filter( 'parent_file', array( $this, 'admin_menu' ), 999 );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
		add_filter( 'admin_body_class', array( $this, 'add_admin_body_class' ) );

		add_action( 'admin_screen_col_2', array( $this, 'admin_screen' ) );
	}

	function admin_menu() {
		global $menu;
		global $submenu;

		if(empty($menu)) return;

		$this->nav    = $this->setting->get_setting('menu');
		$this->subnav = $this->setting->get_setting('submenu');

		$i = 0;
		foreach ($menu as $k=>&$v){
			$v[10] = $i;
			$i++;
		}

		foreach ($submenu as $k=>&$v){
			$i = 0;
			foreach ($v as $key=>&$val){
				$val[10] = $i;
				$i++;
			}
			usort($v, array($this, 'sort_submenu'));
		}
		
		usort($menu, array($this, 'sort_menu'));

		$this->menus = $this->array_copy($menu);
		$this->submenus = $this->array_copy($submenu);
		
		// update menu
		end( $menu );
		
		foreach ($menu as $k=>&$v){
			$id = $this->get_slug($v);
			if($id[0] != NULL && isset( $this->nav[$id[0]] )){
				// hide
				if( isset($this->nav[$id[0]]['hide']) && $this->nav[$id[0]]['hide'] ){
					unset($menu[$k]);
				}else{
					// title
					if( isset($this->nav[$id[0]]['title']) && $this->nav[$id[0]]['title'] != ''){
						$v[0] = $this->nav[$id[0]]['title']. ( isset($id[2]) ? ' <span '.$id[2] : '' );
					}

					// icon
					if( isset( $this->nav[$id[0]]['icon'] ) &&  $this->nav[$id[0]]['icon'] != ''){
						$v[6] = $this->nav[$id[0]]['icon'];
					}

					// update the submenu
					if( isset($submenu[$v[2]]) ){
						foreach ($submenu[$v[2]] as $key=>&$val){
							$sid = $this->get_slug($val);

							if($sid[0] != NULL && isset( $this->subnav[$sid[0]]['title'] ) && $this->subnav[$sid[0]]['title'] !=''){
								$val[0] = $this->subnav[$sid[0]]['title']. ( isset($sid[2]) ? ' <span '.$sid[2] : '' );
							}
							if( isset($this->subnav[$sid[0]]['hide']) && $this->subnav[$sid[0]]['hide'] != ''){						
								unset( $submenu[$v[2]][$key] );
							}
						}
					}
				}
			}
		}
	}

	// sort menu
	function sort_menu($a, $b) {
		$m = $this->get_slug($a);
		$n = $this->get_slug($b);
		$i = isset( $this->nav[$m[0]]['index'] ) && $this->nav[$m[0]]['index'] != '' ? $this->nav[$m[0]]['index'] : $a[10];
		$j = isset( $this->nav[$n[0]]['index'] ) && $this->nav[$n[0]]['index'] != '' ? $this->nav[$n[0]]['index'] : $b[10];
	    
	    if ($i == $j) {
	        return 0;
	    }
	    return ($i < $j) ? -1 : 1;
	}

	// sort submenu
	function sort_submenu($a, $b) {
		$m = $this->get_slug($a);
		$n = $this->get_slug($b);
		$i = isset( $this->subnav[$m[0]]['index'] ) && $this->subnav[$m[0]]['index'] != '' ? $this->subnav[$m[0]]['index'] : $a[10];
		$j = isset( $this->subnav[$n[0]]['index'] ) && $this->subnav[$n[0]]['index'] != '' ? $this->subnav[$n[0]]['index'] : $b[10];
	    
	    if ($i == $j) {
	        return 0;
	    }
	    return ($i < $j) ? -1 : 1;
	}

	// get id
	function get_slug($s){
		$c = explode(' <span', $s[0]);
		return array(strtolower( str_replace( ' ', '_', $s[2] )), $c[0], isset($c[1]) ? $c[1] : NULL) ;
	}

	// admin bar
	function admin_bar(){
		global $wp_admin_bar;

		$all_toolbar_nodes = $wp_admin_bar->get_nodes();
		$site = array();
		foreach ( $all_toolbar_nodes as $key=>$node ) {
			$args = $node;
			if($args->id == "site-name" || $args->id == "visit-site"){
				$logo = $this->setting->get_setting('bar_logo') ? sprintf('<img src="%s">', $this->setting->get_setting('bar_logo')) : '';
				$hide = $this->setting->get_setting('bar_name_hide') ? "hide" : "";
				$name = $this->setting->get_setting('bar_name') ? $this->setting->get_setting('bar_name') : $args->title;
				$args->title = sprintf('%s <span class="%s">%s</span>', $logo, $hide, $name);				
				$this->setting->get_setting('bar_name_link') && ($args->href = $this->setting->get_setting('bar_name_link'));
			}
			if($args->id == "my-sites"){
				$site = $node;
			}
			// update the Toolbar node
			$wp_admin_bar->add_node( $args );
		}
		// remove the wordpress logo
		$wp_admin_bar->remove_node( 'wp-logo' );
		$wp_admin_bar->remove_node( 'view-site' );

		$wp_admin_bar->remove_node( 'my-sites' );
		$wp_admin_bar->add_node( $site );

		if($this->setting->get_setting('bar_updates_hide')){
				$wp_admin_bar->remove_node('updates');
		}
		if($this->setting->get_setting('bar_comments_hide')){
				$wp_admin_bar->remove_node('comments');
		}
		if($this->setting->get_setting('bar_new_hide')){
				$wp_admin_bar->remove_node('new-content');
		}
		if($this->setting->get_setting('bar_site_hide')){
				$wp_admin_bar->remove_node('my-sites');
		}
	}

	function array_copy($arr) {
	    $newArray = array();
	    foreach($arr as $key => $value) {
	        if(is_array($value)) $newArray[$key] = $this->array_copy($value);
	        else if(is_object($value)) $newArray[$key] = clone $value;
	        else $newArray[$key] = $value;
	    }
	    return $newArray;
	}

	function add_admin_body_class( $classes ) {
		$class = '';
		if( $this->setting->get_setting('menu_collapse') ) {
			$class = ' folded';
		}

		if( $this->setting->get_setting('menu_collapse_hide') ) {
			$class .= ' hide-collapse-link';
		}

		if( $this->setting->get_setting('menu_h') ) {
			$class .= ' admin-menu-h';
		}

	    return $classes.$class;
	}

	function admin_scripts() {
		wp_enqueue_script(array('jquery-ui-sortable'));

		wp_enqueue_script( 'admin-theme-dropdown', $this->setting->plugin_url.( "assets/js/dropdown.js" ) );
		wp_enqueue_script( 'admin-theme-wavejs', $this->setting->plugin_url.( "assets/js/waves/waves.min.js" ) );
		
		wp_enqueue_style( 'admin-theme-icons', $this->setting->plugin_url.( "assets/fonts/icons/icon.css" ) );
		
		wp_enqueue_style( 'admin-theme-font', $this->setting->plugin_url.( "assets/fonts/roboto/font.css" ) );
		
		wp_enqueue_style( 'admin-theme-admin', $this->setting->plugin_url.( "scss/scss.php?p=admin.scss" ) );
		
		wp_enqueue_style( 'admin-theme-menu', $this->setting->plugin_url.( "scss/scss.php?p=_admin_menu.scss" ) );
		
		wp_enqueue_style( 'admin-theme-menu-h', $this->setting->plugin_url.( "scss/scss.php?p=_admin_menu_h.scss" ) );
		
		wp_enqueue_style( 'admin-theme-bar', $this->setting->plugin_url.( "scss/scss.php?p=_admin_bar.scss" ) );
		
		wp_enqueue_style( 'admin-theme-theme', $this->setting->plugin_url.( "scss/scss.php?p=theme.scss" ) );
		
		wp_enqueue_style( 'admin-theme-wave', $this->setting->plugin_url.( "assets/js/waves/waves.min.css" ) );
		
	}

	function admin_screen() {
		include 'tpl.php';
	}

}

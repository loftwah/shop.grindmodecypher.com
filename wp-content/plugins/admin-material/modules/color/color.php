<?php
/**
 * @author flatfull.com
 */

class Admin_Theme_Color{

	private $setting;

	function __construct($setting) {
		$this->setting = $setting;
		add_action( 'admin_screen_col_1', array( $this, 'admin_screen' ));
		remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
	}

	function admin_screen() {
		include 'tpl.php';
	}
}

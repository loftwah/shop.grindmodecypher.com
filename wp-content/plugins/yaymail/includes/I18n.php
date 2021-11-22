<?php
namespace YayMail;

defined( 'ABSPATH' ) || exit;
/**
 * I18n Logic
 */
class I18n {

	protected static $instance = null;

	public static function getInstance() {
		if ( null == self::$instance ) {
			self::$instance = new self();
			self::$instance->doHooks();
		}

		return self::$instance;
	}

	private function doHooks() {
		add_action( 'plugins_loaded', array( $this, 'loadPluginTextdomain' ) );
	}

	private function __construct() {}

	public function loadPluginTextdomain() {
		load_plugin_textdomain(
			'yaymail',
			false,
			YAYMAIL_PLUGIN_URL . 'i18n/languages/'
		);
	}
}

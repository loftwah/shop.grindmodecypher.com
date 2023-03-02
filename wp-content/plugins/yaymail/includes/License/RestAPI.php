<?php

namespace YayMail\License;

use YayMail\License\LicensingPlugin;
use YayMail\License\CorePlugin;

class RestAPI {
	public function __construct() {
		add_action( 'rest_api_init', array( $this, 'init_rest_api' ) );
	}

	public function init_rest_api() {
		register_rest_route(
			CorePlugin::get( 'slug' ) . '-license/v1',
			'/license/activate',
			array(
				'methods'             => array( \WP_REST_Server::CREATABLE ),
				'callback'            => array( $this, 'activate_license' ),
				'permission_callback' => array( $this, 'permission_callback' ),
			)
		);
		register_rest_route(
			CorePlugin::get( 'slug' ) . '-license/v1',
			'/license/update',
			array(
				'methods'             => array( \WP_REST_Server::CREATABLE ),
				'callback'            => array( $this, 'update_license' ),
				'permission_callback' => array( $this, 'permission_callback' ),
			)
		);
		register_rest_route(
			CorePlugin::get( 'slug' ) . '-license/v1',
			'/license/delete',
			array(
				'methods'             => array( \WP_REST_Server::CREATABLE ),
				'callback'            => array( $this, 'remove_license' ),
				'permission_callback' => array( $this, 'permission_callback' ),
			)
		);

	}

	public function activate_license( $request_data ) {
		$params      = $request_data->get_params();
		$plugin_slug = $params['plugin'];
		$license_key = $params['license_key'];

		$licensing_plugin  = new LicensingPlugin( $plugin_slug );
		$license           = $licensing_plugin->get_license();
		$activate_response = $license->activate( $license_key );

		$return_result['success'] = $activate_response['success'];
		$return_result['name']    = $licensing_plugin->get_option( 'name' );
		$return_result['slug']    = $plugin_slug;
		if ( $activate_response['success'] ) {
			$return_result['formatted_license_key'] = $license->format_license_key();
			if ( 'lifetime' === $activate_response['expires'] ) {
				$return_result['expires'] = 'Lifetime';
			} else {
				$return_result['expires'] = gmdate( 'F j, Y H:i:s', strtotime( $activate_response['expires'] ) );
			}

			$return_result['plugin_url']  = $licensing_plugin->get_option( 'url' );
			$return_result['renewal_url'] = $license->get_renewal_url();
		} else {
			$return_result['message'] = LicenseAPI::get_error_message( $activate_response['message'] );
		}
		return new \WP_REST_Response( $return_result );
	}

	public function update_license( $request_data ) {
		$params      = $request_data->get_params();
		$plugin_slug = $params['plugin'];

		$licensing_plugin         = new LicensingPlugin( $plugin_slug );
		$license                  = $licensing_plugin->get_license();
		$update_response          = $license->update();
		$return_result['success'] = $update_response['success'];
		$return_result['name']    = $licensing_plugin->get_option( 'name' );
		$return_result['slug']    = $plugin_slug;
		if ( $update_response['success'] ) {
			$return_result['formatted_license_key'] = $license->format_license_key();
			if ( 'lifetime' === $update_response['expires'] ) {
				$return_result['expires'] = 'Lifetime';
			} else {
				$return_result['expires'] = gmdate( 'F j, Y H:i:s', strtotime( $update_response['expires'] ) );
			}

			$return_result['plugin_url']  = $licensing_plugin->get_option( 'url' );
			$return_result['renewal_url'] = $license->get_renewal_url();
			$return_result['is_expired']  = $license->is_expired();
		}
		return new \WP_REST_Response( $return_result );
	}
	public function remove_license( $request_data ) {
		$params      = $request_data->get_params();
		$plugin_slug = $params['plugin'];

		$licensing_plugin = new LicensingPlugin( $plugin_slug );
		$license          = $licensing_plugin->get_license();
		$license->remove();
		$return_result = array(
			'slug' => $plugin_slug,
			'name' => $licensing_plugin->get_option( 'name' ),
		);
		return new \WP_REST_Response( $return_result );
	}

	public function permission_callback() {
		return true;
	}
}

<?php

namespace YayMail\MailBuilder;

use YayMail\Helper\Helper;
use YayMail\Page\Source\CustomPostType;
use YayMail\Page\Source\UpdateElement;
use YayMail\Templates\Templates;
use YayMail\Helper\WooLatepoint;

defined( 'ABSPATH' ) || exit;
global $woocommerce, $wpdb, $current_user, $order;

class Shortcodes {

	protected static $instance = null;
	public $order_id           = false;

	public $order;
	public $sent_to_admin = false;
	public $order_data;
	public $template         = false;
	public $customer_note    = false;
	public $shipping_address = null;
	public $billing_address  = null;
	public $preview_mail     = false;
	public $args_email       = array();

	// public $array_content_template = false;
	public $shortcodes_lists;
	public static function getInstance() {
		if ( null == self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function __construct( $template = false, $checkOrder = '', $preview_mail = true ) {
		$this->preview_mail = $preview_mail;
		if ( $template ) {
			$this->template = $template;
			if ( 'sampleOrder' === $checkOrder ) {
				$this->shortCodesOrderSample();
			} else {
				$this->shortCodesOrderDefined();
			}
			// style css
			add_filter( 'woocommerce_email_styles', array( $this, 'customCss' ) );

			add_filter( 'safe_style_css', array( $this, 'filter_safe_style_css' ), 10, 1 );

			// Order Details
			$order_details_list = array(
				'items_downloadable_title',
				'items_downloadable_product',
				'items_border',
				'items',
				'items_products_quantity_price',
				'order_date',
				'order_fee',
				'order_id',
				'order_link',
				'order_link_string',
				'order_number',
				'order_refund',
				'order_sub_total',
				'order_discount',
				'order_total',
				'order_total_numbers',
				'orders_count',
				'quantity_count',
				'orders_count_double',
				'order_tn',
				'items_border_before',
				'items_border_after',
				'items_border_title',
				'items_border_content',
				'items_downloadable_product',
				'items_downloadable_title',
				'get_heading',
				'woocommerce_email_order_meta',
				'woocommerce_email_order_details',
				'woocommerce_email_before_order_table',
				'woocommerce_email_after_order_table',
			);

			// Payments
			$payments_list = array(
				'order_payment_method',
				'order_payment_url',
				'order_payment_url_string',
				'payment_instruction',
				'payment_method',
				'transaction_id',
			);

			// Shippings
			$shippings_list = array(
				'order_shipping',
				'shipping_address',
				'shipping_address_1',
				'shipping_address_2',
				'shipping_city',
				'shipping_company',
				'shipping_country',
				'shipping_first_name',
				'shipping_last_name',
				'shipping_method',
				'shipping_postcode',
				'shipping_state',
				'shipping_phone',
			);

			// Billings
			$billings_list = array(
				'billing_address',
				'billing_address_1',
				'billing_address_2',
				'billing_city',
				'billing_company',
				'billing_country',
				'billing_email',
				'billing_first_name',
				'billing_last_name',
				'billing_phone',
				'billing_postcode',
				'billing_state',
			);

			// Reset Password
			$reset_password_list = array( 'password_reset_url', 'password_reset_url_string', 'wp_password_reset_url' );

			// New Users
			$new_users_list = array( 'user_new_password', 'user_activation_link', 'set_password_url_string' );

			// General
			$general_list = array(
				'customer_note',
				'customer_notes',
				'customer_provided_note',
				'site_name',
				'site_url',
				'site_url_string',
				'user_email',
				'user_id',
				'user_name',
				'customer_username',
				'customer_roles',
				'additional_content',
				'customer_name',
				'customer_first_name',
				'customer_last_name',
				'view_order_url',
				'view_order_url_string',
				'billing_shipping_address',
				'domain',
				'user_account_url',
				'user_account_url_string',
				//new
				'billing_shipping_address_title',
				'billing_shipping_address_content',
				'check_billing_shipping_address',
				'order_coupon_codes',

			);
			//WooCommerce for LatePoint
			$woo_latepoint = array(
				'woo_latepoint_booking_detail',
				'woo_latepoint_calendar_start_date',
				'woo_latepoint_selected_total_attendees',
				'woo_latepoint_caption',
				'woo_latepoint_bg_color',
				'woo_latepoint_text_color',
				'woo_latepoint_font_size',
				'woo_latepoint_border',
				'woo_latepoint_border_radius',
				'woo_latepoint_margin',
				'woo_latepoint_padding',
				'woo_latepoint_css',
				'woo_latepoint_show_locations',
				'woo_latepoint_show_agents',
				'woo_latepoint_show_services',
				'woo_latepoint_show_service_categories',
				'woo_latepoint_selected_location',
				'woo_latepoint_selected_agent',
				'woo_latepoint_selected_service',
				'woo_latepoint_selected_service_category',
				'woo_latepoint_selected_duration',
				'woo_latepoint_hide_side_panel',
				'woo_latepoint_hide_summary',
			);

			// Additional Order Meta.
			$order = CustomPostType::getListOrders();

			/* Define Shortcodes */
			$shortcodes_lists     = array();
			$arrShortcodeCustoms  = array();
			$shortcode            = array();
			$yaymail_informations = Helper::inforShortcode( '', $template, array() );
			$shortcodeCustom      = array_keys( apply_filters( 'yaymail_customs_shortcode', $shortcode, $yaymail_informations, $this->args_email ) );

			if ( ! empty( $shortcodeCustom ) ) {
				foreach ( $shortcodeCustom as $item ) {
					array_push( $arrShortcodeCustoms, str_replace( array( '[', ']' ), '', $item ) );
				}
				$shortcodes_lists = array_merge( $shortcodes_lists, $arrShortcodeCustoms );
			}

			$shortcodes_lists       = array_merge( $shortcodes_lists, apply_filters( 'yaymail_shortcodes', $shortcodes_lists ) );
			$shortcodes_lists       = array_merge( $shortcodes_lists, $order_details_list );
			$shortcodes_lists       = array_merge( $shortcodes_lists, $payments_list );
			$shortcodes_lists       = array_merge( $shortcodes_lists, $shippings_list );
			$shortcodes_lists       = array_merge( $shortcodes_lists, $billings_list );
			$shortcodes_lists       = array_merge( $shortcodes_lists, $reset_password_list );
			$shortcodes_lists       = array_merge( $shortcodes_lists, $new_users_list );
			$shortcodes_lists       = array_merge( $shortcodes_lists, $general_list );
			$shortcodes_lists       = array_merge( $shortcodes_lists, $woo_latepoint );
			$this->shortcodes_lists = $shortcodes_lists;
			foreach ( $this->shortcodes_lists as $key => $shortcode_name ) {
				if ( 'woocommerce_email_before_order_table' == $shortcode_name || 'woocommerce_email_after_order_table' == $shortcode_name || 'woocommerce_email_order_details' == $shortcode_name || 'woocommerce_email_order_meta' == $shortcode_name ) {
					$function_name = $this->parseShortCodeToFunctionName( 'woocomme' . $shortcode_name );
					if ( method_exists( $this, $function_name ) ) {
						add_shortcode(
							$shortcode_name,
							function ( $atts, $content, $tag ) {
								$function_name = $this->parseShortCodeToFunctionName( 'woocomme' . $tag );
								return $this->$function_name( $atts, $this->order, $this->sent_to_admin, $this->args_email );
							}
						);
					}
				} else {
					$function_name = $this->parseShortCodeToFunctionName( 'yaymail_' . $shortcode_name );
					if ( method_exists( $this, $function_name ) || method_exists( WooLatepoint::class, $function_name ) ) {
						if ( str_contains( $shortcode_name, 'woo_latepoint' ) ) {
							add_shortcode(
								'yaymail_' . $shortcode_name,
								function ( $atts, $content, $tag ) {
									$function_name = $this->parseShortCodeToFunctionName( $tag );
									return WooLatepoint::$function_name( $atts, $this->order, $this->sent_to_admin, $this->args_email );
								}
							);
						} else {
							add_shortcode(
								'yaymail_' . $shortcode_name,
								function ( $atts, $content, $tag ) {
									$function_name = $this->parseShortCodeToFunctionName( $tag );
									return $this->$function_name( $atts, $this->order, $this->sent_to_admin, $this->args_email );
								}
							);
						}
					} elseif ( strpos( $shortcode_name, 'addon' ) !== false || strpos( $shortcode_name, 'custom_shortcode' ) !== false ) {
						add_shortcode(
							$shortcode_name,
							function ( $atts, $content, $tag ) {
								return $this->order_data[ '[' . $tag . ']' ];
							}
						);
					} else {
						add_shortcode( 'yaymail_' . $shortcode_name, array( $this, 'shortcodeCallBack' ) );
					}
				}
			}
		}
	}

	public function parseShortCodeToFunctionName( $shortcode_name ) {
		$function_name = substr( $shortcode_name, 8 );
		$offset        = 0;
		while ( false !== strpos( $function_name, '_', $offset ) ) {
			$position                       = strpos( $function_name, '_', $offset );
			$function_name[ $position + 1 ] = strtoupper( $function_name[ $position + 1 ] );
			$offset                         = $position + 1;
		}
		$function_name = str_replace( '_', '', $function_name );
		return $function_name;
	}

	public function applyCSSFormat( $defaultsCss = '' ) {
		$templateEmail = \YayMail\Templates\Templates::getInstance();
		$css           = $templateEmail::getCssFortmat();
		$cssDirection  = '';
		$cssDirection .= 'td{direction: rtl}';
		$cssDirection .= 'td, th, td{text-align:right;}';

		$css .= get_option( 'yaymail_direction' ) && get_option( 'yaymail_direction' ) === 'rtl' ? $cssDirection : '';
		$css .= $defaultsCss;
		$css .= '.td { color: inherit; }';
		return $css;
	}
	public function customCss( $css = '' ) {
		return $this->applyCSSFormat( $css );
	}

	public function filter_safe_style_css( $array ) {
		if ( function_exists( 'is_plugin_active' ) && is_plugin_active( 'wp-social-reviews/wp-social-reviews.php' ) ) {
			$style_css = array(
				'background',
				'background-color',
				'border',
				'border-width',
				'border-color',
				'border-style',
				'border-right',
				'border-right-color',
				'border-right-style',
				'border-right-width',
				'border-bottom',
				'border-bottom-color',
				'border-bottom-style',
				'border-bottom-width',
				'border-left',
				'border-left-color',
				'border-left-style',
				'border-left-width',
				'border-top',
				'border-top-color',
				'border-top-style',
				'border-top-width',
				'border-spacing',
				'border-collapse',
				'caption-side',
				'color',
				'font',
				'font-family',
				'font-size',
				'font-style',
				'font-variant',
				'font-weight',
				'letter-spacing',
				'line-height',
				'text-decoration',
				'text-indent',
				'text-align',
				'height',
				'min-height',
				'max-height',
				'width',
				'min-width',
				'max-width',
				'margin',
				'margin-right',
				'margin-bottom',
				'margin-left',
				'margin-top',
				'padding',
				'padding-right',
				'padding-bottom',
				'padding-left',
				'padding-top',
				'clear',
				'cursor',
				'direction',
				'float',
				'overflow',
				'vertical-align',
				'list-style-type',
			);
			return $style_css;
		} else {
			return $array;
		}

	}

	public function setOrderId( $order_id = '', $sent_to_admin = '', $args = '' ) {
		$this->order_id      = $order_id;
		$this->args_email    = $args;
		$this->sent_to_admin = $sent_to_admin;
		// Additional Order Meta.
		$order_meta_list = array();
		if ( ! empty( $this->order_id ) ) {
			$order_metaArr = get_post_meta( $this->order_id );
			if ( is_array( $order_metaArr ) && count( $order_metaArr ) > 0 ) {
				foreach ( $order_metaArr as $k => $v ) {
					$nameField         = str_replace( ' ', '_', trim( $k ) );
					$order_meta_list[] = 'order_meta:' . $nameField;
				}
			}
		}
		$shortcodes_lists      = array();
		$shortcodes_lists      = array_merge( $shortcodes_lists, $order_meta_list );
		$order                 = wc_get_order( $order_id );
		$shortcode_order_taxes = array();
		if ( ! empty( $order ) ) {
			foreach ( $order->get_items( 'tax' ) as $item_id => $item_tax ) {
				$tax_rate_id             = $item_tax->get_rate_id();
				$shortcode_order_taxes[] = 'order_taxes_' . $tax_rate_id;
			}
			$shortcodes_lists = array_merge( $shortcodes_lists, $shortcode_order_taxes );
		}

		foreach ( $shortcodes_lists as $key => $shortcode_name ) {
			add_shortcode( 'yaymail_' . $shortcode_name, array( $this, 'shortcodeCallBack' ) );
		}
	}

	protected function _shortcode_atts( $defaults = array(), $atts = array() ) {
		if ( isset( $atts['class'] ) ) {
			$atts['classname'] = $atts['class'];
		}

		return \shortcode_atts( $defaults, $atts );
	}

	// short Codes Order when select SampleOrder
	public function shortCodesOrderSample( $sent_to_admin = '' ) {
		$user  = wp_get_current_user();
		$useId = get_current_user_id();
		$this->defaultSampleOrderData( $sent_to_admin );
	}

	public function shortCodesOrderDefined( $sent_to_admin = '', $args = array() ) {
		if ( false !== $this->order_id && ! empty( $this->order_id ) && class_exists( 'WC_Order' ) ) {
			$this->order = new \WC_Order( $this->order_id );
			$this->collectOrderData( $sent_to_admin, $args );
		}
		if ( ! function_exists( 'get_user_by' ) ) {
			return false;
		}
		$action = isset( $_REQUEST['action'] ) ? sanitize_key( $_REQUEST['action'] ) : '';
		if ( empty( $this->order_id ) || ! $this->order_id ) {
			$shortcode = $this->order_data;

			if ( isset( $args['additional_content'] ) ) {
				$shortcode['[yaymail_additional_content]'] = wp_kses_post( wpautop( wptexturize( $args['additional_content'] ) ) );
			}
			if ( isset( $_REQUEST['billing_email'] ) ) {
				$shortcode['[yaymail_user_email]'] = sanitize_email( $_REQUEST['billing_email'] );
				$user                              = get_user_by( 'email', sanitize_email( $_REQUEST['billing_email'] ) );
				if ( ! empty( $user ) ) {
					$shortcode['[yaymail_customer_username]']   = $user->user_login;
					$shortcode['[yaymail_customer_name]']       = get_user_meta( $user->ID, 'first_name', true ) . ' ' . get_user_meta( $user->ID, 'last_name', true );
					$shortcode['[yaymail_customer_first_name]'] = get_user_meta( $user->ID, 'first_name', true );
					$shortcode['[yaymail_customer_last_name]']  = get_user_meta( $user->ID, 'last_name', true );
					$shortcode['[yaymail_user_id]']             = $user->ID;
				}
			}
			if ( empty( $shortcode['[yaymail_customer_username]'] ) ) {
				if ( isset( $_REQUEST['user_email'] ) ) {
					$user = get_user_by( 'email', sanitize_email( $_REQUEST['user_email'] ) );
					if ( isset( $user->user_login ) ) {
						$shortcode['[yaymail_customer_username]'] = $user->user_login;
					}
					if ( isset( $user->ID ) ) {
						$shortcode['[yaymail_user_id]'] = $user->ID;
					}
				} elseif ( isset( $_REQUEST['email'] ) ) {
					$user = get_user_by( 'email', sanitize_email( $_REQUEST['email'] ) );
					if ( isset( $user->user_login ) ) {
						$shortcode['[yaymail_customer_username]'] = $user->user_login;
					}
					if ( isset( $user->ID ) ) {
						$shortcode['[yaymail_user_id]'] = $user->ID;
					}
				}
			}
			if ( empty( $shortcode['[yaymail_user_email]'] ) ) {
				if ( isset( $_REQUEST['user_email'] ) ) {
					$user = get_user_by( 'email', sanitize_email( $_REQUEST['user_email'] ) );
					if ( isset( $user->user_email ) ) {
						$shortcode['[yaymail_user_email]'] = $user->user_email;
					}
					if ( isset( $user->ID ) ) {
						$shortcode['[yaymail_user_id]'] = $user->ID;
					}
				} elseif ( isset( $_REQUEST['email'] ) ) {
					$user = get_user_by( 'email', sanitize_email( $_REQUEST['email'] ) );
					if ( isset( $user->user_email ) ) {
						$shortcode['[yaymail_user_email]'] = $user->user_email;
					}
					if ( isset( $user->ID ) ) {
						$shortcode['[yaymail_user_id]'] = $user->ID;
					}
				}
			}
			if ( empty( $shortcode['[yaymail_customer_name]'] ) ) {
				if ( isset( $_REQUEST['user_email'] ) ) {
					$user = get_user_by( 'email', sanitize_email( $_REQUEST['user_email'] ) );
					if ( isset( $user->user_email ) ) {
						$shortcode['[yaymail_customer_name]']       = get_user_meta( $user->ID, 'first_name', true ) . ' ' . get_user_meta( $user->ID, 'last_name', true );
						$shortcode['[yaymail_customer_first_name]'] = get_user_meta( $user->ID, 'first_name', true );
						$shortcode['[yaymail_customer_last_name]']  = get_user_meta( $user->ID, 'last_name', true );
					}
					if ( isset( $user->ID ) ) {
						$shortcode['[yaymail_user_id]'] = $user->ID;
					}
				} elseif ( isset( $_REQUEST['email'] ) ) {
					$user = get_user_by( 'email', sanitize_email( $_REQUEST['email'] ) );
					if ( isset( $user->user_email ) ) {
						if ( ! empty( get_user_meta( $user->ID, 'first_name', true ) ) && ! empty( get_user_meta( $user->ID, 'last_name', true ) ) ) {
							$shortcode['[yaymail_customer_name]']       = get_user_meta( $user->ID, 'first_name', true ) . ' ' . get_user_meta( $user->ID, 'last_name', true );
							$shortcode['[yaymail_customer_first_name]'] = get_user_meta( $user->ID, 'first_name', true );
							$shortcode['[yaymail_customer_last_name]']  = get_user_meta( $user->ID, 'last_name', true );
						} elseif ( isset( $_REQUEST['first_name'] ) && isset( $_REQUEST['last_name'] ) ) {
							$shortcode['[yaymail_customer_name]']       = sanitize_text_field( $_REQUEST['first_name'] ) . ' ' . sanitize_text_field( $_REQUEST['last_name'] );
							$shortcode['[yaymail_customer_first_name]'] = sanitize_text_field( $_REQUEST['first_name'] );
							$shortcode['[yaymail_customer_last_name]']  = sanitize_text_field( $_REQUEST['last_name'] );
						}
					}
					if ( isset( $user->ID ) ) {
						$shortcode['[yaymail_user_id]'] = $user->ID;
					}
				}
			}
			if ( ! empty( $args ) ) {
				$postID               = CustomPostType::postIDByTemplate( $this->template );
				$text_link_color      = get_post_meta( $postID, '_yaymail_email_textLinkColor_settings', true ) ? get_post_meta( $postID, '_yaymail_email_textLinkColor_settings', true ) : '#7f54b3';
				$yaymail_settings     = get_option( 'yaymail_settings' );
				$yaymail_informations = Helper::inforShortcode( $postID, $this->template, array() );

				if ( isset( $args['email'] ) || isset( $args['admin_email'] ) || isset( $args['user'] ) ) {
					if ( isset( $args['email']->id ) && 'customer_reset_password' == $args['email']->id ) {
						$user                                       = new \WP_User( intval( $args['email']->user_id ) );
						$shortcode['[yaymail_customer_username]']   = $args['email']->user_login;
						$shortcode['[yaymail_customer_name]']       = get_user_meta( $user->ID, 'first_name', true ) . ' ' . get_user_meta( $user->ID, 'last_name', true );
						$shortcode['[yaymail_customer_first_name]'] = get_user_meta( $user->ID, 'first_name', true );
						$shortcode['[yaymail_customer_last_name]']  = get_user_meta( $user->ID, 'last_name', true );
						$shortcode['[yaymail_user_email]']          = $args['email']->user_email;
						$shortcode['[yaymail_user_id]']             = $user->ID;
						if ( isset( $args['reset_key'] ) ) {
							$link_reset                                       = add_query_arg(
								array(
									'key' => $args['reset_key'],
									'id'  => $user->ID,
								),
								wc_get_endpoint_url( 'lost-password', '', wc_get_page_permalink( 'myaccount' ) )
							);
							$shortcode['[yaymail_password_reset_url]']        = '<a style="color: ' . esc_attr( $text_link_color ) . ';" href="' . esc_url( $link_reset ) . '">' . esc_html__( 'Click here to reset your password', 'woocommerce' ) . '</a>';
							$shortcode['[yaymail_password_reset_url_string]'] = esc_url( $link_reset );
						}

						// link reset password send by wp
						if ( isset( $args['email']->user_login ) && isset( $args['email']->user_data ) && isset( $args['email']->key ) ) {
							$locale     = get_user_locale( $args['email']->user_data );
							$key        = $args['email']->key;
							$user_login = $args['email']->user_login;
							$shortcode['[yaymail_wp_password_reset_url]'] = network_site_url( "wp-login.php?action=rp&key=$key&login=" . rawurlencode( $user_login ), 'login' ) . '&wp_lang=' . $locale;
						}

						$shortcode['[yaymail_site_name]'] = esc_html( get_bloginfo( 'name' ) );
					}

						$shortcode['[yaymail_site_name]']               = esc_html( get_bloginfo( 'name' ) );
						$shortcode['[yaymail_site_url]']                = '<a style="color: ' . esc_attr( $text_link_color ) . ';" href="' . esc_url( get_home_url() ) . '"> ' . esc_url( get_home_url() ) . ' </a>';
						$shortcode['[yaymail_site_url_string]']         = esc_url( get_home_url() );
						$shortcode['[yaymail_user_account_url]']        = '<a style="color:' . esc_attr( $text_link_color ) . '; font-weight: normal; text-decoration: underline;" href="' . wc_get_page_permalink( 'myaccount' ) . '">' . esc_url( wc_get_page_permalink( 'myaccount' ) ) . '</a>';
						$shortcode['[yaymail_user_account_url_string]'] = wc_get_page_permalink( 'myaccount' );
					if ( isset( $args['email']->user_pass ) && ! empty( $args['email']->user_pass ) ) {
						$shortcode['[yaymail_user_new_password]'] = $args['email']->user_pass;
					} else {
						if ( isset( $_REQUEST['pass1-text'] ) && '' != $_REQUEST['pass1-text'] ) {
							$shortcode['[yaymail_user_new_password]'] = sanitize_text_field( $_REQUEST['pass1-text'] );
						} elseif ( isset( $_REQUEST['pass1'] ) && '' != $_REQUEST['pass1'] ) {
							$shortcode['[yaymail_user_new_password]'] = sanitize_text_field( $_REQUEST['pass1-text'] );
						} else {
							$shortcode['[yaymail_user_new_password]'] = '';
						}
					}

					if ( isset( $args['set_password_url'] ) && ! empty( $args['set_password_url'] ) ) {
						$shortcode['[yaymail_set_password_url_string]'] = $args['set_password_url'];
					}

					if ( isset( $args['email']->user_login ) && ! empty( $args['email']->user_login ) ) {
						$shortcode['[yaymail_customer_username]'] = $args['email']->user_login;
						$user                                     = get_user_by( 'email', $args['email']->user_email );
						if ( ! empty( get_user_meta( $user->ID, 'first_name', true ) ) && ! empty( get_user_meta( $user->ID, 'last_name', true ) ) ) {
							$shortcode['[yaymail_customer_name]']       = get_user_meta( $user->ID, 'first_name', true ) . ' ' . get_user_meta( $user->ID, 'last_name', true );
							$shortcode['[yaymail_customer_first_name]'] = get_user_meta( $user->ID, 'first_name', true );
							$shortcode['[yaymail_customer_last_name]']  = get_user_meta( $user->ID, 'last_name', true );
						} elseif ( isset( $_REQUEST['first_name'] ) && isset( $_REQUEST['last_name'] ) ) {
							$shortcode['[yaymail_customer_name]']       = sanitize_text_field( $_REQUEST['first_name'] ) . ' ' . sanitize_text_field( $_REQUEST['last_name'] );
							$shortcode['[yaymail_customer_first_name]'] = sanitize_text_field( $_REQUEST['first_name'] );
							$shortcode['[yaymail_customer_last_name]']  = sanitize_text_field( $_REQUEST['last_name'] );
						}
					}
					if ( isset( $args['email']->user_email ) && ! empty( $args['email']->user_email ) ) {
						$shortcode['[yaymail_user_email]'] = $args['email']->user_email;
					}
					if ( isset( $args['email']->id ) && ( 'customer_new_account_activation' == $args['email']->id ) ) { // customer_new_account_activation : Template of Germanized plugin, New Account template use shortcode [yaymail_set_password_url_string] is activation link
						if ( 'customer_new_account_activation' == $args['email']->id ) {
							if ( isset( $args['email']->user_activation_url ) && ! empty( $args['email']->user_activation_url ) ) {
								$shortcode['[yaymail_user_activation_link]'] = $args['email']->user_activation_url;
							}
						} else {
							if ( isset( $args['email']->user_login ) && ! empty( $args['email']->user_login ) ) {
								global $wpdb, $wp_hasher;
								$newHash = $wp_hasher;
								// Generate something random for a password reset key.
								$key = wp_generate_password( 20, false );

								/**
								 *
								 * This action is documented in wp-login.php
								 */
								do_action( 'retrieve_password_key', $args['email']->user_login, $key );

								// Now insert the key, hashed, into the DB.
								if ( empty( $wp_hasher ) ) {
									if ( ! class_exists( 'PasswordHash' ) ) {
										include_once ABSPATH . 'wp-includes/class-phpass.php';
									}
									$newHash = new \PasswordHash( 8, true );
								}
								$hashed = time() . ':' . $newHash->HashPassword( $key );
								$wpdb->update( $wpdb->users, array( 'user_activation_key' => $hashed ), array( 'user_login' => $args['email']->user_login ) );
								$activation_url                              = network_site_url( "wp-login.php?action=rp&key=$key&login=" . rawurlencode( $args['email']->user_login ), 'login' );
								$shortcode['[yaymail_user_activation_link]'] = $activation_url;
							}
						}
					}

					// Define shortcode from plugin addon
					$shortcode = apply_filters( 'yaymail_do_shortcode', $shortcode, $yaymail_informations, $args );
					// Define customs shortcode for user
					$shortcode = apply_filters( 'yaymail_customs_shortcode', $shortcode, $yaymail_informations, $args );

				} else {
					// Define shortcode from plugin addon not have args[''email]
					$shortcode = apply_filters( 'yaymail_do_shortcode', $shortcode, $yaymail_informations, $args );
					// Define customs shortcode for user
					$shortcode = apply_filters( 'yaymail_customs_shortcode', $shortcode, $yaymail_informations, $args );

				}
			}

			// support plugin YITH WooCommerce Coupon Email System Premium
			if ( class_exists( 'YITH_WC_Coupon_Email_System' ) ) {
				$shortcode['[yaymail_site_name]'] = esc_html( get_bloginfo( 'name' ) );
			}

			$this->order_data = $shortcode;
		}
	}
	public function shortcodeCallBack( $atts, $content, $tag ) {

		return isset( $this->order_data[ '[' . $tag . ']' ] ) ? $this->order_data[ '[' . $tag . ']' ] : false;

	}

	public function templateParser() {
		// Helper::checkNonce();
		$nonce = isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '';
		if ( ! wp_verify_nonce( $nonce, 'email-nonce' ) ) {
			wp_send_json_error( array( 'mess' => 'Nonce is invalid' ) );
		} else {
			$request        = $_POST;
			$this->order_id = false;
			if ( isset( $request['order_id'] ) ) {
				$order_id = sanitize_text_field( $request['order_id'] );
				if ( 'sampleOrder' !== $order_id ) {
					$order_id = intval( $order_id );
				}
				if ( ! $order_id ) {
					$order_id = '';
				}

				$this->template = isset( $request['template'] ) ? sanitize_text_field( $request['template'] ) : false;
				$this->order_id = $order_id;
			}

			if ( ! $this->order_id || ! $this->template ) {
				return false;
			}

			if ( 'sampleOrder' !== $order_id ) {
				$this->order = new \WC_Order( $this->order_id );
			}

			if ( 'sampleOrder' !== $order_id && ( is_null( $this->order ) || empty( $this->order ) || ! isset( $this->order ) ) ) {
				return false;
			}

			if ( 'sampleOrder' !== $order_id ) {
				$this->collectOrderData();
				$this->collectOrderDataHasFunction();
			} else {
				$this->defaultSampleOrderData();
			}

			$result             = (object) array();
			$result->order_id   = $this->order_id;
			$result->order_data = $this->order_data;

			$shortcode_order_meta        = array();
			$shortcode_order_custom_meta = array();
			$shortcode_order_taxes       = array();
			if ( 'sampleOrder' !== $order_id ) {
				$result->order        = $this->order;
				$result->order_items  = $result->order->get_items();
				$result->user_details = $result->order->get_user();

				/*
				@@@@ Get name field in custom field of order woocommerce.
				 */
				$order_metaArr = get_post_meta( $order_id );
				if ( is_array( $order_metaArr ) && count( $order_metaArr ) > 0 ) {
					$pattern = '/^_.*/i';
					$n       = 0;
					foreach ( $order_metaArr as $k => $v ) {
						// @@@ starts with the "_" character of the woo field.
						if ( ! preg_match( $pattern, $k ) ) {
							$nameField              = str_replace( ' ', '_', trim( $k ) );
							$nameShorcode           = '[yaymail_post_meta:' . $nameField . ']';
							$key_order_meta         = 'post_meta:' . $nameField . '_' . $n;
							$shortcode_order_meta[] = array(
								'key'         => $key_order_meta,
								$nameShorcode => 'Loads value of order meta key - ' . $nameField,
							);
							$n++;
						}
					}
				}
				if ( ! empty( $result->order ) ) {
					foreach ( $result->order->get_meta_data() as $meta ) {
						$nameField                     = str_replace( ' ', '_', trim( $meta->get_data()['key'] ) );
						$nameShorcode                  = '[yaymail_order_meta:' . $nameField . ']';
						$key_order_custom_meta         = 'order_meta:' . $nameField;
						$shortcode_order_custom_meta[] = array(
							'key'         => $key_order_custom_meta,
							$nameShorcode => 'Loads value of order custom meta key - ' . $nameField,
						);
					}
					foreach ( $result->order->get_items( 'tax' ) as $item_id => $item_tax ) {
						$tax_rate_id             = $item_tax->get_rate_id();
						$shortcode_order_taxes[] = array(
							'key'  => '[yaymail_order_taxes_' . $tax_rate_id . ']',
							'name' => $item_tax->get_label(),
						);
					}
				}
			} else {
				$result->order        = '';
				$result->order_items  = '';
				$result->user_details = '';
			}
			$real_postID = '';
			if ( isset( $request['template'] ) ) {
				if ( CustomPostType::postIDByTemplate( $this->template ) ) {
					$postID           = CustomPostType::postIDByTemplate( $this->template );
					$real_postID      = $postID;
					$emailTemplate    = get_post( $postID );
					$updateElement    = new UpdateElement();
					$yaymail_elements = get_post_meta( $postID, '_yaymail_elements', true );
					$list_elements    = Helper::preventXSS( $yaymail_elements );

					$yaymailSettingsDefaultLogo   = get_option( 'yaymail_settings_default_logo' );
					$set_default_logo             = false != $yaymailSettingsDefaultLogo ? $yaymailSettingsDefaultLogo['set_default'] : '0';
					$yaymailSettingsDefaultFooter = get_option( 'yaymail_settings_default_footer' );
					$set_default_footer           = false != $yaymailSettingsDefaultFooter ? $yaymailSettingsDefaultFooter['set_default'] : '0';
					$reviewYayMail                = get_option( 'yaymail_review' );

					$make_args['order'] = $this->order;
					$array_element      = array();
					foreach ( $list_elements as $key => $element ) {
						if ( has_filter( 'yaymail_addon_for_conditional_logic' ) && ! empty( $make_args['order'] ) && isset( $element['settingRow']['arrConditionLogic'] ) && ! empty( $element['settingRow']['arrConditionLogic'] ) ) {
							$conditional_Logic = apply_filters( 'yaymail_addon_for_conditional_logic', false, $make_args, $element['settingRow'] );

							if ( $conditional_Logic ) {
								$array_element[] = $element;
							}
						} else {
							$array_element[] = $element;
						}
					}

					// Check and update order items tilte
					if ( ! metadata_exists( 'post', $postID, '_yaymail_email_order_item_title' ) || empty( get_post_meta( $postID, '_yaymail_email_order_item_title', true ) ) ) {
						$orderItemsTitle = Helper::OrderItemsTitle();
						update_post_meta( $postID, '_yaymail_email_order_item_title', $orderItemsTitle );
					}
					if ( ! metadata_exists( 'post', $postID, '_yaymail_email_order_item_download_title' ) || empty( get_post_meta( $postID, '_yaymail_email_order_item_download_title', true ) ) ) {
						$orderItemsDownloadsTitle = Helper::OrderItemsDownloadsTitle();
						update_post_meta( $postID, '_yaymail_email_order_item_download_title', $orderItemsDownloadsTitle );
					}

					$result->elements             = Helper::unsanitize_array( $updateElement->merge_new_props_to_elements( $array_element ) );
					$result->emailBackgroundColor = get_post_meta( $postID, '_email_backgroundColor_settings', true ) ? get_post_meta( $postID, '_email_backgroundColor_settings', true ) : 'rgb(236, 236, 236)';
					$result->emailTextLinkColor   = get_post_meta( $postID, '_yaymail_email_textLinkColor_settings', true ) ? get_post_meta( $postID, '_yaymail_email_textLinkColor_settings', true ) : '#7f54b3';
					$result->titleShipping        = get_post_meta( $postID, '_email_title_shipping', true ) ? get_post_meta( $postID, '_email_title_shipping', true ) : 'Shipping Address';
					$result->titleBilling         = get_post_meta( $postID, '_email_title_billing', true ) ? get_post_meta( $postID, '_email_title_billing', true ) : 'Billing Address';
					$result->orderTitle           = get_post_meta( $postID, '_yaymail_email_order_item_title', true );
					if ( ! array_key_exists( 'customer_note', $result->orderTitle ) ) {
						$result->orderTitle['customer_note'] = __( 'Note:', 'yaymail' );
					}
					$result->orderItemsDownloadTitle     = get_post_meta( $postID, '_yaymail_email_order_item_download_title', true ) ? get_post_meta( $postID, '_yaymail_email_order_item_download_title', true ) : Helper::OrderItemsDownloadsTitle();
					$result->customCSS                   = $this->applyCSSFormat();
					$result->shortcode_order_meta        = $shortcode_order_meta;
					$result->shortcode_order_custom_meta = $shortcode_order_custom_meta;
					$result->shortcode_order_taxes       = $shortcode_order_taxes;
					$result->set_default_logo            = $set_default_logo;
					$result->set_default_footer          = $set_default_footer;
					$result->review_yaymail              = $reviewYayMail;

				}
			}
			$result->yaymailAddonTemps = Helper::replaceCustomAllowedHTMLTags( apply_filters( 'yaymail_addon_templates', array(), $result->order, $real_postID ) );

			echo json_encode( $result );
			die();
		}
	}
	public function collectOrderDataHasFunction( $sent_to_admin = '', $args = array() ) {
		$order = $this->order;
		if ( empty( $this->order_id ) || empty( $order ) ) {
			return false;
		}
		// Link Downloadable Product
		$shortcode['[yaymail_items_downloadable_title]']   = $this->itemsDownloadableTitle( '', $this->order, $sent_to_admin, '' ); // done
		$shortcode['[yaymail_items_downloadable_product]'] = $this->itemsDownloadableProduct( '', $this->order, $sent_to_admin, '' ); // done

		// ORDER DETAILS
		$shortcode['[yaymail_items_border]']         = $this->itemsBorder( '', $this->order, $sent_to_admin ); // done
		$shortcode['[yaymail_items_border_before]']  = $this->itemsBorderBefore( '', $this->order, $sent_to_admin ); // done
		$shortcode['[yaymail_items_border_after]']   = $this->itemsBorderAfter( '', $this->order, $sent_to_admin ); // done
		$shortcode['[yaymail_items_border_title]']   = $this->itemsBorderTitle( '', $this->order, $sent_to_admin ); // done
		$shortcode['[yaymail_items_border_content]'] = $this->itemsBorderContent( '', $this->order, $sent_to_admin ); // done
		$shortcode['[yaymail_get_heading]']          = $this->getHeading( $args, $this->order, $sent_to_admin );

		// WC HOOK
		$shortcode['[woocommerce_email_order_meta]']         = $this->woocommerceEmailOrderMeta( $args, $sent_to_admin ); // not Changed
		$shortcode['[woocommerce_email_order_details]']      = $this->woocommerceEmailOrderDetails( $args, $sent_to_admin ); // not Changed
		$shortcode['[woocommerce_email_before_order_table]'] = $this->woocommerceEmailBeforeOrderTable( $args, $sent_to_admin ); // not Changed
		$shortcode['[woocommerce_email_after_order_table]']  = $this->woocommerceEmailAfterOrderTable( $args, $sent_to_admin ); // not Changed

		$shortcode['[yaymail_billing_shipping_address]'] = $this->billingShippingAddress( '', $this->order ); // done

		$shortcode['[yaymail_billing_shipping_address_title]']   = $this->billingShippingAddressTitle( '', $this->order ); // done
		$shortcode['[yaymail_billing_shipping_address_content]'] = $this->billingShippingAddressContent( '', $this->order ); // done
		$shortcode['[yaymail_check_billing_shipping_address]']   = $this->checkBillingShippingAddress( '', $this->order );
		$shortcode['[yaymail_order_coupon_codes]']               = $this->orderCouponCodes( '', $this->order );

		//Support shortcode for WooCommerce for LatePoint
		if ( class_exists( 'TechXelaLatePointPaymentsWooCommerce' ) ) {
			$shortcode['[yaymail_woo_latepoint_booking_detail]'] = WooLatepoint::wooLatepointBookingDetail( $args, $this->order, $sent_to_admin );

			$shortcode['[yaymail_woo_latepoint_caption]']                 = WooLatepoint::wooLatepointCaption( $args, $this->order, $sent_to_admin );
			$shortcode['[yaymail_woo_latepoint_bg_color]']                = WooLatepoint::wooLatepointBgColor( $args, $this->order, $sent_to_admin );
			$shortcode['[yaymail_woo_latepoint_text_color]']              = WooLatepoint::wooLatepointTextColor( $args, $this->order, $sent_to_admin );
			$shortcode['[yaymail_woo_latepoint_font_size]']               = WooLatepoint::wooLatepointFontSize( $args, $this->order, $sent_to_admin );
			$shortcode['[yaymail_woo_latepoint_border]']                  = WooLatepoint::wooLatepointBorder( $args, $this->order, $sent_to_admin );
			$shortcode['[yaymail_woo_latepoint_border_radius]']           = WooLatepoint::wooLatepointBorderRadius( $args, $this->order, $sent_to_admin );
			$shortcode['[yaymail_woo_latepoint_margin]']                  = WooLatepoint::wooLatepointMargin( $args, $this->order, $sent_to_admin );
			$shortcode['[yaymail_woo_latepoint_padding]']                 = WooLatepoint::wooLatepointPaddings( $args, $this->order, $sent_to_admin );
			$shortcode['[yaymail_woo_latepoint_css]']                     = WooLatepoint::wooLatepointCss( $args, $this->order, $sent_to_admin );
			$shortcode['[yaymail_woo_latepoint_show_locations]']          = WooLatepoint::wooLatepointShowLocations( $args, $this->order, $sent_to_admin );
			$shortcode['[yaymail_woo_latepoint_show_agents]']             = WooLatepoint::wooLatepointShowAgents( $args, $this->order, $sent_to_admin );
			$shortcode['[yaymail_woo_latepoint_show_services]']           = WooLatepoint::wooLatepointShowServices( $args, $this->order, $sent_to_admin );
			$shortcode['[yaymail_woo_latepoint_show_service_categories]'] = WooLatepoint::wooLatepointShowServiceCategories( $args, $this->order, $sent_to_admin );

			$shortcode['[yaymail_woo_latepoint_selected_location]']         = WooLatepoint::wooLatepointSelectedLocation( $args, $this->order, $sent_to_admin );
			$shortcode['[yaymail_woo_latepoint_selected_agent]']            = WooLatepoint::wooLatepointSelectedAgent( $args, $this->order, $sent_to_admin );
			$shortcode['[yaymail_woo_latepoint_selected_service]']          = WooLatepoint::wooLatepointSelectedService( $args, $this->order, $sent_to_admin );
			$shortcode['[yaymail_woo_latepoint_selected_service_category]'] = WooLatepoint::wooLatepointSelectedServiceCategory( $args, $this->order, $sent_to_admin );
			$shortcode['[yaymail_woo_latepoint_selected_duration]']         = WooLatepoint::wooLatepointSelectedDuration( $args, $this->order, $sent_to_admin );
			$shortcode['[yaymail_woo_latepoint_selected_total_attendees]']  = WooLatepoint::wooLatepointSelectedTotalAttendees( $args, $this->order, $sent_to_admin );

			$shortcode['[yaymail_woo_latepoint_calendar_start_date]'] = WooLatepoint::wooLatepointCalendarStartDate( $args, $this->order, $sent_to_admin );
			$shortcode['[yaymail_woo_latepoint_hide_side_panel]']     = WooLatepoint::wooLatepointHideSidePanel( $args, $this->order, $sent_to_admin );
			$shortcode['[yaymail_woo_latepoint_hide_summary]']        = WooLatepoint::wooLatepointHideSummary( $args, $this->order, $sent_to_admin );
		}

		$this->order_data = array_merge( $this->order_data, $shortcode );
	}

	public function collectOrderData( $sent_to_admin = '', $args = array() ) {
		$shortcode = array();
		$order     = $this->order;
		if ( empty( $this->order_id ) || empty( $order ) ) {
			return false;
		}

		// Getting Fee & Refunds:
		$fee    = 0;
		$refund = 0;
		$totals = $order->get_order_item_totals();
		foreach ( $totals as $index => $value ) {
			if ( strpos( $index, 'fee' ) !== false ) {
				$fees = $order->get_fees();
				foreach ( $fees as $feeVal ) {
					if ( method_exists( $feeVal, 'get_amount' ) ) {
						$fee += (float) $feeVal->get_amount();
					}
				}
			}
			if ( strpos( $index, 'refund' ) !== false ) {
				$refund = $order->get_total_refunded();
			}
		}
		// User Info
		$user_data        = $order->get_user();
		$created_date     = $order->get_date_created();
		$items            = $order->get_items();
		$yaymail_settings = get_option( 'yaymail_settings' );
		$order_url        = $order->get_edit_order_url();
		// if ( class_exists( 'Flexible_Checkout_Fields_Disaplay_Options' ) ) {
		// add_action(
		// 'woocommerce_email_customer_details',
		// function( $order ) {
		// if ( 'Shortcodes.php' === basename( __FILE__ ) ) {
		// $this->shipping_address = $order->get_formatted_shipping_address();
		// $this->billing_address  = $order->get_formatted_billing_address();
		// }
		// },
		// 100,
		// 1
		// );
		// ob_start();
		// do_action( 'woocommerce_email_customer_details', $order );
		// $delete_write = ob_get_contents();
		// ob_end_clean();
		// }
		$this->shipping_address = $order->get_formatted_shipping_address();
		$this->billing_address  = $order->get_formatted_billing_address();
		$shipping_address       = class_exists( 'Flexible_Checkout_Fields_Disaplay_Options' ) ? $this->shipping_address : $order->get_formatted_shipping_address();
		$billing_address        = class_exists( 'Flexible_Checkout_Fields_Disaplay_Options' ) ? $this->billing_address : $order->get_formatted_billing_address();
		$postID                 = CustomPostType::postIDByTemplate( $this->template );
		$yaymail_informations   = Helper::inforShortcode( $postID, $this->template, $order );

		$text_link_color = get_post_meta( $postID, '_yaymail_email_textLinkColor_settings', true ) ? get_post_meta( $postID, '_yaymail_email_textLinkColor_settings', true ) : '#7f54b3';
		if ( $order->get_billing_phone() ) {
			$billing_address .= "<br/> <a href='tel:" . esc_html( $order->get_billing_phone() ) . "' style='color:" . esc_attr( $text_link_color ) . "; font-weight: normal; text-decoration: underline;'>" . esc_html( $order->get_billing_phone() ) . '</a>';
		}
		if ( $order->get_billing_email() ) {
			$billing_address .= "<br/><a href='mailto:" . esc_html( $order->get_billing_email() ) . "' style='color:" . esc_attr( $text_link_color ) . ";font-weight: normal; text-decoration: underline;'>" . esc_html( $order->get_billing_email() ) . '</a>';
		}
		$customerNotes        = $order->get_customer_order_notes();
		$customerNoteHtmlList = '';
		$customerNoteHtml     = $customerNoteHtmlList;
		if ( ! empty( $customerNotes ) && count( $customerNotes ) ) {
			$customerNoteHtmlList  = $this->getOrderCustomerNotes( $customerNotes );
			$customerNote_single[] = $customerNotes[0];
			$customerNoteHtml      = $this->getOrderCustomerNotes( $customerNote_single );
		}

		$resetURL = '';
		if ( isset( $args['email']->reset_key ) && ! empty( $args['email']->reset_key )
			&& isset( $args['email']->user_login ) && ! empty( $args['email']->user_login )
		) {
			$user      = new \WP_User( intval( $args['email']->user_id ) );
			$reset_key = get_password_reset_key( $user );
			$resetURL  = esc_url(
				add_query_arg(
					array(
						'key'   => $reset_key,
						'login' => rawurlencode( $args['email']->user_login ),
					),
					wc_get_endpoint_url( 'lost-password', '', wc_get_page_permalink( 'myaccount' ) )
				)
			);
		}

		if ( null != $created_date ) {
			$shortcode['[yaymail_order_date]'] = $order->get_date_created()->date_i18n( wc_date_format() );
		} else {
			$shortcode['[yaymail_order_date]'] = '';
		}
		$shortcode['[yaymail_order_fee]'] = $fee;
		if ( ! empty( $order->get_id() ) ) {
			$shortcode['[yaymail_order_id]'] = $order->get_id();
		} else {
			$shortcode['[yaymail_order_id]'] = '';
		}
		$shortcode['[yaymail_order_link]']        = '<a href="' . esc_url( $order_url ) . '" style="color:' . esc_attr( $text_link_color ) . ';">' . esc_html__( 'Order', 'yaymail' ) . '</a>';
		$shortcode['[yaymail_order_link]']        = str_replace( '[yaymail_order_id]', $order->get_id(), $shortcode['[yaymail_order_link]'] );
		$shortcode['[yaymail_order_link_string]'] = esc_url( $order_url );
		if ( ! empty( $order->get_order_number() ) ) {
			$shortcode['[yaymail_order_number]'] = $order->get_order_number();
		} else {
			$shortcode['[yaymail_order_number]'] = '';
		}
		$shortcode['[yaymail_order_refund]'] = $refund;
		if ( isset( $totals['cart_subtotal']['value'] ) ) {
			$shortcode['[yaymail_order_sub_total]'] = $totals['cart_subtotal']['value'];
		} else {
			$shortcode['[yaymail_order_sub_total]'] = '';
		}

		if ( isset( $totals['discount']['value'] ) ) {
			$shortcode['[yaymail_order_discount]'] = $totals['discount']['value'];
		}

		$shortcode['[yaymail_order_total]']         = wc_price( $order->get_total() );
		$shortcode['[yaymail_order_total_numbers]'] = $order->get_total();
		$shortcode['[yaymail_orders_count]']        = count( $order->get_items() );
		$shortcode['[yaymail_quantity_count]']      = $order->get_item_count();
		$shortcode['[yaymail_orders_count_double]'] = count( $order->get_items() ) * 2;

		// PAYMENTS
		if ( isset( $totals['payment_method']['value'] ) ) {
			$shortcode['[yaymail_order_payment_method]'] = $totals['payment_method']['value'];
		} else {
			$shortcode['[yaymail_order_payment_method]'] = '';
		}
		$shortcode['[yaymail_order_payment_url]']        = '<a href="' . esc_url( $order->get_checkout_payment_url() ) . '">' . esc_html__( 'Payment page', 'yaymail' ) . '</a>';
		$shortcode['[yaymail_order_payment_url_string]'] = esc_url( $order->get_checkout_payment_url() );
		$shortcode['[yaymail_payment_instruction]']      = $this->orderPaymentInstructions( $this->order, $sent_to_admin );
		foreach ( $order->get_items( 'tax' ) as $item_id => $item_tax ) {
			$tax_rate_id = $item_tax->get_rate_id();

			$shortcode_order_taxes = '[yaymail_order_taxes_' . $tax_rate_id . ']';
			$tax_amount_total      = $item_tax->get_tax_total(); // Tax rate total
			$tax_shipping_total    = $item_tax->get_shipping_tax_total(); // Tax shipping total
			$totals_taxes          = $tax_amount_total + $tax_shipping_total;

			$shortcode[ $shortcode_order_taxes ] = wc_price( $totals_taxes );
		}
		if ( ! empty( $order->get_payment_method_title() ) ) {
			$shortcode['[yaymail_payment_method]'] = $order->get_payment_method_title();
		} else {
			$shortcode['[yaymail_payment_method]'] = '';
		}
		if ( ! empty( $order->get_transaction_id() ) ) {
			$shortcode['[yaymail_transaction_id]'] = $order->get_transaction_id();
		} else {
			$shortcode['[yaymail_transaction_id]'] = '';
		}

		// SHIPPINGS
		if ( ! empty( $order->calculate_shipping() ) ) {
			$shortcode['[yaymail_order_shipping]'] = $order->calculate_shipping();
		} else {
			$shortcode['[yaymail_order_shipping]'] = 0;
		}
		$shortcode['[yaymail_shipping_address]'] = $shipping_address;
		if ( ! empty( $order->get_shipping_address_1() ) ) {
			$shortcode['[yaymail_shipping_address_1]'] = $order->get_shipping_address_1();
		} else {
			$shortcode['[yaymail_shipping_address_1]'] = '';
		}
		if ( ! empty( $order->get_shipping_address_2() ) ) {
			$shortcode['[yaymail_shipping_address_2]'] = $order->get_shipping_address_2();
		} else {
			$shortcode['[yaymail_shipping_address_2]'] = '';
		}
		if ( ! empty( $order->get_shipping_city() ) ) {
			$shortcode['[yaymail_shipping_city]'] = $order->get_shipping_city();
		} else {
			$shortcode['[yaymail_shipping_city]'] = '';
		}
		if ( ! empty( $order->get_shipping_company() ) ) {
			$shortcode['[yaymail_shipping_company]'] = $order->get_shipping_company();
		} else {
			$shortcode['[yaymail_shipping_company]'] = '';
		}
		if ( ! empty( $order->get_shipping_country() ) ) {
			$country_code_bym                        = $order->get_shipping_country();
			$wc_countries                            = WC()->countries;
			$shipping_country_name_bym               = $wc_countries->countries[ $country_code_bym ];
			$shortcode['[yaymail_shipping_country]'] = $shipping_country_name_bym;
		} else {
			$shortcode['[yaymail_shipping_country]'] = '';
		}
		if ( ! empty( $order->get_shipping_first_name() ) ) {
			$shortcode['[yaymail_shipping_first_name]'] = $order->get_shipping_first_name();
		} else {
			$shortcode['[yaymail_shipping_first_name]'] = '';

		}
		if ( ! empty( $order->get_shipping_last_name() ) ) {
			$shortcode['[yaymail_shipping_last_name]'] = $order->get_shipping_last_name();
		} else {
			$shortcode['[yaymail_shipping_last_name]'] = '';

		}
		if ( ! empty( $order->get_shipping_method() ) ) {
			$shortcode['[yaymail_shipping_method]'] = $order->get_shipping_method();
		} else {
			$shortcode['[yaymail_shipping_method]'] = '';
		}
		if ( ! empty( $order->get_shipping_postcode() ) ) {
			$shortcode['[yaymail_shipping_postcode]'] = $order->get_shipping_postcode();
		} else {
			$shortcode['[yaymail_shipping_postcode]'] = '';
		}
		if ( ! empty( $order->get_shipping_state() ) ) {
			$shortcode['[yaymail_shipping_state]'] = $order->get_shipping_state();
		} else {
			$shortcode['[yaymail_shipping_state]'] = '';
		}
		if ( method_exists( $order, 'get_shipping_phone' ) && ! empty( $order->get_shipping_phone() ) ) {
			$shortcode['[yaymail_shipping_phone]'] = $order->get_shipping_phone();
		} else {
			$shortcode['[yaymail_shipping_phone]'] = '';
		}

		// BILLINGS
		$shortcode['[yaymail_billing_address]'] = $billing_address;
		if ( ! empty( $order->get_billing_address_1() ) ) {
			$shortcode['[yaymail_billing_address_1]'] = $order->get_billing_address_1();
		} else {
			$shortcode['[yaymail_billing_address_1]'] = '';
		}
		if ( ! empty( $order->get_billing_address_2() ) ) {
			$shortcode['[yaymail_billing_address_2]'] = $order->get_billing_address_2();
		} else {
			$shortcode['[yaymail_billing_address_2]'] = '';
		}
		if ( ! empty( $order->get_billing_city() ) ) {
			$shortcode['[yaymail_billing_city]'] = $order->get_billing_city();
		} else {
			$shortcode['[yaymail_billing_city]'] = $order->get_billing_city();
		}
		if ( ! empty( $order->get_billing_company() ) ) {
			$shortcode['[yaymail_billing_company]'] = $order->get_billing_company();
		} else {
			$shortcode['[yaymail_billing_company]'] = '';
		}
		if ( ! empty( $order->get_billing_country() ) ) {
			$country_code_bym                       = $order->get_billing_country();
			$wc_countries                           = WC()->countries;
			$billing_country_name_bym               = $wc_countries->countries[ $country_code_bym ];
			$shortcode['[yaymail_billing_country]'] = $billing_country_name_bym;
		} else {
			$shortcode['[yaymail_billing_country]'] = '';
		}
		if ( ! empty( $order->get_billing_email() ) ) {
			$shortcode['[yaymail_billing_email]'] = '<a style="color: inherit" href="mailto:' . $order->get_billing_email() . '">' . $order->get_billing_email() . '</a>';
		} else {
			$shortcode['[yaymail_billing_email]'] = '';
		}
		if ( ! empty( $order->get_billing_first_name() ) ) {
			$shortcode['[yaymail_billing_first_name]'] = $order->get_billing_first_name();
		} else {
			$shortcode['[yaymail_billing_first_name]'] = '';
		}
		if ( ! empty( $order->get_billing_last_name() ) ) {
			$shortcode['[yaymail_billing_last_name]'] = $order->get_billing_last_name();
		} else {
			$shortcode['[yaymail_billing_last_name]'] = '';
		}
		if ( ! empty( $order->get_billing_phone() ) ) {
			$shortcode['[yaymail_billing_phone]'] = $order->get_billing_phone();
		} else {
			$shortcode['[yaymail_billing_phone]'] = '';
		}
		if ( ! empty( $order->get_billing_postcode() ) ) {
			$shortcode['[yaymail_billing_postcode]'] = $order->get_billing_postcode();
		} else {
			$shortcode['[yaymail_billing_postcode]'] = '';
		}
		if ( ! empty( $order->get_billing_state() ) ) {
			$shortcode['[yaymail_billing_state]'] = $order->get_billing_state();
		} else {
			$shortcode['[yaymail_billing_state]'] = '';
		}

		// Reset Passwords
		$shortcode['[yaymail_password_reset_url]']        = '<a style="color: ' . esc_attr( $text_link_color ) . ';" href="' . esc_url( $resetURL ) . '">' . esc_html__( 'Click here to reset your password', 'woocommerce' ) . '</a>';
		$shortcode['[yaymail_password_reset_url_string]'] = esc_url( $resetURL );

		// New Users
		if ( isset( $args['email']->user_pass ) && ! empty( $args['email']->user_pass ) ) {
			$shortcode['[yaymail_user_new_password]'] = $args['email']->user_pass;
		} else {
			if ( isset( $_REQUEST['pass1-text'] ) && '' != $_REQUEST['pass1-text'] ) {
				$shortcode['[yaymail_user_new_password]'] = sanitize_text_field( $_REQUEST['pass1-text'] );
			} elseif ( isset( $_REQUEST['pass1'] ) && '' != $_REQUEST['pass1'] ) {
				$shortcode['[yaymail_user_new_password]'] = sanitize_text_field( $_REQUEST['pass1-text'] );
			} else {
				$shortcode['[yaymail_user_new_password]'] = '';
			}
		}
		// Review this code ??
		if ( isset( $args['email']->user_activation_url ) && ! empty( $args['email']->user_activation_url ) ) {
			$shortcode['[yaymail_user_activation_link]'] = $args['email']->user_activation_url;
		} else {
			$shortcode['[yaymail_user_activation_link]'] = '';
		}

		// GENERALS
		$shortcode['[yaymail_customer_note]']  = ( $customerNoteHtml ); // add strip_tags() to remove link
		$shortcode['[yaymail_customer_notes]'] = $customerNoteHtmlList;
		if ( ! empty( $order->get_customer_note() ) ) {
			$shortcode['[yaymail_customer_provided_note]'] = $order->get_customer_note();
		} else {
			$shortcode['[yaymail_customer_provided_note]'] = '';
		}
		$shortcode['[yaymail_site_name]']       = esc_html( get_bloginfo( 'name' ) );
		$shortcode['[yaymail_site_url]']        = '<a style="color: ' . esc_attr( $text_link_color ) . ';" href="' . esc_url( get_home_url() ) . '"> ' . esc_url( get_home_url() ) . ' </a>';
		$shortcode['[yaymail_site_url_string]'] = esc_url( get_home_url() );
		if ( isset( $user_data->user_email ) ) {
			$shortcode['[yaymail_user_email]'] = $user_data->user_email;
		} else {
			$shortcode['[yaymail_user_email]'] = $order->get_billing_email();
		}
		if ( isset( $shortcode['[yaymail_user_email]'] ) && '' != $shortcode['[yaymail_user_email]'] ) {
			$user                           = get_user_by( 'email', $shortcode['[yaymail_user_email]'] );
			$shortcode['[yaymail_user_id]'] = ( isset( $user->ID ) ) ? $user->ID : '';
		}
		if ( isset( $user_data->user_login ) && ! empty( $user_data->user_login ) ) {
			$shortcode['[yaymail_customer_username]'] = $user_data->user_login;
		} elseif ( isset( $user_data->user_nicename ) ) {
			$shortcode['[yaymail_customer_username]'] = $user_data->user_nicename;
		} else {
			$shortcode['[yaymail_customer_username]'] = $order->get_billing_first_name();
		}
		if ( isset( $user_data->roles ) && ! empty( $user_data->roles ) ) {
			$shortcode['[yaymail_customer_roles]'] = implode( ', ', $user_data->roles );
		}
		if ( isset( $user->ID ) && ! empty( $user->ID ) ) {
			$shortcode['[yaymail_customer_name]']       = get_user_meta( $user->ID, 'first_name', true ) . ' ' . get_user_meta( $user->ID, 'last_name', true );
			$shortcode['[yaymail_customer_first_name]'] = get_user_meta( $user->ID, 'first_name', true );
			$shortcode['[yaymail_customer_last_name]']  = get_user_meta( $user->ID, 'last_name', true );
		} elseif ( isset( $user_data->user_nicename ) ) {
			$shortcode['[yaymail_customer_name]'] = $user_data->user_nicename;
		} else {
			$shortcode['[yaymail_customer_name]'] = $order->get_billing_first_name() . ' ' . $order->get_billing_last_name();
		}
		if ( ! empty( $order->get_view_order_url() ) ) {
			$text_your_order                              = esc_html__( 'Your Order', 'yaymail' );
			$shortcode['[yaymail_view_order_url]']        = '<a href="' . esc_url( $order->get_view_order_url() ) . '" style="color:' . esc_attr( $text_link_color ) . ';">' . esc_html( $text_your_order ) . '</a>';
			$shortcode['[yaymail_view_order_url_string]'] = $order->get_view_order_url();
		} else {
			$shortcode['[yaymail_view_order_url]'] = '';
		}

		if ( ! empty( parse_url( get_site_url() )['host'] ) ) {
			$shortcode['[yaymail_domain]'] = parse_url( get_site_url() )['host'];
		} else {
			$shortcode['[yaymail_domain]'] = '';
		}

		$shortcode['[yaymail_user_account_url]']        = '<a style="color:' . esc_attr( $text_link_color ) . '; font-weight: normal; text-decoration: underline;" href="' . esc_url( wc_get_page_permalink( 'myaccount' ) ) . '">' . esc_url( wc_get_page_permalink( 'myaccount' ) ) . '</a>';
		$shortcode['[yaymail_user_account_url_string]'] = esc_url( wc_get_page_permalink( 'myaccount' ) );

		// ADDITIONAL ORDER META:
		$order_metaArr = get_post_meta( $this->order_id );
		if ( is_array( $order_metaArr ) && count( $order_metaArr ) > 0 ) {
			foreach ( $order_metaArr as $k => $v ) {
				$nameField    = str_replace( ' ', '_', trim( $k ) );
				$nameShorcode = '[yaymail_post_meta:' . $nameField . ']';

				// when array $v has tow value ???
				if ( is_array( $v ) && count( $v ) > 0 ) {
					$shortcode[ $nameShorcode ] = trim( $v[0] );
				} else {
					$shortcode[ $nameShorcode ] = trim( $v );
				}
			}
		}

		/*
		To get custom fields support Checkout Field Editor for WooCommerce */
		// funtion wc_get_custom_checkout_fields of Plugin Checkout Field Editor ????
		if ( ! empty( $order ) ) {
			if ( function_exists( 'wc_get_custom_checkout_fields' ) ) {
				$custom_fields = wc_get_custom_checkout_fields( $order );
				if ( ! empty( $custom_fields ) ) {
					foreach ( $custom_fields as $key => $custom_field ) {
						$shortcode[ '[yaymail_' . $key . ']' ] = get_post_meta( $order->get_id(), $key, true );
					}
				}
			}
		}
		if ( ! empty( $order ) ) {
			foreach ( $order->get_meta_data() as $meta ) {
				$nameField    = str_replace( ' ', '_', trim( $meta->get_data()['key'] ) );
				$nameShorcode = '[yaymail_order_meta:' . $nameField . ']';
				if ( '_local_pickup_time_select' == $nameField ) {
					$plugin                     = \Local_Pickup_Time::get_instance();
					$shortcode[ $nameShorcode ] = $plugin->pickup_time_select_translatable( $meta->get_data()['value'] );
				} else {
					if ( is_array( $meta->get_data()['value'] ) ) {
						$checkNestedArray = false;
						foreach ( $meta->get_data()['value'] as $value ) {
							if ( is_object( $value ) || is_array( $value ) ) {
								$checkNestedArray = true;
								break;
							}
						}
						if ( false == $checkNestedArray ) {
							$shortcode[ $nameShorcode ] = implode( ', ', $meta->get_data()['value'] );
						} else {
							$shortcode[ $nameShorcode ] = '';
							if ( class_exists( 'WCPFC_Country' ) ) {
								$arr_values = \wcpfc_get_value_if_set( $meta->get_data(), array( 'value', 'value' ), '' );
								if ( is_object( $arr_values ) || is_array( $arr_values ) ) {
									$shortcode[ $nameShorcode ] = implode( ',', $arr_values );
								} else {
									$shortcode[ $nameShorcode ] = $arr_values;
								}
							}
						}
					} else {
						if ( is_string( $meta->get_data()['value'] ) ) {
							// if ( is_numeric( strtotime( $meta->get_data()['value'] ) ) ) {
							// 	$date                       = \DateTime::createFromFormat( 'Y-m-d', $meta->get_data()['value'] );
							// 	$shortcode[ $nameShorcode ] = date_i18n( wc_date_format(), $date->getTimestamp() );
							// } else {
								$shortcode[ $nameShorcode ] = nl2br( $meta->get_data()['value'] );
							//}
						} else {
							$shortcode[ $nameShorcode ] = $meta->get_data()['value'];
						}
					}
				}
			}
		}

		$shortcode['[yaymail_items]']                         = $this->orderItems( $items, $sent_to_admin, '', true );
		$shortcode['[yaymail_items_products_quantity_price]'] = $this->orderItems( $items, $sent_to_admin, '', false );

		// Define shortcode from plugin addon
		$shortcode = apply_filters( 'yaymail_do_shortcode', $shortcode, $yaymail_informations, $this->args_email );
		// Define customs shortcode for user
		$shortcode = apply_filters( 'yaymail_customs_shortcode', $shortcode, $yaymail_informations, $this->args_email );

		$this->order_data = $shortcode;
	}

	public function defaultSampleOrderData( $sent_to_admin = '' ) {
		$current_user         = wp_get_current_user();
		$postID               = CustomPostType::postIDByTemplate( $this->template );
		$text_link_color      = get_post_meta( $postID, '_yaymail_email_textLinkColor_settings', true ) ? get_post_meta( $postID, '_yaymail_email_textLinkColor_settings', true ) : '#7f54b3';
		$billing_address      = "John Doe<br/>YayCommerce<br/>7400 Edwards Rd<br/>Edwards Rd<br/><a href='tel:+18587433828' style='color: " . esc_attr( $text_link_color ) . "; font-weight: normal; text-decoration: underline;'>(910) 529-1147</a><br/>";
		$shipping_address     = "John Doe<br/>YayCommerce<br/>755 E North Grove Rd<br/>Mayville, Michigan<br/><a href='tel:+18587433828' style='color: " . esc_attr( $text_link_color ) . "; font-weight: normal; text-decoration: underline;'>(910) 529-1147</a><br/>";
		$user_id              = get_current_user_id();
		$yaymail_settings     = get_option( 'yaymail_settings' );
		$yaymail_informations = Helper::inforShortcode( $postID, $this->template, array() );

		// Link Downloadable Product
		$shortcode['[yaymail_items_downloadable_title]']   = $this->itemsDownloadableTitle( '', $this->order, $sent_to_admin, '' ); // done
		$shortcode['[yaymail_items_downloadable_product]'] = $this->itemsDownloadableProduct( '', $this->order, $sent_to_admin, '' ); // done

		// ORDER DETAILS
		$shortcode['[yaymail_items_border]'] = $this->itemsBorder( '', $this->order, $sent_to_admin ); // done

		$shortcode['[yaymail_items_border_before]']  = $this->itemsBorderBefore( '', $this->order, $sent_to_admin ); // done
		$shortcode['[yaymail_items_border_after]']   = $this->itemsBorderAfter( '', $this->order, $sent_to_admin ); // done
		$shortcode['[yaymail_items_border_title]']   = $this->itemsBorderTitle( '', $this->order, $sent_to_admin ); // done
		$shortcode['[yaymail_items_border_content]'] = $this->itemsBorderContent( '', $this->order, $sent_to_admin ); // done
		$shortcode['[yaymail_get_heading]']          = $this->getHeading( '', $this->order, $sent_to_admin );

		// WC HOOK
		$shortcode['[woocommerce_email_order_meta]']         = $this->woocommerceEmailOrderMeta( array(), $sent_to_admin, 'sampleOrder' ); // not Changed
		$shortcode['[woocommerce_email_order_details]']      = $this->woocommerceEmailOrderDetails( array(), $sent_to_admin, 'sampleOrder' ); // not Changed
		$shortcode['[woocommerce_email_before_order_table]'] = $this->woocommerceEmailBeforeOrderTable( array(), $sent_to_admin, 'sampleOrder' ); // not changed
		$shortcode['[woocommerce_email_after_order_table]']  = $this->woocommerceEmailAfterOrderTable( array(), $sent_to_admin, 'sampleOrder' ); // not changed

		// Define shortcode from plugin addon
		$shortcode = apply_filters( 'yaymail_do_shortcode', $shortcode, $yaymail_informations, '' );
		// Define customs shortcode for user
		$shortcode = apply_filters( 'yaymail_customs_shortcode', $shortcode, $yaymail_informations, '' );

		$shortcode['[yaymail_items]']                         = $this->orderItems( array(), $sent_to_admin, 'sampleOrder', true );
		$shortcode['[yaymail_items_products_quantity_price]'] = $this->orderItems( array(), $sent_to_admin, 'sampleOrder', false );
		$shortcode['[yaymail_order_date]']                    = date_i18n( wc_date_format() );
		$shortcode['[yaymail_order_fee]']                     = 0;
		$shortcode['[yaymail_order_id]']                      = 1;
		$shortcode['[yaymail_order_link]']                    = '<a href="" style="color:' . esc_attr( $text_link_color ) . ';">' . esc_html__( 'Order', 'yaymail' ) . '</a>';
		$shortcode['[yaymail_order_link_string]']             = esc_url( get_home_url() );
		$shortcode['[yaymail_order_number]']                  = '1';
		$shortcode['[yaymail_order_refund]']                  = 0;
		$shortcode['[yaymail_order_sub_total]']               = wc_price( '18.00' );
		$shortcode['[yaymail_order_discount]']                = wc_price( '18.00' );
		$shortcode['[yaymail_order_total]']                   = wc_price( '18.00' );
		$shortcode['[yaymail_order_total_numbers]']           = '18.00';
		$shortcode['[yaymail_orders_count]']                  = '1';
		$shortcode['[yaymail_quantity_count]']                = '1';
		$shortcode['[yaymail_orders_count_double]']           = '2';

		// PAYMENTS
		$shortcode['[yaymail_order_payment_method]']     = esc_html__( 'Direct bank transfer', 'yaymail' );
		$shortcode['[yaymail_order_payment_url]']        = '<a href="">' . esc_html__( 'Payment page', 'yaymail' ) . '</a>';
		$shortcode['[yaymail_order_payment_url_string]'] = '';
		$shortcode['[yaymail_payment_instruction]']      = __( 'Payment Instructions', 'yaymail' );
		$shortcode['[yaymail_payment_method]']           = esc_html__( 'Check payments', 'yaymail' );
		$shortcode['[yaymail_transaction_id]']           = 1;

		// SHIPPINGS
		$shortcode['[yaymail_order_shipping]']      = esc_html__( '333', 'yaymail' );
		$shortcode['[yaymail_shipping_address]']    = $shipping_address;
		$shortcode['[yaymail_shipping_address_1]']  = esc_html__( '755 E North Grove Rd', 'yaymail' );
		$shortcode['[yaymail_shipping_address_2]']  = esc_html__( '755 E North Grove Rd', 'yaymail' );
		$shortcode['[yaymail_shipping_city]']       = esc_html__( 'Mayville, Michigan', 'yaymail' );
		$shortcode['[yaymail_shipping_company]']    = esc_html__( 'YayCommerce', 'yaymail' );
		$shortcode['[yaymail_shipping_country]']    = '';
		$shortcode['[yaymail_shipping_first_name]'] = esc_html__( 'John', 'yaymail' );
		$shortcode['[yaymail_shipping_last_name]']  = esc_html__( 'John', 'yaymail' );
		$shortcode['[yaymail_shipping_method]']     = '';
		$shortcode['[yaymail_shipping_postcode]']   = esc_html__( '48744', 'yaymail' );
		$shortcode['[yaymail_shipping_state]']      = esc_html__( 'Random', 'yaymail' );
		$shortcode['[yaymail_shipping_phone]']      = esc_html__( '(910) 529-1147', 'yaymail' );

		// BILLING
		$shortcode['[yaymail_billing_address]']    = $billing_address;
		$shortcode['[yaymail_billing_address_1]']  = esc_html__( '7400 Edwards Rd', 'yaymail' );
		$shortcode['[yaymail_billing_address_2]']  = esc_html__( '7400 Edwards Rd', 'yaymail' );
		$shortcode['[yaymail_billing_city]']       = esc_html__( 'Edwards Rd', 'yaymail' );
		$shortcode['[yaymail_billing_company]']    = esc_html__( 'YayCommerce', 'yaymail' );
		$shortcode['[yaymail_billing_country]']    = '';
		$shortcode['[yaymail_billing_email]']      = esc_html__( 'johndoe@gmail.com', 'yaymail' );
		$shortcode['[yaymail_billing_first_name]'] = esc_html__( 'John', 'yaymail' );
		$shortcode['[yaymail_billing_last_name]']  = esc_html__( 'Doe', 'yaymail' );
		$shortcode['[yaymail_billing_phone]']      = esc_html__( '(910) 529-1147', 'yaymail' );
		$shortcode['[yaymail_billing_postcode]']   = esc_html__( '48744', 'yaymail' );
		$shortcode['[yaymail_billing_state]']      = esc_html__( 'Random', 'yaymail' );

		// RESET PASSWORD:
		$shortcode['[yaymail_password_reset_url]']        = '<a style="color:' . esc_attr( $text_link_color ) . ';" href="">' . esc_html__( 'Click here to reset your password', 'woocommerce' ) . '</a>';
		$shortcode['[yaymail_password_reset_url_string]'] = esc_url( get_home_url() ) . '/my-account/lost-password/?login';
		$shortcode['[yaymail_wp_password_reset_url]']     = esc_url( get_home_url() ) . '/my-account/lost-password/?login';

		// NEW USERS:
		$shortcode['[yaymail_user_new_password]']       = esc_html__( 'G(UAM1(eIX#G', 'yaymail' );
		$shortcode['[yaymail_set_password_url_string]'] = esc_url( get_home_url() ) . '/my-account/set-password/';
		$shortcode['[yaymail_user_activation_link]']    = '';

		// GENERALS
		$shortcode['[yaymail_customer_note]']            = esc_html__( 'note', 'yaymail' );
		$shortcode['[yaymail_customer_notes]']           = esc_html__( 'notes', 'yaymail' );
		$shortcode['[yaymail_customer_provided_note]']   = esc_html__( 'provided note', 'yaymail' );
		$shortcode['[yaymail_site_name]']                = esc_html( get_bloginfo( 'name' ) );
		$shortcode['[yaymail_site_url]']                 = '<a style="color: ' . esc_attr( $text_link_color ) . ';" href="' . esc_url( get_home_url() ) . '"> ' . esc_url( get_home_url() ) . ' </a>';
		$shortcode['[yaymail_site_url_string]']          = esc_url( get_home_url() );
		$shortcode['[yaymail_user_email]']               = $current_user->data->user_email;
		$shortcode['[yaymail_user_id]']                  = $user_id;
		$shortcode['[yaymail_customer_username]']        = $current_user->data->user_login;
		$shortcode['[yaymail_customer_roles]']           = implode( ', ', $current_user->roles );
		$shortcode['[yaymail_customer_name]']            = get_user_meta( $current_user->data->ID, 'first_name', true ) . ' ' . get_user_meta( $current_user->data->ID, 'last_name', true );
		$shortcode['[yaymail_customer_first_name]']      = get_user_meta( $current_user->data->ID, 'first_name', true );
		$shortcode['[yaymail_customer_last_name]']       = get_user_meta( $current_user->data->ID, 'last_name', true );
		$shortcode['[yaymail_view_order_url]']           = '';
		$shortcode['[yaymail_view_order_url_string]']    = '';
		$shortcode['[yaymail_billing_shipping_address]'] = $this->billingShippingAddress( '', $this->order ); // done

		$shortcode['[yaymail_billing_shipping_address_title]']   = $this->billingShippingAddressTitle( '', $this->order ); // done
		$shortcode['[yaymail_billing_shipping_address_content]'] = $this->billingShippingAddressContent( '', $this->order ); // done
		$shortcode['[yaymail_check_billing_shipping_address]']   = $this->checkBillingShippingAddress( '', $this->order ); // done

		$shortcode['[yaymail_domain]']                  = parse_url( get_site_url() )['host'];
		$shortcode['[yaymail_user_account_url]']        = '<a style="color:' . esc_attr( $text_link_color ) . '; font-weight: normal; text-decoration: underline;" href="' . esc_url( wc_get_page_permalink( 'myaccount' ) ) . '">' . esc_url( wc_get_page_permalink( 'myaccount' ) ) . '</a>';
		$shortcode['[yaymail_user_account_url_string]'] = esc_url( wc_get_page_permalink( 'myaccount' ) );
		$shortcode['[yaymail_order_coupon_codes]']      = esc_html__( 'yaymail_code', 'yaymail' );

		//Support shortcode for WooCommerce for LatePoint
		if ( class_exists( 'TechXelaLatePointPaymentsWooCommerce' ) ) {
			$shortcode['[yaymail_woo_latepoint_booking_detail]'] = WooLatepoint::wooLatepointBookingDetail( '', $this->order, false );

			$shortcode['[yaymail_woo_latepoint_caption]']                 = WooLatepoint::wooLatepointCaption( '', $this->order, false );
			$shortcode['[yaymail_woo_latepoint_bg_color]']                = WooLatepoint::wooLatepointBgColor( '', $this->order, false );
			$shortcode['[yaymail_woo_latepoint_text_color]']              = WooLatepoint::wooLatepointTextColor( '', $this->order, false );
			$shortcode['[yaymail_woo_latepoint_font_size]']               = WooLatepoint::wooLatepointFontSize( '', $this->order, false );
			$shortcode['[yaymail_woo_latepoint_border]']                  = WooLatepoint::wooLatepointBorder( '', $this->order, false );
			$shortcode['[yaymail_woo_latepoint_border_radius]']           = WooLatepoint::wooLatepointBorderRadius( '', $this->order, false );
			$shortcode['[yaymail_woo_latepoint_margin]']                  = WooLatepoint::wooLatepointMargin( '', $this->order, false );
			$shortcode['[yaymail_woo_latepoint_padding]']                 = WooLatepoint::wooLatepointPaddings( '', $this->order, false );
			$shortcode['[yaymail_woo_latepoint_css]']                     = WooLatepoint::wooLatepointCss( '', $this->order, false );
			$shortcode['[yaymail_woo_latepoint_show_locations]']          = WooLatepoint::wooLatepointShowLocations( '', $this->order, false );
			$shortcode['[yaymail_woo_latepoint_show_agents]']             = WooLatepoint::wooLatepointShowAgents( '', $this->order, false );
			$shortcode['[yaymail_woo_latepoint_show_services]']           = WooLatepoint::wooLatepointShowServices( '', $this->order, false );
			$shortcode['[yaymail_woo_latepoint_show_service_categories]'] = WooLatepoint::wooLatepointShowServiceCategories( '', $this->order, false );

			$shortcode['[yaymail_woo_latepoint_selected_location]']         = WooLatepoint::wooLatepointSelectedLocation( '', $this->order, false );
			$shortcode['[yaymail_woo_latepoint_selected_agent]']            = WooLatepoint::wooLatepointSelectedAgent( '', $this->order, false );
			$shortcode['[yaymail_woo_latepoint_selected_service]']          = WooLatepoint::wooLatepointSelectedService( '', $this->order, false );
			$shortcode['[yaymail_woo_latepoint_selected_service_category]'] = WooLatepoint::wooLatepointSelectedServiceCategory( '', $this->order, false );
			$shortcode['[yaymail_woo_latepoint_selected_duration]']         = WooLatepoint::wooLatepointSelectedDuration( '', $this->order, false );
			$shortcode['[yaymail_woo_latepoint_selected_total_attendees]']  = WooLatepoint::wooLatepointSelectedTotalAttendees( '', $this->order, false );

			$shortcode['[yaymail_woo_latepoint_calendar_start_date]'] = WooLatepoint::wooLatepointCalendarStartDate( '', $this->order, false );
			$shortcode['[yaymail_woo_latepoint_hide_side_panel]']     = WooLatepoint::wooLatepointHideSidePanel( '', $this->order, false );
			$shortcode['[yaymail_woo_latepoint_hide_summary]']        = WooLatepoint::wooLatepointHideSummary( '', $this->order, false );
		}

		// ADDITIONAL ORDER META:
		$order         = CustomPostType::getListOrders();
		$order_metaArr = get_post_meta( isset( $order[0]['id'] ) ? $order[0]['id'] : '' );
		if ( is_array( $order_metaArr ) && count( $order_metaArr ) > 0 ) {
			foreach ( $order_metaArr as $k => $v ) {
				$nameField    = str_replace( ' ', '_', trim( $k ) );
				$nameShorcode = '[yaymail_post_meta:' . $nameField . ']';

				// when array $v has tow value ???
				if ( is_array( $v ) && count( $v ) > 0 ) {
					$shortcode[ $nameShorcode ] = trim( $v[0] );
				} else {
					$shortcode[ $nameShorcode ] = trim( $v );
				}
			}
		}

		$this->order_data = $shortcode;
	}

	public function ordetItemTables( $order, $default_args ) {
		$is_preview      = Helper::isPreview( $this->preview_mail );
		$postID          = CustomPostType::postIDByTemplate( $this->template );
		$text_link_color = get_post_meta( $postID, '_yaymail_email_textLinkColor_settings', true ) ? get_post_meta( $postID, '_yaymail_email_textLinkColor_settings', true ) : '#7f54b3';
		$items           = $order->get_items();
		if ( $is_preview ) {
			$path = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/email-order-items-preview.php';
		} else {
			$path = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/email-order-items.php';
		}

		$yaymail_settings = get_option( 'yaymail_settings' );

		$show_product_image            = isset( $yaymail_settings['product_image'] ) ? $yaymail_settings['product_image'] : 0;
		$show_product_sku              = isset( $yaymail_settings['product_sku'] ) ? $yaymail_settings['product_sku'] : 0;
		$show_product_des              = isset( $yaymail_settings['product_des'] ) ? $yaymail_settings['product_des'] : 0;
		$default_args['image_size'][0] = isset( $yaymail_settings['image_width'] ) ? $yaymail_settings['image_width'] : 32;
		$default_args['image_size'][1] = isset( $yaymail_settings['image_height'] ) ? $yaymail_settings['image_height'] : 32;
		$default_args['image_size'][2] = isset( $yaymail_settings['image_size'] ) ? $yaymail_settings['image_size'] : 'thumbnail';

		$args = array(
			'order'                         => $order,
			'items'                         => $order->get_items(),
			'show_download_links'           => $order->is_download_permitted() && ! $default_args['sent_to_admin'],
			'show_sku'                      => $show_product_sku,
			'show_des'                      => $show_product_des,
			'show_purchase_note'            => $order->is_paid() && ! $default_args['sent_to_admin'],
			'show_image'                    => $show_product_image,
			'image_size'                    => $default_args['image_size'],
			'plain_text'                    => $default_args['plain_text'],
			'sent_to_admin'                 => $default_args['sent_to_admin'],
			'order_item_table_border_color' => isset( $yaymail_settings['background_color_table_items'] ) ? $yaymail_settings['background_color_table_items'] : '#dddddd',
			'text_link_color'               => $text_link_color,
		);
		include $path;
	}
	public function itemsBorder( $atts, $order, $sent_to_admin = '' ) {
		if ( null === $order ) {
			ob_start();
			$path = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/sampleOrder/email-order-details-border.php';
			include $path;
			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		} else {
			ob_start();
			$path = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/email-order-details-border.php';
			include $path;
			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		}

	}

	/* Link Downloadable Product - start */
	public function itemsDownloadableTitle( $atts, $order, $sent_to_admin = '', $items = array() ) {
		if ( null !== $order ) {
			$items     = $order->get_items();
			$downloads = $order->get_downloadable_items();
		}
		ob_start();
		$path = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/email-order-item-download-title.php';
		include $path;
		$html = ob_get_contents();
		ob_end_clean();
		return $html;
	}
	public function itemsDownloadableProduct( $atts, $order, $sent_to_admin = '', $items = array() ) {
		if ( null === $order ) {
			ob_start();
			$path = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/sampleOrder/email-order-item-download.php';
			include $path;
			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		} else {
			if ( class_exists( 'WC_Subscription' ) ) {
				add_filter(
					'woocommerce_order_is_download_permitted',
					function( $value ) {
						return true;
					},
					100
				);
			}

			$items = $order->get_items();
			ob_start();
			$downloads = $order->get_downloadable_items();
			$path      = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/email-order-item-download.php';
			include $path;
			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		}
	}

	/* Order items border - start */
	public function itemsBorderBefore( $atts, $order, $sent_to_admin = '' ) {
		if ( null === $order ) {
			return '';
		} else {
			ob_start();
			$path = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/email-order-details-border-before.php';
			include $path;
			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		}
	}

	public function itemsBorderAfter( $atts, $order, $sent_to_admin = '' ) {
		if ( null === $order ) {
			return '';
		} else {
			ob_start();
			$path = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/email-order-details-border-after.php';
			include $path;
			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		}
	}

	public function itemsBorderTitle( $atts, $order, $sent_to_admin = '' ) {
		if ( null === $order ) {
			ob_start();
			$path = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/sampleOrder/email-order-details-border-title.php';
			include $path;
			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		} else {
			ob_start();
			$path = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/email-order-details-border-title.php';
			include $path;
			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		}
	}

	public function itemsBorderContent( $atts, $order, $sent_to_admin = '' ) {
		if ( null === $order ) {
			ob_start();
			$path = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/sampleOrder/email-order-details-border-content.php';
			include $path;
			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		} else {
			ob_start();
			$path = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/email-order-details-border-content.php';
			include $path;
			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		}
	}
	/* Order items border - end */

	public function billingShippingAddress( $atts, $order ) {
		$postID          = CustomPostType::postIDByTemplate( $this->template );
		$text_link_color = get_post_meta( $postID, '_yaymail_email_textLinkColor_settings', true ) ? get_post_meta( $postID, '_yaymail_email_textLinkColor_settings', true ) : '#7f54b3';
		if ( null !== $order ) {
			$shipping_address = class_exists( 'Flexible_Checkout_Fields_Disaplay_Options' ) ? $this->shipping_address : $order->get_formatted_shipping_address();
			$billing_address  = class_exists( 'Flexible_Checkout_Fields_Disaplay_Options' ) ? $this->billing_address : $order->get_formatted_billing_address();
			if ( $order->get_billing_phone() ) {
				$billing_address .= "<br/> <a href='tel:" . esc_html( $order->get_billing_phone() ) . "' style='color:" . esc_attr( $text_link_color ) . "; font-weight: normal; text-decoration: underline;'>" . esc_html( $order->get_billing_phone() ) . '</a>';
			}
			if ( $order->get_billing_email() ) {
				$billing_address .= "<br/><a href='mailto:" . esc_html( $order->get_billing_email() ) . "' style='color:" . esc_attr( $text_link_color ) . ";font-weight: normal; text-decoration: underline;'>" . esc_html( $order->get_billing_email() ) . '</a>';
			}
		} else {
			$billing_address  = "John Doe<br/>YayCommerce<br/>7400 Edwards Rd<br/>Edwards Rd<br/><a href='tel:+18587433828' style='color: " . esc_attr( $text_link_color ) . "; font-weight: normal; text-decoration: underline;'>(910) 529-1147</a><br/>";
			$shipping_address = "John Doe<br/>YayCommerce<br/>755 E North Grove Rd<br/>Mayville, Michigan<br/><a href='tel:+18587433828' style='color: " . esc_attr( $text_link_color ) . "; font-weight: normal; text-decoration: underline;'>(910) 529-1147</a><br/>";
		}
		ob_start();
		$path  = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/email-billing-shipping-address.php';
		$order = $this->order;
		include $path;
		$html = ob_get_contents();
		ob_end_clean();
		return $html;

	}

	/* Billing Shipping Address - start */
	public function billingShippingAddressTitle( $atts, $order ) {
		$postID          = CustomPostType::postIDByTemplate( $this->template );
		$text_link_color = get_post_meta( $postID, '_yaymail_email_textLinkColor_settings', true ) ? get_post_meta( $postID, '_yaymail_email_textLinkColor_settings', true ) : '#7f54b3';
		if ( null !== $order ) {
			$shipping_address = class_exists( 'Flexible_Checkout_Fields_Disaplay_Options' ) ? $this->shipping_address : $order->get_formatted_shipping_address();
			$billing_address  = class_exists( 'Flexible_Checkout_Fields_Disaplay_Options' ) ? $this->billing_address : $order->get_formatted_billing_address();
		} else {
			$billing_address  = "John Doe<br/>YayCommerce<br/>7400 Edwards Rd<br/>Edwards Rd<br/><a href='tel:+18587433828' style='color: " . esc_attr( $text_link_color ) . "; font-weight: normal; text-decoration: underline;'>(910) 529-1147</a><br/>";
			$shipping_address = "John Doe<br/>YayCommerce<br/>755 E North Grove Rd<br/>Mayville, Michigan<br/><a href='tel:+18587433828' style='color: " . esc_attr( $text_link_color ) . "; font-weight: normal; text-decoration: underline;'>(910) 529-1147</a><br/>";
		}
		ob_start();
		$path  = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/email-billing-shipping-address-title.php';
		$order = $this->order;
		include $path;
		$html = ob_get_contents();
		ob_end_clean();
		return $html;
	}

	public function checkBillingShippingAddress( $atts, $order_id ) {
		$isShippingAddress = false;
		$isBillingAddress  = false;

		if ( ! empty( $billing_address ) ) {
			$isBillingAddress = true;
		}
		if ( ! empty( $shipping_address ) ) {
			$isShippingAddress = true;
		}

		$args = array(
			'isShippingAddress' => $isShippingAddress,
			'isBillingAddress'  => $isBillingAddress,
		);

		return 'Checking_here';
	}

	public function billingShippingAddressContent( $atts, $order ) {
		$postID          = CustomPostType::postIDByTemplate( $this->template );
		$text_link_color = get_post_meta( $postID, '_yaymail_email_textLinkColor_settings', true ) ? get_post_meta( $postID, '_yaymail_email_textLinkColor_settings', true ) : '#7f54b3';
		$is_preview      = Helper::isPreview( $this->preview_mail );
		if ( $is_preview ) {
			if ( null !== $order ) {
				$shipping_address = class_exists( 'Flexible_Checkout_Fields_Disaplay_Options' ) ? $this->shipping_address : $order->get_formatted_shipping_address();
				$billing_address  = class_exists( 'Flexible_Checkout_Fields_Disaplay_Options' ) ? $this->billing_address : $order->get_formatted_billing_address();
			} else {
				$billing_address  = 'John Doe<br/>YayCommerce<br/>7400 Edwards Rd<br/>Edwards Rd<br/>';
				$shipping_address = 'John Doe<br/>YayCommerce<br/>755 E North Grove Rd<br/>Mayville, Michigan<br/>';
			}
			ob_start();
			$path  = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/email-billing-shipping-address-content-preview.php';
			$order = $this->order;
			include $path;
			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		} else {
			if ( null !== $order ) {
				$shipping_address = class_exists( 'Flexible_Checkout_Fields_Disaplay_Options' ) ? $this->shipping_address : $order->get_formatted_shipping_address();
				$billing_address  = class_exists( 'Flexible_Checkout_Fields_Disaplay_Options' ) ? $this->billing_address : $order->get_formatted_billing_address();
				if ( $order->get_billing_phone() ) {
					$billing_address .= "<br/> <a href='tel:" . esc_html( $order->get_billing_phone() ) . "' style='color:" . esc_attr( $text_link_color ) . "; font-weight: normal; text-decoration: underline;'>" . esc_html( $order->get_billing_phone() ) . '</a>';
				}
				if ( $order->get_billing_email() ) {
					$billing_address .= "<br/><a href='mailto:" . esc_html( $order->get_billing_email() ) . "' style='color:" . esc_attr( $text_link_color ) . ";font-weight: normal; text-decoration: underline;'>" . esc_html( $order->get_billing_email() ) . '</a>';
				}
				if ( method_exists( $order, 'get_shipping_phone' ) && ! empty( $order->get_shipping_phone() ) ) {
					if ( ! str_contains( $shipping_address, $order->get_shipping_phone() ) ) {
						$shipping_address .= "<br/> <a href='tel:" . esc_html( $order->get_shipping_phone() ) . "' style='color:" . esc_attr( $text_link_color ) . "; font-weight: normal; text-decoration: underline;'>" . esc_html( $order->get_shipping_phone() ) . '</a>';
					}
				}
				if ( metadata_exists( 'post', $order->get_id(), '_shipping_email' ) ) {
					if ( ! str_contains( $shipping_address, get_post_meta( $order->get_id(), '_shipping_email', true ) ) ) {
						$shipping_address .= "<br/><a href='mailto:" . esc_html( get_post_meta( $order->get_id(), '_shipping_email', true ) ) . "' style='color:" . esc_attr( $text_link_color ) . ";font-weight: normal; text-decoration: underline;'>" . esc_html( get_post_meta( $order->get_id(), '_shipping_email', true ) ) . '</a>';
					}
				}
			} else {
				$billing_address  = "John Doe<br/>YayCommerce<br/>7400 Edwards Rd<br/>Edwards Rd<br/><a href='tel:+18587433828' style='color: " . esc_attr( $text_link_color ) . "; font-weight: normal; text-decoration: underline;'>(910) 529-1147</a><br/>";
				$shipping_address = "John Doe<br/>YayCommerce<br/>755 E North Grove Rd<br/>Mayville, Michigan<br/><a href='tel:+18587433828' style='color: " . esc_attr( $text_link_color ) . "; font-weight: normal; text-decoration: underline;'>(910) 529-1147</a><br/>";
			}
			ob_start();
			$path  = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/email-billing-shipping-address-content.php';
			$order = $this->order;
			include $path;
			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		}
	}
	/* Billing Shipping Address - end */

	public function orderItems( $items, $sent_to_admin = '', $checkOrder = '', $is_display = true ) {
		if ( 'sampleOrder' === $checkOrder ) {
			ob_start();
			$path  = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/sampleOrder/email-order-details.php';
			$order = $this->order;
			include $path;
			$html = ob_get_contents();
			ob_end_clean();
			return $html;

		} else {
			ob_start();
			$path  = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/email-order-details.php';
			$order = $this->order;
			include $path;
			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		}

	}
	public function getOrderCustomerNotes( $customerNotes ) {
		ob_start();
		foreach ( $customerNotes as $customerNote ) {
			?>
			
				<?php echo wp_kses_post( wpautop( wptexturize( make_clickable( $customerNote->comment_content ) ) ) ); ?>
			
			<?php
		}
		$html = ob_get_contents();
		ob_end_clean();
		return $html;
	}

	/*  Woocommerce Hook - End */

	public function woocommerceEmailOrderMeta( $attr, $sent_to_admin = '', $checkOrder = '', $args = '' ) {
		if ( 'sampleOrder' === $checkOrder ) {
			return '[woocommerce_email_order_meta]';
		} else {
			$order = $this->order;
			ob_start();
			$path = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/wc-email-order-meta.php';
			include $path;
			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		}
	}

	public function woocommerceEmailOrderDetails( $attr, $sent_to_admin = '', $checkOrder = '', $args = '' ) {
		if ( 'sampleOrder' === $checkOrder ) {
			return '[woocommerce_email_order_details]';
		} else {
			$order = $this->order;
			ob_start();
			$path = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/wc-email-order-detail.php';
			include $path;
			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		}
	}
	public function woocommerceEmailBeforeOrderTable( $attr, $sent_to_admin = '', $checkOrder = '', $args = '' ) {
		if ( 'sampleOrder' === $checkOrder ) {
			return '[woocommerce_email_before_order_table]';
		} else {
			$order = $this->order;
			ob_start();
			$path = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/wc-email-before.php';
			include $path;
			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		}
	}
	public function woocommerceEmailAfterOrderTable( $attr, $sent_to_admin = '', $checkOrder = '', $args = '' ) {
		if ( 'sampleOrder' === $checkOrder ) {
			return '[woocommerce_email_after_order_table]';
		} else {
			$order = $this->order;
			ob_start();
			$path = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/wc-email-after.php';
			include $path;
			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		}
	}
	public function getHeading( $args, $order, $sent_to_admin ) {
		if ( isset( $args['email_heading'] ) && ! empty( $args ) ) {
			$email_heading = $args['email_heading'];
		} else {
			if ( isset( $order ) ) {
				$orderID       = $order->get_id();
				$email_heading = 'Order Refunded: ' . $order->get_id();
			} else {
				$email_heading = 'Order Refunded: 1';
			}
		}
		return $email_heading;
	}
	public function orderCouponCodes( $args, $order ) {
		if ( isset( $order ) && method_exists( $order, 'get_coupon_codes' ) && ! empty( $order->get_coupon_codes() ) ) {
			$coupon_codes = $order->get_coupon_codes();
			ob_start();
			foreach ( $coupon_codes as $key => $value ) {
				?>
					<?php echo wp_kses_post( $value ); ?>
				<?php
			}
			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		}

	}
	public function orderPaymentInstructions( $order, $sent_to_admin = false ) {
		if ( null === $order ) {
			return '';
		} else {
			ob_start();
			$path = YAYMAIL_PLUGIN_PATH . 'views/templates/emails/email-order-payment-gateways.php';
			include $path;
			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		}
	}

}

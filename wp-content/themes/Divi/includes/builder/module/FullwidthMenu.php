<?php

class ET_Builder_Module_Fullwidth_Menu extends ET_Builder_Module {
	/**
	 * Menu module slug.
	 *
	 * @var string
	 */
	protected static $menu_slug = 'et_pb_fullwidth_menu';

	function init() {
		$this->name       = esc_html__( 'Fullwidth Menu', 'et_builder' );
		$this->plural     = esc_html__( 'Fullwidth Menus', 'et_builder' );
		$this->slug       = self::$menu_slug;
		$this->vb_support = 'on';
		$this->fullwidth  = true;

		$this->main_css_element = '%%order_class%%.' . self::$menu_slug;

		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'main_content' => et_builder_i18n( 'Content' ),
					'image'        => esc_html__( 'Logo', 'et_builder' ),
					'elements'     => et_builder_i18n( 'Elements' ),
				),
			),
			'advanced'   => array(
				'toggles' => array(
					'layout'         => array(
						'title'    => et_builder_i18n( 'Layout' ),
						'priority' => 19,
					),
					'menu'           => array(
						'title'    => esc_html__( 'Menu Text', 'et_builder' ),
						'priority' => 29,
					),
					'dropdown'       => array(
						'title'    => esc_html__( 'Dropdown Menu', 'et_builder' ),
						'priority' => 39,
					),
					'icon_settings'  => array(
						'title'    => esc_html__( 'Icons', 'et_builder' ),
						'priority' => 49,
					),
					'image_settings' => array(
						'title'    => esc_html__( 'Logo', 'et_builder' ),
						'priority' => 59,
					),
				),
			),
			'custom_css' => array(
				'toggles' => array(
					'animation'  => array(
						'title'    => esc_html__( 'Animation', 'et_builder' ),
						'priority' => 90,
					),
					'attributes' => array(
						'title'    => esc_html__( 'Attributes', 'et_builder' ),
						'priority' => 95,
					),
				),
			),
		);

		$this->advanced_fields = array(
			'fonts'      => array(
				'menu' => array(
					'label'           => esc_html__( 'Menu', 'et_builder' ),
					'css'             => array(
						'main'         => "{$this->main_css_element} ul li a",
						'limited_main' => "{$this->main_css_element} ul li a, {$this->main_css_element} ul li",
						'hover'        => "{$this->main_css_element} ul li:hover a",
					),
					'line_height'     => array(
						'default' => '1em',
					),
					'font_size'       => array(
						'default'        => '14px',
						'range_settings' => array(
							'min'  => '12',
							'max'  => '24',
							'step' => '1',
						),
					),
					'letter_spacing'  => array(
						'default'        => '0px',
						'range_settings' => array(
							'min'  => '0',
							'max'  => '8',
							'step' => '1',
						),
					),
					'hide_text_align' => true,
				),
			),
			'background' => array(
				'options' => array(
					'background_color' => array(
						'default' => '#ffffff',
					),
				),
			),
			'borders'    => array(
				'default' => array(),
				'image'   => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .et_pb_menu__logo-wrap .et_pb_menu__logo img',
							'border_styles' => '%%order_class%% .et_pb_menu__logo-wrap .et_pb_menu__logo img',
						),
					),
					'label_prefix' => esc_html__( 'Logo', 'et_builder' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'image_settings',
				),
			),
			'box_shadow' => array(
				'default' => array(
					'css' => array(
						'main'    => '%%order_class%%, %%order_class%% .sub-menu',
						'overlay' => 'inset',
					),
				),
				'image'   => array(
					'label'           => esc_html__( 'Logo Box Shadow', 'et_builder' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'image_settings',
					'css'             => array(
						'main'    => '%%order_class%% .et_pb_menu__logo-wrap .et_pb_menu__logo',
						'overlay' => 'inset',
					),
				),
			),
			'text'       => array(
				'use_background_layout' => true,
				'toggle_slug'           => 'menu',
				'options'               => array(
					'text_orientation'  => array(
						'default_on_front' => 'left',
						'depends_show_if'  => 'left_aligned',
						'depends_on'       => array(
							'menu_style',
						),
					),
					'background_layout' => array(
						'default_on_front' => 'light',
						'hover'            => 'tabs',
					),
				),
			),
			'filters'    => array(
				'child_filters_target' => array(
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'image_settings',
					'css'         => array(
						'main' => '%%order_class%% .et_pb_menu__logo-wrap img',
					),
				),
			),
			'image'      => array(
				'css' => array(
					'main' => '%%order_class%% .et_pb_menu__logo-wrap img',
				),
			),
			'button'     => false,
		);

		$this->custom_css_fields = array(
			'menu_link'          => array(
				'label'    => esc_html__( 'Menu Link', 'et_builder' ),
				'selector' => '.et-menu-nav li a',
			),
			'active_menu_link'   => array(
				'label'    => esc_html__( 'Active Menu Link', 'et_builder' ),
				'selector' => '.et-menu-nav li.current-menu-item a',
			),
			'dropdown_container' => array(
				'label'    => esc_html__( 'Dropdown Menu Container', 'et_builder' ),
				'selector' => '.et-menu-nav li ul.sub-menu',
			),
			'dropdown_links'     => array(
				'label'    => esc_html__( 'Dropdown Menu Links', 'et_builder' ),
				'selector' => '.et-menu-nav li ul.sub-menu a',
			),
			'menu_logo'          => array(
				'label'    => esc_html__( 'Menu Logo', 'et_builder' ),
				'selector' => '.et_pb_menu__logo',
			),
		);

		$this->help_videos = array(
			array(
				'id'   => 'Q2heZC2GbNg',
				'name' => esc_html__( 'An introduction to the Fullwidth Menu module', 'et_builder' ),
			),
		);
	}


	function get_fields() {
		$et_accent_color = et_builder_accent_color();

		$fields = array(
			'menu_id'                         => array(
				'label'            => esc_html__( 'Menu', 'et_builder' ),
				'type'             => 'select',
				'option_category'  => 'basic_option',
				'options'          => et_builder_get_nav_menus_options(),
				'description'      => sprintf(
					'<p class="description">%2$s. <a href="%1$s" target="_blank">%3$s</a>.</p>',
					esc_url( admin_url( 'nav-menus.php' ) ),
					esc_html__( 'Select a menu that should be used in the module', 'et_builder' ),
					esc_html__( 'Click here to create new menu', 'et_builder' )
				),
				'toggle_slug'      => 'main_content',
				'computed_affects' => array(
					'__menu',
				),
			),
			'menu_style'                      => array(
				'label'           => esc_html__( 'Style', 'et_builder' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'left_aligned'         => esc_html__( 'Left Aligned', 'et_builder' ),
					'centered'             => esc_html__( 'Centered', 'et_builder' ),
					'inline_centered_logo' => esc_html__( 'Inline Centered Logo', 'et_builder' ),
				),
				'default'         => 'left_aligned',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout',
			),
			'submenu_direction'               => array(
				'label'            => esc_html__( 'Dropdown Menu Direction', 'et_builder' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'downwards' => esc_html__( 'Downwards', 'et_builder' ),
					'upwards'   => esc_html__( 'Upwards', 'et_builder' ),
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'layout',
				'description'      => esc_html__( 'Here you can choose the direction that your sub-menus will open. You can choose to have them open downwards or upwards.', 'et_builder' ),
				'computed_affects' => array(
					'__menu',
				),
			),
			'fullwidth_menu'                  => array(
				'label'           => esc_html__( 'Make Menu Links Fullwidth', 'et_builder' ),
				'description'     => esc_html__( 'Menu width is limited by your website content width. Enabling this option will extend the menu the full width of the browser window.', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'off' => et_builder_i18n( 'No' ),
					'on'  => et_builder_i18n( 'Yes' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout',
			),
			'active_link_color'               => array(
				'label'          => esc_html__( 'Active Link Color', 'et_builder' ),
				'description'    => esc_html__( 'An active link is the page currently being visited. You can pick a color to be applied to active links to differentiate them from other links.', 'et_builder' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'menu',
				'hover'          => 'tabs',
				'mobile_options' => true,
			),
			'dropdown_menu_bg_color'          => array(
				'label'        => esc_html__( 'Dropdown Menu Background Color', 'et_builder' ),
				'description'  => esc_html__( 'Pick a color to be applied to the background of dropdown menus. Dropdown menus appear when hovering over links with sub items.', 'et_builder' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'dropdown',
				'hover'        => 'tabs',
			),
			'dropdown_menu_line_color'        => array(
				'label'          => esc_html__( 'Dropdown Menu Line Color', 'et_builder' ),
				'description'    => esc_html__( 'Pick a color to be used for the dividing line between links in dropdown menus. Dropdown menus appear when hovering over links with sub items.', 'et_builder' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dropdown',
				'hover'          => 'tabs',
				'mobile_options' => true,
			),
			'dropdown_menu_text_color'        => array(
				'label'        => esc_html__( 'Dropdown Menu Text Color', 'et_builder' ),
				'description'  => esc_html__( 'Pick a color to be used for links in dropdown menus. Dropdown menus appear when hovering over links with sub items.', 'et_builder' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'dropdown',
				'hover'        => 'tabs',
			),
			'dropdown_menu_active_link_color' => array(
				'label'        => esc_html__( 'Dropdown Menu Active Link Color', 'et_builder' ),
				'description'  => esc_html__( 'Pick a color to be used for active links in dropdown menus. Dropdown menus appear when hovering over links with sub items.', 'et_builder' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'dropdown',
				'hover'        => 'tabs',
			),
			'mobile_menu_bg_color'            => array(
				'label'          => esc_html__( 'Mobile Menu Background Color', 'et_builder' ),
				'description'    => esc_html__( 'Pick a unique color to be used for the menu background color when viewed on a mobile device.', 'et_builder' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dropdown',
				'hover'          => 'tabs',
				'mobile_options' => true,
			),
			'mobile_menu_text_color'          => array(
				'label'          => esc_html__( 'Mobile Menu Text Color', 'et_builder' ),
				'description'    => esc_html__( 'Pick a color to be used for links in mobile menus.', 'et_builder' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dropdown',
				'hover'          => 'tabs',
				'mobile_options' => true,
			),
			'__menu'                          => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'ET_Builder_Module_Fullwidth_Menu', 'get_fullwidth_menu' ),
				'computed_depends_on' => array(
					'menu_id',
					'submenu_direction',
				),
			),
			'logo'                            => array(
				'label'              => esc_html__( 'Logo', 'et_builder' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => et_builder_i18n( 'Upload an image' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'et_builder' ),
				'update_text'        => esc_attr__( 'Set As Logo', 'et_builder' ),
				'description'        => esc_html__( 'Upload an image to display beside your menu.', 'et_builder' ),
				'toggle_slug'        => 'image',
				'dynamic_content'    => 'image',
				'mobile_options'     => true,
				'hover'              => 'tabs',
			),
			'logo_url'                        => array(
				'label'           => esc_html__( 'Logo Link URL', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'If you would like to make your logo a link, input your destination URL here.', 'et_builder' ),
				'toggle_slug'     => 'link_options',
				'dynamic_content' => 'url',
			),
			'logo_url_new_window'             => array(
				'label'            => esc_html__( 'Logo Link Target', 'et_builder' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'In The Same Window', 'et_builder' ),
					'on'  => esc_html__( 'In The New Tab', 'et_builder' ),
				),
				'toggle_slug'      => 'link_options',
				'description'      => esc_html__( 'Here you can choose whether or not your link opens in a new window', 'et_builder' ),
				'default_on_front' => 'off',
			),
			'logo_alt'                        => array(
				'label'           => esc_html__( 'Logo Alt Text', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Define the HTML ALT text for your logo here.', 'et_builder' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'attributes',
				'dynamic_content' => 'text',
			),
			'logo_max_width'                  => array(
				'label'           => esc_html__( 'Logo Max Width', 'et_builder' ),
				'description'     => esc_html__( 'Adjust the maximum width of the logo.', 'et_builder' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'width',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'allowed_values'  => et_builder_get_acceptable_css_string_values( 'max-width' ),
				'default'         => '100%',
				'default_unit'    => '%',
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'responsive'      => true,
				'hover'           => 'tabs',
			),
			'logo_max_height'                 => array(
				'label'           => esc_html__( 'Logo Max Height', 'et_builder' ),
				'description'     => esc_html__( 'Adjust the maximum height of the logo.', 'et_builder' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'width',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'allowed_values'  => et_builder_get_acceptable_css_string_values( 'max-height' ),
				'default'         => 'none',
				'default_unit'    => 'px',
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '200',
					'step' => '1',
				),
				'responsive'      => true,
				'hover'           => 'tabs',
			),
			'show_cart_icon'                  => array(
				'label'           => esc_html__( 'Show Shopping Cart Icon', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'on'  => et_builder_i18n( 'Yes' ),
					'off' => et_builder_i18n( 'No' ),
				),
				'default'         => 'off',
				'toggle_slug'     => 'elements',
				'mobile_options'  => true,
				'responsive'      => true,
				'hover'           => 'tabs',
			),
			'show_search_icon'                => array(
				'label'           => esc_html__( 'Show Search Icon', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'on'  => et_builder_i18n( 'Yes' ),
					'off' => et_builder_i18n( 'No' ),
				),
				'default'         => 'off',
				'toggle_slug'     => 'elements',
				'mobile_options'  => true,
				'responsive'      => true,
				'hover'           => 'tabs',
			),
			'cart_icon_color'                 => array(
				'default'        => $et_accent_color,
				'label'          => esc_html__( 'Shopping Cart Icon Color', 'et_builder' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom color for your shopping cart icon.', 'et_builder' ),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'icon_settings',
				'hover'          => 'tabs',
				'mobile_options' => true,
			),
			'search_icon_color'               => array(
				'default'        => $et_accent_color,
				'label'          => esc_html__( 'Search Icon Color', 'et_builder' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom color for your search icon.', 'et_builder' ),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'icon_settings',
				'hover'          => 'tabs',
				'mobile_options' => true,
			),
			'menu_icon_color'                 => array(
				'default'        => $et_accent_color,
				'label'          => esc_html__( 'Hamburger Menu Icon Color', 'et_builder' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom color for your hamburger menu icon.', 'et_builder' ),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'icon_settings',
				'hover'          => 'tabs',
				'mobile_options' => true,
			),
			'cart_icon_font_size'             => array(
				'label'            => esc_html__( 'Shopping Cart Icon Font Size', 'et_builder' ),
				'description'      => esc_html__( 'Control the size of the icon by increasing or decreasing the font size.', 'et_builder' ),
				'type'             => 'range',
				'option_category'  => 'font_option',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'icon_settings',
				'default'          => '17px',
				'default_unit'     => 'px',
				'default_on_front' => '',
				'allowed_units'    => et_builder_get_acceptable_css_string_values( 'font-size' ),
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'mobile_options'   => true,
				'responsive'       => true,
				'hover'            => 'tabs',
			),
			'search_icon_font_size'           => array(
				'label'            => esc_html__( 'Search Icon Font Size', 'et_builder' ),
				'description'      => esc_html__( 'Control the size of the icon by increasing or decreasing the font size.', 'et_builder' ),
				'type'             => 'range',
				'option_category'  => 'font_option',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'icon_settings',
				'default'          => '17px',
				'default_unit'     => 'px',
				'default_on_front' => '',
				'allowed_units'    => et_builder_get_acceptable_css_string_values( 'font-size' ),
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'mobile_options'   => true,
				'responsive'       => true,
				'hover'            => 'tabs',
			),
			'menu_icon_font_size'             => array(
				'label'            => esc_html__( 'Hamburger Menu Icon Font Size', 'et_builder' ),
				'description'      => esc_html__( 'Control the size of the icon by increasing or decreasing the font size.', 'et_builder' ),
				'type'             => 'range',
				'option_category'  => 'font_option',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'icon_settings',
				'default'          => '32px',
				'default_unit'     => 'px',
				'default_on_front' => '',
				'allowed_units'    => et_builder_get_acceptable_css_string_values( 'font-size' ),
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'mobile_options'   => true,
				'responsive'       => true,
				'hover'            => 'tabs',
			),
		);

		return $fields;
	}

	public function get_transition_fields_css_props() {
		$menu_slug = self::$menu_slug;
		$fields    = parent::get_transition_fields_css_props();

		$fields['active_link_color']               = array( 'color' => "%%order_class%%.{$menu_slug} ul li.current-menu-item a" );
		$fields['dropdown_menu_text_color']        = array( 'color' => "%%order_class%%.{$menu_slug} .nav li ul a" );
		$fields['dropdown_menu_active_link_color'] = array( 'color' => "%%order_class%%.{$menu_slug} .nav li ul li.current-menu-item a" );

		$fields['logo_max_width']  = array( 'max-width' => '%%order_class%% .et_pb_row > .et_pb_menu__logo-wrap .et_pb_menu__logo, %%order_class%% .et_pb_menu__logo-slot' );
		$fields['logo_max_height'] = array( 'max-height' => '%%order_class%% .et_pb_row > .et_pb_menu__logo-wrap .et_pb_menu__logo img, %%order_class%% .et_pb_menu__logo-slot .et_pb_menu__logo-wrap img' );

		$fields['menu_icon_color']   = array(
			'color' => '%%order_class%% .mobile_menu_bar:before',
		);
		$fields['search_icon_color'] = array(
			'color' => '%%order_class%% .et_pb_menu__icon.et_pb_menu__search-button, %%order_class%% .et_pb_menu__icon.et_pb_menu__close-search-button',
		);
		$fields['cart_icon_color']   = array(
			'color' => '%%order_class%% .et_pb_menu__icon.et_pb_menu__cart-button',
		);

		$fields['menu_icon_font_size']   = array(
			'font-size' => '%%order_class%% .mobile_menu_bar:before',
		);
		$fields['search_icon_font_size'] = array(
			'font-size' => '%%order_class%% .et_pb_menu__icon.et_pb_menu__search-button, %%order_class%% .et_pb_menu__icon.et_pb_menu__close-search-button',
		);
		$fields['cart_icon_font_size']   = array(
			'font-size' => '%%order_class%% .et_pb_menu__icon.et_pb_menu__cart-button',
		);

		return $fields;
	}

	/**
	 * Add the class with page ID to menu item so it can be easily found by ID in Frontend Builder
	 *
	 * @return menu item object
	 */
	static function modify_fullwidth_menu_item( $menu_item ) {
		// Since PHP 7.1 silent conversion to array is no longer supported.
		$menu_item->classes = (array) $menu_item->classes;

		if ( esc_url( home_url( '/' ) ) === $menu_item->url ) {
			$fw_menu_custom_class = 'et_pb_menu_page_id-home';
		} else {
			$fw_menu_custom_class = 'et_pb_menu_page_id-' . $menu_item->object_id;
		}

		$menu_item->classes[] = $fw_menu_custom_class;
		return $menu_item;
	}

	/**
	 * Get menu markup for menu module
	 *
	 * @return string of menu markup
	 */
	static function get_fullwidth_menu( $args = array() ) {
		$is_fullwidth = 'et_pb_fullwidth_menu' === self::$menu_slug;
		$defaults     = array(
			'submenu_direction' => '',
			'menu_id'           => '',
		);

		// modify the menu item to include the required data
		add_filter( 'wp_setup_nav_menu_item', array( 'ET_Builder_Module_Fullwidth_Menu', 'modify_fullwidth_menu_item' ) );

		$args      = wp_parse_args( $args, $defaults );
		$menu      = '<nav class="et-menu-nav">';
		$menuClass = 'et-menu nav';

		if ( $is_fullwidth ) {
			$menu      = '<nav class="et-menu-nav fullwidth-menu-nav">';
			$menuClass = 'et-menu fullwidth-menu nav';
		}

		// divi_disable_toptier option available in Divi theme only
		if ( ! et_is_builder_plugin_active() && 'on' === et_get_option( 'divi_disable_toptier' ) ) {
			$menuClass .= ' et_disable_top_tier';
		}
		$menuClass .= ( '' !== $args['submenu_direction'] ? sprintf( ' %s', esc_attr( $args['submenu_direction'] ) ) : '' );

		$menu_args = array(
			'theme_location' => 'primary-menu',
			'container'      => '',
			'fallback_cb'    => '',
			'menu_class'     => $menuClass,
			'menu_id'        => '',
			'echo'           => false,
		);

		if ( '' !== $args['menu_id'] ) {
			$menu_args['menu'] = (int) $args['menu_id'];
		}

		$filter     = $is_fullwidth ? 'et_fullwidth_menu_args' : 'et_menu_args';
		$primaryNav = wp_nav_menu( apply_filters( $filter, $menu_args ) );

		if ( empty( $primaryNav ) ) {
			$menu .= sprintf(
				'<ul class="%1$s">
					%2$s',
				esc_attr( $menuClass ),
				( ! et_is_builder_plugin_active() && 'on' === et_get_option( 'divi_home_link' )
					? sprintf(
						'<li%1$s><a href="%2$s">%3$s</a></li>',
						( is_home() ? ' class="current_page_item"' : '' ),
						esc_url( home_url( '/' ) ),
						esc_html__( 'Home', 'et_builder' )
					)
					: ''
				)
			);

			ob_start();

			// @todo: check if Fullwidth Menu module works fine with no menu selected in settings
			if ( et_is_builder_plugin_active() ) {
				wp_page_menu();
			} else {
				show_page_menu( $menuClass, false, false );
				show_categories_menu( $menuClass, false );
			}

			$menu .= ob_get_contents();

			$menu .= '</ul>';

			ob_end_clean();
		} else {
			$menu .= $primaryNav;
		}

		$menu .= '</nav>';

		remove_filter( 'wp_setup_nav_menu_item', array( 'ET_Builder_Module_Fullwidth_Menu', 'modify_fullwidth_menu_item' ) );

		return $menu;
	}

	/**
	 * Apply logo styles.
	 *
	 * @since 4.0
	 *
	 * @param string $render_slug
	 *
	 * @return void
	 */
	protected function apply_logo_styles( $render_slug ) {
		$max_width_selector = '%%order_class%% .et_pb_row > .et_pb_menu__logo-wrap .et_pb_menu__logo, %%order_class%% .et_pb_menu__logo-slot';
		$max_width_values   = et_pb_responsive_options()->get_property_values( $this->props, 'logo_max_width' );
		$max_width_hover    = $this->get_hover_value( 'logo_max_width' );

		$max_height_selector = '%%order_class%% .et_pb_row > .et_pb_menu__logo-wrap .et_pb_menu__logo img, %%order_class%% .et_pb_menu__logo-slot .et_pb_menu__logo-wrap img';
		$max_height_values   = et_pb_responsive_options()->get_property_values( $this->props, 'logo_max_height' );
		$max_height_hover    = $this->get_hover_value( 'logo_max_height' );

		// Remove default opacity if hover color is enabled for links.
		if ( et_builder_is_hover_enabled( 'menu_text_color', $this->props ) ) {
			$el_style = array(
				'selector'    => "{$this->main_css_element} nav > ul > li > a:hover",
				'declaration' => 'opacity: 1;',
			);
			ET_Builder_Element::set_style( $render_slug, $el_style );
		}

		if ( et_builder_is_hover_enabled( 'dropdown_menu_text_color', $this->props ) ) {
			$el_style = array(
				'selector'    => "{$this->main_css_element} nav > ul > li li a:hover",
				'declaration' => 'opacity: 1;',
			);
			ET_Builder_Element::set_style( $render_slug, $el_style );
		}

		if ( et_builder_is_hover_enabled( 'dropdown_menu_active_link_color', $this->props ) ) {
			$el_style = array(
				'selector'    => "{$this->main_css_element} nav > ul > li li.current-menu-item a:hover",
				'declaration' => 'opacity: 1;',
			);
			ET_Builder_Element::set_style( $render_slug, $el_style );
		}

		// Max width.
		et_pb_responsive_options()->generate_responsive_css( $max_width_values, $max_width_selector, 'max-width', $render_slug );

		if ( et_builder_is_hover_enabled( 'logo_max_width', $this->props ) ) {
			$el_style = array(
				'selector'    => et_pb_hover_options()->add_hover_to_selectors( $max_width_selector ),
				'declaration' => sprintf(
					'max-width: %1$s;',
					esc_html( $max_width_hover )
				),
			);
			ET_Builder_Element::set_style( $render_slug, $el_style );
		}

		// Max height.
		et_pb_responsive_options()->generate_responsive_css( $max_height_values, $max_height_selector, 'max-height', $render_slug );

		if ( et_builder_is_hover_enabled( 'logo_max_height', $this->props ) ) {
			$el_style = array(
				'selector'    => et_pb_hover_options()->add_hover_to_selectors( $max_height_selector ),
				'declaration' => sprintf(
					'max-height: %1$s;',
					esc_html( $max_height_hover )
				),
			);
			ET_Builder_Element::set_style( $render_slug, $el_style );
		}
	}

	/**
	 * Determine if icon is enabled.
	 *
	 * @since 4.0
	 *
	 * @param string $icon
	 *
	 * @return boolean
	 */
	protected function is_icon_enabled( $icon ) {
		$icon_show_prop = "show_{$icon}_icon";
		$values         = array_values( et_pb_responsive_options()->get_property_values( $this->props, $icon_show_prop, 'off', true ) );
		$values[]       = $this->get_hover_value( $icon_show_prop );
		return false !== strpos( join( $values ), 'on' );
	}

	/**
	 * Apply icon styles.
	 *
	 * @since 4.0
	 *
	 * @param string $render_slug
	 * @param string $icon
	 * @param string $selector
	 *
	 * @return void
	 */
	protected function apply_icon_styles( $render_slug, $icon, $selector ) {
		$font_size_prop = "{$icon}_icon_font_size";
		$color_prop     = "{$icon}_icon_color";

		if ( 'menu' !== $icon && $this->is_icon_enabled( $icon ) ) {
			$icon_show_prop = "show_{$icon}_icon";

			if ( et_pb_responsive_options()->is_responsive_enabled( $this->props, $icon_show_prop ) ) {
				$replacements = array(
					'"off"' => '"none"',
					'"on"'  => '"flex"',
				);
				$values       = et_pb_responsive_options()->get_property_values( $this->props, $icon_show_prop, 'off', true );
				$values       = json_decode( strtr( json_encode( $values ), $replacements ) );
				et_pb_responsive_options()->generate_responsive_css( $values, $selector, 'display', $render_slug, '', '' );
			}

			if ( et_builder_is_hover_enabled( $icon_show_prop, $this->props ) ) {
				$hover = ( 'on' === $this->get_hover_value( $icon_show_prop ) ) ? 'flex' : 'none';

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => str_replace( '%%order_class%%', '%%order_class%%:hover', $selector ),
						'declaration' => sprintf(
							'display: %1$s;',
							esc_html( $hover )
						),
					)
				);
			}
		}

		$font_size_values = et_pb_responsive_options()->get_property_values( $this->props, $font_size_prop );
		$font_size_hover  = $this->get_hover_value( $font_size_prop );

		$color_values = et_pb_responsive_options()->get_property_values( $this->props, $color_prop );
		$color_hover  = $this->get_hover_value( $color_prop );

		// Font size.
		et_pb_responsive_options()->generate_responsive_css( $font_size_values, $selector, 'font-size', $render_slug );

		if ( et_builder_is_hover_enabled( $font_size_prop, $this->props ) ) {
			$el_style = array(
				'selector'    => et_pb_hover_options()->add_hover_to_selectors( $selector ),
				'declaration' => sprintf(
					'font-size: %1$s;',
					esc_html( $font_size_hover )
				),
			);
			ET_Builder_Element::set_style( $render_slug, $el_style );
		}

		// Color.
		et_pb_responsive_options()->generate_responsive_css( $color_values, $selector, 'color', $render_slug, '', 'color' );

		if ( et_builder_is_hover_enabled( $color_prop, $this->props ) ) {
			$el_style = array(
				'selector'    => et_pb_hover_options()->add_hover_to_selectors( $selector ),
				'declaration' => sprintf(
					'color: %1$s;',
					esc_html( $color_hover )
				),
			);
			ET_Builder_Element::set_style( $render_slug, $el_style );
		}
	}

	/**
	 * Render logo.
	 *
	 * @since 4.0
	 *
	 * @return string
	 */
	protected function render_logo() {
		$multi_view          = et_pb_multi_view_options( $this );
		$logo_alt            = $this->props['logo_alt'];
		$logo_url            = $this->props['logo_url'];
		$logo_url_new_window = $this->props['logo_url_new_window'];

		$logo_html = $multi_view->render_element(
			array(
				'tag'            => 'img',
				'attrs'          => array(
					'src' => '{{logo}}',
					'alt' => $logo_alt,
				),
				'required'       => 'logo',
				'hover_selector' => '%%order_class%% .et_pb_menu__logo-wrap .et_pb_menu__logo img',
			)
		);

		if ( empty( $logo_html ) ) {
			return '';
		}

		if ( ! empty( $logo_url ) ) {
			$target = ( 'on' === $logo_url_new_window ) ? 'target="_blank"' : '';

			$logo_html = sprintf(
				'<a href="%1$s" %2$s>%3$s</a>',
				esc_url( $logo_url ),
				et_core_intentionally_unescaped( $target, 'fixed_string' ),
				et_core_esc_previously( $logo_html )
			);
		}

		$logo_html = sprintf(
			'<div class="et_pb_menu__logo-wrap">
			  <div class="et_pb_menu__logo">
				%1$s
			  </div>
			</div>',
			$logo_html
		);

		return $logo_html;
	}

	/**
	 * Render cart button.
	 *
	 * @since 4.0
	 *
	 * @return string
	 */
	protected function render_cart() {
		if ( ! $this->is_icon_enabled( 'cart' ) ) {
			return '';
		}

		if ( ! class_exists( 'woocommerce' ) || ! WC()->cart ) {
			return '';
		}

		$url    = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : WC()->cart->get_cart_url();
		$output = sprintf(
			'<a href="%1$s" class="et_pb_menu__icon et_pb_menu__cart-button"></a>',
			esc_url( $url )
		);

		/**
		 * Filter the cart icon output.
		 *
		 * @since 4.0.6
		 *
		 * @param string $output
		 * @param string $menu_slug
		 *
		 * @return string
		 */
		return apply_filters( 'et_pb_menu_module_cart_output', $output, self::$menu_slug );
	}

	/**
	 * Render search button.
	 *
	 * @since 4.0
	 *
	 * @return string
	 */
	protected function render_search() {
		if ( ! $this->is_icon_enabled( 'search' ) ) {
			return '';
		}

		return '<button type="button" class="et_pb_menu__icon et_pb_menu__search-button"></button>';
	}

	/**
	 * Render search form.
	 *
	 * @since 4.0
	 *
	 * @return string
	 */
	protected function render_search_form() {
		if ( ! $this->is_icon_enabled( 'search' ) ) {
			return '';
		}

		return sprintf(
			'<div class="et_pb_menu__search-container et_pb_menu__search-container--disabled">
				<div class="et_pb_menu__search">
					<form role="search" method="get" class="et_pb_menu__search-form" action="%1$s">
						<input type="search" class="et_pb_menu__search-input" placeholder="%2$s" name="s" title="%3$s" />
					</form>
					<button type="button" class="et_pb_menu__icon et_pb_menu__close-search-button"></button>
				</div>
			</div>',
			esc_url( home_url( '/' ) ),
			esc_attr__( 'Search &hellip;', 'et_builder' ),
			esc_attr__( 'Search for:', 'et_builder' )
		);
	}

	function render( $attrs, $content = null, $render_slug ) {
		$menu_slug         = self::$menu_slug;
		$background_color  = $this->props['background_color'];
		$menu_id           = $this->props['menu_id'];
		$submenu_direction = $this->props['submenu_direction'];
		$menu_style        = $this->props['menu_style'];

		$dropdown_menu_bg_color       = $this->props['dropdown_menu_bg_color'];
		$dropdown_menu_bg_color_hover = $this->get_hover_value( 'dropdown_menu_bg_color' );

		$dropdown_menu_text_color       = $this->props['dropdown_menu_text_color'];
		$dropdown_menu_text_color_hover = $this->get_hover_value( 'dropdown_menu_text_color' );

		$dropdown_menu_active_link_color       = et_()->array_get( $this->props, 'dropdown_menu_active_link_color', '' );
		$dropdown_menu_active_link_color_hover = $this->get_hover_value( 'dropdown_menu_active_link_color' );

		$dropdown_menu_animation         = $this->props['dropdown_menu_animation'];
		$active_link_color_values        = et_pb_responsive_options()->get_property_values( $this->props, 'active_link_color' );
		$active_link_color_hover         = $this->get_hover_value( 'active_link_color' );
		$dropdown_menu_line_color_values = et_pb_responsive_options()->get_property_values( $this->props, 'dropdown_menu_line_color' );
		$dropdown_menu_line_color_hover  = $this->get_hover_value( 'dropdown_menu_line_color' );
		$mobile_menu_text_color_values   = et_pb_responsive_options()->get_property_values( $this->props, 'mobile_menu_text_color' );
		$mobile_menu_text_color_hover    = $this->get_hover_value( 'mobile_menu_text_color' );

		$background_layout               = $this->props['background_layout'];
		$background_layout_hover         = et_pb_hover_options()->get_value( 'background_layout', $this->props, 'light' );
		$background_layout_hover_enabled = et_pb_hover_options()->is_enabled( 'background_layout', $this->props );
		$background_layout_values        = et_pb_responsive_options()->get_property_values( $this->props, 'background_layout' );
		$background_layout_tablet        = isset( $background_layout_values['tablet'] ) ? $background_layout_values['tablet'] : '';
		$background_layout_phone         = isset( $background_layout_values['phone'] ) ? $background_layout_values['phone'] : '';

		$mobile_menu_bg_color        = $this->props['mobile_menu_bg_color'];
		$mobile_menu_bg_color_hover  = $this->get_hover_value( 'mobile_menu_bg_color' );
		$mobile_menu_bg_color_values = et_pb_responsive_options()->get_property_values( $this->props, 'mobile_menu_bg_color' );
		$mobile_menu_bg_color_tablet = isset( $mobile_menu_bg_color_values['tablet'] ) ? $mobile_menu_bg_color_values['tablet'] : '';
		$mobile_menu_bg_color_phone  = isset( $mobile_menu_bg_color_values['phone'] ) ? $mobile_menu_bg_color_values['phone'] : '';

		$style = '';

		$video_background          = $this->video_background();
		$parallax_image_background = $this->get_parallax_image_background();

		$menu = self::get_fullwidth_menu(
			array(
				'menu_id'           => $menu_id,
				'submenu_direction' => $submenu_direction,
			)
		);

		// Active Link Color.
		et_pb_responsive_options()->generate_responsive_css( $active_link_color_values, "%%order_class%%.{$menu_slug} ul li.current-menu-item a", 'color', $render_slug, ' !important;', 'color' );

		if ( et_builder_is_hover_enabled( 'active_link_color', $this->props ) ) {
			$el_style = array(
				'selector'    => $this->add_hover_to_selectors( "%%order_class%%.{$menu_slug} ul li.current-menu-item a" ),
				'declaration' => sprintf(
					'color: %1$s !important;',
					esc_html( $active_link_color_hover )
				),
			);
			ET_Builder_Element::set_style( $render_slug, $el_style );
		}

		if ( '' !== $background_color || '' !== $dropdown_menu_bg_color ) {
			$et_menu_bg_color = '' !== $dropdown_menu_bg_color ? $dropdown_menu_bg_color : $background_color;

			$el_style = array(
				'selector'    => "%%order_class%%.{$menu_slug} .nav li ul",
				'declaration' => sprintf(
					'background-color: %1$s !important;',
					esc_html( $et_menu_bg_color )
				),
			);
			ET_Builder_Element::set_style( $render_slug, $el_style );
		}

		if ( et_builder_is_hover_enabled( 'dropdown_menu_bg_color', $this->props ) ) {
			$el_style = array(
				'selector'    => $this->add_hover_to_selectors( "%%order_class%%.{$menu_slug} .nav li ul" ),
				'declaration' => sprintf(
					'background-color: %1$s !important;',
					esc_html( $dropdown_menu_bg_color_hover )
				),
			);
			ET_Builder_Element::set_style( $render_slug, $el_style );
		}

		$dropdown_menu_line_color_selector = 'upwards' === $submenu_direction
			? "%%order_class%%.{$menu_slug} .et-menu-nav > ul.upwards li ul"
			: "%%order_class%%.{$menu_slug} .nav li ul";

		// Dropdown Menu Line Color.
		et_pb_responsive_options()->generate_responsive_css( $dropdown_menu_line_color_values, $dropdown_menu_line_color_selector, 'border-color', $render_slug, '', 'color' );
		et_pb_responsive_options()->generate_responsive_css( $dropdown_menu_line_color_values, "%%order_class%%.{$menu_slug} .et_mobile_menu", 'border-color', $render_slug, '', 'color' );

		if ( et_builder_is_hover_enabled( 'dropdown_menu_line_color', $this->props ) ) {
			$el_style = array(
				'selector'    => $this->add_hover_to_selectors( $dropdown_menu_line_color_selector ),
				'declaration' => sprintf(
					'border-color: %1$s;',
					esc_html( $dropdown_menu_line_color_hover )
				),
			);
			ET_Builder_Element::set_style( $render_slug, $el_style );

			$el_style = array(
				'selector'    => $this->add_hover_to_selectors( "%%order_class%%.{$menu_slug} .et_mobile_menu" ),
				'declaration' => sprintf(
					'border-color: %1$s;',
					esc_html( $dropdown_menu_line_color_hover )
				),
			);
			ET_Builder_Element::set_style( $render_slug, $el_style );
		}

		if ( '' !== $dropdown_menu_text_color ) {
			$el_style = array(
				'selector'    => "%%order_class%%.{$menu_slug} .nav li ul.sub-menu a",
				'declaration' => sprintf(
					'color: %1$s !important;',
					esc_html( $dropdown_menu_text_color )
				),
			);
			ET_Builder_Element::set_style( $render_slug, $el_style );
		}

		if ( '' !== $dropdown_menu_active_link_color ) {
			$el_style = array(
				'selector'    => "%%order_class%%.{$menu_slug} .nav li ul.sub-menu li.current-menu-item a",
				'declaration' => sprintf(
					'color: %1$s !important;',
					esc_html( $dropdown_menu_active_link_color )
				),
			);
			ET_Builder_Element::set_style( $render_slug, $el_style );
		}

		if ( et_builder_is_hover_enabled( 'dropdown_menu_text_color', $this->props ) ) {
			$el_style = array(
				'selector'    => $this->add_hover_to_selectors( "%%order_class%%.{$menu_slug} .nav li ul.sub-menu a" ),
				'declaration' => sprintf(
					'color: %1$s !important;',
					esc_html( $dropdown_menu_text_color_hover )
				),
			);
			ET_Builder_Element::set_style( $render_slug, $el_style );
		}

		if ( et_builder_is_hover_enabled( 'dropdown_menu_active_link_color', $this->props ) ) {
			$el_style = array(
				'selector'    => $this->add_hover_to_selectors( "%%order_class%%.{$menu_slug} .nav li ul.sub-menu li.current-menu-item a" ),
				'declaration' => sprintf(
					'color: %1$s !important;',
					esc_html( $dropdown_menu_active_link_color_hover )
				),
			);
			ET_Builder_Element::set_style( $render_slug, $el_style );
		}

		// Mobile Menu Background Color.
		$is_mobile_menu_bg_responsive = et_pb_responsive_options()->is_responsive_enabled( $this->props, 'mobile_menu_bg_color' );
		$mobile_menu_bg_color         = empty( $mobile_menu_bg_color ) ? $background_color : $mobile_menu_bg_color;
		$mobile_menu_bg_color_tablet  = empty( $mobile_menu_bg_color_tablet ) ? $background_color : $mobile_menu_bg_color_tablet;
		$mobile_menu_bg_color_phone   = empty( $mobile_menu_bg_color_phone ) ? $background_color : $mobile_menu_bg_color_phone;
		$mobile_menu_bg_color_values  = array(
			'desktop' => esc_html( $mobile_menu_bg_color ),
			'tablet'  => $is_mobile_menu_bg_responsive ? esc_html( $mobile_menu_bg_color_tablet ) : '',
			'phone'   => $is_mobile_menu_bg_responsive ? esc_html( $mobile_menu_bg_color_phone ) : '',
		);
		et_pb_responsive_options()->generate_responsive_css( $mobile_menu_bg_color_values, "%%order_class%%.{$menu_slug} .et_mobile_menu, %%order_class%%.{$menu_slug} .et_mobile_menu ul", 'background-color', $render_slug, ' !important;', 'color' );

		if ( et_builder_is_hover_enabled( 'mobile_menu_bg_color', $this->props ) ) {
			$el_style = array(
				'selector'    => $this->add_hover_to_selectors( "%%order_class%%.{$menu_slug} .et_mobile_menu, %%order_class%%.{$menu_slug} .et_mobile_menu ul" ) . ", %%order_class%%.{$menu_slug} .et_mobile_menu:hover ul",
				'declaration' => sprintf(
					'background-color: %1$s !important;',
					esc_html( $mobile_menu_bg_color_hover )
				),
			);
			ET_Builder_Element::set_style( $render_slug, $el_style );
		}

		// Mobile Menu Text Color.
		et_pb_responsive_options()->generate_responsive_css( $mobile_menu_text_color_values, "%%order_class%%.{$menu_slug} .et_mobile_menu a", 'color', $render_slug, ' !important;', 'color' );

		if ( et_builder_is_hover_enabled( 'mobile_menu_text_color', $this->props ) ) {
			$el_style = array(
				'selector'    => $this->add_hover_to_selectors( "%%order_class%%.{$menu_slug} .et_mobile_menu a" ),
				'declaration' => sprintf(
					'color: %1$s !important;',
					esc_html( $mobile_menu_text_color_hover )
				),
			);
			ET_Builder_Element::set_style( $render_slug, $el_style );
		}

		$this->apply_logo_styles( $render_slug );
		$this->apply_icon_styles( $render_slug, 'menu', '%%order_class%% .mobile_nav .mobile_menu_bar:before' );
		$this->apply_icon_styles( $render_slug, 'search', '%%order_class%% .et_pb_menu__icon.et_pb_menu__search-button, %%order_class%% .et_pb_menu__icon.et_pb_menu__close-search-button' );
		$this->apply_icon_styles( $render_slug, 'cart', '%%order_class%% .et_pb_menu__icon.et_pb_menu__cart-button' );

		$data_background_layout       = '';
		$data_background_layout_hover = '';
		if ( $background_layout_hover_enabled ) {
			$data_background_layout       = sprintf(
				' data-background-layout="%1$s"',
				esc_attr( $background_layout )
			);
			$data_background_layout_hover = sprintf(
				' data-background-layout-hover="%1$s"',
				esc_attr( $background_layout_hover )
			);
		}

		// Module classnames
		$this->add_classname(
			array(
				"et_pb_bg_layout_{$background_layout}",
				$this->get_text_orientation_classname(),
				"et_dropdown_animation_{$dropdown_menu_animation}",
			)
		);

		if ( ! empty( $background_layout_tablet ) ) {
			$this->add_classname( "et_pb_bg_layout_{$background_layout_tablet}_tablet" );
		}

		if ( ! empty( $background_layout_phone ) ) {
			$this->add_classname( "et_pb_bg_layout_{$background_layout_phone}_phone" );
		}

		if ( 'on' === $this->props['fullwidth_menu'] ) {
			$this->add_classname( "{$menu_slug}_fullwidth" );
		}

		if ( ! empty( $this->props['logo'] ) ) {
			$this->add_classname( "{$menu_slug}--with-logo" );
		} else {
			$this->add_classname( "{$menu_slug}--without-logo" );
		}

		$this->add_classname( "{$menu_slug}--style-{$menu_style}" );

		// Logo: Add CSS Filters and Mix Blend Mode rules (if set).
		if ( ! empty( $this->props['logo'] ) && array_key_exists( 'image', $this->advanced_fields ) && array_key_exists( 'css', $this->advanced_fields['image'] ) ) {
			$this->add_classname(
				$this->generate_css_filters(
					$render_slug,
					'child_',
					self::$data_utils->array_get( $this->advanced_fields['image']['css'], 'main', '%%order_class%%' )
				)
			);
		}

		$mobile_menu = sprintf(
			'<div class="et_mobile_nav_menu">
				<a href="#" class="mobile_nav closed%1$s">
					<span class="mobile_menu_bar"></span>
				</a>
			</div>',
			'upwards' === $submenu_direction ? ' et_pb_mobile_menu_upwards' : ''
		);

		if ( 'inline_centered_logo' === $menu_style ) {
			$output = sprintf(
				'<div%4$s class="%3$s"%2$s%7$s%8$s>
					%6$s
					%5$s
					<div class="et_pb_row clearfix">
						%9$s
						<div class="et_pb_menu__wrap">
							%10$s
							<div class="et_pb_menu__menu">
								%1$s
							</div>
							%11$s
							%12$s
						</div>
						%13$s
					</div>
				</div>',
				$menu,
				$style,
				$this->module_classname( $render_slug ),
				$this->module_id(),
				$video_background,
				$parallax_image_background,
				et_core_esc_previously( $data_background_layout ),
				et_core_esc_previously( $data_background_layout_hover ),
				et_core_esc_previously( $this->render_logo() ),
				et_core_esc_previously( $this->render_cart() ),
				et_core_esc_previously( $this->render_search() ),
				et_core_esc_previously( $mobile_menu ),
				et_core_esc_previously( $this->render_search_form() )
			);
		} else {
			$output = sprintf(
				'<div%4$s class="%3$s"%2$s%7$s%8$s>
					%6$s
					%5$s
					<div class="et_pb_row clearfix">
						%9$s
						<div class="et_pb_menu__wrap">
							<div class="et_pb_menu__menu">
								%1$s
							</div>
							%10$s
							%11$s
							%12$s
						</div>
						%13$s
					</div>
				</div>',
				$menu,
				$style,
				$this->module_classname( $render_slug ),
				$this->module_id(),
				$video_background,
				$parallax_image_background,
				et_core_esc_previously( $data_background_layout ),
				et_core_esc_previously( $data_background_layout_hover ),
				et_core_esc_previously( $this->render_logo() ),
				et_core_esc_previously( $this->render_cart() ),
				et_core_esc_previously( $this->render_search() ),
				et_core_esc_previously( $mobile_menu ),
				et_core_esc_previously( $this->render_search_form() )
			);
		}

		return $output;
	}
}

new ET_Builder_Module_Fullwidth_Menu();

<?php
/**
 * Site content area customizer options.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Customizer\Colors\Header;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

add_action( 'customize_register', __NAMESPACE__ . '\\register' );


/**
 * Register customizer options
 *
 * @param object $wp_customize WP Customizer object.
 * @return void
 */
function register( object $wp_customize ):void {

	// Add customizer section.
	$wp_customize->add_section(
		'wps_header_color_settings',
		[
			'title'      => __( 'Header Colors', 'wps-prime' ),
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_colors_panel',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_mega_menu_background',
		[
			'default'    => '#bbbbbb',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_mega_menu_background',
			[
				'label'       => __( 'Menu bar background color', 'wps-prime' ),
				'description' => __( 'Background color when menu is under the header', 'wps-prime' ),
				'settings'    => 'wps_mega_menu_background',
				'priority'    => 10,
				'section'     => 'wps_header_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_header_background',
		[
			'default'    => '#ffffff',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_header_background',
			[
				'label'    => __( 'Header background color', 'wps-prime' ),
				'settings' => 'wps_header_background',
				'priority' => 10,
				'section'  => 'wps_header_color_settings',
			]
		)
	);

	$wp_customize->add_setting(
		'wps_header_background_sticky',
		[
			'default'    => '#000000',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_header_background_sticky',
			[
				'label'    => __( 'Main header sticky background color', 'wps-prime' ),
				'settings' => 'wps_header_background_sticky',
				'priority' => 10,
				'section'  => 'wps_header_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_header_background_sticky_opacity',
		[
			'default'    => '0.8',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	$wp_customize->add_control(
		'wps_theme_header_background_sticky_opacity',
		[
			'type'              => 'range',
			'label'             => __( 'Sticky background opacity', 'wps-prime' ),
			'description'       => __( 'Use the slider to set the opacity, between 0 and 1 values. 0.1 steps (0.1 = 10%)', 'wps-prime' ),
			'priority'          => 10,
			'section'           => 'wps_header_color_settings',
			'input_attrs'       => [
				'min'  => 0,
				'max'  => 1,
				'step' => 0.1,
			],
			'sanitize_callback' => 'intval',
			'settings'          => 'wps_header_background_sticky_opacity',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_main_nav_sticky_text_color',
		[
			'default'    => '#ffffff',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_main_nav_sticky_text_color',
			[
				'label'    => __( 'Main navigation text color when sticky', 'wps-prime' ),
				'settings' => 'wps_main_nav_sticky_text_color',
				'priority' => 10,
				'section'  => 'wps_header_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_main_nav_text_color',
		[
			'default'    => '#000000',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_main_nav_color',
			[
				'label'    => __( 'Main navigation text color', 'wps-prime' ),
				'settings' => 'wps_main_nav_text_color',
				'priority' => 10,
				'section'  => 'wps_header_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_main_nav_text_color_h',
		[
			'default'    => '#209bed',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_main_nav_color_h',
			[
				'label'    => __( 'Main navigation hover text color', 'wps-prime' ),
				'settings' => 'wps_main_nav_text_color_h',
				'priority' => 10,
				'section'  => 'wps_header_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_main_nav_text_color_active',
		[
			'default'    => '#209bed',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_main_nav_color_active',
			[
				'label'    => __( 'Main navigation active color', 'wps-prime' ),
				'settings' => 'wps_main_nav_text_color_active',
				'priority' => 10,
				'section'  => 'wps_header_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_main_nav_ca_one_color',
		[
			'default'    => '#309bd4',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_main_nav_ca_one_color',
			[
				'label'    => __( 'Main navigation first call to action color', 'wps-prime' ),
				'settings' => 'wps_main_nav_ca_one_color',
				'priority' => 10,
				'section'  => 'wps_header_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_main_nav_ca_two_color',
		[
			'default'    => '#e74c3c',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_main_nav_ca_two_color',
			[
				'label'    => __( 'Main navigation second call to action color', 'wps-prime' ),
				'settings' => 'wps_main_nav_ca_two_color',
				'priority' => 10,
				'section'  => 'wps_header_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_main_nav_ca_text_color',
		[
			'default'    => '#ffffff',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_main_nav_ca_text_color',
			[
				'label'    => __( 'Call to action button text color', 'wps-prime' ),
				'settings' => 'wps_main_nav_ca_text_color',
				'priority' => 10,
				'section'  => 'wps_header_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_main_nav_submenu_text_color',
		[
			'default'    => '#ffffff',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_main_nav_submenu_text_color',
			[
				'label'    => __( 'Submenu text color', 'wps-prime' ),
				'settings' => 'wps_main_nav_submenu_text_color',
				'priority' => 10,
				'section'  => 'wps_header_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_main_nav_submenu_text_color_h',
		[
			'default'    => '#ffffff',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_main_nav_submenu_text_color_h',
			[
				'label'    => __( 'Submenu hover text color', 'wps-prime' ),
				'settings' => 'wps_main_nav_submenu_text_color_h',
				'priority' => 10,
				'section'  => 'wps_header_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_main_nav_submenu_text_color_active',
		[
			'default'    => '#209bed',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_main_nav_submenu_text_color_active',
			[
				'label'    => __( 'Submenu active text color', 'wps-prime' ),
				'settings' => 'wps_main_nav_submenu_text_color_active',
				'priority' => 10,
				'section'  => 'wps_header_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_main_submenu_background',
		[
			'default'    => '#000000',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_main_submenu_background',
			[
				'label'    => __( 'Submenu background color', 'wps-prime' ),
				'settings' => 'wps_main_submenu_background',
				'priority' => 10,
				'section'  => 'wps_header_color_settings',
			]
		)
	);
	// SETTING.
	$wp_customize->add_setting(
		'wps_main_nav_utility_color',
		[
			'default'    => '#000000',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_nav_utility_color',
			[
				'label'    => __( 'Main nav utility color', 'wps-prime' ),
				'settings' => 'wps_main_nav_utility_color',
				'priority' => 10,
				'section'  => 'wps_header_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_main_nav_utility_color_h',
		[
			'default'    => '#000000',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_nav_utility_color_h',
			[
				'label'    => __( 'Main nav utility color hover', 'wps-prime' ),
				'settings' => 'wps_main_nav_utility_color_h',
				'priority' => 10,
				'section'  => 'wps_header_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_main_side_nav_text_color',
		[
			'default'    => '#ffffff',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_main_side_nav_color',
			[
				'label'    => __( 'Main mobile navigation text color', 'wps-prime' ),
				'settings' => 'wps_main_side_nav_text_color',
				'priority' => 10,
				'section'  => 'wps_header_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_main_side_nav_background_color',
		[
			'default'    => '#000000',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_main_side_nav_background_color',
			[
				'label'    => __( 'Main mobile navigation background color', 'wps-prime' ),
				'settings' => 'wps_main_side_nav_background_color',
				'priority' => 10,
				'section'  => 'wps_header_color_settings',
			]
		)
	);

}

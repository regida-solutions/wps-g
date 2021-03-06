<?php
/**
 * Customize woocommerce header cart.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Customizer\Woo\Colors\Header;

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
		'wps_woo_color_header_utility_settings',
		[
			'title'       => __( 'Colors - Header utility', 'wps-prime' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Woocommerce header utility settings', 'wps-prime' ),
			'panel'       => 'woocommerce',
		]
	);

	/**
		* Header utility icon colors
		*/

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_header_utility_icons_color',
		[
			'default'    => '#000000',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_woo_header_utility_symbol_color',
			[
				'label'    => __( 'Utility icon colors', 'wps-prime' ),
				'settings' => 'wps_woo_header_utility_icons_color',
				'section'  => 'wps_woo_color_header_utility_settings',
			]
		)
	);

	/**
		* Header count colors
		*/

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_header_utility_count_color',
		[
			'default'    => '#ffffff',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_woo_header_utility_count_text_color',
			[
				'label'    => __( 'Count icon text color', 'wps-prime' ),
				'settings' => 'wps_woo_header_utility_count_color',
				'section'  => 'wps_woo_color_header_utility_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_header_utility_count_background',
		[
			'default'    => '#000000',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_woo_header_utility_count_background_color',
			[
				'label'    => __( 'Count icon background color', 'wps-prime' ),
				'settings' => 'wps_woo_header_utility_count_background',
				'section'  => 'wps_woo_color_header_utility_settings',
			]
		)
	);

	/**
		* Header utility text
		*/

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_header_utility_color',
		[
			'default'    => '#000000',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_woo_header_utility_text_color',
			[
				'label'       => __( 'Utility text color light', 'wps-prime' ),
				'description' => __( 'Cart and user menu text color', 'wps-prime' ),
				'settings'    => 'wps_woo_header_utility_color',
				'section'     => 'wps_woo_color_header_utility_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_header_utility_color_light',
		[
			'default'    => '#bbbbbb',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_woo_header_utility_text_color_light',
			[
				'label'       => __( 'Utility text color', 'wps-prime' ),
				'description' => __( 'Cart light text color', 'wps-prime' ),
				'settings'    => 'wps_woo_header_utility_color_light',
				'section'     => 'wps_woo_color_header_utility_settings',
			]
		)
	);

	/**
		* Header utility text
		*/

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_header_utility_background',
		[
			'default'    => '#ffffff',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_woo_header_utility_background_color',
			[
				'label'       => __( 'Utility background color', 'wps-prime' ),
				'description' => __( 'Cart and user menu background color', 'wps-prime' ),
				'settings'    => 'wps_woo_header_utility_background',
				'section'     => 'wps_woo_color_header_utility_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_header_utility_background_hover',
		[
			'default'    => '#e5e5e5',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_woo_header_utility_background_hover_color',
			[
				'label'       => __( 'Utility background hover color', 'wps-prime' ),
				'description' => __( 'Cart and user menu hover background color', 'wps-prime' ),
				'settings'    => 'wps_woo_header_utility_background_hover',
				'section'     => 'wps_woo_color_header_utility_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_header_utility_background_dark',
		[
			'default'    => '#222329',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_woo_header_utility_background_dark_color',
			[
				'label'       => __( 'Utility background dark color', 'wps-prime' ),
				'description' => __( 'Cart total background color', 'wps-prime' ),
				'settings'    => 'wps_woo_header_utility_background_dark',
				'section'     => 'wps_woo_color_header_utility_settings',
			]
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'wps_woo_header_utility_icons_color',
		[
			'selector' => '.woo-head-utility-wrapper',
		]
	);
}

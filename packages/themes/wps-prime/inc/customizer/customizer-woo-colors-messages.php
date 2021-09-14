<?php
/**
 * Customize woocommerce info message colors.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Customizer\Woo\Colors\Messages;

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
		'wps_woo_message_color_settings',
		[
			'title'       => __( 'Colors - Messages', 'wps-prime' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Color settings for the message bar', 'wps-prime' ),
			'panel'       => 'woocommerce',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_message_bar_background',
		[
			'default'    => '#e8e8e8',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_woo_message_bar_background',
			[
				'label'    => __( 'Message bar background color', 'wps-prime' ),
				'settings' => 'wps_woo_message_bar_background',
				'section'  => 'wps_woo_message_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_message_bar_color',
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
			'wps_theme_woo_message_bar_color',
			[
				'label'    => __( 'Message bar text color', 'wps-prime' ),
				'settings' => 'wps_woo_message_bar_color',
				'section'  => 'wps_woo_message_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_message_bar_theme_default_color',
		[
			'default'    => '#8fae1b',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_woo_bar_theme_default_color',
			[
				'label'       => __( 'Default message accent color', 'wps-prime' ),
				'description' => __( 'Applied to border and icon', 'wps-prime' ),
				'settings'    => 'wps_woo_message_bar_theme_default_color',
				'section'     => 'wps_woo_message_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_message_bar_theme_info_color',
		[
			'default'    => '#1e85be',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_woo_bar_theme_info_color',
			[
				'label'       => __( 'Info message bar accent color', 'wps-prime' ),
				'description' => __( 'Applied to border and icon', 'wps-prime' ),
				'settings'    => 'wps_woo_message_bar_theme_info_color',
				'section'     => 'wps_woo_message_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_message_bar_theme_error_color',
		[
			'default'    => '#e74c3c',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_woo_bar_theme_error_color',
			[
				'label'       => __( 'Error message bar accent color', 'wps-prime' ),
				'description' => __( 'Applied to border and icon', 'wps-prime' ),
				'settings'    => 'wps_woo_message_bar_theme_error_color',
				'section'     => 'wps_woo_message_color_settings',
			]
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'wps_woo_message_bar_theme_default_color',
		[
			'selector' => '.woocommerce-notices-wrapper .woocommerce-message',
		]
	);

	$wp_customize->selective_refresh->add_partial(
		'wps_woo_message_bar_theme_info_color',
		[
			'selector' => '.woocommerce-info',
		]
	);

	$wp_customize->selective_refresh->add_partial(
		'wps_woo_message_bar_theme_error_color',
		[
			'selector' => '.woocommerce-NoticeGroup  > ul.woocommerce-error',
		]
	);
}

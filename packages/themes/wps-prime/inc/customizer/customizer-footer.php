<?php
/**
 * Footer customizer options.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Customizer\Footer;

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
		'footer_setup_section',
		[
			'title'      => __( 'Footer', 'wps-prime' ),
			'priority'   => 123,
			'capability' => 'edit_theme_options',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_footer_text_color',
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
			'wps_theme_footer_text_color',
			[
				'label'    => __( 'Footer text color', 'wps-prime' ),
				'settings' => 'wps_footer_text_color',
				'priority' => 10,
				'section'  => 'footer_setup_section',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_footer_heading_color',
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
			'wps_theme_footer_heading_color',
			[
				'label'    => __( 'Footer headings color', 'wps-prime' ),
				'settings' => 'wps_footer_heading_color',
				'priority' => 10,
				'section'  => 'footer_setup_section',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_footer_link_color',
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
			'wps_theme_footer_link_color',
			[
				'label'    => __( 'Footer link color', 'wps-prime' ),
				'settings' => 'wps_footer_link_color',
				'priority' => 10,
				'section'  => 'footer_setup_section',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_footer_background_color',
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
			'wps_theme_footer_background_color',
			[
				'label'    => __( 'Footer background color', 'wps-prime' ),
				'settings' => 'wps_footer_background_color',
				'priority' => 10,
				'section'  => 'footer_setup_section',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_footer_micro_background_color',
		[
			'default'    => '#333333',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_footer_micro_background_color',
			[
				'label'    => __( 'Footer micro-copy background ', 'wps-prime' ),
				'settings' => 'wps_footer_micro_background_color',
				'priority' => 10,
				'section'  => 'footer_setup_section',
			]
		)
	);

	$wp_customize->add_setting(
		'use_custom_footer',
		[
			'default'    => false,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	$wp_customize->add_control(
		'use_custom_footer',
		[
			'type'        => 'checkbox',
			'label'       => __( 'Use custom footer', 'wps-prime' ),
			'description' => __( 'This will disable the default footer and will use the custom footer content', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'footer_setup_section',
		]
	);

	$wp_customize->add_setting(
		'hide_footer_micro',
		[
			'default'    => false,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	$wp_customize->add_control(
		'hide_footer_micro',
		[
			'type'        => 'checkbox',
			'label'       => __( 'Remove footer micro-copy', 'wps-prime' ),
			'description' => __( 'Remove the info text under the footer', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'footer_setup_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'footer_custom_content',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'footer_custom_content',
		[
			'type'        => 'textarea',
			'label'       => __( 'Footer custom content', 'wps-prime' ),
			'description' => __( 'Create a custom footer', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'footer_setup_section',
		]
	);
}

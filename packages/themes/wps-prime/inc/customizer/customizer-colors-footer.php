<?php
/**
	* Footer color customizer options.
	*
	* @link http://codex.wordpress.org/Theme_Customization_API
	* @package WpsPrime
	*/

declare( strict_types=1 );

namespace WpsPrime\Customizer\Colors\Footer;

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
		'wps_footer_color_settings',
		[
			'title'      => __( 'Footer Colors', 'wps-prime' ),
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_colors_panel',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_footer_text_color',
		[
			'default'    => '#ffffff',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options'
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
				'section'  => 'wps_footer_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_footer_heading_color',
		[
			'default'    => '#ffffff',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options'
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
				'section'  => 'wps_footer_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_footer_link_color',
		[
			'default'    => '#ffffff',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options'
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
				'section'  => 'wps_footer_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_footer_background_color',
		[
			'default'    => '#000000',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options'
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
				'section'  => 'wps_footer_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_footer_micro_background_color',
		[
			'default'    => '#333333',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options'
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
				'section'  => 'wps_footer_color_settings',
			]
		)
	);

}

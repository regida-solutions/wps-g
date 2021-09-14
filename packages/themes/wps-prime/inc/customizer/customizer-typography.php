<?php
/**
 * Site typography options.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Customizer\Typography;

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

	$font_weights = [
		'100' => 100,
		'200' => 200,
		'300' => 300,
		'400' => 400,
		'500' => 500,
		'600' => 600,
		'700' => 700,
		'800' => 800,
		'900' => 900,
	];

	$fonts     = new \WpsPrime\Typography\Typography_Get_Fonts();
	$font_list = [ 'empty' => 'Choose font family' ];

	if ( ! empty( $fonts->get_fonts_name() ) ) {
		$font_list = array_merge( $font_list, $fonts->get_fonts_name() );
	}

	// Add customizer panel.
	$wp_customize->add_panel(
		'typography_panel',
		[
			'priority'       => 124,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => 'Typography',
			'description'    => '',
		]
	);

	// Add customizer section.
	$wp_customize->add_section(
		'font_setup_section',
		[
			'title'      => __( 'Fonts setup', 'wps-prime' ),
			'priority'   => 35,
			'capability' => 'edit_theme_options',
			'panel'      => 'typography_panel',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_custom_font_family_status',
		[
			'default'    => '',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_custom_font_family_status',
		[
			'type'        => 'checkbox',
			'label'       => __( 'Disable google fonts.', 'wps-prime' ),
			'description' => __( 'Provide your custom font instead', 'wps-prime' ),
			'section'     => 'font_setup_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_main_font_family',
		[
			'default'    => false,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_main_font_family',
		[
			'type'        => 'select',
			'label'       => __( 'Body Font', 'wps-prime' ),
			'description' => __( 'Choose what font family to use as the main Body font.', 'wps-prime' ),
			'section'     => 'font_setup_section',
			'choices'     => $font_list,
			'default'     => 'empty',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_main_font_weight',
		[
			'default'    => 400,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_main_font_weight',
		[
			'type'        => 'select',
			'label'       => __( 'Body font weight', 'wps-prime' ),
			'description' => __( 'Font weight availability vary for each font', 'wps-prime' ),
			'section'     => 'font_setup_section',
			'choices'     => $font_weights,
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_font_family_subset',
		[
			'default'    => false,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_second_font_family_status',
		[
			'default'    => false,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_second_font_family_status',
		[
			'type'        => 'checkbox',
			'label'       => __( 'Heading Font Status', 'wps-prime' ),
			'description' => __( 'Set different font family for headings.  This option has performance impact." css class on a text.', 'wps-prime' ),
			'section'     => 'font_setup_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_secondary_font_family',
		[
			'default'    => false,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_secondary_font_family',
		[
			'type'        => 'select',
			'label'       => __( 'Heading Font', 'wps-prime' ),
			'description' => __( 'Choose what font family to use as the main Heading font.', 'wps-prime' ),
			'section'     => 'font_setup_section',
			'choices'     => $font_list,
			'default'     => 'empty',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_second_font_weight',
		[
			'default'    => 600,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_second_font_weight',
		[
			'type'        => 'select',
			'label'       => __( 'Heading font weight', 'wps-prime' ),
			'description' => __( 'Font weight availability vary for each font', 'wps-prime' ),
			'section'     => 'font_setup_section',
			'choices'     => $font_weights,
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_nav_custom_font',
		[
			'default'    => false,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_nav_custom_font',
		[
			'type'        => 'checkbox',
			'label'       => __( 'Navigation Font', 'wps-prime' ),
			'description' => __( 'Set heading font family for navigation.', 'wps-prime' ),
			'section'     => 'font_setup_section',
		]
	);

}

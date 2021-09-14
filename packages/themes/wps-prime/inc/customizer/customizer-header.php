<?php
/**
 * Header customizer options.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Customizer\Header;

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
		'wps_header_setup_settings',
		[
			'title'      => __( 'Header', 'wps-prime' ),
			'capability' => 'edit_theme_options',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'main_menu_position',
		[
			'capability' => 'edit_theme_options',
			'type'       => 'theme_mod',
			'default'    => 'in_header',
		]
	);

	$wp_customize->add_control(
		'main_menu_position',
		[
			'type'        => 'select',
			'section'     => 'wps_header_setup_settings',
			'label'       => __( 'Select menu location', 'wps-prime' ),
			'description' => __( 'Under header menu has Menu mega capability', 'wps-prime' ),
			'choices'     => [
				'in_header'    => __( 'In header' ),
				'under_header' => __( 'Under header' ),
			],
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'header_show_phone',
		[
			'default'    => false,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	$wp_customize->add_control(
		'header_show_phone',
		[
			'type'        => 'checkbox',
			'label'       => __( 'Phone number visibility', 'wps-prime' ),
			'description' => __( 'Show', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'wps_header_setup_settings',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'header_show_email',
		[
			'default'    => false,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	$wp_customize->add_control(
		'header_show_email',
		[
			'type'        => 'checkbox',
			'label'       => __( 'Email visibility', 'wps-prime' ),
			'description' => __( 'Show', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'wps_header_setup_settings',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'header_contact_show_labels',
		[
			'default'    => false,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	$wp_customize->add_control(
		'header_contact_show_labels',
		[
			'type'        => 'checkbox',
			'label'       => __( 'Show email/phone text', 'wps-prime' ),
			'description' => __( 'Show contact data with the number and email text', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'wps_header_setup_settings',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'header_utility_show_social',
		[
			'default'    => false,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	$wp_customize->add_control(
		'header_utility_show_social',
		[
			'type'        => 'checkbox',
			'label'       => __( 'Social media icons', 'wps-prime' ),
			'description' => __( 'Show social media icons near the phone and email', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'wps_header_setup_settings',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'header_utility_content',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options'
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'header_utility_content',
		[
			'type'        => 'textarea',
			'label'       => __( 'Header content', 'wps-prime' ),
			'description' => __( 'Area visible in the header area', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'wps_header_setup_settings',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'header_use_sticky',
		[
			'default'    => false,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	$wp_customize->add_control(
		'header_use_sticky',
		[
			'type'        => 'checkbox',
			'label'       => __( 'Use sticky header', 'wps-prime' ),
			'description' => __( 'Make the header scroll with the page', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'wps_header_setup_settings',
		]
	);

	// Add customizer edit bubbles.
	$wp_customize->selective_refresh->add_partial(
		'main_menu_position',
		[
			'selector' => '.site-nav__menu-container',
		]
	);

	$wp_customize->selective_refresh->add_partial(
		'header_show_phone',
		[
			'selector' => '.head-utility',
		]
	);

	$wp_customize->selective_refresh->add_partial(
		'header_utility_content',
		[
			'selector' => '.head-utility-content',
		]
	);

}

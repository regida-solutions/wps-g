<?php
/**
 * Customizer area that show site data for development purposes.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Customizer\Tweaks;

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

	// Add customizer panel.
	$wp_customize->add_panel(
		'developer_tweaks_section',
		[
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => 'Developer Tweaks',
		]
	);

	// Add customizer section.
	$wp_customize->add_section(
		'performance_tweaks_section',
		[
			'title'      => __( 'Performance Tweaks', 'wps-prime' ),
			'priority'   => 35,
			'capability' => 'edit_theme_options',
			'panel'      => 'developer_tweaks_section',
		]
	);

	// Add customizer section.
	$wp_customize->add_section(
		'developer_info_section',
		[
			'title'              => __( 'System Status / Dev. options', 'wps-prime' ),
			'priority'           => 200,
			'capability'         => 'edit_theme_options',
			'panel'              => 'developer_tweaks_section',
			'description_hidden' => false,
			'description'        => sprintf(
				'<p>%1$s</p>',
				\WpsPrime\Helpers\get_development_data(),
				'<span style="font-size:22px;font-weight:300;">' . esc_html__( 'Available image', 'wps-prime' ) . ' sizes:</span><br><br>',
				\WpsPrime\Helpers\get_image_sizes()
			),
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_remove_assets_version_numbers',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_remove_assets_version_numbers',
		[
			'type'        => 'checkbox',
			'label'       => __( 'Asset version number', 'wps-prime' ),
			'description' => __( 'Remove asset number. Optimize website score by removing version number of scripts and styles. (You will need to hard refresh / clear cache when assets are updated)', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'performance_tweaks_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_disable_emoji',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_disable_emoji',
		[
			'type'        => 'checkbox',
			'label'       => __( 'WordPress default emoji', 'wps-prime' ),
			'description' => __( 'Disable unused emoji scripts from loading on front end.', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'performance_tweaks_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_front_disable_dashicons',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_front_disable_dashicons',
		[
			'type'        => 'checkbox',
			'label'       => __( 'WordPress default dashicons', 'wps-prime' ),
			'description' => __( 'Disable dashicon on front end.', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'performance_tweaks_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_front_jquery_migrate_use',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_front_jquery_migrate_use',
		[
			'type'        => 'checkbox',
			'label'       => __( 'jQuery migrate', 'wps-prime' ),
			'description' => __( 'Disable jQuery migrate from loading on front end.', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'performance_tweaks_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_disable_animation_lib',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_disable_animation_lib',
		[
			'type'        => 'checkbox',
			'label'       => __( 'Animation CCS library', 'wps-prime' ),
			'description' => __( 'Disable animation css library', 'wps-prime' ) . ' -> <a href="https://daneden.github.io/animate.css/" target="_blank" title="Open in new window">link</a>',
			'priority'    => 10,
			'section'     => 'performance_tweaks_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_display_wps_hooks',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_display_wps_hooks',
		[
			'type'        => 'checkbox',
			'label'       => __( 'Display WPS hooks on front end', 'wps-prime' ),
			'description' => __( 'Show WPS Prime hooks on front end. Usefull for debugging and theme development', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'developer_info_section',
		]
	);

	$wp_customize->get_setting( 'wps_display_wps_hooks' )->transport = 'refresh';

}

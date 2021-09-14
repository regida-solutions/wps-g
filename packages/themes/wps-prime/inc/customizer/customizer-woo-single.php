<?php
/**
 * Customize woocommerce single product.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Customizer\Woo\Single;

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
		'wps_woo_single_settings',
		[
			'title'       => __( 'Single Product', 'wps-prime' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Single product page settings', 'wps-prime' ),
			'panel'       => 'woocommerce',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_single_header_start_area',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_woo_single_header_start_area',
		[
			'type'        => 'textarea',
			'label'       => __( 'Single product top content area', 'wps-prime' ),
			'description' => __( 'Visible at the start of the single woocommerce product', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'wps_woo_single_settings',
		]
	);
}

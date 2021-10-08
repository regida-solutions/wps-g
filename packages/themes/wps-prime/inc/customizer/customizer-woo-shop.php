<?php
/**
 * Customize woocommerce main shop area.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Customizer\Woo\Shop;

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
		'wps_woo_shop_settings',
		[
			'title'       => __( 'Shop', 'wps-prime' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'WPS Woocommerce options', 'wps-prime' ),
			'panel'       => 'woocommerce',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_shop_hide_rating',
		[
			'default'    => false,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_woo_shop_hide_rating',
		[
			'type'    => 'checkbox',
			'label'   => __( 'Hide rating on shop product loop', 'wps-prime' ),
			'section' => 'wps_woo_shop_settings',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_hide_breadcrumb',
		[
			'default'    => false,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_woo_hide_breadcrumb',
		[
			'type'        => 'checkbox',
			'label'       => __( 'Hide breadcrumb', 'wps-prime' ),
			'description' => __( 'Hide woocommerce breadcrumb navigation from shop pages', 'wps-prime' ),
			'section'     => 'wps_woo_shop_settings',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_single_disable_data_tabs',
		[
			'default'    => false,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_woo_single_disable_data_tabs',
		[
			'type'        => 'checkbox',
			'label'       => __( 'Product data view from tabs to visible sections', 'wps-prime' ),
			'description' => __( 'Single product data: Description / Reviews / Attributes, will all be displayed without tabs.', 'wps-prime' ),
			'section'     => 'wps_woo_shop_settings',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_shop_has_sidebar',
		[
			'default'    => false,
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_woo_shop_has_sidebar',
		[
			'type'     => 'checkbox',
			'label'    => __( 'Enable shop sidebar', 'wps-prime' ),
			'section'  => 'wps_woo_shop_settings',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_shop_swap_sidebar_position',
		[
			'default'    => false,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_woo_shop_swap_sidebar_position',
		[
			'type'        => 'checkbox',
			'label'       => __( 'Swap sidebar position to other side', 'wps-prime' ),
			'section'     => 'wps_woo_shop_settings',
		]
	);
}

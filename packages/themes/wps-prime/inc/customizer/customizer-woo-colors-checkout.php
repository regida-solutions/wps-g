<?php
/**
 * Customize woocommerce checkout colors.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Customizer\Woo\Colors\Checkout;

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
		'wps_woo_checkout_color_settings',
		[
			'title'       => __( 'Colors - Checkout', 'wps-prime' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Color settings for the checkout area', 'wps-prime' ),
			'panel'       => 'woocommerce',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_background_payment',
		[
			'default'    => '#f5f5f5',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_woo_background_payment',
			[
				'label'       => __( 'Payment box background', 'wps-prime' ),
				'description' => __( 'Checkout page payment box background color', 'wps-prime' ),
				'settings'    => 'wps_woo_background_payment',
				'section'     => 'wps_woo_checkout_color_settings',
			]
		)
	);
	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_background_payment_box',
		[
			'default'    => '#313131',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_woo_background_payment_box',
			[
				'label'       => __( 'Payment box message background', 'wps-prime' ),
				'description' => __( 'Checkout page payment message background color', 'wps-prime' ),
				'settings'    => 'wps_woo_background_payment_box',
				'section'     => 'wps_woo_checkout_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_color_payment_box',
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
			'wps_theme_woo_color_payment_box',
			[
				'label'       => __( 'Payment box message color', 'wps-prime' ),
				'description' => __( 'Checkout page payment message color', 'wps-prime' ),
				'settings'    => 'wps_woo_color_payment_box',
				'section'     => 'wps_woo_checkout_color_settings',
			]
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'wps_woo_background_payment',
		[
			'selector' => '#payment.woocommerce-checkout-payment',
		]
	);
}

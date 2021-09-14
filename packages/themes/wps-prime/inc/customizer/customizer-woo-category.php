<?php
/**
 * Customize woocommerce product category.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Customizer\Woo\Category;

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

	// SETTING.
	$wp_customize->add_setting(
		'wps_woocommerce_shop_page_cat_descr_position',
		[
			'default'    => false,
			'type'       => 'theme_mod',
			'capability' => 'manage_woocommerce',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_woocommerce_shop_page_cat_descr_position',
		[
			'label'       => __( 'Archive description to bottom', 'wps-prime' ),
			'description' => __( 'Set to show the archive description after the product list.', 'wps-prime' ),
			'section'     => 'woocommerce_product_catalog',
			'type'        => 'checkbox',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_woocommerce_shop_page_cat_descr_hide',
		[
			'default'    => false,
			'type'       => 'theme_mod',
			'capability' => 'manage_woocommerce',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_woocommerce_shop_page_cat_descr_hide',
		[
			'label'       => __( 'Archive description hide', 'wps-prime' ),
			'description' => __( 'Do not show the archive description.', 'wps-prime' ),
			'section'     => 'woocommerce_product_catalog',
			'type'        => 'checkbox',
		]
	);

}

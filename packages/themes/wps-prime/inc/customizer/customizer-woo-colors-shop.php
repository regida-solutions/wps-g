<?php
/**
 * Customize woocommerce main shop area.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Customizer\Woo\Colors\Shop;

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
		'wps_woo_shop_color_settings',
		[
			'title'       => __( 'Colors - Shop', 'wps-prime' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Color settings for the shop / cart ', 'wps-prime' ),
			'panel'       => 'woocommerce',
		]
	);

	/**
		* Store notices | Price filter bar
		*/

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_color_primary',
		[
			'default'    => '#156fbf',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_woo_color_primary',
			[
				'label'       => __( 'Primary color', 'wps-prime' ),
				'description' => __( 'Used in Messages | Store notices | Price filter bar', 'wps-prime' ),
				'settings'    => 'wps_woo_color_primary',
				'section'     => 'wps_woo_shop_color_settings',
			]
		)
	);

	/**
		* Stock | discount color
		*/

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_color_highlight',
		[
			'default'    => '#6ec04a',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_woo_color_highlight',
			[
				'label'       => __( 'Highlight Color', 'wps-prime' ),
				'description' => __( 'Used in Stock | Discount color', 'wps-prime' ),
				'settings'    => 'wps_woo_color_highlight',
				'section'     => 'wps_woo_shop_color_settings',
			]
		)
	);

	/**
		* On sale
		*/

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_background_on_sale',
		[
			'default'    => '#5c992e',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_woo_background_on_sale',
			[
				'label'       => __( 'Sale badge background color', 'wps-prime' ),
				'description' => __( 'Used in sale badge', 'wps-prime' ),
				'settings'    => 'wps_woo_background_on_sale',
				'section'     => 'wps_woo_shop_color_settings',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_color_on_sale',
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
			'wps_theme_woo_color_on_sale',
			[
				'label'       => __( 'Sale badge text color', 'wps-prime' ),
				'description' => __( 'Used in sale badge', 'wps-prime' ),
				'settings'    => 'wps_woo_color_on_sale',
				'section'     => 'wps_woo_shop_color_settings',
			]
		)
	);

	/**
		* Out of stock
		*/
	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_color_out_of_stock',
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
			'wps_theme_woo_color_out_of_stock',
			[
				'label'       => __( 'Out of stock color', 'wps-prime' ),
				'description' => __( 'Used in Out of stock text', 'wps-prime' ),
				'settings'    => 'wps_woo_color_out_of_stock',
				'section'     => 'wps_woo_shop_color_settings',
			]
		)
	);

	/**
		* Color Price
		*/

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_color_price',
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
			'wps_theme_woo_color_price',
			[
				'label'       => __( 'Price text color', 'wps-prime' ),
				'description' => __( 'Color of the price text', 'wps-prime' ),
				'settings'    => 'wps_woo_color_price',
				'section'     => 'wps_woo_shop_color_settings',
			]
		)
	);

	/**
		* Star rating color
		*/

	// SETTING.
	$wp_customize->add_setting(
		'wps_woo_star_rating_color',
		[
			'default'    => '#f9bf3b',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_woo_star_rating_color',
			[
				'label'       => __( 'Star rating color', 'wps-prime' ),
				'description' => __( 'Background color of rating stars', 'wps-prime' ),
				'settings'    => 'wps_woo_star_rating_color',
				'section'     => 'wps_woo_shop_color_settings',
			]
		)
	);
}

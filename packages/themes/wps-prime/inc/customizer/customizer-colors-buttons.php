<?php
/**
 * Site content area customizer options.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Customizer\Colors\Buttons;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

add_action( 'customize_register', __NAMESPACE__ . '\\register' );

/**
 * Generate the color for the customizer option
 *
 * @param string $color Name of the color to be mapped to option.
 *
 * @return string
 */
function parse_defaults( string $color ):string {

	$color_list = apply_filters( 'wps_default_button_colors', [
		'button-color-default'   => '#1E1E1C',
		'button-color-primary'   => '#20638f',
		'button-color-secondary' => '#e67e22',
		'button-color-tertiary'  => '#00b0d0',
		'button-color-negative'  => '#e74c3c',
		'button-color-positive'  => '#2ecc71',
		'button-color-neutral'   => '#505050',
		'button-color-light'     => '#999',
		'button-color-white'     => '#fff',
	] );
	$output     = [];

	/**
	 * Default values are copied from css
	 * Transform line to dash to allow usage in customizer
	 * Change line to dash
	 */
	foreach ( $color_list as $key => $value ) {
		$def_key            = str_replace( '-', '_', $key );
		$output[ $def_key ] = $value;
	}

	// Change argument lines to dash.
	$color = str_replace( '-', '_', $color );

	return $output[ $color ];
}

/**
 * Register customizer options
 *
 * @param object $wp_customize WP Customizer object.
 * @return void
 */
function register( object $wp_customize ):void {

	$colors = [
		'default',
		'primary',
		'secondary',
		'tertiary',
		'negative',
		'positive',
		'neutral',
		'light',
		'white',
	];

	foreach ( $colors as $color ) {
		/**
		 * Button Colors
		 */
		// SETTING.
		$wp_customize->add_setting(
			'wps_button_color_' . $color,
			[
				'default'    => parse_defaults( 'button_color_' . $color ),
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
			]
		);

		// CONTROL.
		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				'wps_theme_button_color_' . $color,
				[
					'label'    => __( 'Button color ', 'wps-prime' ) . $color,
					'settings' => 'wps_button_color_' . $color,
					'section'  => 'button_colors_section',
				]
			)
		);
	}

	// SETTING.
	$wp_customize->add_setting(
		'wps_button_color_hover_modifier',
		[
			'default'    => '-0.2',
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_theme_button_color_hover_modifier',
		[
			'type'              => 'range',
			'label'             => __( 'Button hover color modifier', 'wps-prime' ),
			'description'       => __( '<b>Default: -0.2.</b><br>Use the slider to set the hover color darken or lighter, between -1,1 values. 0.1 steps (0.1 = 10%)', 'wps-prime' ),
			'settings'          => 'wps_button_color_hover_modifier',
			'priority'          => 10,
			'section'           => 'button_colors_section',
			'input_attrs'       => [
				'min'  => -1,
				'max'  => 1,
				'step' => 0.1,
			],
			'sanitize_callback' => 'intval',
		]
	);

}

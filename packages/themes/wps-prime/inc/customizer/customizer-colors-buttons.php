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
 * Register customizer options
 *
 * @param object $wp_customize WP Customizer object.
 * @return void
 */
function register( object $wp_customize ):void {

	$colors = \WpsPrime\Setup\Editor\site_button_color_list();

	foreach ( $colors as $color ) {
		/**
		 * Button Colors
		 */
		// SETTING.
		$wp_customize->add_setting(
			'wps_button_color_' . $color['id'],
			[
				'default'    => $color['value'],
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
			]
		);

		// CONTROL.
		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				'wps_theme_button_color_' . $color['id'],
				[
					'label'    => __( 'Button color ', 'wps-prime' ) . $color['title'],
					'settings' => 'wps_button_color_' . $color['id'],
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

<?php
/**
 * Site content area customizer options.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Customizer\Colors;

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

	$color_list = apply_filters('wps_default_colors', [
		'text-color-body'    => '#000000',
		'text-color-link'    => '#007abe',
		'text-color-heading' => '#000000',
		'color-one'          => '#2c3e50',
		'color-two'          => '#007abe',
		'color-three'        => '#ff8c40',
		'color-four'         => '#e74c3c',
		'color-five'         => '#fafa26',
		'color-six'          => '#00b894',
		'color-seven'        => '#ffffff',
		'color-eight'        => '#bdc3c7',
		'color-nine'         => '#7f8c8d',
		'color-ten'          => '#32373c',
	]);

	$output = [];

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

	// Panel.
	$wp_customize->add_panel(
		'theme_colors_panel',
		[
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => 'Theme Colors',
			'description'    => '',
		]
	);

	// Sections.
	$wp_customize->add_section(
		'global_theme_colors_section',
		[
			'title'      => __( 'Global Theme Colors', 'wps-prime' ),
			'priority'   => 35,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_colors_panel',
		]
	);

	$wp_customize->add_section(
		'colors_section',
		[
			'title'      => __( 'Content Colors', 'wps-prime' ),
			'priority'   => 35,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_colors_panel',
		]
	);

	$wp_customize->add_section(
		'button_colors_section',
		[
			'title'      => __( 'Button Colors', 'wps-prime' ),
			'priority'   => 35,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_colors_panel',
		]
	);

	/**
	* Typography colors
		*/
	// SETTING.
	$wp_customize->add_setting(
		'wps_text_color_body',
		[
			'default'    => parse_defaults( 'text_color_body' ),
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_color_text',
			[
				'label'    => __( 'Body text color', 'wps-prime' ),
				'settings' => 'wps_text_color_body',
				'section'  => 'global_theme_colors_section',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_text_color_link',
		[
			'default'    => parse_defaults( 'text_color_link' ),
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_theme_color_link',
			[
				'label'    => __( 'Link color', 'wps-prime' ),
				'settings' => 'wps_text_color_link',
				'section'  => 'global_theme_colors_section',
			]
		)
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_text_color_heading',
		[
			'default'    => parse_defaults( 'text_color_heading' ),
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		new \WP_Customize_Color_Control(
			$wp_customize,
			'wps_text_color_heading',
			[
				'label'    => __( 'Headings color', 'wps-prime' ),
				'settings' => 'wps_text_color_heading',
				'section'  => 'global_theme_colors_section',
			]
		)
	);

	/**
		* Background colors
		*/
	$color_definitions = \WpsPrime\Setup\Editor\site_editor_color_list();

	foreach ( $color_definitions as $color ) {

		// SETTING.
		$wp_customize->add_setting(
			'wps_color_' . $color['id'],
			[
				'default'    => parse_defaults( 'color_' . $color['id'] ),
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
			]
		);

		// CONTROL.
		$wp_customize->add_control(
			new \WP_Customize_Color_Control(
				$wp_customize,
				'wps_theme_color_' . $color['id'],
				[
					'label'    => $color['title'],
					'settings' => 'wps_color_' . $color['id'],
					'section'  => 'colors_section',
				]
			)
		);
	}

}

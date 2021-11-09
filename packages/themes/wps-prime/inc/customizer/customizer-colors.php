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
			'default'    => '#000000',
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
			'default'    => '#007abe',
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
			'default'    => '#000000',
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
				'default'    => $color['color'],
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

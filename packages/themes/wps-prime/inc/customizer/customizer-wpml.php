<?php
/**
 * Site WPML customizer options.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Customizer\Wpml;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

/**
	* Check if WPML is active
	*/
if ( function_exists( 'icl_object_id' ) ) {
	add_action( 'customize_register', __NAMESPACE__ . '\\register' );
}

/**
 * Register customizer options
 *
 * @param object $wp_customize WP Customizer object.
 * @return void
 */
function register( object $wp_customize ):void {

	// Add customizer section.
	$wp_customize->add_section(
		'wps_translator_settings',
		[
			'title'      => __( 'Translator setup', 'wps-prime' ),
			'capability' => 'edit_theme_options',
		]
	);

	/**
		* Add settings
		*/
	$wp_customize->add_setting(
		'translation_switcher_display',
		[
			'default'    => false,
			'type'       => 'theme_mod',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	$wp_customize->add_control(
		'translation_switcher_display',
		[
			'type'        => 'checkbox',
			'section'     => 'wps_translator_settings',
			'label'       => __( 'Add language switcher to header and mobile menu sidebar', 'wps-prime' ),
			'description' => __( 'You have to configure "Custom language switchers options" under languages in WPML', 'wps-prime' ) . ' <a href="' . get_admin_url() . 'admin.php?page=sitepress-multilingual-cms%2Fmenu%2Flanguages.php#wpml-language-switcher-shortcode-action" target="_blank" title="Open in new tab">go to setting</a>',
		]
	);
}

<?php
/**
 * Site branding customizer options.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Customizer\Branding;

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
		'company_social_media_section',
		[
			'title'      => __( 'Social Media', 'wps-prime' ),
			'capability' => 'edit_theme_options',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_phone_nr',
		[
			'default'           => '',
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => __NAMESPACE__ . '\\sanitize_phone_number',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_phone_nr',
		[
			'type'        => 'text',
			'label'       => __( 'Phone number one', 'wps-prime' ),
			'description' => __( 'Used in a shortcode. Regardless where the phone number will be placed you can update it from here', 'wps-prime' ),
			'priority'    => 70,
			'section'     => 'title_tagline',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_phone_nr_second',
		[
			'default'           => '',
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => __NAMESPACE__ . '\\sanitize_phone_number',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_phone_nr_second',
		[
			'type'        => 'text',
			'label'       => __( 'Phone number second', 'wps-prime' ),
			'description' => __( 'Used in a shortcode. Regardless where the phone number will be placed you can update it from here', 'wps-prime' ),
			'priority'    => 70,
			'section'     => 'title_tagline',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_phone_nr_platform',
		[
			'default'           => '',
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => __NAMESPACE__ . '\\sanitize_phone_number',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_phone_nr_platform',
		[
			'type'        => 'text',
			'label'       => __( 'Phone number used for platforms like whatsapp', 'wps-prime' ),
			'description' => __( 'Used in whatsapp shortcode. Regardless where the phone number will be placed you can update it from here', 'wps-prime' ),
			'priority'    => 70,
			'section'     => 'title_tagline',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_email_address',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_email_address',
		[
			'type'        => 'text',
			'label'       => __( 'Company contact email', 'wps-prime' ),
			'description' => __( 'Used in a shortcode. Regardles where the email will be placed you can update it from here', 'wps-prime' ),
			'priority'    => 70,
			'section'     => 'title_tagline',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_email_address_second',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_email_address_second',
		[
			'type'        => 'text',
			'label'       => __( 'Company contact email Second', 'wps-prime' ),
			'description' => __( 'Used in a shortcode. Regardles where the email will be placed you can update it from here', 'wps-prime' ),
			'priority'    => 70,
			'section'     => 'title_tagline',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_site_disclaimer',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_site_disclaimer',
		[
			'type'        => 'textarea',
			'label'       => __( 'Site disclaimer', 'wps-prime' ),
			'description' => __( 'Disclaimer text will appear in the footer.', 'wps-prime' ),
			'priority'    => 70,
			'section'     => 'title_tagline',
		]
	);

	/******************************
		* SETTING|CONTROL PAIRS Social Media
		* 2. Register new settings to the WP database...
		* 3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
		*/
	// SETTING.
	$wp_customize->add_setting(
		'wps_social_link_facebook',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_social_link_facebook',
		[
			'type'     => 'text',
			'label'    => __( 'Facebook link', 'wps-prime' ),
			'priority' => 10,
			'section'  => 'company_social_media_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_social_link_instagram',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_social_link_instagram',
		[
			'type'     => 'text',
			'label'    => __( 'Instagram link', 'wps-prime' ),
			'priority' => 10,
			'section'  => 'company_social_media_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_social_link_twitter',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_social_link_twitter',
		[
			'type'     => 'text',
			'label'    => __( 'Twitter link', 'wps-prime' ),
			'priority' => 10,
			'section'  => 'company_social_media_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_social_link_linkedin',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_social_link_linkedin',
		[
			'type'     => 'text',
			'label'    => __( 'LinkedIn link', 'wps-prime' ),
			'priority' => 10,
			'section'  => 'company_social_media_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_social_link_google',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_social_link_google',
		[
			'type'     => 'text',
			'label'    => __( 'Google my business link', 'wps-prime' ),
			'priority' => 10,
			'section'  => 'company_social_media_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_social_link_youtube',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_social_link_youtube',
		[
			'type'     => 'text',
			'label'    => __( 'Youtube link', 'wps-prime' ),
			'priority' => 10,
			'section'  => 'company_social_media_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_social_link_vimeo',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_social_link_vimeo',
		[
			'type'     => 'text',
			'label'    => __( 'Vimeo link', 'wps-prime' ),
			'priority' => 10,
			'section'  => 'company_social_media_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_social_link_flickr',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_social_link_flickr',
		[
			'type'     => 'text',
			'label'    => __( 'Flickr link', 'wps-prime' ),
			'priority' => 10,
			'section'  => 'company_social_media_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_social_link_pinterest',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_social_link_pinterest',
		[
			'type'     => 'text',
			'label'    => __( 'Pinterest link', 'wps-prime' ),
			'priority' => 10,
			'section'  => 'company_social_media_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_social_link_medium',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_social_link_medium',
		[
			'type'     => 'text',
			'label'    => __( 'Medium link', 'wps-prime' ),
			'priority' => 10,
			'section'  => 'company_social_media_section',
		]
	);

	// 4. We can also change built-in settings by modifying properties.
	// For instance, let's make some stuff use live preview JS...
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$wp_customize->get_setting( 'wps_site_disclaimer' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'wps_site_disclaimer',
		[
			'selector'        => '.site-disclaimer',
			'render_callback' => 'wps_site_disclaimer',
		]
	);

}

/**
 * Cleanup phone number
 *
 * @param string $input Phone number.
 *
 * @return string
 */
function sanitize_phone_number( string $input ):string {
	return preg_replace( '/[^0-9_+-]/', '', $input );
}

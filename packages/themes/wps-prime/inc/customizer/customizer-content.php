<?php
/**
 * Site content area customizer options.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Customizer\Content;

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

	// Pull all the pages into an array.
	$options_pages     = [];
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';

	foreach ( $options_pages_obj as $page ) {
		$options_pages[ $page->ID ] = $page->post_title;
	}

	// Add customizer panel.
	$wp_customize->add_panel(
		'theme_site_content_panel',
		[
			'capability' => 'edit_theme_options',
			'title'      => 'Site content',
		]
	);

	// Add customizer section.
	$wp_customize->add_section(
		'site_content_section',
		[
			'title'      => __( 'Site content', 'wps-prime' ),
			'priority'   => 35,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_site_content_panel',
		]
	);

	// Add customizer section.
	$wp_customize->add_section(
		'site_blog_section',
		[
			'title'      => __( 'Blog', 'wps-prime' ),
			'priority'   => 35,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_site_content_panel',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_global_content_start_area',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_global_content_start_area',
		[
			'type'        => 'textarea',
			'label'       => __( 'Global before header content', 'wps-prime' ),
			'description' => __( 'Area visible at the start of the site. ( default location before the header )', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'site_content_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_global_before_content_area',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_global_before_content_area',
		[
			'type'        => 'textarea',
			'label'       => __( 'Global before main content', 'wps-prime' ),
			'description' => __( 'Area visible before the main content right after the header.', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'site_content_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_global_content_end_area',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_global_content_end_area',
		[
			'type'        => 'textarea',
			'label'       => __( 'Global before footer content', 'wps-prime' ),
			'description' => __( 'Area visible on all the site pages. ( default location before the footer )', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'site_content_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_theme_widget_class',
		[
			'default'    => false,
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_theme_widget_class',
		[
			'type'        => 'checkbox',
			'label'       => __( 'Widget custom CSS class', 'wps-prime' ),
			'description' => __( 'Enable custom CSS field option on site widgets', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'site_content_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_404_custom_page',
		[
			'default'    => false,
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_404_custom_page',
		[
			'type'        => 'select',
			'label'       => __( 'Choose a page to use it as 404', 'wps-prime' ),
			'description' => __( 'Choose a page to display it\'s content on the 404 error page.', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'site_content_section',
			'choices'     => $options_pages,
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_article_has_sidebar',
		[
			'default'    => false,
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_article_has_sidebar',
		[
			'type'     => 'checkbox',
			'label'    => __( 'Enable single post sidebar', 'wps-prime' ),
			'priority' => 10,
			'section'  => 'site_blog_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_article_swap_sidebar_position',
		[
			'default'    => false,
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_article_swap_sidebar_position',
		[
			'type'     => 'checkbox',
			'label'    => __( 'Swap sidebar position to other side', 'wps-prime' ),
			'priority' => 10,
			'section'  => 'site_blog_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_article_meta_visibility',
		[
			'default'    => false,
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_article_meta_visibility',
		[
			'type'        => 'checkbox',
			'label'       => __( 'Hide article meta', 'wps-prime' ),
			'description' => __( 'Set Article meta data visibility (ex. Posted on... / Posted in ...) show/hide. Default \'show\'', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'site_blog_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_meta_u_time_visibility',
		[
			'default'    => false,
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_meta_u_time_visibility',
		[
			'type'        => 'checkbox',
			'label'       => __( 'Article meta time setting', 'wps-prime' ),
			'description' => __( 'Show modified time and publish time', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'site_blog_section',
		]
	);

	// SETTING.
	$wp_customize->add_setting(
		'wps_disable_comment_url',
		[
			'default'    => '',
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'refresh',
		]
	);

	// CONTROL.
	$wp_customize->add_control(
		'wps_disable_comment_url',
		[
			'type'        => 'checkbox',
			'label'       => __( 'Comment form URL field', 'wps-prime' ),
			'description' => __( 'Disable the url field in the comment form section.', 'wps-prime' ),
			'priority'    => 10,
			'section'     => 'site_blog_section',
		]
	);

	$wp_customize->get_setting( 'wps_global_content_start_area' )->transport = 'postMessage';
	$wp_customize->selective_refresh->add_partial(
		'wps_global_content_start_area',
		[
			'selector'        => '.site-global-content-start',
			'render_callback' => '\WpsPrime\Setup\Layout\global_content_start_area',
		]
	);

	$wp_customize->get_setting( 'wps_global_before_content_area' )->transport = 'postMessage';
	$wp_customize->selective_refresh->add_partial(
		'wps_global_before_content_area',
		[
			'selector'        => '.site-global-before-content',
			'render_callback' => '\WpsPrime\Setup\Layout\global_before_content_area',
		]
	);

	$wp_customize->get_setting( 'wps_global_content_end_area' )->transport = 'postMessage';
	$wp_customize->selective_refresh->add_partial(
		'wps_global_content_end_area',
		[
			'selector'        => '.site-global-content-end',
			'render_callback' => '\WpsPrime\Setup\Layout\global_content_end_area',
		]
	);

	$wp_customize->get_setting( 'wps_article_meta_visibility' )->transport = 'refresh';
	$wp_customize->selective_refresh->add_partial(
		'wps_article_meta_visibility',
		[
			'selector'        => '.entry-meta-content',
			'render_callback' => 'wps_prime_posted_on',
		]
	);

	$wp_customize->get_setting( 'wps_meta_u_time_visibility' )->transport = 'refresh';
	$wp_customize->selective_refresh->add_partial(
		'wps_meta_u_time_visibility',
		[
			'selector'        => '.entry-date',
			'render_callback' => 'wps_prime_posted_on_time',
		]
	);

}

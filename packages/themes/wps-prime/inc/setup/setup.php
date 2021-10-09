<?php
/**
 * Theme setup file.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Setup;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

add_action( 'after_setup_theme', __NAMESPACE__ . '\\setup' );
add_filter( 'wps_site_setting_js', __NAMESPACE__ . '\\site_js_settings' );
add_filter( 'map_meta_cap', __NAMESPACE__ . '\\add_unfiltered_html_capability_to_site_admin', 90, 3 );

/**
 * Setup Theme Functionality
 */
function setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on wps_prime, use a find and replace
		* to change 'wps-prime' to the name of your theme in all the template files
		*/
	load_theme_textdomain( 'wps-prime', get_template_directory() . '/languages' );

	/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support( 'title-tag' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails.
	add_theme_support( 'post-thumbnails' );

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		[
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		]
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/* 3rd Party plugins support */
	add_theme_support( 'woocommerce' );
	add_theme_support( 'yoast-seo-breadcrumbs' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Add support for custom logo.
	add_theme_support( 'custom-logo' );
}

/**
 * Enable unfiltered_html capability for Administrators and Editors.
 *
 * @param array  $caps    The user's capabilities.
 * @param string $cap     Capability name.
 * @param int    $user_id The user ID.
 * @return array $caps    The user's capabilities, with 'unfiltered_html' potentially added.
 */
function add_unfiltered_html_capability_to_site_admin( array $caps, string $cap, int $user_id ): array {
	if ( 'unfiltered_html' === $cap && ( user_can( $user_id, 'administrator' ) || user_can( $user_id, 'editor' ) ) ) {
		$caps = [ $cap ];
	}

	return $caps;
}

/**
 * Make available site settings in js
 *
 * @param array $settings The site options settings.
 */
function site_js_settings( array $settings ):array {

	/* Get theme settings */
	$use_sticky     = get_theme_mod( 'header_use_sticky', false );

	$settings['useSticky']    = $use_sticky;

	return $settings;
}

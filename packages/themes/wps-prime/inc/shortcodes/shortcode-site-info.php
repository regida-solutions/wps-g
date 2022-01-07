<?php
/**
 * Get access to various site info.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Shortcodes\SiteInfo;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

add_shortcode( 'wps_get_site_info', __NAMESPACE__ . '\\wps_get_site_info_shortcode' );
add_shortcode( 'wps_the_site_info', __NAMESPACE__ . '\\wps_the_site_info_shortcode' );

/**
 * Get various information from site
 *
 * @param string $atts Shortcode settings.
 * @return string
 */
function wps_get_site_info_shortcode( $atts ):string { // phpcs:ignore
	$options = shortcode_atts(
		[
			'field'  => 'name',
			'return' => true,
		],
		$atts,
		'wps_get_site_info'
	);
	return esc_html( get_bloginfo( $options['field'] ) );
}

/**
 * Get various information from site
 *
 * @param string $atts Shortcode settings.
 * @return void
 */
function wps_the_site_info_shortcode( $atts ):void { // phpcs:ignore
	$options = shortcode_atts(
		[
			'field'  => 'name',
			'return' => true,
		],
		$atts,
		'wps_the_site_info'
	);
	echo esc_html( get_bloginfo( $options['field'] ) );
}


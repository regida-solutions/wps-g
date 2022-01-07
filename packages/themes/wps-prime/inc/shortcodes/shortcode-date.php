<?php
/**
 * Get the current date
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Shortcodes\Date;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

add_shortcode( 'wps_get_the_date', __NAMESPACE__ . '\\wps_get_the_date' );
add_shortcode( 'wps_the_date', __NAMESPACE__ . '\\wps_the_date' );

/**
 * Get the date shortcode
 *
 * @param string $atts Shortcode settings.
 * @return string
 */
function wps_get_the_date( $atts ):string { // phpcs:ignore
	$options = shortcode_atts(
		[
			'format' => 'Y',
		],
		$atts,
		'wps_get_the_date'
	);
	return esc_html( gmdate( $options['format'] ) );
}

/**
 * Get the date shortcode
 *
 * @param string $atts Shortcode settings.
 * @return void
 */
function wps_the_date( $atts ):void { // phpcs:ignore
	$options = shortcode_atts(
		[
			'format' => 'Y',
		],
		$atts,
		'wps_the_date'
	);
	echo esc_html( gmdate( $options['format'] ) );
}

<?php
/**
 * Setup plugin assets
 *
 * @package WpsBlocks
 */

declare( strict_types=1 );

namespace WPS\Blocks\Inc\Assets;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\front_end_assets' );

/**
 * Enqueue scripts and styles for the client.
 */
function front_end_assets() {

	if ( wp_script_is( 'wps-slider-core', 'registered' ) ) {
		return;
	} else {
		// SWIPER Slider Core.
		wp_register_script( 'wps-slider-core', 'https://unpkg.com/swiper@7/swiper-bundle.min.js', [], WPS_BLOCKS_VERSION, true );
	}

	if ( wp_style_is( 'wps-slider-core', 'registered' ) ) {
		return;
	} else {
		// SWIPER Slider Core.
		wp_register_style( 'wps-slider-core', 'https://unpkg.com/swiper@7/swiper-bundle.min.css', [], WPS_BLOCKS_VERSION );
	}

}

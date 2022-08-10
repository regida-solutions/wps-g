<?php
/**
 * Run theme fonts on front end.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Typography;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\add_theme_fonts', 99 ); // Add last in style chain.
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\\add_theme_fonts' );


/**
 * Add fonts to head
 *
 * @return void
 */
function add_theme_fonts():void {

	if ( get_theme_mod( 'wps_custom_font_family_status' ) ) {
		return;
	}

	$fonts_api = new Typography_Get_Fonts();

	$font_main = get_theme_mod( 'wps_main_font_family' ); // Get selected font family option.

	/* If no font is set return */
	if ( ! $font_main ) {
		return;
	} else {

		$fonts = $fonts_api->get_theme_fonts_link();
		$count = 0;
		foreach ( $fonts as $link ) {
			wp_register_style( 'wps_theme_main_font_' . $count, $link, '', WPS_PRIME_THEME_VERSION );
			wp_enqueue_style( 'wps_theme_main_font_' . $count );
			$count++;
		}
		if ( $fonts_api->get_theme_font_style() ) {
			wp_add_inline_style( 'wps_theme_main_font_0', $fonts_api->get_theme_font_style() );
		}
	}
}

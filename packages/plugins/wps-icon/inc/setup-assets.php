<?php
/**
 * Register Icon styles
 *
 * @package WpsFontawesome
 */

declare( strict_types=1 );

namespace WPS\Fontawesome\Inc\Assets;

/**
 * Register assets
 */
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\front_end_assets' );
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\\editor_assets' );

define('WPS_ICON_STYLES', [
	'fontawesome',
	'all',
	'brands',
	'duotone',
	'light',
	'regular',
	'solid',
	'thin',
]);

/**
 * Enqueue scripts and styles for the client.
 */
function front_end_assets() {

	foreach ( WPS_ICON_STYLES as $icon ) {
		// Stylesheets.
		$style_path = WPS_ICON_BLOCKS_DIR_PATH . 'assets/css/' . $icon . '.min.css';
		$style_url  = WPS_ICON_BLOCKS_DIR_URL . 'assets/css/' . $icon . '.min.css';
		if ( file_exists( $style_path ) ) {
			wp_register_style(
				'wps-icon-assets-' . $icon,
				$style_url,
				[],
				filemtime( $style_path )
			);
		}
	}

}

/**
 * Enqueue editor style for the WordPress editor.
 */
function editor_assets() {

	foreach ( WPS_ICON_STYLES as $icon ) {
		// Stylesheets.
		$style_path = WPS_ICON_BLOCKS_DIR_PATH . 'assets/css/' . $icon . '.min.css';
		$style_url  = WPS_ICON_BLOCKS_DIR_URL . 'assets/css/' . $icon . '.min.css';
		if ( file_exists( $style_path ) ) {
			wp_register_style(
				'wps-icon-editor-assets-' . $icon,
				$style_url,
				[],
				filemtime( $style_path )
			);
		}
	}
	wp_enqueue_style( 'wps-icon-editor-assets-all' );
}

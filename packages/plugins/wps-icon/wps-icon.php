<?php
/**
 * Plugin Name:     WPS Icon
 * Plugin URI:      https://wpshapers.com
 * Description:     Icon library to be used with wps-prime framework
 * Author:          WPShapers
 * Author URI:      https://wpshapers.com
 * Text Domain:     wps-icon
 * Version:         1.0.0
 *
 * @package WpsFontawesome
 */

declare( strict_types=1 );

namespace WPS\Fontawesome;

define( 'WPS_ICON_BLOCKS_VERSION', '1.0.0' );
define( 'WPS_ICON_BLOCKS_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'WPS_ICON_BLOCKS_DIR_URL', plugin_dir_url( __FILE__ ) );

add_action( 'init', __NAMESPACE__ . '\\register_blocks' );
add_filter( 'wps_allowed_block_types', __NAMESPACE__ . '\\allowed_block_types' );


require_once __DIR__ . '/inc/setup-assets.php';

if ( file_exists( __DIR__ . '/src/template.php' ) ) {
	include_once __DIR__ . '/src/template.php';
}

/**
 * Setup allowed_block_types
 *
 * @param array $list The allowed blocks list definition.
 * @return array
 */
function allowed_block_types( array $list ): array {
	return array_merge( $list, [ 'wps/icon' ] );
}


/**
 * Register blocks
 */
function register_blocks() {
		$args = [];

	if ( file_exists( WPS_ICON_BLOCKS_DIR_PATH . 'src/template.php' ) ) {
		$args['render_callback'] = apply_filters( 'render_callback_icon', 'return__false' );
	}

		register_block_type_from_metadata(
			WPS_ICON_BLOCKS_DIR_PATH . 'src/',
			$args
		);
}

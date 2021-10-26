<?php
/**
 * Plugin Name:     WPS Blocks
 * Plugin URI:      https://wpshapers.com
 * Description:     A set of blocks built to be used with wps-prime framework
 * Author:          WPShapers
 * Author URI:      https://wpshapers.com
 * Text Domain:     wps-blocks
 * Version:         1.0.0
 *
 * @package WpsBlocks
 */

declare( strict_types=1 );

namespace WPS\Blocks;

define( 'BLOCKS_VERSION', '1.0.0' );
define( 'BLOCKS_DIR_PATH', plugin_dir_path( __FILE__ ) );

add_action( 'init', __NAMESPACE__ . '\\register_blocks' );
add_filter( 'wps_allowed_block_types', __NAMESPACE__ . '\\allowed_block_types' );


define( 'BLOCKS_LIST', [
	'shortcode',
	'hero',
	'section',
	'slider',
	'slider-slide',
]);

/* Load image shortcode */
require_once __DIR__ . '/shortcodes/image.php';

/* Load helpers */
require_once __DIR__ . '/helpers/helpers.php';

/* Load Patterns */
require_once __DIR__ . '/patterns/patterns.php';

/**
 * Load all templates
 */
$blocks = BLOCKS_LIST;
foreach ( $blocks as $block ) {
	if ( file_exists( __DIR__ . '/src/' . $block . '/template.php' ) ) {
		include_once __DIR__ . '/src/' . $block . '/template.php';
	}
}

/**
 * Setup allowed_block_types
 *
 * @param array $list The allowed blocks list definition.
 * @return array
 */
function allowed_block_types( array $list ): array {
	$blocks         = BLOCKS_LIST;
	$allowed_blocks = [];

	foreach ( $blocks as $block ) {
		$allowed_blocks[] = 'wps/' . $block;
	}
	return array_merge( $list, $allowed_blocks );
}


/**
 * Register blocks
 */
function register_blocks() {
	$blocks = BLOCKS_LIST;

	foreach ( $blocks as $block ) {

		$args = [];

		if ( file_exists( BLOCKS_DIR_PATH . 'src/' . $block . '/template.php' ) ) {
			$args['render_callback'] = apply_filters( 'render_callback_' . $block, 'return__false' );
		}

		register_block_type_from_metadata(
			BLOCKS_DIR_PATH . 'src/' . $block,
			$args
		);
	}
}
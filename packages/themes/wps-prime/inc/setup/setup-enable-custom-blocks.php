<?php
/**
 * Setup custom blocks
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Setup\CustomBlocks;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

add_filter( 'wps_allowed_block_types', __NAMESPACE__ . '\\allowed_custom_blocks_from_customizer' );

/**
 * Add custom blocks to allowed list from customizer setting.
 *
 * @param array $list Gutenberg allowed block list.
 *
 * @return array
 */
function allowed_custom_blocks_from_customizer( array $list ): array {

	$custom_block_list = get_option( 'wps_enable_blocks_list' );

	$custom_blocks = [];

	if ( $custom_block_list ) {

		$custom_blocks = explode( ',', $custom_block_list );
	}

	return array_merge( $list, $custom_blocks );
}

<?php
/**
 * Customize Gutenberg Editor.
 *
 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/
 *
 * @package WpsPrime
 */

declare( strict_types=1 );
namespace WpsPrime\Setup\Editor;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

add_action( 'after_setup_theme', __NAMESPACE__ . '\\setup_editor' );
add_filter( 'allowed_block_types_all', __NAMESPACE__ . '\\allowed_block_types', 10, 2 );

/**
 * Disable text/background colors in Gutenberg
 */
function setup_editor() {

	// Adding support for core block visual styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align blocks.
	add_theme_support( 'align-wide' );

	/**
		* FlatUI colors
		*
		* @link https://flatuicolors.com/
		*/

	add_theme_support( 'editor-color-palette', generate_editor_palette() );
}

/**
 * Custom color palette
 */
function site_button_color_list():array {

	return apply_filters( 'site_editor_color_list', [
		[
			'title' => 'Default',
			'id'    => 'default',
			'value' => '#1E1E1C',
		],
		[
			'title' => 'Primary',
			'id'    => 'primary',
			'value' => '#20638f',
		],
		[
			'title' => 'Secondary',
			'id'    => 'secondary',
			'value' => '#e67e22',
		],
		[
			'title' => 'Tertiary',
			'id'    => 'tertiary',
			'value' => '#00b0d0',
		],
		[
			'title' => 'Negative',
			'id'    => 'negative',
			'value' => '#e74c3c',
		],
		[
			'title' => 'Positive',
			'id'    => 'positive',
			'value' => '#2ecc71',
		],
		[
			'title' => 'Neutral',
			'id'    => 'neutral',
			'value' => '#505050',
		],
		[
			'title' => 'Light',
			'id'    => 'light',
			'value' => '#999999',
		],
		[
			'title' => 'White',
			'id'    => 'white',
			'value' => '#ffffff',
		],

	]);
}

/**
 * Custom color palette
 */
function site_editor_color_list():array {

	return apply_filters( 'site_editor_color_list', [
		[
			'title' => 'Color 1',
			'id'    => 'one',
			'color' => '#2c3e50',
		],
		[
			'title' => 'Color 2',
			'id'    => 'two',
			'color' => '#007abe',
		],
		[
			'title' => 'Color 3',
			'id'    => 'three',
			'color' => '#ff8c40',
		],
		[
			'title' => 'Color 4',
			'id'    => 'four',
			'color' => '#e74c3c',
		],
		[
			'title' => 'Color 5',
			'id'    => 'five',
			'color' => '#fafa26',
		],
		[
			'title' => 'Color 6',
			'id'    => 'six',
			'color' => '#00b894',
		],
		[
			'title' => 'Color 7',
			'id'    => 'seven',
			'color' => '#ffffff',
		],
		[
			'title' => 'Color 8',
			'id'    => 'eight',
			'color' => '#bdc3c7',
		],
		[
			'title' => 'Color 9',
			'id'    => 'nine',
			'color' => '#7f8c8d',
		],
		[
			'title' => 'Color 10',
			'id'    => 'ten',
			'color' => '#32373c',
		],
	]);
}

/**
 * Generate editor color palette
 */
function generate_editor_palette():array {
		$colors = site_editor_color_list();

		$palette = [];

	foreach ( $colors as $color ) {
		$palette[] = [
			'name'  => $color['title'],
			'slug'  => $color['id'],
			'color' => get_theme_mod( 'wps_color_' . $color['id'], $color['color'] ),
		];
	}

		return $palette;
}


/**
 * Allowed Blocks
 *
 * @return array $allowed_block_types Allowed block Types
 */
function allowed_block_types() : array { //phpcs:ignore

	$list = [];

	$allowed_blocks = [
		// Core blocks.
		'core/block',
		'core/button',
		'core/buttons',
		'core/embed',
		'core/group',
		'core-embed/youtube',
		'core-embed/vimeo',
		'core/heading',
		'core/html',
		'core/image',
		'core/list',
		'core/paragraph',
		'core/quote',
		'core/table',
		'core/video',
		'core/columns',
		'core/column',
		'core/gallery',
		'core/categories',
		'core/legacy-widget',
		'core/latest-posts',
		'core/media-text',
		'core/calendar',
		'core/separator',
		'core/spacer',
		'core/text-columns',
		'core/query',

		// Woocommerce.
		'woocommerce/all-reviews',
		'woocommerce/product-categories',

		// 3rd party Plugins
		'gravityforms/form',
	];

		$allowed_blocks = array_merge( $allowed_blocks, apply_filters( 'wps_allowed_block_types', $list, 10, 1 ) );

	return array_unique( $allowed_blocks );
}


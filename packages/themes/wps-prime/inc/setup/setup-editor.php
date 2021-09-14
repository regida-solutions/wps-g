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

	// Remove default core block patterns.
	remove_theme_support( 'core-block-patterns' );

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
function site_editor_color_list():array {

	$color_list = apply_filters( 'site_editor_color_list', [
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

	return $color_list;
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
function allowed_block_types() : array {
	return [
		// Core blocks.
		'core/block',
		'core/button',
		'core/buttons',
		'core/embed',
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
	];
}

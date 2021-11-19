<?php
/**
 * The main theme helper files.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Helper;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

/**
 * Gets the default allowable attributes by post type and appends those needed for svgs.
 *
 * @param string $post_type The post type to get the allowable attributes for.
 *
 * @return array
 */
function add_svg_to_allowed_html( string $post_type = 'post' ): array {
	$kses_defaults = wp_kses_allowed_html( $post_type );

	$svg_args = [
		'svg'   => [
			'class'           => true,
			'aria-hidden'     => true,
			'aria-labelledby' => true,
			'role'            => true,
			'xmlns'           => true,
			'width'           => true,
			'height'          => true,
			'fill'            => true,
			'stroke'          => true,
			'stroke-width'    => true,
			'stroke-linecap'  => true,
			'stroke-linejoin' => true,
			'viewbox'         => true, // <= Must be lower case!
		],
		'g'     => [ 'fill' => true ],
		'title' => [ 'title' => true ],
		'path'  => [
			'd'               => true,
			'fill'            => true,
			'stroke'          => true,
			'stroke-width'    => true,
			'stroke-linecap'  => true,
			'stroke-linejoin' => true,
		],
	];

	$allowed_tags = array_merge( $kses_defaults, $svg_args );

	return $allowed_tags;
}

add_filter( 'wps_allowed_html_attributes_with_svg', __NAMESPACE__ . '\\add_svg_to_allowed_html', 10, 1 );


/**
 * Load all the customizer options
 */
function load_helpers() {
	$helpers = [
		'theme',
		'theme-icons',
		'developer-info',
		'posted-time',
		'comment-list',
		'woocommerce',
		'hooks-layout',
		'debug-hooks',
		'escape-svg',
		'categorized-blog',
	];

	foreach ( $helpers as $helper ) {
		include_once __DIR__ . '/helpers-' . $helper . '.php';
	}
}

load_helpers();

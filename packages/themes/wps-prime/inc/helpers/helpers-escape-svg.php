<?php
/**
 * Get site diagnostics data.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Helpers;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

/**
 * Return allowed tags for svg
 *
 * @return array
 */
function svg_allowed_tags():array {
	$kses_defaults = wp_kses_allowed_html( 'post' );

	$svg_args = [
		'svg'   => [
			'class'           => true,
			'aria-hidden'     => true,
			'aria-labelledby' => true,
			'focusable'       => true,
			'data-prefix'     => true,
			'data-icon'       => true,
			'role'            => true,
			'xmlns'           => true,
			'width'           => true,
			'height'          => true,
			'viewbox'         => true, // <= Must be lower case!
		],
		'g'     => [ 'fill' => true ],
		'title' => [ 'title' => true ],
		'path'  => [
			'd'     => true,
			'fill'  => true,
			'class' => true,
		],
	];

	return array_merge( $kses_defaults, $svg_args );
}

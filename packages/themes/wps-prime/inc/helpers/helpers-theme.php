<?php
/**
 * WPS Prime Helpers.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Helpers;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}
/**
 * Front end CSS filter processing
 *
 * @param array  $class CSS Classes for element.
 * @param string $filter_name The filter function name.
 * @return string
 */
function process_class_filters( array $class, string $filter_name ):string {
	$classes = apply_filters( $filter_name, [], $class );

	if ( empty( $classes ) ) {
		return '';
	}
		$output = join( ' ', array_unique( $classes ) );
		return ' class="' . esc_attr( $output ) . '"';
}

/**
 * Create class array to be used as css classes for frontend components
 *
 * @param string $class CSS Classes for element.
 * @param string $filter_name Filter function name.
 * @return array
 */
function generate_css_class( string $class = '', string $filter_name = '' ):array {

	$classes = [];

	if ( ! empty( $class ) && ! empty( $filter_name ) ) {
		/**
			* TODO
			* Check to make sure we always get array
		 * if ( ! is_array( $class ) ) {
		 *  $class = preg_split( '#\s+#', $class );
		 * }
			*/
		$classes = array_merge( $classes, $class );

	} else {
		// Ensure that we always coerce class to being an array!
		$class = [];
	}

	$classes = array_map( 'esc_attr', $classes );

	/**
		* Filter the list of CSS body classes for the current post or page.
		*
		* @since 2.8.0
		*
		* @param array  $classes An array of body classes.
		* @param string $class   A comma-separated list of additional classes added.
		*/
	$classes = apply_filters( $filter_name, $classes, $class );

	return array_unique( $classes );
}

/**
 * Generate a list of css classes
 *
 * @param array $class Css class list.
 * @param bool  $flush Set if the space between should be removed.
 * @return string
 */
function generate_css_class_list( array $class = [], bool $flush = false ):string {
	$output = '';

	$space = $flush ? '' : ' ';

	if ( is_array( $class ) ) {
		$is_first = 0;

		foreach ( $class as $css_class ) {
			++$is_first;

			// if we have multiple values flush only the first space.
			if ( 1 === $is_first && $flush ) {
				$space = '';
			} else {
				$space = ' ';
			}

			// Check if we have a valid value and field is not empty.
			if ( ! empty( $css_class ) ) {
				$output .= $space . $css_class;
			}
		}
	} else {
		// Check if we have a valid value and field is not empty.
		if ( ! empty( $class ) ) {
			$output = $space . $class;
		}
	}
	return $output;
}

/**
 * Retrieves the attachment ID from the file URL
 *
 * @param string $image_url Full url to image.
 */
function get_image_id( string $image_url ):string {
	global $wpdb;
	$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid = %s", $image_url ) ); // phpcs:ignore
	return $attachment[0];
}

/**
 * Get size information for all currently-registered image sizes.
 *
 * @global $_wp_additional_image_sizes
 * @uses   get_intermediate_image_sizes()
 * @return string $sizes Data for all currently-registered image sizes.
 */
function get_image_sizes():string {
	global $_wp_additional_image_sizes;

	$sizes     = [];
	$size_list = '';

	foreach ( get_intermediate_image_sizes() as $_size ) {
		if ( in_array( $_size, [ 'thumbnail', 'medium', 'medium_large', 'large' ], true ) ) {
			$sizes[ $_size ]['width']  = get_option( "{$_size}_size_w" );
			$sizes[ $_size ]['height'] = get_option( "{$_size}_size_h" );
			$sizes[ $_size ]['crop']   = (bool) get_option( "{$_size}_crop" );
		} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
			$sizes[ $_size ] = [
				'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
				'height' => $_wp_additional_image_sizes[ $_size ]['height'],
				'crop'   => $_wp_additional_image_sizes[ $_size ]['crop'],
			];
		}
	}

	foreach ( $sizes as $image_size => $image_size_data ) {

		$crop = '';

		if ( is_array( $image_size_data['crop'] ) ) {
			$crop = 'true ' . $image_size_data['crop'][0] . '-' . $image_size_data['crop'][0];
		} else {
			$crop = $image_size_data['crop'] ? 'true auto' : 'false';
		}

		$size_list .= '<strong>' . $image_size . '</strong><br>' . $image_size_data['width'] . 'x' . $image_size_data['height'] . '<br>Croop: ' . $crop . '<hr/>';
	}

	return $size_list;
}


/**
 *  Check if hex color is dark or light
 *
 * @param string $hex_color A hex color string.
 * @return string
 */
function contrast_color( string $hex_color ):string {

	// hex_color RGB.
	$r1 = hexdec( substr( $hex_color, 1, 2 ) );
	$g1 = hexdec( substr( $hex_color, 3, 2 ) );
	$b1 = hexdec( substr( $hex_color, 5, 2 ) );

	// Black RGB.
	$black_color    = '#000000';
	$r2_black_color = hexdec( substr( $black_color, 1, 2 ) );
	$g2_black_color = hexdec( substr( $black_color, 3, 2 ) );
	$b2_black_color = hexdec( substr( $black_color, 5, 2 ) );

	// Calc contrast ratio.
	$l1 = 0.2126 * pow( $r1 / 255, 2.2 ) + 0.7152 * pow( $g1 / 255, 2.2 ) + 0.0722 * pow( $b1 / 255, 2.2 );

	$l2 = 0.2126 * pow( $r2_black_color / 255, 2.2 ) + 0.7152 * pow( $g2_black_color / 255, 2.2 ) + 0.0722 * pow( $b2_black_color / 255, 2.2 );

	$contrast_ratio = 0;
	if ( $l1 > $l2 ) {
		$contrast_ratio = (int) ( ( $l1 + 0.05 ) / ( $l2 + 0.05 ) );
	} else {
		$contrast_ratio = (int) ( ( $l2 + 0.05 ) / ( $l1 + 0.05 ) );
	}

	// If contrast is more than 5, return black color.
	if ( $contrast_ratio > 5 ) {
		return 'light';
	} else {
		// if not, return white color.
		return 'dark';
	}
}

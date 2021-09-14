<?php
/**
 * Custom excerpt
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Setup\Excerpt;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

/**
 *  Set how many words to show by character count
 *  Set how many characters you desire and the function will trim text to WORDS
 *  avoiding cutting words in the middle.
 *
 * @param int $charlength How many characters should the excerpt consist of.
 */
function excerpt( int $charlength ):string {
	$excerpt = get_the_excerpt();
	++$charlength;
	$output = '';

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex   = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut   = -( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			$output .= mb_substr( $subex, 0, $excut );
		} else {
			$output .= $subex;
		}
		$output .= '...';
	} else {
		$output .= $excerpt;
	}

	return $output;
}

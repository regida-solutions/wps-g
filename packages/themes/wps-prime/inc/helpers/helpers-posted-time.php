<?php
/**
 * Get posted time.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Helpers;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

/**
 * Return post publish time
 *
 * @return string
 */
function posted_on():string {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) && get_option( 'wps_meta_u_time_visibility' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> | <time class="updated" datetime="%3$s">%4$s %5$s</time>';
	}

	$output = sprintf(
		$time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		__( 'Updated', 'wps-prime' ),
		esc_html( get_the_modified_date() )
	);
	return $output;
}

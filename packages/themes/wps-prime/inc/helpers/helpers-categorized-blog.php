<?php
/**
 *   Custom Comment list
 *
 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Helpers;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function categorized_blog():bool {
	$all_the_cool_cats = get_transient( 'wps_prime_categories' );

	if ( false === $all_the_cool_cats ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( [
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		] );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'wps_prime_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so wps_prime_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so wps_prime_categorized_blog should return false.
		return false;
	}
}

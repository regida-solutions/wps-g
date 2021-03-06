<?php
/**
 * Woocommerce Helpers.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Helpers\Woocommerce;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

/**
 * Generate star rating for products
 *
 * @param string $rating Product rating 1 to 5.
 *
 * @return string
 */
function stars( string $rating ):string {
		$star_half  = '<svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="star-half" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-star-half fa-w-18" style="--fa-secondary-opacity:0.1;"><g class="fa-group"><path fill="currentColor" d="M545.3 226L439.6 329l25 145.5c4.5 26.1-23 46-46.4 33.7l-130.7-68.6V0a31.62 31.62 0 0 1 28.7 17.8l65.3 132.4 146.1 21.2c26.2 3.8 36.7 36.1 17.7 54.6z" class="fa-secondary"></path><path fill="currentColor" d="M110.4 474.5l25-145.5L29.7 226c-19-18.5-8.5-50.8 17.7-54.6l146.1-21.2 65.3-132.4A31.62 31.62 0 0 1 287.5 0v439.6l-130.7 68.6c-23.4 12.3-50.9-7.6-46.4-33.7z" class="fa-primary"></path></g></svg>';
		$star_full  = '<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-star fa-w-18"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" class=""></path></svg>';
		$star_empty = '<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-star fa-w-18"><path fill="currentColor" d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM405.8 317.9l27.8 162L288 403.5 142.5 480l27.8-162L52.5 203.1l162.7-23.6L288 32l72.8 147.5 162.7 23.6-117.7 114.8z" class=""></path></svg>';

		$stars  = '';
		$stars .= '<span class="wc-product-review-stars">';
	for ( $i = 0; $i < 5; $i++ ) {
		if ( $i < $rating && is_float( $rating - $i ) && $rating - $i < 1 ) {
			$stars .= '<span class="star-img">' . $star_half . '</span>';
		} elseif ( $i < $rating ) {
			$stars .= '<span class="star-img">' . $star_full . '</span>';
		} else {
			$stars .= '<span class="star-img">' . $star_empty . '</span>';
		}
	}
		$stars .= '</span>';
		return $stars;
}

/**
 * Check if WooCommerce is activated
 */
function is_woocommerce_activated():bool {
	return class_exists( 'WooCommerce' );
}

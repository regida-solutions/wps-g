<?php
/**
 * Template part for theme woocommerce review count.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}
global $product;
$rating_count = $product->get_rating_count();
?>

<h2 class="woocommerce-reviews-title">
	<?php if ( $rating_count > 0 ) : ?>

		<?php

		if ( $rating_count && wc_review_ratings_enabled() ) {
			/* translators: 1: reviews count 2: product name */
			$reviews_title = sprintf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $rating_count, 'wps-prime' ) ), esc_html( $rating_count ), '<span>' . get_the_title() . '</span>' );
			echo apply_filters( 'woocommerce_reviews_title', $reviews_title, $rating_count, $product ); // phpcs:ignore XSS ok.
		} else {
			esc_html_e( 'Reviews', 'wps-prime' );
		}
		?>

	<?php else : ?>
		<?php esc_html_e( 'Customer Reviews', 'wps-prime' ); ?>
	<?php endif; ?>
</h2>

<?php
/**
 * Template part for theme woocommerce review list.
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
?>
<?php if ( $product->get_rating_count() > 0 ) : ?>
	<?php

	// Arguments for the query.
	$args = [
		'order'     => 'ASC',
		'orderby'   => 'date',
		'post_type' => 'product',
		'post_id'   => $product->get_id(),
	];

	// The comment query.
	$comments_query   = new \WP_Comment_Query();
	$product_comments = $comments_query->query( $args );

	foreach ( $product_comments as $product_comment ) :

		$timestamp     = strtotime( $product_comment->comment_date ); // Changing comment time to timestamp.
		$date          = gmdate( 'd-m-Y', $timestamp );
		$rating_number = get_comment_meta( $product_comment->comment_ID, 'rating', true );
		$stars         = \WpsPrime\Helpers\Woocommerce\stars( $rating_number );

		?>
		<div class="wc-single-product-review">
			<div class="wc-single-product-review-rating-top">
				<span class="wc-single-product-review-stars-wrap"><?php echo wp_kses_post( $stars ); ?></span>
				<div class="wc-single-product-review-rating-top__right">
					<span><?php esc_html_e( 'By', 'wps-prime' ); ?></span>
					<span class="wc-single-product-review-author"><?php echo wp_kses_post( $product_comment->comment_author ); ?></span>
					<span><?php esc_html_e( 'on', 'wps-prime' ); ?></span>
					<span class="wc-single-product-review-date"><?php echo esc_html( $date ); ?></span>
				</div>
			</div>
			<div class="wc-single-product-review-content"><?php echo wp_kses_post( $product_comment->comment_content ); ?></div>
		</div>
		<?php

	endforeach;
	?>

<?php else : ?>
	<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'woocommerce' ); ?></p>
<?php endif; ?>

<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.3.0
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

if ( ! comments_open() ) {
	return;
}
?>
<div class="wc-spsw-item wc-single-product-summary-wrapper-reviews">
	<div class="wc-single-product-summary-wrapper-reviews-items">
		<?php get_template_part( 'template-parts/woocommerce/single/review', 'count' ); ?>
		<?php get_template_part( 'template-parts/woocommerce/single/review', 'list' ); ?>
	</div>
	<div id="reviews" class="woocommerce-reviews">
		<?php get_template_part( 'template-parts/woocommerce/single/review', 'form' ); ?>
	</div>
</div>

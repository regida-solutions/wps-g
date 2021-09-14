<?php
/**
 * Template part for theme woocommerce header utility cart link.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

$cart_icon = '<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="wps-prime-icon svg-inline--fa fa-shopping-cart fa-w-18"><path fill="currentColor" d="M551.991 64H144.28l-8.726-44.608C133.35 8.128 123.478 0 112 0H12C5.373 0 0 5.373 0 12v24c0 6.627 5.373 12 12 12h80.24l69.594 355.701C150.796 415.201 144 430.802 144 448c0 35.346 28.654 64 64 64s64-28.654 64-64a63.681 63.681 0 0 0-8.583-32h145.167a63.681 63.681 0 0 0-8.583 32c0 35.346 28.654 64 64 64 35.346 0 64-28.654 64-64 0-18.136-7.556-34.496-19.676-46.142l1.035-4.757c3.254-14.96-8.142-29.101-23.452-29.101H203.76l-9.39-48h312.405c11.29 0 21.054-7.869 23.452-18.902l45.216-208C578.695 78.139 567.299 64 551.991 64zM208 472c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm256 0c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm23.438-200H184.98l-31.31-160h368.548l-34.78 160z"></path></svg>';

/**
	* Hide product count
	* translators: % d: number of items in cart
	* $cart_content = wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'wps-prime' ), WC()->cart->get_cart_contents_count() ) );
	*
	* Hide subtotal
	* wp_kses_post( WC()->cart->get_cart_subtotal() );
	*/
?>
<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php echo esc_attr( 'My shopping cart' ); ?>">
	<div class="woo-head-utility">
		<span class="woo-head-utility__symbol"><?php echo wp_kses( $cart_icon, \WpsPrime\Helpers\svg_allowed_tags() ); ?></span>
		<span class="woo-head-utility__cart-count count"><?php echo wp_kses_data( WC()->cart->get_cart_contents_count() ); ?></span>
	</div>
</a>

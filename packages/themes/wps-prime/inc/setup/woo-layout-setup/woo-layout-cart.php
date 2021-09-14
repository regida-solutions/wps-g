<?php
/**
 * Woocommerce cart layout setup.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Woo\Layout\Cart;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

add_action( 'woocommerce_before_cart', __NAMESPACE__ . '\\wrapper_start', 10 );
add_action( 'woocommerce_before_cart_collaterals', __NAMESPACE__ . '\\wrapper_end', 99 );

// Relocate totals to the right of product list.
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 );
add_action( 'woocommerce_before_cart_collaterals', 'woocommerce_cart_totals', 10 );


/**
 * Cart html wrap start
 */
function wrapper_start() {
	?>
	<div class="woocommerce-cart-top-layout">
	<?php
}

/**
 * Cart html wrap end
 */
function wrapper_end() {
	?>
	</div>
	<?php
}


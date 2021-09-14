<?php
/**
 * Woocommerce header utility layout.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Woo\Layout\HeaderUtility;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

add_action( 'theme_header_right', __NAMESPACE__ . '\\header_cart', 20, 2 );

if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '2.3', '>=' ) ) {
		add_filter( 'woocommerce_add_to_cart_fragments', __NAMESPACE__ . '\\cart_link_fragment' );
} else {
	add_filter( 'add_to_cart_fragments', __NAMESPACE__ . '\\cart_link_fragment' );
}

/**
 * The header cart link
 *
 * @param array $fragments Cart fragments.
 * @return array
 */
function cart_link_fragment( array $fragments ):array {
	global $woocommerce;

	ob_start();
	get_template_part( 'template-parts/woocommerce/header', 'cart-link' );
	$fragments['a.cart-contents'] = ob_get_clean();

	/**
		* Utility bar at the bottom of the screen
		* ob_start();
		* handheld_footer_bar_cart_link();
		* $fragments['a.footer-cart-contents'] = ob_get_clean();
		*/

	return $fragments;
}

/**
 * The header cart
 */
function header_cart() {
	get_template_part( 'template-parts/woocommerce/header', 'cart' );
}

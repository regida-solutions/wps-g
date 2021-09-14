<?php
/**
 * Woocommerce checkout layout setup.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Woo\Layout\Checkout;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

add_action( 'woocommerce_before_checkout_billing_form', __NAMESPACE__ . '\\wrapper_start' );
add_action( 'woocommerce_after_checkout_billing_form', __NAMESPACE__ . '\\wrapper_end' );

// Checkout forms layout.
add_action( 'woocommerce_checkout_before_customer_details', __NAMESPACE__ . '\\wrapper_layout_left_start' );
add_action( 'woocommerce_checkout_before_order_review_heading', __NAMESPACE__ . '\\wrapper_layout_right_start' );

add_action( 'woocommerce_checkout_after_customer_details', __NAMESPACE__ . '\\wrapper_end' );
add_action( 'woocommerce_checkout_after_order_review', __NAMESPACE__ . '\\wrapper_end' );


/**
 * Wrapper start
 */
function wrapper_start() {
	?>
		<div class="wps-woo-form-wrapper">
	<?php
}

/**
 * Layout wrapper start
 */
function wrapper_layout_start() {
	?>
		<div class="woocommerce-checkout-layout">
	<?php
}

/**
 * Layout left wrapper start
 */
function wrapper_layout_left_start() {
	?>
		<div class="woocommerce-checkout-layout__left">
	<?php
}

/**
 * Layout right wrapper start
 */
function wrapper_layout_right_start() {
	?>
	<div class="woocommerce-checkout-layout__right">
		<?php
}

/**
 * Wrapper end
 */
function wrapper_end() {
	?>
</div>
	<?php
}

	/**
	 * Remove billing details and additional notes section
	 * Not used
	 */
function remove_billing_info_and_additional_notes_wc() {
	if ( ! ( is_admin() ) ) {

		// Run this code only in frontend.
		global $woocommerce;
		if ( is_object( $woocommerce ) ) {

			// WooCommerce Plugin activated.
			if ( function_exists( 'WC' ) ) {

				$wc_checkout_instance = WC()->checkout();

				/**
				* Remove hooks.
				* remove_action( 'woocommerce_checkout_billing', array( $wc_checkout_instance, 'checkout_form_billing' ) );
				*/
				remove_action( 'woocommerce_checkout_shipping', [ $wc_checkout_instance, 'checkout_form_shipping' ] );
				add_action( 'woocommerce_checkout_billing', [ $wc_checkout_instance, 'checkout_form_shipping' ] );
			}
		}
	}
}

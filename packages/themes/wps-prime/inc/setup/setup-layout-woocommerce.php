<?php
/**
 * Woocommerce setup.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Setup\Woocommerce;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

if ( ! \WpsPrime\Helpers\Woocommerce\is_woocommerce_activated() ) {
	return;
}

/**
* Disable Woo styles.
* add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
	*/

// Remove woocommerce Select2.
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\dequeue_select2', 100 );


	/**
	 * Remove Woocommerce Select2 - Woocommerce 3.2.1+
	 */
function dequeue_select2() {
		wp_dequeue_style( 'select2' );
		wp_deregister_style( 'select2' );
}

// Setup woo.
	require_once __DIR__ . '/woo-layout-setup/woo-layout-single.php';
	require_once __DIR__ . '/woo-layout-setup/woo-layout-my-account.php';
	require_once __DIR__ . '/woo-layout-setup/woo-layout-cart.php';
	require_once __DIR__ . '/woo-layout-setup/woo-layout-checkout.php';
	require_once __DIR__ . '/woo-layout-setup/woo-layout-general.php';
	require_once __DIR__ . '/woo-layout-setup/woo-layout-header-utility.php';
	require_once __DIR__ . '/woo-layout-setup/woo-layout-category.php';



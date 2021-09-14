<?php
/**
 * Woocommerce my account layout setup.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Woo\Layout\MyAccount;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

add_action( 'woocommerce_account_navigation', __NAMESPACE__ . '\\wrapper_start', 1 );
add_action( 'woocommerce_account_dashboard', __NAMESPACE__ . '\\wrapper_end', 99 );


/**
 * Account html wrap start
 */
function wrapper_start() {
	?>
		<div class="wps-woo-my-account-wrapper">
	<?php
}

/**
 * Account html wrap end
 */
function wrapper_end() {
	?>
	</div>
	<?php
}



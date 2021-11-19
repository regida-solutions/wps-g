<?php
/**
 * Custom shop utility wrapper
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}
?>
<div class="woocommerce-product-utility-wrapper"><?php do_action( 'wps_woo_product_loop_utility' ); ?></div>

<?php
/**
 * Woocommerce checkout layout general.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Woo\Layout\General;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

add_action( 'woocommerce_before_main_content', __NAMESPACE__ . '\\woocommerce_general_setup', 10, 2 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper' );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end' );

add_action( 'woocommerce_before_main_content', __NAMESPACE__ . '\\wrapper_start' );
add_action( 'woocommerce_after_main_content', __NAMESPACE__ . '\\wrapper_end' );

// Remove Woocommerce Result Count.
add_action( 'after_setup_theme', __NAMESPACE__ . '\\remove_product_result_count', 99 );
add_action( 'woocommerce_before_shop_loop', __NAMESPACE__ . '\\shop_product_utility_wrapper' );
add_action( 'wps_woo_product_loop_utility', 'woocommerce_catalog_ordering', 30 );
add_action( 'wps_woo_product_loop_utility', 'woocommerce_result_count', 20 );
/**
* Single
*/
// .woocommerce-single-product-top-layout.
add_action( 'woocommerce_before_single_product_summary', __NAMESPACE__ . '\\single_layout_top_wrap' );
add_action( 'woocommerce_after_single_product_summary', __NAMESPACE__ . '\\single_wrapper_end' );

// .woocommerce-single-product-add-to-cart-layout.
add_action( 'woocommerce_before_add_to_cart_button', __NAMESPACE__ . '\\single_add_to_cart_start' );
add_action( 'woocommerce_after_add_to_cart_button', __NAMESPACE__ . '\\single_wrapper_end' );

// .woocommerce-single-product-bottom-layout.
add_action( 'woocommerce_after_single_product_summary', __NAMESPACE__ . '\\single_layout_bottom_wrap' );
add_action( 'woocommerce_after_single_product', __NAMESPACE__ . '\\single_wrapper_end' );

/**
 * Adjust layout based on customizer options
 */
function woocommerce_general_setup() {

		$hide_breadcrumb = get_theme_mod( 'wps_woo_hide_breadcrumb', false );
		$hide_rating     = get_theme_mod( 'wps_woo_shop_hide_rating', false );

		// Remove Breadcrumbs.
	if ( $hide_breadcrumb ) {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
	}

		// Remove the product rating display on product loops.
	if ( $hide_rating ) {
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	}
}

/**
 * Wrapper start
 */
function wrapper_start() {
	?>
<div id="primary" class="content-area">
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
 * Single wrapper end
 */
function single_wrapper_end() {
	?>
</div>
	<?php
}

	/**
	 * Single top wrap
	 */
function single_layout_top_wrap() {
	?>
	<div class="woocommerce-single-product-top-layout">
		<?php
}

/**
 * Single product add to cart wrap
 */
function single_add_to_cart_start() {
	?>
<div class="woocommerce-single-product-add-to-cart-layout">
	<?php
}

/**
 * Single product bottom wrap
 */
function single_layout_bottom_wrap() {
	?>
<div class="woocommerce-single-product-bottom-layout">
	<?php
}

/**
 * Product loop remove count
 */
function remove_product_result_count() {
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 20 );
}
/**
 * Product loop utility
 */
function shop_product_utility_wrapper() {
	get_template_part( 'template-parts/woocommerce/product-utility' );
}


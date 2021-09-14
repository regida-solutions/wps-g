<?php
/**
 * Woocommerce category layout setup.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Woo\Layout\Category;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

if ( \WpsPrime\Helpers\Woocommerce\is_woocommerce_activated() ) {
	add_action( 'woocommerce_before_main_content', __NAMESPACE__ . '\\setup_description', 10, 2 );
}

/**
 * Setup description location
 *
 * @return void
 */
function setup_description() {
	$bottom = get_theme_mod( 'wps_woocommerce_shop_page_cat_descr_position', false );
	$hide   = get_theme_mod( 'wps_woocommerce_shop_page_cat_descr_hide', false );

	// Change woo description to custom description.
	remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description' );
	add_action( 'woocommerce_archive_description', __NAMESPACE__ . '\\custom_woocommerce_taxonomy_archive_description' );

	// Add description to bottom.
	if ( $bottom && ! $hide ) {
		remove_action( 'woocommerce_archive_description', __NAMESPACE__ . '\\custom_woocommerce_taxonomy_archive_description' );
		add_action( 'woocommerce_after_shop_loop', __NAMESPACE__ . '\\custom_woocommerce_taxonomy_archive_description' );
	}

	// Hide description.
	if ( $hide ) {
		remove_action( 'woocommerce_archive_description', __NAMESPACE__ . '\\custom_woocommerce_taxonomy_archive_description' );
	}
}

/**
 * Overwrite woo description.
 */
function custom_woocommerce_taxonomy_archive_description() {
	if ( is_product_taxonomy() && 0 === absint( get_query_var( 'paged' ) ) ) {
		get_template_part( 'template-parts/woocommerce/category', 'description' );
	}
}

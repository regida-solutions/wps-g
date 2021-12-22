<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

$woo_is_active      = \WpsPrime\Helpers\Woocommerce\is_woocommerce_activated();
$single_has_sidebar = get_theme_mod( 'wps_article_has_sidebar', false );
$has_woo_sidebar    = get_theme_mod( 'wps_woo_shop_has_sidebar', false );
$blog_sidebar       = get_theme_mod( 'wps_blog_has_sidebar', false );
$is_woocommerce     = function_exists( 'is_woocommerce' ) ? is_woocommerce() : false;


if ( is_active_sidebar( 'sidebar-1' ) && ! $is_woocommerce ) {
	if ( $single_has_sidebar && is_singular() ) {
		?>
		<aside id="secondary" <?php wps_main_sidebar_class(); ?> role="complementary">
			<?php do_action( 'wps_sidebar_start' ); ?>
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
			<?php do_action( 'wps_sidebar_end' ); ?>
		</aside><!-- #secondary -->
		<?php
	}

	if ( $blog_sidebar && ! is_singular() && ! $is_woocommerce ) {
		?>
		<aside id="secondary" <?php wps_main_sidebar_class(); ?> role="complementary">
			<?php do_action( 'wps_sidebar_start' ); ?>
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
			<?php do_action( 'wps_sidebar_end' ); ?>
		</aside><!-- #secondary -->
		<?php
	}
}

if ( $woo_is_active ) {
	if ( is_product() || is_cart() || is_checkout() || is_account_page() ) {
		return;
	}

	if ( ( is_shop() || is_product_category() || is_product_tag() ) && $has_woo_sidebar ) {

		if ( is_active_sidebar( 'sidebar-shop' ) ) {
			?>
		<aside id="secondary" <?php wps_main_sidebar_class(); ?> role="complementary">
			<?php do_action( 'wps_sidebar_start' ); ?>
			<?php dynamic_sidebar( 'sidebar-shop' ); ?>
			<?php do_action( 'wps_sidebar_end' ); ?>
		</aside><!-- #secondary -->
			<?php
		}
	}
}

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

$woo_is_active = \WpsPrime\Helpers\Woocommerce\is_woocommerce_activated();
$has_sidebar   = get_option( 'wps_article_has_sidebar', false );


if ( ! $woo_is_active && is_active_sidebar( 'sidebar-1' ) && $has_sidebar && is_singular() ) {
	?>
		<aside id="secondary" <?php wps_main_sidebar_class(); ?> role="complementary">
			<?php do_action( 'wps_sidebar_start' ); ?>
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
			<?php do_action( 'wps_sidebar_end' ); ?>
		</aside><!-- #secondary -->
		<?php
}


if ( $woo_is_active ) {
	if ( is_product() || is_cart() || is_checkout() || is_account_page() ) {
		return;
	}

	if ( is_shop() || is_product_category() || is_product_tag() ) {

		if ( is_active_sidebar( 'wps_sidebar-shop' ) ) {
			?>
		<aside id="secondary" <?php wps_main_sidebar_class(); ?> role="complementary">
			<?php do_action( 'wps_sidebar_start' ); ?>
			<?php dynamic_sidebar( 'sidebar-shop' ); ?>
			<?php do_action( 'wps_sidebar_end' ); ?>
		</aside><!-- #secondary -->
			<?php
		}
	} else {

		if ( is_active_sidebar( 'sidebar-1' ) && $has_sidebar ) {
			?>
		<aside id="secondary" <?php wps_main_sidebar_class(); ?> role="complementary">
				<?php do_action( 'wps_sidebar_start' ); ?>
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
				<?php do_action( 'wps_sidebar_end' ); ?>
		</aside><!-- #secondary -->
			<?php
		}
	}
}

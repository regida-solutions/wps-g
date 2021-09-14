<?php
/**
 * Footer Sidebars.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

if ( ! ( is_active_sidebar( 'sidebar-footer-1' ) || is_active_sidebar( 'sidebar-footer-2' ) || is_active_sidebar( 'sidebar-footer-3' ) || is_active_sidebar( 'sidebar-footer-4' ) ) ) {
	return;
}
?>
<div class="widget-area-container">
		<div class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-footer-1' ); ?>
		</div>
		<div class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-footer-2' ); ?>
		</div>
		<div class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-footer-3' ); ?>
		</div>
		<div class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-footer-4' ); ?>
		</div>
</div>

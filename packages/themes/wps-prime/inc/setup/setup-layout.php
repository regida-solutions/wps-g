<?php
/**
 * The header components setup
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Setup\Layout;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}
// Setup Main menu location.
$menu_type     = get_theme_mod( 'main_menu_position', 'in_header' );
$menu_location = 'under_header' === $menu_type ? 'wps_after_header' : 'wps_theme_header_right';

/**
	* Hook up components in theme
	*/
add_action( 'wps_theme_header', __NAMESPACE__ . '\\header_layout' );
add_action( 'wps_theme_header_left', __NAMESPACE__ . '\\theme_site_logo' );
add_action( $menu_location, __NAMESPACE__ . '\\main_menu' );
add_action( 'wps_theme_header_right', __NAMESPACE__ . '\\header_free_content' );
add_action( 'wps_theme_header_right', __NAMESPACE__ . '\\header_contact' );
add_action( 'wps_theme_header_right', __NAMESPACE__ . '\\main_menu_toggle', 99 );
add_action( 'wps_after_header', __NAMESPACE__ . '\\side_menu' );
add_action( 'wps_entry_header', __NAMESPACE__ . '\\entry_content_title' );
add_action( 'wp_footer', __NAMESPACE__ . '\\side_menu_mask' );
add_action( 'wps_menu_main_side_end', __NAMESPACE__ . '\\side_menu_meta_data' );
add_action( 'wps_footer_content', __NAMESPACE__ . '\\footer_layout' );

/**
	* Add Global Content Object
	*/
add_action( 'wps_before_header', __NAMESPACE__ . '\\global_content_start_area' );
add_action( 'wps_before_content', __NAMESPACE__ . '\\global_before_content_area' );
add_action( 'wps_before_footer', __NAMESPACE__ . '\\global_content_end_area' );


/**
	* Add CSS classes to key areas
	*/
add_filter( 'body_class', __NAMESPACE__ . '\\body_class' );
add_filter( 'wps_header_class', __NAMESPACE__ . '\\main_header_class' );
add_filter( 'wps_header_left_class', __NAMESPACE__ . '\\main_header_left_class' );
add_filter( 'wps_header_right_class', __NAMESPACE__ . '\\main_header_right_class' );
add_filter( 'wps_nav_class', __NAMESPACE__ . '\\main_nav_class' );
add_filter( 'wps_mobile_nav_class', __NAMESPACE__ . '\\main_mobile_nav_class' );
add_filter( 'wps_main_content_class', __NAMESPACE__ . '\\main_content_class' );
add_filter( 'wps_main_sidebar_class', __NAMESPACE__ . '\\main_sidebar_class' );
add_filter( 'wps_entry_content_class', __NAMESPACE__ . '\\entry_content_class' );
add_filter( 'wps_footer_class', __NAMESPACE__ . '\\footer_class' );

/**
 * Hook up main header layout.
 */
function header_layout() {
	get_template_part( 'template-parts/header/header-layout' );
}

/**
 * Add the main logo to header.
 */
function theme_site_logo() {
	get_template_part( 'template-parts/header/header-site-logo' );
}

/**
 * Add the main menu toggle icon.
 */
function main_menu_toggle() {
	$hide_menu = is_page() && 'true' === get_post_meta( get_the_id(), '_hide_main_menu', true );
	if ( ! $hide_menu ) {
		get_template_part( 'template-parts/header/menu/menu-main-toggle' );
	}
}

/**
 * Add the main menu.
 */
function main_menu() {
	$hide_menu = is_page() && 'true' === get_post_meta( get_the_id(), '_hide_main_menu', true );
	if ( ! $hide_menu ) {
		get_template_part( 'template-parts/header/menu/menu-main-mega' );
	}
}

/**
 * Add the side menu.
 */
function side_menu() {
	$hide_menu = is_page() && 'true' === get_post_meta( get_the_id(), '_hide_main_menu', true );
	if ( ! $hide_menu ) {
		get_template_part( 'template-parts/header/menu/menu-main-side' );
	}
}

/**
 * Add the main menu.
 */
function header_contact() {
		get_template_part( 'template-parts/header/header-contact' );
}

/**
 * Add utility header free content area.
 */
function header_free_content() {
	get_template_part( 'template-parts/header/header-utility-content' );
}

/**
 * Add extra utility parts to header.
 */
function side_menu_meta_data() {
	get_template_part( 'template-parts/components/component-social-list' );
	get_template_part( 'template-parts/components/component-contact-data' );
	get_template_part( 'template-parts/components/component-wpml-switcher' );
}

/**
 * Add article entry header title
 */
function entry_content_title() {
	if ( 'page' === get_post_type() && ! get_post_meta( get_the_ID(), '_wps_has_visible_title', true ) ) {
		return;
	}
		get_template_part( 'template-parts/entry/entry-title' );
}

/**
 * Add footer layout.
 */
function footer_layout() {
	get_template_part( 'template-parts/footer/colophon' );
	get_template_part( 'template-parts/footer/footer-micro-copy' );
}

/**
 * Add side menu mask to footer.
 */
function side_menu_mask() {
	get_template_part( 'template-parts/header/menu/menu-main-side-mask' );
}

/**
 * Add global content start area
 */
function global_content_start_area() {
	get_template_part( 'template-parts/global-content/global-content-start' );
}

/**
 * Add global content after header area
 */
function global_before_content_area() {
	get_template_part( 'template-parts/global-content/global-content-before-content' );
}

/**
 * Add global content end area
 */
function global_content_end_area() {
	get_template_part( 'template-parts/global-content/global-content-end' );
}

/**
 * Setup custom css classes
 */

/**
 * Add classes to body
 *
 * @param array $classes List of custom css classes.
 * @return array
 */
function body_class( array $classes ):array {

	$woo_is_active = \WpsPrime\Helpers\Woocommerce\is_woocommerce_activated();

	$post_id = get_the_ID();

	$header_bg_color        = get_theme_mod( 'wps_header_background', '#ffffff' );
	$header_use_sticky      = get_theme_mod( 'header_use_sticky', false );
	$header_sticky_bg_color = get_theme_mod( 'wps_header_background_sticky', '#000000' );
	$blog_has_sidebar       = get_theme_mod( 'wps_blog_has_sidebar', false );
	$single_has_sidebar     = get_theme_mod( 'wps_article_has_sidebar', false );
	$swap_sidebar           = get_theme_mod( 'wps_blog_swap_sidebar_position', false );
	$bg_color               = \WpsPrime\Helpers\contrast_color( $header_bg_color );
	$sticky_bg_color        = \WpsPrime\Helpers\contrast_color( $header_sticky_bg_color );

	$has_woo_sidebar  = get_theme_mod( 'wps_woo_shop_has_sidebar', false );
	$woo_swap_sidebar = get_theme_mod( 'wps_woo_shop_swap_sidebar_position', false );

	$excluded_woocommerce = false;
	if ( $woo_is_active ) {
		$excluded_woocommerce = is_product() || is_cart() || is_checkout() || is_account_page();
	}

	if ( is_page() || is_404() ) {
		$page_id = get_option( 'wps_404_custom_page' );
		$pid     = $post_id ? $post_id : $page_id;

		$title_vis = get_post_meta( $pid, '_wps_prime_hide_title', true );
		$get_mt    = get_post_meta( $pid, '_wps_reset_page_top_space', true );
		$get_mb    = get_post_meta( $pid, '_wps_reset_page_bottom_space', true );

		if ( $get_mt && ! $get_mb ) {
			$classes[] = 'content-reset-space-top';
		}

		if ( $get_mb && ! $get_mt ) {
			$classes[] = 'content-reset-space-bottom';
		}

		if ( $get_mt && $get_mb ) {
			$classes[] = 'content-reset-space-vertical';
		}
		if ( $title_vis ) {
			$classes[] = 'hide-page-title';
		}
	}

	// Check header bg color.
	if ( 'light' === $bg_color ) {
		$classes[] = 'has-header-light';
	} elseif ( 'dark' === $bg_color ) {
		$classes[] = 'has-header-dark';
	}

	// Check sticky header bg color.
	if ( $header_use_sticky ) {
		if ( 'light' === $sticky_bg_color ) {
			$classes[] = 'has-sticky-header-light';
		} elseif ( 'dark' === $sticky_bg_color ) {
			$classes[] = 'has-sticky-header-dark';
		}
	}

	// Single articles have sidebar.
	if ( $single_has_sidebar && is_single() ) {
		$classes[] = 'has-sidebar';

		if ( $swap_sidebar ) {
			$classes[] = 'has-sidebar-inverted';
		}
	}

	if ( $blog_has_sidebar && ! is_single() && ! is_404() && $excluded_woocommerce ) {
		$classes[] = 'has-sidebar';

		if ( $swap_sidebar ) {
			$classes[] = 'has-sidebar-inverted';
		}
	}

	if ( $has_woo_sidebar && ! $excluded_woocommerce ) {
		$classes[] = 'has-sidebar';

		if ( $woo_swap_sidebar ) {
			$classes[] = 'has-sidebar-inverted';
		}
	}
	return $classes;
}

/**
 * CSS for header
 *
 * @param array $classes Add classes to markup.
 * @return array
 */
function main_header_class( array $classes ):array {
	$classes[] = 'site-header';
	return $classes;
}

/**
 * CSS for header left side
 *
 * @param array $classes Add classes to markup.
 * @return array
 */
function main_header_left_class( array $classes ):array {
	$classes[] = 'site-header__left';
	return $classes;
}

/**
 * CSS for header right side
 *
 * @param array $classes Add classes to markup.
 * @return array
 */
function main_header_right_class( array $classes ):array {
	$classes[] = 'site-header__right';
	return $classes;
}

/**
 * CSS for the main menu
 *
 * @param array $classes Add classes to markup.
 * @return array
 */
function main_nav_class( array $classes ):array {
	$classes[] = 'site-nav';
	return $classes;
}

/**
 * CSS for the main side nav
 *
 * @param array $classes Add classes to markup.
 * @return array
 */
function main_mobile_nav_class( array $classes ):array {
	$classes[] = 'site-nav-mobile c-slide-nav c-slide-nav--slide-right';
	return $classes;
}

/**
 * CSS for main content
 *
 * @param array $classes Add classes to markup.
 * @return array
 */
function main_content_class( array $classes ):array {
	$classes[] = 'site-content';
	return $classes;
}

/**
 * CSS for main sidebar
 *
 * @param array $classes Add classes to markup.
 * @return array
 */
function main_sidebar_class( array $classes ):array {
	$classes[] = 'main-sidebar';
	$classes[] = 'widget-area';
	return $classes;
}

/**
 * CSS for main content area
 *
 * @param array $classes Add classes to markup.
 * @return array
 */
function entry_content_class( array $classes ):array {
	$classes[] = 'content-area';
	return $classes;
}

/**
 * CSS for footer
 *
 * @param array $classes Add classes to markup.
 * @return array
 */
function footer_class( array $classes ):array {
	$classes[] = 'site-footer';
	return $classes;
}


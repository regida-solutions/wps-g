<?php
/**
 * WPS Prime Menus
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Menus;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

add_action( 'after_setup_theme', __NAMESPACE__ . '\\setup_menus' );

/**
 * Register theme menus
 */
function setup_menus():void {

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		[
			'primary'        => __( 'Primary Menu', 'wps-prime' ),
			'primary_mobile' => __( 'Primary Mobile Menu (set a different menu for mobile | default: Primary menu)', 'wps-prime' ),
		]
	);
}

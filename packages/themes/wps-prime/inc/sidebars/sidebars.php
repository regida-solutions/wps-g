<?php
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Customizer\Header;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

add_action( 'widgets_init', __NAMESPACE__ . '\\register_theme_widgets' );

/**
 * Register theme sidebars
 */
function register_theme_widgets() {

	register_sidebar(
		[
			'name'          => __( 'Sidebar', 'wps-prime' ),
			'id'            => 'sidebar-1',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		]
	);

	register_sidebar(
		[
			'name'          => __( 'Footer widget area one', 'wps-prime' ),
			'id'            => 'sidebar-footer-1',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		]
	);

	register_sidebar(
		[
			'name'          => __( 'Footer widget area two', 'wps-prime' ),
			'id'            => 'sidebar-footer-2',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		]
	);

	register_sidebar(
		[
			'name'          => __( 'Footer widget area three', 'wps-prime' ),
			'id'            => 'sidebar-footer-3',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		]
	);

	register_sidebar(
		[
			'name'          => __( 'Footer widget area four', 'wps-prime' ),
			'id'            => 'sidebar-footer-4',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		]
	);

	if ( \WpsPrime\Helpers\Woocommerce\is_woocommerce_activated() ) {
		register_sidebar(
			[
				'name'          => __( 'Sidebar Shop', 'wps-prime' ),
				'id'            => 'sidebar-shop',
				'description'   => '',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			]
		);
	}
}

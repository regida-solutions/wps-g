<?php
/**
 * WPS Prime Gutenberg functions and definitions.
 *
 * @see https://developer.wordpress.org/themes/basics/theme-functions/
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}



/**
 * Css class function
 * Separates classes with a single space, collates classes for element
 *
 * @param array $class CSS Classes for element.
 * @return void
 */
function wps_header_class( array $class = [] ):void {
	echo \WpsPrime\Helpers\process_class_filters( $class, 'wps_header_class' );
}

/**
 * Css class function for header left area
 * Separates classes with a single space, collates classes for element
 *
 * @param array $class CSS Classes for element.
 * @return void
 */
function wps_header_left_class( array $class = [] ):void {
	echo \WpsPrime\Helpers\process_class_filters( $class, 'wps_header_left_class' );
}

/**
 * Css class function for header right area
 * Separates classes with a single space, collates classes for element
 *
 * @param array $class CSS Classes for element.
 * @return void
 */
function wps_header_right_class( array $class = [] ):void {
	echo \WpsPrime\Helpers\process_class_filters( $class, 'wps_header_right_class' );
}

/**
 * Css class function for Main Site content class
 * Separates classes with a single space, collates classes for element
 *
 * @param array $class CSS Classes for element.
 * @return void
 */
function wps_main_content_class( array $class = [] ):void {
	echo \WpsPrime\Helpers\process_class_filters( $class, 'wps_main_content_class' );
}

/**
 * Css class function for Main Site content layout
 * Separates classes with a single space, collates classes for element
 *
 * @param array $class CSS Classes for element.
 * @return void
 */
function wps_entry_content_class( array $class = [] ):void {
	echo \WpsPrime\Helpers\process_class_filters( $class, 'wps_entry_content_class' );
}

/**
 * Css class function for Main Site sidebar layout
 * Separates classes with a single space, collates classes for element
 *
 * @param array $class CSS Classes for element.
 * @return void
 */
function wps_main_sidebar_class( array $class = [] ):void {
	echo \WpsPrime\Helpers\process_class_filters( $class, 'wps_main_sidebar_class' );
}

/**
 * Css class function for Main Site footer class
 * Separates classes with a single space, collates classes for element
 *
 * @param array $class CSS Classes for element.
 * @return void
 */
function wps_footer_class( array $class = [] ):void {
	echo \WpsPrime\Helpers\process_class_filters( $class, 'wps_footer_class' );
}

/**
 * Theme main navigation css class function
 * Separates classes with a single space, collates classes for element
 *
 * @param array|string $class CSS Classes for element.
 * @return void
 */
function wps_nav_class( array $class = [] ):void {
	echo \WpsPrime\Helpers\process_class_filters( $class, 'wps_nav_class' );
}

/**
 * Css class function for Main Site mobile navigation class
 * Separates classes with a single space, collates classes for element
 *
 * @param array $class CSS Classes for element.
 * @return void
 */
function wps_mobile_nav_class( array $class = [] ):void {
	echo \WpsPrime\Helpers\process_class_filters( $class, 'wps_mobile_nav_class' );
}


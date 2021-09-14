<?php
/**
 * The main theme customizer.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Customizer;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

/**
 * Load all the customizer options
 */
function load_customizer_sections() {
	$sections = [
		'branding',
		'colors-header',
		'colors',
		'tweaks',
		'footer',
		'header',
		'content',
		'typography',
		'wpml',
		'woo-category',
		'woo-shop',
		'woo-single',
		'woo-colors-messages',
		'woo-colors-checkout',
		'woo-colors-header-utility',
		'woo-colors-shop',
	];

	foreach ( $sections as $section ) {
		include_once __DIR__ . './customizer-' . $section . '.php';
	}
}

load_customizer_sections();

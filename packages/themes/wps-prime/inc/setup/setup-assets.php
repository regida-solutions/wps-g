<?php
/**
 * Functions to register assets.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );
namespace WpsPrime\Setup\Assets;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\front_end_assets' );
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\\editor_assets' );

/**
 * Get uri to asset file
 *
 * @param  string $file Filename.
 * @return string
 */
function get_file_uri( string $file ): string {
	return get_template_directory_uri() . '/build/' . $file;
}

/**
 * Get file path
 *
 * @param  string $file Filename.
 * @return string
 */
function get_file_path( string $file ): string {
	return get_template_directory() . '/build/' . $file;
}

/**
 * Enqueue scripts and styles for the client.
 */
function front_end_assets() {

	// SWIPER Slider Core.
	wp_register_script( 'wps-slider-core', 'https://unpkg.com/swiper@7/swiper-bundle.min.js', [ 'wps-prime' ], WPS_PRIME_THEME_VERSION, true );
	wp_register_style( 'wps-slider-core', 'https://unpkg.com/swiper@7/swiper-bundle.min.css', [], WPS_PRIME_THEME_VERSION );

	// Fancybox.
	wp_register_script( 'wps-fancybox-core', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js', [ 'wps-prime' ], WPS_PRIME_THEME_VERSION, true );
	wp_register_style( 'wps-fancybox-core', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css', [], WPS_PRIME_THEME_VERSION );

	if ( has_block( 'gallery' ) ) {
		wp_enqueue_style( 'wps-fancybox-core' );
		wp_enqueue_script( 'wps-fancybox-core' );
	}

	// Fonts.
	$fonts_path = get_template_directory() . '/assets/fonts/fonts.css';
	if ( file_exists( $fonts_path ) ) {
		wp_enqueue_style(
			'wps-prime-fonts',
			get_template_directory_uri() . '/assets/fonts/fonts.css',
			[],
			filemtime( $fonts_path )
		);
	}

	// Stylesheets.
	$style_path = get_file_path( 'style.css' );
	if ( file_exists( $style_path ) ) {
		wp_enqueue_style(
			'wps-prime',
			get_file_uri( 'style.css' ),
			[],
			filemtime( $style_path )
		);
	}

	// Stylesheets Woocommerce.
	if ( \WpsPrime\Helpers\Woocommerce\is_woocommerce_activated() ) {
		$style_path = get_file_path( 'woocommerce.css' );
		if ( file_exists( $style_path ) ) {
			wp_enqueue_style(
				'wps-prime-woocommerce',
				get_file_uri( 'woocommerce.css' ),
				[],
				filemtime( $style_path )
			);
		}
	}

	// Javascript Woocommerce.
	if ( \WpsPrime\Helpers\Woocommerce\is_woocommerce_activated() ) {
		$woocommerce_js_path = get_file_path( 'woocommerce.js' );
		if ( file_exists( $woocommerce_js_path ) ) {
			$script_deps_path    = get_file_path( 'woocommerce.asset.php' );
			$script_dependencies = file_exists( $script_deps_path ) ?
				require $script_deps_path :
				[
					'dependencies' => [],
					'version'      => filemtime( $woocommerce_js_path ),
				];

			// Add custom dependencies.
			$custom_dependencies                 = [];
			$script_dependencies['dependencies'] = array_merge( $script_dependencies['dependencies'], $custom_dependencies );

			wp_enqueue_script(
				'wps-prime-woocommerce',
				get_file_uri( 'woocommerce.js' ),
				$script_dependencies['dependencies'],
				$script_dependencies['version'],
				true
			);
		}
	}

	// JavaScripts.
	$site_js_path = get_file_path( 'site.js' );
	if ( file_exists( $site_js_path ) ) {
		$script_deps_path    = get_file_path( 'site.asset.php' );
		$script_dependencies = file_exists( $script_deps_path ) ?
			require $script_deps_path :
			[
				'dependencies' => [],
				'version'      => filemtime( $site_js_path ),
			];

		// Add custom dependencies.
		$custom_dependencies                 = [ 'jquery' ];
		$script_dependencies['dependencies'] = array_merge( $script_dependencies['dependencies'], $custom_dependencies );

		wp_register_script(
			'wps-prime',
			get_file_uri( 'site.js' ),
			$script_dependencies['dependencies'],
			$script_dependencies['version'],
		true);

		// Get site options.
		wp_localize_script(
			'wps-prime',
			'wpsThemeSettings',
			apply_filters( 'wps_site_setting_js', [] )
		);
		wp_enqueue_script( 'wps-prime' );
	}
}

/**
 * Enqueue editor style for the WordPress editor.
 */
function editor_assets() {

	// Fonts.
	$fonts_path = get_template_directory() . '/assets/fonts/fonts.css';
	if ( file_exists( $fonts_path ) ) {
		wp_enqueue_style(
			'wps-prime-editor-fonts',
			get_template_directory_uri() . '/assets/fonts/fonts.css',
			[],
			filemtime( $fonts_path )
		);
	}

	// Stylesheets.
	$style_path = get_file_path( 'editor.css' );
	if ( file_exists( $style_path ) ) {
		wp_enqueue_style(
			'wps-prime-editor',
			get_file_uri( 'editor.css' ),
			[],
			filemtime( $style_path )
		);
	}

	// JavaScripts.
	$editor_js_path = get_file_path( 'editor.js' );
	if ( file_exists( $editor_js_path ) ) {
		$script_deps_path    = get_file_path( 'editor.asset.php' );
		$script_dependencies = file_exists( $script_deps_path ) ?
			require $script_deps_path :
			[
				'dependencies' => [],
				'version'      => filemtime( $editor_js_path ),
			];

		wp_enqueue_script(
			'wps-prime-editor',
			get_file_uri( 'editor.js' ),
			$script_dependencies['dependencies'],
			$script_dependencies['version'],
			true
		);
	}
	// JavaScripts.
	if ( 'page' === get_post_type() ) {
		$editor_page_js_path = get_file_path( 'editor-page.js' );
		if ( file_exists( $editor_page_js_path ) ) {
			$script_deps_path    = get_file_path( 'editor.asset.php' );
			$script_dependencies = file_exists( $script_deps_path ) ?
			require $script_deps_path :
			[
				'dependencies' => [],
				'version'      => filemtime( $editor_page_js_path ),
			];

			wp_enqueue_script(
				'wps-prime-editor-page',
				get_file_uri( 'editor-page.js' ),
				$script_dependencies['dependencies'],
				$script_dependencies['version'],
				true
			);
		}
	}
}

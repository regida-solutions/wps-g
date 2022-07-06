<?php
/**
 * WPS Prime functions and definitions.
 *
 * @see https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

if ( ! function_exists( 'get_wps_prime_theme_version' ) ) {
	/**
	 * Get the current theme version. Used for asset loading.
	 *
	 * @return string Version number or random number
	 */
	function get_wps_prime_theme_version() : string {
		$theme_data = wp_get_theme( get_template() );
		$version    = $theme_data->get( 'Version' );

		return ( ! empty( $version ) ) ? $version : (string) wp_rand();
	}
}

// Setup constants.
define( 'WPS_PRIME_THEME_VERSION', get_wps_prime_theme_version() );
define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );
const WPS_PRIME_THEME_SLUG = 'wps-prime';
const WPS_PRIME_UPDATE_FOLDER = 'wps-prime';
const WPS_PRIME_UPDATE_URL = 'https://zsoltrevay.com/packages';

// Site helpers.
require __DIR__ . '/inc/helpers/helpers.php';

// Typography.
require __DIR__ . '/inc/typography/class-typography-register-fonts.php';
require __DIR__ . '/inc/typography/class-typography-get-fonts.php';
require __DIR__ . '/inc/typography/typography-run-fonts.php';

// Site setup.
require __DIR__ . '/inc/filters/filters-css-classes.php';
require __DIR__ . '/inc/setup/setup.php';
require __DIR__ . '/inc/setup/setup-updater.php';
require __DIR__ . '/inc/setup/setup-assets.php';
require __DIR__ . '/inc/setup/setup-editor.php';
require __DIR__ . '/inc/setup/setup-layout.php';
require __DIR__ . '/inc/setup/setup-excerpt.php';
require __DIR__ . '/inc/setup/setup-fonts.php';
require __DIR__ . '/inc/setup/setup-wp-fine-tune.php';
require __DIR__ . '/inc/setup/setup-layout-woocommerce.php';
require __DIR__ . '/inc/admin/admin-info-columns.php';
require __DIR__ . '/inc/admin/admin-page-margin-info-columns.php';
require __DIR__ . '/inc/setup/setup-enable-custom-blocks.php';

// Menus.
require __DIR__ . '/inc/menus/menus-register.php';
require __DIR__ . '/inc/menus/menus-custom-fields.php';
require __DIR__ . '/inc/menus/class-default-menu-walker.php';
require __DIR__ . '/inc/menus/class-mega-menu-walker.php';
require __DIR__ . '/inc/menus/class-side-menu-walker.php';

// Mata fields.
require __DIR__ . '/inc/meta-fields/meta-fields-page.php';

// Customizer.
require __DIR__ . '/inc/customizer/customizer.php';

// Functions.
require __DIR__ . '/inc/functions/class-functions-customizer-styles.php';

// Sidebars.
require __DIR__ . '/inc/sidebars/sidebars.php';

// Shortcodes.
require __DIR__ . '/inc/shortcodes/shortcodes.php';

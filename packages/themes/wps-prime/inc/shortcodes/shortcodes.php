<?php
/**
 * WPS Prime Shortcodes.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Shortcodes;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

require_once __DIR__ . '/shortcode-social-links.php';
require_once __DIR__ . '/shortcode-date.php';
require_once __DIR__ . '/shortcode-site-info.php';
/**
	* Temporary comment out
 * require_once __DIR__ . '/shortcode-email.php';
 * require_once __DIR__ . '/shortcode-phone-nr.php';
 * require_once __DIR__ . '/shortcode-list-custom-menu.php';
*/

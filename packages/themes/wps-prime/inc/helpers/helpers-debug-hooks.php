<?php
/**
 * Theme reveal wps hooks on front end.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Helpers;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

// If checked in theme options display hooks.
add_action( 'wp_head', __NAMESPACE__ . '\\display_hooks_location' );

/**
 * Highlight hooks function
 */
function debug_hook() { ?>
	<span style="position:absolute;z-index:999999;font-size:10px;background-color:#ff0000;color:#fff;padding:5px 10px;"><?php echo esc_html( current_filter() ); ?></span>
	<?php
}

/**
 * Add debug info to each hook
 */
function display_hooks_location() {

	if ( ! get_option( 'wps_display_wps_hooks' ) ) {
		return;
	}

	$hooks = \WpsPrime\Helpers\HooksLayout\get_hook_list();

	if ( ! $hooks ) {
		return;
	}

	foreach ( $hooks as $hook ) {
		add_action( $hook, __NAMESPACE__ . '\\debug_hook' );
	}
}


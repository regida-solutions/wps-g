<?php
/**
 *
 *   Theme HOOKS
 *
 *   @package WpsPrime
 */

/**
 *  BODY Hooks
 *  - body_start
 *    ....
 *  - wp_footer
 *
 *  HEADER Hooks layout
 *
 *  - before_header
 *  - mast_head_start
 *       - theme_header
 *         - header-left
 *         - header-right
 *   - mast_head_start
 *
 *  INTERMEDIATE Hooks after header before content
 *
 *  - after_header
 *  - before_content
 *
 *  MAIN CONTENT Hooks layout
 *
 *   - content_start
 *   - content_end
 *   - single_entry_header
 *   - single_entry_footer
 *   - after_content
 *
 *  MAIN SIDEBAR Hooks layout
 *
 *   - sidebar_start
 *   - sidebar_end
 *
 *  FOOTER Hooks layout
 *
 *   - before_footer
 *   - footer_start
 *   - footer_end
 *   - after_footer
 */

declare( strict_types=1 );

namespace WpsPrime\Helpers\HooksLayout;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

/**
 * Hook list for debugging
 */
function get_hook_list():array {

	return [
		'body_start',
		'before_header',
		'mast_head_start',
		'theme_header',
		'wps_theme_header_left',
		'wps_theme_header_right',
		'mast_head_end',
		'after_header',
		'before_content',
		'content_start',
		'content_end',
		'after_content',
		'sidebar_start',
		'sidebar_end',
		'before_footer',
		'footer_start',
		'footer_end',
		'after_footer',
		'single_entry_header',
		'single_entry_footer',
	];
}

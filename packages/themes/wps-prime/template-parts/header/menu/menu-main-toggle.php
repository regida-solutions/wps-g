<?php
/**
 * Theme Site Main menu toggle
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}
?>

<button id="c-slide-nav-toggler--slide-right" class="c-slide-nav-toggler c-slide-nav-toggler--themed">
	<span class="c-slide-nav-toggler-label"><?php esc_html_e( 'MENU', 'wps-prime' ); ?></span>
	<span class="c-slide-nav-toggler-icon">
		<span></span>
		<span></span>
		<span></span>
		<span></span>
	</span>
</button>

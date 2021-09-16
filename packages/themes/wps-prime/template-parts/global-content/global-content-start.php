<?php
/**
 * Global content at site start.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

$area = get_option( 'wps_global_content_start_area' );
if ( ! $area ) {
	return;
}
?>
<section class="site-global-content-start"><?php echo do_shortcode( $area ); //phpcs:ignore ?></section>

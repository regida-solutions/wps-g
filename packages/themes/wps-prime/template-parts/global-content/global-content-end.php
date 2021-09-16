<?php
/**
 * Global content at site end.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

$area = get_option( 'wps_global_content_end_area' );
if ( ! $area ) {
	return;
}
?>
<section class="site-global-content-end"><?php echo do_shortcode( $area ); //phpcs:ignore ?></section>

<?php
/**
 * Global content after header area.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

$area = get_option( 'wps_global_before_content_area' );
if ( ! $area ) {
	return;
}
?>
<section class="site-global-before-content"><?php echo do_shortcode( $area ); //phpcs:ignore ?></section>

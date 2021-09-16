<?php
/**
 * Utility content area in header.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

$area = get_option( 'header_utility_content' );

if ( ! $area ) {
	return;
}
?>
<section class="head-utility-content"><?php echo do_shortcode( $area ); //phpcs:ignore ?></section>

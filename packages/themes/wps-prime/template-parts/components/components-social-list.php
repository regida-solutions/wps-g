<?php
/**
 * Theme social media icon list
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}
?>
<div class="c-social-list"><?php echo do_shortcode( '[wps_social_links link_class="u-text-color-invert"]' ); ?></div>

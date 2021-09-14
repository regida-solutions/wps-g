<?php
/**
 * The template for displaying the site micro-copy.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}
$hide       = get_theme_mod( 'hide_footer_micro', false );
$disclaimer = get_option( 'wps_site_disclaimer' );

?>
<?php if ( ! $hide ) : ?>
	<div class="page-micro">
				<div class="page-micro__copy">
					<div class="site-disclaimer"><?php echo wp_kses_post( do_shortcode( $disclaimer ) ); ?></div>
				</div>
</div><!-- page-micro -->
<?php endif; ?>

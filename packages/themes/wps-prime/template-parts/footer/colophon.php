<?php
/**
 * The template for displaying the footer colophon.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

$custom_footer         = get_theme_mod( 'use_custom_footer', false );
$custom_footer_content = get_option( 'footer_custom_content', false );
?>
<footer id="colophon"<?php wps_footer_class(); ?> role="contentinfo">
	<?php do_action( 'wps_footer_start' ); ?>
	<?php if ( ! $custom_footer ) : ?>
		<?php get_sidebar( 'footer' ); ?>
	<?php else : ?>
		<?php echo wp_kses_post( do_shortcode( $custom_footer_content ) ); ?>
	<?php endif; ?>
	<?php do_action( 'wps_footer_end' ); ?>
</footer><!-- #colophon -->

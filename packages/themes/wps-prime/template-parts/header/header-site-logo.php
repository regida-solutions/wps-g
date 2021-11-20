<?php
/**
 * Theme Site Logo.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

$description  = get_bloginfo( 'description', 'display' );
$html_tag     = is_front_page() && is_home() ? 'h1' : 'p';
$branding_url = apply_filters( 'wps_branding_url', home_url( '/' ) );

?>
<div class="site-branding">
	<?php if ( ! has_custom_logo() ) : ?>
	<<?php echo esc_html( $html_tag ); ?> class="site-title">
	<a href="<?php echo esc_url( $branding_url ); ?>" rel="home">
		<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
	</a>
</<?php echo esc_html( $html_tag ); ?>>
		<?php if ( $description || is_customize_preview() ) : ?>
	<p class="site-description"><?php echo esc_html( $description ); ?></p>
<?php endif; ?>
	<?php else : ?>
		<?php the_custom_logo(); ?>
	<?php endif; ?>
</div>


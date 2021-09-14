<?php
/**
 * Get site diagnostics data.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Helpers;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

/**
 * Generate theme diagnostics info data
 *
 * @return string
 */
function get_development_data():string {

	$theme        = wp_get_theme();
	$parent_theme = $theme->parent();

	ob_start();
	?>
	<span style="font-size:22px;font-weight:300;"><?php esc_html_e( 'Overview', 'wps-prime' ); ?></span><br><br>

	<?php if ( ! empty( $parent_theme ) ) : ?>
	<strong><?php esc_html_e( 'Parent Theme', 'wps-prime' ); ?>:</strong> <?php echo esc_html( $parent_theme->get( 'Name' ) ); ?> v.<strong><?php echo esc_html( $parent_theme->get( 'Version' ) ); ?></strong><br>
	<?php endif; ?>

	<strong><?php esc_html_e( 'Site Title', 'wps-prime' ); ?>:</strong> <?php echo esc_html( get_bloginfo( 'name' ) ); ?><br>
	<strong><?php esc_html_e( 'Tagline', 'wps-prime' ); ?>:</strong> <?php echo esc_html( get_bloginfo( 'description' ) ); ?><br>
	<strong><?php esc_html_e( 'Site Url', 'wps-prime' ); ?>:</strong> <?php echo esc_html( site_url() ); ?><br>
	<strong><?php esc_html_e( 'Stylesheet Directory', 'wps-prime' ); ?>:</strong> <?php echo esc_html( get_template_directory_uri() ); ?><br>
	<strong><?php esc_html_e( 'Template directory', 'wps-prime' ); ?>:</strong> <?php echo esc_html( get_template_directory_uri() ); ?><br>
	<hr/>
	<strong><?php esc_html_e( 'WordPress', 'wps-prime' ); ?>:</strong> <?php echo esc_html( get_bloginfo( 'version' ) ); ?><br>
	<strong><?php esc_html_e( 'Active theme', 'wps-prime' ); ?>:</strong> <?php echo esc_html( $theme->get( 'Name' ) ); ?> v.<strong><?php echo esc_html( $theme->get( 'Version' ) ); ?></strong><br><br>

	<span style="font-size:22px;font-weight:300;">Current Theme Data</span><br><br>
	<strong><?php esc_html_e( 'Theme name', 'wps-prime' ); ?>:</strong> <?php echo esc_html( $theme->get( 'Name' ) ); ?><br>
	<strong><?php esc_html_e( 'Theme URI', 'wps-prime' ); ?>:</strong> <?php echo esc_html( $theme->get( 'ThemeURI' ) ); ?><br>
	<strong><?php esc_html_e( 'Text Domain', 'wps-prime' ); ?>:</strong> <?php echo esc_html( $theme->get( 'TextDomain' ) ); ?><br>
	<strong><?php esc_html_e( 'Description', 'wps-prime' ); ?>:</strong> <?php echo esc_html( $theme->get( 'Description' ) ); ?><br>
	<strong><?php esc_html_e( 'Author', 'wps-prime' ); ?>:</strong> <?php echo esc_html( $theme->get( 'Author' ) ); ?><br>
	<strong><?php esc_html_e( 'Author URI', 'wps-prime' ); ?>:</strong> <?php echo esc_html( $theme->get( 'AuthorURI' ) ); ?><br>
	<strong><?php esc_html_e( 'Theme Version', 'wps-prime' ); ?>:</strong> <?php echo esc_html( $theme->get( 'Version' ) ); ?><br><br>

	<?php if ( ! empty( $parent_theme ) ) : ?>
	<span style="font-size:22px;font-weight:300;"><?php esc_html_e( 'Parent Theme Data', 'wps-prime' ); ?></span><br><br>
	<strong><?php esc_html_e( 'Theme name', 'wps-prime' ); ?>:</strong> <?php echo esc_html( $parent_theme->get( 'Name' ) ); ?><br>
	<strong><?php esc_html_e( 'Theme URI', 'wps-prime' ); ?>:</strong> <?php echo esc_html( $parent_theme->get( 'ThemeURI' ) ); ?><br>
	<strong><?php esc_html_e( 'Text Domain', 'wps-prime' ); ?>:</strong> <?php echo esc_html( $parent_theme->get( 'TextDomain' ) ); ?><br>
	<strong><?php esc_html_e( 'Description', 'wps-prime' ); ?>:</strong> <?php echo esc_html( $parent_theme->get( 'Description' ) ); ?><br>
	<strong><?php esc_html_e( 'Author', 'wps-prime' ); ?>:</strong> <?php echo esc_html( $parent_theme->get( 'Author' ) ); ?><br>
	<strong><?php esc_html_e( 'Author URI', 'wps-prime' ); ?>:</strong> <?php echo esc_html( $parent_theme->get( 'AuthorURI' ) ); ?><br>
	<strong><?php esc_html_e( 'Theme Version', 'wps-prime' ); ?>:</strong> <?php echo esc_html( $parent_theme->get( 'Version' ) ); ?><br><br>
	<?php endif; ?>

	<?php
	return ob_get_clean();
}

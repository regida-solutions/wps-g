<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width,height=device-height,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wps_body_start' ); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wps-prime' ); ?></a>
	<?php do_action( 'wps_before_header' ); ?>

	<header id="masthead"<?php wps_header_class(); ?> role="banner">
		<?php do_action( 'wps_mast_head_start' ); ?>
		<div class="masthead-layout">
		<?php do_action( 'wps_theme_header' ); ?>
		</div>
		<?php do_action( 'wps_mast_head_end' ); ?>
	</header><!-- #masthead -->
	<?php do_action( 'wps_after_header' ); ?>
	<?php do_action( 'wps_before_content' ); ?>
	<div id="content"<?php wps_main_content_class(); ?>>
		<?php do_action( 'wps_content_start' ); ?>

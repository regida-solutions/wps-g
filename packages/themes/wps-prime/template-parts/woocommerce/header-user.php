<?php
/**
 * Template part for theme woocommerce header utility user.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

$logout_url = '';
$user_icon  = '<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="user-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" class="wps-prime-icon svg-inline--fa fa-user-circle fa-w-16"><path fill="currentColor" d="M248 104c-53 0-96 43-96 96s43 96 96 96 96-43 96-96-43-96-96-96zm0 144c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm0-240C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 448c-49.7 0-95.1-18.3-130.1-48.4 14.9-23 40.4-38.6 69.6-39.5 20.8 6.4 40.6 9.6 60.5 9.6s39.7-3.1 60.5-9.6c29.2 1 54.7 16.5 69.6 39.5-35 30.1-80.4 48.4-130.1 48.4zm162.7-84.1c-24.4-31.4-62.1-51.9-105.1-51.9-10.2 0-26 9.6-57.6 9.6-31.5 0-47.4-9.6-57.6-9.6-42.9 0-80.6 20.5-105.1 51.9C61.9 339.2 48 299.2 48 256c0-110.3 89.7-200 200-200s200 89.7 200 200c0 43.2-13.9 83.2-37.3 115.9z" class=""></path></svg>';

$my_account_page_id = get_option( 'woocommerce_myaccount_page_id' );
$account_url        = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );

$login_label = is_user_logged_in() ? __( 'My Account', 'wps-prime' ) : __( 'Login', 'wps-prime' );

if ( $my_account_page_id ) {

	$logout_url = wp_logout_url( get_permalink( $my_account_page_id ) );

	if ( 'yes' === get_option( 'woocommerce_force_ssl_checkout' ) ) {
		$logout_url = str_replace( 'http:', 'https:', $logout_url );
	}
}
?>

<div class="site-header-user">
	<div class="woo-head-utility">
		<a href="<?php echo esc_url( $account_url ); ?>" title="<?php esc_html_e( 'My Account', 'wps-prime' ); ?>">
			<span class="woo-head-utility__symbol"><?php echo wp_kses( $user_icon, \WpsPrime\Helpers\svg_allowed_tags() ); ?></span>
		</a>
	</div>
	<ul class="site-header-user__list">
		<li><a class="woo-head-utility__account-link" href="<?php echo esc_url( $account_url ); ?>" title="<?php echo esc_attr( $login_label ); ?>"><?php echo esc_html( $login_label ); ?></a></li>
	 <?php	if ( is_user_logged_in() ) : //phpcs:ignore ?>
			<li><a class="woo-head-utility__account-logout-link" href="<?php esc_url( $logout_url ); ?>"><?php esc_html_e( 'Logout', 'wps-prime' ); ?></a></li>
		<?php	endif; ?>
	</ul>
</div>

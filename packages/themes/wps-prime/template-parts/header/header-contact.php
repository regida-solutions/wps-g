<?php
/**
 * Theme Header Contact.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}


$has_phone = get_theme_mod( 'header_show_phone', false );
$has_email = get_theme_mod( 'header_show_email', false );

$phone_main = get_option( 'wps_phone_nr' );
$email_main = get_option( 'wps_email_address' );

$has_social  = get_theme_mod( 'header_utility_show_social', false );
$show_labels = get_theme_mod( 'header_contact_show_labels', false );

$allowed_tags    = apply_filters( 'wps_allowed_html_attributes_with_svg', 'post' );

$social  = '';
$phone  = '';
$email  = '';
$class = '';

// Cleanup phone nr.
$phone_main_formatted = preg_replace( '/\s+/', '', $phone_main );

if ( $phone_main && $has_phone ) {
	$phone = '<a class="head-utility__link wps-phone-link" href="tel:' . $phone_main_formatted . '">' . \WpsPrime\Helpers\theme_icon( 'phone' ) . ( $show_labels ? ' ' . $phone_main : '' ) . '</a>';
}

if ( $email_main && $has_email ) {
	$email = '<a class="head-utility__link wps-email-link" href="mailto:' . $email_main . '">' . \WpsPrime\Helpers\theme_icon( 'envelope' ) . ( $show_labels ? ' ' . $email_main : '' ) . '</a>';
}

if ( $has_social ) {
	$social = '<div class="head-utility-social">' . do_shortcode( '[wps_social_links target="blank"]' ) . '</div>';
}

if ( ! $phone && ! $email && ! $social ) {
	return;
}

if ( ( $phone || $email ) && $social ) {
	$class = ' head-utility-has-social';
}
?>
<div class="head-utility<?php echo esc_attr( $class  ); ?>"><?php echo wp_kses( $phone, $allowed_tags  ); ?> <?php echo wp_kses( $email, $allowed_tags  ); ?> <?php echo wp_kses( $social, $allowed_tags  ); ?></div>

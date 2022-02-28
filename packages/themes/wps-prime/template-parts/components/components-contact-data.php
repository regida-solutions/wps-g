<?php
/**
 * Contact data
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

if ( ! $has_phone && ! $has_email ) {
	return;
}
?>
<div class="contact-data">
		<?php if ( $has_phone && $phone_main ) : ?>
			<a class="contact-data__item wps-phone-link" href="tel:<?php echo esc_html( $phone_main ); ?>">
				<?php echo wp_kses_post( WpsPrime\Helpers\theme_icon( 'phone' ) ); ?> <?php echo esc_html( $phone_main ); ?>
			</a>
		<?php endif; ?>
	<?php if ( $has_email && $email_main ) : ?>
		<a class="contact-data__item wps-email-link" href="tel:<?php echo esc_html( $email_main ); ?>">
			<?php echo wp_kses_post( WpsPrime\Helpers\theme_icon( 'email' ) ); ?> <?php echo esc_html( $email_main ); ?>
		</a>
	<?php endif; ?>
</div>

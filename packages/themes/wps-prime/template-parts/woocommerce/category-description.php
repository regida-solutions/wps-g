<?php
/**
 * Template part for woocommerce category description.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

$category_term = get_queried_object();
?>
<?php if ( $category_term && ! empty( $category_term->description ) ) : ?>
		<div class="term-description term-description-has-read-more">
			<div class="term-description__content"><?php echo wp_kses_post( wc_format_content( $category_term->description ) ); ?></div>
			<div class="term-description__button">
				<div class="term-description__read-more"><span class="term-description__label"><?php esc_html_e( 'Read more', 'wps-prime' ); ?></span><span class="term-description__symbol"></span></div>
			</div>
		</div>
<?php endif; ?>

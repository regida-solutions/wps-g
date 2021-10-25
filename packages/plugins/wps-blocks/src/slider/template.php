<?php
/**
 * Block template
 *
 * @package WpsBlocks
 **/

declare( strict_types=1 );

namespace WPS\Slider\Template;

use function WPS\Blocks\Helpers\ClassNames\get_names as get_names;

/**
 * Render callback template
 *
 * @param array  $attributes Block attributes.
 * @param string $blocks inner blocks.
 */
function template( array $attributes, string $blocks ): string {

	wp_enqueue_script( 'wps-slider-core' );
	wp_enqueue_style( 'wps-slider-core' );

	$align = isset( $attributes['align'] ) ? 'align' . $attributes['align'] : '';
	$text_align = isset( $attributes['textAlign'] ) ? 'has-text-align-' . $attributes['textAlign'] : '';
	$vertical_align = isset( $attributes['verticalAlign'] ) ? 'has-vertical-align-' . $attributes['verticalAlign'] : '';

	$classes = get_names( [
		'wps-slider',
		'swiper',
		$align,
		$text_align,
		$vertical_align
	]);

	ob_start();
	?>
	<div class="<?php echo esc_attr( $classes ); ?>">
	<div class="swiper-wrapper">
		<?php if ( ! empty( $blocks ) ) : ?>
			<?php echo $blocks; //phpcs:ignore ?>
		<?php endif; ?>
	</div>
		<div class="wps-slider-button-next swiper-button-next"></div>
		<div class="wps-slider-button-prev swiper-button-prev"></div>
	</div>
	<?php
	return ob_get_clean();
}

/**
 * Callback function name
 *
 * @return string The template function name.
 **/
function block_frontend_template(): string {
	return __NAMESPACE__ . '\\template';
}
add_filter( 'render_callback_slider', __NAMESPACE__ . '\\block_frontend_template' );

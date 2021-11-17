<?php
/**
 * Block template
 *
 * @package WpsBlocks
 **/

declare( strict_types=1 );

namespace WPS\Section\Template;

use function WPS\Blocks\Helpers\ClassNames\get_names as get_names;

/**
 * Render callback template
 *
 * @param array  $attributes Block attributes.
 * @param string $blocks inner blocks.
 */
function template( array $attributes, string $blocks ): string {
	$classes = get_names( [
		'wps-section',
		! empty( $attributes['align'] ) ? 'align' . $attributes['align'] : '',
		! empty( $attributes['spacingVertical'] ) ? 'u-padding-vertical-' . $attributes['spacingVertical'] : '',
		! empty( $attributes['backgroundColor'] ) ? 'has-' . esc_attr( $attributes['backgroundColor'] ) . '-background-color' : '',
		! empty( $attributes['textColor'] ) ? 'has-' . esc_attr( $attributes['textColor'] ) . '-color' : '',
		! empty( $attributes['spacingVertical'] ) ? 'has-vertical-spacing' : '',
		! empty( $attributes['marginTop'] ) ? 'has-margin-top-' . esc_attr( $attributes['marginTop'] ) : '',
		! empty( $attributes['marginBottom'] ) ? 'has-margin-bottom-' . esc_attr( $attributes['marginBottom'] ) : '',
		! empty( $attributes['media']['url'] ) ? 'has-background' : '',
		! empty( $attributes['backgroundBehaviour'] ) ? 'background-is-' . esc_attr( $attributes['backgroundBehaviour'] ) : '',
	] );

	$overlay_classes = get_names( [
		'wps-section__overlay',
		! empty( $attributes['media']['url'] ) ? 'has-background' : '',
		! empty( $attributes['backgroundBehaviour'] ) ? 'background-is-' . esc_attr( $attributes['backgroundBehaviour'] ) : '',
	]);

	$style               = '';
	$style_overlay       = '';
	$style_items         = '';
	$style_overlay_items = '';

	if ( ! empty( $attributes['media']['url'] ) ) {
		$style_overlay_items .= 'background-image:url(' . $attributes['media']['url'] . ');';
	}

	if ( ! empty( $attributes['focalPoint']['x'] ) ) {
		$style_overlay_items .= 'background-position:' . ( $attributes['focalPoint']['x'] * 100 ) . '% ' . ( $attributes['focalPoint']['y'] * 100 ) . '%;';
	}

	if ( ! empty( $attributes['dimRatio'] ) ) {
		$style_overlay_items .= 'opacity:' . $attributes['dimRatio'] . '%;';
	}

	if ( '' !== $style_items ) {
		$style = ' style="' . $style_items . '"';
	}
	if ( '' !== $style_overlay_items ) {
		$style_overlay = ' style="' . $style_overlay_items . '"';
	}

	ob_start();
	?>
	<div class="<?php echo esc_attr( $classes ); ?>"<?php echo $style; //phpcs:ignore ?>>
		<?php if ( $style_overlay ) : ?>
		<div class="<?php echo esc_attr( $overlay_classes ); ?>"<?php echo $style_overlay; //phpcs:ignore ?>></div>
		<?php endif; ?>
		<div class="wps-section__inner">
			<?php echo wp_kses_post( $blocks ); ?>
		</div>
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
add_filter( 'render_callback_section', __NAMESPACE__ . '\\block_frontend_template' );

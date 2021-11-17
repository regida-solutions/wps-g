<?php
/**
 * Block template
 *
 * @package WpsFontawesome
 */

declare( strict_types=1 );

namespace WPS\Icon;

use function WPS\Blocks\Helpers\ClassNames\get_names as get_names;

/**
 * Render callback template
 *
 * @param array $attributes Block attributes.
 */
function template( array $attributes ): string {

	$size = '';

	// This is just a local file.
	$icon_type_list = file_get_contents( __DIR__ . '/icon-typelist.json' ); // phpcs:ignore
	$type_list      = json_decode( $icon_type_list, true );

	$icon_type = '';
	if ( isset( $attributes['type'] ) ) {
		$type = array_filter($type_list, function( array $item ) use ( $attributes ):bool {
			if ( isset( $attributes['type'] ) ) {
				return $item['attributes']['value'] === $attributes['type'];
			}
			return true;
		});
		if ( ! empty( $type ) ) {
			$type      = wp_list_pluck( array_values( $type ), 'attributes' );
			$icon_type = $type[0]['class'] ?? '';
		}
	}

	if ( ! empty( $attributes['fontSize'] ) ) {
		if ( isset( $attributes['fontSize']['id'] ) ) {

			preg_match( '/([a-z]+)([0-9])/', $attributes['fontSize']['id'], $output );

			if ( is_array( $output ) ) {
				if ( ! empty( $output ) ) {
					$prepare_class = implode( '-', $output );
					$size          = 'has-' . $prepare_class . '-font-size';
				} else {
					$size = 'has-' . $attributes['fontSize']['id'] . '-font-size';
				}
			}
		}
	}

	$classes = get_names( [
		'wps-icon',
		! empty( $attributes['textColor'] ) ? 'has-' . esc_attr( $attributes['textColor'] ) . '-color' : '',
		! empty( $attributes['textAlign'] ) ? 'has-text-align-' . esc_attr( $attributes['textAlign'] ) : '',
		! empty( $attributes['marginTop'] ) ? 'has-margin-top-' . esc_attr( $attributes['marginTop'] ) : '',
		! empty( $attributes['marginBottom'] ) ? 'has-margin-bottom-' . esc_attr( $attributes['marginBottom'] ) : '',
		$size,
	]);

	$icon_classes = get_names( [
		$icon_type,
		isset( $attributes['icon'] ) ? 'fa-' . $attributes['icon'] : 'fa-font-awesome',
	]);

	wp_enqueue_style( 'wps-icon-assets-all' );

	ob_start();
	?>
	<div class="<?php echo esc_attr( $classes ); ?>">
		<i class="fa <?php echo esc_attr( $icon_classes ); ?>"></i>
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
add_filter( 'render_callback_icon', __NAMESPACE__ . '\\block_frontend_template' );

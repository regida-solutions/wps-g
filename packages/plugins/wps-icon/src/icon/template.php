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
	$icon_type_list = file_get_contents( __DIR__ . '/../components/icon-typelist.json' ); // phpcs:ignore
	$type_list      = json_decode( $icon_type_list, true );

	$fa_icon_classes = '';

	if ( isset( $attributes['type'] ) ) {

		// Handle fontawesome special case where we have to generate two classnames for solid-sharp and generate fa-solid fa-sharp.
		$has_hyphen = substr_count( $attributes['type'], '-' );

		// We have a hyphen in the type, so we split in two classes.
		if ( 0 !== $has_hyphen ) {
			$icon_class_names = explode( '-', $attributes['type'] );
			foreach ( $icon_class_names as $icon_class_name ) {
				$fa_icon_classes .= 'fa-' . $icon_class_name . ' ';
			}

			// Remove last whitespace from th end of the string.
			$fa_icon_classes = rtrim( $fa_icon_classes );

		} else {
			// No double font classes so just create one.
			$fa_icon_classes = 'fa-' . esc_attr( $attributes['type'] );
		}

		$type = array_filter($type_list, function( array $item ) use ( $attributes ):bool {
			if ( isset( $attributes['type'] ) ) {
				return $item['attributes']['value'] === $attributes['type'];
			}
			return true;
		});
		if ( ! empty( $type ) ) {
			$type = wp_list_pluck( array_values( $type ), 'attributes' );
		}
	}

	if ( ! empty( $attributes['fontSize'] ) ) {
		if ( isset( $attributes['fontSize']['id'] ) ) {

			preg_match( '/([a-z]+)([0-9])/', $attributes['fontSize']['id'], $output );

			if ( is_array( $output ) ) {
				if ( ! empty( $output[1] ) && ! empty( $output[2] ) ) {
					$size = $output[1] . '-' . $output[2];
					$size = 'has-' . $size . '-font-size';
				} else {
					$size = 'has-' . $attributes['fontSize']['id'] . '-font-size';
				}
			}
		}
	}

	$classes = get_names( [
		'wps-icon',
		! empty( $attributes['textColor'] ) ? 'has-' . esc_attr( $attributes['textColor'] ) . '-color' : '',
		! empty( $attributes['justification'] ) ? 'is-aligned-' . esc_attr( $attributes['justification'] ) : '',
		! empty( $attributes['marginTop'] ) ? 'has-margin-top-' . esc_attr( $attributes['marginTop'] ) : '',
		! empty( $attributes['marginBottom'] ) ? 'has-margin-bottom-' . esc_attr( $attributes['marginBottom'] ) : '',
		! empty( $attributes['className'] ) ? $attributes['className'] : '',
		$size,
	]);

	$icon_classes = get_names( [
		$fa_icon_classes,
		isset( $attributes['icon'] ) ? 'fa-' . $attributes['icon'] : 'fa-font-awesome',
	]);

	$anchor = isset( $attributes['anchor'] ) ? ' id="' . $attributes['anchor'] . '"' : '';

	wp_enqueue_style( 'wps-icon-assets-all' );

	ob_start();
	?>
	<div<?php echo $anchor; //phpcs:ignore ?> class="<?php echo esc_attr( $classes ); ?>">
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

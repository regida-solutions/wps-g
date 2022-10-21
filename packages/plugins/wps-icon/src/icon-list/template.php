<?php
/**
 * Block template
 *
 * @package WpsFontawesome
 */

declare( strict_types=1 );

namespace WPS\IconList;

use function WPS\Blocks\Helpers\ClassNames\get_names as get_names;

/**
 * Render callback template
 *
 * @param array  $attributes Block attributes.
 * @param string $blocks inner blocks.
 */
function template( array $attributes, string $blocks ): string {

	$size = '';

	// This is just a local file.
	$icon_type_list = file_get_contents( __DIR__ . '/../components/icon-typelist.json' ); // phpcs:ignore
	$type_list      = json_decode( $icon_type_list, true );

	$icon_type = 'fa-regular';
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

	$classes = get_names( [
		'wps-icon-list',
		! empty( $attributes['marginTop'] ) ? 'has-margin-top-' . esc_attr( $attributes['marginTop'] ) : '',
		! empty( $attributes['marginBottom'] ) ? 'has-margin-bottom-' . esc_attr( $attributes['marginBottom'] ) : '',
		! empty( $attributes['className'] ) ? $attributes['className'] : '',
		$size,
	]);

	$icon_classes = get_names( [
		$icon_type,
		isset( $attributes['icon'] ) ? 'fa-' . $attributes['icon'] : '',
		! empty( $attributes['textColor'] ) ? 'has-' . esc_attr( $attributes['textColor'] ) . '-color' : '',
	]);

	$anchor = isset( $attributes['anchor'] ) ? ' id="' . $attributes['anchor'] . '"' : '';

	wp_enqueue_style( 'wps-icon-assets-all' );

	// Add list class.
	$blocks = str_replace( [ '<ul>' ], '<ul class="fa-ul">', $blocks );

	// Add icon.
	$blocks = str_replace( [ '<li>' ], '<li><span class="fa-li"><i class="' . $icon_classes . '"></i></span>', $blocks );

	ob_start();
	?>
	<div<?php echo $anchor; //phpcs:ignore ?> class="<?php echo esc_attr( $classes ); ?>">
		<?php echo $blocks //phpcs:ignore ?>
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
add_filter( 'render_callback_icon-list', __NAMESPACE__ . '\\block_frontend_template' );

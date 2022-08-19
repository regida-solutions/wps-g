<?php
/**
 * Menu custom fields
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Menu\CustomFields;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

add_action( 'wp_nav_menu_item_custom_fields', __NAMESPACE__ . '\\menu_item_fields', 10, 4 );
add_action( 'wp_update_nav_menu_item', __NAMESPACE__ . '\\save_fields', 10, 3 );
add_filter( 'manage_nav-menus_columns', __NAMESPACE__ . '\\menu_columns', 99 );

/**
 * Menu Setting fields
 *
 * @return array
 */
function menu_settings():array {
	$settings = [];

	if ( defined( 'WPS_ICON_BLOCKS_VERSION' ) ) {
		$settings['wps-icon-class'] = [
			'label' => __( 'Icon Class ex. alien | visit: https://fontawesome.com', 'wps-prime' ),
			'type'  => 'text',
		];

		$settings['wps-icon-type'] = [
			'label' => __( 'Select fontawesome icon type', 'wps-prime' ),
			'type'  => 'ico-type-select',
		];

		$settings['wps-position-start'] = [
			'label' => __( 'Icon show at start', 'wps-prime' ),
			'type'  => 'checkbox',
		];
	}
	$settings['wps-ca-style-one'] = [
		'label' => __( 'Call to action style one', 'wps-prime' ),
		'type'  => 'checkbox',
	];

	$settings['wps-ca-style-two'] = [
		'label' => __( 'Call to action style two', 'wps-prime' ),
		'type'  => 'checkbox',
	];

	$settings['wps-enable-mega-menu'] = [
		'label' => __( 'Enable mega menu', 'wps-prime' ),
		'type'  => 'checkbox',
		'depth' => 0,
		'limit' => 0,
	];
	$settings['wps-mega-divider']     = [
		'label' => __( 'Enable mega menu next column', 'wps-prime' ),
		'type'  => 'checkbox',
		'depth' => 1,
		'limit' => 1,
	];

	$settings['wps-submenu-opener'] = [
		'label' => __( 'Disable link (use as sub-menu opener)', 'wps-prime' ),
		'type'  => 'checkbox',
	];

	$settings['wps-align-right'] = [
		'label' => __( 'Align Right', 'wps-prime' ),
		'type'  => 'checkbox',
		'depth' => 0,
		'limit' => 0,
	];

	return $settings;
}

/**
 * Print field.
 *
 * @param int    $id Nav menu ID.
 * @param object $item Menu item data object.
 * @param int    $depth Depth of menu item used for padding.
 * @param object $args Menu item args.
 *
 * @return void
 */
function menu_item_fields( int $id, object $item, int $depth, object $args ):void {

	$settings = menu_settings();

	foreach ( $settings as $key => $data ) :
		$key   = sprintf( 'menu-item-%s', $key );
		$id    = sprintf( 'edit-%s-%s', $key, $item->ID );
		$name  = sprintf( '%s[%s]', $key, $item->ID );
		$value = get_post_meta( $item->ID, $key, true );
		$class = sprintf( 'field-%s', $key );

		/**
			* Check if field is limited to a certain depth
			* Check if we set a depth show it only starting from that depth
			*/
		if ( isset( $data['limit'] ) ) {
			if ( $data['limit'] === $depth ) {
				render_field( $id, $key, $name, $value, $class, $data );
			}
		} elseif ( isset( $data['depth'] ) ) {
			if ( $depth >= $data['depth'] ) {
				render_field( $id, $key, $name, $value, $class, $data );
			}
		} else {
			render_field( $id, $key, $name, $value, $class, $data );
		}
	endforeach;
}


/**
 * Create custom field UI
 *
 * @param string $id Field id.
 * @param string $key Unique key.
 * @param string $name Field name.
 * @param string $value Field value.
 * @param string $class Custom css class.
 * @param array  $data Field data.
 *
 * @return void
 */
function render_field( string $id, string $key, string $name, string $value, string $class, array $data ):void {
	$data_type = $data['type'] ?? 'text';
	?>
	<div class="description description-wide <?php echo esc_attr( $class ); ?>">
	<?php
	if ( 'text' === $data_type ) {
		printf(
			'<label for="%1$s">%2$s<br /><input type="text" id="%1$s" class="widefat %1$s" name="%3$s" value="%4$s" /></label>',
			esc_attr( $id ),
			esc_html( $data['label'] ),
			esc_attr( $name ),
			esc_attr( $value )
		);
	} elseif ( 'checkbox' === $data_type ) {
		printf(
			'<label for="%1$s"><input type="checkbox" id="%1$s" class="widefat %1$s" name="%3$s" value="true" %4$s/> %2$s</label>',
			esc_attr( $id ),
			esc_html( $data['label'] ),
			esc_attr( $name ),
			( isset( $value ) ? checked( $value, 'true', false ) : '' )
		);
	} elseif ( 'ico-type-select' === $data_type ) {
		printf(
			'<label for="%1$s">%2$s
				   	<select id="%1$s" name="%3$s" class="widefat">
				   	<option value="">---</option>
				   	<option value="regular" ' . ( isset( $value ) ? selected( $value, 'regular', false ) : '' ) . '>Regular</option>
				   	<option value="solid" ' . ( isset( $value ) ? selected( $value, 'solid', false ) : '' ) . '>Solid</option>
				   	<option value="light" ' . ( isset( $value ) ? selected( $value, 'light', false ) : '' ) . '>Light</option>
				   	<option value="duotone" ' . ( isset( $value ) ? selected( $value, 'duotone', false ) : '' ) . '>Duotone</option>
				   	<option value="brands" ' . ( isset( $value ) ? selected( $value, 'brands', false ) : '' ) . '>Brands</option>
				   	</select>
				   </label>',
			esc_attr( $id ),
			esc_html( $data['label'] ),
			esc_attr( $name )
		);
	}
	?>
	</div>
	<?php
}

/**
 * Save custom field value.
 *
 * @wp_hook action wp_update_nav_menu_item
 *
 * @param int   $menu_id         Nav menu ID.
 * @param int   $menu_item_db_id Menu item ID.
 * @param array $menu_item_args  Menu item data.
 *
 * @return void
 */
function save_fields( int $menu_id, int $menu_item_db_id, array $menu_item_args ):void {
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return;
	}
	check_admin_referer( 'update-nav_menu', 'update-nav-menu-nonce' );

	$settings = menu_settings();

	foreach ( $settings as $id => $label ) {

		$key = sprintf( 'menu-item-%s', $id );

		// Sanitize.
		if ( ! empty( $_POST[ $key ][ $menu_item_db_id ] ) ) {
				$value = sanitize_key( $_POST[ $key ][ $menu_item_db_id ] );
		} else {
			$value = null;
		}

		// Update.
		if ( ! is_null( $value ) ) {
			update_post_meta( $menu_item_db_id, $key, $value );
		} else {
			delete_post_meta( $menu_item_db_id, $key );
		}
	}
}

/**
 * Add our fields to the screen options toggle.
 *
 * @param array $columns Menu item columns.
 *
 * @return array
 */
function menu_columns( array $columns ):array {
	$settings           = menu_settings();
	$flattened_settings = [];

	foreach ( $settings as $key => $value ) {
		$flattened_settings[ $key ] = $value['label'];
	}

	return array_merge( $columns, $flattened_settings );
}

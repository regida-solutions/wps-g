<?php
/**
 * Add information to admin columns
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Admin\Columns;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

$post_types = [ 'posts', 'pages', 'media' ];

foreach ( $post_types as $pty ) {
	add_filter( 'manage_' . $pty . '_columns', __NAMESPACE__ . '\\post_id_column' );
	add_filter( 'manage_' . $pty . '_custom_column', __NAMESPACE__ . '\\post_id_column_data', 10, 2 );
}


/**
 * Add post id to media list admin column
 *
 * @param array $columns Admin columns array.
 * @return array
 */
function post_id_column( array $columns ):array {
	$columns['col_id'] = __( 'ID', 'wps-prime' );
	return $columns;
}

/**
 * Map post id to column
 *
 * @param string $column_name Admin column id.
 * @param string $post_id WP_Post Id.
 * @return void
 */
function post_id_column_data( string $column_name, string $post_id ):void {
	if ( 'col_id' === $column_name ) {
		echo esc_html( $post_id );
	}
}

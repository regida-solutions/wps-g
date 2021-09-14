<?php
/**
 * Add information to admin columns
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Admin\Columns;

add_filter( 'manage_pages_columns', __NAMESPACE__ . '\\page_settings_columns' );
add_action( 'manage_pages_custom_column', __NAMESPACE__ . '\\page_settings_columns_content', 10, 2 );

/**
 * Add page specific custom fields data to admin columns
 *
 * @param array $columns Admin columns array.
 * @return array
 */
function page_settings_columns( array $columns ):array {
	$columns['title_visibility'] = __( 'Title status', 'wps-prime' );
	$columns['margin_top']       = __( 'Margin top', 'wps-prime' );
	$columns['margin_bottom']    = __( 'Margin bottom', 'wps-prime' );
	return $columns;
}

/**
 * Map data to columns
 *
 * @param string $column_name Admin column id.
 * @param string $post_id WP_Post Id.
 * @return void
 */
function page_settings_columns_content( string $column_name, string $post_id ):void {

	if ( 'title_visibility' === $column_name ) {
		$title_visibility = get_post_meta( $post_id, 'page_title_visibility', true );

		if ( 'hide' === $title_visibility ) {
			echo 'Hidden';
		} else {
			echo 'Visible';
		}
	}

	if ( 'margin_top' === $column_name ) {
		$margin_top = get_post_meta( $post_id, 'page_margin_top_reset', true );

		if ( 'show' === $margin_top ) {
			echo 'Yes';
		} else {
			echo 'No';
		}
	}

	if ( 'margin_bottom' === $column_name ) {
		$margin_bottom = get_post_meta( $post_id, 'page_margin_bottom_reset', true );

		if ( 'show' === $margin_bottom ) {
			echo 'Yes';
		} else {
			echo 'No';
		}
	}
}

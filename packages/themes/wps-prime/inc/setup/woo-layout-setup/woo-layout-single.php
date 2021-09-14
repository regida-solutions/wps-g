<?php
/**
 * Woocommerce single layout setup.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Woo\Layout\Single;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

add_action( 'woocommerce_before_main_content', __NAMESPACE__ . '\\woocommerce_single_setup', 10, 2 );

/**
 * Set up the product single view
 */
function woocommerce_single_setup() {

		// Check if the product data sections should be displayed in tabs or show all.
	if ( get_theme_mod( 'wps_woo_single_disable_data_tabs', false ) ) {

		// Single Product - Remove Tabs.
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

		// Add product description.
		add_action( 'woocommerce_after_single_product_summary', __NAMESPACE__ . '\\product_description' );

		// Add product characteristics.
		add_action( 'woocommerce_after_single_product_summary', __NAMESPACE__ . '\\product_characteristics' );

		// Reviews.
		add_action( 'woocommerce_after_single_product_summary', __NAMESPACE__ . '\\product_reviews' );

		/**
		* Remove "Description" Heading Title @ WooCommerce Single Product Tabs
		*/
		add_filter( 'woocommerce_product_description_heading', '__return_null' );
		add_filter( 'woocommerce_product_additional_information_heading', '__return_null' );
		add_filter( 'woocommerce_product_reviews_heading', '__return_null' );

	}

	// Pre content area.
	add_action( 'woocommerce_before_single_product', __NAMESPACE__ . '\\before_main_content' );

	/**
	* Additional possible settings
	* Product Single - Remove Sale Label
	* remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
 *
	* Single Product - Add Average Rating
	* remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
 *
	* Single Product - Add Short Description
	* remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
 *
	* Single Product - Remove Product Meta
	* remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
		*/

}

/**
 * The product description
 */
function product_description() {
	$content = apply_filters( 'the_content', get_the_content() );
	?>
		<div class="wc-single-product-description">
			<h2><?php esc_html_e( 'Product Description', 'wps-prime' ); ?></h2>
		<?php echo wp_kses_post( do_shortcode( $content ) ); ?>
		</div>
		<?php
}

/**
 * Render product characteristics
 */
function product_characteristics() {

	global $product;

	$formatted_attributes = [];

	$attributes = $product->get_attributes();
	foreach ( $attributes as $attr => $attr_deets ) {
		$attribute_label = wc_attribute_label( $attr );
		if ( isset( $attributes[ $attr ] ) || isset( $attributes[ 'pa_' . $attr ] ) ) {
			$attribute = isset( $attributes[ $attr ] ) ? $attributes[ $attr ] : $attributes[ 'pa_' . $attr ];
			if ( $attribute['is_taxonomy'] ) {
				$formatted_attributes[ $attribute_label ] = implode( ', ', wc_get_product_terms( $product->get_id(), $attribute['name'], [ 'fields' => 'names' ] ) );
			} else {
				$formatted_attributes[ $attribute_label ] = $attribute['value'];
			}
		}
	}
	?>
	<div class="wc-spsw-item wc-single-product-summary-wrapper-attributes">
		<h2><?php esc_html_e( 'Attributes', 'wps-prime' ); ?></h2>
		<div class="woo-table-responsive">
			<table class="woocommerce-product-attributes shop_attributes">
				<?php foreach ( $formatted_attributes as $key => $value ) : ?>
				<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--<?php echo esc_attr( $key ); ?>">
					<th class="woocommerce-product-attributes-item__label"><?php echo esc_attr( $key ); ?></th>
				<td class="woocommerce-product-attributes-item__value"><?php echo wp_kses_post( $key ); ?></td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
	<?php
}

/**
 * Return the product reviews
 */
function product_reviews() {
	get_template_part( 'woocommerce/single', 'product-reviews' );
}

/**
 *  Before product content area
 */
function before_main_content() {
	$content = get_option( 'wps_woo_single_header_start_area', false );
	if ( ! $content ) {
		return;
	}
	?>
		<div class="woo-pre-single-content">
			<div class="woo-pre-single-content__inner">
				<?php echo wp_kses_post( do_shortcode( $content ) ); ?>
			</div>
		</div>
		<?php
}

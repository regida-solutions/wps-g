<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

global $product;
$image_ids         = $product->get_gallery_image_ids() ? $product->get_gallery_image_ids() : [];
$post_thumbnail_id = $product->get_image_id() ? [ $product->get_image_id() ] : [];
$final_image_ids   = array_merge( $image_ids, $post_thumbnail_id );

?>
<?php if ( ! $product->get_image_id() ) : ?>

<div class="woo-single-image-gallery">
	<div class="woocommerce-product-gallery__image--placeholder">
		<img src="<?php echo esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ); ?>" alt="<?php esc_html_e( 'Awaiting product image', 'wps-prime' ); ?>" class="wp-post-image" />
	</div>
</div>
<?php else : ?>
<div class="woo-single-image-gallery">
	<div class="swiper-container wps-prime-woo-gallery-main">
		<div class="swiper-wrapper">
			<?php if ( $final_image_ids ) : ?>
				<?php foreach ( $final_image_ids as $image_id ) : ?>
					<?php
					$image      = wp_get_attachment_image_src( $image_id, 'woocommerce_single' );
					$image_full = wp_get_attachment_image_src( $image_id, 'full' );
					?>
					<div data-fancybox="wps-woo-product-gallery" data-src="<?php echo esc_url( $image_full[0] ); ?>" class="swiper-slide" style="background-image:url(<?php echo esc_url( $image[0] ); ?>)"></div>
			<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
	</div>
	<div class="swiper-container wps-prime-woo-gallery-thumbs">
		<div class="swiper-wrapper">
			<?php if ( $final_image_ids ) : ?>
				<?php foreach ( $final_image_ids as $image_id ) : ?>
					<?php
					$thumbnail_image = wp_get_attachment_image_src( $image_id, 'woocommerce_gallery_thumbnail' );
					?>
						<div class="swiper-slide" style="background-image:url(<?php echo esc_url( $thumbnail_image[0] ); ?>)"></div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php endif; ?>

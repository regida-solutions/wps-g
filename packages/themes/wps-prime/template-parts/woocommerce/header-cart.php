<?php
/**
 * Template part for theme woocommerce header utility.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

$class = is_cart() ? 'current-menu-item' : '';

?>

<div class="woo-head-utility-wrapper">
	<?php get_template_part( 'template-parts/woocommerce/header', 'user' ); ?>
	<ul id="site-header-cart" class="site-header-cart menu">
		<li class="<?php echo esc_attr( $class ); ?>">
			<?php get_template_part( 'template-parts/woocommerce/header', 'cart-link' ); ?>
		</li>
		<li>
			<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
		</li>
	</ul>
</div>

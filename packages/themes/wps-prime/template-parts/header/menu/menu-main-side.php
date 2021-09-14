<?php
/**
 * Theme Site Main Side Navigation
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}
?>

<nav id="c-slide-nav--slide-right"<?php wps_mobile_nav_class(); ?>>
<div class="c-slide-nav__nav-wrapper">
	<div class="c-slide-nav__close">
		<div class="side-nav-menu-toggler">
			<button id="c-slide-nav-toggler" class="c-slide-nav-close">
				<span class="c-slide-nav-toggler-label"><?php esc_html_e( 'MENU', 'wps-prime' ); ?></span>
				<span class="c-slide-nav-toggler-icon">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</span>
			</button>
		</div>
		</div>
	<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<?php
		wp_nav_menu( [
			'theme_location' => has_nav_menu( 'primary_mobile' ) ? 'primary_mobile' : 'primary',
			'menu_class'     => 'c-slide-nav__items',
			'walker'         => new WpsPrime\Menu\Walker\Side_Menu_Walker(),
		] );
		?>
	<?php endif; ?>
	<?php do_action( 'menu_main_side_end' ); ?>
	</div>
</nav>

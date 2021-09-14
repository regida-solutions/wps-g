<?php
/**
 * Theme Site Main Mega Menu Navigation
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

$menu_type      = get_theme_mod( 'main_menu_position', 'in_header' );
$site_nav_class = '';

if ( 'under_header' === $menu_type ) {
	$site_nav_class = ' site-nav-has-background-color';
}
?>

<div class="site-nav-mega-menu<?php echo esc_attr( $site_nav_class ); ?>">
	<nav id="site-nav"<?php wps_nav_class(); ?> data-ui-component="site-main-nav">
	<div class="site-nav-wrapper"><div class="o-wrapper">
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<?php
				wp_nav_menu( [
					'theme_location'  => 'primary',
					'menu_class'      => 'site-nav__list',
					'container_class' => 'site-nav__menu-container',
					'walker'          => new WpsPrime\Menu\Walker\Mega_Menu_Walker(),
				] );
				?>
			<?php endif; ?>
			</div>
	</div>
</nav><!-- #site-nav -->
</div>

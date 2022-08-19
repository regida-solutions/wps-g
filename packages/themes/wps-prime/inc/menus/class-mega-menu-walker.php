<?php
/**
 * Custom Mega Menu Walker
 * with BEM markup.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Menu\Walker;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

/**
 * Custom theme navigation Walker.
 */
class Mega_Menu_Walker extends \Walker_Nav_Menu {

	/**
	 * Starts the list of after the elements are added.
	 *
	 * @see Walker::end_lvl()
	 * @since 3.0.0
	 *
	 * @param mixed $output Passed by reference. Used to append additional content.
	 * @param int   $depth (default: 0) Depth of page. Used for padding.
	 * @param array $args (default: array()) Arguments.
	 * @return void
	 */
	public function start_lvl( &$output, $depth = 0, $args = [] ) { // phpcs:ignore NeutronStandard.Functions.TypeHint.NoArgumentType
		$indent = str_repeat( "\t", $depth );
		if ( 0 === $depth ) {
			$output .= "\n$indent<div class=\"site-nav__list site-nav__container sub-menu level-" . $depth . "\"><div class=\"site-nav__column\">\n";
		} else {
			$output .= "\n$indent<ul class=\"site-nav__list sub-menu level-" . $depth . "\">\n";
		}
	}

	/**
	 * Start the element output.
	 *
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @access public
	 * @param mixed $output Passed by reference. Used to append additional content.
	 * @param mixed $item Menu item data object.
	 * @param int   $depth (default: 0) Depth of menu item. Used for padding.
	 * @param array $args (default: array()) Arguments.
	 * @param int   $id (default: 0) Menu item ID.
	 * @return void
	 */
	public function start_el( &$output, $item, $depth = 0, $args = [], $id = 0 ) { // phpcs:ignore NeutronStandard.Functions.TypeHint.NoArgumentType
		global $wp_query;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$icon_start = '';
		$icon_end   = '';

		$item_tag = 'a';

		$icon_position_start = false;

		if ( get_post_meta( $item->ID, 'menu-item-wps-position-start', true ) ) {
			$icon_position_start = true;
		}

		$classes = empty( $item->classes ) ? [] : (array) $item->classes;

		$classes[] = 'site-nav__item';

		$icon_class = get_post_meta( $item->ID, 'menu-item-wps-icon-class', true );

		// Call to action.
		if ( get_post_meta( $item->ID, 'menu-item-wps-ca-style-one', true ) === 'true' ) {
			$classes[] = 'menu-item--ca';
			$classes[] = 'menu-item--ca-style-one';
		}
		if ( get_post_meta( $item->ID, 'menu-item-wps-ca-style-two', true ) === 'true' ) {
			$classes[] = 'menu-item--ca';
			$classes[] = 'menu-item--ca-style-two';
		}

		// Align.
		if ( get_post_meta( $item->ID, 'menu-item-wps-align-right', true ) === 'true' ) {
			$classes[] = 'menu-item--align-right';
		}

		// Menu item icon.
		if ( $icon_class ) {
			$classes[] = 'menu-item--use-icon';

			$icon_type = get_post_meta( $item->ID, 'menu-item-wps-icon-type', true );

			$icon_block = [
				'blockName' => 'wps/icon',
				'attrs'     => [
					'icon'      => $icon_class,
					'type'      => $icon_type,
					'className' => 'menu-item-icon',
				],
			];

			$icon = \render_block( $icon_block );

			if ( $icon_position_start ) {
				$icon_start = $icon . ' ';
			} else {
				$icon_end = ' ' . $icon;
			}
		}

		// Check if the item is marked as call to action.
		if ( 0 === $depth ) {
			if ( 'true' === get_post_meta( $item->ID, 'menu-item-wps-enable-mega-menu', true ) ) {
				$classes[] = 'mega-menu-enabled';
			}
		}

		// Check if menu is set to behave like a submenu open trigger.
		if ( 'true' === get_post_meta( $item->ID, 'menu-item-wps-submenu-opener', true ) ) {
			$classes[] = 'menu-item--show-submenu';
		}

		if ( 1 === $depth ) {
			$classes[] = 'site-nav__column-item-list';
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );

		$css_class = ' class="' . esc_attr( $class_names ) . '"';

		if ( 1 === $depth ) {
			$output .= $indent . '<div id="main-menu-item-' . $item->ID . '"' . $css_class . '>';
		} else {
			$output .= $indent . '<li id="main-menu-item-' . $item->ID . '"' . $css_class . '>';
		}

		$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

		$item_output  = ! empty( $args->before ) ? $args->before : '';
		$item_output .= '<' . $item_tag . ' class="site-nav__link" ' . $attributes . '>';
		$item_output .= ! empty( $args->link_before ) ? $args->link_before : '';
		$item_output .= $icon_start;
		$item_output .= apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= $icon_end;
		$item_output .= ! empty( $args->link_after ) ? $args->link_after : '';
		$item_output .= '</' . $item_tag . '>';
		$item_output .= ! empty( $args->after ) ? $args->after : '';

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * Ends the element output, if needed.
	 *
	 * @see Walker::end_el()
	 * @since 3.0.0
	 *
	 * @access public
	 * @param mixed $output Passed by reference. Used to append additional content.
	 * @param mixed $item Menu item data object.
	 * @param int   $depth (default: 0) Depth of menu item. Used for padding.
	 * @param array $args (default: array()) Arguments.
	 * @return void
	 */
	public function end_el( &$output, $item, $depth = 0, $args = [] ) { // phpcs:ignore NeutronStandard.Functions.TypeHint.NoArgumentType
		$layout_break = '';
		if ( 'true' === get_post_meta( $item->ID, 'menu-item-wps-mega-divider', true ) && 1 === $depth ) {
			$layout_break = '</div><div class="site-nav__column">';
		}

		if ( 1 === $depth ) {
			$output .= '</div>' . $layout_break;
		} else {
			$output .= '</li>';
		}
	}

	/**
	 * Ends the list of after the elements are added.
	 *
	 * @see Walker::end_lvl()
	 *
	 * @since 3.0.0
	 *
	 * @access public
	 * @param mixed $output Passed by reference. Used to append additional content.
	 * @param int   $depth (default: 0) Depth of page. Used for padding.
	 * @param array $args (default: array()) Arguments.
	 * @return void
	 */
	public function end_lvl( &$output, $depth = 0, $args = [] ) { // phpcs:ignore NeutronStandard.Functions.TypeHint.NoArgumentType
		$indent = str_repeat( "\t", $depth );

		if ( 0 === $depth ) {
			$output .= "$indent</div></div>\n";
		} else {
			$output .= "$indent</ul>\n";
		}
	}
}

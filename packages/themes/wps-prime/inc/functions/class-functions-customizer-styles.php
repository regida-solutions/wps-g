<?php
/**
 * Map customizer settings to front end css.
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Functions\Customizer\Styles;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}


/**
 * Process customizer data.
 */
class Functions_Customizer_Styles {

	/**
	 * Class instance
	 *
	 * @var object $instance
	 */
	private static $instance;

	/**
	 * Singleton initialize
	 *
	 * @return self
	 */
	public static function get_instance():self {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Run CSS styles.
	 */
	private function __construct() {

		add_action( 'wp_enqueue_scripts', [ $this, 'customizer_style' ] );
		add_action( 'enqueue_block_editor_assets', [ $this, 'customizer_editor_style' ] );

	}

	/**
	 * Process customizer options into valid CSS
	 *
	 * @return string
	 */
	private function generate_styles():string {

		$style_list   = '';
		$settings_woo = [];

		$header_bg         = get_theme_mod( 'wps_header_background_sticky', '#000000' );
		$header_bg_opacity = get_theme_mod( 'wps_header_background_sticky_opacity', '0.8' );

		$settings_theme = [
			// Theme.
			'--text-color-heading'            => 'wps_text_color_heading',
			'--text-color-body'               => 'wps_text_color_body',
			'--text-color-link'               => 'wps_text_color_link',
			'--header-background'             => 'wps_header_background',
			'--main-nav-background-color'     => 'wps_mega_menu_background',
			'--main-nav-text-color'           => 'wps_main_nav_text_color',
			'--main-nav-side-text-color'      => 'wps_main_side_nav_text_color',
			'--main-nav-side-background'      => 'wps_main_side_nav_background_color',
			'--main-nav-sticky-text-color'    => 'wps_main_nav_sticky_text_color',
			'--main-nav-text-color-h'         => 'wps_main_nav_text_color_h',
			'--main-nav-text-color-a'         => 'wps_main_nav_text_color_active',
			'--main-nav-submenu-text-color'   => 'wps_main_nav_submenu_text_color',
			'--main-nav-submenu-text-color-h' => 'wps_main_nav_submenu_text_color_h',
			'--main-nav-submenu-text-color-a' => 'wps_main_nav_submenu_text_color_active',
			'--main-nav-submenu-background'   => 'wps_main_submenu_background',
			'--main-nav-ca-one-color'         => 'wps_main_nav_ca_one_color',
			'--main-nav-ca-two-color'         => 'wps_main_nav_ca_two_color',
			'--main-nav-ca-text-color'        => 'wps_main_nav_ca_text_color',
			'--head-utility-color'            => 'wps_main_nav_utility_color',
			'--head-utility-color-h'          => 'wps_main_nav_utility_color_h',
			'--footer-heading-color'          => 'wps_footer_heading_color',
			'--footer-text-color'             => 'wps_footer_text_color',
			'--footer-link-color'             => 'wps_footer_link_color',
			'--footer-background-color'       => 'wps_footer_background_color',
			'--footer-micro-background-color' => 'wps_footer_micro_background_color',
		];

		if ( \WpsPrime\Helpers\Woocommerce\is_woocommerce_activated() ) {
			$settings_woo = [
				'--woo-head-utility-symbol-color'       => 'wps_woo_header_utility_icons_color',
				'--woo-head-cart-count-text-color'      => 'wps_woo_header_utility_count_color',
				'--woo-head-cart-count-background'      => 'wps_woo_header_utility_count_background',
				'--woo-head-utility-text-color'         => 'wps_woo_header_utility_color',
				'--woo-head-utility-text-color-light'   => 'wps_woo_header_utility_color_light',
				'--woo-head-utility-background'         => 'wps_woo_header_utility_background',
				'--woo-head-utility-background-h'       => 'wps_woo_header_utility_background_hover',
				'--woo-head-utility-background-dark'    => 'wps_woo_header_utility_background_dark',
				'--woo-color-primary'                   => 'wps_woo_color_primary',
				'--woo-color-highlight'                 => 'wps_woo_color_highlight',
				'--woo-color-on-sale-background'        => 'wps_woo_background_on_sale',
				'--woo-color-on-sale-color'             => 'wps_woo_color_on_sale',
				'--woo-color-out-of-stock'              => 'wps_woo_color_out_of_stock',
				'--woo-color-price'                     => 'wps_woo_color_price',
				'--woo-background-payment-checkout'     => 'wps_woo_background_payment',
				'--woo-payment-box-background'          => 'wps_woo_background_payment_box',
				'--woo-star-rating-color'               => 'wps_woo_star_rating_color',
				'--woo-message-bar-color'               => 'wps_woo_message_bar_color',
				'--woo-message-bar-background'          => 'wps_woo_message_bar_background',
				'--woo-message-bar-theme-default-color' => 'wps_woo_message_bar_theme_default_color',
				'--woo-message-bar-theme-info-color'    => 'wps_woo_message_bar_theme_info_color',
				'--woo-message-bar-theme-error-color'   => 'wps_woo_message_bar_theme_error_color',
			];
		}

		$settings = array_merge( $settings_theme, $settings_woo );

		foreach ( $settings as $var => $option ) {
			$style_list .= self::generate_css_var( $var, $option, false );
		}

		// Custom scenarios.
		$style_list .= '--header-background-sticky:' . $this->hex2rgba( $header_bg, $header_bg_opacity ) . ';';
		$style_list .= '--header-background-sticky-h:' . $this->hex2rgba( $header_bg, '1' ) . ';';
		$style_list .= $this->generate_css_var_hex( '--main-nav-ca-one-color-h', 'wps_main_nav_ca_one_color', false );
		$style_list .= $this->generate_css_var_hex( '--main-nav-ca-two-color-h', 'wps_main_nav_ca_two_color', false );

		return sprintf( ':root {%s}', $style_list );
	}

	/**
	 * Add styles to front end header
	 */
	public function customizer_style():void {
		wp_add_inline_style( 'wps-prime', $this->generate_styles() );
	}
	/**
		* Add styles to editor
		*/
	public function customizer_editor_style():void {
		wp_add_inline_style( 'wps-prime-editor', $this->generate_styles() );
	}


	/**
	 * Generate CSS compatible string from theme mod
	 *
	 * @param string $var_name  CSS variable name.
	 * @param string $mod_name  Customizer theme_mod id.
	 * @param bool   $echo  Echo or return.
	 *
	 * @return string
	 */
	private function generate_css_var( string $var_name, string $mod_name, bool $echo ):string {
		$return = '';
		$mod    = get_theme_mod( $mod_name );
		if ( ! empty( $mod ) ) {
			$return = sprintf(
				'%s:%s;',
				$var_name,
				$mod
			);
			if ( $echo ) {
				echo esc_html( $return );
			}
		}
		return esc_html( $return );
	}

	/**
	 * Helper function to generate CSS expressions (--var:hex;)
	 *
	 * @param string $var_name  CSS variable name.
	 * @param string $mod_name  Customizer theme_mod id.
	 * @param bool   $echo  Echo or return.
	 * @param string $modifier Opacity modifier.
	 *
	 * @return string
	 */
	private function generate_css_var_hex( string $var_name, string $mod_name, bool $echo, string $modifier = '-0.2' ):string {
		$return     = '';
		$mod        = get_theme_mod( $mod_name );
		$luminosity = get_theme_mod( 'wps_button_color_hover_modifier', $modifier );

		if ( ! empty( $mod ) ) {
			$return = sprintf(
				'%s:%s;',
				$var_name,
				$this->luminance( $mod, $luminosity )
			);
			if ( $echo ) {
				echo esc_html( $return );
			}
		}
		return esc_html( $return );
	}

	/**
	 * Helper function to calculate from one hex value its counterpart with adjusted luminance.
	 *
	 * @param string $hex CSS hex color code.
	 * @param string $percent Luminance value %.
	 *
	 * @return string
	 */
	private function luminance( string $hex, string $percent ):string {
		// Validate hex string.
		$hex     = preg_replace( '/[^0-9a-f]/i', '', $hex );
		$new_hex = '#';

		if ( strlen( $hex ) < 6 ) {
			$hex = $hex[0] + $hex[0] + $hex[1] + $hex[1] + $hex[2] + $hex[2];
		}
		// Convert to decimal and change luminosity.
		for ( $i = 0; $i < 3; $i++ ) {
			$dec      = hexdec( substr( $hex, $i * 2, 2 ) );
			$dec      = min( max( 0, $dec + $dec * $percent ), 255 );
			$new_hex .= str_pad( dechex( $dec ), 2, '0', STR_PAD_LEFT );
		}
		return esc_html( $new_hex );
	}

	/**
	 * Convert hexdec color string to rgb(a) string
	 * If we want make opacity, we have to convert hexadecimal into rgb(a), because WordPress customizer give to us hexadecimal colour
	 *
	 * @link https://mekshq.com/how-to-convert-hexadecimal-color-code-to-rgb-or-rgba-using-php/
	 *
	 * @param string $color Hex color.
	 * @param string $opacity Float between 0 and 1.
	 */
	private function hex2rgba( string $color, string $opacity ):string {
		$default = 'rgb( 0, 0, 0 )';
		/**
			* Return default if no color provided
			*/
		if ( empty( $color ) ) {
			return esc_html( $default );
		}

		/**
			* Sanitize $color if "#" is provided
			*/
		if ( '#' === $color[0] ) {
			$color = substr( $color, 1 );
		}

		/**
			* Check if color has 6 or 3 characters and get values
			*/
		if ( 6 === strlen( $color ) ) {
			$hex = [ $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] ];
		} elseif ( 3 === strlen( $color ) ) {
			$hex = [ $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] ];
		} else {
			return esc_html( $default );
		}

		/**
			* [$rgb description]
			*
			* @var array
			*/
		$rgb = array_map( 'hexdec', $hex );

		/**
			* Check if opacity is set(rgba or rgb)
			*/

		if ( null !== $opacity ) {
			if ( abs( $opacity ) > 1 ) {
				$opacity = 1.0;
			}
			$output = 'rgba( ' . implode( ',', $rgb ) . ',' . $opacity . ' )';
		} else {
			$output = 'rgb( ' . implode( ',', $rgb ) . ' )';
		}

		/**
			* Return rgb(a) color string
			*/
		return esc_html( $output );
	}
}

Functions_Customizer_Styles::get_instance();

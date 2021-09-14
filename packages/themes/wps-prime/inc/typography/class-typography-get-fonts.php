<?php
/**
 * Typography front-end generator class
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Typography;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

/**
 * Call theme font list
 *
 * @example $theme_fonts = new Typography_Get_Fonts;
 * @example $list_fonts = $theme_fonts->get_fonts();
 * @example $list_fonts = $theme_fonts->get_fonts_name();
 */
class Typography_Get_Fonts {
	/**
	 * Need to implement the following check before this class executes
	 *
	 * @todo 'return !empty($this->font_list) ? $this->font_list : array('no fonts defined');'
	 */

	/**
	 * Store the font definition list.
	 *
	 * @var array $font_list  Font list.
	 */
	private $font_list;


	/**
	 * Store the font names list.
	 *
	 * @var array $font_name_list  Font names.
	 */
	private $font_name_list = [];

	/**
	 * Run font list generate
	 */
	public function __construct() {
		$this->font_list = Typography_Register_Fonts::get_instance()->return_font_list();
	}

	/**
	 * Return a multidimensional array of fonts available
	 *
	 * @return array
	 */
	public function get_fonts():array {
		return $this->font_list;
	}

	/**
	 * Return a simple array of fonts names available
	 *
	 * @return array
	 */
	public function get_fonts_name(): ?array {

		foreach ( $this->font_list as $key => $font ) {
			$this->font_name_list[ $key ] = $font['family'] . ' (' . $font['type'] . ' / ' . $font['weights'] . ')';
		}
		return $this->font_name_list;
	}

	/**
	 * Generate font url list
	 *
	 * @return array
	 */
	public function get_theme_fonts_link():array {

		$theme_fonts = $this->get_fonts(); // Get registered fonts.

		$font_main   = get_theme_mod( 'wps_main_font_family' );// Get selected font family option.
		$font_second = get_theme_mod( 'wps_secondary_font_family' ); // Get selected font family option.

		// Prepare font.
		$font_main_prep   = false;
		$font_second_prep = false;
		$display          = esc_attr( '&display=swap' );

		$font_main_prep = $theme_fonts[ $font_main ]['url'];

		// If no second font bail out early.
		if ( ! get_theme_mod( 'wps_second_font_family_status' ) ) {
			return [ $font_main_prep ];
		}

		// Setup second font.
		$font_second_prep = str_replace( 'https://fonts.googleapis.com/css2?family=', esc_attr( '&family=' ), $theme_fonts[ $font_second ]['url'] );

		// Prepare return cases.
		// If the same font is selected send it in one call.
		if ( $font_main === $font_second ) {
			return [ $theme_fonts[ $font_main ]['url'] ];
		}

		// Fonts are from the same api we can concatenate in one call.
		// Fonts are NOT from the same api we send fonts url separately.
		$output = [];

		$font_string = sprintf(
			'%s%s%s',
			$font_main_prep,
			$font_second_prep,
			$display
		);

		return [ $font_string ];
	}

	/**
	 * Generate fonts for front-end
	 *
	 * @return string
	 */
	public function get_theme_font_style():string {

		$theme_fonts = $this->get_fonts(); // Get registered fonts.

		$font_main          = get_theme_mod( 'wps_main_font_family' );
		$font_second        = get_theme_mod( 'wps_secondary_font_family' );
		$font_second_status = get_theme_mod( 'wps_second_font_family_status', false );
		$font_main_weight   = get_theme_mod( 'wps_main_font_weight', 400 );
		$font_second_weight = get_theme_mod( 'wps_second_font_weight', 600 );

		$style = '';

		$fonts = [];

		// If font one is set.
		if ( $font_main ) {

			if ( 'empty' !== $font_main ) {
				$fonts[] = [
					'selector' => '--theme-font-one',
					'value'    => '\'' . $theme_fonts[ $font_main ]['family'] . '\',' . $theme_fonts[ $font_main ]['type'],
				];
				$fonts[] = [
					'selector' => '--theme-font-one-weight',
					'value'    => $font_main_weight,
				];
			}
		}

		// If font secondary is set and activated and is not the same as font main.
		if ( $font_second_status && $font_second !== $font_main ) {
			$fonts[] = [
				'selector' => '--theme-font-two',
				'value'    => '\'' . $theme_fonts[ $font_second ]['family'] . '\',' . $theme_fonts[ $font_second ]['type'],
			];
			$fonts[] = [
				'selector' => '--theme-font-two-weight',
				'value'    => $font_second_weight,
			];
		}

		foreach ( $fonts as $font ) {
			$style .= $font['selector'] . ':' . $font['value'] . ';';
		}

		// Navigation has heading font.
		if ( get_theme_mod( 'wps_nav_custom_font', false ) ) {
			$style .= '--menu-font:var(--theme-font-two,var(--theme-font-one));';
		}

		if ( $style ) {
			return ':root{' . $style . '}';
		} else {
			return '';
		}
	}
}

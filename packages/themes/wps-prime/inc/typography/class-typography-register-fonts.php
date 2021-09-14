<?php
/**
 * Typography generator class
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Typography;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

/**
 *  Class to generate a list of fonts (add/remove)
 *  We need the list to be accessible globally (Singleton approach)
 *
 * @example $font = Typography_Register_Fonts::get_instance();
 * @example $font->register_fonts(array(array('family' => 'Open Sans','type'   => 'sans-serif','url'    => 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800',)));
 * @example $fontChild = Typography_Register_Fonts::get_instance();
 * @example $fontChild ->remove_font('Open Sans');
 */
class Typography_Register_Fonts {

	/**
	 * Store the font definition list.
	 *
	 * @var array $font_list  Font list.
	 */
	private $font_list = [];

	/**
	 * Singleton instance.
	 *
	 * @var self $instance singleton instance.
	 */
	private static $instance;

	/**
	 * Generate an instance of the typography generator
	 *
	 * @return self Set up the singleton instance.
	 */
	public static function get_instance():self {
		if ( empty( self::$instance ) ) {
			self::$instance = new Typography_Register_Fonts();
		}
		return self::$instance;
	}

	/**
	 * Create font definition array
	 *
	 * @param array $font Font family record [family | type | url].
	 * @return array
	 */
	private function add_font( array $font ):array {

		$font_id = strtolower( preg_replace( '/\s*/', '', $font['family'] ) );

		$this->font_list[ $font_id ] = $font;

		return $this->font_list;
	}

	/**
	 * Process font definition list
	 *
	 * @param array $fonts List of registered fonts.
	 * */
	public function register_fonts( array $fonts ):void {

		foreach ( $fonts as $font ) {

			// make sure we have all values and defaults.
			$item = [
				'family'  => $font['family'] ? $font['family'] : false,
				'type'    => $font['type'] ? $font['type'] : 'sans-serif',
				'url'     => $font['url'] ? $font['url'] : false,
				'weights' => $font['weights'] ? $font['weights'] : false,
			];

			$this->add_font( $item );
		}
	}

	/**
	 * Function to remove a font from font definition array using font name
	 * Run a foreach to search for font family name in a multi-array
	 * If found unset the single font definition array from the multi-array
	 *
	 * @param string $font_name Font family name ex. 'Raleway'.
	 * @example $font = Typography_Register_Fonts::get_instance(); $font->remove_font('Raleway');
	 */
	public function remove_font( string $font_name ):void {

		$fonts = $this->font_list;

		foreach ( $fonts as $key => $single_font ) {
			if ( in_array( $font_name, $single_font, true ) ) {
				unset( $fonts[ $key ] );
			}
		}

		$this->font_list = $fonts;
	}

	/**
	 * Function to get the font list
	 *
	 * @return array List of fonts.
	 */
	public function return_font_list():array {
		return $this->font_list;
	}
}

/**
 * Wrapper function to init font administration.
 * */
function fonts_setup():object {
	return Typography_Register_Fonts::get_instance();
}

<?php
/**
 * Theme font list definition setup
 *
 * @package WpsPrime
 */

declare( strict_types=1 );

namespace WpsPrime\Setup\Fonts;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}
/**
 * Generate fonts with npm package: google-font-downloader
 *
 * @url https://www.npmjs.com/package/google-font-downloader
 * # Using npm
 * npm install --global google-font-downloader
 * command: google-font-downloader 'https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900'
 */

/* Sans-Sherif */
$fonts = [
	// Source 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800'.
	[
		'family'  => 'Open Sans',
		'type'    => 'sans-serif',
		'url'     => THEME_URI . '/assets/font-packs/open-sans.css',
		'weights' => '300,400,600,700,800',
	],
	// Source 'https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400;500;600;700;800;900'.
	[
		'family'  => 'Raleway',
		'type'    => 'sans-serif',
		'url'     => THEME_URI . '/assets/font-packs/raleway.css',
		'weights' => '200,300,400,500,600,700,800,900',
	],
	// Source 'https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900'.
	[
		'family'  => 'Lato',
		'type'    => 'sans-serif',
		'url'     => THEME_URI . '/assets/font-packs/lato.css',
		'weights' => '100,300,400,700,900',

	],
	// Source 'https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900'.
	[
		'family'  => 'Roboto',
		'type'    => 'sans-serif',
		'url'     => THEME_URI . '/assets/font-packs/roboto.css',
		'weights' => '100,300,400,500,600,700,900',

	],
	// Source: 'https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900'.
	[
		'family'  => 'Source Sans Pro',
		'type'    => 'sans-serif',
		'url'     => THEME_URI . '/assets/font-packs/source-sans-pro.css',
		'weights' => '100,300,400,500,600,700,900',
	],
	// Source 'https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700'.
	[
		'family'  => 'PT Sans',
		'type'    => 'sans-serif',
		'url'     => THEME_URI . '/assets/font-packs/pt-sans.css',
		'weights' => '400,700',
	],
	// Source 'https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800'.
	[
		'family'  => 'Dosis',
		'type'    => 'sans-serif',
		'url'     => THEME_URI . '/assets/font-packs/dosis.css',
		'weights' => '200,300,400,500,600,700,800',
	],
	// Source 'https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900'.
	[
		'family'  => 'Nunito',
		'type'    => 'sans-serif',
		'url'     => THEME_URI . '/assets/font-packs/nunito.css',
		'weights' => '200,300,400,600,700,800,900',
	],
	// Source: 'https://fonts.googleapis.com/css2?family=Mulish:wght@200;300;400;500;600;700;800;900'.
	[
		'family'  => 'Mulish',
		'type'    => 'sans-serif',
		'url'     => THEME_URI . '/assets/font-packs/mulish.css',
		'weights' => '200,300,400,500,600,700,800,900',
	],
	// Source: 'https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900'.
	[
		'family'  => 'Montserrat',
		'type'    => 'sans-serif',
		'url'     => THEME_URI . '/assets/font-packs/montserrat.css',
		'weights' => '100,200,300,400,500,600,700,800,900',
	],
	// Source: 'https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900'.
	[
		'family'  => 'Poppins',
		'type'    => 'sans-serif',
		'url'     => THEME_URI . '/assets/font-packs/poppins.css',
		'weights' => '100,200,300,400,500,600,700,800,900',
	],
	// Source: 'https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;300;400;500;600;700;900'.
	[
		'family'  => 'Work Sans',
		'type'    => 'sans-serif',
		'url'     => THEME_URI . '/assets/font-packs/work-sans.css',
		'weights' => '200,300,400,500,600,700,900',
	],
	// Source 'https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900'.
	[
		'family'  => 'Inter',
		'type'    => 'sans-serif',
		'url'     => THEME_URI . '/assets/font-packs/inter.css',
		'weights' => '200,300,400,500,600,700,800,900',
	],
	// Source 'https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900'.
	[
		'family'  => 'Rubik',
		'type'    => 'sans-serif',
		'url'     => THEME_URI . '/assets/font-packs/rubik.css',
		'weights' => '300,400,500,600,700,800,900',
	],
	// Source: 'https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900'.
	[
		'family'  => 'Catamaran',
		'type'    => 'sans-serif',
		'url'     => THEME_URI . '/assets/font-packs/catamaran.css',
		'weights' => '100,200,300,400,500,600,700,800,900',
	],
	// Source 'https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700'.
	[
		'family'  => 'Cabin',
		'type'    => 'sans-serif',
		'url'     => THEME_URI . '/assets/font-packs/cabin.css',
		'weights' => '400,500,600,700',
	],
	// Source 'https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700'.
	[
		'family'  => 'Josefin Sans',
		'type'    => 'sans-serif',
		'url'     => THEME_URI . '/assets/font-packs/josefin-sans.css',
		'weights' => '100,200,300,400,500,600,700',
	],
	// Source 'https://fonts.googleapis.com/css2?family=Exo+2:wght@100;200;300;400;500;600;700;800;900'.
	[
		'family'  => 'Exo 2',
		'type'    => 'sans-serif',
		'url'     => THEME_URI . '/assets/font-packs/exo-2.css',
		'weights' => '100,200,300,400,500,600,700,800,900',
	],
	// Source 'https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200;300;400;600;700;900'.
	[
		'family'  => 'Titillium Web',
		'type'    => 'sans-serif',
		'url'     => THEME_URI . '/assets/font-packs/titillium-web.css',
		'weights' => '200,300,400,600,700,900',
	],
	// Source: 'https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;200;300;400;500;600;700'.
	[
		'family'  => 'Roboto Mono',
		'type'    => 'monospace',
		'url'     => THEME_URI . '/assets/font-packs/roboto-mono.css',
		'weights' => '100,200,300,400,500,600,700',
	],
	// Source: 'https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700'.
	[
		'family'  => 'Oswald',
		'type'    => 'sans-serif',
		'url'     => THEME_URI . '/assets/font-packs/oswald.css',
		'weights' => '200,300,400,500,600,700',
	],
	// Source: 'https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700'.
	[
		'family'  => 'Quicksand',
		'type'    => 'sans-serif',
		'url'     => THEME_URI . '/assets/font-packs/quicksand.css',
		'weights' => '300,400,500,600,700',
	],


	/* Sherif */

	// Source: 'https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900'.
	[
		'family'  => 'Merriweather',
		'type'    => 'serif',
		'url'     => THEME_URI . '/assets/font-packs/merriweather.css',
		'weights' => '300,400,700,900',
	],
	// Source: 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900'.
	[
		'family'  => 'Playfair Display',
		'type'    => 'serif',
		'url'     => THEME_URI . '/assets/font-packs/playfair-display.css',
		'weights' => '400,500,600,700,800,900',
	],
	// Source: 'https://fonts.googleapis.com/css2?family=Josefin+Slab:wght@100;300;400;600;700'.
	[
		'family'  => 'Josefin Slab',
		'type'    => 'serif',
		'url'     => THEME_URI . '/assets/font-packs/josefin-slab.css',
		'weights' => '100,300,400,600,700',
	],
	// Source: 'https://fonts.googleapis.com/css2?family=Trirong:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900'.
	[
		'family'  => 'Trirong',
		'type'    => 'serif',
		'url'     => THEME_URI . '/assets/font-packs/trirong.css',
		'weights' => '100,200,300,400,500,600,700,800,900',
	],
	// Source: 'https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700'.
	[
		'family'  => 'Cormorant',
		'type'    => 'serif',
		'url'     => THEME_URI . '/assets/font-packs/cormorant.css',
		'weights' => '300,400,500,600,700',
	],
	// Source: 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700'.
	[
		'family'  => 'Cormorant Garamond',
		'type'    => 'serif',
		'url'     => THEME_URI . '/assets/font-packs/cormorant-garamond.css',
		'weights' => '300,400,500,600,700',
	],
	// Source: 'https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400'.
	[
		'family'  => 'Libre Baskerville',
		'type'    => 'serif',
		'url'     => THEME_URI . '/assets/font-packs/libre-baskerville.css',
		'weights' => '400,700',
	],
	// Source: 'https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900'.
	[
		'family'  => 'Roboto Slab',
		'type'    => 'serif',
		'url'     => THEME_URI . '/assets/font-packs/roboto-slab.css',
		'weights' => '100,200,300,400,500,600,700,800,900',
	],
	// Source: 'https://fonts.googleapis.com/css2?family=Hepta+Slab:wght@100;200;300;400;500;600;700;800;900'.
	[
		'family'  => 'Hepta Slab',
		'type'    => 'serif',
		'url'     => THEME_URI . '/assets/font-packs/hepta-slab.css',
		'weights' => '100,200,300,400,500,600,700,800,900',
	],
	// Source: 'https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700'.
	[
		'family'  => 'Lora',
		'type'    => 'serif',
		'url'     => THEME_URI . '/assets/font-packs/lora.css',
		'weights' => '400,500,600,700',
	],

	/* Cursive */

	// Source: 'https://fonts.googleapis.com/css2?family=Expletus+Sans:wght@400;500;600;700'.
	[
		'family'  => 'Expletus Sans',
		'type'    => 'cursive',
		'url'     => THEME_URI . '/assets/font-packs/expletus-sans.css',
		'weights' => '400,500,600,700',
	],
	// Source: 'https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700'.
	[
		'family'  => 'Dancing Script',
		'type'    => 'cursive',
		'url'     => THEME_URI . '/assets/font-packs/dancing-script.css',
		'weights' => '400,500,600,700',
	],
	// Source: 'https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@100;200;300;400;500;700;800;900'.
	[
		'family'  => 'Arima Madurai',
		'type'    => 'cursive',
		'url'     => THEME_URI . '/assets/font-packs/arima-madurai.css',
		'weights' => '100,200,300,400,500,700,800,900',
	],
	// Source: 'https://fonts.googleapis.com/css2?family=Lemonada:wght@300;400;500;600;700'.
	[
		'family'  => 'Lemonada',
		'type'    => 'cursive',
		'url'     => THEME_URI . '/assets/font-packs/lemonada.css',
		'weights' => '300,400,500,600,700',
	],
];

// Add fonts.
\WpsPrime\Typography\fonts_setup()->register_fonts( $fonts );

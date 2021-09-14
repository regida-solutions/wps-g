/**
 * External dependencies
 */
const atImport = require( 'postcss-import' );
const autoprefixer = require( 'autoprefixer' );
const cssnano = require( 'cssnano' );
const customMedia = require( 'postcss-custom-media' );
const minmax = require( 'postcss-media-minmax' );
const nested = require( 'postcss-nested' );
const postcssFlexbugsFixes = require( 'postcss-flexbugs-fixes' );
const mixins = require( 'postcss-mixins' );
const extend = require( 'postcss-extend-rule' );

module.exports = ( ctx ) => {
	const config = {
		syntax: 'postcss-scss',
		plugins: [
			atImport(),
			mixins,
			extend,
			postcssFlexbugsFixes,
			nested,
			customMedia(),
			minmax(),
			autoprefixer,
		],
	};

	if ( ctx.env === 'production' ) {
		config.plugins.push( cssnano() );
	}

	return config;
};

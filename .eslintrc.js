module.exports = {
	extends: [ 'plugin:@wordpress/eslint-plugin/recommended' ],
	globals: {
		wp: 'off',
	},
	rules: {
		'@wordpress/no-unsafe-wp-apis': 'error',
		'react/react-in-jsx-scope': 'off',
		'react/jsx-pascal-case': 'off',
		'react/jsx-props-no-spreading': 'off',
		'no-undefined': 'off',
		'import/no-unresolved': [
			'error',
			{
				ignore: [ '@wordpress' ],
			},
		],
		'jsx-a11y/media-has-caption': 'off',
	},
};

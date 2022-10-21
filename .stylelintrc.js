module.exports = {
	extends: ['@dekode/stylelint-config'],
	ignoreFiles: [
		'packages/themes/wps-prime/assets/font-packs/**/*.css',
		'packages/plugins/wps-icon/assets/css/*.css',
	],
	rules: {
		'at-rule-no-unknown': [
			true,
			{
				ignoreAtRules: ['extend', 'mixin', 'define-mixin', 'include'],
			},
		],
	},
};

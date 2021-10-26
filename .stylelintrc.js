module.exports = {
	extends: ['@dekode/stylelint-config'],
	rules: {
		'at-rule-no-unknown': [
			true,
			{
				ignoreAtRules: ['extend', 'mixin', 'define-mixin', 'include'],
			},
		],
	},
};

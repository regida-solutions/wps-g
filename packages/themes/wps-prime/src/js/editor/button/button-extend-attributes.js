/**
 * WordPress dependencies
 */
import { addFilter } from '@wordpress/hooks';

function addAttributes(settings, name) {
	if (name !== 'core/button') {
		return settings;
	}

	settings.attributes = Object.assign(settings.attributes, {
		buttonColor: {
			type: 'string',
		},
	});

	return settings;
}

addFilter(
	'blocks.registerBlockType',
	'wps-prime/custom-attributes',
	addAttributes,
);

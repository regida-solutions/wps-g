/**
 * WordPress dependencies
 */
import { addFilter } from '@wordpress/hooks';

function addAttributes(settings, name) {
	if ('core/button' !== name) {
		return settings;
	}

	settings.attributes = Object.assign(settings.attributes, {
		color: {
			type: 'string',
		},
	});

	return settings;
}

addFilter(
	'blocks.registerBlockType',
	'wps/applyExtraButtonAttributes',
	addAttributes,
);

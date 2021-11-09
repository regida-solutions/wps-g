/**
 * WordPress dependencies
 */
import { addFilter } from '@wordpress/hooks';

/**
 * Internal dependencies
 */
import allowedBlocks from './allowed-blocks';

function addAttributes(settings, name) {
	if (!allowedBlocks.includes(name)) {
		return settings;
	}

	settings.attributes = Object.assign(settings.attributes, {
		marginTop: {
			type: 'string',
		},
		marginBottom: {
			type: 'string',
		},
	});
	return settings;
}

addFilter(
	'blocks.registerBlockType',
	'wps/applyExtraSpacingAttributes',
	addAttributes,
);

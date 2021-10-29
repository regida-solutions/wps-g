/**
 * WordPress dependencies
 */
import { addFilter } from '@wordpress/hooks';
import { createHigherOrderComponent } from '@wordpress/compose';

/**
 * External dependencies
 */
import classnames from 'classnames';

/* Adjust the save.js part of block */
function applyExtraClass(extraProps, blockType, attributes) {
	const { color = '' } = attributes;

	// Core button.
	if (blockType.name === 'core/button') {
		if (typeof color !== 'undefined' && '' !== color) {
			extraProps.className = classnames(
				extraProps.className,
				`is-color-${color}`,
			);
		}
	}

	return extraProps;
}

addFilter(
	'blocks.getSaveContent.extraProps',
	'wps/applyExtraButtonSaveClass',
	applyExtraClass,
);

/* Adjust the edit.js part of block */
const withCustomAttributeClass = createHigherOrderComponent(
	(BlockListBlock) => (props) => {
		if (props.name !== 'core/button') {
			return <BlockListBlock {...props} />;
		}

		const { attributes = '' } = props;

		if ('' !== attributes.color) {
			return (
				<BlockListBlock
					{...props}
					className={`is-color-${attributes.color}`}
				/>
			);
		}

		return <BlockListBlock {...props} />;
	},
	'withCustomAttributeClass',
);

addFilter(
	'editor.BlockListBlock',
	'wps/applyExtraButtonEditorClass',
	withCustomAttributeClass,
);

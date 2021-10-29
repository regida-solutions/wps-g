/**
 * WordPress dependencies
 */
import { addFilter } from '@wordpress/hooks';
import { createHigherOrderComponent } from '@wordpress/compose';

/**
 * External dependencies
 */
import classnames from 'classnames';
/**
 * Internal dependencies
 */
import allowedBlocks from './allowed-blocks';

/* Adjust the save.js part of block */
function applyExtraClass(extraProps, blockType, attributes) {
	const { marginTop = '', marginBottom = '' } = attributes;

	// Core
	if (allowedBlocks.includes(blockType.name)) {
		if ('' !== marginTop) {
			extraProps.className = classnames(
				extraProps.className,
				`is-margin-top-${marginTop}`,
			);
		}
		if ('' !== marginBottom) {
			extraProps.className = classnames(
				extraProps.className,
				`is-margin-bottom-${marginBottom}`,
			);
		}
	}
	return extraProps;
}

addFilter(
	'blocks.getSaveContent.extraProps',
	'wps/applyExtraSpacingSaveClass',
	applyExtraClass,
);

/* Adjust the edit.js part of block */
const withCustomAttributeClass = createHigherOrderComponent(
	(BlockListBlock) => (props) => {
		if (!allowedBlocks.includes(props.name)) {
			return <BlockListBlock {...props} />;
		}

		const { attributes = {} } = props;
		const { marginTop = '', marginBottom = '' } = attributes;

		const classNames = classnames(
			'' !== marginTop ? `is-margin-top-${marginTop}` : '',
			'' !== marginBottom ? `is-margin-top-${marginBottom}` : '',
		);

		if (classNames) {
			return <BlockListBlock {...props} className={classNames} />;
		}

		return <BlockListBlock {...props} />;
	},
	'withCustomAttributeClass',
);

addFilter(
	'editor.BlockListBlock',
	'wps/applyExtraSpacingEditorClass',
	withCustomAttributeClass,
);

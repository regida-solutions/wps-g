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
function applyExtraClass( extraProps, blockType, attributes ) {
	if ( blockType.name !== 'core/button' ) {
		return extraProps;
	}

	const { buttonColor } = attributes;

	if ( typeof buttonColor !== 'undefined' && '' !== buttonColor ) {
		extraProps.className = classnames(
			extraProps.className,
			`is-color-${ buttonColor }`
		);
	}

	return extraProps;
}

addFilter(
	'blocks.getSaveContent.extraProps',
	'wps-prime/applyExtraSaveClass',
	applyExtraClass
);

/* Adjust the edit.js part of block */
const withCustomAttributeClass = createHigherOrderComponent(
	( BlockListBlock ) => ( props ) => {
		if ( props.name !== 'core/button' ) {
			return <BlockListBlock { ...props } />;
		}

		const { attributes } = props;

		if (
			typeof attributes.buttonColor !== 'undefined' &&
			'' !== attributes.buttonColor
		) {
			return (
				<BlockListBlock
					{ ...props }
					className={ `is-color-${ attributes.buttonColor }` }
				/>
			);
		}

		return <BlockListBlock { ...props } />;
	},
	'withCustomAttributeClass'
);

addFilter(
	'editor.BlockListBlock',
	'wps-prime/applyExtraEditorClass',
	withCustomAttributeClass
);

/**
 * WordPress dependencies
 */
import { addFilter } from '@wordpress/hooks';
import { createHigherOrderComponent } from '@wordpress/compose';
import { PanelBody } from '@wordpress/components';
import { InspectorControls } from '@wordpress/block-editor';

/**
 * External dependencies
 */
import { SpacingList } from 'components/controls';
/**
 * Internal dependencies
 */
import allowedBlocks from './allowed-blocks';

/**
 * Add mobile visibility controls on Advanced Block Panel.
 *
 * @param {Function} BlockEdit Block edit component.
 * @return {Function} BlockEdit Modified block edit component.
 */
const withAdvancedControls = createHigherOrderComponent(
	(BlockEdit) => (props) => {
		const { attributes, setAttributes, isSelected } = props;

		const { marginTop = '', marginBottom = '' } = attributes;
		const currentBlock = allowedBlocks.includes(props.name);

		return (
			<>
				<BlockEdit {...props} />
				{isSelected && currentBlock && (
					<InspectorControls>
						<PanelBody title="Spacings" initialOpen={false}>
							<SpacingList
								label={'Margin top'}
								value={marginTop}
								onChange={(value) =>
									setAttributes({ marginTop: value })
								}
							/>
							<SpacingList
								label={'Margin bottom'}
								value={marginBottom}
								onChange={(value) =>
									setAttributes({ marginBottom: value })
								}
							/>
						</PanelBody>
					</InspectorControls>
				)}
			</>
		);
	},
	'withAdvancedControls',
);

addFilter(
	'editor.BlockEdit',
	'wps/applyExtraSpacingCustomControl',
	withAdvancedControls,
);

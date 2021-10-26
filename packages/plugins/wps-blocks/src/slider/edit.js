/**
 * WordPress dependencies
 */
import {
	InnerBlocks,
	useBlockProps,
	BlockControls,
	AlignmentControl,
	BlockVerticalAlignmentControl,
} from '@wordpress/block-editor';

/**
 * External dependencies
 */
import classnames from 'classnames';

function Edit({ attributes, setAttributes }) {
	const INNER_BLOCKS_TEMPLATE = [['wps/slider-slide', {}]];
	const INNER_BLOCKS_ALLOWED_BLOCKS = ['wps/slider-slide'];

	const { className = '', textAlign, verticalAlign } = attributes;

	const classes = classnames('wps-slider', className, {
		[`has-text-align-${textAlign}`]: textAlign,
		[`has-vertical-align-${verticalAlign}`]: verticalAlign,
	});

	return (
		<>
			<BlockControls group="block">
				<AlignmentControl
					value={textAlign}
					onChange={(value) => setAttributes({ textAlign: value })}
				/>
				<BlockVerticalAlignmentControl
					value={verticalAlign}
					onChange={(value) =>
						setAttributes({ verticalAlign: value })
					}
				/>
			</BlockControls>
			<div {...useBlockProps({ className: classes })}>
				<InnerBlocks
					template={INNER_BLOCKS_TEMPLATE}
					templateLock={false}
					allowedBlocks={INNER_BLOCKS_ALLOWED_BLOCKS}
				/>
			</div>
		</>
	);
}
export default Edit;

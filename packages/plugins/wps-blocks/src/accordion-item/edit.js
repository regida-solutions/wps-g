/**
 * WordPress dependencies
 */
import { RichText, InnerBlocks, useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

function Edit({ attributes, setAttributes }) {
	const INNER_BLOCKS_TEMPLATE = [
		[
			'core/paragraph',
			{
				content:
					'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			},
		],
	];
	const INNER_BLOCKS_ALLOWED_BLOCKS = [
		'core/paragraph',
		'core/list',
		'core/buttons',
	];

	const { title } = attributes;

	return (
		<div {...useBlockProps()}>
			<RichText
				tagName="h3"
				className="wps-accordion-item-title"
				placeholder={__('Title')}
				value={title}
				onChange={(value) => setAttributes({ title: value })}
				allowedFormats={['core/bold', 'core/italic', 'core/text-color']}
			/>
			<InnerBlocks
				template={INNER_BLOCKS_TEMPLATE}
				templateLock={false}
				allowedBlocks={INNER_BLOCKS_ALLOWED_BLOCKS}
			/>
		</div>
	);
}
export default Edit;

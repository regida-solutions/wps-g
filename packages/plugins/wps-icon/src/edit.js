/**
 * WordPress dependencies
 */
/**
 * External dependencies
 */
import classnames from 'classnames';
import {
	InspectorControls,
	useBlockProps,
	withColors,
	PanelColorSettings,
	getFontSizeClass,
	BlockControls,
	AlignmentToolbar,
} from '@wordpress/block-editor';
import { TextControl, SelectControl, PanelBody } from '@wordpress/components';
import { select } from '@wordpress/data';
import { compose } from '@wordpress/compose';
import { __ } from '@wordpress/i18n';
/**
 * Internal dependencies
 */
import { FontSizeSelect } from 'components/controls';
import optionsList from './icon-typelist.json';

function Edit({ attributes, setAttributes, textColor, setTextColor }) {
	const { icon = '', fontSize = {}, type = '' } = attributes;

	const { className = '', textAlign = '' } = attributes;

	const selectedType = optionsList.filter((obj) => {
		return obj.attributes.value === type;
	});

	const iconClass = classnames(
		'fa',
		type ? selectedType[0].attributes.class : '',
		`fa-${icon}`,
	);

	const blockClass = classnames(
		'wps-icon',
		className,
		typeof fontSize !== 'undefined' ? getFontSizeClass(fontSize.id) : '',
		typeof textColor !== 'undefined' ? textColor.class : '',
		textAlign !== '' ? `has-text-align-${textAlign}` : '',
	);

	const settings = select('core/editor').getEditorSettings();
	const fontSizeList = settings.fontSizes;

	const FontSizeChange = (value) => {
		const font = fontSizeList.filter((item) => {
			return item.size === value;
		});

		if (font.length > 0) {
			setAttributes({
				fontSize: {
					value,
					id: font[0].slug,
				},
			});
		} else {
			setAttributes({ fontSize: {} });
		}
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Settings', 'wps-icon')}>
					<TextControl
						label={__('Icon css class', 'wps-icon')}
						value={icon}
						onChange={(value) => setAttributes({ icon: value })}
					/>
					<SelectControl
						label={__('Font type', 'wps-icon')}
						labelPosition="top"
						value={type}
						options={optionsList.map((option) => {
							return {
								label: option.name,
								value: option.attributes.value,
							};
						})}
						onChange={(value) => setAttributes({ type: value })}
					/>
					<PanelColorSettings
						title={__('Color settings')}
						colorSettings={[
							{
								value: textColor.color,
								onChange: setTextColor,
								label: __('Icon color'),
							},
						]}
					/>
					<hr />
					<FontSizeSelect
						value={fontSize.value}
						onChange={FontSizeChange}
					/>
				</PanelBody>
			</InspectorControls>
			<BlockControls>
				<AlignmentToolbar
					value={textAlign}
					onChange={(value) => setAttributes({ textAlign: value })}
				/>
			</BlockControls>
			<div {...useBlockProps()}>
				<div className={blockClass}>
					{icon && <i className={iconClass} />}
				</div>
			</div>
		</>
	);
}

export default compose([withColors({ textColor: 'color' })])(Edit);

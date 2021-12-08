/**
 * WordPress dependencies
 */
/**
 * External dependencies
 */
import classnames from 'classnames';
import {
	InnerBlocks,
	InspectorControls,
	useBlockProps,
	withColors,
	PanelColorSettings,
} from '@wordpress/block-editor';
import { TextControl, SelectControl, PanelBody } from '@wordpress/components';
import { compose } from '@wordpress/compose';
import { __ } from '@wordpress/i18n';
/**
 * Internal dependencies
 */
import optionsList from '../components/icon-typelist.json';

const ALLOWED_BLOCKS = ['core/list'];

function Edit({ attributes, setAttributes, textColor, setTextColor }) {
	const { icon = '', type = '' } = attributes;

	const { className = '' } = attributes;

	const selectedType = optionsList.filter((obj) => {
		return obj.attributes.value === type;
	});

	const iconClass = classnames(
		'fa',
		type ? selectedType[0].attributes.class : '',
		`fa-${icon}`,
	);

	const classes = classnames('wps-icon-list', className);
	const iconClasses = classnames(
		'fa-li',
		typeof textColor !== 'undefined' ? textColor.class : '',
	);

	const previewColor =
		typeof textColor !== 'undefined' ? textColor.color : false;

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Settings', 'wps-icon')}>
					<div
						className="editor-preview-box"
						style={{
							border: '1px solid #ccc',
							padding: '10px',
							marginBottom: '10px',
						}}
					>
						<h3>Preview</h3>
						<ul className="fa-ul">
							<li>
								<span
									style={{ color: previewColor }}
									className="fa-li"
								>
									<i className={iconClass} />
								</span>
								List item
								<ul className="fa-ul">
									<li>
										<span
											style={{ color: previewColor }}
											className={iconClasses}
										>
											<i className={iconClass} />
										</span>
										List sub Item
									</li>
								</ul>
							</li>
							<li>
								<span
									style={{ color: previewColor }}
									className={iconClasses}
								>
									<i className={iconClass} />
								</span>
								List Item
							</li>
						</ul>
					</div>
					<TextControl
						label={__('Icon css class', 'wps-icon')}
						value={icon}
						onChange={(value) => setAttributes({ icon: value })}
						help={
							<>
								{__(
									'ex: face-smile, for reference check the official fontawesome website',
								)}
								<br />
								<a
									href="https://fontawesome.com/v6.0/icons/"
									target="_blank"
									title={__('Open in a new window')}
									rel="noreferrer"
									style={{ marginBottom: '10px' }}
								>
									{__('Visit fontawesome')}
								</a>
							</>
						}
					/>

					<SelectControl
						label={__('Icon type', 'wps-icon')}
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
				</PanelBody>
			</InspectorControls>
			<div {...useBlockProps({ className: classes })}>
				<InnerBlocks allowedBlocks={ALLOWED_BLOCKS} />
			</div>
		</>
	);
}

export default compose([withColors({ textColor: 'color' })])(Edit);

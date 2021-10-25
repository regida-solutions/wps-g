/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import {
	InnerBlocks,
	useBlockProps,
	InspectorControls,
	ColorPaletteControl,
	getColorObjectByColorValue,
	ContrastChecker,
} from '@wordpress/block-editor';
import { select } from '@wordpress/data';
import {
	SelectControl,
	PanelBody,
	ColorIndicator,
} from '@wordpress/components';

/**
 * External dependencies
 */
import classnames from 'classnames';
/**
 * Internal dependencies
 */
import optionsList from './spacing-value-list';

import { BackgroundImage } from 'components/controls';

function Edit({ attributes, setAttributes }) {
	const {
		className,
		spacingVertical,
		backgroundColor,
		backgroundColorName,
		textColor,
		textColorName,
		media,
		focalPoint,
		backgroundBehaviour,
	} = attributes;

	const classes = classnames([
		'wps-section',
		className,
		spacingVertical ? 'has-vertical-spacing' : '',
		spacingVertical ? ` u-padding-vertical-${spacingVertical}` : '',
		backgroundColorName
			? `has-${backgroundColorName}-background-color`
			: '',
		textColorName ? `has-${textColorName}-color` : '',
		media && media.hasOwnProperty('url') ? 'has-background' : '',
		backgroundBehaviour ? `background-is-${backgroundBehaviour}` : '',
	]);

	const onChangeColor = (color, attribute, attributeName) => {
		let colorName = '';
		if (color) {
			const settings = select('core/editor').getEditorSettings();
			const colorObject = getColorObjectByColorValue(
				settings.colors,
				color,
			);
			if (colorObject) {
				colorName = colorObject.slug;
			}
		}
		setAttributes({ [attribute]: color });
		setAttributes({ [attributeName]: colorName });
	};

	const style = {};

	if (media) {
		if (media.hasOwnProperty('url')) {
			style.backgroundImage = `url(${media.url})`;
		}
		if (focalPoint) {
			if (focalPoint.hasOwnProperty('x')) {
				style.backgroundPosition = `${focalPoint.x * 100}% ${
					focalPoint.y * 100
				}%`;
			}
		}
	}

	return (
		<>
			<InspectorControls>
				<PanelBody
					title={__('Backgrounds', 'wps-blocks')}
					initialOpen={false}
				>
					<h3>Colors</h3>
					<ColorIndicator colorValue={backgroundColor} />
					<ColorIndicator colorValue={textColor} />
					<ContrastChecker
						textColor={textColor}
						backgroundColor={backgroundColor}
					/>
					<ColorPaletteControl
						label="Background color"
						value={backgroundColor}
						onChange={(color) =>
							onChangeColor(
								color,
								'backgroundColor',
								'backgroundColorName',
							)
						}
					/>
					<ColorPaletteControl
						label="Text color"
						value={textColor}
						onChange={(color) =>
							onChangeColor(color, 'textColor', 'textColorName')
						}
					/>
					<BackgroundImage
						media={media}
						onUpdate={(image) => setAttributes({ media: image })}
						onRemove={() =>
							setAttributes({ media: {}, focalPoint: {} })
						}
						focalPoint={focalPoint}
						onFocalChange={(focalData) =>
							setAttributes({ focalPoint: focalData })
						}
						behaviour={backgroundBehaviour}
						behaviourSettings
						onBehaveChange={(value) =>
							setAttributes({ backgroundBehaviour: value })
						}
					/>
				</PanelBody>
				<PanelBody
					title={__('Spacing', 'wps-blocks')}
					initialOpen={false}
				>
					<h3>Paddings</h3>
					<SelectControl
						label="Padding vertical"
						labelPosition="top"
						value={spacingVertical}
						options={optionsList}
						onChange={(value) =>
							setAttributes({ spacingVertical: value })
						}
					/>
				</PanelBody>
			</InspectorControls>
			<div {...useBlockProps({ className: classes })} style={style}>
				<div className="wps-section__inner">
					<InnerBlocks templateLock={false} />
				</div>
			</div>
		</>
	);
}

export default Edit;

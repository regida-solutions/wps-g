/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import {
	InnerBlocks,
	useBlockProps,
	InspectorControls,
	PanelColorSettings,
	withColors,
	ContrastChecker,
} from '@wordpress/block-editor';
import { compose } from '@wordpress/compose';
import { PanelBody } from '@wordpress/components';

/**
 * External dependencies
 */
import classnames from 'classnames';
/**
 * Internal dependencies
 */
import { BackgroundImage, SpacingList } from 'components/controls';

function Edit({
	attributes,
	setAttributes,
	textColor,
	setTextColor,
	backgroundColor,
	setBackgroundColor,
}) {
	const {
		className,
		spacingVertical,
		media,
		focalPoint,
		backgroundBehaviour,
		dimRatio,
	} = attributes;

	const classes = classnames([
		'wps-section',
		className,
		spacingVertical ? 'has-vertical-spacing' : '',
		spacingVertical ? `u-padding-vertical-${spacingVertical}` : '',
		backgroundColor.hasOwnProperty('class') ? backgroundColor.class : '',
		textColor.hasOwnProperty('class') ? textColor.class : '',
		media && media.hasOwnProperty('url') ? 'has-background' : '',
	]);

	const classesOverlay = classnames([
		'wps-section__overlay',
		media && media.hasOwnProperty('url') ? 'has-background' : '',
		backgroundColor.hasOwnProperty('class') ? backgroundColor.class : '',
		backgroundBehaviour ? `background-is-${backgroundBehaviour}` : '',
	]);

	const style = {};

	if (media) {
		if (media.hasOwnProperty('url')) {
			style.backgroundImage = `url(${media.url})`;
		}
		if (focalPoint) {
			if (
				focalPoint.hasOwnProperty('x') &&
				focalPoint.hasOwnProperty('y')
			) {
				style.backgroundPosition = `${focalPoint.x * 100}% ${
					focalPoint.y * 100
				}%`;
			}
		}
		style.opacity = dimRatio !== 100 ? `${dimRatio}%` : '';
	}
	return (
		<>
			<InspectorControls>
				<PanelBody
					title={__('Backgrounds', 'wps-blocks')}
					initialOpen={false}
				>
					<ContrastChecker
						textColor={textColor.color}
						backgroundColor={backgroundColor.color}
					/>
					<PanelColorSettings
						title={__('Color settings')}
						colorSettings={[
							{
								value: textColor.color,
								onChange: setTextColor,
								label: __('Text color'),
							},
							{
								value: backgroundColor.color,
								onChange: setBackgroundColor,
								label: __('Background color'),
							},
						]}
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
						rangeSettings
						range={dimRatio}
						onRangeChange={(newDimRation) => {
							setAttributes({ dimRatio: newDimRation });
						}}
					/>
				</PanelBody>
				<PanelBody
					title={__('Spacing', 'wps-blocks')}
					initialOpen={false}
				>
					<h3>Paddings</h3>
					<SpacingList
						label="Padding vertical"
						value={spacingVertical}
						onChange={(value) =>
							setAttributes({ spacingVertical: value })
						}
					/>
				</PanelBody>
			</InspectorControls>
			<div {...useBlockProps({ className: classes })}>
				{media ? <div className={classesOverlay} style={style} /> : ''}
				<div className="wps-section__inner">
					<InnerBlocks />
				</div>
			</div>
		</>
	);
}

export default compose([
	withColors({ textColor: 'color', backgroundColor: 'background-color' }),
])(Edit);

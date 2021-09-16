/**
	* WordPress Dependencies
	*/
import { __ } from '@wordpress/i18n';
import { addFilter } from '@wordpress/hooks';
import { createHigherOrderComponent } from '@wordpress/compose';
import {
	PanelBody, SelectControl,
} from '@wordpress/components';
import {	InspectorControls } from '@wordpress/block-editor';
/**
	* Add mobile visibility controls on Advanced Block Panel.
	*
	* @param {function} BlockEdit Block edit component.
	*
	* @return {function} BlockEdit Modified block edit component.
	*/
const withAdvancedControls = createHigherOrderComponent( ( BlockEdit ) => ( props ) => {
	const {
		attributes,
		setAttributes,
		isSelected,
	} = props;

	const {
		buttonColor,
	} = attributes;

	const allowedBlocks = ( props.name === 'core/button' );

	return (
		<>
			<BlockEdit { ...props } />
			{( isSelected && allowedBlocks ) && (
				<InspectorControls>
					<PanelBody title="Colors" initialOpen>
						<SelectControl
							label={ __( 'Choose button color:', 'wps-prime' ) }
							value={ buttonColor }
							onChange={ ( value ) => {
								setAttributes( { buttonColor: value } );
							} }
							options={ [
								{ value: '', label: __( 'Default', 'wps-prime' ) },
								{ value: 'primary', label: __( 'Primary', 'wps-prime' ) },
								{ value: 'secondary', label: __( 'Secondary', 'wps-prime' ) },
								{ value: 'tertiary', label: __( 'Tertiary', 'wps-prime' ) },
								{ value: 'positive', label: __( 'Positive', 'wps-prime' ) },
								{ value: 'neutral', label: __( 'Neutral', 'wps-prime' ) },
								{ value: 'light', label: __( 'Light', 'wps-prime' ) },
								{ value: 'white', label: __( 'White', 'wps-prime' ) },
							] }
						/>
					</PanelBody>
				</InspectorControls>
			)}
		</>
	);
}, 'withAdvancedControls' );

addFilter(
	'editor.BlockEdit',
	'wps-prime/custom-advanced-control',
	withAdvancedControls,
);

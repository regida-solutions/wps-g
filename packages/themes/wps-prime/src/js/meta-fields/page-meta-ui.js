/**
	* WordPress dependencies
	*/
import { useSelect } from '@wordpress/data';
import { useEntityProp } from '@wordpress/core-data';
import { __ } from '@wordpress/i18n';
import {	CheckboxControl } from '@wordpress/components';
import { PluginDocumentSettingPanel } from '@wordpress/edit-post';

const WpsPageSettingsPanel = () => {
	/* Access post props */
	const postType = useSelect( ( select ) => select( 'core/editor' ).getCurrentPostType() );

	/* Access meta data */
	const [ meta, setMeta ] = useEntityProp( 'postType', postType, 'meta' );

	if ( 'page' !== postType ) {
		return '';
	}

	const {
		_wps_has_visible_title: hasVisibleTitle = false,
		_wps_hide_footer: hideFooter = false,
	} = meta;

	return (
		<PluginDocumentSettingPanel
			name="wps-custom-page-settings-panel"
			title="Custom page settings"
			className="wps-custom-page-settings"
		>
			<CheckboxControl
				label={ __( 'Show title on front end' ) }
				checked={ hasVisibleTitle }
				onChange={ () => setMeta( { _wps_has_visible_title: ! hasVisibleTitle } ) }
			/>
			<CheckboxControl
				label={ __( 'Hide footer' ) }
				checked={ hideFooter }
				onChange={ () => setMeta( { _wps_hide_footer: ! hideFooter } ) }
			/>
		</PluginDocumentSettingPanel>
	);
};

export default WpsPageSettingsPanel;

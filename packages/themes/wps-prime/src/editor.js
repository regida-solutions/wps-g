/**
	* WordPress dependencies
	*/
import './js/editor/button/index';
import { registerPlugin } from '@wordpress/plugins';
import WpsPageSettingsPanel from './js/meta-fields/page-meta-ui';

registerPlugin( 'wp-page-settings-panel', {
	render: WpsPageSettingsPanel,
	icon: 'admin-tools',
} );

window.wp.domReady( () => {
	// Core Image settings
	window.wp.blocks.unregisterBlockStyle( 'core/image', 'rounded' );
	window.wp.blocks.unregisterBlockStyle( 'core/image', 'default' );

	// Core Button settings
	window.wp.blocks.unregisterBlockStyle( 'core/button', 'fill' );

	window.wp.blocks.registerBlockStyle( 'core/button', {
		name: 'pill',
		label: 'Pill',
		isDefault: false,
	} );

	window.wp.blocks.registerBlockStyle( 'core/button', {
		name: 'pill-outline',
		label: 'Pill Outline',
		isDefault: false,
	} );
} );

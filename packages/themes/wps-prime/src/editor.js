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
	window.wp.blocks.unregisterBlockStyle( 'core/image', 'rounded' );
	window.wp.blocks.unregisterBlockStyle( 'core/image', 'default' );
	window.wp.blocks.unregisterBlockStyle( 'core/button', 'fill' );

	window.wp.blocks.registerBlockStyle( 'core/button', {
		name: 'pill',
		label: 'Pill',
		isDefault: false,
	} );
} );

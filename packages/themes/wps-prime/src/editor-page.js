/**
 * WordPress dependencies
 */
import { registerPlugin } from '@wordpress/plugins';
/**
 * Internal dependencies
 */
import WpsPageSettingsPanel from './js/meta-fields/page-meta-ui';

registerPlugin('wp-page-settings-panel', {
	render: WpsPageSettingsPanel,
	icon: 'admin-tools',
});

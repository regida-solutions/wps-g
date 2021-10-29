/**
 * Internal dependencies
 */
import './js/editor/button/index';
import './js/editor/spacings/index';

window.wp.domReady(() => {
	// Core Image settings
	window.wp.blocks.unregisterBlockStyle('core/image', 'rounded');
	window.wp.blocks.unregisterBlockStyle('core/image', 'default');

	// Core Button settings
	window.wp.blocks.unregisterBlockStyle('core/button', 'fill');

	window.wp.blocks.registerBlockStyle('core/button', {
		name: 'pill',
		label: 'Pill',
		isDefault: false,
	});

	window.wp.blocks.registerBlockStyle('core/button', {
		name: 'pill-outline',
		label: 'Pill Outline',
		isDefault: false,
	});
});

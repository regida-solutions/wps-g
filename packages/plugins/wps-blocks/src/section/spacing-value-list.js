/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';

const optionsList = [
	{
		label: __('Default', 'wps-blocks'),
		value: '',
	},
	{
		label: __('Reset', 'wps-blocks'),
		value: 'none',
	},
	{
		label: __('Tiny', 'wps-blocks'),
		value: 'tiny',
	},
	{
		label: __('Small', 'wps-blocks'),
		value: 'small',
	},
	{
		label: __('Normal', 'wps-blocks'),
		value: 'normal',
	},
	{
		label: __('Large', 'wps-blocks'),
		value: 'large',
	},
	{
		label: __('Huge', 'wps-blocks'),
		value: 'huge',
	},
];
export default optionsList;

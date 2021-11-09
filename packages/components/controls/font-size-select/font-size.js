/**
 * WordPress dependencies
 */
import { select } from '@wordpress/data';
import { FontSizePicker } from '@wordpress/block-editor';
const FontSizeSelect = (attributes) => {
	const { value = '', onChange = () => {} } = attributes;

	const settings = select('core/editor').getEditorSettings();
	const fontSizeList = settings.fontSizes;
	return (
		<>
			<FontSizePicker
				fontSizes={fontSizeList}
				value={value}
				onChange={onChange}
			/>
		</>
	);
};

export default FontSizeSelect;

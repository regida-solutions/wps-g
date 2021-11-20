/**
 * WordPress dependencies
 */
import { useSelect } from '@wordpress/data';
import { useEntityProp } from '@wordpress/core-data';
import { __ } from '@wordpress/i18n';
import { CheckboxControl } from '@wordpress/components';
import { PluginDocumentSettingPanel } from '@wordpress/edit-post';

const WpsPageSettingsPanel = () => {
	/* Access post props */
	const postType = useSelect((select) =>
		select('core/editor').getCurrentPostType(),
	);

	/* Access meta data */
	const [meta, setMeta] = useEntityProp('postType', postType, 'meta');

	if ('page' !== postType) {
		return '';
	}

	const {
		_wps_has_visible_title: hasVisibleTitle = false,
		_wps_hide_footer: hideFooter = false,
		_wps_reset_page_top_space: resetPageTopSpace = false,
		_wps_reset_page_bottom_space: resetPageBottomSpace = false,
		_wps_hide_menu: hideMenu = false,
		_wps_link_logo_to_page: linkLogoToPage = false,
	} = meta;

	return (
		<PluginDocumentSettingPanel
			name="wps-custom-page-settings-panel"
			title="Custom page settings"
			className="wps-custom-page-settings"
		>
			<CheckboxControl
				help={__(
					"Check this to add h1 page title in case you don't have one in a hero block",
				)}
				label={__('Show title on front end')}
				checked={hasVisibleTitle}
				onChange={() =>
					setMeta({ _wps_has_visible_title: !hasVisibleTitle })
				}
			/>

			<CheckboxControl
				label={__('Disable Content Top Space')}
				checked={resetPageTopSpace}
				onChange={() =>
					setMeta({
						_wps_reset_page_top_space: !resetPageTopSpace,
					})
				}
			/>
			<CheckboxControl
				label={__('Disable Content Bottom Space')}
				checked={resetPageBottomSpace}
				onChange={() =>
					setMeta({
						_wps_reset_page_bottom_space: !resetPageBottomSpace,
					})
				}
			/>
			<hr />
			<h3 style={{ marginBottom: '6px' }}>
				{__('Landing page features')}
			</h3>
			<p>
				{__('Limit ability of navigating away from the current page')}
			</p>
			<CheckboxControl
				label={__('Hide menu')}
				checked={hideMenu}
				onChange={() => setMeta({ _wps_hide_menu: !hideMenu })}
			/>
			<CheckboxControl
				label={__('Hide footer')}
				checked={hideFooter}
				onChange={() => setMeta({ _wps_hide_footer: !hideFooter })}
			/>
			<CheckboxControl
				label={__('Logo link to current page')}
				checked={linkLogoToPage}
				onChange={() =>
					setMeta({ _wps_link_logo_to_page: !linkLogoToPage })
				}
			/>
		</PluginDocumentSettingPanel>
	);
};

export default WpsPageSettingsPanel;

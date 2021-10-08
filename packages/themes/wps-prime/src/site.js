/**
 * Internal dependencies
 */
import sideSlideMenuInit from './js/components/side-slide-menu-init';
import megaMenuInit from './js/components/mega-menu-init';
import stickyHeader from './js/components/sticky-header';

// eslint-disable-next-line no-undef
jQuery( document ).ready( ( $ ) => {
	sideSlideMenuInit( $ );
	megaMenuInit( $ );
} );

const { useSticky } = window.wpsThemeSettings;

if ( useSticky ) {
	function throttle( fn, wait ) {
		let time = Date.now();
		return () => {
			if ( time + wait - Date.now() < 0 ) {
				fn();
				time = Date.now();
			}
		};
	}
	window.addEventListener( 'scroll', throttle( stickyHeader, 20 ) );
}

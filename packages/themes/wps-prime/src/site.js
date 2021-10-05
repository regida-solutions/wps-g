/**
 * Internal dependencies
 */
import stickyNavigation from './js/components/sticky-navigation';
import sideSlideMenuInit from './js/components/side-slide-menu-init';
import megaMenuInit from './js/components/mega-menu-init';

// eslint-disable-next-line no-undef
jQuery( document ).ready( ( $ ) => {
	sideSlideMenuInit( $ );
	megaMenuInit( $ );
	stickyNavigation( $ );
} );

import stickyNavigation from './js/components/sticky-navigation';
import sideSlideMenuInit from './js/components/side-slide-menu-init';
import megaMenuInit from './js/components/mega-menu-init';

jQuery( document ).ready( ( $ ) => {
	sideSlideMenuInit( $ );
	megaMenuInit( $ );
	stickyNavigation( $ );
} );

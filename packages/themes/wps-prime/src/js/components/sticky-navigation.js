const stickyNavigation = ( $ ) => {
	const { useSticky, stickyTarget } = window.wpsThemeSettings;

	if ( ! useSticky ) {
		return;
	}

	const mql = window.matchMedia( 'screen and (min-width: 81.25em)' ); // 1300

	const adminBar = $( '#wpadminbar' );

	const target = $( stickyTarget );

	const headerHeight = target.outerHeight();
	const loggedIn = adminBar.outerHeight();

	/**
     * Sticky header
     */
	if ( mql.matches ) {
		const loginAdjust = adminBar.length ? loggedIn : false;

		target.sticky( { topSpacing: loginAdjust } ).on( 'sticky-end', function() {
			$( this ).parent().css( 'height', headerHeight );
		} );
	} else {
		target.unstick();
	}

	window.onresize = () => {
		if ( ! mql.matches ) {
			target.unstick();
		}
	};
};
export default stickyNavigation;

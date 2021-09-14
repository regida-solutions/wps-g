import '../lib/side-slide-menu-core';

const sideSlideMenuInit = ( $ ) => {
	// Get all menu togglers
	const togglers = document.getElementsByClassName( 'c-slide-nav-toggler' );
	const slideRight = new window.Menu( {
		wrapper: '#page',
		type: 'slide-right',
		menuOpenerClass: '.c-slide-nav-toggler',
		maskId: '#c-slide-nav-mask',
	} );

	// Asign open close functionality
	const runTogglers = Array.prototype.filter.call( togglers, ( element ) => {
		element.addEventListener( 'click', ( e ) => {
			if ( e.target.matches( '.c-slide-nav-toggler, .c-slide-nav-toggler *' ) ) {
				const menuState = { isActive: false };
				if ( menuState.isActive ) {
					menuState.isActive = false;
					slideRight.close();
				} else {
					menuState.isActive = true;
					slideRight.open();
				}
			}
		} );
	} );

	/**
   * Sub menu toggle
   */

	const toggleIcon = document.getElementsByClassName( 'show-submenu' );
	const togglelink = document.getElementsByClassName( 'site-nav__link' );

	// Run menu toggle on Icons
	const runTogglersIcons = Array.prototype.filter.call( toggleIcon, (
		element,
	) => {
		element.addEventListener( 'click', function( e ) {
			if ( e.target.matches( '.show-submenu, .show-submenu *' ) ) {
				if (
					$( this )
						.next()
						.hasClass( 'expanded' )
				) {
					$( this )
						.next()
						.removeClass( 'expanded' );
					$( this ).removeClass( 'show' );
				} else {
					$( this )
						.parent()
						.parent()
						.find( 'li > .sub-menu' )
						.removeClass( 'expanded' );
					$( this )
						.parent()
						.parent()
						.find( 'li > .show-submenu' )
						.removeClass( 'show' );
					$( this )
						.next()
						.toggleClass( 'expanded' );
					$( this ).toggleClass( 'show' );
				}
			}
		} );
	} );

	// Run menu toggle on links
	const runTogglersLink = Array.prototype.filter.call( togglelink, (
		element,
	) => {
		const listItem = $( element ).parent();
		const list = $( element )
			.parent()
			.parent();

		const classList = $( listItem )
			.attr( 'class' )
			.split( /\s+/ );

		const classListMenu = $( listItem.parent() )
			.attr( 'class' )
			.split( /\s+/ );

		if ( classList.includes( 'menu-item--show-submenu' ) ) {
			listItem.children( '.site-nav__link' ).removeAttr( 'href' );

			element.addEventListener( 'click', ( e ) => {
				const subMenu = $( listItem ).find( ' > .sub-menu' );
				const subMenuTogglerIcon = $( listItem ).find( ' > .show-submenu' );
				// Check if menu is already expanded

				if ( $( subMenu ).hasClass( 'expanded' ) ) {
					// Close  the list
					$( subMenu ).removeClass( 'expanded' );
					//  Set menu list toggler to default
					$( subMenuTogglerIcon ).removeClass( 'show' );
				} else {
					$( subMenu ).addClass( 'expanded' );
					$( subMenuTogglerIcon ).addClass( 'show' );
				}
			} );
		}
	} );

	( function() {
		let submenus, i;

		// Make sure the browser supports what we are about to do.
		if ( ! document.querySelectorAll || ! document.body.classList ) {
			return;
		}

		// Using a function helps isolate each accordion from the others
		function makeAccordion( accordion ) {
			let targets, currentTarget, i;

			targets = accordion.querySelectorAll(
				'.menu-item-has-children > .show-submenu',
			);
			for ( i = 0; i < targets.length; i++ ) {
				targets[ i ].addEventListener(
					'click',
					function() {
						if ( currentTarget ) {
							currentTarget.classList.remove( 'expanded' );
						}

						currentTarget = this.parentNode;
						currentTarget.classList.add( 'expanded' );
					},
					false,
				);
			}

			accordion.classList.add( 'js' );
		}

		// Find all the submenus to enable
		submenus = document.querySelectorAll( '.c-slide-nav__items' );

		// Array functions don't apply well to NodeLists
		for ( i = 0; i < submenus.length; i++ ) {
			makeAccordion( submenus[ i ] );
		}
	} )();
};
export default sideSlideMenuInit;

/**
	* WordPress dependencies
	*/

window.wp.domReady( () => {
	window.wp.blocks.unregisterBlockStyle( 'core/image', 'rounded' );
	window.wp.blocks.unregisterBlockStyle( 'core/image', 'default' );
	window.wp.blocks.unregisterBlockStyle( 'core/button', 'fill' );
} );

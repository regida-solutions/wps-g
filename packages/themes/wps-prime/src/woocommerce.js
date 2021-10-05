/**
 * Internal dependencies
 */
import { headerCart } from './js/woo/header-cart';
import { singleImageCarousel } from './js/woo/single-image-carousel';
import { readMoreInit } from './js/woo/read-more';

// eslint-disable-next-line no-undef
jQuery( document ).ready( ( $ ) => {
	headerCart();
	singleImageCarousel( $ );
	readMoreInit( $ );
} );

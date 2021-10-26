/**
 * Single image carousel
 */
export const singleImageCarousel = ($) => {
	// eslint-disable-next-line no-undef
	const galleryThumbs = new Swiper('.wps-lv-426-woo-gallery-thumbs', {
		spaceBetween: 12,
		slidesPerView: 5,
		freeMode: true,
		watchSlidesVisibility: true,
		watchSlidesProgress: true,
	});

	// eslint-disable-next-line no-undef
	new Swiper('.wps-lv-426-woo-gallery-main', {
		spaceBetween: 12,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		thumbs: {
			swiper: galleryThumbs,
		},
	});
	$('[data-fancybox="wps-woo-product-gallery"]').fancybox();
};

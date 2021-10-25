document.addEventListener('DOMContentLoaded', function () {
	if (typeof Swiper !== 'undefined') {
		/* eslint-disable-next-line */
		new Swiper('.wps-slider', {
			speed: 500,
			navigation: {
				nextEl: '.wps-slider-button-next',
				prevEl: '.wps-slider-button-prev',
			},
		});
	}
});

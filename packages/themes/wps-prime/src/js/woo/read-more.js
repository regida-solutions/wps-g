export const readMoreInit = ($) => {
	const container = $('.term-description-has-read-more');

	if (!container.length > 0) {
		return;
	}

	const toggleButton = $(container).find('.term-description__read-more');

	$(toggleButton).on('click', function () {
		container.toggleClass('term-description-is-open');
	});
};

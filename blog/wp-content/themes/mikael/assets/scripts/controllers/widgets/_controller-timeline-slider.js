/***********************************************
 * WIDGET: TIMELINE SLIDER
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof Swiper == 'undefined') {
		return;
	}

	VLTJS.timelineSlider = {
		init: function ($scope, $) {

			var el = $scope.find('.vlt-timeline-slider'),
				speed = el.data('animation-speed') || 1000,
				loop = el.data('loop') ? true : false;

			new Swiper(el.get(0), {
				speed: speed,
				spaceBetween: 0,
				grabCursor: true,
				slidesPerView: 1,
				loop: loop,
				navigation: {
					nextEl: $('.vlt-slider-controls--timeline-slider .next').get(0),
					prevEl: $('.vlt-slider-controls--timeline-slider .prev').get(0),
				},
				pagination: {
					el: $('.vlt-slider-controls--timeline-slider .pagination').get(0),
					clickable: false,
					type: 'fraction',
					renderFraction: function (currentClass, totalClass) {
						return '<span class="' + currentClass + '"></span>' +
							'<span class="sep">/</span>' +
							'<span class="' + totalClass + '"></span>';
					}
				}
			});
		}
	};

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-timeline-slider.default',
			VLTJS.timelineSlider.init
		);
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-slider-controls.default',
			VLTJS.timelineSlider.init
		);
	});

})(jQuery);
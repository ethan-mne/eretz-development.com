/***********************************************
 * WIDGET: TESTIMONIAL SLIDER
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof Swiper == 'undefined') {
		return;
	}

	VLTJS.testimonialSlider = {
		init: function ($scope, $) {

			var el = $scope.find('.vlt-testimonial-slider'),
				speed = el.data('animation-speed') || 1000,
				gap = el.data('gap') || 0,
				loop = el.data('loop') ? true : false;

			new Swiper(el.get(0), {
				speed: speed,
				spaceBetween: gap,
				effect: 'coverflow',
				grabCursor: true,
				slidesPerView: 1,
				loop: loop,
				navigation: {
					nextEl: $('.vlt-slider-controls--testimonial-slider .next').get(0),
					prevEl: $('.vlt-slider-controls--testimonial-slider .prev').get(0),
				},
				pagination: {
					el: $('.vlt-slider-controls--testimonial-slider .pagination').get(0),
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
			'frontend/element_ready/vlt-testimonial-slider.default',
			VLTJS.testimonialSlider.init
		);
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-slider-controls.default',
			VLTJS.testimonialSlider.init
		);
	});

})(jQuery);
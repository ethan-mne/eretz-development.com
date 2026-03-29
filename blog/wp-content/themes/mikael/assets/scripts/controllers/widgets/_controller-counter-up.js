/***********************************************
 * WIDGET: COUNTER UP
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.numerator == 'undefined') {
		return;
	}

	VLTJS.counterUp = {
		init: function ($scope, $) {

			var el = $scope.find('.vlt-counter-up, .vlt-counter-up-small'),
				animation_duration = el.data('animation-speed') || 1000,
				ending_number = el.data('ending-number') || 0,
				delimiter = el.data('delimiter') || false;

			if (VLTJS.body.hasClass('page-template-template-fullpage-slider')) {
				VLTJS.counterUp.initCounterUpForSlider(el, animation_duration, delimiter, ending_number);
			} else {
				VLTJS.counterUp.initCounterUp(el, animation_duration, delimiter, ending_number);
			}

		},
		initCounterUp: function (el, animation_duration, delimiter, ending_number) {
			el.one('inview', function () {
				el.find('.counter').numerator({
					easing: 'linear',
					duration: animation_duration,
					delimiter: delimiter,
					toValue: ending_number,
				});
			});
		},
		initCounterUpForSlider: function (el, animation_duration, delimiter, ending_number) {
			function start() {
				if (el.parents('.vlt-section').hasClass('active')) {
					var counter = el.find('.counter').html('0');
					setTimeout(function () {
						counter.numerator({
							easing: 'linear',
							duration: animation_duration,
							delimiter: delimiter,
							toValue: ending_number,
						});
					}, 500);
				}
			}
			VLTJS.window.on('vlt.change-slide', start);
			start();
		}
	}

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-counter-up.default',
			VLTJS.counterUp.init
		);
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-counter-up-small.default',
			VLTJS.counterUp.init
		);
	});

})(jQuery);
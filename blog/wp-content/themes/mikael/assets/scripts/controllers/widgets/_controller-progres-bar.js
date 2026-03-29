/***********************************************
 * WIDGET: PROGRESS BAR
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof gsap == 'undefined') {
		return;
	}

	VLTJS.progressBar = {
		init: function ($scope, $) {

			var el = $scope.find('.vlt-progress-bar'),
				final_value = el.data('final-value') || 0,
				animation_duration = el.data('animation-speed') || 0,
				delay = 500,
				obj = {
					count: 0
				};

			if (VLTJS.body.hasClass('page-template-template-fullpage-slider')) {
				VLTJS.progressBar.initProgressBarForSlider(el, obj, animation_duration, final_value, delay);
			} else {
				VLTJS.progressBar.initProgressBar(el, obj, animation_duration, final_value, delay);
			}

		},
		initProgressBar: function (el, obj, animation_duration, final_value, delay) {

			el.one('inview', function () {
				gsap.to(obj, (animation_duration / 1000) / 2, {
					count: final_value,
					delay: delay / 1000,
					onUpdate: function () {
						el.find('.vlt-progress-bar__title > .counter').text(Math.round(obj.count));
					}
				});

				gsap.to(el.find('.vlt-progress-bar__bar > span'), animation_duration / 1000, {
					width: final_value + '%',
					delay: delay / 1000
				});
			});

		},
		initProgressBarForSlider: function (el, obj, animation_duration, final_value, delay) {
			function start() {
				if (el.parents('.vlt-section').hasClass('active')) {

					obj.count = 0;

					el.find('.vlt-progress-bar__title > .counter').text(Math.round(obj.count));

					gsap.set(el.find('.vlt-progress-bar__bar > span'), {
						width: 0
					});

					gsap.to(obj, (animation_duration / 1000) / 2, {
						count: final_value,
						delay: delay / 1000,
						onUpdate: function () {
							el.find('.vlt-progress-bar__title > .counter').text(Math.round(obj.count));
						}
					});

					gsap.to(el.find('.vlt-progress-bar__bar > span'), animation_duration / 1000, {
						width: final_value + '%',
						delay: delay / 1000
					});

				}
			}
			VLTJS.window.on('vlt.change-slide', start);
			start();
		}
	}

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-progress-bar.default',
			VLTJS.progressBar.init
		);
	});

})(jQuery);
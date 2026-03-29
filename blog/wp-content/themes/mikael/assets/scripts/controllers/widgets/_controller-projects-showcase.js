/***********************************************
 * WIDGET: PROJECTS SHOWCASE
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof gsap == 'undefined') {
		return;
	}

	VLTJS.projectsShowcase = {
		init: function ($scope) {

			var el = $scope.find('.vlt-project-showcase'),
				items = el.find('.vlt-project-showcase__items'),
				item = items.find('.vlt-project-showcase__item'),
				images = el.find('.vlt-project-showcase__images'),
				image = images.find('.vlt-project-showcase__image'),
				wDiff,
				value;

			var sliderWidth = el.outerWidth(true),
				sliderImageWidth = images.outerWidth(true),
				itemsWidth = items.outerWidth(),
				sliderImageDiff = (sliderWidth - sliderImageWidth) / sliderWidth;

			wDiff = (itemsWidth / sliderWidth) - 1;
			wDiff = (sliderWidth - itemsWidth) / sliderWidth;

			item.on('mouseenter', function () {
				item.removeClass('is-active');
				image.removeClass('is-active');
				$(this).addClass('is-active');
				image.eq($(this).index()).addClass('is-active');
			});

			item.eq(0).trigger('mouseenter');

			VLTJS.window.on('mousemove', function (e) {
				value = e.pageX - el.offset().left;
			});

			gsap.ticker.add(function () {
				gsap.set(items, {
					x: value * wDiff,
					ease: 'power3.out'
				});
				gsap.set(images, {
					right: value * sliderImageDiff,
					ease: 'power3.out'
				});
			});

		}
	}

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-projects-showcase.default',
			function ($scope) {
				VLTJS.projectsShowcase.init($scope);
				VLTJS.debounceResize(function () {
					VLTJS.projectsShowcase.init($scope);
				});
			}
		);
	});

})(jQuery);
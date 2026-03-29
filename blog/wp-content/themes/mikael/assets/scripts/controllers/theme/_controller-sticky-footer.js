/***********************************************
 * THEME: STICKY FOOTER
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof gsap == 'undefined') {
		return;
	}

	if (VLTJS.isMobile.any()) {
		return;
	}

	VLTJS.fixedFooterEffect = {
		init: function () {

			var footer = $('.vlt-footer.vlt-footer--template').filter('.vlt-footer--sticky'),
				delta = .75,
				translateY = 0;

			if (footer.length) {
				if (VLTJS.window.outerWidth() >= 768) {

					VLTJS.window.on('load scroll', function () {
						var footerHeight = footer.outerHeight(),
							windowHeight = VLTJS.window.outerHeight(),
							documentHeight = VLTJS.document.outerHeight();
						translateY = delta * (Math.max(0, $(this).scrollTop() + windowHeight - (documentHeight - footerHeight)) - footerHeight);
					});

					gsap.ticker.add(function () {
						gsap.set(footer, {
							translateY: translateY,
							translateZ: 0,
						});
					});

				}
			}

		}
	};

	VLTJS.fixedFooterEffect.init();

	VLTJS.debounceResize(function () {
		VLTJS.fixedFooterEffect.init();
	});

})(jQuery);
/***********************************************
 * THEME: LOCALES
 ***********************************************/
(function ($) {

	'use strict';

	VLTJS.locales = {
		init: function () {

			var navbarLocalesLink = $('.vlt-offcanvas-menu__locales .glink'),
				keyValue = document['cookie'].match('(^|;) ?googtrans=([^;]*)(;|$)');

			keyValue = keyValue ? keyValue[2].split('/')[2] : null;

			function set_default_locales() {
				navbarLocalesLink.removeClass('is-active');
				navbarLocalesLink.each(function (index) {
					var currentLink = $(this),
						attribute = currentLink.attr('onclick');

					if (keyValue !== null) {
						if (attribute.indexOf(keyValue) !== -1) {
							currentLink.addClass('is-active');
						}
					} else {
						navbarLocalesLink.eq(0).addClass('is-active');
					}
				});

			}
			set_default_locales();

			navbarLocalesLink.on('click', function () {
				navbarLocalesLink.removeClass('is-active');
				$(this).addClass('is-active');
			});
		}
	};

	VLTJS.locales.init();

})(jQuery);
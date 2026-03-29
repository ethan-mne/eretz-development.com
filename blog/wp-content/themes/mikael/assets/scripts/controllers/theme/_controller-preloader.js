/***********************************************
 * THEME: PRELOADER
 ***********************************************/
(function ($) {

	'use strict';

	var preloader = $('.animsition');

	// check if plugin defined
	if (!preloader.length || typeof $.fn.animsition == 'undefined') {
		VLTJS.window.trigger('vlt.site-loaded');
		VLTJS.html.addClass('vlt-is-page-loaded');
		return;
	}

	preloader.animsition({
		inDuration: 500,
		outDuration: 500,
		loadingParentElement: 'html',
		linkElement: 'a:not(.remove):not(.vp-pagination__load-more):not(.elementor-accordion-title):not([href="javascript:;"]):not([role="slider"]):not([data-elementor-open-lightbox]):not([data-fancybox]):not([data-vp-filter]):not([target="_blank"]):not([href^="#"]):not([rel="nofollow"]):not([href~="#"]):not([href^=mailto]):not([href^=tel]):not(.sf-with-ul):not(.elementor-toggle-title)',
		loadingClass: 'animsition-loading-2',
		loadingInner: '<div class="spinner"><span class="double-bounce-one"></span><span class="double-bounce-two"></span></div>',
	});

	preloader.on('animsition.inEnd', function () {
		VLTJS.window.trigger('vlt.site-loaded');
		VLTJS.html.addClass('vlt-is-page-loaded');
	});

})(jQuery);
/***********************************************
 * INIT THIRD PARTY SCRIPTS
 ***********************************************/
(function ($) {

	'use strict';

	/**
	 * Fix visual portfolio
	 */
	$('.elementor-widget-visual-portfolio').addClass('elementor-widget-theme-post-content');

	/**
	 * Jarallax
	 */
	if (typeof $.fn.jarallax !== 'undefined') {
		$('.jarallax').jarallax({
			speed: 1
		});
	}

	/**
	 * Widget menu
	 */
	if (typeof $.fn.superclick !== 'undefined') {
		$('.widget_pages > ul, .widget_nav_menu ul.menu').superclick({
			delay: 300,
			cssArrows: false,
			animation: {
				opacity: 'show',
				height: 'show'
			},
			animationOut: {
				opacity: 'hide',
				height: 'hide'
			},
		});
	}

	/**
	 * Page 404
	 */
	$('.vlt-page--404 img').vlt_mousemove_parallax({
		movement: -60
	});

	/**
	 * Fitvids
	 */
	if (typeof $.fn.fitVids !== 'undefined') {
		VLTJS.body.fitVids();
	}

})(jQuery);
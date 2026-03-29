/***********************************************
 * THEME: NAVBAR
 ***********************************************/
(function ($) {

	'use strict';

	var navbarMain = $('.vlt-navbar--main'),
		navbarContacts = $('.vlt-navbar-contacts'),
		navbarHeight = navbarMain.outerHeight(),
		navbarMainOffset = 0;

	// fake navbar
	var navbarFake = $('<div class="vlt-fake-navbar">').hide();

	// fixed navbar
	function _fixed_navbar() {
		navbarMain.addClass('vlt-navbar--fixed');
		navbarFake.show();
		// add solid color
		if (navbarMain.hasClass('vlt-navbar--transparent') && navbarMain.hasClass('vlt-navbar--sticky')) {
			navbarMain.addClass('vlt-navbar--solid');
		}
	}

	function _unfixed_navbar() {
		navbarMain.removeClass('vlt-navbar--fixed');
		navbarFake.hide();
		// remove solid color
		if (navbarMain.hasClass('vlt-navbar--transparent') && navbarMain.hasClass('vlt-navbar--sticky')) {
			navbarMain.removeClass('vlt-navbar--solid');
		}
	}

	function _on_scroll_navbar() {
		if (VLTJS.window.scrollTop() > navbarMainOffset) {
			_fixed_navbar();
		} else {
			_unfixed_navbar();
		}
	}

	if (navbarMain.hasClass('vlt-navbar--sticky')) {
		VLTJS.window.on('scroll resize', _on_scroll_navbar);
		_on_scroll_navbar();
		// append fake navbar
		navbarMain.after(navbarFake);
		// fake navbar height after resize
		navbarFake.height(navbarHeight);
		VLTJS.debounceResize(function () {
			navbarFake.height(navbarHeight);
		});
	}

	// add sep
	navbarContacts.find('li + li').before('<li class="sep">/</li>');

})(jQuery);
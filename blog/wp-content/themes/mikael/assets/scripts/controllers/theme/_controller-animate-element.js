/***********************************************
 * THEME: ANIMATE ELEMENT
 ***********************************************/
(function ($) {

	'use strict';

	VLTJS.animatedBlock = {
		init: function () {
			var el = $('.vlt-animate-element'),
				prefix = 'animate__';
			if (VLTJS.body.hasClass('page-template-template-fullpage-slider')) {
				VLTJS.window.on('vlt.change-slide', function () {
					el.each(function () {
						var $this = $(this);
						var animationName = $this.data('animation-name');
						$this.removeClass(prefix + 'animated').removeClass(prefix + animationName);
						if ($this.parents('.vlt-section').hasClass('active')) {
							$this.addClass(prefix + 'animated').addClass(prefix + animationName);
						}
					});
				});
			} else {
				el.each(function () {
					var $this = $(this);
					$this.one('inview', function () {
						var animationName = $this.data('animation-name');
						$this.addClass(prefix + 'animated').addClass(prefix + animationName);
					});
				});
			}
		}
	};

	VLTJS.animatedBlock.init();

})(jQuery);
/***********************************************
 * THEME: ISOTOPE
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof Isotope == 'undefined') {
		return;
	}

	VLTJS.initIsotope = {
		init: function () {

			$('.vlt-isotope-grid').each(function () {

				var $this = $(this),
					setLayout = $this.data('layout'),
					setXGap = $this.data('x-gap'),
					setYGap = $this.data('y-gap');

				$this.css('--vlt-gutter-x', `${setXGap}px`);
				$this.css('--vlt-gutter-y', `${setYGap}px`);

				var $grid = $this.isotope({
					itemSelector: '.grid-item',
					layoutMode: setLayout,
					masonry: {
						columnWidth: '.grid-sizer'
					},
					cellsByRow: {
						columnWidth: '.grid-sizer'
					}
				});

				VLTJS.document.on('lazyloaded', function(){
					$grid.isotope('layout');
				});

			});

		}
	}

	VLTJS.initIsotope.init();

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-blog-list.default',
			VLTJS.initIsotope.init
		);
	});

})(jQuery);
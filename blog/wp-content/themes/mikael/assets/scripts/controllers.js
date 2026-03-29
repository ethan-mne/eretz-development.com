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
      }
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
/***********************************************
 * THEME: CUSTOM CURSOR
 ***********************************************/
(function ($) {
  'use strict';

  VLTJS.customCursor = {
    init: function () {
      if (!$('.vlt-is--custom-cursor').length) {
        return;
      }

      VLTJS.body.append('<div class="vlt-custom-cursor"><div class="circle"><span></span></div></div>');
      var cursor = $('.vlt-custom-cursor'),
          adminbarHeight = $('#wpadminbar').outerHeight(true) || 0,
          circle = cursor.find('.circle'),
          startPosition = {
        x: 0,
        y: 0
      },
          endPosition = {
        x: 0,
        y: 0
      },
          delta = .25;

      if (typeof gsap != 'undefined') {
        gsap.set(circle, {
          xPercent: -50,
          yPercent: -50
        });
        VLTJS.document.on('mousemove', function (e) {
          var offsetTop = window.pageYOffset || document.documentElement.scrollTop;
          startPosition.x = e.pageX;
          startPosition.y = e.pageY - offsetTop - adminbarHeight;
        });
        gsap.ticker.add(function () {
          endPosition.x += (startPosition.x - endPosition.x) * delta;
          endPosition.y += (startPosition.y - endPosition.y) * delta;
          gsap.set(circle, {
            x: endPosition.x,
            y: endPosition.y
          });
        });
        VLTJS.document.on('mousedown', function () {
          gsap.to(circle, .3, {
            scale: .7
          });
        }).on('mouseup', function () {
          gsap.to(circle, .3, {
            scale: 1
          });
        });
        VLTJS.document.on('mouseenter', 'input, textarea, select, .vlt-video-button > a', function () {
          gsap.to(circle, .3, {
            scale: 0,
            opacity: 0
          });
        }).on('mouseleave', 'input, textarea, select, .vlt-video-button > a', function () {
          gsap.to(circle, .3, {
            scale: 1,
            opacity: .1
          });
        });
        VLTJS.document.on('mouseenter', 'a, button, [role="button"]', function () {
          gsap.to(circle, .3, {
            height: 60,
            width: 60
          });
        }).on('mouseleave blur', 'a, button, [role="button"]', function () {
          gsap.to(circle, .3, {
            height: 15,
            width: 15
          });
        });
        VLTJS.document.on('mouseenter', '[data-cursor]', function () {
          var $this = $(this);
          gsap.to(circle, .3, {
            height: 80,
            width: 80,
            opacity: 1,
            onStart: function () {
              circle.find('span').html($this.attr('data-cursor'));
            }
          });
        }).on('mouseleave', '[data-cursor]', function () {
          gsap.to(circle, .3, {
            height: 15,
            width: 15,
            opacity: .1,
            onStart: function () {
              circle.find('span').html('');
            }
          });
        });
      }
    }
  };

  if (!VLTJS.isMobile.any()) {
    VLTJS.customCursor.init();
  }
})(jQuery);
/***********************************************
 * THEME: FULLPAGE SLIDER
 ***********************************************/
(function ($) {
  'use strict'; // check if plugin defined

  if (typeof $.fn.pagepiling == 'undefined') {
    return;
  }

  VLTJS.fullpageSlider = {
    init: function () {
      var slider = $('.vlt-fullpage-slider');

      if (!slider.length) {
        return;
      }

      var progress_bar = slider.find('.vlt-fullpage-slider-progress-bar'),
          numbers = slider.find('.vlt-fixed-action-block--slider-numbers'),
          loop_top = slider.data('loop-top') ? true : false,
          loop_bottom = slider.data('loop-bottom') ? true : false,
          speed = slider.data('speed') || 800,
          anchors = [];
      VLTJS.body.css('overflow', 'hidden');
      VLTJS.html.css('overflow', 'hidden');
      slider.find('[data-anchor]').each(function () {
        anchors.push($(this).data('anchor'));
      });

      function vlthemes_navbar_solid() {
        if (slider.find('.pp-section.active').scrollTop() > 0) {
          $('.vlt-navbar').addClass('vlt-navbar--solid');
        } else {
          $('.vlt-navbar').removeClass('vlt-navbar--solid');
        }
      }

      vlthemes_navbar_solid();

      function vlthemes_page_brightness() {
        var section = slider.find('.vlt-section.active');

        switch (section.data('brightness')) {
          case 'light':
            VLTJS.html.removeClass('is-light').addClass('is-dark');
            break;

          case 'dark':
            VLTJS.html.removeClass('is-dark').addClass('is-light');
            break;
        }
      }

      function vlthemes_navigation() {
        var total = slider.find('.pp-section').length,
            current = slider.find('.pp-section.active').index() + 1,
            scale = current / total;
        progress_bar.find('span').css({
          'transform': 'scaleY(' + scale + ')'
        });
      }

      function vlthemes_slide_counter() {
        var section = slider.find('.vlt-section.active'),
            index = section.index();

        if (index == 0) {
          numbers.html('<a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg></a>');
        } else {
          numbers.html(VLTJS.addLedingZero(index + 1));
        }
      }

      slider.pagepiling({
        menu: '.vlt-offcanvas-menu ul.sf-menu',
        scrollingSpeed: speed,
        loopTop: loop_top,
        loopBottom: loop_bottom,
        anchors: anchors,
        sectionSelector: '.vlt-section',
        navigation: false,
        afterRender: function () {
          vlthemes_page_brightness();
          vlthemes_navigation();
          vlthemes_slide_counter();
          VLTJS.window.trigger('vlt.change-slide');
        },
        onLeave: function () {
          vlthemes_page_brightness();
          vlthemes_navigation();
          vlthemes_slide_counter();
          VLTJS.window.trigger('vlt.change-slide');
        },
        afterLoad: function (anchorLink, index) {
          vlthemes_navbar_solid();
        }
      });
      numbers.on('click', '>a', function (e) {
        e.preventDefault();
        $.fn.pagepiling.moveSectionDown();
      });
      $('.link-to-next-slide').on('click', '.vlt-simple-link', function (e) {
        e.preventDefault();
        $.fn.pagepiling.moveSectionDown();
      });
      slider.find('.pp-scrollable').on('scroll', function () {
        var scrollTop = $(this).scrollTop();

        if (scrollTop > 0) {
          $('.vlt-navbar').addClass('vlt-navbar--solid');
        } else {
          $('.vlt-navbar').removeClass('vlt-navbar--solid');
        }
      });
    }
  };
  VLTJS.fullpageSlider.init();
})(jQuery);
/***********************************************
 * THEME: ISOTOPE
 ***********************************************/
(function ($) {
  'use strict'; // check if plugin defined

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
        VLTJS.document.on('lazyloaded', function () {
          $grid.isotope('layout');
        });
      });
    }
  };
  VLTJS.initIsotope.init();
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-blog-list.default', VLTJS.initIsotope.init);
  });
})(jQuery);
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
/***********************************************
 * THEME: NAVBAR
 ***********************************************/
(function ($) {
  'use strict';

  var navbarMain = $('.vlt-navbar--main'),
      navbarContacts = $('.vlt-navbar-contacts'),
      navbarHeight = navbarMain.outerHeight(),
      navbarMainOffset = 0; // fake navbar

  var navbarFake = $('<div class="vlt-fake-navbar">').hide(); // fixed navbar

  function _fixed_navbar() {
    navbarMain.addClass('vlt-navbar--fixed');
    navbarFake.show(); // add solid color

    if (navbarMain.hasClass('vlt-navbar--transparent') && navbarMain.hasClass('vlt-navbar--sticky')) {
      navbarMain.addClass('vlt-navbar--solid');
    }
  }

  function _unfixed_navbar() {
    navbarMain.removeClass('vlt-navbar--fixed');
    navbarFake.hide(); // remove solid color

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

    _on_scroll_navbar(); // append fake navbar


    navbarMain.after(navbarFake); // fake navbar height after resize

    navbarFake.height(navbarHeight);
    VLTJS.debounceResize(function () {
      navbarFake.height(navbarHeight);
    });
  } // add sep


  navbarContacts.find('li + li').before('<li class="sep">/</li>');
})(jQuery);
/***********************************************
 * THEME: OFFCANVAS MENU
 ***********************************************/
(function ($) {
  'use strict';

  var menuIsOpen = false;
  VLTJS.menuOffcanvas = {
    config: {
      easing: 'power2.out'
    },
    init: function () {
      var menu = $('.vlt-offcanvas-menu'),
          navigation = menu.find('ul.sf-menu'),
          navigationItem = navigation.find('> li'),
          header = $('.vlt-offcanvas-menu__header'),
          footer = $('.vlt-offcanvas-menu__footer > div'),
          menuOpen = $('.js-offcanvas-menu-open'),
          menuClose = $('.js-offcanvas-menu-close'),
          siteOverlay = $('.vlt-site-overlay');

      if (typeof $.fn.superclick !== 'undefined') {
        navigation.superclick({
          delay: 300,
          cssArrows: false,
          animation: {
            opacity: 'show',
            height: 'show'
          },
          animationOut: {
            opacity: 'hide',
            height: 'hide'
          }
        });
      }

      menuOpen.on('click', function (e) {
        e.preventDefault();

        if (!menuIsOpen) {
          VLTJS.menuOffcanvas.open_menu(menu, siteOverlay, navigationItem, header, footer);
        }
      });
      menuClose.on('click', function (e) {
        e.preventDefault();

        if (menuIsOpen) {
          VLTJS.menuOffcanvas.close_menu(menu, siteOverlay, navigationItem, header, footer);
        }
      });
      siteOverlay.on('click', function (e) {
        e.preventDefault();

        if (menuIsOpen) {
          VLTJS.menuOffcanvas.close_menu(menu, siteOverlay, navigationItem, header, footer);
        }
      });
      VLTJS.document.keyup(function (e) {
        if (e.keyCode === 27 && menuIsOpen) {
          e.preventDefault();
          VLTJS.menuOffcanvas.close_menu(menu, siteOverlay, navigationItem, header, footer);
        }
      }); // Close after click to anchor.

      navigationItem.filter('[data-menuanchor]').on('click', 'a', function () {
        if (menuIsOpen) {
          VLTJS.menuOffcanvas.close_menu(menu, siteOverlay, navigationItem, header, footer);
        }
      });
    },
    open_menu: function (menu, siteOverlay, navigationItem, header, footer) {
      menuIsOpen = true;

      if (typeof gsap != 'undefined') {
        gsap.timeline({
          defaults: {
            ease: this.config.easing
          }
        }) // set overflow for html
        .set(VLTJS.html, {
          overflow: 'hidden'
        }) // overlay animation
        .to(siteOverlay, .3, {
          autoAlpha: 1
        }) // menu animation
        .fromTo(menu, .6, {
          x: '100%'
        }, {
          x: 0,
          visibility: 'visible'
        }, '-=.3') // header animation
        .fromTo(header, .3, {
          x: 50,
          autoAlpha: 0
        }, {
          x: 0,
          autoAlpha: 1
        }, '-=.3') // navigation item animation
        .fromTo(navigationItem, .3, {
          x: 50,
          autoAlpha: 0
        }, {
          x: 0,
          autoAlpha: 1,
          stagger: {
            each: .1,
            from: 'start'
          }
        }, '-=.15') // footer animation
        .fromTo(footer, .3, {
          x: 50,
          autoAlpha: 0
        }, {
          x: 0,
          autoAlpha: 1,
          stagger: {
            each: .1,
            from: 'start'
          }
        }, '-=.15');
      }
    },
    close_menu: function (menu, siteOverlay, navigationItem, header, footer) {
      menuIsOpen = false;

      if (typeof gsap != 'undefined') {
        gsap.timeline({
          defaults: {
            ease: this.config.easing
          }
        }) // set overflow for html
        .set(VLTJS.html, {
          overflow: 'inherit'
        }) // footer animation
        .to(footer, .3, {
          x: 50,
          autoAlpha: 0,
          stagger: {
            each: .1,
            from: 'end'
          }
        }) // navigation item animation
        .to(navigationItem, .3, {
          x: 50,
          autoAlpha: 0,
          stagger: {
            each: .1,
            from: 'end'
          }
        }, '-=.15') // header animation
        .to(header, .3, {
          x: 50,
          autoAlpha: 0
        }, '-=.15') // menu animation
        .to(menu, .6, {
          x: '100%'
        }, '-=.15') // set visibility menu after animation
        .set(menu, {
          visibility: 'hidden'
        }) // overlay animation
        .to(siteOverlay, .3, {
          autoAlpha: 0
        }, '-=.6');
      }
    }
  };
  VLTJS.menuOffcanvas.init();
})(jQuery);
/***********************************************
 * THEME: PRELOADER
 ***********************************************/
(function ($) {
  'use strict';

  var preloader = $('.animsition'); // check if plugin defined

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
    loadingInner: '<div class="spinner"><span class="double-bounce-one"></span><span class="double-bounce-two"></span></div>'
  });
  preloader.on('animsition.inEnd', function () {
    VLTJS.window.trigger('vlt.site-loaded');
    VLTJS.html.addClass('vlt-is-page-loaded');
  });
})(jQuery);
/***********************************************
 * THEME: STICKY FOOTER
 ***********************************************/
(function ($) {
  'use strict'; // check if plugin defined

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
              translateZ: 0
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
/***********************************************
 * WIDGET: COUNTER UP
 ***********************************************/
(function ($) {
  'use strict'; // check if plugin defined

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
          toValue: ending_number
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
              toValue: ending_number
            });
          }, 500);
        }
      }

      VLTJS.window.on('vlt.change-slide', start);
      start();
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-counter-up.default', VLTJS.counterUp.init);
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-counter-up-small.default', VLTJS.counterUp.init);
  });
})(jQuery);
/***********************************************
 * WIDGET: PROGRESS BAR
 ***********************************************/
(function ($) {
  'use strict'; // check if plugin defined

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
        gsap.to(obj, animation_duration / 1000 / 2, {
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
          gsap.to(obj, animation_duration / 1000 / 2, {
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
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-progress-bar.default', VLTJS.progressBar.init);
  });
})(jQuery);
/***********************************************
 * WIDGET: PROJECTS SHOWCASE SLIDER
 ***********************************************/
(function ($) {
  'use strict'; // check if plugin defined

  if (typeof Swiper == 'undefined') {
    return;
  }

  VLTJS.projectsShowcaseSlider = {
    init: function ($scope) {
      var el = $scope.find('.vlt-project-showcase-slider');
      new Swiper(el.get(0), {
        speed: 1000,
        spaceBetween: 30,
        grabCursor: true,
        slidesPerView: 1,
        breakpoints: {
          575: {
            slidesPerView: 2
          }
        }
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-projects-showcase-slider.default', VLTJS.projectsShowcaseSlider.init);
  });
})(jQuery);
/***********************************************
 * WIDGET: PROJECTS SHOWCASE
 ***********************************************/
(function ($) {
  'use strict'; // check if plugin defined

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
      wDiff = itemsWidth / sliderWidth - 1;
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
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-projects-showcase.default', function ($scope) {
      VLTJS.projectsShowcase.init($scope);
      VLTJS.debounceResize(function () {
        VLTJS.projectsShowcase.init($scope);
      });
    });
  });
})(jQuery);
/***********************************************
 * WIDGET: TESTIMONIAL SLIDER
 ***********************************************/
(function ($) {
  'use strict'; // check if plugin defined

  if (typeof Swiper == 'undefined') {
    return;
  }

  VLTJS.testimonialSlider = {
    init: function ($scope, $) {
      var el = $scope.find('.vlt-testimonial-slider'),
          speed = el.data('animation-speed') || 1000,
          gap = el.data('gap') || 0,
          loop = el.data('loop') ? true : false;
      new Swiper(el.get(0), {
        speed: speed,
        spaceBetween: gap,
        effect: 'coverflow',
        grabCursor: true,
        slidesPerView: 1,
        loop: loop,
        navigation: {
          nextEl: $('.vlt-slider-controls--testimonial-slider .next').get(0),
          prevEl: $('.vlt-slider-controls--testimonial-slider .prev').get(0)
        },
        pagination: {
          el: $('.vlt-slider-controls--testimonial-slider .pagination').get(0),
          clickable: false,
          type: 'fraction',
          renderFraction: function (currentClass, totalClass) {
            return '<span class="' + currentClass + '"></span>' + '<span class="sep">/</span>' + '<span class="' + totalClass + '"></span>';
          }
        }
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-testimonial-slider.default', VLTJS.testimonialSlider.init);
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-slider-controls.default', VLTJS.testimonialSlider.init);
  });
})(jQuery);
/***********************************************
 * WIDGET: TIMELINE SLIDER
 ***********************************************/
(function ($) {
  'use strict'; // check if plugin defined

  if (typeof Swiper == 'undefined') {
    return;
  }

  VLTJS.timelineSlider = {
    init: function ($scope, $) {
      var el = $scope.find('.vlt-timeline-slider'),
          speed = el.data('animation-speed') || 1000,
          loop = el.data('loop') ? true : false;
      new Swiper(el.get(0), {
        speed: speed,
        spaceBetween: 0,
        grabCursor: true,
        slidesPerView: 1,
        loop: loop,
        navigation: {
          nextEl: $('.vlt-slider-controls--timeline-slider .next').get(0),
          prevEl: $('.vlt-slider-controls--timeline-slider .prev').get(0)
        },
        pagination: {
          el: $('.vlt-slider-controls--timeline-slider .pagination').get(0),
          clickable: false,
          type: 'fraction',
          renderFraction: function (currentClass, totalClass) {
            return '<span class="' + currentClass + '"></span>' + '<span class="sep">/</span>' + '<span class="' + totalClass + '"></span>';
          }
        }
      });
    }
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-timeline-slider.default', VLTJS.timelineSlider.init);
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-slider-controls.default', VLTJS.timelineSlider.init);
  });
})(jQuery);
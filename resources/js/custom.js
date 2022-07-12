/*------------------------------------------------------------------
 * Theme Name:
 * Author: coodiv (nedjai mohamed) (nbames.mohamed@gmail.com)
 * Author URI: https://coodiv.net/
 * Author URI: https://themeforest.net/user/coodiv
 * Js file Version: 1.0
 -------------------------------------------------------------------*/

"use strict";

function isTouchDevice() {
    var prefixes = ' -webkit- -moz- -o- -ms- '.split(' ');

    var mq = function mq(query) {
        return window.matchMedia(query).matches;
    };

    if ('ontouchstart' in window || window.DocumentTouch && document instanceof DocumentTouch) {
        return true;
    }

    var query = ['(', prefixes.join('touch-enabled),('), 'heartz', ')'].join('');
    return mq(query);
}

if (isTouchDevice()) {
    $('body').addClass('touch-device');
}

(function () {
    var head = $('.js-profile-head'),
        load = $('.js-profile-load'),
        save = $('.js-profile-save');
    load.on('click', function () {
        head.addClass('active');
    });
    save.on('click', function () {
        head.removeClass('active');
    });
})();


(function () {
    var header = $('.js-header'),
        items = header.find('.js-header-item'),
        burger = header.find('.js-header-burger'),
        wrapper = header.find('.js-header-wrapper');
    items.each(function () {
        var item = $(this),
            head = item.find('.js-header-head'),
            body = item.find('.js-header-body');
        head.on('click', function (e) {
            e.stopPropagation();

            if (!item.hasClass('active')) {
                items.removeClass('active');
                item.addClass('active');
            } else {
                items.removeClass('active');
            }
        });
        body.on('click', function (e) {
            e.stopPropagation();
        });
        $('html, body').on('click', function () {
            items.removeClass('active');
        });
    });
    burger.on('click', function (e) {
        e.stopPropagation();
        burger.toggleClass('active');
        wrapper.toggleClass('visible');
    });
})();


var prevArrow = '<button type="button" class="slick-prev"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="9" fill="none" viewBox="0 0 14 9"><path fill-rule="evenodd" d="M4.909.265a1 1 0 0 0-1.413.057l-3.231 3.5a1 1 0 0 0 0 1.357l3.231 3.5a1 1 0 0 0 1.47-1.357L3.284 5.5H13a1 1 0 1 0 0-2H3.284l1.682-1.822A1 1 0 0 0 4.909.265z" fill="#777e91"/></svg></button>',
    nextArrow = '<button type="button" class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="9" fill="none" viewBox="0 0 14 9"><path fill-rule="evenodd" d="M9.091.265a1 1 0 0 1 1.413.057l3.231 3.5a1 1 0 0 1 0 1.357l-3.231 3.5a1 1 0 0 1-1.47-1.357L10.716 5.5H1a1 1 0 1 1 0-2h9.716L9.034 1.678A1 1 0 0 1 9.091.265z" fill="#23262f"/></svg></button>';

$(document).ready(function () {
    $('.js-slider-main').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: prevArrow,
        nextArrow: nextArrow,
        dots: false,
        adaptiveHeight: true,
        speed: 500
    });
    $('.js-slider-popular').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: prevArrow,
        nextArrow: nextArrow,
        dots: false,
        speed: 500,
        responsive: [{
            breakpoint: 1340,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 1023,
            settings: {
                slidesToShow: 3
            }
        }, {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
                infinite: true
            }
        }]
    }); // slider hot

    $('.js-slider-hot').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: prevArrow,
        nextArrow: nextArrow,
        dots: false,
        speed: 500,
        responsive: [{
            breakpoint: 1179,
            settings: {
                slidesToShow: 3
            }
        }, {
            breakpoint: 1023,
            settings: {
                slidesToShow: 2
            }
        }, {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
                infinite: true
            }
        }]
    });

    $('.js-slider-collections').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: prevArrow,
        nextArrow: nextArrow,
        dots: false,
        speed: 500,
        infinite: false,
        responsive: [{
            breakpoint: 1023,
            settings: {
                slidesToShow: 1
            }
        }, {
            breakpoint: 767,
            settings: {
                slidesToShow: 1
            }
        }]
    });
    $('.js-slider-discover').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: prevArrow,
        nextArrow: nextArrow,
        dots: false,
        speed: 500,
        infinite: false,
        responsive: [{
            breakpoint: 100000,
            settings: "unslick"
        }, {
            breakpoint: 767,
            settings: {
                slidesToShow: 1
            }
        }]
    });
    $(window).on('resize orientationchange', function () {
        $('.js-slider-resize').slick('resize');
    });
});

$('.main__timer').countdown('2050/04/28 00:00:00').on('update.countdown', function (event) {var $this = $(this).html(event.strftime('' + '<span class="main__box"><span class="main__number">%H</span><span class="main__time">Hrs</span></span>' + '<span class="main__box"><span class="main__number">%M</span><span class="main__time">mins</span></span>' + '<span class="main__box"><span class="main__number">%S</span><span class="main__time">secs</span></span>'));});

(function () {
    var slider = $('.js-slider');

    if (slider.length) {
        slider.each(function () {
            var _this = $(this),
                min = _this.data('min'),
                max = _this.data('max'),
                start = _this.data('start'),
                end = _this.data('end'),
                step = _this.data('step'),
                tooltips = _this.data('tooltips'),
                postfix = _this.data('postfix');

            var optionStart = [start],
                optionConnect = [true, false],
                optionTooltips = false;

            if (end) {
                optionStart = [start, end];
                optionConnect = true;
            }

            if (tooltips) {
                optionTooltips = [true];

                if (end) {
                    optionTooltips = [true, true];
                }
            }

            noUiSlider.create(_this[0], {
                start: optionStart,
                connect: optionConnect,
                step: step,
                tooltips: optionTooltips,
                range: {
                    'min': min,
                    'max': max
                },
                format: wNumb({
                    decimals: 0,
                    postfix: postfix
                })
            });
        });
    }
})();


var vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty('--vh', "".concat(vh, "px"));

$(document).ready(function () {
    $('.select, .select-empty').niceSelect();
});

(function () {
    var tabs = $('.js-tabs');
    tabs.each(function () {
        var thisTabs = $(this),
            nav = thisTabs.find('.js-tabs-link'),
            item = thisTabs.find('.js-tabs-item');
        nav.on('click', function () {
            var thisNav = $(this),
                indexNav = thisNav.index();
            nav.removeClass('active');
            thisNav.addClass('active');
            item.hide();
            item.eq(indexNav).fadeIn();
            return false;
        });
    });
    $(document).ready(function () {
        var option = $('.js-tabs-select .option');
        option.on('click', function () {
            var thisOption = $(this),
                indexOption = thisOption.index();
            $('.js-tabs-item').hide();
            $('.js-tabs-item').eq(indexOption).fadeIn();
        });
    });
})();

(function () {
    var item = $('.faq__item'),
        head = item.find('.faq__head'),
        body = item.find('.faq__body');
    head.on('click', function () {
        var thisHead = $(this);
        thisHead.parents('.faq__item').toggleClass('active');
        thisHead.parents('.faq__item').find('.faq__body').slideToggle();
    });
})();

(function () {
    var items = $('.js-actions');
    items.each(function () {
        var item = $(this),
            button = item.find('.js-actions-button'),
            body = item.find('.js-actions-body');
        button.on('click', function (e) {
            e.stopPropagation();
            $('.js-options-share').removeClass('active');
            $('.js-options-box').removeClass('active');

            if (!item.hasClass('active')) {
                items.removeClass('active');
                item.addClass('active');
            } else {
                items.removeClass('active');
            }
        });
        body.on('click', function (e) {
            e.stopPropagation();
        });
        $('html, body').on('click', function () {
            items.removeClass('active');
        });
    });
})();

(function () {
    var link = $('.js-popup-open');
    link.magnificPopup({
        type: 'inline',
        fixedContentPos: true,
        removalDelay: 200,
        callbacks: {
            beforeOpen: function beforeOpen() {
                this.st.mainClass = this.st.el.attr('data-effect');
                setTimeout(function () {
                    $('.popup__rate').focus();
                    $('.popup_price .field__input').focus();
                    var tmpStr = $('.popup_price .field__input').val();
                    $('.popup_price .field__input').val('');
                    $('.popup_price .field__input').val(tmpStr);
                }, 100);
            }
        }
    });
})();

(function () {
    var open = $('.discover__filter'),
        filters = $('.discover__filters');
    open.on('click', function () {
        open.toggleClass('active');
        filters.slideToggle();
    });
})();


(function () {
    var favorite = $('.card__favorite, .options__button_favorite');
    favorite.on('click', function () {
        $(this).toggleClass('active');
    });
})();
(function () {
    var loadmore = $('.more__products__btn');
    loadmore.on('click', function () {
        $(this).toggleClass('active');
    });
})();
if(jQuery("#sticky-sidebar").length > 0) {
    var a = new StickySidebar('#sticky-sidebar', {
        topSpacing: 20,
        bottomSpacing: 20,
        containerSelector: '.container-sidebar',
        innerWrapperSelector: '.sidebar__inner'
    });
}

(function () {
    var jQueryPlugin = (window.jQueryPlugin = function (ident, func) {
        return function (arg) {
            if (this.length > 1) {
                this.each(function () {
                    var $this = $(this);

                    if (!$this.data(ident)) {
                        $this.data(ident, func($this, arg));
                    }
                });

                return this;
            } else if (this.length === 1) {
                if (!this.data(ident)) {
                    this.data(ident, func(this, arg));
                }

                return this.data(ident);
            }
        };
    });
})();

(function () {
    function Guantity($root) {
        const element = $root;
        const quantity = $root.first("data-quantity");
        const quantity_target = $root.find("[data-quantity-target]");
        const quantity_minus = $root.find("[data-quantity-minus]");
        const quantity_plus = $root.find("[data-quantity-plus]");
        var quantity_ = quantity_target.val();
        $(quantity_minus).click(function () {
            quantity_target.val(--quantity_);
        });
        $(quantity_plus).click(function () {
            quantity_target.val(++quantity_);
        });
    }
    $.fn.Guantity = jQueryPlugin("Guantity", Guantity);
    $("[data-quantity]").Guantity();
})();

(function () {
    var filtersidebarbtn = $('.sidebar__filter__toggle');
    var filtersidebarwrapper = $('.wrapper__sidebar__filter__shop_section');
    var filtersidebar = $('.sidebar__filter__shop_section');
    var filtersidebarclose = $('.sidebar__filter__shop_section__closebtn');

    filtersidebarbtn.on('click', function () {
        if ((filtersidebar).hasClass("active")) {
            $(this).removeClass('active');
            $('.wrapper__sidebar__filter__shop_section').removeClass('active');
            $('.sidebar__filter__shop_section').removeClass('active');
            $('.catalog__row').removeClass('sidebar__filter__shop_section__opened');
        }else{
            $(this).addClass('active');
            $('.wrapper__sidebar__filter__shop_section').addClass('active');
            $('.sidebar__filter__shop_section').addClass('active');
            $('.catalog__row').addClass('sidebar__filter__shop_section__opened');
        }
    });

    filtersidebarclose.on('click', function () {
        $('.sidebar__filter__toggle').removeClass('active');
        $('.wrapper__sidebar__filter__shop_section').removeClass('active');
        $('.sidebar__filter__shop_section').removeClass('active');
        $('.catalog__row').removeClass('sidebar__filter__shop_section__opened');
    })

    filtersidebarwrapper.on('click', function () {
        $('.sidebar__filter__toggle').removeClass('active');
        $('.wrapper__sidebar__filter__shop_section').removeClass('active');
        $('.sidebar__filter__shop_section').removeClass('active');
        $('.catalog__row').removeClass('sidebar__filter__shop_section__opened');
    });


})();

if(jQuery("#mainCarousel").length > 0) {
    const mainCarousel = new Carousel(document.querySelector("#mainCarousel"), {
        Dots: false,
        slidesPerPage: 1,
    });
    const thumbCarousel = new Carousel(document.querySelector("#thumbCarousel"), {
        Sync: {
            target: mainCarousel,
            friction: 0,
        },
        Dots: false,
        Navigation: false,
        center: true,
        slidesPerPage: 1,
        infinite: false,
    });
}
if(jQuery("#mainCarousel").length > 0) {
    Fancybox.bind('[data-fancybox="gallery"]', {
        Carousel: {
            on: {
                change: (that) => {
                    mainCarousel.slideTo(mainCarousel.findPageForSlide(that.page), {
                        friction: 0,
                    });
                },
            },
        },
    });
}
(function () {
    $('.js-activity-select').on('click', function () {
        $('.activity__group .checkbox__input').prop('checked', true).attr('checked', 'checked');
    });
    $('.js-activity-unselect').on('click', function () {
        $('.activity__group .checkbox__input').prop('checked', false).removeAttr('checked');
    });
})();

(function () {
    $('.discover__link, .activity__link, .catalog__link').on('click', function (e) {
        e.preventDefault();
        $('.discover__link, .activity__link, .catalog__link').removeClass('active');
        $(this).addClass('active');
    });
})(); // upload details

$('.preview__clear').on('click', function (e) {
    e.preventDefault();
    $('.field__input').val('');
    $('.select').find('option').attr("selected", false);
    $('.select').find('option:first-child').attr("selected", true);
    $('.select').niceSelect('update');
});

$('.catalog__reset').on('click', function (e) {
    e.preventDefault();
    $('.select').find('option').attr("selected", false);
    $('.select').find('option:first-child').attr("selected", true);
    $('.select').niceSelect('update');
    $('.js-slider')[0].noUiSlider.reset();
});
$('.js-popup-close').on("click", function () {
    $.magnificPopup.close();
});
$('.popup_purchase .popup__item .popup__button:first-child').on('click', function () {
    $(this).parents('.popup__item').hide().next().show();
    $('.popup__item__waiting').delay(400).fadeOut('slow');
});
$('.footer__note a').on('click', function (e) {
    e.preventDefault();
    $(this).hide();
});

$('.steps__button').on('click', function () {
    $(this).parents('.steps__item').next().find('.steps__button').removeClass('disabled');
    $(this).parents('.steps__item').addClass('done');
    $(this).addClass('done');
    $(this).text('Done');
});
$('.popup_price .popup__button:first-child').on('click', function () {
    var text = $(this).parents('.popup_price').find('.field__input').val();
    $('.item__currency .item__price:first-child span').text(text);
});

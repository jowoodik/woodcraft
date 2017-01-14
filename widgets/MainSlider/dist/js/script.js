!function ($) {
    var slider = $('#main-slider').lightSlider({
        item: 4,
        slideMargin: 15,
        slideMove: 4,
        controls: false,
        enableDrag: false,
        //pager: false,
        loop: true,
        speed: 700,
        //auto: true,
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slideMove: 3,
                    enableDrag: true,
                    item: 3
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slideMove: 1,
                    item: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slideMove: 1,
                    item: 1
                }
            }
        ],
        onAfterSlide: function (el) {
            $(el).removeClass('in-active');
            setTimeout(function () {
                inActive = false;
            }, 500);
        }
    });
}(jQuery);
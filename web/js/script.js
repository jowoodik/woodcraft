$(document).ready(function () {
    $("#owl-mp-slider").owlCarousel({

        autoPlay: 3000, //Set AutoPlay to 3 seconds
        stopOnHover: true,
        navigation: true,
        singleItem: true,
        navigationText: [
            "<img src='images/left-arrow.png'>",
            "<img src='images/right-arrow.png'>"
        ],
        pagination: false,
        autoplayHoverPause:true,

        items: 1,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 2],
        itemsTablet: [768, 2]

    });

    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        items: 3
    });

    $('.service-title').on('click', function (e) {
        e.preventDefault();

        var target = e.target;
        var parent = $(target).parents('.wrapper-service');
        var text = $(parent).find('.text');

        if (!$(parent).hasClass('active')) {
            $(parent).addClass('active');
            $(target).addClass('active');
            $(text).removeClass('hidden');
        } else {
            $(parent).removeClass('active');
            $(target).removeClass('active');
            $(text).addClass('hidden');
        }
    });

    $('#make-order').on('click', function (e) {
         var name = $(this).data('name');
         var price = $(this).data('price');

        var modal = $('#orderModal');
        $(modal).find('.name').html('«' + name + '»');
        $(modal).find('.price').html(price + ' руб.');
        $(modal).find('#applications-outer_length').val(price);
        $(modal).find('#applications-file_route').val(name);
    });
});

function footerToBottom() {
    var browserHeight = $(window).height(),
        footerOuterHeight = $('#footer').outerHeight(true),
        headerOuterHeight = $('#header').outerHeight(true),
        mainHeightMarginPaddingBorder = $('#content').outerHeight(true) - $('#content').height();
    console.log(footerOuterHeight);
    $('#content').css({
        'min-height': browserHeight - footerOuterHeight - headerOuterHeight,
    });
}
footerToBottom();
$(window).resize(function () {
    footerToBottom();
});


/*
 $('document').ready(function () {
 var trigger = $('#n-toggle'),
 body = $('body');
 isOpened = false;

 trigger.click(function (e) {
 e.preventDefault();
 if (isOpened == true) {
 body.removeClass('navbar-collapse');
 isOpened = false;
 } else {
 body.addClass('navbar-collapse');
 isOpened = true;
 }
 });
 });*/

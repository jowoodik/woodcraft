$(document).ready(function () {
    $("#owl-mp-slider").owlCarousel({

        autoPlay: 3000, //Set AutoPlay to 3 seconds
        stopOnHover: true,
        navigation: true,
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

});

function footerToBottom() {
    var browserHeight = $(window).height(),
        footerOuterHeight = $('#footer').outerHeight(true),
        mainHeightMarginPaddingBorder = $('#content').outerHeight(true) - $('#content').height();
    $('#content').css({
        'min-height': browserHeight - footerOuterHeight - mainHeightMarginPaddingBorder,
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

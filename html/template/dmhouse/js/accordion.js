jQuery(function ($) {
    $('.accordion li').hover(function () {
        $(this).find('ul').stop(true, true).slideDown();
        $(this).addClass('open');
    }, function () {
        $(this).find('ul').stop(true, true).slideUp();
        $(this).removeClass('open');
    }).find('ul').hide()
})
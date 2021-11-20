$(document).ready(function () {
    $('#btn_open_navbar_slide').click(function (e) {
        e.preventDefault();
        $('.aside_nav_slide').addClass('aside_nav_slide__open');
        $('.site_overlay').addClass('site_overlay__active');
        $('body').css('overflow','hidden');
    });

    $('#btn_close_navbar_slide').click(function (e) {
        e.preventDefault();
        $('.aside_nav_slide').removeClass('aside_nav_slide__open');
        $('.site_overlay').removeClass('site_overlay__active');
        $('body').removeAttr('style');
    });
});
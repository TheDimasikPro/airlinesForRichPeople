$(document).ready(function () {
    $('#btn_open_close_aside').click(function (e) {
        e.preventDefault();
        if (!$('.navbar__list__item__btn .fa-arrow-right').hasClass('non_view')) {
            $('.navbar').css("animation","0.5s animate_width_60_aside forwards");
            setTimeout(() => {
                $('.navbar').removeAttr('style');
                $('.navbar').removeClass('navbar_open');
            }, 500);
            setTimeout(() => {
                $('.navbar__list__item__link').addClass('non_view');
                $('.navbar__list__item__link_icon').removeClass('non_view');
                $('.navbar__list__item__btn').addClass('navbar__list__item__btn_active');
                $('.navbar__list__item__btn .fa-arrow-right').addClass('non_view');
                $('.navbar__list__item__btn .fa-bars').removeClass('non_view');
            }, 320);
        }
        else{
            $('.navbar__list__item__btn').removeClass('navbar__list__item__btn_active');
            $('.navbar__list__item__btn .fa-arrow-right').removeClass('non_view');
            $('.navbar__list__item__btn .fa-bars').addClass('non_view');
            $('.navbar__list__item__link').removeClass('non_view');
            $('.navbar__list__item__link_icon').addClass('non_view');
            $('.navbar').addClass('navbar_open');
        }
    });
});
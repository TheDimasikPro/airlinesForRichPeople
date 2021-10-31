$(document).ready(function (e) {
    $(".slide-one").owlCarousel({
        center: true,
        items:5,
        loop:true,
        margin:10,
        responsive:{
            600:{
                items:6
            }
        }
    });
    $(".slide-two").owlCarousel({
        center: true,
        items:5,
        loop:true,
        margin:10,
        responsive:{
            600:{
                items:6
            }
        }
    });

    $('.slide-one .carousel__item').click(function (e) {
        e.preventDefault();
        $('.slide-one .carousel__item').removeClass('carousel__item__active');
        $(this).addClass('carousel__item__active');
    });
    $('.slide-two .carousel__item').click(function (e) {
        e.preventDefault();
        $('.slide-two .carousel__item').removeClass('carousel__item__active');
        $(this).addClass('carousel__item__active');
    });

    $('.result_price__flight_to__cards__item').click(function (e) {
        e.preventDefault();
        var this_id = $(this).attr('id');
        if ($('#result_flight_to_in_basket[data-id-item="'+ this_id +'"]').hasClass('non_view')) {
            $('.result_price__flight_to__cards__item__short_info__price__in_basket').addClass('non_view');
            $('.result_price__flight_to__cards__item').addClass('not_select_result_price__flight_to__cards__item');
            $(this).removeClass('not_select_result_price__flight_to__cards__item');
            
            $('#result_flight_to_in_basket[data-id-item="'+ this_id +'"]').removeClass('non_view');
        }
    });
    $('.result_price__flight_from__cards__item').click(function (e) {
        e.preventDefault();
        var this_id = $(this).attr('id');
        if ($('#result_flight_from_in_basket[data-id-item="'+ this_id +'"]').hasClass('non_view')) {
            $('.result_price__flight_from__cards__item__short_info__price__in_basket').addClass('non_view');
            $('.result_price__flight_from__cards__item').addClass('not_select_result_price__flight_from__cards__item');
            $(this).removeClass('not_select_result_price__flight_from__cards__item');
            
            $('#result_flight_from_in_basket[data-id-item="'+ this_id +'"]').removeClass('non_view');
        }
    });
});
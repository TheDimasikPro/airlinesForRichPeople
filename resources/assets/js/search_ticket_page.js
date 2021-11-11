$(document).ready(function (e) {

    var price_tikets = 0;
    $('.aside__block__info__all_price__text').text(price_tikets);
    setTimeout(() => {
        $('.owl-item.active.center .carousel__item').addClass('carousel__item__active');
    }, 100);
    
    var screenWidth = window.screen.width;
    var screenHeight = window.screen.height;
    window.onresize = function(event) {
        screenWidth = window.screen.width;
    };
    if (screenWidth > 780) {
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
    }
    if (screenWidth < 780) {
        $(".slide-one").owlCarousel({
            center: true,
            items:4,
            loop:true,
            margin:10,
            responsive:{
                500:{
                    items: 4
                },
                550:{
                    items: 4
                },
                600:{
                    items:6
                }
            }
        });
        $(".slide-two").owlCarousel({
            center: true,
            items:4,
            loop:true,
            margin:10,
            responsive:{
                500:{
                    items: 4
                },
                550:{
                    items: 4
                },
                600:{
                    items:6
                }
            }
        });
    }


    
    

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
        if ($('.result_price__flight_to__cards__item__short_info__price__in_basket[data-id-item="'+ this_id +'"]').hasClass('non_view')) {
            $('.result_price__flight_to__cards__item__short_info__price__in_basket').addClass('non_view');
            $('.result_price__flight_to__cards__item').addClass('not_select_result_price__flight_to__cards__item');
            $(this).removeClass('not_select_result_price__flight_to__cards__item');
            
            $('.result_price__flight_to__cards__item__short_info__price__in_basket[data-id-item="'+ this_id +'"]').removeClass('non_view');
        }
    });
    $('.result_price__flight_from__cards__item').click(function (e) {
        e.preventDefault();
        var this_id = $(this).attr('id');
        if ($('.result_price__flight_from__cards__item__short_info__price__in_basket[data-id-item="'+ this_id +'"]').hasClass('non_view')) {
            $('.result_price__flight_from__cards__item__short_info__price__in_basket').addClass('non_view');
            $('.result_price__flight_from__cards__item').addClass('not_select_result_price__flight_from__cards__item');
            $(this).removeClass('not_select_result_price__flight_from__cards__item');
            
            $('.result_price__flight_from__cards__item__short_info__price__in_basket[data-id-item="'+ this_id +'"]').removeClass('non_view');
        }
    });

    // $('.result_price__flight_to__cards__item').click(function (e) {
    //     console.log('cd');
    //     e.preventDefault();
    //     var this_id = $(this).attr('id');
    //     if ($('#result_flight_from_in_basket[data-id-item="'+ this_id +'"]').hasClass('non_view')) {
    //         $('.result_price__flight_to__cards__item__short_info__price__in_basket').addClass('non_view');
    //         $('.result_price__flight_to__cards__item').addClass('not_select_result_price__flight_from__cards__item');
    //         $(this).removeClass('not_select_result_price__flight_from__cards__item');
            
    //         $('#result_flight_from_in_basket[data-id-item="'+ this_id +'"]').removeClass('non_view');
    //     }
    // });

    

    var id_flight_start = 0;
    var id_flight_end = 0;
    var price_tikets__one_way = 0;
    $('.result_price__flight_to__cards__item__short_info__price__in_basket').click(function (e) {
        console.log("enter");
        e.preventDefault();
        $('.row_select_ticket_from').removeClass('non_view__select_ticket_form');
        $('.select_ticket_from__date').removeClass('non_view__select_ticket_form');
        $('.select_ticket_from__time').removeClass('non_view__select_ticket_form');
        $('.select_ticket_from__number_flight').removeClass('non_view__select_ticket_form');
        $('.name_model_air').removeClass('non_view__select_ticket_form');

        var parent_this_btn = $('.result_price__flight_to__cards__item:not(.not_select_result_price__flight_to__cards__item)');
        var start_time = $(parent_this_btn).find('.result_price__flight_to__cards__item__short_info__card__city__from_short_info__time').text();
        var end_time = $(parent_this_btn).find('.result_price__flight_to__cards__item__short_info__card__city__to_short_info__time').text();
        var flight_code = $(parent_this_btn).find('.result_price__flight_to__cards__item__short_info__card__city__from_short_info__number_flight').text();


        $('.deatils_start_from__time').text(start_time);
        $('.deatils_start_to__time').text(end_time);
        $('#deatils_start_number_flight').text(flight_code);

        $('.from_price').removeClass('select_from_price');
        $(parent_this_btn).find('.result_price__flight_to__cards__item__short_info__price__text').addClass('select_from_price');
        var cost_start = $(parent_this_btn).find('.result_price__flight_to__cards__item__short_info__price__text.select_from_price').text();

        var parent_this_btn_back = $('.result_price__flight_from__cards__item:not(.not_select_result_price__flight_from__cards__item)');
        var cost_back = $('.result_price__flight_to__cards__item__short_info__price__text.select_back_price').text();

        price_tikets = 0;
        price_tikets += Number(cost_start) + Number(cost_back);
        console.log(flight_code);
        $('.select_ticket_from__time_start').text(start_time);
        $('.select_ticket_from__time_end').text(end_time);
        $('.select_ticket_from__number_flight').text(flight_code);
        $('.aside__block__info__all_price__text').text(price_tikets);
        $('.price_popup span').text("Итоговая цена: " + price_tikets);

        id_flight_start = $('.result_price__flight_to__cards__item').attr("data-id-flight");
    });

    $('.result_price__flight_from__cards__item__short_info__price__in_basket').click(function (e) {
        e.preventDefault();
        $('.row_select_ticket_to').removeClass('non_view__select_ticket_form');
        $('.select_ticket_to__date').removeClass('non_view__select_ticket_form');
        $('.select_ticket_to__time').removeClass('non_view__select_ticket_form');
        $('.select_ticket_to__number_flight').removeClass('non_view__select_ticket_form');
        $('.name_model_air').removeClass('non_view__select_ticket_form');

        var parent_this_btn = $('.result_price__flight_from__cards__item:not(.not_select_result_price__flight_from__cards__item)');
        var start_time = $(parent_this_btn).find('.result_price__flight_to__cards__item__short_info__card__city__from_short_info__time').text();
        var end_time = $(parent_this_btn).find('.result_price__flight_to__cards__item__short_info__card__city__to_short_info__time').text();
        var flight_code = $(parent_this_btn).find('.result_price__flight_to__cards__item__short_info__card__city__from_short_info__number_flight').text();
        
        $('.deatils_both_sides_back_from__time').text(start_time);
        $('.deatils_both_sides_back_to__time').text(end_time);
        $('#deatils_both_sides_back_number_flight').text(flight_code);

        $('.back_price').removeClass('select_back_price');
        $(parent_this_btn).find('.result_price__flight_to__cards__item__short_info__price__text').addClass('select_back_price');
        var cost_back = $(parent_this_btn).find('.result_price__flight_to__cards__item__short_info__price__text.select_back_price').text();
        var cost_start = $('.result_price__flight_to__cards__item__short_info__price__text.select_from_price').text();
        price_tikets = 0;
        price_tikets += Number(cost_back) + Number(cost_start);

        // price_tikets__both_sides += Number(cost);
        console.log(flight_code);
        $('.select_ticket_to__time_start').text(start_time);
        $('.select_ticket_to__time_end').text(end_time);
        $('.select_ticket_to__number_flight').text(flight_code);
        $('.aside__block__info__all_price__text').text(price_tikets);
        $('.price_popup span').text("Итоговая цена: " + price_tikets);

        id_flight_end = $('.result_price__flight_from__cards__item').attr("data-id-flight");
    });

    $('.aside__block__info__btn').click(function (e) {
        e.preventDefault();
    });

    
    $('#aside__block__info__btn').click(function () {
        check_error_aside_tickets();
     });
    $('#btn_continune_order').click(function () {
        check_error_aside_tickets();
    });
    function check_error_aside_tickets() {
        if ($('.aside__block__info__ticket:nth-child(2)').length) {
            if (id_flight_start != 0 && id_flight_end != 0) {
                redirect_to_passenger_info(id_flight_start,id_flight_end);
            }
            else{
                $('.error_aside_tickets').removeClass('non_view');
            }
        }
        else{
            if (id_flight_start != 0 && id_flight_end == 0) {
                redirect_to_passenger_info(id_flight_start,0);
            }
            else{
                $('.error_aside_tickets').removeClass('non_view');
            }
        }
        
    }

    function return_name_in_url(name) {
        var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);        
        if (!results) 
            { return 0; }        
        return results[1] || 0;
    }

    function redirect_to_passenger_info(id_flight_start,id_flight_end) {
        var formData = new FormData();
        var param_url_this_page = window.location.href.split('?')[1];
        location.href = "http://richairlines/search_tickets/passenger_info?" + param_url_this_page + "&id_flight_start=" + id_flight_start + "&id_flight_end=" + id_flight_end; 
    }
});
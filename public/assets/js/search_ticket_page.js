/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************************!*\
  !*** ./resources/assets/js/search_ticket_page.js ***!
  \***************************************************/
$(document).ready(function (e) {
  setTimeout(function () {
    $('.owl-item.active.center .carousel__item').addClass('carousel__item__active');
  }, 100);
  var screenWidth = window.screen.width;
  var screenHeight = window.screen.height;

  window.onresize = function (event) {
    screenWidth = window.screen.width;
  };

  if (screenWidth > 780) {
    $(".slide-one").owlCarousel({
      center: true,
      items: 5,
      loop: true,
      margin: 10,
      responsive: {
        600: {
          items: 6
        }
      }
    });
    $(".slide-two").owlCarousel({
      center: true,
      items: 5,
      loop: true,
      margin: 10,
      responsive: {
        600: {
          items: 6
        }
      }
    });
  }

  if (screenWidth < 780) {
    $(".slide-one").owlCarousel({
      center: true,
      items: 4,
      loop: true,
      margin: 10,
      responsive: {
        500: {
          items: 4
        },
        550: {
          items: 4
        },
        600: {
          items: 6
        }
      }
    });
    $(".slide-two").owlCarousel({
      center: true,
      items: 4,
      loop: true,
      margin: 10,
      responsive: {
        500: {
          items: 4
        },
        550: {
          items: 4
        },
        600: {
          items: 6
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

    if ($('.result_price__flight_to__cards__item__short_info__price__in_basket[data-id-item="' + this_id + '"]').hasClass('non_view')) {
      $('.result_price__flight_to__cards__item__short_info__price__in_basket').addClass('non_view');
      $('.result_price__flight_to__cards__item').addClass('not_select_result_price__flight_to__cards__item');
      $(this).removeClass('not_select_result_price__flight_to__cards__item');
      $('.result_price__flight_to__cards__item__short_info__price__in_basket[data-id-item="' + this_id + '"]').removeClass('non_view');
    }
  });
  $('.result_price__flight_from__cards__item').click(function (e) {
    e.preventDefault();
    var this_id = $(this).attr('id');

    if ($('#result_flight_from_in_basket[data-id-item="' + this_id + '"]').hasClass('non_view')) {
      $('.result_price__flight_from__cards__item__short_info__price__in_basket').addClass('non_view');
      $('.result_price__flight_from__cards__item').addClass('not_select_result_price__flight_from__cards__item');
      $(this).removeClass('not_select_result_price__flight_from__cards__item');
      $('#result_flight_from_in_basket[data-id-item="' + this_id + '"]').removeClass('non_view');
    }
  }); // $('.result_price__flight_to__cards__item').click(function (e) {
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

  $('.result_price__flight_to__cards__item__short_info__price__in_basket').click(function (e) {
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
    console.log(flight_code);
    $('.select_ticket_from__time_start').text(start_time);
    $('.select_ticket_from__time_end').text(end_time);
    $('.select_ticket_from__number_flight').text(flight_code); // console.log(from_time);
    // console.log($('.result_price__flight_to__cards__item:not(.not_select_result_price__flight_to__cards__item)'));
  });
  $('#btn_continune_order').click(function () {
    location.href = "http://richairlines/search_tickets/passenger_info";
  });
});
/******/ })()
;
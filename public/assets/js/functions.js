/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************!*\
  !*** ./resources/assets/js/functions.js ***!
  \******************************************/
$(document).ready(function () {
  var dropbtn_from_flights = $('#dropbtn_from_flights');
  var dropbtn_to_flights = $('#dropbtn_to_flights');
  var input_search_from_flights = $('#id_i_s_f_f');
  var input_search_to_flights = $('#id_i_s_f_t');
  var input_country_of_issue = $('#input_country_of_issue');
  var flights_list_item = $('.flights_list_item');
  var input_count_pass_block = $('.input_count_pass_block');
  var input_count_pass = $('#id_i_c_pass');
  var dropbtn_prefix_phone = $('#dropbtn_prefix_phone');
  var dropbtn_gender_code = $('#dropbtn_gender_code');
  var dropbtn_type_document = $('#dropbtn_type_document');
  var dropbtn_country_of_issue = $('#dropbtn_country_of_issue');
  var screenWidth = window.screen.width;
  var screenHeight = window.screen.height;

  window.onresize = function (event) {
    screenWidth = window.screen.width;
  }; // функции


  function showdropDownListCitiesSearchFlights(button, dropdown_info) {
    $(button).addClass('rotate_180');
    $(dropdown_info).addClass('show_drop_content');
  }

  function searchInFlightsList(id_input, filter, elements) {
    $(elements).each(function (i, elem) {
      // пробегаем все элементы списка
      var valueLi = elem.innerHTML; // передаем значение инпута в перменную

      if (valueLi.toUpperCase().indexOf(filter) > -1) {
        // если найденный индекс элемента > 1
        elements[i].style.display = "";
        $(elements[i]).addClass('select_elem_airport');
        $('#' + id_input + '.dropdown_content__item').removeClass('show_drop_content');
      } else {
        elements[i].style.display = "none";
        $('#' + id_input + '.dropdown_content__item').addClass('show_drop_content');
      }
    });
  }

  function moveCaretToEnd(el) {
    if (typeof el.selectionStart == "number") {
      el.selectionStart = el.selectionEnd = el.value.length;
    } else if (typeof el.createTextRange != "undefined") {
      var range = el.createTextRange();
      range.collapse(false);
      range.select();
    }
  }

  function searchСountryOfIssue(id_input, filter, elements) {
    $(elements).each(function (i, elem) {
      // пробегаем все элементы списка
      var valueLi = elem.innerHTML; // передаем значение инпута в перменную

      if ($('.country_of_issue_list').length) {
        if (valueLi.toUpperCase().indexOf(filter) > -1) {
          // если найденный индекс элемента > 1
          elements[i].style.display = "";
          $(elements[i]).addClass('select_list__item');
        } else {
          elements[i].style.display = "none";
          $(elements[i]).removeClass('select_list__item');
        }

        if (valueLi.toUpperCase() === $('#input_country_of_issue').val().toUpperCase()) {
          $('.country_of_issue_list').removeClass('show_drop_content');
          input_country_of_issue.val(valueLi);
        }
      }

      if ($('.personal_data_block__update_form__country_of_issue_list').length) {
        if (valueLi.toUpperCase().indexOf(filter) > -1) {
          // если найденный индекс элемента > 1
          elements[i].style.display = "";
          $(elements[i]).addClass('select_list__item');
        } else {
          elements[i].style.display = "none";
          $(elements[i]).removeClass('select_list__item');
        }

        if (valueLi.toUpperCase() === $('#country_of_issue_user').val().toUpperCase()) {
          $('.personal_data_block__update_form__country_of_issue_list').removeClass('show_drop_content');
          $('#country_of_issue_user').val(valueLi);
        }
      }
    });
  }

  window.addEventListener('click', function (e) {
    // при клике в любом месте окна браузера
    var target = e.target; // находим элемент, на котором был клик

    if (!target.closest('.search_tickets_block')) {
      $('.form_search_block_inputs').removeClass('block_inputs_active');
      $('.back_data').removeClass('non_click_input');
      $('#id_i_d_t_block').removeClass('calendar_active');

      if (!target.closest('.geo_posistion_people')) {
        $('.nav_menu .geo_posistion_people').removeAttr('style');
        $('.geo_posistion_people').removeClass('geo_posistion_people__active');
        $('.language_currency').removeClass('language_currency_active');
      }

      if (!target.closest('.input_count_pass_block')) {
        $('.drop_count_pass').removeClass('show_drop_content');
        $('#dropbtn_count_pass').removeClass('rotate_180');

        if (target.closest('.drop_count_pass')) {
          $('.drop_count_pass').addClass('show_drop_content');
          $('#dropbtn_count_pass').addClass('rotate_180');
          $('.nav_menu .geo_posistion_people').removeAttr('style');
          $('.geo_posistion_people').removeClass('geo_posistion_people__active');
          $('.language_currency').removeClass('language_currency_active');
        }
      }

      if (!target.closest('#dropbtn_from_flights')) {
        $('#dropbtn_from_flights').removeClass('rotate_180');
        $('.drop_from_flights').removeClass('show_drop_content');

        if (target.closest('#id_i_s_f_f')) {
          $('.drop_from_flights').addClass('show_drop_content');
          $(dropbtn_from_flights).addClass('rotate_180');
          $('.nav_menu .geo_posistion_people').removeAttr('style');
          $('.geo_posistion_people').removeClass('geo_posistion_people__active');
        }
      }

      if (!target.closest('#dropbtn_to_flights')) {
        $('#dropbtn_to_flights').removeClass('rotate_180');
        $('.drop_to_flights').removeClass('show_drop_content');

        if (target.closest('#id_i_s_f_t')) {
          $('.drop_to_flights').addClass('show_drop_content');
          $(dropbtn_to_flights).addClass('rotate_180');
          $('.nav_menu .geo_posistion_people').removeAttr('style');
          $('.geo_posistion_people').removeClass('geo_posistion_people__active');
          $('.language_currency').removeClass('language_currency_active');
        }
      }

      if (!target.closest('.fa-bars')) {
        if (!$('.fa-times').hasClass('non_view')) {
          $('.fa-bars').removeClass('non_view');
          $('.fa-times').addClass('non_view');
          $('.nav_menu .geo_posistion_people').removeAttr('style');
          $('.geo_posistion_people').removeClass('geo_posistion_people__active');
          $('.language_currency').removeClass('language_currency_active');
        }

        if (target.closest('.geo_posistion_people')) {
          $('.geo_posistion_people').click();
        }

        if (!target.closest('.additional_sub_menu__view .container')) {
          $('.additional_sub_menu').removeClass('additional_sub_menu__view');
        }
      }

      if (!target.closest('#dropbtn_prefix_phone')) {
        var dropbtn_prefix_phone = $('#dropbtn_prefix_phone');

        if (target.closest('.form_auth_input[id="prefix_phone"]')) {
          if (!$('.prefix_phone_list').hasClass('show_drop_content')) {
            showdropDownListCitiesSearchFlights(dropbtn_prefix_phone, $('.prefix_phone_list'));
          } else {
            $('.prefix_phone_list').removeClass('show_drop_content');
            dropbtn_prefix_phone.removeClass('rotate_180');
          }
        } else {
          $('.prefix_phone_list').removeClass('show_drop_content');
          $(dropbtn_prefix_phone).removeClass('rotate_180');
        }
      }

      if (!target.closest('#dropbtn_gender_code')) {
        var dropbtn_gender_code = $('#dropbtn_gender_code');

        if (target.closest('.form_auth_input[id="gender_code"]')) {
          if (!$('.gender_code_list').hasClass('show_drop_content')) {
            showdropDownListCitiesSearchFlights(dropbtn_gender_code, $('.gender_code_list'));
          } else {
            $('.gender_code_list').removeClass('show_drop_content');
            dropbtn_gender_code.removeClass('rotate_180');
          }
        } else {
          $('.gender_code_list').removeClass('show_drop_content');
          $(dropbtn_gender_code).removeClass('rotate_180');
        }
      }

      if (!target.closest('#dropbtn_type_document')) {
        var dropbtn_type_document = $('#dropbtn_type_document');

        if (target.closest('.form_auth_input[id="type_document"]')) {
          if (!$('.type_document_list').hasClass('show_drop_content')) {
            showdropDownListCitiesSearchFlights(dropbtn_type_document, $('.type_document_list'));
          } else {
            $('.type_document_list').removeClass('show_drop_content');
            dropbtn_type_document.removeClass('rotate_180');
          }
        } else {
          $('.type_document_list').removeClass('show_drop_content');
          $(dropbtn_type_document).removeClass('rotate_180');
        }
      }

      if (!target.closest('#dropbtn_country_of_issue')) {
        var dropbtn_country_of_issue = $('#dropbtn_country_of_issue');

        if (target.closest('.form_auth_input[id="input_country_of_issue"]')) {
          $('.form_auth_input[id="input_country_of_issue"]').autocomplete = 'off';
          ;

          if (!$('.country_of_issue_list').hasClass('show_drop_content')) {
            showdropDownListCitiesSearchFlights(dropbtn_country_of_issue, $('.country_of_issue_list'));
          } else {
            $('.country_of_issue_list').removeClass('show_drop_content');
            dropbtn_country_of_issue.removeClass('rotate_180');
          }
        } else {
          $('.country_of_issue_list').removeClass('show_drop_content');
          $(dropbtn_country_of_issue).removeClass('rotate_180');
        }
      }

      if (!target.closest('#dropbtn_gender_user')) {
        var dropbtn_country_of_issue = $('#dropbtn_gender_user');

        if (target.closest('#gender_user')) {
          $('#gender_user').autocomplete = 'off';

          if (!$('.personal_data_block__update_form__gender_list').hasClass('show_drop_content')) {
            showdropDownListCitiesSearchFlights($('#dropbtn_gender_user'), $('.personal_data_block__update_form__gender_list'));
            $('.personal_data_block__update_form__gender_list').addClass('show_drop_content');
          } else {
            $('.personal_data_block__update_form__gender_list').removeClass('show_drop_content');
            $('#dropbtn_gender_user').removeClass('rotate_180');
            $('#dropbtn_gender_user').removeAttr('style');
          }
        } else {
          $('.personal_data_block__update_form__gender_list').removeClass('show_drop_content');
          $('#dropbtn_gender_user').removeClass('rotate_180');
          $('#dropbtn_gender_user').removeAttr('style');
        }
      }

      if (!target.closest('#dropbtn_type_document_user')) {
        var dropbtn_country_of_issue = $('#dropbtn_type_document_user');

        if (target.closest('#type_document_user')) {
          $('#type_document_user').autocomplete = 'off';

          if (!$('.personal_data_block__update_form__type_document_list').hasClass('show_drop_content')) {
            showdropDownListCitiesSearchFlights($('#dropbtn_type_document_user'), $('.personal_data_block__update_form__type_document_list'));
            $('.personal_data_block__update_form__type_document_list').addClass('show_drop_content');
          } else {
            $('.personal_data_block__update_form__type_document_list').removeClass('show_drop_content');
            $('#dropbtn_type_document_user').removeClass('rotate_180');
            $('#dropbtn_type_document_user').removeAttr('style');
          }
        } else {
          $('.personal_data_block__update_form__type_document_list').removeClass('show_drop_content');
          $('#dropbtn_type_document_user').removeClass('rotate_180');
          $('#dropbtn_type_document_user').removeAttr('style');
        }
      }

      if (!target.closest('#dropbtn_country_of_issue_user')) {
        var dropbtn_country_of_issue = $('#dropbtn_country_of_issue_user');

        if (target.closest('#country_of_issue_user')) {
          $('#country_of_issue_user').autocomplete = 'off';

          if (!$('.personal_data_block__update_form__country_of_issue_list').hasClass('show_drop_content')) {
            showdropDownListCitiesSearchFlights($('#dropbtn_country_of_issue_user'), $('.personal_data_block__update_form__country_of_issue_list'));
            $('.personal_data_block__update_form__country_of_issue_list').addClass('show_drop_content');
          } else {
            $('.personal_data_block__update_form__country_of_issue_list').removeClass('show_drop_content');
            $('#dropbtn_type_document_user').removeClass('rotate_180');
            $('#dropbtn_type_document_user').removeAttr('style');
          }
        } else {
          $('.personal_data_block__update_form__country_of_issue_list').removeClass('show_drop_content');
          $('#dropbtn_country_of_issue_user').removeClass('rotate_180');
          $('#dropbtn_country_of_issue_user').removeAttr('style');
        }
      }
    }
  });
  $('.btn_additional_menu').click(function () {
    if (!$('.additional_sub_menu').hasClass('additional_sub_menu__view')) {
      $('.additional_sub_menu').addClass('additional_sub_menu__view');
      $('.btn_additional_menu .fa-bars').addClass('non_view');
      $('.btn_additional_menu .fa-times').removeClass('non_view');

      if (screenWidth <= 780) {
        $('.desktop_section').addClass('non_view');
      }
    } else {
      $('.additional_sub_menu').removeClass('additional_sub_menu__view');
      $('.btn_additional_menu .fa-bars').removeClass('non_view');
      $('.btn_additional_menu .fa-times').addClass('non_view');

      if (screenWidth <= 780) {
        $('.desktop_section').removeClass('non_view');
        $('.popup_fade').addClass('non_view');
        $('.popup_modal').addClass('non_view');
      }
    }
  });
  $('.geo_posistion_people').click(function (e) {
    $('.drop_count_pass').removeClass('show_drop_content');
    $('#dropbtn_count_pass').removeClass('rotate_180');

    if (!$(this).hasClass('geo_posistion_people__active')) {
      $('.geo_posistion_people').addClass('geo_posistion_people__active');

      if (!$('.language_currency').hasClass('language_currency_active')) {
        $('.language_currency').addClass('language_currency_active');
        $('.geo_posistion_people').css('color', '#52C9B9');
      } else {
        $('.language_currency').removeClass('language_currency_active');
        $('.geo_posistion_people').removeAttr('style');
      }
    } else {
      var child = $('.geo_posistion_people').find($(e.target));

      if (child == null) {
        $('.geo_posistion_people').removeClass('geo_posistion_people__active');
      }
    }
  });
  $('input[name="radio_lang"]').change(function () {// изменения языка сайта
  });
  $('input[name="radio_currency"]').change(function () {// изменение валюты на сайте
  }); // октрытие модального окна на странице поиска билетов и информации о пассажирах

  $('#btn_open__popup').click(function (e) {
    e.preventDefault();
    $('body').addClass('body_popup__open');
    $('.popup_fade').removeClass('non_view');
    $('.popup_modal').removeClass('non_view');
  }); // закрытие модального окна

  $('#btn_popup_close').click(function (e) {
    e.preventDefault();
    $('body').removeClass('body_popup__open');
    $('.popup_fade').addClass('non_view');
    $('.popup_modal').addClass('non_view');
  });
});
/******/ })()
;
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/js/app.js":
/*!************************************!*\
  !*** ./resources/assets/js/app.js ***!
  \************************************/
/***/ (() => {

$(document).ready(function () {
  // переменные
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
  var dropbtn_country_of_issue = $('#dropbtn_country_of_issue'); // функции

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

  $('.btn_additional_menu').click(function () {
    if (!$('.additional_sub_menu').hasClass('additional_sub_menu__view')) {
      $('.additional_sub_menu').addClass('additional_sub_menu__view');
      $('.btn_additional_menu .fa-bars').addClass('non_view');
      $('.btn_additional_menu .fa-times').removeClass('non_view');
    } else {
      $('.additional_sub_menu').removeClass('additional_sub_menu__view');
      $('.btn_additional_menu .fa-bars').removeClass('non_view');
      $('.btn_additional_menu .fa-times').addClass('non_view');
    }
  });
  flights_list_item.click(function () {
    $('.nav_menu .geo_posistion_people').removeAttr('style');
    $('.geo_posistion_people').removeClass('geo_posistion_people__active');
    $('.language_currency').removeClass('language_currency_active');

    if ($(this).hasClass('check_in')) {
      $('.check_in_block').removeClass('non_view');
      $('.form_search_block_inputs').removeClass('block_inputs_active');
      $('.form_search_block_inputs').addClass('non_view');
    } else if ($(this).hasClass('buy_ticket')) {
      $('.check_in_block').addClass('non_view');
      $('.form_search_block_inputs').removeClass('non_view');
    }

    $('.flights_list_item').each(function (i, elem) {
      $(elem).removeClass('active_flights_list_item');
    });
    $(this).addClass('active_flights_list_item');
    $('.dropdown_content').each(function (i, elem) {
      $(elem).removeClass('show_drop_content');
    });
  });
  dropbtn_from_flights.click(function () {
    $('.drop_to_flights').removeClass('show_drop_content');
    $('.drop_count_pass').removeClass('show_drop_content');
    $('.language_currency').removeClass('language_currency_active');
    $(dropbtn_to_flights).removeClass('rotate_180');
    $('#dropbtn_count_pass').removeClass('rotate_180');
    $('.nav_menu .geo_posistion_people').removeAttr('style');
    $('.geo_posistion_people').removeClass('geo_posistion_people__active');
    var drop_from_flights_elem = $('.drop_from_flights');
    input_search_from_flights.focus();
    moveCaretToEnd(input_search_from_flights);

    if (!$(drop_from_flights_elem).hasClass('show_drop_content')) {
      $(drop_from_flights_elem).addClass('show_drop_content');
      showdropDownListCitiesSearchFlights(dropbtn_from_flights, drop_from_flights_elem);
    } else {
      $(drop_from_flights_elem).removeClass('show_drop_content');
      $(dropbtn_from_flights).removeClass('rotate_180');
    }
  });
  dropbtn_to_flights.click(function () {
    $('.drop_from_flights').removeClass('show_drop_content');
    $('.drop_count_pass').removeClass('show_drop_content');
    $('.language_currency').removeClass('language_currency_active');
    $(dropbtn_from_flights).removeClass('rotate_180');
    $('#dropbtn_count_pass').removeClass('rotate_180');
    $('.nav_menu .geo_posistion_people').removeAttr('style');
    $('.geo_posistion_people').removeClass('geo_posistion_people__active');
    input_search_to_flights.focus();
    moveCaretToEnd(input_search_to_flights);
    var dropbtn_to_flights_elem = $('.drop_to_flights');

    if (!$(dropbtn_to_flights_elem).hasClass('show_drop_content')) {
      showdropDownListCitiesSearchFlights(dropbtn_to_flights, dropbtn_to_flights_elem);
    } else {
      $(dropbtn_to_flights_elem).removeClass('show_drop_content');
      $(dropbtn_to_flights).removeClass('rotate_180');
    }
  });
  input_search_from_flights.click(function () {
    $('.drop_to_flights').removeClass('show_drop_content');
    $(dropbtn_to_flights).removeClass('rotate_180');
    $('.drop_count_pass').removeClass('show_drop_content');
    $('.language_currency').removeClass('language_currency_active');
    $('#dropbtn_count_pass').removeClass('rotate_180');
    $('.nav_menu .geo_posistion_people').removeAttr('style');
    $('.geo_posistion_people').removeClass('geo_posistion_people__active');
    var drop_from_flights_elem = $('.drop_from_flights');

    if (!$('.drop_from_flights').hasClass('show_drop_content')) {
      showdropDownListCitiesSearchFlights(dropbtn_from_flights, drop_from_flights_elem);
    }
  });
  input_search_to_flights.click(function () {
    $('.drop_from_flights').removeClass('show_drop_content');
    $('.drop_count_pass').removeClass('show_drop_content');
    $('.language_currency').removeClass('language_currency_active');
    $(dropbtn_from_flights).removeClass('rotate_180');
    $('#dropbtn_count_pass').removeClass('rotate_180');
    $('.nav_menu .geo_posistion_people').removeAttr('style');
    $('.geo_posistion_people').removeClass('geo_posistion_people__active');
    var drop_to_flights_elem = $('.drop_to_flights');

    if (!$('.drop_to_flights').hasClass('show_drop_content')) {
      showdropDownListCitiesSearchFlights(dropbtn_to_flights, drop_to_flights_elem);
    }
  });
  $('.form_search_block_inputs').click(function () {
    $('.form_search_block_inputs').removeClass('block_inputs_active');
    $('.nav_menu .geo_posistion_people').removeAttr('style');
    $('.geo_posistion_people').removeClass('geo_posistion_people__active');
    $('.language_currency').removeClass('language_currency_active');

    if ($(this).hasClass('back_data')) {
      $('#id_i_d_t_block').addClass('block_inputs_active');
      $('#id_i_d_b_block').addClass('block_inputs_active');

      if (!$('.back_data').hasClass('non_click_input')) {
        $('#id_i_d_t').click();
        $('.back_data').addClass('non_click_input');
        console.log("есть клик");
      }
    } else if (!$(this).hasClass('there_data') && !$(this).hasClass('btn_search_block')) {
      $(this).addClass('block_inputs_active');
    } else if ($(this).hasClass('there_data')) {
      $('#id_i_d_t_block').addClass('block_inputs_active');
      $('#id_i_d_b_block').addClass('block_inputs_active');
    }
  });
  $('.drop_from_flights .dropdown_content__item').click(function (e) {
    var city_name = $.trim($(this).children('.info_country').children('.city_name').text());
    var airport_name = $.trim($(this).children('.airport_name').text());
    var new_value_elem = city_name + " (" + airport_name + ")";
    $('#id_i_s_f_f').val(new_value_elem);
    $('.drop_from_flights').removeClass('show_drop_content');
    $('.drop_from_flights .dropdown_content__item').removeClass('select_elem_airport');
    $(this).addClass("select_elem_airport");
  });
  $('.drop_to_flights .dropdown_content__item').click(function (e) {
    var city_name = $.trim($(this).children('.info_country').children('.city_name').text());
    var airport_name = $.trim($(this).children('.airport_name').text());
    var new_value_elem = city_name + " (" + airport_name + ")";
    $('#id_i_s_f_t').val(new_value_elem);
    $('.drop_to_flights').removeClass('show_drop_content');
    $('.drop_to_flights .dropdown_content__item').removeClass('select_elem_airport');
    $(this).addClass("select_elem_airport");
  });
  input_search_from_flights.keyup(function () {
    var id_input = $(this).attr("id");
    var filter = $(this).val().toUpperCase(); // приводим все к верхнему регистру

    var elements = $('.drop_from_flights .dropdown_content__item'); // все элементы с классом dropdown-content--item

    searchInFlightsList(id_input, filter, elements);

    if ($(this).val() === "") {
      $(elements).removeClass('select_elem_airport');
    }
  });
  input_search_to_flights.keyup(function () {
    var id_input = $(this).attr("id");
    var filter = $(this).val().toUpperCase(); // приводим все к верхнему регистру

    var elements = $('.drop_to_flights .dropdown_content__item'); // все элементы с классом dropdown-content--item

    searchInFlightsList(id_input, filter, elements);

    if ($(this).val() === "") {
      $(elements).removeClass('select_elem_airport');
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
  });
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

      if (!target.closest('.fa-bars')) {
        if (!$('.fa-times').hasClass('non_view')) {
          $('.fa-bars').removeClass('non_view');
          $('.fa-times').addClass('non_view');
          $('.additional_sub_menu').removeClass('additional_sub_menu__view');
          $('.nav_menu .geo_posistion_people').removeAttr('style');
          $('.geo_posistion_people').removeClass('geo_posistion_people__active');
          $('.language_currency').removeClass('language_currency_active');
        }

        if (target.closest('.geo_posistion_people')) {
          $('.geo_posistion_people').click();
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
    }
  });
  input_count_pass_block.click(function () {
    $('.drop_from_flights').removeClass('show_drop_content');
    $('.drop_to_flights').removeClass('show_drop_content');
    $('.language_currency').removeClass('language_currency_active');
    $(dropbtn_from_flights).removeClass('rotate_180');
    $(dropbtn_to_flights).removeClass('rotate_180');
    var drop_count_pass_elem = $('.drop_count_pass');

    if (!$(drop_count_pass_elem).hasClass('show_drop_content')) {
      $(drop_count_pass_elem).addClass('show_drop_content');
      $('#dropbtn_count_pass').addClass('rotate_180');
    } else {
      $(drop_count_pass_elem).removeClass('show_drop_content');
      $('#dropbtn_count_pass').removeClass('rotate_180');
    }
  }); // календари

  $('#id_i_d_t').click(function () {
    $('.drop_from_flights').removeClass('show_drop_content');
    $('.drop_to_flights').removeClass('show_drop_content');
    $('.drop_count_pass').removeClass('show_drop_content');
    $('.language_currency').removeClass('language_currency_active');

    if (!$('#id_i_d_t_block').hasClass('calendar_active')) {
      $('#id_i_d_t_block').addClass('calendar_active');
      $('.back_data').addClass('non_click_input');
    }
  });
  $('#id_i_d_t').daterangepicker({
    autoUpdateInput: false,
    locale: {
      cancelLabel: 'Clear'
    }
  });
  $('#id_i_d_t').on('apply.daterangepicker', function (ev, picker) {
    $(this).val(picker.startDate.format('MM/DD/YYYY'));
    $('#id_i_d_b').val(picker.endDate.format('MM/DD/YYYY'));
    $('#id_i_d_t_block').removeClass('block_inputs_active');
    $('#id_i_d_b_block').removeClass('block_inputs_active');
  });
  $('#id_i_d_t').on('cancel.daterangepicker', function (ev, picker) {
    $(this).val('Туда:');
    $('#id_i_d_b').val('Обратно:');
    $('#id_i_d_t_block').removeClass('block_inputs_active');
    $('#id_i_d_b_block').removeClass('block_inputs_active');
  });
  $('#id_i_d_b').click(function (e) {
    e.preventDefault();
    $('#id_i_d_t').click();
  }); // счетчик кол-ва пассажиров на форме поиска билетов

  var btn_minus_old = $('#btn_minus_old');
  var btn_plus_old = $('#btn_plus_old');
  var btn_minus_kids = $('#btn_minus_kids');
  var btn_plus_kids = $('#btn_plus_kids');
  var btn_minus_baby = $('#btn_minus_baby');
  var btn_plus_baby = $('#btn_plus_baby');
  var old_count_pass = $('#old_count_pass');
  var kids_count_pass = $('#kids_count_pass');
  var baby_count_pass = $('#baby_count_pass');

  function countPassInput() {
    var old_count_pass = Number($('#old_count_pass').text());
    var kids_count_pass = Number($('#kids_count_pass').text());
    var baby_count_pass = Number($('#baby_count_pass').text());
    var new_value = old_count_pass + kids_count_pass + baby_count_pass;

    if (new_value == 1) {
      var new_value_input = new_value + " пассажир";
      $(input_count_pass).val(new_value_input);
    } else if (new_value < 5 && new_value != 0) {
      var new_value_input = new_value + " пассажира";
      $(input_count_pass).val(new_value_input);
    } else if (new_value == 21) {
      var new_value_input = new_value + " пассажир";
      $(input_count_pass).val(new_value_input);
    } else if (new_value >= 5 && new_value < 21) {
      var new_value_input = new_value + " пассажиров";
      $(input_count_pass).val(new_value_input);
    } else if (new_value == 0) {
      var new_value_input = new_value + " пассажиров";
      $(input_count_pass).val(new_value_input);
    } else if (new_value >= 5 && new_value > 21) {
      var new_value_input = new_value + " пассажира";
      $(input_count_pass).val(new_value_input);
    }
  }

  ;
  btn_plus_old.click(function (e) {
    e.preventDefault();
    var old_count_pass_value = Number(old_count_pass.text());

    if (Number(old_count_pass_value) == 9) {
      old_count_pass.text("9");
    } else {
      var new_value = old_count_pass_value + 1;
      old_count_pass.text(new_value);
      countPassInput();
    }
  });
  btn_minus_old.click(function (e) {
    e.preventDefault();
    var old_count_pass_value = Number(old_count_pass.text());

    if (Number(old_count_pass_value) == 0) {
      old_count_pass.text("0");
    } else {
      var new_value = old_count_pass_value - 1;
      old_count_pass.text(new_value);
      countPassInput();
    }
  });
  btn_plus_kids.click(function (e) {
    e.preventDefault();
    var kids_count_pass_value = Number(kids_count_pass.text());

    if (Number(kids_count_pass_value) == 9) {
      kids_count_pass.text("9");
    } else {
      var new_value = kids_count_pass_value + 1;
      kids_count_pass.text(new_value);
      countPassInput();
    }
  });
  btn_minus_kids.click(function (e) {
    e.preventDefault();
    var kids_count_pass_value = Number(kids_count_pass.text());

    if (Number(kids_count_pass_value) == 0) {
      kids_count_pass.text("0");
    } else {
      var new_value = kids_count_pass_value - 1;
      kids_count_pass.text(new_value);
      countPassInput();
    }
  });
  btn_plus_baby.click(function (e) {
    e.preventDefault();
    var baby_count_pass_value = Number(baby_count_pass.text());

    if (Number(baby_count_pass_value) == 9) {
      baby_count_pass.text("9");
    } else {
      var new_value = baby_count_pass_value + 1;
      baby_count_pass.text(new_value);
      countPassInput();
    }
  });
  btn_minus_baby.click(function (e) {
    e.preventDefault();
    var baby_count_pass_value = Number(baby_count_pass.text());

    if (Number(baby_count_pass_value) == 0) {
      kids_count_pass.text("0");
    } else {
      var new_value = baby_count_pass_value - 1;
      baby_count_pass.text(new_value);
      countPassInput();
    }
  });
  dropbtn_prefix_phone.click(function (e) {
    e.preventDefault();

    if (!$('.prefix_phone_list').hasClass('show_drop_content')) {
      showdropDownListCitiesSearchFlights(this, $('.prefix_phone_list'));
    } else {
      $('.prefix_phone_list').removeClass('show_drop_content');
      $(this).removeClass('rotate_180');
    }
  });
  $("#phone").mask("(999)999-999-9", {
    completed: function completed() {
      console.log("харош");
    }
  });
  $('.prefix_phone_list__item').click(function () {
    var prefix_phone__text = $(this).text();
    $('#prefix_phone').val(prefix_phone__text);
    $('.prefix_phone_list__item').removeClass('select_list__item');
    $(this).addClass('select_list__item');
    var str_mask = "(";

    for (var index = 0; index < Number($(this).attr('data-count-number-phone-not-prefix')); index++) {
      if (str_mask.length == 4) {
        str_mask += ")";
      }

      if (str_mask.length == 8) {
        str_mask += "-";
      }

      if (str_mask.length == 12) {
        str_mask += "-";
      }

      str_mask += "9";
    }

    $("#phone").mask(str_mask, {
      completed: function completed() {
        console.log("харош");
      }
    });
  });
  dropbtn_gender_code.click(function (e) {
    e.preventDefault();

    if (!$('.gender_code_list').hasClass('show_drop_content')) {
      showdropDownListCitiesSearchFlights(this, $('.gender_code_list'));
    } else {
      $('.gender_code_list').removeClass('show_drop_content');
      $(this).removeClass('rotate_180');
    }
  });
  $('.gender_code_list__item').click(function () {
    var gender_code__text = $(this).text();
    $('#gender_code').val(gender_code__text);
    $('.gender_code_list__item').removeClass('select_list__item');
    $(this).addClass('select_list__item');
  });
  dropbtn_type_document.click(function (e) {
    e.preventDefault();

    if (!$('.type_document_list').hasClass('show_drop_content')) {
      showdropDownListCitiesSearchFlights(this, $('.type_document_list'));
    } else {
      $('.type_document_list').removeClass('show_drop_content');
      $(this).removeClass('rotate_180');
    }
  });
  $('.type_document_list__item').click(function () {
    var type_document__text = $(this).text();
    $('#type_document').val(type_document__text);
    $('.type_document_list__item').removeClass('select_list__item');
    $(this).addClass('select_list__item');
  });
  $("#series_document_number").mask("99 99 999999", {
    completed: function completed() {
      console.log("харош");
    }
  });
  dropbtn_country_of_issue.click(function (e) {
    e.preventDefault();

    if (!$('.country_of_issue_list').hasClass('show_drop_content')) {
      showdropDownListCitiesSearchFlights(this, $('.country_of_issue_list'));
    } else {
      $('.country_of_issue_list').removeClass('show_drop_content');
      $(this).removeClass('rotate_180');
    }
  });
  $('.country_of_issue_list__item').click(function () {
    var type_country__text = $(this).text();
    $('#input_country_of_issue').val(type_country__text);
    $('.country_of_issue_list__item').removeClass('select_list__item');
    $(this).addClass('select_list__item');
  });

  function searchСountryOfIssue(id_input, filter, elements) {
    $(elements).each(function (i, elem) {
      // пробегаем все элементы списка
      var valueLi = elem.innerHTML; // передаем значение инпута в перменную

      if (valueLi.toUpperCase().indexOf(filter) > -1) {
        // если найденный индекс элемента > 1
        elements[i].style.display = "";
        $(elements[i]).addClass('select_list__item');
        $('.country_of_issue_list').addClass('show_drop_content');
        $('#' + id_input + '.country_of_issue_list__item').removeClass('show_drop_content');
      } else {
        elements[i].style.display = "none"; // $(elements[i]).removeAttr('style');

        $(elements[i]).removeClass('select_list__item');
        $('#' + id_input + '.country_of_issue_list__item').addClass('show_drop_content');
      }
    });
  }

  input_country_of_issue.keyup(function () {
    var id_input = $(this).attr("id");
    var filter = $(this).val().toUpperCase(); // приводим все к верхнему регистру

    var elements = $('.country_of_issue_list .country_of_issue_list__item'); // все элементы с классом dropdown-content--item

    searchСountryOfIssue(id_input, filter, elements);

    if ($(this).val() === "") {
      $(elements).removeClass('select_list__item');
    }
  });
  $('#complete_contact_data').click(function (e) {
    e.preventDefault();
    $('.form_auth_contact_data').addClass('form_auth_card__anim');
    $('#auth_block_btn').addClass('form_auth_block__anim');
    $('#auth_block_btn').css('margin-top', 'auto');
    setTimeout(function () {
      $('#main_form_auth').animate({
        minHeight: "675px"
      }, 500);
      setTimeout(function () {
        $('.form_auth_profile_data').css('display', "block");
      }, 650);
      $('.form_auth_profile_data').animate({
        marginLeft: "0px",
        opacity: "1"
      }, 1200);
      $('.form_auth_contact_data').animate({
        marginLeft: "-1500px"
      }, 700);
      setTimeout(function () {
        $('.form_auth_profile_data').removeClass('form_auth_non_view');
        $('.stages_list__item').removeClass('stages_list__item_active');
        $('.stages_list__item:nth-child(2)').addClass('stages_list__item_active');
        $('#auth_block_btn').removeClass('form_auth_block__anim');
      }, 1380);
      setTimeout(function () {
        // $('.form_auth_contact_data').css('display','none');
        $('.form_auth_contact_data').addClass('form_auth_card__complete_anim');
        $('.form_auth_contact_data').removeAttr('style');
      }, 500);
    }, 500);
    setTimeout(function () {
      $('#auth_block_btn').removeAttr('style');
    }, 1800);
  });
  $('#complete_profile_data').click(function (e) {
    e.preventDefault();
    $('.form_auth_profile_data').removeAttr('style');
    $('.form_auth_profile_data').addClass('form_auth_card__anim');
    $('#auth_block_btn').addClass('form_auth_block__anim');
    $('#auth_block_btn').css('margin-top', 'auto');
    setTimeout(function () {
      $('#main_form_auth').animate({
        minHeight: "335px"
      }, 500);
      setTimeout(function () {
        $('.form_auth_password_data').css('display', "block");
      }, 650);
      $('.form_auth_password_data').animate({
        marginLeft: "0px",
        opacity: "1"
      }, 1200);
      $('.form_auth_profile_data').animate({
        marginLeft: "-1500px"
      }, 700);
      setTimeout(function () {
        $('.form_auth_password_data').removeClass('form_auth_non_view');
        $('.stages_list__item').removeClass('stages_list__item_active');
        $('.stages_list__item:nth-child(3)').addClass('stages_list__item_active');
        $('#auth_block_btn').removeClass('form_auth_block__anim');
      }, 1380);
      setTimeout(function () {
        // $('.form_auth_contact_data').css('display','none');
        $('.form_auth_profile_data').addClass('form_auth_card__complete_anim');
        $('.form_auth_profile_data').removeAttr('style');
      }, 700);
    }, 500);
    setTimeout(function () {
      $('#auth_block_btn').removeAttr('style');
    }, 1800);
  });
  $('#complete_password_data').click(function (e) {
    e.preventDefault();
    $('.form_auth_password_data').removeAttr('style');
    $('.form_auth_password_data').addClass('form_auth_card__anim');
    $('#auth_block_btn').addClass('form_auth_block__anim');
    $('#auth_block_btn').css('margin-top', 'auto');
    setTimeout(function () {
      $('#main_form_auth').animate({
        minHeight: "660px"
      }, 500);
      setTimeout(function () {
        $('.form_auth_finish_data').css('display', "block");
      }, 650);
      $('.form_auth_finish_data').animate({
        marginLeft: "0px",
        opacity: "1"
      }, 1200);
      $('.form_auth_password_data').animate({
        marginLeft: "-1500px"
      }, 700);
      setTimeout(function () {
        $('.form_auth_finish_data').removeClass('form_auth_non_view');
        $('.stages_list__item').removeClass('stages_list__item_active');
        $('.stages_list__item:nth-child(4)').addClass('stages_list__item_active');
        $('#auth_block_btn').removeClass('form_auth_block__anim');
      }, 1380);
      setTimeout(function () {
        $('.form_auth_password_data').addClass('form_auth_card__complete_anim');
        $('.form_auth_password_data').removeAttr('style');
      }, 700);
    }, 500);
    setTimeout(function () {
      $('#auth_block_btn').removeAttr('style');
    }, 1800);
  });
  $('#show_passwod').click(function (e) {
    e.preventDefault();

    if (!$(this).hasClass('non_view')) {
      $(this).addClass('non_view');
      $('#input_password').attr('type', 'text');
      $('#hide_passwod').removeClass('non_view');
    }
  });
  $('#hide_passwod').click(function (e) {
    e.preventDefault();

    if (!$(this).hasClass('non_view')) {
      $(this).addClass('non_view');
      $('#input_password').attr('type', 'password');
      $('#show_passwod').removeClass('non_view');
    }
  });
  $('#btn_restart_registered').click(function () {
    location.reload();
  });
});

/***/ }),

/***/ "./resources/assets/sass/style.scss":
/*!******************************************!*\
  !*** ./resources/assets/sass/style.scss ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/assets/sass/auth/auth.scss":
/*!**********************************************!*\
  !*** ./resources/assets/sass/auth/auth.scss ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/assets/js/app": 0,
/******/ 			"assets/css/auth": 0,
/******/ 			"assets/css/style": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["assets/css/auth","assets/css/style"], () => (__webpack_require__("./resources/assets/js/app.js")))
/******/ 	__webpack_require__.O(undefined, ["assets/css/auth","assets/css/style"], () => (__webpack_require__("./resources/assets/sass/style.scss")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["assets/css/auth","assets/css/style"], () => (__webpack_require__("./resources/assets/sass/auth/auth.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
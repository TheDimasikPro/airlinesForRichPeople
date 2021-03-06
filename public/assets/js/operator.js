/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/assets/js/operator.js ***!
  \*****************************************/
$(document).ready(function () {
  function searchInFlightsList(id_input, filter, elements) {
    $(elements).each(function (i, elem) {
      // пробегаем все элементы списка
      var valueLi = elem.innerHTML; // передаем значение инпута в перменную

      if (valueLi.toUpperCase().indexOf(filter) > -1) {
        // если найденный индекс элемента > 1
        elements[i].style.display = "";
        $(elements[i]).addClass('select_elem_airport'); // $('#'+id_input+'.dropdown_content__item').removeClass('show_drop_content');
      } else {
        elements[i].style.display = "none"; // $('#'+id_input+'.dropdown_content__item').addClass('show_drop_content');
      }
    });
  }

  $('#btn_open_navbar_slide').click(function (e) {
    e.preventDefault();
    $('.aside_nav_slide').addClass('aside_nav_slide__open');
    $('.site_overlay').addClass('site_overlay__active');
    $('body').css('overflow', 'hidden');
  });
  $('#btn_close_navbar_slide').click(function (e) {
    e.preventDefault();
    $('.aside_nav_slide').removeClass('aside_nav_slide__open');
    $('.site_overlay').removeClass('site_overlay__active');
    $('body').removeAttr('style');
  });
  $('#dropbtn_airport_start').click(function (e) {
    e.preventDefault();

    if (!$(this).hasClass('rotate_180')) {
      $(this).addClass('rotate_180');
      $('.airport_start__list').addClass('show_drop_content');
    } else {
      $(this).removeClass('rotate_180');
      $('.airport_start__list').removeClass('show_drop_content');
    }
  });
  $('#input_airport_start').click(function (e) {
    e.preventDefault();

    if (!$('#dropbtn_airport_start').hasClass('rotate_180')) {
      $('#dropbtn_airport_start').addClass('rotate_180');
      $('.airport_start__list').addClass('show_drop_content');
    } else {
      $('#dropbtn_airport_start').removeClass('rotate_180');
      $('.airport_start__list').removeClass('show_drop_content');
    }
  });
  $('#dropbtn_airport_end').click(function (e) {
    e.preventDefault();

    if (!$(this).hasClass('rotate_180')) {
      $(this).addClass('rotate_180');
      $('.airport_end__list').addClass('show_drop_content');
    } else {
      $(this).removeClass('rotate_180');
      $('.airport_end__list').removeClass('show_drop_content');
    }
  });
  $('#input_airport_end').click(function (e) {
    e.preventDefault();

    if (!$('#dropbtn_airport_end').hasClass('rotate_180')) {
      $('#dropbtn_airport_end').addClass('rotate_180');
      $('.airport_end__list').addClass('show_drop_content');
    } else {
      $('#dropbtn_airport_end').removeClass('rotate_180');
      $('.airport_end__list').removeClass('show_drop_content');
    }
  });
  $('.airport_start__list__item').click(function (e) {
    e.preventDefault();
    $('.airport_start__list__item').removeClass('select_elem_airport');
    $(this).addClass('select_elem_airport');
    $('#dropbtn_airport_start').removeClass('rotate_180');
    $('.airport_start__list').removeClass('show_drop_content');
    var airport_name = $.trim($(this).children('.info_country').children('.airport_name').text());
    var iata_code = $.trim($(this).children('.iata_code').text());
    var new_value_elem = airport_name + " (" + iata_code + ")";
    $('#input_airport_start').val(new_value_elem); // $('#input_airport_start').val($(this).val());
  });
  $('.airport_end__list__item').click(function (e) {
    e.preventDefault();
    $('.airport_end__list__item').removeClass('select_elem_airport');
    $(this).addClass('select_elem_airport');
    $('#dropbtn_airport_end').removeClass('rotate_180');
    $('.airport_end__list').removeClass('show_drop_content');
    var airport_name = $.trim($(this).children('.info_country').children('.airport_name').text());
    var iata_code = $.trim($(this).children('.iata_code').text());
    var new_value_elem = airport_name + " (" + iata_code + ")";
    $('#input_airport_end').val(new_value_elem); // $('#input_airport_start').val($(this).val());
  });

  $.fn.setCursorPosition = function (pos) {
    if ($(this).get(0).setSelectionRange) {
      $(this).get(0).setSelectionRange(pos, pos);
    } else if ($(this).get(0).createTextRange) {
      var range = $(this).get(0).createTextRange();
      range.collapse(true);
      range.moveEnd('character', pos);
      range.moveStart('character', pos);
      range.select();
    }
  };

  $.mask.definitions['f'] = "[0-2]";
  $.mask.definitions['s'] = "[0-9]";
  $.mask.definitions['z'] = "[0-5]";
  $.mask.definitions['l'] = "[0-9]";
  $('#input_time_start').mask('fs:zl', {
    autoclear: false
  });
  $('#input_time_start').click(function () {
    $(this).setCursorPosition(0);
  });
  $('#input_time_end').mask('fs:zl', {
    autoclear: false
  });
  $('#input_time_end').click(function () {
    $(this).setCursorPosition(0);
  });
  $('#date_start').change(function () {// d=new Date($(this).val());
    // dt=d.getDate();
    // mn=d.getMonth();
    // mn++;
    // yy=d.getFullYear();
    // $('#date_start').val(yy+"-"+mn+"-"+dt);
  });
  $('#date_end').change(function () {// d=new Date($(this).val());
    // dt=d.getDate();
    // mn=d.getMonth();
    // mn++;
    // yy=d.getFullYear();
    // console.log(yy+"-"+mn+"-"+dt);
    // $('#date_end').val(yy+"-"+mn+"-"+dt);
  });
  window.addEventListener('click', function (e) {
    var target = e.target;

    if (!target.closest('#dropbtn_airport_start') && !target.closest('#input_airport_start')) {
      $('#dropbtn_airport_start').removeClass('rotate_180');
      $('.airport_start__list').removeClass('show_drop_content');
    }

    if (!target.closest('#dropbtn_airport_end') && !target.closest('#input_airport_end')) {
      $('#dropbtn_airport_end').removeClass('rotate_180');
      $('.airport_end__list').removeClass('show_drop_content');
    }
  });
  $('#input_airport_start').keyup(function () {
    var id_input = $(this).attr("id");
    var filter = $(this).val().toUpperCase(); // приводим все к верхнему регистру

    var elements = $('.airport_start__list__item'); // все элементы с классом dropdown-content--item

    searchInFlightsList(id_input, filter, elements);

    if ($(this).val() === "") {
      $(elements).removeClass('select_elem_airport');
    }
  });
  $('#input_airport_end').keyup(function () {
    var id_input = $(this).attr("id");
    var filter = $(this).val().toUpperCase(); // приводим все к верхнему регистру

    var elements = $('.airport_end__list__item'); // все элементы с классом dropdown-content--item

    searchInFlightsList(id_input, filter, elements);

    if ($(this).val() === "") {
      $(elements).removeClass('select_elem_airport');
    }
  });
  $('#add_flight').click(function (e) {
    e.preventDefault();
    var count_airport_start_select = $('.airport_start__list__item.select_elem_airport').length;
    var count_airport_end_select = $('.airport_end__list__item.select_elem_airport').length;
    var id_airport_start = $('.airport_start__list__item.select_elem_airport').attr('data-id');
    var id_airport_end = $('.airport_end__list__item.select_elem_airport').attr('data-id');
    var date_start = $('#date_start').val();
    var date_end = $('#date_end').val();
    var time_start = $('#input_time_start').val();
    var time_end = $('#input_time_end').val();
    $('.errors_list .errors_list__item').remove();

    if (count_airport_start_select > 1 || count_airport_start_select == 0) {
      $('.errors_list').removeClass('non_view');
      var error_list__item = document.createElement('li');
      error_list__item.setAttribute('class', 'errors_list__item');
      error_list__item.append('Выберите только 1 аэропорт старта');
      $('.errors_list').append(error_list__item);
    } else if (count_airport_end_select > 1 || count_airport_end_select == 0) {
      $('.errors_list').removeClass('non_view');

      var _error_list__item = document.createElement('li');

      _error_list__item.setAttribute('class', 'errors_list__item');

      _error_list__item.append('Выберите только 1 аэропорт прибытия');

      $('.errors_list').append(_error_list__item);
    } else if (id_airport_start == id_airport_end) {
      $('.errors_list').removeClass('non_view');

      var _error_list__item2 = document.createElement('li');

      _error_list__item2.setAttribute('class', 'errors_list__item');

      _error_list__item2.append('Аэропорт старта не может быть равен аэропорту прибытия');

      $('.errors_list').append(_error_list__item2);
    } else if (date_start == "" || date_end == "" || time_start == "" || time_end == "") {
      $('.errors_list').removeClass('non_view');

      var _error_list__item3 = document.createElement('li');

      _error_list__item3.setAttribute('class', 'errors_list__item');

      _error_list__item3.append('Проверьте заполненность полей. Все поля должны быть заполнены');

      $('.errors_list').append(_error_list__item3);
    } else {
      var formData = new FormData();
      formData.append('id_airport_start', id_airport_start);
      formData.append('id_airport_end', id_airport_end);
      formData.append('date_start', date_start);
      formData.append('date_end', date_end);
      formData.append('time_start', time_start);
      formData.append('time_end', time_end);
      $.ajax({
        headers: {
          'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/edit_future_flights__send',
        type: "POST",
        data: formData,
        dataType: 'JSON',
        contentType: false,
        processData: false,
        beforeSend: function beforeSend() {
          $('.overlay_flight_forms').addClass('overlay_form_active');
        },
        success: function success(data) {
          if (data.status) {
            $('.errors_list').addClass('non_view');
            $('.overlay_flight_forms #fountainG').css('display', 'none');
            $('.overlay_flight_forms .check_mark_flight_forms img').animate({
              height: "70px"
            }, 100);
            $('.overlay_flight_forms .check_mark_flight_forms').addClass('check_mark_flight_forms__active');
            var last_id_list_item = '!.' + (Number($('.flght_table_block .flght_table_block__item:last-child').attr('data-id')) + 1);
            var flght_table_block__item = document.createElement('li');
            flght_table_block__item.setAttribute('data-id', data.temporary_id);
            flght_table_block__item.setAttribute('class', 'flght_table_block__item');
            $('.flght_table_block .flght_table_block__item_title')[0].after(flght_table_block__item);
            var flght_table_block__item__number_row = document.createElement('div');
            flght_table_block__item__number_row.setAttribute('class', 'flght_table_block__item__number_row__ajax');
            flght_table_block__item__number_row.append(data.temporary_id);
            $(flght_table_block__item).append(flght_table_block__item__number_row);
            var flght_table_block__item__info = document.createElement('div');
            flght_table_block__item__info.setAttribute('class', 'flght_table_block__item__info');
            $(flght_table_block__item).append(flght_table_block__item__info);
            var flght_table_block__item__info__flight_number = document.createElement('div');
            flght_table_block__item__info__flight_number.setAttribute('class', 'flght_table_block__item__info__flight_number upper');
            flght_table_block__item__info__flight_number.append(data.flight_code);
            $(flght_table_block__item__info).append(flght_table_block__item__info__flight_number);
            var flght_table_block__item__info__flight_plan = document.createElement('div');
            flght_table_block__item__info__flight_plan.setAttribute('class', 'flght_table_block__item__info__flight_plan');
            $(flght_table_block__item__info).append(flght_table_block__item__info__flight_plan);
            var flght_table_block__item__info__flight_plan__start = document.createElement('div');
            flght_table_block__item__info__flight_plan__start.setAttribute('class', 'flght_table_block__item__info__flight_plan__start');
            $(flght_table_block__item__info__flight_plan).append(flght_table_block__item__info__flight_plan__start);
            var flght_table_block__item__info__flight_plan__start__city = document.createElement('div');
            flght_table_block__item__info__flight_plan__start__city.setAttribute('class', 'flght_table_block__item__info__flight_plan__start__city');
            flght_table_block__item__info__flight_plan__start__city.append(data.airport_start__city_name + ' ' + '(' + data.airport_start__iata_code + ')');
            $(flght_table_block__item__info__flight_plan__start).append(flght_table_block__item__info__flight_plan__start__city);
            var flght_table_block__item__info__flight_plan__start__iata_code_date = document.createElement('div');
            flght_table_block__item__info__flight_plan__start__iata_code_date.setAttribute('class', 'flght_table_block__item__info__flight_plan__start__iata_code_date');
            flght_table_block__item__info__flight_plan__start__iata_code_date.append(data.date_start + ' ' + data.time_start);
            $(flght_table_block__item__info__flight_plan__start).append(flght_table_block__item__info__flight_plan__start__iata_code_date);
            var flght_table_block__item__info__flight_plan__travel_time = document.createElement('div');
            flght_table_block__item__info__flight_plan__travel_time.setAttribute('class', 'flght_table_block__item__info__flight_plan__travel_time');
            flght_table_block__item__info__flight_plan__travel_time.append(data.travel_time);
            $(flght_table_block__item__info__flight_plan).append(flght_table_block__item__info__flight_plan__travel_time);
            var arrow_right = document.createElement('i');
            arrow_right.setAttribute('class', 'fas fa-arrow-right');
            arrow_right.setAttribute('aria-hidden', 'true');
            $(flght_table_block__item__info__flight_plan__travel_time).append(arrow_right);
            var flght_table_block__item__info__flight_plan__end = document.createElement('div');
            flght_table_block__item__info__flight_plan__end.setAttribute('class', 'flght_table_block__item__info__flight_plan__end');
            $(flght_table_block__item__info__flight_plan).append(flght_table_block__item__info__flight_plan__end);
            var flght_table_block__item__info__flight_plan__end__city = document.createElement('div');
            flght_table_block__item__info__flight_plan__end__city.setAttribute('class', 'flght_table_block__item__info__flight_plan__end__city');
            flght_table_block__item__info__flight_plan__end__city.append(data.airport_end__city_name + ' ' + '(' + data.airport_end__iata_code + ')');
            $(flght_table_block__item__info__flight_plan__end).append(flght_table_block__item__info__flight_plan__end__city);
            var flght_table_block__item__info__flight_plan__end__iata_code_date = document.createElement('div');
            flght_table_block__item__info__flight_plan__end__iata_code_date.setAttribute('class', 'flght_table_block__item__info__flight_plan__end__iata_code_date');
            flght_table_block__item__info__flight_plan__end__iata_code_date.append(data.date_end + ' ' + data.time_end);
            $(flght_table_block__item__info__flight_plan__end).append(flght_table_block__item__info__flight_plan__end__iata_code_date);
            var flght_table_block__item__info__flght_price = document.createElement('div');
            flght_table_block__item__info__flght_price.setAttribute('class', 'flght_table_block__item__info__flght_price');
            flght_table_block__item__info__flght_price.append(data.cost + ' ');
            $(flght_table_block__item__info).append(flght_table_block__item__info__flght_price);
            var ruble = document.createElement('i');
            ruble.setAttribute('class', 'fas fa-ruble-sign');
            ruble.setAttribute('aria-hidden', 'true');
            $(flght_table_block__item__info__flght_price).append(ruble);
            var flght_table_block__item__edit = document.createElement('div');
            flght_table_block__item__edit.setAttribute('class', 'flght_table_block__item__edit');
            $(flght_table_block__item).append(flght_table_block__item__edit);
            var flght_table_block__item__edit_btn = document.createElement('button');
            flght_table_block__item__edit_btn.setAttribute('class', 'flght_table_block__item__edit_btn');
            flght_table_block__item__edit_btn.setAttribute('id', 'flight_edit_btn_' + data.temporary_id);
            flght_table_block__item__edit_btn.setAttribute('aria-label', 'flight_edit_btn_' + data.temporary_id);
            $(flght_table_block__item__edit).append(flght_table_block__item__edit_btn);
            var edit_pensil = document.createElement('i');
            edit_pensil.setAttribute('class', 'fas fa-pencil-alt');
            edit_pensil.setAttribute('aria-hidden', 'true');
            $(flght_table_block__item__edit_btn).append(edit_pensil);
            var flght_table_block__item__delete = document.createElement('div');
            flght_table_block__item__delete.setAttribute('class', 'flght_table_block__item__delete');
            $(flght_table_block__item).append(flght_table_block__item__delete);
            var flght_table_block__item__delete_btn = document.createElement('button');
            flght_table_block__item__delete_btn.setAttribute('class', 'flght_table_block__item__delete_btn');
            flght_table_block__item__delete_btn.setAttribute('id', 'flight_delete_btn_' + data.temporary_id);
            flght_table_block__item__delete_btn.setAttribute('aria-label', 'flight_delete_btn_' + data.temporary_id);
            $(flght_table_block__item__delete).append(flght_table_block__item__delete_btn);
            var delete_item = document.createElement('i');
            delete_item.setAttribute('class', 'fas fa-backspace');
            delete_item.setAttribute('aria-hidden', 'true');
            $(flght_table_block__item__delete_btn).append(delete_item);
            setTimeout(function () {
              $('.airport_start__list__item').removeClass('select_elem_airport');
              $('.airport_end__list__item').removeClass('select_elem_airport');
              $('.airport_start__list__item').removeAttr('style');
              $('.airport_end__list__item').removeAttr('style');
              $('.overlay_flight_forms .check_mark_flight_forms img').css('display', 'none');
              $('.overlay_flight_forms .check_mark_flight_forms').removeClass('check_mark_flight_forms__active');
            }, 400);
            setTimeout(function () {
              $('.overlay_flight_forms').removeClass('overlay_form_active');
              $('.overlay_flight_forms #fountainG').removeAttr('style');
              $('#input_airport_start').val('');
              $('#input_airport_end').val('');
              $('#date_start').val('');
              $('#date_end').val('');
              $('#input_time_end').val('');
              $('#input_time_start').val('');
            }, 500);
          } else if (data.type_error == 1) {
            $('.errors_list').removeClass('non_view');
            $('.overlay_flight_forms').removeClass('overlay_form_active');
            Object.keys(data.errors_fields).forEach(function (value_error) {
              var error_list__item = document.createElement('li');
              error_list__item.setAttribute('class', 'errors_list__item');
              error_list__item.append(data.errors_fields[value_error]);
              $('.errors_list').append(error_list__item);
            });
          } else {
            $('.errors_list').removeClass('non_view');
            $('.overlay_flight_forms').removeClass('overlay_form_active');

            var _error_list__item4 = document.createElement('li');

            _error_list__item4.setAttribute('class', 'errors_list__item');

            _error_list__item4.append(data.error_message);

            $('.errors_list').append(_error_list__item4);
          }
        },
        error: function error() {
          $('.errors_list').removeClass('non_view');
          $('.overlay_flight_forms').removeClass('overlay_form_active');
          var error_list__item = document.createElement('li');
          error_list__item.setAttribute('class', 'errors_list__item');
          error_list__item.append('Возникла непредвиденная ошибка. Обновите страницу и попробуйте еще раз');
          $('.errors_list').append(error_list__item);
        }
      });
    }
  });
  var id_elem_delete__arr; // document.querySelector('.flght_table_block__item__delete_btn').addEventListener('click', e => {

  $(document).on("click", "button[class='flght_table_block__item__delete_btn']", function (e) {
    e.preventDefault();
    $('body').addClass('body_popup__open');
    $('.popup_fade').removeClass('non_view');
    $('.popup_modal').removeClass('non_view');
    id_elem_delete__arr = $(this).attr('id').split('_');
  });
  $('#btn_yes').click(function (e) {
    e.preventDefault();
    var id_elem_delete = id_elem_delete__arr[id_elem_delete__arr.length - 1];
    var flight_code_elem_delete__arr = $('.flght_table_block__item[data-id="' + id_elem_delete + '"]').find('.flght_table_block__item__info__flight_number').text();
    var formData = new FormData();
    formData.append('flight_code_delete', flight_code_elem_delete__arr);
    $.ajax({
      headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/edit_future_flights__delete',
      type: "POST",
      data: formData,
      dataType: 'JSON',
      contentType: false,
      processData: false,
      beforeSend: function beforeSend() {
        $('.overlay_popup').addClass('overlay_form_active');
      },
      success: function success(data) {
        if (data.status) {
          $('.overlay_popup #fountainG').css('display', 'none');
          $('.overlay_popup .check_mark_popup img').animate({
            height: "70px"
          }, 100);
          $('.overlay_popup .check_mark_popup').addClass('check_mark_popup__active');
          setTimeout(function () {
            $('body').removeClass('body_popup__open');
            $('.popup_fade').addClass('non_view');
            $('.popup_modal').addClass('non_view');
            $('.overlay_popup').removeClass('overlay_form_active');
            $('.overlay_popup #fountainG').css('display', 'none');
            $('.flght_table_block__item[data-id="' + id_elem_delete + '"]').remove();
            $('.overlay_popup .check_mark_popup').removeClass('check_mark_popup__active');
            $('.overlay_popup .check_mark_popup img').removeAttr('style');
            $('.overlay_popup #fountainG').removeAttr('style');
          }, 800);
        } else {
          $('.overlay_popup').removeClass('overlay_form_active');
          $('.overlay_popup #fountainG').css('display', 'none');
          $('.overlay_popup .check_mark_popup').removeClass('check_mark_popup__active');
          $('.popup_order_block h3').text(data.error_message);
          $('.overlay_popup .check_mark_popup img').removeAttr('style');
          $('.overlay_popup #fountainG').removeAttr('style');
        }
      },
      error: function error() {
        $('.overlay_popup').removeClass('overlay_form_active');
        $('.overlay_popup #fountainG').css('display', 'none');
        $('.overlay_popup .check_mark_popup').removeClass('check_mark_popup__active');
        $('.popup_order_block h3').text("Возникла непредвиденная ошибка. Обновите страницу и попробуйте еще раз");
        $('.overlay_popup .check_mark_popup img').removeAttr('style');
        $('.overlay_popup #fountainG').removeAttr('style');
      }
    });
  });
  $('#btn_no').click(function (e) {
    e.preventDefault();
    $('body').removeClass('body_popup__open');
    $('.popup_fade').addClass('non_view');
    $('.popup_modal').addClass('non_view');
  }); // закрытие модального окна

  $('#btn_popup_close').click(function (e) {
    e.preventDefault();
    $('body').removeClass('body_popup__open');
    $('.popup_fade').addClass('non_view');
    $('.popup_modal').addClass('non_view');
  });
  $(window).on('scroll', function () {
    if ($(this).scrollTop() > 300) {
      $('#btn_scroll_top').removeClass('non_view');
    } else {
      $('#btn_scroll_top').addClass('non_view');
    }
  });
  $('#btn_scroll_top').click(function () {
    $('html, body').animate({
      scrollTop: 0
    }, 50);
  });
  var row;
  var flight_code;
  $(document).on('click', '.flght_table_block__item__edit_btn', function (e) {
    e.preventDefault();
    $('.airport_end__list__item').removeClass('select_elem_airport');
    $('.airport_start__list__item').removeClass('select_elem_airport');
    var last_id_list_item_arr = $(this).attr('id').split('_');
    var last_id_list_item = last_id_list_item_arr[last_id_list_item_arr.length - 1];
    row = $('.flght_table_block__item[data-id="' + last_id_list_item + '"]');
    var start__city = $(row).find('.flght_table_block__item__info__flight_plan__start__city').text().split(' ')[0];
    var end__city = $(row).find('.flght_table_block__item__info__flight_plan__end__city').text().split(' ')[0];
    var start__date = $.trim($(row).find('.flght_table_block__item__info__flight_plan__start__iata_code_date').text()).split(' ')[0];
    var end__date = $.trim($(row).find('.flght_table_block__item__info__flight_plan__end__iata_code_date').text()).split(' ')[0];
    var start__time = $.trim($(row).find('.flght_table_block__item__info__flight_plan__start__iata_code_date').text().split(' ')[1]);
    var end__time = $.trim($(row).find('.flght_table_block__item__info__flight_plan__end__iata_code_date').text().split(' ')[1]);
    var day_start = start__date.split('-')[0];
    var month_start = start__date.split('-')[1];
    var year_start = start__date.split('-')[2];
    var day_end = end__date.split('-')[0];
    var month_end = end__date.split('-')[1];
    var year_end = end__date.split('-')[2];
    flight_code = $.trim($(row).find('.flght_table_block__item__info').find('.flght_table_block__item__info__flight_number').text()); // console.log(flight_code);
    // console.log(row);

    $('#input_airport_start').val(start__city);
    $('#input_airport_end').val(end__city);
    $('#date_start').val(year_start + '-' + month_start + '-' + day_start);
    $('#date_end').val(year_end + '-' + month_end + '-' + day_end);
    $('#input_time_start').val(start__time);
    $('#input_time_end').val(end__time);
    console.log(start__date);
    console.log(year_start + '-' + month_start + '-' + day_start);
    console.log(year_end + '-' + month_end + '-' + day_end);
    var id_input = 'input_airport_start';
    var filter = start__city.toUpperCase(); // приводим все к верхнему регистру

    var elements = $('.airport_start__list__item'); // все элементы с классом dropdown-content--item

    searchInFlightsList(id_input, filter, elements);
    var id_input = 'input_airport_end';
    var filter = end__city.toUpperCase(); // приводим все к верхнему регистру

    var elements = $('.airport_end__list__item'); // все элементы с классом dropdown-content--item

    searchInFlightsList(id_input, filter, elements);
  });
  $('#update_flight').click(function (e) {
    e.preventDefault();
    var count_airport_start_select = $('.airport_start__list__item.select_elem_airport').length;
    var count_airport_end_select = $('.airport_end__list__item.select_elem_airport').length;
    var id_airport_start = $('.airport_start__list__item.select_elem_airport').attr('data-id');
    var id_airport_end = $('.airport_end__list__item.select_elem_airport').attr('data-id');
    var date_start = $('#date_start').val();
    var date_end = $('#date_end').val();
    var time_start = $('#input_time_start').val();
    var time_end = $('#input_time_end').val();
    $('.errors_list .errors_list__item').remove();

    if (count_airport_start_select > 1 || count_airport_start_select == 0) {
      $('.errors_list').removeClass('non_view');
      var error_list__item = document.createElement('li');
      error_list__item.setAttribute('class', 'errors_list__item');
      error_list__item.append('Выберите только 1 аэропорт старта');
      $('.errors_list').append(error_list__item);
    } else if (count_airport_end_select > 1 || count_airport_end_select == 0) {
      $('.errors_list').removeClass('non_view');

      var _error_list__item5 = document.createElement('li');

      _error_list__item5.setAttribute('class', 'errors_list__item');

      _error_list__item5.append('Выберите только 1 аэропорт прибытия');

      $('.errors_list').append(_error_list__item5);
    } else if (id_airport_start == id_airport_end) {
      $('.errors_list').removeClass('non_view');

      var _error_list__item6 = document.createElement('li');

      _error_list__item6.setAttribute('class', 'errors_list__item');

      _error_list__item6.append('Аэропорт старта не может быть равен аэропорту прибытия');

      $('.errors_list').append(_error_list__item6);
    } else if (date_start == "" || date_end == "" || time_start == "" || time_end == "") {
      $('.errors_list').removeClass('non_view');

      var _error_list__item7 = document.createElement('li');

      _error_list__item7.setAttribute('class', 'errors_list__item');

      _error_list__item7.append('Проверьте заполненность полей. Все поля должны быть заполнены');

      $('.errors_list').append(_error_list__item7);
    } else if (flight_code == null) {
      $('.errors_list').removeClass('non_view');

      var _error_list__item8 = document.createElement('li');

      _error_list__item8.setAttribute('class', 'errors_list__item');

      _error_list__item8.append('Вы не выбрали рейс для редактирования');

      $('.errors_list').append(_error_list__item8);
    } else {
      var formData = new FormData();
      formData.append('id_airport_start', id_airport_start);
      formData.append('id_airport_end', id_airport_end);
      formData.append('date_start', date_start);
      formData.append('date_end', date_end);
      formData.append('time_start', time_start);
      formData.append('time_end', time_end);
      formData.append('flight_code', flight_code);
      $('.airport_start__list__item').removeClass('select_elem_airport');
      $('.airport_end__list__item').removeClass('select_elem_airport');
      $.ajax({
        headers: {
          'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/edit_future_flights__update',
        type: "POST",
        data: formData,
        dataType: 'JSON',
        contentType: false,
        processData: false,
        beforeSend: function beforeSend() {
          $('.overlay_flight_forms').addClass('overlay_form_active');
        },
        success: function success(data) {
          if (data.status) {
            $('.errors_list').addClass('non_view');
            $('.overlay_flight_forms #fountainG').css('display', 'none');
            $('.overlay_flight_forms .check_mark_flight_forms img').animate({
              height: "70px"
            }, 100);
            $('.overlay_flight_forms .check_mark_flight_forms').addClass('check_mark_flight_forms__active');
            var start__city = $(row).find('.flght_table_block__item__info__flight_plan__start__city');
            var end__city = $(row).find('.flght_table_block__item__info__flight_plan__end__city');
            var start__date = $(row).find('.flght_table_block__item__info__flight_plan__start__iata_code_date');
            var end__date = $(row).find('.flght_table_block__item__info__flight_plan__end__iata_code_date');
            var start__time = $(row).find('.flght_table_block__item__info__flight_plan__start__iata_code_date');
            var end__time = $(row).find('.flght_table_block__item__info__flight_plan__end__iata_code_date');
            var travel__time = $(row).find('.flght_table_block__item__info__flight_plan__travel_time');
            start__city.text(data.airport_start__city_name + " (" + data.airport_start__iata_code + ")");
            end__city.text(data.airport_end__city_name + " (" + data.airport_end__iata_code + ")");
            start__date.text(data.date_start + ' ' + data.time_start);
            end__date.text(data.date_end + ' ' + data.time_end); // start__time.text(data.time_start);
            // end__time.text(data.time_end);

            travel__time.text(data.travel__time);
            setTimeout(function () {
              $('.airport_start__list__item').removeClass('select_elem_airport');
              $('.airport_end__list__item').removeClass('select_elem_airport');
              $('.airport_start__list__item').removeAttr('style');
              $('.airport_end__list__item').removeAttr('style');
              $('.overlay_flight_forms .check_mark_flight_forms img').css('display', 'none');
              $('.overlay_flight_forms .check_mark_flight_forms').removeClass('check_mark_flight_forms__active');
            }, 400);
            setTimeout(function () {
              $('.overlay_flight_forms').removeClass('overlay_form_active');
              $('.overlay_flight_forms #fountainG').removeAttr('style');
              $('#input_airport_start').val('');
              $('#input_airport_end').val('');
              $('#date_start').val('');
              $('#date_end').val('');
              $('#input_time_end').val('');
              $('#input_time_start').val('');
            }, 500);
          } else if (data.type_error == 1) {
            $('.errors_list').removeClass('non_view');
            $('.overlay_flight_forms').removeClass('overlay_form_active');
            Object.keys(data.errors_fields).forEach(function (value_error) {
              var error_list__item = document.createElement('li');
              error_list__item.setAttribute('class', 'errors_list__item');
              error_list__item.append(data.errors_fields[value_error]);
              $('.errors_list').append(error_list__item);
            });
          } else {
            $('.errors_list').removeClass('non_view');
            $('.overlay_flight_forms').removeClass('overlay_form_active');

            var _error_list__item9 = document.createElement('li');

            _error_list__item9.setAttribute('class', 'errors_list__item');

            _error_list__item9.append(data.error_message);

            $('.errors_list').append(_error_list__item9);
          }
        },
        error: function error() {
          $('.errors_list').removeClass('non_view');
          $('.overlay_flight_forms').removeClass('overlay_form_active');
          var error_list__item = document.createElement('li');
          error_list__item.setAttribute('class', 'errors_list__item');
          error_list__item.append('Возникла непредвиденная ошибка. Обновите страницу и попробуйте еще раз');
          $('.errors_list').append(error_list__item);
        }
      });
    }
  });
});
/******/ })()
;
$(document).ready(function(){
    // переменные
    const dropbtn_from_flights = $('#dropbtn_from_flights');
    const dropbtn_to_flights = $('#dropbtn_to_flights');
    const input_search_from_flights = $('#id_i_s_f_f');
    const input_search_to_flights = $('#id_i_s_f_t');
    const input_country_of_issue = $('#input_country_of_issue');
    const flights_list_item = $('.flights_list_item');
    const input_count_pass_block = $('.input_count_pass_block');
    const input_count_pass = $('#id_i_c_pass');
    const dropbtn_prefix_phone = $('#dropbtn_prefix_phone');
    const dropbtn_gender_code = $('#dropbtn_gender_code');
    const dropbtn_type_document = $('#dropbtn_type_document');
    const dropbtn_country_of_issue = $('#dropbtn_country_of_issue');
    var screenWidth = window.screen.width;
    var screenHeight = window.screen.height;
    
    window.onresize = function(event) {
        screenWidth = window.screen.width;
    };
    // функции

    function showdropDownListCitiesSearchFlights(button,dropdown_info){
        $(button).addClass('rotate_180');
        $(dropdown_info).addClass('show_drop_content');
    }

    function searchInFlightsList(id_input, filter, elements) {
        $(elements).each(function(i,elem) { // пробегаем все элементы списка
            let valueLi = elem.innerHTML; // передаем значение инпута в перменную
            
            if (valueLi.toUpperCase().indexOf(filter) > -1) { // если найденный индекс элемента > 1
                elements[i].style.display = "";
                $(elements[i]).addClass('select_elem_airport');
                $('#'+id_input+'.dropdown_content__item').removeClass('show_drop_content');
            }
            else {
                elements[i].style.display = "none";
                $('#'+id_input+'.dropdown_content__item').addClass('show_drop_content');
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
            if (screenWidth <= 780) {
                $('.desktop_section').addClass('non_view');
            }
        }
        else{
            $('.additional_sub_menu').removeClass('additional_sub_menu__view');
            $('.btn_additional_menu .fa-bars').removeClass('non_view');
            $('.btn_additional_menu .fa-times').addClass('non_view');
            if (screenWidth <= 780) {
                $('.desktop_section').removeClass('non_view');
            }
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
        }
        else if ($(this).hasClass('buy_ticket')) {
            $('.check_in_block').addClass('non_view');
            $('.form_search_block_inputs').removeClass('non_view');
        }
        
        $('.flights_list_item').each(function (i,elem) {
            $(elem).removeClass('active_flights_list_item');
        });
        $(this).addClass('active_flights_list_item');
        $('.dropdown_content').each(function(i, elem) {
            $(elem).removeClass('show_drop_content');
        });
        
    });

    dropbtn_from_flights.click(function(){
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
            showdropDownListCitiesSearchFlights(dropbtn_from_flights,drop_from_flights_elem);
        }
        else{
            $(drop_from_flights_elem).removeClass('show_drop_content');
            $(dropbtn_from_flights).removeClass('rotate_180');
        }
    });
    dropbtn_to_flights.click(function(){
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
            showdropDownListCitiesSearchFlights(dropbtn_to_flights,dropbtn_to_flights_elem);
        }
        else{
            $(dropbtn_to_flights_elem).removeClass('show_drop_content');
            $(dropbtn_to_flights).removeClass('rotate_180');
        }
    });
    input_search_from_flights.click(function(){
        $('.drop_to_flights').removeClass('show_drop_content');
        $(dropbtn_to_flights).removeClass('rotate_180');
        $('.drop_count_pass').removeClass('show_drop_content');
        $('.language_currency').removeClass('language_currency_active');
        $('#dropbtn_count_pass').removeClass('rotate_180');
        $('.nav_menu .geo_posistion_people').removeAttr('style');
        $('.geo_posistion_people').removeClass('geo_posistion_people__active');
        var drop_from_flights_elem = $('.drop_from_flights');
        if(!$('.drop_from_flights').hasClass('show_drop_content')){
            showdropDownListCitiesSearchFlights(dropbtn_from_flights,drop_from_flights_elem);
        }
    });
    input_search_to_flights.click(function(){
        $('.drop_from_flights').removeClass('show_drop_content');
        $('.drop_count_pass').removeClass('show_drop_content');
        $('.language_currency').removeClass('language_currency_active');
        $(dropbtn_from_flights).removeClass('rotate_180');
        $('#dropbtn_count_pass').removeClass('rotate_180');
        $('.nav_menu .geo_posistion_people').removeAttr('style');
        $('.geo_posistion_people').removeClass('geo_posistion_people__active');
        var drop_to_flights_elem = $('.drop_to_flights');
        if(!$('.drop_to_flights').hasClass('show_drop_content')){
            showdropDownListCitiesSearchFlights(dropbtn_to_flights,drop_to_flights_elem);
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
                // console.log("есть клик");
            }
            
        }
        else if (!$(this).hasClass('there_data') && !$(this).hasClass('btn_search_block')) {
            $(this).addClass('block_inputs_active');
        }
        else if ($(this).hasClass('there_data')) {
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
        searchInFlightsList(id_input,filter,elements);
        if($(this).val() === ""){
            $(elements).removeClass('select_elem_airport');
        }
    });
    input_search_to_flights.keyup(function () {
        var id_input = $(this).attr("id");
        var filter = $(this).val().toUpperCase(); // приводим все к верхнему регистру
        var elements = $('.drop_to_flights .dropdown_content__item'); // все элементы с классом dropdown-content--item
        searchInFlightsList(id_input,filter,elements);
        if($(this).val() === ""){
            $(elements).removeClass('select_elem_airport');
        }
    });

    $('.geo_posistion_people').click(function(e){
        $('.drop_count_pass').removeClass('show_drop_content');
        $('#dropbtn_count_pass').removeClass('rotate_180');
        if (!$(this).hasClass('geo_posistion_people__active')) {
            $('.geo_posistion_people').addClass('geo_posistion_people__active');
            if (!$('.language_currency').hasClass('language_currency_active')) {
                $('.language_currency').addClass('language_currency_active');
                $('.geo_posistion_people').css('color', '#52C9B9');
            }
            else{
                $('.language_currency').removeClass('language_currency_active');
                $('.geo_posistion_people').removeAttr('style');
            }    
        }
        else{
            var child = $('.geo_posistion_people').find($(e.target));
            if (child == null) {
                
                $('.geo_posistion_people').removeClass('geo_posistion_people__active');
            }
            
        }
    });

    $('input[name="radio_lang"]').change(function () {
        // изменения языка сайта
    });
    $('input[name="radio_currency"]').change(function () {
        // изменение валюты на сайте
    });

    window.addEventListener('click', e => { // при клике в любом месте окна браузера
        const target = e.target // находим элемент, на котором был клик
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
                        showdropDownListCitiesSearchFlights(dropbtn_prefix_phone,$('.prefix_phone_list'));
                    }
                    else{
                        $('.prefix_phone_list').removeClass('show_drop_content');
                        (dropbtn_prefix_phone).removeClass('rotate_180');
                    }
                }
                else{
                    $('.prefix_phone_list').removeClass('show_drop_content');
                    $(dropbtn_prefix_phone).removeClass('rotate_180');
                }
            }
            if (!target.closest('#dropbtn_gender_code')) {
                var dropbtn_gender_code = $('#dropbtn_gender_code');
                if (target.closest('.form_auth_input[id="gender_code"]')) {
                    if (!$('.gender_code_list').hasClass('show_drop_content')) {
                        showdropDownListCitiesSearchFlights(dropbtn_gender_code,$('.gender_code_list'));
                    }
                    else{
                        $('.gender_code_list').removeClass('show_drop_content');
                        (dropbtn_gender_code).removeClass('rotate_180');
                    }
                }
                else{
                    $('.gender_code_list').removeClass('show_drop_content');
                    $(dropbtn_gender_code).removeClass('rotate_180');
                }
            }
            if (!target.closest('#dropbtn_type_document')) {
                var dropbtn_type_document = $('#dropbtn_type_document');
                if (target.closest('.form_auth_input[id="type_document"]')) {
                    if (!$('.type_document_list').hasClass('show_drop_content')) {
                        showdropDownListCitiesSearchFlights(dropbtn_type_document,$('.type_document_list'));
                    }
                    else{
                        $('.type_document_list').removeClass('show_drop_content');
                        (dropbtn_type_document).removeClass('rotate_180');
                    }
                }
                else{
                    $('.type_document_list').removeClass('show_drop_content');
                    $(dropbtn_type_document).removeClass('rotate_180');
                }
            }
            if (!target.closest('#dropbtn_country_of_issue')) {
                var dropbtn_country_of_issue = $('#dropbtn_country_of_issue');
                if (target.closest('.form_auth_input[id="input_country_of_issue"]')) {
                    $('.form_auth_input[id="input_country_of_issue"]').autocomplete = 'off';;
                    if (!$('.country_of_issue_list').hasClass('show_drop_content')) {
                        showdropDownListCitiesSearchFlights(dropbtn_country_of_issue,$('.country_of_issue_list'));
                    }
                    else{
                        $('.country_of_issue_list').removeClass('show_drop_content');
                        (dropbtn_country_of_issue).removeClass('rotate_180');
                    }
                }
                else{
                    $('.country_of_issue_list').removeClass('show_drop_content');
                    $(dropbtn_country_of_issue).removeClass('rotate_180');
                }
            }
            if (!target.closest('#dropbtn_gender_user')) {
                var dropbtn_country_of_issue = $('#dropbtn_gender_user');
                if (target.closest('#gender_user')) {
                    $('#gender_user').autocomplete = 'off';
                    if (!$('.personal_data_block__update_form__gender_list').hasClass('show_drop_content')) {
                        showdropDownListCitiesSearchFlights($('#dropbtn_gender_user'),$('.personal_data_block__update_form__gender_list'));
                        $('.personal_data_block__update_form__gender_list').addClass('show_drop_content');
                    }
                    else{
                        $('.personal_data_block__update_form__gender_list').removeClass('show_drop_content');
                        $('#dropbtn_gender_user').removeClass('rotate_180');
                        $('#dropbtn_gender_user').removeAttr('style');
                    }
                }
                else{
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
                        showdropDownListCitiesSearchFlights($('#dropbtn_type_document_user'),$('.personal_data_block__update_form__type_document_list'));
                        $('.personal_data_block__update_form__type_document_list').addClass('show_drop_content');
                    }
                    else{
                        $('.personal_data_block__update_form__type_document_list').removeClass('show_drop_content');
                        $('#dropbtn_type_document_user').removeClass('rotate_180');
                        $('#dropbtn_type_document_user').removeAttr('style');
                    }
                }
                else{
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
                        showdropDownListCitiesSearchFlights($('#dropbtn_country_of_issue_user'),$('.personal_data_block__update_form__country_of_issue_list'));
                        $('.personal_data_block__update_form__country_of_issue_list').addClass('show_drop_content');
                    }
                    else{
                        $('.personal_data_block__update_form__country_of_issue_list').removeClass('show_drop_content');
                        $('#dropbtn_type_document_user').removeClass('rotate_180');
                        $('#dropbtn_type_document_user').removeAttr('style');
                    }
                }
                else{
                    $('.personal_data_block__update_form__country_of_issue_list').removeClass('show_drop_content');
                    $('#dropbtn_country_of_issue_user').removeClass('rotate_180');
                    $('#dropbtn_country_of_issue_user').removeAttr('style');
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
        }
        else{
            $(drop_count_pass_elem).removeClass('show_drop_content');
            $('#dropbtn_count_pass').removeClass('rotate_180');
        }
    });

    $('#btn_close_dc_count_pass').click(function (e) {
        e.preventDefault();
        // setTimeout(() => {
        //     $('.form_search_block_inputs').removeClass('block_inputs_active');
        // }, 300);
        
        $('.drop_count_pass').removeClass('show_drop_content');
        $('#dropbtn_count_pass').removeClass('rotate_180');
        
        console.log('vvv');
    });

    
    // календари
    $('#id_i_d_t').click(function () {
        $('.drop_from_flights').removeClass('show_drop_content');
        $('.drop_to_flights').removeClass('show_drop_content');
        $('.drop_count_pass').removeClass('show_drop_content');
        $('.language_currency').removeClass('language_currency_active');
        if (!$('#id_i_d_t_block').hasClass('calendar_active')) {
            $('#id_i_d_t_block').addClass('calendar_active');
            // $('.back_data').addClass('non_click_input');
        }
    });
    // $('#id_i_d_t').daterangepicker({
    //     autoUpdateInput: false,
    //     singleDatePicker: true,
    //     showDropdowns: true,
    //     minYear: 2021,
    //     maxYear: parseInt(moment().format('YYYY'),10),
    //     locale: {
    //         cancelLabel: 'Clear'
    //     }
    // }, function(start, end, label) {
    //     var years = moment().diff(start, 'years');
    //     // alert("You are " + years + " years old!");
    //   });
    // $('#id_i_d_t').on('apply.daterangepicker', function(ev, picker) {
    //     $(this).val(picker.startDate.format('MM/DD/YYYY'));
    //     $('#id_i_d_b').val(picker.endDate.format('MM/DD/YYYY'));
    //     $('#id_i_d_t_block').removeClass('block_inputs_active');
    //     $('#id_i_d_b_block').removeClass('block_inputs_active');
    // });
  
    // $('#id_i_d_t').on('cancel.daterangepicker', function(ev, picker) {
    //     $(this).val('Туда:');
    //     $('#id_i_d_b').val('Обратно:');
    //     $('#id_i_d_t_block').removeClass('block_inputs_active');
    //     $('#id_i_d_b_block').removeClass('block_inputs_active');
    // });

    // $('#id_i_d_b').click(function (e) {
    //     e.preventDefault();
    //     // $('#id_i_d_t').click();
    // })

    // счетчик кол-ва пассажиров на форме поиска билетов
    const btn_minus_old = $('#btn_minus_old');
    const btn_plus_old = $('#btn_plus_old');
    const btn_minus_kids = $('#btn_minus_kids');
    const btn_plus_kids = $('#btn_plus_kids');
    const btn_minus_baby = $('#btn_minus_baby');
    const btn_plus_baby = $('#btn_plus_baby');

    const old_count_pass = $('#old_count_pass');
    const kids_count_pass = $('#kids_count_pass');
    const baby_count_pass = $('#baby_count_pass');

    function countPassInput() {
        var old_count_pass = Number($('#old_count_pass').text());
        var kids_count_pass = Number($('#kids_count_pass').text());
        var baby_count_pass = Number($('#baby_count_pass').text());
        var new_value = old_count_pass + kids_count_pass + baby_count_pass;
        if (new_value == 1) {
            var new_value_input = new_value + " пассажир";
            $(input_count_pass).val(new_value_input);
        }
        else if (new_value < 5 && new_value != 0) {
            var new_value_input = new_value + " пассажира";
            $(input_count_pass).val(new_value_input);
        }
        else if (new_value == 21) {
            var new_value_input = new_value + " пассажир";
            $(input_count_pass).val(new_value_input);
        }
        else if (new_value >= 5 && new_value < 21) {
            var new_value_input = new_value + " пассажиров";
            $(input_count_pass).val(new_value_input);
        }
        else if(new_value == 0) {
            var new_value_input = new_value + " пассажиров";
            $(input_count_pass).val(new_value_input);
        }
        else if(new_value >= 5 && new_value > 21){
            var new_value_input = new_value + " пассажира";
            $(input_count_pass).val(new_value_input);
        }
    };
    
    btn_plus_old.click(function (e) {
        e.preventDefault();
        var old_count_pass_value = Number(old_count_pass.text());

        if (Number(old_count_pass_value) == 9) {
            old_count_pass.text("9");
        }
        else{
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
        }
        else{
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
        }
        else{
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
        }
        else{
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
        }
        else{
            var new_value = baby_count_pass_value + 1;
            baby_count_pass.text(new_value);
            countPassInput();
        }
    });
    btn_minus_baby.click(function (e) {
        e.preventDefault();
        var baby_count_pass_value = Number(baby_count_pass.text());
        if (Number(baby_count_pass_value) == 0) {
            baby_count_pass.text("0");
        }
        else{
            var new_value = baby_count_pass_value - 1;
            baby_count_pass.text(new_value);
            countPassInput();
        }
    });

    dropbtn_prefix_phone.click(function (e) {
        e.preventDefault();
        if (!$('.prefix_phone_list').hasClass('show_drop_content')) {
            showdropDownListCitiesSearchFlights(this,$('.prefix_phone_list'));
        }
        else{
            $('.prefix_phone_list').removeClass('show_drop_content');
            $(this).removeClass('rotate_180');
        }
    });
    $("#phone").mask("(999)999-999-9",
    {
        completed:function () {
            // console.log("харош");
        }
    });
    $('.prefix_phone_list__item').click(function () {
        var prefix_phone__text = $(this).text();
        $('#prefix_phone').val(prefix_phone__text);
        $('.prefix_phone_list__item').removeClass('select_list__item');
        $(this).addClass('select_list__item');

        var str_mask = "(";
        for (let index = 0; index < Number($(this).attr('data-count-number-phone-not-prefix')); index++) {
            if (str_mask.length == 4) {
                str_mask+=")";
            }
            if (str_mask.length == 8) {
                str_mask+="-";
            }
            if (str_mask.length == 12) {
                str_mask+="-";
            }
            str_mask+="9";
        }
        $("#phone").mask(str_mask,
        {
            completed:function () {
                // console.log("харош");
            }
        });

    });

    dropbtn_gender_code.click(function (e) {
        e.preventDefault();
        if (!$('.gender_code_list').hasClass('show_drop_content')) {
            showdropDownListCitiesSearchFlights(this,$('.gender_code_list'));
        }
        else{
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
            showdropDownListCitiesSearchFlights(this,$('.type_document_list'));
        }
        else{
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
    $("#series_document_number").mask("99 99 999999",
    {
        completed:function () {
            // console.log("харош");
        }
    });
    
    dropbtn_country_of_issue.click(function (e) {
        e.preventDefault();
        if (!$('.country_of_issue_list').hasClass('show_drop_content')) {
            showdropDownListCitiesSearchFlights(this,$('.country_of_issue_list'));
        }
        else{
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
        $(elements).each(function(i,elem) { // пробегаем все элементы списка
            let valueLi = elem.innerHTML; // передаем значение инпута в перменную
            
            if ($('.country_of_issue_list').length) {
                if (valueLi.toUpperCase().indexOf(filter) > -1) { // если найденный индекс элемента > 1
                    elements[i].style.display = "";
                    $(elements[i]).addClass('select_list__item');
                }
                else {
                    elements[i].style.display = "none";
                    $(elements[i]).removeClass('select_list__item');
                }
                if (valueLi.toUpperCase() === $('#input_country_of_issue').val().toUpperCase()) {
                    $('.country_of_issue_list').removeClass('show_drop_content');
                    input_country_of_issue.val(valueLi);
                }
            }
            if ($('.personal_data_block__update_form__country_of_issue_list').length) {
                if (valueLi.toUpperCase().indexOf(filter) > -1) { // если найденный индекс элемента > 1
                    elements[i].style.display = "";
                    $(elements[i]).addClass('select_list__item');
                }
                else {
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
    input_country_of_issue.keyup(function () {
        if (!$('.country_of_issue_list').hasClass('show_drop_content')) {
            $('.country_of_issue_list').addClass('show_drop_content');
        }
        var id_input = $(this).attr("id");
        var filter = $(this).val().toUpperCase(); // приводим все к верхнему регистру
        var elements = $('.country_of_issue_list .country_of_issue_list__item'); // все элементы с классом dropdown-content--item
        searchСountryOfIssue(id_input,filter,elements);
        if($(this).val() === ""){
            $(elements).removeClass('select_list__item');
        }
    });
    // if (screenWidth >= 780) {
        $('#complete_contact_data').click(function (e) {
            e.preventDefault();
            $('.form_auth_contact_data').addClass('form_auth_card__anim');
            $('#auth_block_btn').addClass('form_auth_block__anim');
            $('#auth_block_btn').css('margin-top','auto');
            setTimeout(() => {
                $('#main_form_auth').animate({
                    minHeight: "704px"
                },500);
                setTimeout(() => {
                    $('.form_auth_profile_data').css('display',"block");
                }, 650);
                $('.form_auth_profile_data').animate({
                    marginLeft: "0px",
                    opacity: "1",
                },1200);
                $('.form_auth_contact_data').animate({
                    marginLeft: "-1500px"
                },700);
                setTimeout(() => {
                    $('.form_auth_profile_data').removeClass('form_auth_non_view');
                    $('.stages_list__item').removeClass('stages_list__item_active');
                    $('.stages_list__item:nth-child(2)').addClass('stages_list__item_active');
                    $('#auth_block_btn').removeClass('form_auth_block__anim');
                }, 1380);
                setTimeout(() => {
                    // $('.form_auth_contact_data').css('display','none');
                    $('.form_auth_contact_data').addClass('form_auth_card__complete_anim');
                    $('.form_auth_contact_data').removeAttr('style');
                }, 500);
            }, 500);
            setTimeout(() => {
                $('#auth_block_btn').removeAttr('style');
            }, 1800);
        });
    
        $('#complete_profile_data').click(function (e) {
            e.preventDefault();
            $('.form_auth_profile_data').removeAttr('style');
            $('.form_auth_profile_data').addClass('form_auth_card__anim');
            $('#auth_block_btn').addClass('form_auth_block__anim');
            $('#auth_block_btn').css('margin-top','auto');
            setTimeout(() => {
                $('#main_form_auth').animate({
                    minHeight: "360px"
                },500);
                setTimeout(() => {
                    $('.form_auth_password_data').css('display',"block");
                }, 650);
                $('.form_auth_password_data').animate({
                    marginLeft: "0px",
                    opacity: "1",
                },1200);
                $('.form_auth_profile_data').animate({
                    marginLeft: "-1500px"
                },700);
                setTimeout(() => {
                    $('.form_auth_password_data').removeClass('form_auth_non_view');
                    $('.stages_list__item').removeClass('stages_list__item_active');
                    $('.stages_list__item:nth-child(3)').addClass('stages_list__item_active');
                    $('#auth_block_btn').removeClass('form_auth_block__anim');
                }, 1380);
                setTimeout(() => {
                    // $('.form_auth_contact_data').css('display','none');
                    $('.form_auth_profile_data').addClass('form_auth_card__complete_anim');
                    $('.form_auth_profile_data').removeAttr('style');
                }, 700);
            }, 500);
            setTimeout(() => {
                $('#auth_block_btn').removeAttr('style');
            }, 1800);
            
        });
        $('#complete_password_data').click(function (e) {
            e.preventDefault();
            $('.form_auth_password_data').removeAttr('style');
            $('.form_auth_password_data').addClass('form_auth_card__anim');
            $('#auth_block_btn').addClass('form_auth_block__anim');
            $('#auth_block_btn').css('margin-top','auto');
            setTimeout(() => {
                $('#main_form_auth').animate({
                    minHeight: "714px"
                },500);
                setTimeout(() => {
                    $('.form_auth_finish_data').css('display',"block");
                }, 650);
                $('.form_auth_finish_data').animate({
                    marginLeft: "0px",
                    opacity: "1",
                },1000);
                $('.form_auth_password_data').animate({
                    marginLeft: "-1500px"
                },700);
                setTimeout(() => {
                    $('.form_auth_finish_data').removeClass('form_auth_non_view');
                    $('.stages_list__item').removeClass('stages_list__item_active');
                    $('.stages_list__item:nth-child(4)').addClass('stages_list__item_active');
                    $('#auth_block_btn').removeClass('form_auth_block__anim');
                }, 1400);
                setTimeout(() => {
                    $('.form_auth_password_data').addClass('form_auth_card__complete_anim');
                    $('.form_auth_password_data').removeAttr('style');
                }, 700);
            }, 500);
            setTimeout(() => {
                $('#auth_block_btn').removeAttr('style');
            }, 2200);
            
        });
    // }
    // else{
    //     $('#complete_contact_data').click(function (e) {
    //         $('.form_auth_contact_data').addClass('form_auth_card__anim');
    //         $('#auth_block_btn').addClass('form_auth_block__anim');
    //         $('#auth_block_btn').css('margin-top','auto');
    //         // setTimeout(() => {
    //         //     $('#main_form_auth').animate({
    //         //         minHeight: "704px"
    //         //     },500);
    //         //     setTimeout(() => {
    //         //         $('.form_auth_profile_data').css('display',"block");
    //         //     }, 650);
    //         //     $('.form_auth_profile_data').animate({
    //         //         marginLeft: "0px",
    //         //         opacity: "1",
    //         //     },1200);
    //         //     $('.form_auth_contact_data').animate({
    //         //         marginLeft: "-1500px"
    //         //     },700);
    //         //     setTimeout(() => {
    //         //         $('.form_auth_profile_data').removeClass('form_auth_non_view');
    //         //         $('.stages_list__item').removeClass('stages_list__item_active');
    //         //         $('.stages_list__item:nth-child(2)').addClass('stages_list__item_active');
    //         //         $('#auth_block_btn').removeClass('form_auth_block__anim');
    //         //     }, 1380);
    //         //     setTimeout(() => {
    //         //         // $('.form_auth_contact_data').css('display','none');
    //         //         $('.form_auth_contact_data').addClass('form_auth_card__complete_anim');
    //         //         $('.form_auth_contact_data').removeAttr('style');
    //         //     }, 500);
    //         // }, 500);
    //         // setTimeout(() => {
    //         //     $('#auth_block_btn').removeAttr('style');
    //         // }, 1800);
    //     });
    // }
    
    $('#show_passwod').click(function (e) {
        e.preventDefault();
        if (!$(this).hasClass('non_view')) {
            $(this).addClass('non_view');
            $('#input_password').attr('type','text');
            $('#hide_passwod').removeClass('non_view');
        }
    });
    $('#hide_passwod').click(function (e) {
        e.preventDefault();
        if (!$(this).hasClass('non_view')) {
            $(this).addClass('non_view');
            $('#input_password').attr('type','password');
            $('#show_passwod').removeClass('non_view');
        }
    });
    $('#btn_restart_registered').click(function () {
        location.reload();
    });

    
    setInterval(() => {
        if ($('.btn_scroll_food').css('display') != 'none') {
            if (!$('.btn_scroll_food').hasClass('down_scroll_btn_food')) {
                $('.btn_scroll_food').removeClass('up_scroll_btn_food');
                $('.btn_scroll_food').addClass('down_scroll_btn_food');
                // console.log('cdcd');
            }
            else{
                $('.btn_scroll_food').removeClass('down_scroll_btn_food');
                $('.btn_scroll_food').addClass('up_scroll_btn_food');
            }
        }
    }, 800);
    $('#id_btn_scroll_food').click(function (e) {
        e.preventDefault();
        var destination =  $('#main_food_block').offset().top;
        $('body,html').animate({scrollTop: destination}, 100);
    });


    // страница обновления данных аккаунта
    $('#dropbtn_gender_user').click(function (e) {
        if (!$('.personal_data_block__update_form__gender_list').hasClass('show_drop_content')) {
            showdropDownListCitiesSearchFlights($('#dropbtn_gender_user'),$('.personal_data_block__update_form__gender_list'));
            $('.personal_data_block__update_form__gender_list').addClass('show_drop_content');
        }
        else{
            $('.personal_data_block__update_form__gender_list').removeClass('show_drop_content');
            $('#dropbtn_gender_user').removeClass('rotate_180');
            $('#dropbtn_gender_user').removeAttr('style');
        }
    });
    $('.personal_data_block__update_form__gender_list__item').click(function () {
        var gender_code__text = $(this).text();
        $('#gender_user').val(gender_code__text);
        $('.personal_data_block__update_form__gender_list__item').removeClass('select_list__item');
        $(this).addClass('select_list__item');
        $('.personal_data_block__update_form__gender_list').removeClass('show_drop_content');
        $('#dropbtn_gender_user').removeClass('rotate_180');
        $('#dropbtn_gender_user').removeAttr('style');
    });
    $('#dropbtn_type_document_user').click(function (e) {
        if (!$('.personal_data_block__update_form__type_document_list').hasClass('show_drop_content')) {
            showdropDownListCitiesSearchFlights($('#dropbtn_type_document_user'),$('.personal_data_block__update_form__type_document_list'));
            $('.personal_data_block__update_form__type_document_list').addClass('show_drop_content');
        }
        else{
            $('.personal_data_block__update_form__type_document_list').removeClass('show_drop_content');
            $('#dropbtn_type_document_user').removeClass('rotate_180');
            $('#dropbtn_type_document_user').removeAttr('style');
        }
    });
    $('.personal_data_block__update_form__type_document_list__item').click(function () {
        var gender_code__text = $(this).text();
        $('#type_document_user').val(gender_code__text);
        $('.personal_data_block__update_form__type_document_list__item').removeClass('select_list__item');
        $(this).addClass('select_list__item');
        $('.personal_data_block__update_form__type_document_list').removeClass('show_drop_content');
        $('#dropbtn_type_document_user').removeClass('rotate_180');
        $('#dropbtn_type_document_user').removeAttr('style');
    });
    $('#dropbtn_country_of_issue_user').click(function (e) {
        if (!$('.personal_data_block__update_form__country_of_issue_list').hasClass('show_drop_content')) {
            showdropDownListCitiesSearchFlights($('#dropbtn_country_of_issue_user'),$('.personal_data_block__update_form__country_of_issue_list'));
            $('.personal_data_block__update_form__country_of_issue_list').addClass('show_drop_content');
        }
        else{
            $('.personal_data_block__update_form__country_of_issue_list').removeClass('show_drop_content');
            $('#dropbtn_country_of_issue_user').removeClass('rotate_180');
            $('#dropbtn_country_of_issue_user').removeAttr('style');
        }
    });
    $('.personal_data_block__update_form__country_of_issue_list__item').click(function () {
        var gender_code__text = $(this).text();
        $('#country_of_issue_user').val(gender_code__text);
        $('.personal_data_block__update_form__country_of_issue_list__item').removeClass('select_list__item');
        $(this).addClass('select_list__item');
        $('.personal_data_block__update_form__country_of_issue_list').removeClass('show_drop_content');
        $('#dropbtn_country_of_issue_user').removeClass('rotate_180');
        $('#dropbtn_country_of_issue_user').removeAttr('style');
    });

    $('#country_of_issue_user').keyup(function () {
        if (!$('.personal_data_block__update_form__country_of_issue_list').hasClass('show_drop_content')) {
            $('.personal_data_block__update_form__country_of_issue_list').addClass('show_drop_content');
        }
        var id_input = $(this).attr("id");
        var filter = $(this).val().toUpperCase(); // приводим все к верхнему регистру
        var elements = $('.personal_data_block__update_form__country_of_issue_list .personal_data_block__update_form__country_of_issue_list__item'); // все элементы списка
        searchСountryOfIssue(id_input,filter,elements);
        if($(this).val() === ""){
            $(elements).removeClass('select_list__item');
        }
    });

    $('#btn_show_old_password').click(function (e) {
        e.preventDefault();
        $('#btn_hide_old_password').removeClass('non_view');
        $(this).addClass('non_view');
        $('#old_password_user').attr('type','text');
    });
    $('#btn_hide_old_password').click(function (e) {
        e.preventDefault();
        $('#btn_show_old_password').removeClass('non_view');
        $(this).addClass('non_view');
        $('#old_password_user').attr('type','password');
    });


    $('#btn_show_new_password').click(function (e) {
        e.preventDefault();
        $('#btn_hide_new_password').removeClass('non_view');
        $(this).addClass('non_view');
        $('#new_password_user').attr('type','text');
    });
    $('#btn_hide_new_password').click(function (e) {
        e.preventDefault();
        $('#btn_show_new_password').removeClass('non_view');
        $(this).addClass('non_view');
        $('#new_password_user').attr('type','password');
    });

    $('#btn_show_confirm_new_password').click(function (e) {
        e.preventDefault();
        $('#btn_hide_confirm_new_password').removeClass('non_view');
        $(this).addClass('non_view');
        $('#confirm_new_password_user').attr('type','text');
    });
    $('#btn_hide_confirm_new_password').click(function (e) {
        e.preventDefault();
        $('#btn_show_confirm_new_password').removeClass('non_view');
        $(this).addClass('non_view');
        $('#confirm_new_password_user').attr('type','password');
    });


    // $('#complete_password_data').click(function (e) {
    //     e.preventDefault();
    //     $('.form_auth_password_data').removeAttr('style');
    //     $('.form_auth_password_data').addClass('form_auth_card__anim');
    //     $('#auth_block_btn').addClass('form_auth_block__anim');
    //     $('#auth_block_btn').css('margin-top','auto');
    //     setTimeout(() => {
    //         $('#main_form_auth').animate({
    //             minHeight: "660px"
    //         },500);
    //         setTimeout(() => {
    //             $('.form_auth_finish_data').css('display',"block");
    //         }, 650);
    //         $('.form_auth_finish_data').animate({
    //             marginLeft: "0px",
    //             opacity: "1",
    //         },1200);
    //         $('.form_auth_password_data').animate({
    //             marginLeft: "-1500px"
    //         },700);
    //         setTimeout(() => {
    //             $('.form_auth_finish_data').removeClass('form_auth_non_view');
    //             $('.stages_list__item').removeClass('stages_list__item_active');
    //             $('.stages_list__item:nth-child(4)').addClass('stages_list__item_active');
    //             $('#auth_block_btn').removeClass('form_auth_block__anim');
    //         }, 1380);
    //         setTimeout(() => {
    //             $('.form_auth_password_data').addClass('form_auth_card__complete_anim');
    //             $('.form_auth_password_data').removeAttr('style');
    //         }, 700);
    //     }, 500);
    //     setTimeout(() => {
    //         $('#auth_block_btn').removeAttr('style');
    //     }, 1800);
    // });

    function animatePanel() {
        $('.profile_data_cards .active_profile_data').addClass('profile_data_cards__anim');
        $('.profile_data_cards .active_profile_data').animate({
            opacity: 0
        },800);
        setTimeout(() => {
            $('.profile_data_cards .active_profile_data').removeAttr('style');
            $('.profile_data_cards .active_profile_data').addClass('profile_data_cards_non_view');
            $('.profile_data_cards .active_profile_data').removeClass('non_active_style');
            // $('.profile_data_cards').removeClass('active_profile_data');
        }, 900);
    }
    $('.aside_user__list__item__btn').click(function (e) {
        e.preventDefault();
        if (!$(this).hasClass('aside_user__list__item_non_click')) {
            var height_profile_data_cards = $('.profile_data_cards').height();
            $('.profile_data_cards').height(height_profile_data_cards);
            if ($(this).attr('id') != "profile_btn_full_history_travel"){
                $('.aside_user__list__item__btn').addClass('aside_user__list__item_non_click');
                $('.aside_user__list__item').removeClass('aside_user__list__item_active');
                $(this).parent('.aside_user__list__item').addClass('aside_user__list__item_active');
                if ($(this).attr('id') == "profile_btn_control_panel") {
                    if (!$('.control_panel_block').hasClass('non_active_style')){
                        $('.control_panel_block').addClass('non_active_style');
                        
                        animatePanel();
                        $('.control_panel_block').animate({
                            marginTop: "0px"
                        },800);
                        $('.control_panel_block').animate({
                            opacity: 1
                        },1000);
                        setTimeout(() => {
                            $('.profile_data_cards div').removeClass('active_profile_data');
                            $('.control_panel_block').removeClass('profile_data_cards_non_view');
                            $('.control_panel_block').removeClass('profile_data_cards__anim');
                            $('.control_panel_block').addClass('active_profile_data');
                            $('.aside_user__list__item__btn').removeClass('aside_user__list__item_non_click');
                            $('.profile_data_cards').height('auto');
                        }, 1200);
                    }
                }
                if ($(this).attr('id') == "profile_btn_personal_data") {
                    if (!$('.personal_data_block').hasClass('non_active_style')){
                        $('.personal_data_block').addClass('non_active_style');
                        animatePanel();
                        $('.personal_data_block').animate({
                            marginTop: "0px"
                        },800);
                        $('.personal_data_block').animate({
                            opacity: 1
                        },1000);
                        setTimeout(() => {
                            $('.profile_data_cards div').removeClass('active_profile_data');
                            $('.personal_data_block').removeClass('profile_data_cards_non_view');
                            $('.personal_data_block').removeClass('profile_data_cards__anim');
                            $('.personal_data_block').addClass('active_profile_data');
                            // $('#footer').css('margin-top','50px');
                            $('.aside_user__list__item__btn').removeClass('aside_user__list__item_non_click');
                            $('.profile_data_cards').height('auto');
                        }, 1200);
                    }
                }
                if ($(this).attr('id') == "profile_btn_my_travel") {
                    if (!$('.my_travel_block').hasClass('non_active_style')){
                        $(this).addClass('non_active_style');
                        animatePanel();
                        $('.my_travel_block').addClass('non_active_style');
                        // animatePanel();
                        $('.my_travel_block').animate({
                            marginTop: "0px"
                        },800);
                        $('.my_travel_block').animate({
                            opacity: 1
                        },1000);
                        setTimeout(() => {
                            $('.profile_data_cards div').removeClass('active_profile_data');
                            $('.my_travel_block').removeClass('profile_data_cards_non_view');
                            $('.my_travel_block').removeClass('profile_data_cards__anim');
                            $('.my_travel_block').addClass('active_profile_data');
                            $('.profile_data_cards').height('auto');
                            $('.aside_user__list__item__btn').removeClass('aside_user__list__item_non_click');
                        }, 1200);
                    }
                }
                if ($(this).attr('id') == "profile_btn_update_password") {
                    if (!$('.update_password_block').hasClass('non_active_style')){
                        $(this).addClass('non_active_style');
                        animatePanel();
                        $('.update_password_block').addClass('non_active_style');
                        // animatePanel();
                        $('.update_password_block').animate({
                            marginTop: "0px"
                        },800);
                        $('.update_password_block').animate({
                            opacity: 1
                        },1000);
                        setTimeout(() => {
                            $('.profile_data_cards div').removeClass('active_profile_data');
                            $('.update_password_block').removeClass('profile_data_cards_non_view');
                            $('.update_password_block').removeClass('profile_data_cards__anim');
                            $('.update_password_block').addClass('active_profile_data');
                            $('.profile_data_cards').height('auto');
                            console.log($('.update_password_block').height());
                            $('.aside_user__list__item__btn').removeClass('aside_user__list__item_non_click');
                        }, 1200);
                    }
                }
            } 
        }
        
    });

    // слайдер на странице с результатми поиска билетов


    // $(".slide-one").owlCarousel({
    //     center: true,
    //     items:5,
    //     loop:true,
    //     margin:10,
    //     responsive:{
    //         600:{
    //             items:6
    //         }
    //     }
    // });
    // $(".slide-two").owlCarousel({
    //     center: true,
    //     items:5,
    //     loop:true,
    //     margin:10,
    //     responsive:{
    //         600:{
    //             items:6
    //         }
    //     }
    // });
    
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
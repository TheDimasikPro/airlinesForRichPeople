$(document).ready(function(){
    // переменные
    const dropbtn_from_flights = $('#dropbtn_from_flights');
    const dropbtn_to_flights = $('#dropbtn_to_flights');
    const input_search_from_flights = $('#id_i_s_f_f');
    const input_search_to_flights = $('#id_i_s_f_t');
    const flights_list_item = $('.flights_list_item');
    const input_count_pass_block = $('.input_count_pass_block');
    const input_count_pass = $('#id_i_c_pass');
    const dropbtn_prefix_phone = $('#dropbtn_prefix_phone');

    
    
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
        }
        else{
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
            if (!$('#id_i_d_t_block').hasClass('calendar_active')) {
                $('#id_i_d_t').click();
            }
            
        }
        else if (!$(this).hasClass('there_data')) {
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

    
    // календари
    $('#id_i_d_t').click(function () {
        $('.drop_from_flights').removeClass('show_drop_content');
        $('.drop_to_flights').removeClass('show_drop_content');
        $('.drop_count_pass').removeClass('show_drop_content');
        $('.language_currency').removeClass('language_currency_active');
        if (!$('#id_i_d_t_block').hasClass('calendar_active')) {
            $('#id_i_d_t_block').addClass('calendar_active');
            
        }
        else{
            $('#id_i_d_t_block').removeClass('calendar_active');
        }
    });
    $('#id_i_d_t').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });
    $('#id_i_d_t').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY'));
        $('#id_i_d_b').val(picker.endDate.format('MM/DD/YYYY'));
        $('#id_i_d_t_block').removeClass('block_inputs_active');
        $('#id_i_d_b_block').removeClass('block_inputs_active');
    });
  
    $('#id_i_d_t').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('Туда:');
        $('#id_i_d_b').val('Обратно:');
        $('#id_i_d_t_block').removeClass('block_inputs_active');
        $('#id_i_d_b_block').removeClass('block_inputs_active');
    });

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
            kids_count_pass.text("0");
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

    $('.prefix_phone_list__item').click(function () {
        var prefix_phone__text = $(this).text();
        $('#prefix_phone').val(prefix_phone__text);
        $(this).addClass('select_prefix_phone');
    });


    $("#phone").mask("(999)999-999-9",
    {
        completed:function () {
            console.log("харош");
        }
    });


    $('#complete_contact_data').click(function (e) {
        e.preventDefault();
        $('.form_auth_contact_data').addClass('form_auth_card__anim');
        $('#auth_block_btn').addClass('form_auth_block__anim');
        $('#auth_block_btn').css('margin-top','auto');
        
        setTimeout(() => {
            $('.form_auth_contact_data').css('margin-left','-1000px');
            // $('.form_auth_contact_data').css('display','none');
            // $('.form_auth_contact_data').removeClass('form_auth_card__anim');
            // $('#auth_block_btn').removeClass('form_auth_block__anim');
            // $('#auth_block_btn').removeAttr('style');
            // $('.form_auth_contact_data').removeAttr('style');
        }, 1000);
        setTimeout(() => {
            // $('.form_auth_contact_data').css('padding','0');
            // $('.form_auth_contact_data').css('margin-left','0');
            $('.form_auth_contact_data').css('display','none');
        }, 1350);
    })
});
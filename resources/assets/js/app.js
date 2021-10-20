$(document).ready(function(){
    // переменные
    const dropbtn_from_flights = $('#dropbtn_from_flights');
    const dropbtn_to_flights = $('#dropbtn_to_flights');
    const input_search_from_flights = $('#id_i_s_f_f');
    const input_search_to_flights = $('#id_i_s_f_t');
    const flights_list_item = $('.flights_list_item');
    const input_count_pass_block = $('.input_count_pass_block');

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


    flights_list_item.click(function () {
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
        $('.country_currency').removeClass('country_currency_active');
        $(dropbtn_to_flights).removeClass('rotate_180');
        $('#dropbtn_count_pass').removeClass('rotate_180');
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
        $('.country_currency').removeClass('country_currency_active');
        $(dropbtn_from_flights).removeClass('rotate_180');
        $('#dropbtn_count_pass').removeClass('rotate_180');
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
        $('.country_currency').removeClass('country_currency_active');
        $('#dropbtn_count_pass').removeClass('rotate_180');
        var drop_from_flights_elem = $('.drop_from_flights');
        if(!$('.drop_from_flights').hasClass('show_drop_content')){
            showdropDownListCitiesSearchFlights(dropbtn_from_flights,drop_from_flights_elem);
        }
    });
    input_search_to_flights.click(function(){
        $('.drop_from_flights').removeClass('show_drop_content');
        $('.drop_count_pass').removeClass('show_drop_content');
        $('.country_currency').removeClass('country_currency_active');
        $(dropbtn_from_flights).removeClass('rotate_180');
        $('#dropbtn_count_pass').removeClass('rotate_180');
        var drop_to_flights_elem = $('.drop_to_flights');
        if(!$('.drop_to_flights').hasClass('show_drop_content')){
            showdropDownListCitiesSearchFlights(dropbtn_to_flights,drop_to_flights_elem);
        }
    });
    $('.form_search_block_inputs').click(function () {
        $('.form_search_block_inputs').removeClass('block_inputs_active');
        if ($(this).hasClass('back_data')) {
            $('#id_i_d_t_block').addClass('block_inputs_active');
            $('#id_i_d_b_block').addClass('block_inputs_active');
            $('#id_i_d_t').click();
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

    $('.geo_info').click(function(){
        $('.drop_count_pass').removeClass('show_drop_content');
        $('#dropbtn_count_pass').removeClass('rotate_180');
        if (!$('.country_currency').hasClass('country_currency_active')) {
            $('.country_currency').addClass('country_currency_active');
            $('.geo_info').css('border-bottom', '1px solid #52C9B9');
        }
        else{
            $('.country_currency').removeClass('country_currency_active');
            $('.geo_info').removeAttr('style');
        }
    });

    window.addEventListener('click', e => { // при клике в любом месте окна браузера
        const target = e.target // находим элемент, на котором был клик
        if (!target.closest('.search_tickets_block')) {
            $('.form_search_block_inputs').removeClass('block_inputs_active');
            if (!target.closest('.geo_info')) { 
                $('.country_currency').removeClass('country_currency_active');
                $('.geo_info').removeAttr('style');
            }
            if (!target.closest('#dropbtn_from_flights')) { 
                $('#dropbtn_from_flights').removeClass('rotate_180');
                $('.drop_from_flights').removeClass('show_drop_content');
                if (target.closest('#id_i_s_f_f')) {
                    $('.drop_from_flights').addClass('show_drop_content');
                    $(dropbtn_from_flights).addClass('rotate_180');
                }
            }
            if (!target.closest('#dropbtn_to_flights')) {
                $('#dropbtn_to_flights').removeClass('rotate_180');
                $('.drop_to_flights').removeClass('show_drop_content');
                if (target.closest('#id_i_s_f_t')) {
                    $('.drop_to_flights').addClass('show_drop_content');
                    $(dropbtn_to_flights).addClass('rotate_180');
                }
            }
            if (!target.closest('.input_count_pass_block')) {
                $('.drop_count_pass').removeClass('show_drop_content');
                $('#dropbtn_count_pass').removeClass('rotate_180');
                if (target.closest('.drop_count_pass')) {
                    $('.drop_count_pass').addClass('show_drop_content');
                    $('#dropbtn_count_pass').addClass('rotate_180');
                }
            }
        }
    });
    input_count_pass_block.click(function () {
        $('.drop_from_flights').removeClass('show_drop_content');
        $('.drop_to_flights').removeClass('show_drop_content');
        $('.country_currency').removeClass('country_currency_active');
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
        $('.country_currency').removeClass('country_currency_active');
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


    btn_plus_old.click(function (e) {
        e.preventDefault();
        var old_count_pass_value = Number(old_count_pass.text());
        if (Number(old_count_pass_value) == 9) {
            old_count_pass.text("9");
        }
        else{
            var new_value = old_count_pass_value + 1;
            old_count_pass.text(new_value);
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
        }
    });
});
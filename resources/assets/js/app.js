$(document).ready(function(){
    // переменные
    const dropbtn_from_flights = $('#dropbtn_from_flights');
    const dropbtn_to_flights = $('#dropbtn_to_flights');
    const input_search_from_flights = $('#id_i_s_f_f');
    const input_search_to_flights = $('#id_i_s_f_t');
    const flights_list_item = $('.flights_list_item');

    // функции
    function showdropDownListCitiesSearchFlights(button,dropdown_info){
        if(!$(button).hasClass('rotate_180')){
            $(button).addClass('rotate_180');
        }
        else{
            $(button).removeClass('rotate_180');
        }
        if(!$(dropdown_info).hasClass('show_drop_content')){
            $(dropdown_info).addClass('show_drop_content');
        }
        else{
            $(dropdown_info).removeClass('show_drop_content');
        }
    }

    function searchInFlightsList(id_input, filter, elements) {
        $(elements).each(function(i,elem) { // пробегаем все элементы списка
            let valueLi = elem.innerHTML; // передаем значение инпута в перменную
            if (valueLi.toUpperCase().indexOf(filter) > -1) { // если найденный индекс элемента > 1
                elements[i].style.display = "";
                $(elements[i]).addClass('select_elem_airport');
                $('#'+id_input+'.dropdown_content__item').removeClass('show_drop_content');
                console.log($(elements[i]));
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
        $(dropbtn_to_flights).removeClass('rotate_180');
        var drop_from_flights_elem = $('.drop_from_flights');
        input_search_from_flights.focus();
        moveCaretToEnd(input_search_from_flights);
        showdropDownListCitiesSearchFlights(this,drop_from_flights_elem);
    });
    dropbtn_to_flights.click(function(){
        $('.drop_from_flights').removeClass('show_drop_content');
        $(dropbtn_from_flights).removeClass('rotate_180');
        input_search_to_flights.focus();
        moveCaretToEnd(input_search_to_flights);
        var dropbtn_to_flights_elem = $('.drop_to_flights');
        showdropDownListCitiesSearchFlights(this,dropbtn_to_flights_elem);
    });
    input_search_from_flights.click(function(){
        $('.drop_to_flights').removeClass('show_drop_content');
        $(dropbtn_to_flights).removeClass('rotate_180');
        var drop_from_flights_elem = $('.drop_from_flights');
        if(!$('.drop_from_flights').hasClass('show_drop_content')){
            showdropDownListCitiesSearchFlights(dropbtn_from_flights,drop_from_flights_elem);
        }
    });
    input_search_to_flights.click(function(){
        $('.drop_from_flights').removeClass('show_drop_content');
        $(dropbtn_from_flights).removeClass('rotate_180');
        var drop_to_flights_elem = $('.drop_to_flights');
        if(!$('.drop_to_flights').hasClass('show_drop_content')){
            showdropDownListCitiesSearchFlights(dropbtn_to_flights,drop_to_flights_elem);
        }
    });


    $('.drop_from_flights .dropdown_content__item').click(function (e) {
        $('#id_i_s_f_f').val(e.target.innerText);
        $('.drop_from_flights').removeClass('show-drop-content');
        e.target.classList.add("select_elem_airport");
        // $('.id_country').text("");
    });



    input_search_from_flights.keyup(function () {
        var id_input = $(this).attr("id");
        var filter = $(this).val().toUpperCase(); // приводим все к верхнему регистру
        var elements = $('.drop_from_flights .dropdown_content__item'); // все элементы с классом dropdown-content--item
        searchInFlightsList(id_input,filter,elements);
        if($(this).val() === ""){
            $(elements).removeClass('select_elem_airport');
            console.log('cccc');
        }
    });

    $('.geo_info').click(function(){
        if (!$('.country_currency').hasClass('country_currency_active')) {
            $('.country_currency').addClass('country_currency_active');
            $('.geo_info').css('border-bottom', '1px solid #52C9B9');
        }
        else{
            $('.country_currency').removeClass('country_currency_active');
            $('.geo_info').removeAttr('style');
        }
    });
});
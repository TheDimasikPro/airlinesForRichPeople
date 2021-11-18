$(document).ready(function () {
    // общее
    
    const dropbtn_from_flights = $('#dropbtn_from_flights');
    const dropbtn_to_flights = $('#dropbtn_to_flights');
    const input_search_from_flights = $('#id_i_s_f_f');
    const input_search_to_flights = $('#id_i_s_f_t');
    const flights_list_item = $('.flights_list_item');
    const input_count_pass_block = $('.input_count_pass_block');
    const input_count_pass = $('#id_i_c_pass');
    
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
    // общее

    // свое
    flights_list_item.click(function () {
        $('.errors_search_tickets').remove();
        $('.dd_count_pass .drop_count_pass').removeClass('show_drop_content');
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
        $('.dd_count_pass .drop_count_pass').removeClass('show_drop_content');
        $('.drop_to_flights').removeClass('show_drop_content');
        $('.drop_count_pass').removeClass('show_drop_content');
        $('.language_currency').removeClass('language_currency_active');
        $(dropbtn_to_flights).removeClass('rotate_180');
        $('#dropbtn_count_pass').removeClass('rotate_180');
        $('.nav_menu .geo_posistion_people').removeAttr('style');
        $('.geo_posistion_people').removeClass('geo_posistion_people__active');
        var drop_from_flights_elem = $('.drop_from_flights');
        input_search_from_flights.focus();
        // moveCaretToEnd(input_search_from_flights);
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
        $('.dd_count_pass .drop_count_pass').removeClass('show_drop_content');
        $('.drop_from_flights').removeClass('show_drop_content');
        $('.drop_count_pass').removeClass('show_drop_content');
        $('.language_currency').removeClass('language_currency_active');
        $(dropbtn_from_flights).removeClass('rotate_180');
        $('#dropbtn_count_pass').removeClass('rotate_180');
        $('.nav_menu .geo_posistion_people').removeAttr('style');
        $('.geo_posistion_people').removeClass('geo_posistion_people__active');
        input_search_to_flights.focus();
        // moveCaretToEnd(input_search_to_flights);
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
        $('.dd_count_pass .drop_count_pass').removeClass('show_drop_content');
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
        $('.dd_count_pass .drop_count_pass').removeClass('show_drop_content');
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
        if (!$(this).hasClass('block_inputs_active')) {
            $(this).addClass('block_inputs_active');
        }
        
    });
    $('.drop_from_flights .dropdown_content__item').click(function (e) {
        $('.dd_count_pass .drop_count_pass').removeClass('show_drop_content');
        var airport_name = $.trim($(this).children('.info_country').children('.airport_name').text());
        var iata_code = $.trim($(this).children('.iata_code').text());
        var new_value_elem = airport_name + " (" + iata_code + ")";
        $('#id_i_s_f_f').val(new_value_elem);

        $('.drop_from_flights').removeClass('show_drop_content');
        $(dropbtn_from_flights).removeClass('rotate_180');
        
        $('.drop_from_flights .dropdown_content__item').removeClass('select_elem_airport');
        $('#from_flight_block_input').blur();
        setTimeout(() => {
            $('#from_flight_block_input').removeClass('block_inputs_active');
        }, 100);

        
        $(this).addClass("select_elem_airport");
        
    });
    $('.drop_to_flights .dropdown_content__item').click(function (e) {
        $('.dd_count_pass .drop_count_pass').removeClass('show_drop_content');
        var airport_name = $.trim($(this).children('.info_country').children('.airport_name').text());
        var iata_code = $.trim($(this).children('.iata_code').text());
        var new_value_elem = airport_name + " (" + iata_code + ")";
        $('#id_i_s_f_t').val(new_value_elem);
        $('.drop_to_flights').removeClass('show_drop_content');
        $(dropbtn_to_flights).removeClass('rotate_180');
        $('.drop_to_flights .dropdown_content__item').removeClass('select_elem_airport');
        $('#to_flight_block_input').blur();
        setTimeout(() => {
            $('#to_flight_block_input').removeClass('block_inputs_active');
        }, 100);
        
        
        $(this).addClass("select_elem_airport");
    });

    input_search_from_flights.keyup(function () {
        $('.dd_count_pass .drop_count_pass').removeClass('show_drop_content');
        var id_input = $(this).attr("id");
        var filter = $(this).val().toUpperCase(); // приводим все к верхнему регистру
        var elements = $('.drop_from_flights .dropdown_content__item'); // все элементы с классом dropdown-content--item
        searchInFlightsList(id_input,filter,elements);
        if($(this).val() === ""){
            $(elements).removeClass('select_elem_airport');
        }
    });
    input_search_to_flights.keyup(function () {
        $('.dd_count_pass .drop_count_pass').removeClass('show_drop_content');
        var id_input = $(this).attr("id");
        var filter = $(this).val().toUpperCase(); // приводим все к верхнему регистру
        var elements = $('.drop_to_flights .dropdown_content__item'); // все элементы с классом dropdown-content--item
        searchInFlightsList(id_input,filter,elements);
        if($(this).val() === ""){
            $(elements).removeClass('select_elem_airport');
        }
    });
    input_count_pass_block.click(function () {
        $('.dd_count_pass .drop_count_pass').removeClass('show_drop_content');
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
        setTimeout(() => {
            $('#count_pass_block_input').removeClass('block_inputs_active');
        }, 100);
        
        $('.drop_count_pass').removeClass('show_drop_content');
        $('#dropbtn_count_pass').removeClass('rotate_180');
        
        console.log('vvv');
    });
    // календари
    $('#id_i_d_t').change(function () {
        $(this).blur();
        $('#id_i_d_t_block').removeClass('block_inputs_active');
    });
    $('#id_i_d_b').change(function () {
        $(this).blur();
        $('#id_i_d_b_block').removeClass('block_inputs_active');
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

    $('#id_i_d_b').click(function (e) {
        $('.dd_count_pass .drop_count_pass').removeClass('show_drop_content');
        $('.form_search_block_inputs').removeClass('block_inputs_active');
        $('#dropbtn_from_flights').removeClass('rotate_180');
        $('.drop_from_flights').removeClass('show_drop_content');
        $('#dropbtn_to_flights').removeClass('rotate_180');
        $('.drop_to_flights').removeClass('show_drop_content');
    });
    $('#id_i_d_t').click(function (e) {
        $('.dd_count_pass .drop_count_pass').removeClass('show_drop_content');
        $('.form_search_block_inputs').removeClass('block_inputs_active');
        $('#dropbtn_from_flights').removeClass('rotate_180');
        $('.drop_from_flights').removeClass('show_drop_content');
        $('#dropbtn_to_flights').removeClass('rotate_180');
        $('.drop_to_flights').removeClass('show_drop_content');
    })

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
    
    var count_old_people = 0;
    var count_kids_people = 0;
    var count_baby_people = 0;
    btn_plus_old.click(function (e) {
        e.preventDefault();
        var old_count_pass_value = Number(old_count_pass.text());

        if (Number(old_count_pass_value) == 9) {
            old_count_pass.text("9");
        }
        else{
            count_old_people+=1;
            var new_value = old_count_pass_value + 1;
            old_count_pass.text(new_value);
            countPassInput();
            $('input[name="old_count_people"]').val(count_old_people);
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
            count_old_people-=1;
            countPassInput();
            $('input[name="old_count_people"]').val(count_old_people);
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
            count_kids_people+=1;
            countPassInput();
            $('input[name="kids_count_people"]').val(count_kids_people);
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
            count_kids_people-=1;
            kids_count_pass.text(new_value);
            countPassInput();
            $('input[name="kids_count_people"]').val(count_kids_people);
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
            count_baby_people+=1;
            countPassInput();
            $('input[name="baby_count_people"]').val(count_baby_people);
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
            count_baby_people-=1;
            countPassInput();
            $('input[name="baby_count_people"]').val(count_baby_people);
        }
    });
    // свое

    $('#btn_send_review').click(function (e) {
        e.preventDefault();
        $('.reviews_block p').addClass('non_view');
        var name_user = $('input[name="name_user"]').val();
        var text_review = $('textarea[name="text_review"]').val();
        if (name_user != "" && text_review != "") {
            var formData = new FormData();
            formData.append("name_user",name_user);
            formData.append("text_review",text_review);
            $.ajax({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/send_review",
                type: "POST",
                data: formData,
                dataType: "JSON",
                contentType: false,
                processData: false,
                cache: false,
                beforeSend: function () {
                    $('.overlay_review_data_form').addClass('overlay_form_active');
                },
                success: function (data) {
                    $('.overlay_review_data_form #fountainG').css('display','none');
                    
                    if (data.status) {
                        let new_review_item = document.createElement('div');
                        new_review_item.setAttribute('class','reviews_block__cards__item');
                        new_review_item.setAttribute('data-id',data.id_new_review);
                        $('.reviews_block__cards').append(new_review_item);

                        let new_review_item_name_user = document.createElement('div');
                        new_review_item_name_user.setAttribute('class','reviews_block__cards__item__name_user');
                        new_review_item_name_user.append(name_user);
                        $(new_review_item).append(new_review_item_name_user);

                        let new_review_item_date = document.createElement('div');
                        new_review_item_date.setAttribute('class','reviews_block__cards__item__date');
                        new_review_item_date.append(data.create_date);
                        $(new_review_item).append(new_review_item_date);

                        let new_review_item_text_review = document.createElement('div');
                        new_review_item_text_review.setAttribute('class','reviews_block__cards__item__text_review');
                        new_review_item_text_review.append(text_review);
                        $(new_review_item).append(new_review_item_text_review);

                        $('input[name="name_user"]').val('');
                        $('textarea[name="text_review"]').val('');
                        $('.overlay_review_data_form .check_mark_review_form img').animate({
                            height: "70px"
                        },100);
                        $('.overlay_review_data_form .check_mark_review_form').addClass('check_mark_image__active');
                        setTimeout(() => {
                            $('.overlay_review_data_form').removeClass('overlay_form_active');
                            $('.overlay_review_data_form .check_mark_review_form').removeAttr('style');
                            $('.overlay_review_data_form .check_mark_review_form img').removeAttr('style');
                            $('.overlay_review_data_form .check_mark_review_form').removeClass('check_mark_image__active');
                            
                        }, 400);
                    }
                    else{
                        $('.overlay_review_data_form').removeClass('overlay_form_active');
                    }
                }
            });
        }
    });


    $('#more_review_btn').click(function (e) {
        e.preventDefault();
        if ($(this).text() == "Показать еще") {
            var last_review_id = $('.reviews_block__cards .reviews_block__cards__item:last-child').attr('data-id');
            $.ajax({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/more_review",
                type: "POST",
                data: {
                    last_review_id: Number(last_review_id) + 1
                },
                dataType: "JSON",
                success: function (data) {
                    if (data.status) {
                        if (data.new_reviews.length < 9) {
                            $('#more_review_btn').text('Свернуть');
                        }
                        Object.keys(data.new_reviews).forEach(function (value) {
                            let new_review_item = document.createElement('div');
                            new_review_item.setAttribute('class','reviews_block__cards__item');
                            new_review_item.setAttribute('data-id',data.new_reviews[value]["id"]);
                            $('.reviews_block__cards').append(new_review_item);

                            let new_review_item_name_user = document.createElement('div');
                            new_review_item_name_user.setAttribute('class','reviews_block__cards__item__name_user');
                            new_review_item_name_user.append(data.new_reviews[value]["name_user"]);
                            $(new_review_item).append(new_review_item_name_user);

                            let new_review_item_date = document.createElement('div');
                            new_review_item_date.setAttribute('class','reviews_block__cards__item__date');
                            new_review_item_date.append(data.new_reviews[value]["create_date_review"]);
                            $(new_review_item).append(new_review_item_date);

                            let new_review_item_text_review = document.createElement('div');
                            new_review_item_text_review.setAttribute('class','reviews_block__cards__item__text_review');
                            new_review_item_text_review.append(data.new_reviews[value]["text_review"]);
                            $(new_review_item).append(new_review_item_text_review);
                        });
                    }
                }
            });
        }
        else{
            $('.reviews_block__cards__item').each(function (i,element) {
                if ($(element).attr('data-id') > 9) {
                    $(element).remove();
                    $('#more_review_btn').text('Показать еще');
                }
            });
            $('body,html').animate({scrollTop: $('.reviews_block').offset().top - 50}, 100);
        }
    });
});
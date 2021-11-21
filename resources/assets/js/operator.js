$(document).ready(function () {
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
    $('#btn_open_navbar_slide').click(function (e) {
        e.preventDefault();
        $('.aside_nav_slide').addClass('aside_nav_slide__open');
        $('.site_overlay').addClass('site_overlay__active');
        $('body').css('overflow','hidden');
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
        }
        else{
            $(this).removeClass('rotate_180');
            $('.airport_start__list').removeClass('show_drop_content');
        }
    });
    $('#input_airport_start').click(function (e) {
        e.preventDefault();
        if (!$('#dropbtn_airport_start').hasClass('rotate_180')) {
            $('#dropbtn_airport_start').addClass('rotate_180');
            $('.airport_start__list').addClass('show_drop_content');
        }
        else{
            $('#dropbtn_airport_start').removeClass('rotate_180');
            $('.airport_start__list').removeClass('show_drop_content');
        }
    });
    $('#dropbtn_airport_end').click(function (e) {
        e.preventDefault();
        if (!$(this).hasClass('rotate_180')) {
            $(this).addClass('rotate_180');
            $('.airport_end__list').addClass('show_drop_content');
        }
        else{
            $(this).removeClass('rotate_180');
            $('.airport_end__list').removeClass('show_drop_content');
        }
    });
    $('#input_airport_end').click(function (e) {
        e.preventDefault();
        if (!$('#dropbtn_airport_end').hasClass('rotate_180')) {
            $('#dropbtn_airport_end').addClass('rotate_180');
            $('.airport_end__list').addClass('show_drop_content');
        }
        else{
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
        $('#input_airport_start').val(new_value_elem);

        // $('#input_airport_start').val($(this).val());
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
        $('#input_airport_end').val(new_value_elem);

        // $('#input_airport_start').val($(this).val());
    });

    $.fn.setCursorPosition = function(pos) {
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
    $('#input_time_start').mask('fs:zl',{
        autoclear: false
    });
    $('#input_time_start').click(function () {
        $(this).setCursorPosition(0);  
    });

    $('#input_time_end').mask('fs:zl',{
        autoclear: false
    });
    $('#input_time_end').click(function () {
        $(this).setCursorPosition(0);  
    });

    $('#date_start').change(function () {
        d=new Date($(this).val());
        dt=d.getDate();
        mn=d.getMonth();
        mn++;
        yy=d.getFullYear();
        $('#date_start').val(yy+"-"+mn+"-"+dt);
    });
    $('#date_end').change(function () {
        d=new Date($(this).val());
        dt=d.getDate();
        mn=d.getMonth();
        mn++;
        yy=d.getFullYear();
        $('#date_end').val(yy+"-"+mn+"-"+dt);
    });
    window.addEventListener('click', e => {
        const target = e.target;
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
        searchInFlightsList(id_input,filter,elements);
        if($(this).val() === ""){
            $(elements).removeClass('select_elem_airport');
        }
    });


    $('#add_flight').click(function (e) {
        e.preventDefault();
        let count_airport_start_select = $('.airport_start__list__item.select_elem_airport').length;
        let count_airport_end_select = $('.airport_end__list__item.select_elem_airport').length;
        let id_airport_start = $('.airport_start__list__item.select_elem_airport').attr('data-id');
        let id_airport_end = $('.airport_end__list__item.select_elem_airport').attr('data-id');
        let date_start = $('#date_start').val();
        let date_end = $('#date_end').val();
        let time_start = $('#input_time_start').val();
        let time_end = $('#input_time_end').val();
        $('.errors_list .errors_list__item').remove();
        if (count_airport_start_select > 1 || count_airport_start_select == 0) {
            let error_list__item = document.createElement('li');
            error_list__item.setAttribute('class','errors_list__item');
            error_list__item.append('Выберите только 1 аэропорт старта');
            $('.errors_list').append(error_list__item);
        }
        else if (count_airport_end_select > 1 || count_airport_end_select == 0) {
            let error_list__item = document.createElement('li');
            error_list__item.setAttribute('class','errors_list__item');
            error_list__item.append('Выберите только 1 аэропорт прибытия');
            $('.errors_list').append(error_list__item);
        }
        else if (id_airport_start == id_airport_end) {
            let error_list__item = document.createElement('li');
            error_list__item.setAttribute('class','errors_list__item');
            error_list__item.append('Аэропорт старта не может быть равен аэропорту прибытия');
            $('.errors_list').append(error_list__item);
        }
        else if (date_start == "" || date_end == "" || time_start == "" || time_end == "") {
            let error_list__item = document.createElement('li');
            error_list__item.setAttribute('class','errors_list__item');
            error_list__item.append('Проверьте заполненность полей. Все поля должны быть заполнены');
            $('.errors_list').append(error_list__item);
        }
        else{
            let formData = new FormData()
            formData.append('id_airport_start',id_airport_start);
            formData.append('id_airport_end',id_airport_end);
            formData.append('date_start',date_start);
            formData.append('date_end',date_end);
            formData.append('time_start',time_start);
            formData.append('time_end',time_end);
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
                beforeSend: function () {
                    $('.overlay_flight_forms').addClass('overlay_form_active');
                },
                success: function (data) {
                    if (data.status) {
                        $('.overlay_flight_forms #fountainG').css('display','none');
                        $('.overlay_flight_forms .check_mark_flight_forms img').animate({
                            height: "70px"
                        },100);
                        $('.overlay_flight_forms .check_mark_flight_forms').addClass('check_mark_flight_forms__active');

                        let last_id_list_item = Number($('.flght_table_block .flght_table_block__item:last-child').attr('data-id')) + 1;


                        let flght_table_block__item = document.createElement('li');
                        flght_table_block__item.setAttribute('data-id',last_id_list_item);
                        flght_table_block__item.setAttribute('class','flght_table_block__item');
                        $('.flght_table_block .flght_table_block__item')[0].before(flght_table_block__item);

                        let flght_table_block__item__number_row = document.createElement('div');
                        flght_table_block__item__number_row.setAttribute('class','flght_table_block__item__number_row');
                        flght_table_block__item__number_row.append(last_id_list_item);
                        $(flght_table_block__item).append(flght_table_block__item__number_row);

                        let flght_table_block__item__info = document.createElement('div');
                        flght_table_block__item__info.setAttribute('class','flght_table_block__item__info');
                        $(flght_table_block__item).append(flght_table_block__item__info);

                            let flght_table_block__item__info__flight_number = document.createElement('div');
                            flght_table_block__item__info__flight_number.setAttribute('class','flght_table_block__item__info__flight_number upper');
                            flght_table_block__item__info__flight_number.append(data.flight_code);
                            $(flght_table_block__item__info).append(flght_table_block__item__info__flight_number);

                            let flght_table_block__item__info__flight_plan = document.createElement('div');
                            flght_table_block__item__info__flight_plan.setAttribute('class','flght_table_block__item__info__flight_plan');
                            $(flght_table_block__item__info).append(flght_table_block__item__info__flight_plan);

                                let flght_table_block__item__info__flight_plan__start = document.createElement('div');
                                flght_table_block__item__info__flight_plan__start.setAttribute('class','flght_table_block__item__info__flight_plan__start');
                                $(flght_table_block__item__info__flight_plan).append(flght_table_block__item__info__flight_plan__start);

                                    let flght_table_block__item__info__flight_plan__start__city = document.createElement('div');
                                    flght_table_block__item__info__flight_plan__start__city.setAttribute('class','flght_table_block__item__info__flight_plan__start__city');
                                    flght_table_block__item__info__flight_plan__start__city.append("Тест аэропорт 1(СВМ)");
                                    $(flght_table_block__item__info__flight_plan__start).append(flght_table_block__item__info__flight_plan__start__city);

                                    let flght_table_block__item__info__flight_plan__start__iata_code_date = document.createElement('div');
                                    flght_table_block__item__info__flight_plan__start__iata_code_date.setAttribute('class','flght_table_block__item__info__flight_plan__start__iata_code_date');
                                    flght_table_block__item__info__flight_plan__start__iata_code_date.append("00-00-0000 23:13");
                                    $(flght_table_block__item__info__flight_plan__start).append(flght_table_block__item__info__flight_plan__start__iata_code_date);
                                    
                                let flght_table_block__item__info__flight_plan__travel_time = document.createElement('div');
                                flght_table_block__item__info__flight_plan__travel_time.setAttribute('class','flght_table_block__item__info__flight_plan__travel_time');
                                flght_table_block__item__info__flight_plan__travel_time.append("00:00");
                                $(flght_table_block__item__info__flight_plan).append(flght_table_block__item__info__flight_plan__travel_time);

                                    let arrow_right = document.createElement('i');
                                    arrow_right.setAttribute('class','fas fa-arrow-right');
                                    arrow_right.setAttribute('aria-hidden','true');
                                    $(flght_table_block__item__info__flight_plan__travel_time).append(arrow_right);

                                let flght_table_block__item__info__flight_plan__end = document.createElement('div');
                                flght_table_block__item__info__flight_plan__end.setAttribute('class','flght_table_block__item__info__flight_plan__end');
                                $(flght_table_block__item__info__flight_plan).append(flght_table_block__item__info__flight_plan__end);

                                    let flght_table_block__item__info__flight_plan__end__city = document.createElement('div');
                                    flght_table_block__item__info__flight_plan__end__city.setAttribute('class','flght_table_block__item__info__flight_plan__end__city');
                                    flght_table_block__item__info__flight_plan__end__city.append("Тест аэропорт 2(СВМ)");
                                    $(flght_table_block__item__info__flight_plan__end).append(flght_table_block__item__info__flight_plan__end__city);

                                    let flght_table_block__item__info__flight_plan__end__iata_code_date = document.createElement('div');
                                    flght_table_block__item__info__flight_plan__end__iata_code_date.setAttribute('class','flght_table_block__item__info__flight_plan__end__iata_code_date');
                                    flght_table_block__item__info__flight_plan__end__iata_code_date.append("00-00-0000 11:11");
                                    $(flght_table_block__item__info__flight_plan__end).append(flght_table_block__item__info__flight_plan__end__iata_code_date);
                        
                            let flght_table_block__item__info__flght_price = document.createElement('div');
                            flght_table_block__item__info__flght_price.setAttribute('class','flght_table_block__item__info__flght_price');
                            flght_table_block__item__info__flght_price.append("4500");
                            $(flght_table_block__item__info).append(flght_table_block__item__info__flght_price);

                                let ruble = document.createElement('i');
                                ruble.setAttribute('class','fas fa-ruble-sign');
                                ruble.setAttribute('aria-hidden','true');
                                $(flght_table_block__item__info__flght_price).append(ruble);

                        let flght_table_block__item__edit = document.createElement('div');
                        flght_table_block__item__edit.setAttribute('class','flght_table_block__item__edit');
                        $(flght_table_block__item).append(flght_table_block__item__edit);

                            let flght_table_block__item__edit_btn = document.createElement('button');
                            flght_table_block__item__edit_btn.setAttribute('class','flght_table_block__item__edit_btn');
                            flght_table_block__item__edit_btn.setAttribute('id','flight_edit_btn_' + last_id_list_item);
                            flght_table_block__item__edit_btn.setAttribute('aria-label','flight_edit_btn_' + last_id_list_item);
                            $(flght_table_block__item__edit).append(flght_table_block__item__edit_btn);

                                let edit_pensil = document.createElement('i');
                                edit_pensil.setAttribute('class','fas fa-pencil-alt');
                                edit_pensil.setAttribute('aria-hidden','true');
                                $(flght_table_block__item__edit_btn).append(edit_pensil);

                        let flght_table_block__item__delete = document.createElement('div');
                        flght_table_block__item__delete.setAttribute('class','flght_table_block__item__delete');
                        $(flght_table_block__item).append(flght_table_block__item__delete);

                                let flght_table_block__item__delete_btn = document.createElement('button');
                                flght_table_block__item__delete_btn.setAttribute('class','flght_table_block__item__delete_btn');
                                flght_table_block__item__delete_btn.setAttribute('id','flight_delete_btn_' + last_id_list_item);
                                flght_table_block__item__delete_btn.setAttribute('aria-label','flight_delete_btn_' + last_id_list_item);
                                $(flght_table_block__item__delete).append(flght_table_block__item__delete_btn);

                                    let delete_item = document.createElement('i');
                                    delete_item.setAttribute('class','fas fa-backspace');
                                    delete_item.setAttribute('aria-hidden','true');
                                    $(flght_table_block__item__delete_btn).append(delete_item);

                        setTimeout(() => {
                            $('.overlay_flight_forms').removeClass('overlay_form_active');
                            $('.overlay_flight_forms .check_mark_flight_forms').removeAttr('style');
                            $('.overlay_flight_forms .check_mark_flight_forms').removeClass('check_mark_flight_forms__active');
                            $('.overlay_flight_forms .check_mark_flight_forms img').removeAttr('style');
                            $('.errors_list .errors_list__item').remove();
                        }, 600);
                    }
                    else if(data.type_error == 1){
                        $('.overlay_flight_forms ').removeClass('overlay_form_active');
                        Object.keys(data.errors_fields).forEach(function(value_error){
                            let error_list__item = document.createElement('li');
                            error_list__item.setAttribute('class','errors_list__item');
                            error_list__item.append(data.errors_fields[value_error]);
                            $('.errors_list').append(error_list__item);
                        });
                    }
                    else{
                        $('.overlay_flight_forms ').removeClass('overlay_form_active');
                        let error_list__item = document.createElement('li');
                        error_list__item.setAttribute('class','errors_list__item');
                        error_list__item.append(data.error_message);
                        $('.errors_list').append(error_list__item);
                    }
                },
                error: function () {
                    $('.overlay_flight_forms ').removeClass('overlay_form_active');
                        let error_list__item = document.createElement('li');
                        error_list__item.setAttribute('class','errors_list__item');
                        error_list__item.append('Возникла непредвиденная ошибка. Обновите страницу и попробуйте еще раз');
                        $('.errors_list').append(error_list__item);
                }
            });
        }
    });

    $('.flght_table_block__item__delete_btn').click(function (e) {
        e.preventDefault();

        let id_elem_delete__arr = $(this).attr('id');
        let id_elem_delete = id_elem_delete__arr[id_elem_delete__arr.length -1];

        // сделать модальное окно с уточнением об удалении
        $('.flght_table_block__item[data-id="' + id_elem_delete + '"]').remove();
        console.log(id_elem_delete);
    })
});
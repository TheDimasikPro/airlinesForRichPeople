$(document).ready(function () {
    // общее
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
    function showdropDownListCitiesSearchFlights(button,dropdown_info){
        $(button).addClass('rotate_180');
        $(dropdown_info).addClass('show_drop_content');
    }
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

    setTimeout(() => {
        var input_mask = $('.personal_data_block__update_form__type_document_list__item.select_list__item').attr('data-mask-input');
        if (input_mask.indexOf("^") === -1) {
            $('#series_numbers_document_user').mask(input_mask,{
                autoclear: false
            });
        }
        else{
            $.mask.definitions['s'] = "[A-Z]";
            $.mask.definitions['n'] = "[A-ZА-Я0-9\-]";
            $('#series_numbers_document_user').mask("ssnnnn 999999?999999",{
                autoclear: false
            });
            $('#series_numbers_document_user').val().replace(' ','');
        }
    }, 200);
    $('.personal_data_block__update_form__type_document_list__item').click(function () {
        var gender_code__text = $(this).text();
        $('#type_document_user').val(gender_code__text);
        $('.personal_data_block__update_form__type_document_list__item').removeClass('select_list__item');
        $(this).addClass('select_list__item');
        $('.personal_data_block__update_form__type_document_list').removeClass('show_drop_content');
        $('#dropbtn_type_document_user').removeClass('rotate_180');
        $('#dropbtn_type_document_user').removeAttr('style');

        var input_mask = $(this).attr('data-mask-input');
        if (input_mask.indexOf("^") === -1) {
            $('#series_numbers_document_user').mask(input_mask,{
                autoclear: false
            });
        }
        else{
            $.mask.definitions['s'] = "[A-Z]";
            $.mask.definitions['n'] = "[A-ZА-Я0-9\-]";
            $('#series_numbers_document_user').mask("ssnnnn 999999?999999",{
                autoclear: false
            });
        }
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
    $('#series_numbers_document_user').click(function () {
        $(this).setCursorPosition(0);  
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
            console.log('vv');
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
        // if (!$('.personal_data_block__update_form__country_of_issue_list').hasClass('show_drop_content')) {
        //     $('.personal_data_block__update_form__country_of_issue_list').addClass('show_drop_content');
        // }
        var id_input = $(this).attr("id");
        var filter = $(this).val().toUpperCase(); // приводим все к верхнему регистру
        var elements = $('.personal_data_block__update_form__country_of_issue_list .personal_data_block__update_form__country_of_issue_list__item'); // все элементы списка
        searchСountryOfIssue(id_input,filter,elements);
        if($(this).val() === ""){
            $(elements).removeClass('select_list__item');
        }
        // if ($('.personal_data_block__update_form__country_of_issue_list').hasClass('show_drop_content')) {
        //     $('.personal_data_block__update_form__country_of_issue_list').removeClass('show_drop_content');
        //     $('#dropbtn_country_of_issue_user').removeClass('rotate_180');
        //     $('#dropbtn_country_of_issue_user').removeAttr('style');
        // }
    });
    $('#country_of_issue_user').click(function (e) {
        e.preventDefault();
        if ($('.personal_data_block__update_form__country_of_issue_list').hasClass('show_drop_content')) {
            $('.personal_data_block__update_form__country_of_issue_list').removeClass('show_drop_content');
            $('#dropbtn_country_of_issue_user').removeClass('rotate_180');
            $('#dropbtn_country_of_issue_user').removeAttr('style');
        }
    })


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
    
    $('#btn_submit_update_personal_data').click(function (e) {
        e.preventDefault();
        $('.error_message_check_personal_data').removeClass('error_personal_data_visibly');
        $('.error_message_check_personal_data').text('');
        var full_name = $.trim($('#full_name_user').val());
        var email = $.trim($('#email_user').val());
        var phone = $.trim($('#phone_user').val());
        var date_birthday = $.trim($('#date_birthday_user').val());
        var gender_code_id = $.trim($('.personal_data_block__update_form__gender_list__item.select_list__item').val());
        var city = $.trim($('#city_user').val());
        var type_document_id = $.trim($('.personal_data_block__update_form__type_document_list__item.select_list__item').val());
        var series_numbers_document = $.trim($('#series_numbers_document_user').val());
        var country_of_issue_id = $.trim($('.personal_data_block__update_form__country_of_issue_list__item.select_list__item').val());

        if (full_name != "" && email != "" && phone != "" && date_birthday != "" && gender_code_id != "" && city != "" && type_document_id != "" && series_numbers_document != "" && country_of_issue_id) {
            var regex_email = /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/;
            var provEmail = regex_email.test(email);
            var regex_phone = /^[0-9]{6,}/;
            var provPhone = regex_phone.test(phone);
            if (!provPhone) {
                $('.error_message_check_personal_data').addClass('error_personal_data_visibly');
                $('.error_message_check_personal_data').text("Введите телефон правильно");
            }
            if (!provEmail){
                $('.error_message_check_personal_data').addClass('error_personal_data_visibly');
                $('.error_message_check_personal_data').text("Введите Email правильно");
            }
            if (provEmail && provPhone) {
                var formData = new FormData();
                formData.append("full_name",full_name);
                formData.append("email",email);
                formData.append("phone",phone);
                formData.append("date_birthday",date_birthday);
                formData.append("gender_code_id",gender_code_id);
                formData.append("city",city);
                formData.append("type_document_id",type_document_id);
                formData.append("series_numbers_document",series_numbers_document);
                formData.append("country_of_issue_id",country_of_issue_id);
                
                $.ajax({
                    url: "http://richairlines/profile/update_data",
                    headers:{
                        'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    processData: false,
                    cache: false,
                    type: "POST",
                    beforeSend: function () {
                        $('#btn_submit_update_personal_data').addClass('non_click');
                        $('#btn_submit_update_personal_data').css('background','#004369');
                        $('#btn_submit_update_personal_data').text('Ожидание загрузки');
                    },
                    success: function (data) {
                        if (data.status) {
                            if ($('#btn_submit_update_personal_data').hasClass('non_click')) {
                                $('#btn_submit_update_personal_data').text(data.message);
                                setTimeout(() => {
                                    $('#btn_submit_update_personal_data').removeClass('non_click');
                                    $('#btn_submit_update_personal_data').text('Обновить');
                                    $('#btn_submit_update_personal_data').removeAttr('style');
                                }, 1500);
                            }
                        }
                        else{
                            $('.error_message_check_personal_data').addClass('error_personal_data_visibly');
                            $('.error_message_check_personal_data').text(data.error_message);
                        }
                    }
                })
            }
            
            
        }
        else{
            $('.error_message_check_personal_data').addClass('error_personal_data_visibly');
            $('.error_message_check_personal_data').text("Проверьте поля на пустоту");
        }
    });
});
$(document).ready(function () {
    const dropbtn_prefix_phone = $('#dropbtn_prefix_phone');
    const dropbtn_gender_code = $('#dropbtn_gender_code');
    const dropbtn_type_document = $('#dropbtn_type_document');
    const dropbtn_country_of_issue = $('#dropbtn_country_of_issue');
    const input_country_of_issue = $('#input_country_of_issue');
    // общее
    function showdropDownListCitiesSearchFlights(button,dropdown_info){
        $(button).addClass('rotate_180');
        $(dropdown_info).addClass('show_drop_content');
    }
    // общее
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

    function Validate(fields)
    {
        var msg= "";
        for (var i=0; i<fields.length; i++){
            if (fields[i].value == "") 
                msg += 'Поле '+fields[i].title + ': обязательно к заполнению. ';
        }

        if(msg) {
            return msg;
        }
        else
            return true;
    }

    // общий массив данных со всех форм регистрации
    var formDataFull = new FormData();
    $('#complete_contact_data').click(function (e) {
        e.preventDefault();
        $('.form_auth_contact_data').css('position','releative');
        $('.form_auth_contact_data .error_contact_data').removeClass('error_contact_data__active');

        var regex_email = /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/;
        var provEmail = regex_email.test($.trim($('#email').val()));
        
        if (!provEmail) {
            $('.error_contact_data').addClass('error_contact_data__active');
            $('.error_contact_data .error_list__item').text("Введите e-mail корректно.");
        }
        else if (provEmail && $('#phone').val()!="") {
            
            var email_user = $('#email').val();
            var phone_user = $('.prefix_phone_list__item.select_list__item').attr('data-value') + $('#phone').val();
            var formData = new FormData();
        
            formData.append('email',email_user);
            formData.append('phone',phone_user);

            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/profile/check_email_phone__reg',
                data: formData,
                dataType: 'json',
                cache : false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('.overlay_contact_form').addClass('overlay_form_active');
                },
                success: function (data) {
                    
                    $('.overlay_contact_form #fountainG').css('display','none');
                    
                    if (data.status) {
                        formDataFull.append('email',email_user);
                        formDataFull.append('phone',phone_user);
                        $('.form_auth_contact_data').addClass('form_auth_card__anim');
                        $('.form_auth_contact_data').removeAttr('style');
                        $('#auth_block_btn').addClass('form_auth_block__anim');
                        $('#auth_block_btn').css('margin-top','auto');
                        $('.overlay_contact_form .check_mark_contact_from img').animate({
                            height: "70px"
                        },100);
                        $('.overlay_contact_form .check_mark_contact_from').addClass('check_mark_image__active');

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
                            
                            $('.overlay_contact_form').removeClass('overlay_form_active');
                            $('.overlay_contact_form .check_mark_contact_from').removeAttr('style');
                            $('.overlay_contact_form .check_mark_contact_from').removeClass('check_mark_image__active');
                            $('.overlay_contact_form .check_mark_contact_from img').removeAttr('style');
                        }, 1800);
                        setTimeout(() => {
                            $('#auth_block_btn').removeAttr('style');
                        }, 1900);
                    }
                    else{
                        $('.overlay_contact_form').removeClass('overlay_form_active');
                        $('.error_contact_data').addClass('error_contact_data__active');
                        $('.error_contact_data .error_list__item').text(data.message);
                    }
                }
            });
        }
        else{
            $('.error_contact_data').addClass('error_contact_data__active');
            $('.error_contact_data .error_list__item').text("Заполните все поля");
        }
    });
    $('#complete_profile_data').click(function (e) {
        e.preventDefault();
        $('.form_auth_contact_data').css('position','releative');
        $('.form_auth_profile_data .error_profile_data .error_list__item').remove();
        $('.form_auth_profile_data .error_profile_data').removeClass('error_contact_data__active');
        
        var valid_form = Validate($('.form_auth_profile_data input'));
        if ($('.gender_code_list__item.select_list__item').length == 0) {
            $('.form_auth_profile_data .error_profile_data').addClass('error_contact_data__active');
            $('.form_auth_profile_data .error_profile_data').removeClass('error_profile_data__active');
            let error_list_item = document.createElement('li');
            error_list_item.setAttribute('class','error_list__item');
            error_list_item.setAttribute('id','error_list__item__gender');
            error_list_item.append("Выберите свой пол");
            $('.form_auth_profile_data .error_profile_data .error_list').append(error_list_item);
        }
        if ($('.type_document_list__item.select_list__item').length == 0) {
            $('.form_auth_profile_data .error_profile_data').addClass('error_contact_data__active');
            $('.form_auth_profile_data .error_profile_data').removeClass('error_profile_data__active');
            let error_list_item = document.createElement('li');
            error_list_item.setAttribute('class','error_list__item');
            error_list_item.setAttribute('id','error_list__item__type_document');
            error_list_item.append("Выберите тип своего документа");
            $('.form_auth_profile_data .error_profile_data .error_list').append(error_list_item);
        }
        if ($('.country_of_issue_list__item.select_list__item').length == 0) {
            $('.form_auth_profile_data .error_profile_data').addClass('error_contact_data__active');
            $('.form_auth_profile_data .error_profile_data').removeClass('error_profile_data__active');
            let error_list_item = document.createElement('li');
            error_list_item.setAttribute('class','error_list__item');
            error_list_item.setAttribute('id','error_list__item__country');
            error_list_item.append("Выберите страну выдачи документа");
            $('.form_auth_profile_data .error_profile_data .error_list').append(error_list_item);
        }
        if(valid_form == true && $('.gender_code_list__item.select_list__item') && $('.type_document_list__item.select_list__item') && $('.country_of_issue_list__item.select_list__item')){
            var full_name_user = $('#full_name').val();
            var date_birthday_user = $('#date_birthday').val();
            var id_gender_code_user = $('.gender_code_list__item.select_list__item').val();
            var city_name_user = $('#city_name').val();
            var id_type_document_user = $('.type_document_list__item.select_list__item').val();
            var series_document_number_user = $('#series_document_number').val();
            var id_country_of_issue_user = $('.country_of_issue_list__item.select_list__item').val();
            var series_document_number_user_str = series_document_number_user.replace(/\s+/g, '');
            var formData = new FormData();
            formData.append("full_name",full_name_user);
            formData.append("date_birthday",date_birthday_user);
            formData.append("id_gender_code",id_gender_code_user);
            formData.append("city_name",city_name_user);
            formData.append("id_type_document",id_type_document_user);
            formData.append("series_document_number",series_document_number_user_str);
            formData.append("id_country_of_issue",id_country_of_issue_user);
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/profile/check_personal_data__reg",
                data: formData,
                dataType: "JSON",
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    
                    $('.overlay_profile_data_form').addClass('overlay_form_active');
                    // $('.overlay_profile_data_form #fountainG').css('margin-top','30%');
                },
                success: function (data) {
                    $('.overlay_profile_data_form #fountainG').css('display','none');
                    
                    
                    if (data.status) {
                        $('.form_auth_profile_data .error_profile_data').removeClass('error_profile_data__active');
                        formDataFull.append("full_name",full_name_user);
                        formDataFull.append("date_birthday",date_birthday_user);
                        formDataFull.append("id_gender_code",id_gender_code_user);
                        formDataFull.append("city_name",city_name_user);
                        formDataFull.append("id_type_document",id_type_document_user);
                        formDataFull.append("series_document_number",series_document_number_user_str);
                        formDataFull.append("id_country_of_issue",id_country_of_issue_user);

                        $('.form_auth_profile_data').removeAttr('style');
                        $('.form_auth_profile_data').addClass('form_auth_card__anim');
                        $('#auth_block_btn').addClass('form_auth_block__anim');
                        $('#auth_block_btn').css('margin-top','auto');

                        $('.overlay_profile_data_form .check_mark_contact_from img').animate({
                            height: "70px"
                        },100);
                        $('.overlay_profile_data_form .check_mark_contact_from').addClass('check_mark_image__active');


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
                            
                            // $('.overlay_profile_data_form').removeClass('overlay_form_active');
                            // $('.overlay_profile_data_form #fountainG').removeAttr('style');
                            // $('.overlay_profile_data_form .check_mark_contact_from').removeAttr('style');
                            // $('.overlay_profile_data_form .check_mark_contact_from').removeClass('check_mark_image__active');
                            // $('.overlay_profile_data_form .check_mark_contact_from img').removeAttr('style');



                            $('.overlay_profile_data_form').removeClass('overlay_form_active');
                            $('.overlay_profile_data_form .check_mark_contact_from').removeAttr('style');
                            $('.overlay_profile_data_form .check_mark_contact_from').removeClass('check_mark_image__active');
                            $('.overlay_profile_data_form .check_mark_contact_from img').removeAttr('style');
                            $('.error_password_data .error_list__item').remove();
                        }, 1800);
                        setTimeout(() => {
                            $('#auth_block_btn').removeAttr('style');
                        }, 1900);
                    }
                    else{
                        $('.overlay_profile_data_form').removeClass('overlay_form_active');
                        setTimeout(() => {
                            $('.error_profile_data .error_list__item').remove();
                            $('.error_profile_data').removeAttr('style');
                            if (data.errors_fields != null) {
                                Object.keys(data.errors_fields).forEach(function(value_error){
                                    let error_list_item = document.createElement('li');
                                    error_list_item.setAttribute('class','error_list__item');
                                    error_list_item.append(data.errors_fields[value_error]);
                                    $('.error_list').append(error_list_item);
                                });
                            }
                            else{
                                let error_list_item = document.createElement('li');
                                error_list_item.setAttribute('class','error_list__item');
                                error_list_item.append(data.error_message);
                                $('.error_list').append(error_list_item);
                            }
                            
                           
                            $('.error_profile_data').addClass('error_profile_data__active');
                        }, 200);
                        $('.error_profile_data .error_list .error_list__item:last-of-type').css('display','none');
                    }
                }
            });
        }
        else{
            setTimeout(() => {
                $('.form_auth_profile_data .error_profile_data').removeAttr('style');
                var fileds_error = valid_form.split('.');
                fileds_error.forEach(element => {
                    let error_list_item = document.createElement('li');
                    error_list_item.setAttribute('class','error_list__item');
                    error_list_item.append(element);
                    $('.form_auth_profile_data .error_profile_data .error_list').append(error_list_item);
                });
                $('.form_auth_profile_data .error_profile_data').addClass('error_profile_data__active');
                $('.form_auth_profile_data .error_profile_data .error_list .error_list__item:last-of-type').css('display','none');
            }, 200);
        }
    });
    $('#complete_password_data').click(function (e) {
        e.preventDefault();
        $('.form_auth_password_data').removeAttr('style');
        $('.form_auth_password_data .error_password_data').removeClass('error_password_data__active');
        $('.error_password_data .error_list__item').remove();
        // $('.form_auth_password_data .error_password_data').css('height','0');
        // $('.form_auth_password_data .error_password_data').css('padding','0px');
        var password_user = $('#input_password').val();
        var regex_password = /(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{8,}/;
        var provEmail = regex_password.test($.trim($('#input_password').val()));
        var valid_form = Validate($('.form_auth_password_data input'));
        if (password_user.length < 8) {
            $('.form_auth_password_data .error_password_data').removeAttr('style');
            $('.error_password_data').addClass('error_password_data__active');
            let error_list_item = document.createElement('li');
            error_list_item.setAttribute('class','error_list__item');
            error_list_item.append("Пароль должен быть не меньше 8 символов");
            $('.form_auth_password_data .error_password_data .error_list').append(error_list_item);
            // $('.error_password_data .error_list__item').text("Пароль должен быть не меньше 8 символов");
        }
        else if (!provEmail) {
            $('.form_auth_password_data .error_password_data').removeAttr('style');
            $('.error_password_data').addClass('error_password_data__active');
            let error_list_item = document.createElement('li');
            error_list_item.setAttribute('class','error_list__item');
            error_list_item.append("Слабый пароль. Используйте заглавные и прописные латинские буквы, а также цифры и минимум один из следюущий символов: !@#$%^&*");
            $('.form_auth_password_data .error_password_data .error_list').append(error_list_item);
        }
        else if(valid_form == true){
            var formData = new FormData();
            formData.append('password',password_user);
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/profile/check_password_data__reg',
                data: formData,
                dataType: 'json',
                cache : false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('.overlay_password_data_form').addClass('overlay_form_active');
                },
                success: function (data) {
                    $('.overlay_password_data_form #fountainG').css('display','none');
                    $('#auth_block_btn').removeAttr('style');
                    // $('.error_password_data .error_list__item').remove();
                    if (data.status) {
                        $('.form_auth_password_data .error_password_data').removeClass('error_password_data__active');
                        $('.form_auth_password_data').addClass('form_auth_card__anim');
                        $('#auth_block_btn').addClass('form_auth_block__anim');
                        $('#auth_block_btn').css('margin-top','auto');

                        $('.overlay_password_data_form .check_mark_contact_from img').animate({
                            height: "70px"
                        },100);
                        $('.overlay_password_data_form .check_mark_contact_from').addClass('check_mark_image__active');

                        formDataFull.append('password',password_user);
                        // formDataFull.forEach((value,key) => {
                        //     console.log(key+" "+value)
                        // });
                        $('.form_auth_contact_data').addClass('form_auth_card__anim');
                        $('.form_auth_contact_data').removeAttr('style');
                        $('#auth_block_btn').addClass('form_auth_block__anim');
                        $('#auth_block_btn').css('margin-top','auto');
                        setTimeout(() => {
                            $('#main_form_auth').animate({
                                minHeight: "707px"
                                // minHeight: "auto"
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
                            }, 1200);
                            setTimeout(() => {
                                $('.form_auth_password_data').addClass('form_auth_card__complete_anim');
                                $('.form_auth_password_data').removeAttr('style');
                                $('.overlay_password_data_form').removeClass('overlay_form_active');
                                $('.overlay_password_data_form .check_mark_contact_from').removeAttr('style');
                                $('.overlay_password_data_form .check_mark_contact_from').removeClass('check_mark_image__active');
                                $('.overlay_password_data_form .check_mark_contact_from img').removeAttr('style');
                            }, 1380);
                        }, 500);
                        setTimeout(() => {
                            
                            $('#auth_block_btn').removeClass('form_auth_block__anim');
                            $('.overlay_password_data_form').removeClass('overlay_form_active');
                            // $('#auth_block_btn').animate({
                            //     marginTop: '40px'
                            // });
                            // $('#auth_block_btn').css('margin-top','40px');
                        }, 1800);
                        
                    }
                    else{
                        $('.overlay_password_data_form').removeClass('overlay_form_active');
                        $('.error_password_data').addClass('error_password_data__active');
                        let error_list_item = document.createElement('li');
                        error_list_item.setAttribute('class','error_list__item');
                        error_list_item.append(data.error_message);
                        $('.error_password_data .error_list').append(error_list_item);
                        // $('.error_password_data .error_list__item').text(data.error_message);
                    }
                }
            });
            
        }
        else{
            $('.form_auth_password_data .error_password_data').addClass('error_password_data__active');
            let error_list_item = document.createElement('li');
            error_list_item.setAttribute('class','error_list__item');
            error_list_item.append("Заполните все поля");
            $('.form_auth_password_data .error_password_data .error_list').append(error_list_item);
        }
        

        var email_user = $('#email').val();
        var phone_user = $('.prefix_phone_list__item.select_list__item').attr('data-value') + $('#phone').val();
        var full_name_user = $('#full_name').val();
        var date_birthday_user = $('#date_birthday').val();
        var gender_code_user = $('.gender_code_list__item.select_list__item').attr('value-view');
        var city_name_user = $('#city_name').val();
        var type_document_user = $('.type_document_list__item.select_list__item').text();
        var series_document_number_user = $('#series_document_number').val();
        var country_of_issue_user = $('.country_of_issue_list__item.select_list__item').text();
        var password_user = $('#input_password').val();

        $('#title_text_item__full_name').text(full_name_user);
        $('#title_text_item__email').text(email_user);
        $('#title_text_item__phone').text(phone_user);
        $('#title_text_item__city').text(city_name_user);
        $('#title_text_item__city_of_issue').text(country_of_issue_user);
        $('#title_text_item__password').text(password_user);
        $('#title_text_item__date_birthday').text(date_birthday_user);
        $('#title_text_item__gender_code').text(gender_code_user);
        $('#title_text_item__type_document').text(type_document_user);
        $('#title_text_item__series_and_number_document').text(series_document_number_user);
    });
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

    $('#btn_registered').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/profile/registration',
            data: formDataFull,
            cache : false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('.overlay_finish_form').addClass('overlay_form_active');
            },
            success: function (data) {
                var data_JSON = JSON.parse(data);
                if (data_JSON.status) {
                    $('.overlay_finish_form #fountainG').css('display','none');
                    $('.overlay_finish_form .check_mark_contact_from img').animate({
                        height: "70px"
                    },100);
                    $('.overlay_finish_form .check_mark_contact_from').addClass('check_mark_image__active');
                    setTimeout(() => {
                        // if (window.history.replaceState) {
                        //     //prevents browser from storing history with each change:
                        //     window.history.replaceState(statedata, title, url);
                        //  }
                        // window.location.href = data_JSON.url_redirect;
                        location.reload();
                    }, 1200);
                }
                else{
                    $('.overlay_finish_form ').removeClass('overlay_form_active');
                    $('.overlay_finish_form').addClass('error_finish_data__active');

                    $('.error_finish_data').addClass('error_contact_data__active');
                    $('.error_finish_data .error_list__item').text(data_JSON.error_message);
                }
            },
            error: function (data) {
                $('#auth_block_btn').animate({
                    marginTop: '20px'
                });
                $('.overlay_finish_form ').removeClass('overlay_form_active');
                $('.overlay_finish_form').addClass('error_finish_data__active');
                $('.error_finish_data').addClass('error_contact_data__active');
                $('.error_finish_data .error_list__item').text("Возникла непредвиденная ошибка, повторите попытку позже");
            }
        });
    });
})
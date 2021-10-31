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
})
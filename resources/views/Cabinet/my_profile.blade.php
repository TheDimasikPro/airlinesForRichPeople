@extends('layouts.app_layout')
@section('title_page','Личный кабинет')
@section('styles_link')
    {{-- <link rel="stylesheet" href="/assets/css/style.min.css"> --}}
    <link rel="stylesheet" href="/assets/css/my_pofile.css">
@endsection
@section('content')
    <div class="container">
        <div class="my_profile_block df_jcspb_aic">
            @include('inc.aside_bar_profile')
            {{-- @include('inc.aside_bar_profile',"array") передача массива в шаблон --}}

            <div class="profile_data_cards">
                <div class="control_panel_block non_view">
                    <p>Добро пожаловать <span class="control_panel_block__full_name_user">Трошков Дмитрий Александрович</span> 
                        (если вы не <span class="control_panel_block__full_name_user">Трошков Дмитрий Александрович</span>) 
                        , то нажмите <a href="" class="exit_profile_link">Выйти</a> 
                        <!-- /.exit_profile_link -->
                    </p>
                    <p>
                        Из панели управления вы можете, просмотреть свои личные данные и историю поездок за последний год, Если вам нужна полная история, то выберите пункт "Полная история поездок" в меню.
                    </p>
                </div>
                <!-- /.control_panel_block -->
                <div class="personal_data_block">
                    <h2>Изменить данные аккаунта</h2>
                    <form action="" class="personal_data_block__update_form">
                        <div class="personal_data_block__update_form__input_block">
                            <label for="full_name_user">Полное имя</label>
                            <input type="text" id="full_name_user" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Введите свое полное имя">
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="email_user">Почта</label>
                            <input type="text" id="email_user" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Введите свою почту">
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="phone_user">Телефон</label>
                            <input type="text" id="phone_user" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Введите свой телефон">
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="date_birthday_user">Дата рождения</label>
                            <input type="date" id="date_birthday_user" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Выберите свою дату рождения">
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="gender_user">
                                Пол
                                <input type="text" readonly id="gender_user" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Выберите свой пол">
                                <button class="personal_data_block__update_form__dropbtn" type="button" id="dropbtn_gender_user" aria-label="dropbtn_gender_user">
                                    <i class="fas fa-arrow-down"></i>
                                </button>
                            </label>
                            <ul class="personal_data_block__update_form__gender_list">
                                <li class="personal_data_block__update_form__gender_list__item" value="123">Мужской</li>
                                <li class="personal_data_block__update_form__gender_list__item" value="123">Женский</li>
                            </ul>
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="city_user">Город</label>
                            <input type="text" id="city_user" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Введите название своего города">
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="type_document_user">
                                Тип документа
                                <input type="text" readonly id="type_document_user" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Выберите тип документа">
                                <button class="personal_data_block__update_form__dropbtn" type="button" id="dropbtn_type_document_user" aria-label="dropbtn_type_document_user">
                                    <i class="fas fa-arrow-down"></i>
                                </button>
                            </label>
                            <ul class="personal_data_block__update_form__type_document_list">
                                <li class="personal_data_block__update_form__type_document_list__item" value="123">Мужской</li>
                                <li class="personal_data_block__update_form__type_document_list__item" value="123">Женский</li>
                            </ul>
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="series_numbers_document_user">Серия и номер документа</label>
                            <input type="text" id="series_numbers_document_user" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Введите серию и номер документа">
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="country_of_issue_user">
                                Страна выдачи
                                <input type="text" id="country_of_issue_user" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Выберите страну выдачи документа">
                                <button class="personal_data_block__update_form__dropbtn" type="button" id="dropbtn_country_of_issue_user" aria-label="dropbtn_country_of_issue_user">
                                    <i class="fas fa-arrow-down"></i>
                                </button>
                            </label>
                            <ul class="personal_data_block__update_form__country_of_issue_list">
                                <li class="personal_data_block__update_form__country_of_issue_list__item" value="123">Мужской</li>
                                <li class="personal_data_block__update_form__country_of_issue_list__item" value="123">Женский</li>
                                <li class="personal_data_block__update_form__country_of_issue_list__item" value="123">Мужской</li>
                                <li class="personal_data_block__update_form__country_of_issue_list__item" value="123">Женский</li>
                                <li class="personal_data_block__update_form__country_of_issue_list__item" value="123">Мужской</li>
                                <li class="personal_data_block__update_form__country_of_issue_list__item" value="123">Женский</li>
                            </ul>
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="old_password_user">Старый пароль</label>
                            <input type="password" id="old_password_user" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Это ваш старый пароль">
                            <button type="button" class="btn_show" id="btn_show_old_password" aria-label="btn_show_old_password">
                                <i class="far fa-eye-slash"></i>
                            </button> 
                            <!-- /.show_old_password -->
                            <button type="button" class="btn_hide non_view" id="btn_hide_old_password" aria-label="btn_hide_old_password">
                                <i class="far fa-eye"></i>
                            </button> 
                            <!-- /.hide_old_password -->
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="new_password_user">Новый пароль</label>
                            <input type="password" id="new_password_user" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Введите новый пароль">
                            <button type="button" class="btn_show" id="btn_show_new_password" aria-label="btn_show_new_password">
                                <i class="far fa-eye-slash"></i>
                            </button> 
                            <!-- /.show_new_password -->
                            <button type="button" class="btn_hide non_view" id="btn_hide_new_password" aria-label="btn_hide_new_password">
                                <i class="far fa-eye"></i>
                            </button> 
                            <!-- /.hide_new_password -->
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="confirm_new_password_user">Подтвердите новый пароль</label>
                            <input type="password" id="confirm_new_password_user" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Подтвердите новый пароль">
                            <button type="button" class="btn_show" id="btn_show_confirm_new_password" aria-label="btn_show_confirm_new_password">
                                <i class="far fa-eye-slash"></i>
                            </button> 
                            <!-- /.show_confirm_new_password -->
                            <button type="button" class="btn_hide non_view" id="btn_hide_confirm_new_password" aria-label="btn_hide_confirm_new_password">
                                <i class="far fa-eye"></i>
                            </button> 
                            <!-- /.hide_confirm_new_password -->
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <button class="btn_style_1" type="button" id="btn_submit_update_personal_data" aria-label="btn_submit_update_personal_data">Обновить</button>
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                    </form>
                    <!-- /.personal_data_block__update_form -->
                </div>
                <!-- /.personal_data_block -->
                <div class="my_travel_block">

                </div>
                <!-- /.my_travel_block -->
                <div class="full_history_travel_block">
                    
                </div>
                <!-- /.full_history_travel_block -->
            </div>
            <!-- /.profile_data_cards -->
            
        </div>
        <!-- /.my_profile_block -->
    </div>
    <!-- /.container -->
@endsection
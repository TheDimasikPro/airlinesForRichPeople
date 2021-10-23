@extends('layouts.app_layout')
@section('title_page','Регистрация')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/auth.min.css">
@endsection
@section('content')
    <div class="container df_jcc_aic">
        <div action="" class="form form_auth">
            <h1>Регистрация</h1>

            {{-- регистрация проходит в несколько этапов
            1) почта и телефон
            2) паспортные данные, фио, год рождения
            3) пароль4) финиш --}}
            <div class="form_auth_block">
                <div class="form_auth__row">
                    <ul class="stages_list df_jcspb_aic">
                        <li class="stages_list__item stages_list__item_active">Контакные данные</li>
                        <li class="stages_list__item">Данные профиля</li>
                        <li class="stages_list__item">Пароль</li>
                        <li class="stages_list__item">Финиш</li>
                    </ul>
                    <!-- /.stages_list -->
                </div>
                <!-- /.form_auth__row -->
                <div class="form_auth__row">
                    <form action="" class="form_auth_contact_data form_auth_non_view" autocomplete="off">
                        <div class="form_auth_block">
                            <label for="email">E-mail</label>
                            <input type="email" autocomplete class="super_big_input form_auth_input" id="email" name="email" placeholder="Введите свою почту">
                            <div class="form_auth__slider_input"></div>
                            <!-- /.form_auth__slider_input -->
                        </div>
                        <!-- /.form_auth_block -->
                        <div class="form_auth__row df_jcspb_aic">
                            <div class="form_auth_block">
                                <label for="prefix_phone">Prefix phone</label>
                                <input type="tel" autocomplete class="min_input form_auth_input" readonly id="prefix_phone" name="phone" value="+7">
                                <button class="dropbtn" type="button" id="dropbtn_prefix_phone" aria-label="dropbtn_prefix_phone">
                                    <i class="fas fa-arrow-down" id=""></i>
                                </button>
                                
                                <div class="form_auth__slider_input"></div>
                                <!-- /.form_auth__slider_input -->
                                <ul class="prefix_phone_list">
                                    <li class="prefix_phone_list__item">+7</li>
                                    <li class="prefix_phone_list__item">+20</li>
                                    <li class="prefix_phone_list__item">+21</li>
                                    <li class="prefix_phone_list__item">+30</li>
                                    <li class="prefix_phone_list__item">+31</li>
                                    <li class="prefix_phone_list__item">+33</li>
                                    <li class="prefix_phone_list__item">+34</li>
                                    <li class="prefix_phone_list__item">+351</li>
                                    <li class="prefix_phone_list__item">+355</li>
                                    <li class="prefix_phone_list__item">+356</li>
                                    <li class="prefix_phone_list__item">+357</li>
                                    <li class="prefix_phone_list__item">+358</li>
                                    <li class="prefix_phone_list__item">+359</li>
                                    <li class="prefix_phone_list__item">+36</li>
                                    <li class="prefix_phone_list__item">+371</li>
                                    <li class="prefix_phone_list__item">+374</li>
                                    <li class="prefix_phone_list__item">+355</li>
                                    <li class="prefix_phone_list__item">+380</li>
                                    <li class="prefix_phone_list__item">+382</li>
                                    <li class="prefix_phone_list__item">+385</li>
                                    <li class="prefix_phone_list__item">+386</li>
                                    <li class="prefix_phone_list__item">+39</li>
                                    <li class="prefix_phone_list__item">+41</li>
                                    <li class="prefix_phone_list__item">+420</li>
                                    <li class="prefix_phone_list__item">+43</li>
                                    <li class="prefix_phone_list__item">+44</li>
                                    <li class="prefix_phone_list__item">+47</li>
                                    <li class="prefix_phone_list__item">+48</li>
                                    <li class="prefix_phone_list__item">+49</li>
                                    <li class="prefix_phone_list__item">+66</li>
                                    <li class="prefix_phone_list__item">+81</li>
                                    <li class="prefix_phone_list__item">+84</li>
                                    <li class="prefix_phone_list__item">+86</li>
                                    <li class="prefix_phone_list__item">+90</li>
                                    <li class="prefix_phone_list__item">+91</li>
                                    <li class="prefix_phone_list__item">+962</li>
                                    <li class="prefix_phone_list__item">+971</li>
                                    <li class="prefix_phone_list__item">+972</li>
                                    <li class="prefix_phone_list__item">+973</li>
                                    <li class="prefix_phone_list__item">+992</li>
                                    <li class="prefix_phone_list__item">+994</li>
                                    <li class="prefix_phone_list__item">+995</li>
                                    <li class="prefix_phone_list__item">+996</li>
                                    <li class="prefix_phone_list__item">+998</li>
                                </ul>
                            </div>
                            <!-- /.form_auth_block -->
                            <div class="form_auth_block">
                                <label for="phone">Phone</label>
                                <input type="tel" autocomplete class="big_input form_auth_input" id="phone" name="phone" placeholder="Введите номер своего телефона">
                                <div class="form_auth__slider_input"></div>
                                <!-- /.form_auth__slider_input -->
                            </div>
                            <!-- /.form_auth_block -->
                        </div>
                        <!-- /.form_auth__row -->
                        
                        <div class="form_auth_block">
                            <button class="btn btn_style_1 upper" type="button" id="complete_contact_data" aria-label="complete_contact_data">Продолжить</button> 
                            <!-- /.btn btn_style_1 upper-->
                        </div>
                    </form>
                    <!-- /.form_auth_contact_data -->
                    <form action="" class="form_auth_profile_data form_auth_non_view" autocomplete="off">
                        <div class="form_auth_block">
                            <label for="full_name">Full name</label>
                            <input type="text" autocomplete="new" class="super_big_input form_auth_input" id="full_name" name="full_name" placeholder="Введите полное имя">
                            <div class="form_auth__slider_input"></div>
                            <!-- /.form_auth__slider_input -->
                        </div>
                        <!-- /.form_auth_block -->
                        <div class="form_auth__row df_jcspb_aic">
                            <div class="form_auth_block">
                                <label for="date_birthday">Date birthday</label>
                                <input type="date" autocomplete="new" class="sm_input_2 form_auth_input" id="date_birthday" name="date_birthday" placeholder="Дата рождения">
                                <div class="form_auth__slider_input"></div>
                            </div>
                            <!-- /.form_auth_block -->
                            <div class="form_auth_block">
                                <label for="gender_code">Gender</label>
                                <input type="text" autocomplete="new" class="sm_input_2 form_auth_input" readonly id="gender_code" name="gender_code" placeholder="Пол">
                                <button class="dropbtn" type="button" id="dropbtn_gender_code" aria-label="dropbtn_gender_code">
                                    <i class="fas fa-arrow-down" id=""></i>
                                </button>
                                
                                <div class="form_auth__slider_input"></div>
                                <!-- /.form_auth__slider_input -->
                                <ul class="gender_code_list">
                                    <li class="gender_code_list__item">Мужской / Male</li>
                                    <li class="gender_code_list__item">Женский / Woman</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form_auth_block">
                            <label for="city_name">City</label>
                            <input type="text" autocomplete="new" class="super_big_input form_auth_input" id="city_name" name="city_name" placeholder="Введите название своего города">
                            <div class="form_auth__slider_input"></div>
                            <!-- /.form_auth__slider_input -->
                        </div>
                        <div class="form_auth__row df_jcspb_aic">
                            <div class="form_auth_block">
                                <label for="type_document">Type document</label>
                                <input type="text" autocomplete="new" class="sm_input_2 form_auth_input" readonly id="type_document" name="type_document" placeholder="Тип документа">
                                <button class="dropbtn" type="button" id="dropbtn_type_document" aria-label="dropbtn_type_document">
                                    <i class="fas fa-arrow-down" id=""></i>
                                </button>
                                
                                <div class="form_auth__slider_input"></div>
                                <!-- /.form_auth__slider_input -->
                                <ul class="type_document_list">
                                    <li class="type_document_list__item">Мужской</li>
                                    <li class="type_document_list__item">Женский</li>
                                    <li class="type_document_list__item">Мужской</li>
                                    <li class="type_document_list__item">Женский</li>
                                    <li class="type_document_list__item">Мужской</li>
                                    <li class="type_document_list__item">Женский</li>
                                    <li class="type_document_list__item">Мужской</li>
                                    <li class="type_document_list__item">Женский</li>
                                </ul>
                            </div>
                            <div class="form_auth_block">
                                <label for="series_document_number">Series and document number</label>
                                <input type="text" autocomplete="new" class="sm_input_2 form_auth_input" id="series_document_number" name="series_document_number" placeholder="Серия и номер документа">
                                <div class="form_auth__slider_input"></div>
                                <!-- /.form_auth__slider_input -->
                            </div>
                            <!-- /.form_auth_block -->
                        </div>
                        <div class="form_auth__row">
                            <div class="form_auth_block">
                                <label for="input_country_of_issue">Country of issue</label>
                                <input type="text" autocomplete="new" class="super_big_input form_auth_input" id="input_country_of_issue" name="country_of_issue" placeholder="Страна выдачи">
                                <button class="dropbtn" type="button" id="dropbtn_country_of_issue" aria-label="dropbtn_country_of_issue">
                                    <i class="fas fa-arrow-down" id=""></i>
                                </button>
                                
                                <div class="form_auth__slider_input"></div>
                                <!-- /.form_auth__slider_input -->
                                <ul class="country_of_issue_list">
                                    <li class="country_of_issue_list__item">Мужской</li>
                                    <li class="country_of_issue_list__item">Женский</li>

                                </ul>
                            </div>
                        </div>
                        <div class="form_auth_block">
                            <button class="btn btn_style_1 upper" type="button" id="complete_profile_data" aria-label="complete_profile_data">Продолжить</button> 
                            <!-- /.btn btn_style_1 upper-->
                        </div>
                        <!-- /.form_auth_block -->
                        <!-- /.form_auth__row -->
                        {{-- <div class="form_auth_block">
                            <label for="date_birthday">Date birthday</label>
                            <input type="date" autocomplete class="sm_input_2 form_auth_input" id="date_birthday" name="date_birthday" placeholder="Дата рождения">
                            <div class="form_auth__slider_input"></div>
                            <!-- /.form_auth__slider_input -->
                        </div>
                        <!-- /.form_auth_block --> --}}
                    </form>
                    <!-- /.form_auth_profile_data -->
                    <div class="form_auth_password_data">
                        <div class="form_auth_block">
                            <label for="password">Password</label>
                            <input type="password" autocomplete="new" class="super_big_input form_auth_input" id="input_password" name="password" placeholder="Введите свой пароль">
                            <button class="dropbtn" type="button" id="show_passwod" aria-label="btn_show_passwod">
                                <i class="far fa-eye-slash"></i>
                            </button>
                            <button class="dropbtn non_view" type="button" id="hide_passwod" aria-label="btn_hide_passwod">
                                <i class="far fa-eye"></i>
                            </button>
                            <div class="form_auth__slider_input"></div>
                            <!-- /.form_auth__slider_input -->
                        </div>
                        <div class="form_auth_block">
                            <button class="btn btn_style_1 upper" type="button" id="complete_password_data" aria-label="complete_password_data">Продолжить</button> 
                            <!-- /.btn btn_style_1 upper-->
                        </div>
                    </div>
                    <!-- /.form_auth_password_data form_auth_non_view -->
                </div>
                <!-- /.form_auth__row -->
            </div>
            <!-- /.form_auth_block -->
           
            





            {{-- <div class="form_auth_block">
                <button class="btn btn_style_1 upper">Зарегистрироваться</button> 
                <!-- /.btn btn_style_1 upper-->
            </div> --}}
            <!-- /.form_auth_block -->
            <div class="form_auth_block df_jcspb_aic"  id="auth_block_btn">
                <a href="{{ route('login_page') }}" class="link_auth link_login_page">Авторизоваться</a>
            </div>
            <!-- /.form_auth_block -->
        </div>
        <!-- /.form form_auth -->
    </div>
    <!-- /.container -->
@endsection
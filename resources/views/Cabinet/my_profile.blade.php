@extends('layouts.app_layout')
@section('title_page','Личный кабинет')
@section('styles_link')
    {{-- <link rel="stylesheet" href="/assets/css/style.min.css"> --}}
    <link rel="stylesheet" href="/assets/css/my_pofile.css">
@endsection
@section('content')
    
    <div class="container">
        
        <div class="my_profile_block df_jcspb_aic">
            @include('inc.aside_bar_profile',$auth_user)
            {{-- @include('inc.aside_bar_profile',"array") передача массива в шаблон --}}

            <div class="profile_data_cards">
                <div class="control_panel_block active_profile_data non_active_style">
                    <p>Добро пожаловать <span class="control_panel_block__full_name_user">{{ $auth_user["full_name"] }}</span> 
                        (если вы не <span class="control_panel_block__full_name_user">{{ $auth_user["full_name"] }}</span>) 
                        , то нажмите <a href="{{ route('logout') }}" class="exit_profile_link">Выйти</a> 
                        <!-- /.exit_profile_link -->
                    </p>
                    <p>
                        Из панели управления вы можете, просмотреть свои личные данные и историю поездок за последний год, если вам нужна полная история, то выберите пункт "Полная история поездок" в меню.
                    </p>
                </div>
                <!-- /.control_panel_block -->
                <div class="personal_data_block profile_data_cards_non_view">
                    <h2>Здесь вы можете просмотреть и изменить данные аккаунта</h2>
                    <form action="" class="personal_data_block__update_form">
                        <div class="personal_data_block__update_form__input_block">
                            <label for="full_name_user">Полное имя</label>
                            <input type="text" id="full_name_user" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Введите свое полное имя" value="{{ $auth_user["full_name"] }}">
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="email_user">Почта</label>
                            <input type="text" id="email_user" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Введите свою почту" value="{{ $auth_user["email"] }}">
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="phone_user">Телефон</label>
                            <input type="text" id="phone_user" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Введите свой телефон" value="{{ $auth_user["phone"] }}">
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="date_birthday_user">Дата рождения</label>
                            <input type="date" id="date_birthday_user" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Выберите свою дату рождения" value="{{ $auth_user["date_of_birthday"] }}">
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="gender_user">
                                Пол
                                <input type="text" readonly id="gender_user" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Выберите свой пол" value="{{ $auth_user["user_gender_code_name"] }}">
                                <button class="personal_data_block__update_form__dropbtn" type="button" id="dropbtn_gender_user" aria-label="dropbtn_gender_user">
                                    <i class="fas fa-arrow-down"></i>
                                </button>
                            </label>
                            <ul class="personal_data_block__update_form__gender_list">
                                @foreach ($auth_user["gender_codes_all"] as $gender_code)
                                @if ($gender_code->id == $auth_user["id_gender_code"])
                                    <li class="personal_data_block__update_form__gender_list__item select_list__item" value="{{ $gender_code->id }}">{{ $gender_code->gender_name_rus }}</li>
                                @else
                                    <li class="personal_data_block__update_form__gender_list__item" value="{{ $gender_code->id }}">{{ $gender_code->gender_name_rus }}</li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="city_user">Город</label>
                            <input type="text" id="city_user" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Введите название своего города" value="{{ $auth_user["city_of_residence"] }}">
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="type_document_user">
                                Тип документа
                                <input type="text" readonly id="type_document_user" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Выберите тип документа" value="{{ $auth_user["user_document_type"] }}">
                                <button class="personal_data_block__update_form__dropbtn" type="button" id="dropbtn_type_document_user" aria-label="dropbtn_type_document_user">
                                    <i class="fas fa-arrow-down"></i>
                                </button>
                            </label>
                            <ul class="personal_data_block__update_form__type_document_list">
                                @foreach ($auth_user["document_types_all"] as $document_type)
                                @if ($auth_user["id_document_type"] == $document_type->id)
                                    <li class="personal_data_block__update_form__type_document_list__item select_list__item" value="{{ $document_type->id }}">{{ $document_type->name_document }}</li> 
                                @else
                                    <li class="personal_data_block__update_form__type_document_list__item" value="{{ $document_type->id }}">{{ $document_type->name_document }}</li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="series_numbers_document_user">Серия и номер документа</label>
                            <input type="text" id="series_numbers_document_user" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Введите серию и номер документа" value="{{ $auth_user["series_and_document_number"] }}">
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="country_of_issue_user">
                                Страна выдачи документа
                                <input type="text" id="country_of_issue_user" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Выберите страну выдачи документа" value="{{ $auth_user["user_country_of_issue"] }}">
                                <button class="personal_data_block__update_form__dropbtn" type="button" id="dropbtn_country_of_issue_user" aria-label="dropbtn_country_of_issue_user">
                                    <i class="fas fa-arrow-down"></i>
                                </button>
                            </label>
                            <ul class="personal_data_block__update_form__country_of_issue_list">
                                @foreach ($auth_user["countries_all"] as $county)
                                @if ($auth_user["id_country_of_issue"] == $county->id)
                                    <li class="personal_data_block__update_form__country_of_issue_list__item select_list__item" value="{{ $county->id }}">{{ $county->name_country }}</li>
                                @else
                                    <li class="personal_data_block__update_form__country_of_issue_list__item" value="{{ $county->id }}">{{ $county->name_country }}</li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        {{-- <div class="personal_data_block__update_form__input_block">
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
                        <!-- /.personal_data_block__update_form__input_block --> --}}
                        <div class="personal_data_block__update_form__input_block">
                            <button class="btn_style_1" type="button" id="btn_submit_update_personal_data" aria-label="btn_submit_update_personal_data">Обновить</button>
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                    </form>
                    <!-- /.personal_data_block__update_form -->
                </div>
                <!-- /.personal_data_block -->
                <div class="my_travel_block profile_data_cards_non_view">
                    <h2>Мои поездки за последний год</h2>
                    <div class="my_travel_block__cards">
                        <!-- /.my_travel_block__cards__item -->
                        <div class="my_travel_block__cards__item">
                            <div class="short_details_order df_jcspb_aic">
                                <div class="name_order"><span class="non_view__text_mobile">Номер рейса: </span> U234FD</div>
                                <!-- /.name_order -->
                                
                                <div class="short_flight_scheme df_jcspb_aic">
                                    <span class="non_view__text_mobile">План полета: </span>
                                    <div class="short_flight_scheme__block">
                                        <div class="short_flight_scheme__city_from">
                                            <p>Екатеринбург</p>
                                            <div class="details_city df_jcspb_aic">
                                                <p class="aiport_name">(SVX)</p>
                                                <!-- /.aiport_name -->
                                                <div class="time_flight">18:40</div>
                                                <!-- /.time_flight -->
                                                <div class="date_flight">21/10/2021</div>
                                                <!-- /.date_flight -->
                                            </div>
                                            <!-- /.details_city -->
                                        </div>
                                        <!-- /.short_flight_scheme__city_from -->
                                        <div class="sing_flight">
                                            <i class="fas fa-arrow-right"></i>
                                        </div>
                                        <!-- /.sing_flight -->
                                        <div class="short_flight_scheme__city_to">
                                            <p>Москва</p>
                                            <div class="details_city df_jcspb_aic">
                                                <p class="aiport_name">(DME)</p>
                                                <!-- /.aiport_name -->
                                                <div class="time_flight">19:15</div>
                                                <!-- /.time_flight -->
                                                <div class="date_flight">21/10/2021</div>
                                                <!-- /.date_flight -->
                                            </div>
                                            <!-- /.details_city -->
                                        </div>
                                        <!-- /.short_flight_scheme__city_to -->
                                    </div>
                                    <!-- /.short_flight_scheme__block -->
                                    
                                </div>
                                <!-- /.short_flight_scheme -->
                                <div class="status_order df_jcspb_aic">
                                    <div class="status_order__name">
                                        <span class="non_view__text_mobile">Статус рейса: </span> Прошедший
                                    </div>
                                    <!-- /.status_order__name -->
                                    {{-- <button class="btn_cancel_order btn_style_red" aria-label="btn_cancel_order" id="btn_cancel_order">
                                        Отмена
                                    </button> --}}
                                </div>
                                
                                <!-- /.cancel_order -->
                                <!-- /.status_order -->
                                <div class="price_order"><span class="non_view__text_mobile">Цена: </span> 6200 <i class="fas fa-ruble-sign" aria-hidden="true"></i></div>
                                <!-- /.price_order -->
                            </div>
                            <!-- /.short_details_order -->
                            <div class="full_fetails_order">
                                <div class="my_travel_block__cards__item__where_from_fly">
                                    
                                    {{-- <p class="city_name">Екатеринбург</p>
                                    <!-- /.city_name -->
                                    <p class="departure_date">21/10/2021</p>
                                    <!-- /.departure_date -->
                                    <p class="departure_time">9:30</p>
                                    <!-- /.departure_time --> --}}
                                </div>
                                <!-- /.my_travel_block__cards__item__where_from_fly -->
                                <div class="my_travel_block__cards__item__flight_scheme">
    
                                </div>
                                <!-- /.my_travel_block__cards__item__flight_scheme -->
                                <div class="my_travel_block__cards__item__where_to_fly">
    
                                </div>
                                <!-- /.my_travel_block__cards__item__where_to_fly -->
                            </div>
                            <!-- /.full_fetails_order -->
                            
                        </div>
                        <!-- /.my_travel_block__cards__item -->
                        <button class="btn_style_1 more_travel_block__card" id="more_travel_block__card" aria-label="more_travel_block__card" data-last-id-order="2">Показать еще</button> 
                        <!-- /.btn_style_1 more_travel_block__card -->
                    </div>
                    <!-- /.my_travel_block__cards -->
                    
                </div>
                <!-- /.my_travel_block -->
                <div class="update_password_block profile_data_cards_non_view">
                    <h2>Здесь вы можете запросить смену нового пароля</h2>
                    <form action="" class="update_password_block__update_form">
                        {{-- <div class="update_password_block__update_form__input_block">
                            <label for="old_password_user">Старый пароль</label>
                            <input type="password" id="old_password_user" class="input_style_pofile update_password_block__update_form__input_block__input" placeholder="Старый пароль">
                            <button type="button" class="btn_show" id="btn_show_old_password" aria-label="btn_show_old_password">
                                <i class="far fa-eye-slash"></i>
                            </button> 
                            <!-- /.show_old_password -->
                            <button type="button" class="btn_hide non_view" id="btn_hide_old_password" aria-label="btn_hide_old_password">
                                <i class="far fa-eye"></i>
                            </button> 
                            <!-- /.hide_old_password -->
                        </div>
                        <!-- /.update_password_block__update_form__input_block -->
                        <div class="update_password_block__update_form__input_block">
                            <label for="new_password_user">Новый пароль</label>
                            <input type="password" id="new_password_user" class="input_style_pofile update_password_block__update_form__input_block__input" placeholder="Введите новый пароль">
                            <button type="button" class="btn_show" id="btn_show_new_password" aria-label="btn_show_new_password">
                                <i class="far fa-eye-slash"></i>
                            </button> 
                            <!-- /.show_new_password -->
                            <button type="button" class="btn_hide non_view" id="btn_hide_new_password" aria-label="btn_hide_new_password">
                                <i class="far fa-eye"></i>
                            </button> 
                            <!-- /.hide_new_password -->
                        </div>
                        <!-- /.update_password_block__update_form__input_block -->
                        <div class="update_password_block__update_form__input_block">
                            <label for="confirm_new_password_user">Подтвердите новый пароль</label>
                            <input type="password" id="confirm_new_password_user" class="input_style_pofile update_password_block__update_form__input_block__input" placeholder="Подтвердите новый пароль">
                            <button type="button" class="btn_show" id="btn_show_confirm_new_password" aria-label="btn_show_confirm_new_password">
                                <i class="far fa-eye-slash"></i>
                            </button> 
                            <!-- /.show_confirm_new_password -->
                            <button type="button" class="btn_hide non_view" id="btn_hide_confirm_new_password" aria-label="btn_hide_confirm_new_password">
                                <i class="far fa-eye"></i>
                            </button> 
                            <!-- /.hide_confirm_new_password -->
                        </div>
                        <!-- /.update_password_block__update_form__input_block --> --}}
                        <button class="btn_style_1 update_password_block__btn_update" id="update_password_block__btn_update" aria-label="update_password_block__btn_update">Запросить новый пароль</button> 
                        <!-- /.btn_style_1 update_password_block__btn_update -->
                    </form>
                    <!-- /.update_password_block__update_form -->
                </div>
                <!-- /.update_password_block profile_data_cards_non_view -->
            </div>
            <!-- /.profile_data_cards -->
            
        </div>
        <!-- /.my_profile_block -->
    </div>
    <!-- /.container -->
@endsection

@section('slider_script')
    <script src="/assets/js/update_data_user.js"></script>
@endsection
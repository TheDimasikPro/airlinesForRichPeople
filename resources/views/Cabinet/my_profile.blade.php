@extends('layouts.app_layout')
@section('title_page','Личный кабинет')
@section('styles_link')
    {{-- <link rel="stylesheet" href="/assets/css/style.min.css"> --}}
    <link rel="stylesheet" href="/assets/css/my_pofile.css">
@endsection
@section('content')
    <div class="container desktop_section">
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
                        Из панели управления вы можете, просмотреть свои личные данные и историю поездок за последний год, если вам нужна полная история, то на странице "Мои поездки" нажмите на кнопку "Полная история поездок" в меню.
                    </p>
                </div>
                <!-- /.control_panel_block -->
                <div class="personal_data_block profile_data_cards_non_view">
                    <h2>Здесь вы можете просмотреть и изменить данные аккаунта</h2>
                    <form action="#" class="personal_data_block__update_form">
                        <div class="personal_data_block__update_form__input_block">
                            <label for="full_name_user">Полное имя</label>
                            <input type="text" id="full_name_user" name="full_name" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Введите свое полное имя" value="{{ $auth_user["full_name"] }}">
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="email_user">Почта</label>
                            <input type="email" id="email_user" name="email" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Введите свою почту" value="{{ $auth_user["email"] }}">
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="phone_user">Телефон</label>
                            <input type="tel" id="phone_user" name="phone" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Введите свой телефон" value="{{ $auth_user["phone"] }}">
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="date_birthday_user">Дата рождения</label>
                            <input type="date" id="date_birthday_user" name="date_birthday" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Выберите свою дату рождения" value="{{ $auth_user["date_of_birthday"] }}">
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="gender_user">
                                Пол
                                <input type="text" readonly id="gender_user" name="gender_name" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Выберите свой пол" value="{{ $auth_user["user_gender_code_name"] }}">
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
                            <input type="text" id="city_user" name="city" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Введите название своего города" value="{{ $auth_user["city_of_residence"] }}">
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="type_document_user">
                                Тип документа
                                <input type="text" readonly id="type_document_user" name="type_document" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Выберите тип документа" value="{{ $auth_user["user_document_type"] }}">
                                <button class="personal_data_block__update_form__dropbtn" type="button" id="dropbtn_type_document_user" aria-label="dropbtn_type_document_user">
                                    <i class="fas fa-arrow-down"></i>
                                </button>
                            </label>
                            <ul class="personal_data_block__update_form__type_document_list">
                                @foreach ($auth_user["document_types_all"] as $document_type)
                                @if ($auth_user["id_document_type"] == $document_type->id)
                                    <li class="personal_data_block__update_form__type_document_list__item select_list__item" data-mask-input="{{ $document_type->mask_input }}" value="{{ $document_type->id }}">{{ $document_type->name_document }}</li> 
                                @else
                                    <li class="personal_data_block__update_form__type_document_list__item" data-mask-input="{{ $document_type->mask_input }}" value="{{ $document_type->id }}">{{ $document_type->name_document }}</li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="series_numbers_document_user">Серия и номер документа</label>
                            <input type="text" id="series_numbers_document_user" name="series_numbers_document" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Введите серию и номер документа" value="{{ $auth_user["series_and_document_number"] }}">
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="personal_data_block__update_form__input_block">
                            <label for="country_of_issue_user">
                                Страна выдачи документа
                                <input type="text" id="country_of_issue_user" name="country_of_issue" class="input_style_pofile personal_data_block__update_form__input_block__input" placeholder="Выберите страну выдачи документа" value="{{ $auth_user["user_country_of_issue"] }}">
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
                        <div class="personal_data_block__update_form__input_block">
                            <button class="btn_style_1" type="button" id="btn_submit_update_personal_data" aria-label="btn_submit_update_personal_data">Обновить</button>
                        </div>
                        <!-- /.personal_data_block__update_form__input_block -->
                        <div class="error_message_check_personal_data"></div>
                        <!-- /.error_message_check_personal_data -->
                    </form>
                    <!-- /.personal_data_block__update_form -->
                </div>
                <!-- /.personal_data_block -->
                <div class="my_travel_block profile_data_cards_non_view">
                    <div class="my_travel_block_title_block df_jcspb_aic">
                        <h2>Мои поездки за последний год</h2>
                        <button class="btn_style_1" id="full_travel_list">Полная история поездок</button> <!-- /#full_travel_list.btn_style_1 -->
                    </div>
                    <!-- /.my_travel_block_title_block -->
                    
                    <p class="warning_text">
                        * На данной странице выводятся все поездки, который были совершены вами за последний год. <br>
                        * Если вы поменяли серию и номер своего документа, то здесь будут отображаться поездку только по новым данным.
                    </p>
                    <ul class="my_travel_block_title_list df_jcspb_aic">
                        <li class="my_travel_block_title_list__item">Номер рейса</li>
                        <!-- /.my_travel_block_title_list__item -->
                        <li class="my_travel_block_title_list__item">План полета</li>
                        <!-- /.my_travel_block_title_list__item -->
                        <li class="my_travel_block_title_list__item">Статус рейса</li>
                        <!-- /.my_travel_block_title_list__item -->
                        <li class="my_travel_block_title_list__item">Цена</li>
                        <!-- /.my_travel_block_title_list__item -->
                    </ul>
                    <!-- /.my_travel_block_title_list -->
                    <div class="my_travel_block__cards">
                        @foreach ($auth_user["flight_arr"] as $key => $auth_user__flight_arr)
                            {{-- {{ 'flight_from_' . $key }} --}}
                            <div class="my_travel_block__cards__item">
                                <div class="short_details_order df_jcspb_aic">
                                    <div class="name_order"><span class="non_view__text_mobile">Номер рейса: </span>{{ htmlspecialchars($auth_user__flight_arr['flight_from']["flight_code"]) }}</div>
                                    <!-- /.name_order -->
                                    <div class="short_flight_scheme df_jcspb_aic">
                                        <span class="non_view__text_mobile">План полета: </span>
                                        <div class="short_flight_scheme__block">
                                            <div class="short_flight_scheme__city_from">
                                                @if (empty($auth_user__flight_arr['airport_flight_from_start']["city_rus"]))
                                                    <p>{{ htmlspecialchars($auth_user__flight_arr['airport_flight_from_start']["city_eng"]) }}</p>
                                                @else
                                                    <p>{{ htmlspecialchars($auth_user__flight_arr['airport_flight_from_start']["city_rus"]) }}</p>
                                                @endif
                                                <div class="details_city df_jcspb_aic">
                                                    <p class="aiport_name">({{ htmlspecialchars($auth_user__flight_arr['airport_flight_from_start']["iata_code"]) }})</p>
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
                                                @if (empty($auth_user__flight_arr['airport_flight_from_end']["city_rus"]))
                                                    <p>{{ htmlspecialchars($auth_user__flight_arr['airport_flight_from_end']["city_eng"]) }}</p>
                                                @else
                                                    <p>{{ htmlspecialchars($auth_user__flight_arr['airport_flight_from_end']["city_rus"]) }}</p>
                                                @endif
                                                <div class="details_city df_jcspb_aic">
                                                    <p class="aiport_name">({{ htmlspecialchars($auth_user__flight_arr['airport_flight_from_end']["iata_code"]) }})</p>
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
                        @endforeach
                        
                        <button class="btn_style_1 more_travel_block__card" id="more_travel_block__card" aria-label="more_travel_block__card" data-last-id-order="2">Показать еще</button> 
                        <!-- /.btn_style_1 more_travel_block__card -->
                    </div>
                    <!-- /.my_travel_block__cards -->
                    
                </div>
                <!-- /.my_travel_block -->
                <div class="update_password_block profile_data_cards_non_view">
                    <h2>Здесь вы можете запросить смену нового пароля</h2>
                    <form action="{{ route('forgot_password__page') }}" class="update_password_block__update_form">
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
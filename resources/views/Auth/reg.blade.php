@extends('layouts.layout_with_footer_bottom')
@section('title_page','Регистрация')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/auth.min.css">
@endsection
@section('content')
    <div class="container df_jcc_aic desktop_section content_flex">
        <div class="form form_auth" id="main_form_auth">
            <h2>Регистрация</h2>
            <p class="warning_text">
                * При регистрации все поля должны быть заполнены <br>
                * В случае неверно набранной инфомрации, регистрацию нужно начать сначала
            </p>
            <!-- /.warning_text -->
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
                    <form action="#" class="form_auth_contact_data" autocomplete="new">
                        <div class="overlay_contact_form">
                            <div id="fountainG">
                                <div id="fountainG_1" class="fountainG"></div>
                                <div id="fountainG_2" class="fountainG"></div>
                                <div id="fountainG_3" class="fountainG"></div>
                                <div id="fountainG_4" class="fountainG"></div>
                                <div id="fountainG_5" class="fountainG"></div>
                                <div id="fountainG_6" class="fountainG"></div>
                                <div id="fountainG_7" class="fountainG"></div>
                                <div id="fountainG_8" class="fountainG"></div>
                            </div>

                            <div class="check_mark_contact_from">
                                <img src="/assets/images/icons/icons8-check-mark-48.png" alt="check-mark">
                            </div>
                            <!-- /.check_mark_contact_from -->
                        </div>
                        @csrf
                        <div class="form_auth_block_second">
                            <label for="email">E-mail</label>
                            <input type="email" required title="" autocomplete="off" class="super_big_input form_auth_input" id="email" name="email" placeholder="Введите свою почту">
                            <div class="form_auth__slider_input"></div>
                            <!-- /.form_auth__slider_input -->
                        </div>
                        <!-- /.form_auth_block_second -->
                        <div class="form_auth__row df_jcspb_aic">
                            <div class="form_auth_block_second">
                                <label for="prefix_phone">Prefix phone</label>
                                <input type="tel" required title="" autocomplete="new" class="min_input form_auth_input" readonly id="prefix_phone" name="phone" value="+7">
                                <button class="dropbtn" type="button" id="dropbtn_prefix_phone" aria-label="dropbtn_prefix_phone">
                                    <i class="fas fa-arrow-down" id=""></i>
                                </button>
                                
                                <div class="form_auth__slider_input"></div>
                                <!-- /.form_auth__slider_input -->
                                <ul class="prefix_phone_list">
                                    @foreach ($reg_info["international_country_codes"] as $key => $country_codes__item)
                                        @if ($country_codes__item->country_code == "7")
                                            <li class="prefix_phone_list__item select_list__item" data-value="+{{ $country_codes__item->country_code }}" data-count-number-phone-not-prefix="{{ $country_codes__item->phone_number_length - iconv_strlen($country_codes__item->country_code) }}">+{{ $country_codes__item->country_code }}</li>
                                        @else
                                            <li class="prefix_phone_list__item" data-value="+{{ $country_codes__item->country_code }}" data-count-number-phone-not-prefix="{{ $country_codes__item->phone_number_length - iconv_strlen($country_codes__item->country_code) }}">+{{ $country_codes__item->country_code }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <!-- /.form_auth_block_second -->
                            <div class="form_auth_block_second">
                                <label for="phone">Phone</label>
                                <input type="tel" autocomplete="new" class="big_input form_auth_input" id="phone" name="phone" placeholder="Введите номер своего телефона">
                                <div class="form_auth__slider_input"></div>
                                <!-- /.form_auth__slider_input -->
                            </div>
                            <!-- /.form_auth_block_second -->
                        </div>
                        <!-- /.form_auth__row -->
                        
                        <div class="form_auth_block_second">
                            <button class="btn btn_style_1 upper" type="button" id="complete_contact_data" aria-label="complete_contact_data">Продолжить</button> 
                            <!-- /.btn btn_style_1 upper-->
                        </div>


                        <div class="error_contact_data">
                            <ul class="error_list">
                                <li class="error_list__item"></li>
                                <!-- /.error_list__item -->
                            </ul>
                            <!-- /.error_list -->
                        </div>
                        <!-- /.error_contact_data -->
                    </form>
                    <!-- /.form_auth_contact_data -->
                    <form action="#" class="form_auth_profile_data form_auth_non_view" autocomplete="off">
                        @csrf
                        <div class="overlay_profile_data_form">
                            <div id="fountainG">
                                <div id="fountainG_1" class="fountainG"></div>
                                <div id="fountainG_2" class="fountainG"></div>
                                <div id="fountainG_3" class="fountainG"></div>
                                <div id="fountainG_4" class="fountainG"></div>
                                <div id="fountainG_5" class="fountainG"></div>
                                <div id="fountainG_6" class="fountainG"></div>
                                <div id="fountainG_7" class="fountainG"></div>
                                <div id="fountainG_8" class="fountainG"></div>
                            </div>
                            <div class="check_mark_contact_from">
                                <img src="/assets/images/icons/icons8-check-mark-48.png" alt="check-mark">
                            </div>
                            <!-- /.check_mark_contact_from -->
                        </div>
                        <div class="form_auth_block_second">
                            <label for="full_name">Full name</label>
                            <input type="text" required title="Full_name" autocomplete="new" class="super_big_input form_auth_input" id="full_name" name="full_name" placeholder="Введите полное имя">
                            <div class="form_auth__slider_input"></div>
                            <!-- /.form_auth__slider_input -->
                        </div>
                        <!-- /.form_auth_block_second -->
                        <div class="form_auth__row df_jcspb_aic">
                            <div class="form_auth_block_second">
                                <label for="date_birthday">Date birthday</label>
                                <input type="date" required title="Date_birthday" autocomplete="new" class="sm_input_2 form_auth_input" id="date_birthday" name="date_birthday" placeholder="Дата рождения">
                                <div class="form_auth__slider_input"></div>
                            </div>
                            <!-- /.form_auth_block -->
                            <div class="form_auth_block_second">
                                <label for="gender_code">Gender</label>
                                <input type="text" required title="Gender" autocomplete="new" class="sm_input_2 form_auth_input" readonly id="gender_code" name="gender_code" placeholder="Пол">
                                <button class="dropbtn" type="button" id="dropbtn_gender_code" aria-label="dropbtn_gender_code">
                                    <i class="fas fa-arrow-down" id=""></i>
                                </button>
                                
                                <div class="form_auth__slider_input"></div>
                                <!-- /.form_auth__slider_input -->
                                <ul class="gender_code_list">
                                    @foreach ($reg_info["gender_codes_all"] as $gender_code)
                                        <li class="gender_code_list__item" value-view="{{ $gender_code->gender_name_rus }}" value="{{ $gender_code->id }}">{{ $gender_code->gender_name_rus }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="form_auth_block_second">
                            <label for="city_name">City</label>
                            <input type="text" required title="City" autocomplete="new" class="super_big_input form_auth_input" id="city_name" name="city_name" placeholder="Введите название своего города">
                            <div class="form_auth__slider_input"></div>
                            <!-- /.form_auth__slider_input -->
                        </div>
                        <div class="form_auth__row df_jcspb_aic">
                            <div class="form_auth_block_second">
                                <label for="type_document">Type document</label>
                                <input type="text" required title="Type_document" autocomplete="new" class="sm_input_2 form_auth_input" readonly id="type_document" name="type_document" placeholder="Тип документа">
                                <button class="dropbtn" type="button" id="dropbtn_type_document" aria-label="dropbtn_type_document">
                                    <i class="fas fa-arrow-down" id=""></i>
                                </button>
                                
                                <div class="form_auth__slider_input"></div>
                                <!-- /.form_auth__slider_input -->
                                <ul class="type_document_list">
                                    @foreach ($reg_info["document_types_all"] as $document_types)
                                        <li class="type_document_list__item" data-mask-input="{{ $document_types->mask_input }}"  value-view="{{ $document_types->name_document }}" value="{{ $document_types->id }}">{{ $document_types->name_document }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="form_auth_block_second">
                                <label for="series_document_number">Series and document number</label>
                                <input type="text" required title="Series_and_document_number" autocomplete="new" class="sm_input_2 form_auth_input" id="series_document_number" name="series_document_number" placeholder="Серия и номер документа">
                                <div class="form_auth__slider_input"></div>
                                <!-- /.form_auth__slider_input -->
                            </div>
                            <!-- /.form_auth_block_second -->
                        </div>
                        <div class="form_auth__row">
                            <div class="form_auth_block_second">
                                <label for="input_country_of_issue">Country of issue</label>
                                <input type="text" required title="Country_of_issue" autocomplete="new" class="super_big_input form_auth_input" id="input_country_of_issue" name="country_of_issue" placeholder="Страна выдачи">
                                <button class="dropbtn" type="button" id="dropbtn_country_of_issue" aria-label="dropbtn_country_of_issue">
                                    <i class="fas fa-arrow-down" id=""></i>
                                </button>
                                
                                <div class="form_auth__slider_input"></div>
                                <!-- /.form_auth__slider_input -->
                                <ul class="country_of_issue_list">
                                    @foreach ($reg_info["countries_all"] as $countries)
                                        <li class="country_of_issue_list__item" value-view="Male" value="{{ $countries->id }}">{{ $countries->name_country }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="form_auth_block_second">
                            <button class="btn btn_style_1 upper" type="button" id="complete_profile_data" aria-label="complete_profile_data">Продолжить</button> 
                            <!-- /.btn btn_style_1 upper-->
                        </div>
                        <!-- /.form_auth_block_second -->
                        <div class="error_profile_data">
                            <ul class="error_list">
                                {{-- <li class="error_list__item"></li>
                                <!-- /.error_list__item --> --}}
                            </ul>
                            <!-- /.error_list -->
                        </div>
                        <!-- /.error_profile_data -->
                    </form>
                    <!-- /.form_auth_profile_data -->
                    <form action="#" class="form_auth_password_data form_auth_non_view">
                        @csrf
                        <div class="overlay_password_data_form">
                            <div id="fountainG">
                                <div id="fountainG_1" class="fountainG"></div>
                                <div id="fountainG_2" class="fountainG"></div>
                                <div id="fountainG_3" class="fountainG"></div>
                                <div id="fountainG_4" class="fountainG"></div>
                                <div id="fountainG_5" class="fountainG"></div>
                                <div id="fountainG_6" class="fountainG"></div>
                                <div id="fountainG_7" class="fountainG"></div>
                                <div id="fountainG_8" class="fountainG"></div>
                            </div>
                            <div class="check_mark_contact_from">
                                <img src="/assets/images/icons/icons8-check-mark-48.png" alt="check-mark">
                            </div>
                            <!-- /.check_mark_contact_from -->
                        </div>
                        <div class="form_auth_block_second">
                            <label for="password">Password</label>
                            <input type="password" required title="" autocomplete="new" class="super_big_input form_auth_input" id="input_password" name="password" placeholder="Введите свой пароль">
                            <button class="dropbtn" type="button" id="show_passwod" aria-label="btn_show_passwod">
                                <i class="far fa-eye-slash"></i>
                            </button>
                            <button class="dropbtn non_view" type="button" id="hide_password" aria-label="btn_hide_password">
                                <i class="far fa-eye"></i>
                            </button>
                            <div class="form_auth__slider_input"></div>
                            <!-- /.form_auth__slider_input -->
                        </div>
                        <div class="form_auth_block_second">
                            <button class="btn btn_style_1 upper" type="button" id="complete_password_data" aria-label="complete_password_data">Продолжить</button> 
                            <!-- /.btn btn_style_1 upper-->
                        </div>
                        <div class="error_password_data">
                            <ul class="error_list">
                                <li class="error_list__item"></li>
                                <!-- /.error_list__item -->
                            </ul>
                            <!-- /.error_list -->
                        </div>
                        <!-- /.error_password_data -->
                    </form>
                    <!-- /.form_auth_password_data form_auth_non_view -->
                    <form action="#" class="form_auth_finish_data form_auth_non_view">
                        @csrf
                        <div class="overlay_finish_form">
                            <div id="fountainG">
                                <div id="fountainG_1" class="fountainG"></div>
                                <div id="fountainG_2" class="fountainG"></div>
                                <div id="fountainG_3" class="fountainG"></div>
                                <div id="fountainG_4" class="fountainG"></div>
                                <div id="fountainG_5" class="fountainG"></div>
                                <div id="fountainG_6" class="fountainG"></div>
                                <div id="fountainG_7" class="fountainG"></div>
                                <div id="fountainG_8" class="fountainG"></div>
                            </div>
                            <div class="check_mark_contact_from">
                                <img src="/assets/images/icons/icons8-check-mark-48.png" alt="check-mark">
                            </div>
                            <!-- /.check_mark_contact_from -->
                            {{-- <svg id="checkmark__finish_data" class="checkmark non_view" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                <circle id="checkmark__circle__finish_data" class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                                <path id="checkmark__check__finish_data" class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                            </svg> --}}
                        </div>
                        <div class="form_auth_block_second" id="block_non_top">
                            <div class="title_text_finish">
                                <h3>Проверьте свои данные</h3>
                                <span>Если все данные верны, то нажмите кнопку "Зарегистрироваться", иначе нажмите на кнопку <br> "Начать сначала"</span>
                            </div>
                            <!-- /.title_text_finish -->
                        <div class="all_info_user_registered">
                            <ul class="user_info_list">
                                <li class="user_info_list__item">
                                    <p class="title_item">Полное имя:</p>
                                    <!-- /.title_item -->
                                    <span class="title_text_item" id="title_text_item__full_name"></span>
                                    <!-- /.title_text_item -->
                                </li>
                                <!-- /.user_info_list__item -->
                                <li class="user_info_list__item">
                                    <p class="title_item">Почта:</p>
                                    <!-- /.title_item -->
                                    <span class="title_text_item" id="title_text_item__email"></span>
                                    <!-- /.title_text_item -->
                                </li>
                                <!-- /.user_info_list__item -->
                                <li class="user_info_list__item">
                                    <p class="title_item">Телефон:</p>
                                    <!-- /.title_item -->
                                    <span class="title_text_item" id="title_text_item__phone"></span>
                                    <!-- /.title_text_item -->
                                </li>
                                <li class="user_info_list__item">
                                    <p class="title_item">Город проживания:</p>
                                    <!-- /.title_item -->
                                    <span class="title_text_item" id="title_text_item__city"></span>
                                    <!-- /.title_text_item -->
                                </li>
                                <!-- /.user_info_list__item -->
                                <li class="user_info_list__item">
                                    <p class="title_item">Страна выдачи документа:</p>
                                    <!-- /.title_item -->
                                    <span class="title_text_item" id="title_text_item__city_of_issue"></span>
                                    <!-- /.title_text_item -->
                                </li>
                                <!-- /.user_info_list__item -->
                                <li class="user_info_list__item">
                                    <p class="title_item">Пароль:</p>
                                    <!-- /.title_item -->
                                    <span class="title_text_item" id="title_text_item__password"></span>
                                    <!-- /.title_text_item -->
                                </li>
                                <!-- /.user_info_list__item -->
                            </ul>
                            <!-- /.user_info_list -->
                            <ul class="user_info_list df_jcspb_aic">
                                <div class="user_info_list__item_row">
                                    <li class="user_info_list__item">
                                        <p class="title_item">Дата рождения:</p>
                                        <!-- /.title_item -->
                                        <span class="title_text_item" id="title_text_item__date_birthday"></span>
                                        <!-- /.title_text_item -->
                                    </li>
                                    <!-- /.user_info_list__item -->
                                    <li class="user_info_list__item">
                                        <p class="title_item">Пол:</p>
                                        <!-- /.title_item -->
                                        <span class="title_text_item" id="title_text_item__gender_code"></span>
                                        <!-- /.title_text_item -->
                                    </li>
                                    <!-- /.user_info_list__item -->
                                </div>
                                <!-- /.user_info_list__item_row -->
                                <div class="user_info_list__item_row">
                                    <li class="user_info_list__item">
                                        <p class="title_item">Тип документа:</p>
                                        <!-- /.title_item -->
                                        <span class="title_text_item" id="title_text_item__type_document"></span>
                                        <!-- /.title_text_item -->
                                    </li>
                                    <!-- /.user_info_list__item -->
                                    <li class="user_info_list__item">
                                        <p class="title_item">Серия и номер документа:</p>
                                        <!-- /.title_item -->
                                        <span class="title_text_item" id="title_text_item__series_and_number_document"></span>
                                        <!-- /.title_text_item -->
                                    </li>
                                    <!-- /.user_info_list__item -->
                                </div>
                                <!-- /.user_info_list__item_row -->
                            </ul>
                            <!-- /.user_info_list -->
                        </div>
                        <!-- /.all_info_user_registered -->
                        </div>
                        <div class="form_auth_block_second">
                            <button class="btn btn_style_1 upper" type="button" id="btn_registered" aria-label="btn_registered">Зарегистрироваться</button> 
                            <!-- /.btn btn_style_1 upper-->
                        </div>
                        <div class="form_auth_block_second">
                            <button class="btn btn_style_1 upper" type="button" id="btn_restart_registered" aria-label="btn_restart_registered">Начать сначала</button> 
                            <!-- /.btn btn_style_1 upper-->
                        </div>

                        <div class="error_finish_data">
                            <ul class="error_list">
                                <li class="error_list__item"></li>
                                <!-- /.error_list__item -->
                            </ul>
                            <!-- /.error_list -->
                        </div>
                        <!-- /.error_finish_data -->
                    </form>
                    <!-- /.form_auth_finish_data form_auth_non_view -->
                </div>
                <!-- /.form_auth__row -->
            </div>
            <!-- /.form_auth_block -->
            <div class="form_auth_block df_jcspb_aic" id="auth_block_btn">
                <a href="{{ route('my_profile__page') }}" class="link_auth link_login_page">Авторизоваться</a>
            </div>
            <!-- /.form_auth_block -->
        </div>
        <!-- /.form form_auth -->
    </div>
    <!-- /.container -->
@endsection
@section('slider_script')
    <script src="/assets/js/auth.js"></script>
@endsection

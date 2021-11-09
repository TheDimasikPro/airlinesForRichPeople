@extends('layouts.app_layout')
@section('title_page','Информация о пассажирах')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/style.min.css">
    <link rel="stylesheet" href="/assets/css/chief-slider.min.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
@endsection
@section('content')
<div class="my_order__block_mobile desktop_section" id="passenger_order_info">
    <div class="container">
        <button class="btn_open__popup" id="btn_open__popup" aria-label="btn_open__popup">
            Просмотреть заказ можно здесь <i class="fas fa-arrow-right"></i> <i class="fas fa-shopping-basket"></i>
        </button> 
        <!-- /.btn_open__popup -->
    </div>
    <!-- /.container -->
    
  </div>
    <div class="container">
        <div class="popup_fade non_view desktop_section"></div>
        <div class="popup_modal non_view desktop_section">
        <div class="popup">
            <button class="btn_popup_close" id="btn_popup_close" aria-label="btn_popup_close">Закрыть</button>
            <div class="popup_order_block">
            <h2>Ваш заказ</h2>
            {{ $airport_from }}
            <div class="popup_order_block__info">
                
                <div class="popup_order_block__info__from">
                <h3>Вылет туда:</h3>
                <div class="popup_order_block__info__from__city df_jcspb_aic">
                    <div class="popup_order_block__info__city__from">
                    Екатеринбург <span class="airport_name__from">(SVX)</span> 
                    <!-- /.airport_name__from -->
                    </div>
                    <i class="fas fa-arrow-right"></i>
                    <!-- /.popup_order_block__info__city__from -->
                    <div class="popup_order_block__info__city__to">
                    Москва <span class="airport_name__to">(DME)</span> 
                    <!-- /.airport_name__to -->
                    </div>
                    <!-- /.popup_order_block__info__city__to -->
                </div>
                <!-- /.popup_order_block__info__from__city -->
                <div class="popup_order_block__info__from__date_time df_jcspb_aic">
                    <span class="details_time_from">30 октября пт 06:30</span> 
                    <!-- /.details_time_from -->
                    <span class="details_time_to">30 октября пт 07:30</span> 
                    <!-- /.details_time_to -->
                </div>
                <!-- /.popup_order_block__info__from__date_time -->
                <div class="popup_order_block__info__from__details_air">
                    <div class="popup_order_block__info__from__details_air__number_flight">U6-264</div>
                    <!-- /.popup_order_block__info__from__details_air__number_flight -->
                    <div class="popup_order_block__info__from__details_air__name_modal_air">Airbus A320</div>
                    <!-- /.popup_order_block__info__from__details_air__name_modal_air -->
                </div>
                <!-- /.popup_order_block__info__from__details_air -->
                </div>
                <!-- /.popup_order_block__info__from -->
                <div class="popup_order_block__info__from">
                <h3>Вылет обратно:</h3>
                <div class="popup_order_block__info__from__city df_jcspb_aic">
                    <div class="popup_order_block__info__city__from">
                    Екатеринбург <span class="airport_name__from">(SVX)</span> 
                    <!-- /.airport_name__from -->
                    </div>
                    <i class="fas fa-arrow-right"></i>
                    <!-- /.popup_order_block__info__city__from -->
                    <div class="popup_order_block__info__city__to">
                    Москва <span class="airport_name__to">(DME)</span> 
                    <!-- /.airport_name__to -->
                    </div>
                    <!-- /.popup_order_block__info__city__to -->
                </div>
                <!-- /.popup_order_block__info__from__city -->
                <div class="popup_order_block__info__from__date_time df_jcspb_aic">
                    <span class="details_time_from">30 октября пт 06:30</span> 
                    <!-- /.details_time_from -->
                    <span class="details_time_to">30 октября пт 07:30</span> 
                    <!-- /.details_time_to -->
                </div>
                <!-- /.popup_order_block__info__from__date_time -->
                <div class="popup_order_block__info__from__details_air">
                    <div class="popup_order_block__info__from__details_air__number_flight">U6-264</div>
                    <!-- /.popup_order_block__info__from__details_air__number_flight -->
                    <div class="popup_order_block__info__from__details_air__name_modal_air">Airbus A320</div>
                    <!-- /.popup_order_block__info__from__details_air__name_modal_air -->
                </div>
                <!-- /.popup_order_block__info__from__details_air -->
                </div>
                <!-- /.popup_order_block__info__from -->
            </div>
            <!-- /.popup_order_block__info -->
            </div>
            <!-- /.popup_order_block -->
            <a href="{{ route('payment_tickets__page') }}" id="btn_continune_order" aria-label="btn_continune_order" class="continune_order btn_style_1">Продолжить</a> <!-- /.continune_order -->
        </div>		
        </div>
        
        <div class="passenger_info_block df_jcspb_aic">
            {{-- @include('inc.aside_bar_search_tickets') --}}
            <div class="passenger_info_block__forms_block">
                <h2>Информация о пассажирах</h2>
                <form action="" class="passenger_info_block__forms_block__form_feedback">
                    <h3>Контактная информация для обратной связи</h3>
                    <div class="passenger_info_block__forms_block__form_feedback__input_block">
                        <label for="email_feedback_tickets">Email</label>
                        <input type="email" autocomplete="off" class="input_style_pofile" placeholder="Ваш email" id="email_feedback_tickets" aria-label="email_feedback_tickets">
                    </div>
                    <!-- /.passenger_info_block__forms_block__form_feedback__input_block -->
                    <div class="passenger_info_block__forms_block__form_feedback__input_block">
                        <label for="checkbox_passenger_info_accept"></label>
                        <input type="checkbox" id="checkbox_passenger_info_accept" aria-label="checkbox_passenger_info_accept"> 
                        <span>Я ознакомился с <a href="#"> условиями</a> и согласен получать сообщения рекламно-информационного характера</span> 
                    </div>
                    <!-- /.passenger_info_block__forms_block__form_feedback__input_block -->
                </form>
                <!-- /.passenger_info_block__forms_block__form_feedback -->
                <div class="passenger_full_info__forms_block">
                    @for ($i = 0; $i < $old_count_people; $i++)
                        <div class="passenger_full_info__forms_block__item">
                            <p class="warning_text">
                                * Просьба вводить все данные на английском языке, иначе могут возникнуть проблемы с покупкой билетов
                            </p>
                            <h3>Врослый пассажир №{{ $i+1 }}</h3>
                            <form action="" class="passenger_full_info__forms_block__form_passenger">
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <label for="last-name-{{ $i+1 }}"></label>
                                    <input type="text" class="sm_input" id="last-name-{{ $i+1 }}" name="last-name" placeholder="Фамилия *">
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <label for="first-name-{{ $i+1 }}"></label>
                                    <input type="text" class="sm_input" id="first-name-1" name="first-name-{{ $i+1 }}" placeholder="Имя *">
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <label for="other-name-{{ $i+1 }}"></label>
                                    <input type="text" class="sm_input" id="other-name-{{ $i+1 }}" name="other-name" placeholder="Отчество, если есть в паспорте">
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <button type="button" class="btn_gender_form_passenger" data-value="male" aria-label="male_gender_form_passenger" id="male_gender_form_passenger-{{ $i+1 }}">Мужчина</button> 
                                    <!-- /.btn_gender_form_passenger -->
                                    <button type="button" class="btn_gender_form_passenger" data-value="woman" aria-label="woman_gender_form_passenger" id="woman_gender_form_passenger-{{ $i+1 }}">Женщина</button> 
                                    <!-- /.btn_gender_form_passenger -->
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <label for="date-bithday-{{ $i+1 }}"></label>
                                    <input type="date" class="sm_input date_bithday_input_form_passenger" id="date-bithday-{{ $i+1 }}" name="date-bithday" placeholder="Дата рождения *">
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <label for="citizenship-{{ $i+1 }}"></label>
                                    <input type="text" class="sm_input citizenship_input_form_passenger" id="citizenship-{{ $i+1 }}" name="citizenship" placeholder="Гражданство *">
                                    {{-- список стран --}}
                                    <button class="passenger_citizenship__dropbtn" type="button" id="drop_old_citizenship__{{ $i+1 }}" aria-label="dropbtn_citizenship__{{ $i+1 }}">
                                        <i class="fas fa-arrow-down"></i>
                                    </button>
                                    <ul class="passenger__citizenship_list" id="drop_old_citizenship__{{ $i+1 }}">
                                        @foreach ($countries_all as $countries)
                                            <li class="passenger__citizenship_list__item" value="{{ $countries->id }}">{{ $countries->name_country }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <label for="type-document-{{ $i+1 }}"></label>
                                    <input type="text" class="sm_input passenger_full_info__type_document_input" readonly id="type-document-{{ $i+1 }}" name="type-document" placeholder="Тип документа *">
                                    {{-- список документов --}}
                                    <button class="passenger_type_document__dropbtn" type="button" id="drop_old_type_document__{{ $i+1 }}" aria-label="dropbtn_type_document__{{ $i+1 }}">
                                        <i class="fas fa-arrow-down"></i>
                                    </button>
                                    <ul class="passenger__type_document_list" id="drop_old_type_document__{{ $i+1 }}">
                                        @foreach ($document_types_all as $document_type)
                                            <li class="passenger__type_document_list__item" value="{{ $document_type->id }}">{{ $document_type->name_document }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <label for="series-numbers-document-{{ $i+1 }}"></label>
                                    <input type="text" class="sm_input" id="series-numbers-document-{{ $i+1 }}" name="series-numbers-document" placeholder="Серия и номер документа *">
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                            </form>
                            <!-- /.passenger_full_info__forms_block__form_passenger -->
                        </div>
                        <!-- /.passenger_full_info__forms_block__item -->
                    @endfor
                    @for ($i = 0; $i < $kids_count_people; $i++)
                        <div class="passenger_full_info__forms_block__item">
                            <p class="warning_text">
                                * Просьба вводить все данные на английском языке, иначе могут возникнуть проблемы с покупкой билетов
                            </p>
                            <h3>Ребенок №{{ $i+1 }}</h3>
                            <form action="" class="passenger_full_info__forms_block__form_passenger">
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <label for="last-name-{{ $i+1 }}"></label>
                                    <input type="text" class="sm_input" id="last-name-{{ $i+1 }}" name="last-name-{{ $i+1 }}" placeholder="Фамилия *">
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <label for="name-{{ $i+1 }}"></label>
                                    <input type="text" class="sm_input" id="name-1" name="name-{{ $i+1 }}" placeholder="Имя *">
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <label for="other-name-{{ $i+1 }}"></label>
                                    <input type="text" class="sm_input" id="other-name-{{ $i+1 }}" name="other-name-{{ $i+1 }}" placeholder="Отчество, если есть в паспорте">
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <button type="button" class="btn_gender_form_passenger" data-value="male" aria-label="male_gender_form_passenger" id="male_gender_form_passenger-{{ $i+1 }}">Мужчина</button> 
                                    <!-- /.btn_gender_form_passenger -->
                                    <button type="button" class="btn_gender_form_passenger" data-value="woman" aria-label="woman_gender_form_passenger" id="woman_gender_form_passenger-{{ $i+1 }}">Женщина</button> 
                                    <!-- /.btn_gender_form_passenger -->
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <label for="date-bithday-{{ $i+1 }}"></label>
                                    <input type="date" class="sm_input date_bithday_input_form_passenger" id="date-bithday-{{ $i+1 }}" name="date-bithday-{{ $i+1 }}" placeholder="Дата рождения *">
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <label for="citizenship-{{ $i+1 }}"></label>
                                    <input type="text" class="sm_input citizenship_input_form_passenger" id="citizenship-{{ $i+1 }}" name="citizenship-{{ $i+1 }}" placeholder="Гражданство *">
                                    {{-- список стран --}}
                                    <button class="passenger_citizenship__dropbtn" type="button" id="drop_kids_citizenship__{{ $i+1 }}" aria-label="dropbtn_citizenship__{{ $i+1 }}">
                                        <i class="fas fa-arrow-down"></i>
                                    </button>
                                    <ul class="passenger__citizenship_list" id="drop_kids_citizenship__{{ $i+1 }}">
                                        @foreach ($countries_all as $countries)
                                            <li class="passenger__citizenship_list__item" value="{{ $countries->id }}">{{ $countries->name_country }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <label for="type-document-{{ $i+1 }}"></label>
                                    <input type="text" class="sm_input passenger_full_info__type_document_input" readonly id="type-document-{{ $i+1 }}" name="type-document-{{ $i+1 }}" placeholder="Тип документа *">
                                    {{-- список документов --}}
                                    <button class="passenger_type_document__dropbtn" type="button" id="drop_kids_type_document__{{ $i+1 }}" aria-label="dropbtn_type_document__{{ $i+1 }}">
                                        <i class="fas fa-arrow-down"></i>
                                    </button>
                                    <ul class="passenger__type_document_list" id="drop_kids_type_document__{{ $i+1 }}">
                                        @foreach ($document_types_all as $document_type)
                                            <li class="passenger__type_document_list__item" value="{{ $document_type->id }}">{{ $document_type->name_document }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <label for="series-numbers-document-{{ $i+1 }}"></label>
                                    <input type="text" class="sm_input" id="series-numbers-document-{{ $i+1 }}" name="series-numbers-document-{{ $i+1 }}" placeholder="Серия и номер документа *">
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                            </form>
                            <!-- /.passenger_full_info__forms_block__form_passenger -->
                        </div>
                        <!-- /.passenger_full_info__forms_block__item -->
                    @endfor
                    @for ($i = 0; $i < $baby_count_people; $i++)
                        <div class="passenger_full_info__forms_block__item">
                            <p class="warning_text">
                                * Просьба вводить все данные на английском языке, иначе могут возникнуть проблемы с покупкой билетов
                            </p>
                            <h3>Младенец №{{ $i+1 }}</h3>
                            <form action="" class="passenger_full_info__forms_block__form_passenger">
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <label for="last-name-{{ $i+1 }}"></label>
                                    <input type="text" class="sm_input" id="last-name-{{ $i+1 }}" name="last-name-{{ $i+1 }}" placeholder="Фамилия *">
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <label for="name-{{ $i+1 }}"></label>
                                    <input type="text" class="sm_input" id="name-1" name="name-{{ $i+1 }}" placeholder="Имя *">
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <label for="other-name-{{ $i+1 }}"></label>
                                    <input type="text" class="sm_input" id="other-name-{{ $i+1 }}" name="other-name-{{ $i+1 }}" placeholder="Отчество, если есть в паспорте">
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <button type="button" class="btn_gender_form_passenger" data-value="male" aria-label="male_gender_form_passenger" id="male_gender_form_passenger-{{ $i+1 }}">Мужчина</button> 
                                    <!-- /.btn_gender_form_passenger -->
                                    <button type="button" class="btn_gender_form_passenger" data-value="woman" aria-label="woman_gender_form_passenger" id="woman_gender_form_passenger-{{ $i+1 }}">Женщина</button> 
                                    <!-- /.btn_gender_form_passenger -->
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <label for="date-bithday-{{ $i+1 }}"></label>
                                    <input type="date" class="sm_input date_bithday_input_form_passenger" id="date-bithday-{{ $i+1 }}" name="date-bithday-{{ $i+1 }}" placeholder="Дата рождения *">
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <label for="citizenship-{{ $i+1 }}"></label>
                                    <input type="text" class="sm_input citizenship_input_form_passenger" id="citizenship-{{ $i+1 }}" name="citizenship-{{ $i+1 }}" placeholder="Гражданство *">
                                    {{-- список стран --}}
                                    <button class="passenger_citizenship__dropbtn" type="button" id="drop_baby_citizenship__{{ $i+1 }}" aria-label="dropbtn_citizenship__{{ $i+1 }}">
                                        <i class="fas fa-arrow-down"></i>
                                    </button>
                                    <ul class="passenger__citizenship_list" id="drop_baby_citizenship__{{ $i+1 }}">
                                        @foreach ($countries_all as $countries)
                                            <li class="passenger__citizenship_list__item" value="{{ $countries->id }}">{{ $countries->name_country }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <label for="type-document-{{ $i+1 }}"></label>
                                    <input type="text" class="sm_input passenger_full_info__type_document_input" readonly id="type-document-{{ $i+1 }}" name="type-document-{{ $i+1 }}" placeholder="Тип документа *">
                                    {{-- список документов --}}
                                    <button class="passenger_type_document__dropbtn" type="button" id="drop_tbaby_ype_document__{{ $i+1 }}" aria-label="dropbtn_type_document__{{ $i+1 }}">
                                        <i class="fas fa-arrow-down"></i>
                                    </button>
                                    <ul class="passenger__type_document_list" id="drop_baby_type_document__{{ $i+1 }}">
                                        @foreach ($document_types_all as $document_type)
                                            <li class="passenger__type_document_list__item" value="{{ $document_type->id }}">{{ $document_type->name_document }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                                <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                    <label for="series-numbers-document-{{ $i+1 }}"></label>
                                    <input type="text" class="sm_input" id="series-numbers-document-{{ $i+1 }}" name="series-numbers-document-{{ $i+1 }}" placeholder="Серия и номер документа *">
                                </div>
                                <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                            </form>
                            <!-- /.passenger_full_info__forms_block__form_passenger -->
                        </div>
                        <!-- /.passenger_full_info__forms_block__item -->
                    @endfor
                </div>
                <!-- /.passenger_full_info__forms_block -->
                <button id="payment_ticket_btn" class="upper" aria-label="payment_ticket_btn" href="{{ route('payment_tickets__page') }}">Оплатить</button>
            </div>
            <!-- /.passenger_info_block__forms_block -->
        </div>
        <!-- /.passenger_info_block -->
    </div>
    <!-- /.container -->
@endsection
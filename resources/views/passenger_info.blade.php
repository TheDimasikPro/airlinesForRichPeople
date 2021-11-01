@extends('layouts.app_layout')
@section('title_page','Информация о пассажирах')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/style.min.css">
    <link rel="stylesheet" href="/assets/css/chief-slider.min.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
@endsection
@section('content')
    <div class="container">
        <div class="popup_fade non_view desktop_section"></div>
        <div class="popup_modal non_view desktop_section">
        <div class="popup">
            <button class="btn_popup_close" id="btn_popup_close" aria-label="btn_popup_close">Закрыть</button>
            <div class="popup_order_block">
            <h2>Ваш заказ</h2>
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
            <button type="button" id="btn_continune_order" aria-label="btn_continune_order" class="continune_order btn_style_1">Продолжить</button> <!-- /.continune_order -->
        </div>		
        </div>
        <div class="my_order__block_mobile desktop_section">
            <button class="btn_open__popup" id="btn_open__popup" aria-label="btn_open__popup">
              Просмотреть заказ можно здесь <i class="fas fa-arrow-right"></i> <i class="fas fa-shopping-basket"></i>
            </button> 
            <!-- /.btn_open__popup -->
          </div>
        <div class="passenger_info_block df_jcspb_aic">
            @include('inc.aside_bar_search_tickets')
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
                    <div class="passenger_full_info__forms_block__item">
                        <h3>Врослый пассажир №1</h3>
                        <form action="" class="passenger_full_info__forms_block__form_passenger">
                            <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                <label for="last-name-1"></label>
                                <input type="text" class="sm_input" id="last-name-1" name="last-name-1" placeholder="Фамилия *">
                            </div>
                            <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                            <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                <label for="name-1"></label>
                                <input type="text" class="sm_input" id="name-1" name="name-1" placeholder="Имя *">
                            </div>
                            <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                            <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                <label for="other-name-1"></label>
                                <input type="text" class="sm_input" id="other-name-1" name="other-name-1" placeholder="Отчество, если есть в паспорте">
                            </div>
                            <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                            <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                <button type="button" class="btn_gender_form_passenger" data-value="male" aria-label="male_gender_form_passenger" id="male_gender_form_passenger-1">Мужчина</button> 
                                <!-- /.btn_gender_form_passenger -->
                                <button type="button" class="btn_gender_form_passenger" data-value="woman" aria-label="woman_gender_form_passenger" id="woman_gender_form_passenger-1">Женщина</button> 
                                <!-- /.btn_gender_form_passenger -->
                            </div>
                            <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                            <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                <label for="date-bithday-1"></label>
                                <input type="date" class="sm_input date_bithday_input_form_passenger" id="date-bithday-1" name="date-bithday-1" placeholder="Дата рождения *">
                            </div>
                            <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                            <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                <label for="citizenship-1"></label>
                                <input type="text" class="sm_input citizenship_input_form_passenger" id="citizenship-1" name="citizenship-1" placeholder="Гражданство *">
                                {{-- список стран --}}
                            </div>
                            <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                            <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                <label for="type-document-1"></label>
                                <input type="text" class="sm_input" id="type-document-1" name="type-document-1" placeholder="Тип документа *">
                                {{-- список документов --}}
                            </div>
                            <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                            <div class="passenger_full_info__forms_block__form_passenger__input_block">
                                <label for="series-numbers-document-1"></label>
                                <input type="text" class="sm_input" id="series-numbers-document-1" name="series-numbers-document-1" placeholder="Серия и номер документа *">
                            </div>
                            <!-- /.passenger_full_info__forms_block__form_passenger__input_block -->
                        </form>
                        <!-- /.passenger_full_info__forms_block__form_passenger -->
                    </div>
                    <!-- /.passenger_full_info__forms_block__item -->
                </div>
                <!-- /.passenger_full_info__forms_block -->
            </div>
            <!-- /.passenger_info_block__forms_block -->
        </div>
        <!-- /.passenger_info_block -->
    </div>
    <!-- /.container -->
@endsection
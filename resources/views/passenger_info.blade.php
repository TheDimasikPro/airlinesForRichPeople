@extends('layouts.app_layout')
@section('title_page','Информация о пассажирах')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/style.min.css">
    <link rel="stylesheet" href="/assets/css/chief-slider.min.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
@endsection
@section('content')
    <div class="container">
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
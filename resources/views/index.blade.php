@extends('layouts.app_layout')
@section('title_page','Rich Airlines')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/style.min.css">
@endsection
@section('content')
    <section class="container desktop_section">
        <div class="work_with_flights">
            <ul class="flights_list df_aic">
                <li class="buy_ticket df_jcc_aic flights_list_item active_flights_list_item">Купить билет</li>
                <li class="check_in df_jcc_aic flights_list_item">Регистрация на рейс</li>
            </ul>
            <!-- /.flights_list -->
            <div class="search_tickets_block">
                <form action="{{ route('search_tickets__page') }}" class="form form_search_tickets">
                    <input type="text" class="non_view" name="old_count_people" value="0">
                    <input type="text" class="non_view" name="kids_count_people" value="0">
                    <input type="text" class="non_view" name="baby_count_people" value="0">
                    <div class="form_search_block_inputs" id="from_flight_block_input">
                        <div class="dropdown">
                            <div class="input_search_block df_jcc_aic">
                                <label for="id_i_s_f_f"></label>
                                <input type="text" required class="sm_input input_search_flights" name="airport_from" id="id_i_s_f_f" autocomplete="off" placeholder="Откуда:">
                                <button class="dropbtn" type="button" id="dropbtn_from_flights">
                                    <i class="fas fa-arrow-down"></i>
                                </button>
                                <!-- /.dropbtn -->
                            </div>
                            <!-- /.input_search_from_block -->
                            <ul class="dropdown_content drop_from_flights">
                                @foreach ($index_data["airport_data"] as $airport)
                                    <li class="dropdown_content__item" data-id="{{ $airport->id }}">
                                        <div class="info_country">
                                            <div class="airport_name">{{ $airport->name_eng }}</div>
                                            <!-- /.airport_name -->
                                            <div class="desc_airport_eng">Airport, {{ $airport->desc_airport_eng }}</div>
                                            <!-- /.desc_airport_eng -->
                                        </div>
                                        <!-- /.info_country -->
                                        <div class="iata_code">{{ $airport->iata_code }}</div>
                                        <!-- /.iata_code -->
                                    </li>
                                @endforeach
                                
                            </ul>
                        </div>
                        <!-- /.dropdown -->
                    </div>
                    <!-- /.form_search_block_inputs -->
                    <div class="form_search_block_inputs" id="to_flight_block_input">
                        <div class="dropdown">
                            <div class="input_search_block df_jcc_aic">
                                <label for="id_i_s_f_t"></label>
                                <input type="text" required class="sm_input input_search_flights" name="airport_back" id="id_i_s_f_t" autocomplete="off" placeholder="Куда:">
                                <button class="dropbtn" type="button" id="dropbtn_to_flights">
                                    <i class="fas fa-arrow-down"></i>
                                </button>
                                <!-- /.dropbtn -->
                            </div>
                            <!-- /.input_search_from_block -->
                            <ul class="dropdown_content drop_to_flights">
                                @foreach ($index_data["airport_data"] as $airport)
                                    <li class="dropdown_content__item" data-id="{{ $airport->id }}">
                                        <div class="info_country">
                                            <div class="airport_name">{{ $airport->name_eng }}</div>
                                            <!-- /.airport_name -->
                                            <div class="desc_airport_eng">Airport, {{ $airport->desc_airport_eng }}</div>
                                            <!-- /.desc_airport_eng -->
                                        </div>
                                        <!-- /.info_country -->
                                        <div class="iata_code">{{ $airport->iata_code }}</div>
                                        <!-- /.iata_code -->
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- /.dropdown -->
                    </div>
                    <!-- /.form_search_block_inputs -->
                    <div class="form_search_block_inputs there_data" id="id_i_d_t_block">
                        <label for="id_i_d_t"></label>
                        <input type="date" required name="date_from" autocomplete="off" class="min_input" id="id_i_d_t" placeholder="Туда:">
                    </div>
                    <!-- /.form_date_there_block -->
                    <div class="form_search_block_inputs back_data" id="id_i_d_b_block">
                        <label for="id_i_d_b"></label>
                        <input type="date" name="date_back" autocomplete="off" class="min_input" id="id_i_d_b" placeholder="Обратно:">
                    </div>
                    <!-- /.form_date_back_block -->
                    <div class="form_search_block_inputs" id="count_pass_block_input">
                        <div class="dropdown dd_count_pass">
                            <div class="input_count_pass_block df_jcc_aic">
                                <label for="id_i_c_pass"></label>
                                <input type="text" required name="count_pass" readonly autocomplete="off" name="" class="min_input" id="id_i_c_pass" value="0 пассажиров">
                                <button class="dropbtn" type="button" id="dropbtn_count_pass">
                                    <i class="fas fa-arrow-down"></i>
                                </button>
                                <!-- /.dropbtn -->
                            </div>
                            <!-- /.input_search_from_block -->
                            <ul class="dropdown_content drop_count_pass">
                                <li class="dropdown_content__item dc_count_pass">
                                    <div class="info_count_pass">
                                        <div class="title_count_pass">Взрослые</div>
                                        <!-- /.title_count_pass -->
                                        <div class="desc_pass">Старше 12 лет</div>
                                        <!-- /.desc_count_pass -->
                                    </div>
                                    <!-- /.info_pass -->
                                    <div class="btn_group_count_pass">
                                        <button type="button" class="btn count_pass_minus" id="btn_minus_old">
                                            <i class="fas fa-minus"></i>
                                        </button> 
                                        <!-- /.btn count_pass_minus -->
                                        <span class="result_count_pass" id="old_count_pass">0</span>
                                        <!-- /.result_count_pass -->
                                        <button type="button" class="btn count_pass_plus" id="btn_plus_old">
                                            <i class="fas fa-plus"></i>
                                        </button> 
                                        <!-- /.btn count_pass_plus -->
                                    </div>
                                    <!-- /.btn_group_count_pass -->
                                </li>
                                <li class="dropdown_content__item dc_count_pass">
                                    <div class="info_count_pass">
                                        <div class="title_count_pass">Дети</div>
                                        <!-- /.title_count_pass -->
                                        <div class="desc_pass">2 - 11 лет</div>
                                        <!-- /.desc_count_pass -->
                                    </div>
                                    <!-- /.info_pass -->
                                    <div class="btn_group_count_pass">
                                        <button type="button" class="btn count_pass_minus" id="btn_minus_kids">
                                            <i class="fas fa-minus"></i>
                                        </button> 
                                        <!-- /.btn count_pass_minus -->
                                        <span class="result_count_pass" id="kids_count_pass">0</span>
                                        <!-- /.result_count_pass -->
                                        <button type="button" class="btn count_pass_plus" id="btn_plus_kids">
                                            <i class="fas fa-plus"></i>
                                        </button> 
                                        <!-- /.btn count_pass_plus -->
                                    </div>
                                    <!-- /.btn_group_count_pass -->
                                </li>
                                <li class="dropdown_content__item dc_count_pass">
                                    <div class="info_count_pass">
                                        <div class="title_count_pass">Младенцы</div>
                                        <!-- /.title_count_pass -->
                                        <div class="desc_pass">До 2 лет</div>
                                        <!-- /.desc_count_pass -->
                                    </div>
                                    <!-- /.info_pass -->
                                    <div class="btn_group_count_pass">
                                        <button type="button" class="btn count_pass_minus" id="btn_minus_baby">
                                            <i class="fas fa-minus"></i>
                                        </button> 
                                        <!-- /.btn count_pass_minus -->
                                        <span class="result_count_pass" id="baby_count_pass">0</span>
                                        <!-- /.result_count_pass -->
                                        <button type="button" class="btn count_pass_plus" id="btn_plus_baby">
                                            <i class="fas fa-plus"></i>
                                        </button> 
                                        <!-- /.btn count_pass_plus -->
                                    </div>
                                    <!-- /.btn_group_count_pass -->
                                </li>
                                <li class="dropdown_content__item dc_count_pass">
                                    <button type="button" class="btn_style_1" id="btn_close_dc_count_pass" aria-label="btn_close_dc_count_pass">Закрыть</button> 
                                    <!-- /.btn_style_1 -->
                                </li>
                            </ul>
                        </div>
                        <!-- /.dropdown -->
                    </div>
                    <!-- /.form_date_back_block -->
                    <div class="form_search_block_inputs btn_search_block">
                        <button class="btn_style_1 upper" type="submit" id="btn_search" aria-label="btn_search">найти</button>
                    </div>
                    <!-- /.form_search_block_inputs -->
                </form>
                <!-- /.form form_search_tickets -->
            </div>
            <!-- /.search_tickets_block -->
            <div class="check_in_block non_view">
                <form action="{{ route('regiser_flight') }}" method="POST" class="form form_check_in df_jcspb_aic">
                    @csrf
                    <input type="text" required autocomplete="off" class="sm_input" name="last_name" id="input_last_name_user" placeholder="Фамилия пассажира">
                    <input type="text" required autocomplete="off" class="sm_input" name="series_number_document" id="input_series_number_document" placeholder="Серия и номер документа">
                    <input type="text" required autocomplete="off" class="sm_input" name="number_flight" id="input_info_ticket_reserv" placeholder="Номер рейса">
                    <button class="btn search_reserve btn_style_1 upper" type="submit">Найти бронь</button> 
                    <!-- /.btn search_reserve -->
                </form>
                <!-- /.form form_check_in -->

                <div class="message_after_search_complete">
                    <p>* При успешном поиске, вы автоматически будете зарегистрированы на рейс и на вашу электронную почту, которые вы указывали при оплате придет соответстующее письмо и вы будете перенаправлены обратно сюда</p>
                </div>
                <!-- /.message_after_search_complete -->
            </div>
            <!-- /.check_in_block -->
            @error('errors')
                <div class="errors_search_tickets">
                    {{ $message }}
                </div>
                <!-- /.errors_search_tickets -->
            @enderror
        </div>
        <!-- /.work_with_flights -->
    </section>

    <section class="container desktop_section">
        <div class="resorts df">
            <h2>Наши лучшие предложения</h2>
            <div class="resort_cards_block df_jcspb_aic">
                <div class="resort_card">
                    <a href="#">
                        <img src="/assets/images/resorts/moscow.jpg" alt="moscow" class="resotr_img">
                        <div class="shortdesk_resort">
                            <h2 class="title_resort">Москва</h2>
                            <!-- /.title_resort -->
                            <span class="starting_price">
                                от 40000 <i class="fas fa-ruble-sign"></i>
                            </span> 
                            <!-- /.starting_price -->
                        </div>
                        <!-- /.shortdesk_resort -->
                    </a>
                </div>
                <!-- /.resort_card -->
                <div class="resort_card">
                    <a href="#">
                        <img src="/assets/images/resorts/maldivy.jpg" alt="maldivy" class="resotr_img">
                        <div class="shortdesk_resort">
                            <h2 class="title_resort">Мальдивы</h2>
                            <!-- /.title_resort -->
                            <span class="starting_price">
                                от 150000 <i class="fas fa-ruble-sign"></i>
                            </span> 
                            <!-- /.starting_price -->
                        </div>
                        <!-- /.shortdesk_resort -->
                    </a>
                </div>
                <!-- /.resort_card -->
                <div class="resort_card">
                    <a href="#">
                        <img src="/assets/images/resorts/new-york.jpg" alt="new-york" class="resotr_img">
                        <div class="shortdesk_resort">
                            <h2 class="title_resort">New York</h2>
                            <!-- /.title_resort -->
                            <span class="starting_price">
                                от 100000 <i class="fas fa-ruble-sign"></i>
                            </span> 
                            <!-- /.starting_price -->
                        </div>
                        <!-- /.shortdesk_resort -->
                    </a>
                </div>
                <!-- /.resort_card -->
            </div>
            <!-- /.resort_cards_block -->
        </div>
        <!-- /.resorts -->
    </section>
    <!-- /.container -->

    <section class="container desktop_section" id="section__add_services">
        <div class="add_services">
            <h2>Дополнительные услуги</h2>
            <div class="add_services_block df_jcspb_aic">
                <div class="add_services_card">
                    <a href="#">
                        <img src="/assets/images/services/dog350x340.jpg" alt="maldivy" class="add_services_img">
                        <div class="shortdesk_add_services">
                            <h2 class="title_add_services">Провоз питомца в самолете</h2>
                            <!-- /.title_resort -->
                            <span class="add_services_price">
                                от 10000 <i class="fas fa-ruble-sign"></i>
                            </span> 
                            <!-- /.add_services_price -->
                        </div>
                        <!-- /.shortdesk_add_services -->
                    </a>
                </div>
                <!-- /.add_services_card -->
                <div class="add_services_card">
                    <a href="#">
                        <img src="/assets/images/services/transfer.jpg" alt="maldivy" class="add_services_img">
                        <div class="shortdesk_add_services">
                            <h2 class="title_add_services">Трансфер от аэропорта до отеля</h2>
                            <!-- /.title_resort -->
                            <span class="add_services_price">
                                от 10000 <i class="fas fa-ruble-sign"></i>
                            </span> 
                            <!-- /.add_services_price -->
                        </div>
                        <!-- /.shortdesk_add_services -->
                    </a>
                </div>
                <!-- /.add_services_card -->
                <div class="add_services_card">
                    <a href="#">
                        <img src="/assets/images/services/hotel_sey.jpg" alt="maldivy" class="add_services_img">
                        <div class="shortdesk_add_services">
                            <h2 class="title_add_services">Предоставление списка лучших отелей города</h2>
                            <!-- /.title_resort -->
                            <span class="add_services_price">
                                от 10000 <i class="fas fa-ruble-sign"></i>
                            </span> 
                            <!-- /.add_services_price -->
                        </div>
                        <!-- /.shortdesk_add_services -->
                    </a>
                </div>
                <!-- /.add_services_card -->
            </div>
            <!-- /.add_services_block -->
        </div>
        <!-- /.add_services -->
        
    </section>
    <!-- /.container -->

    <section class="container desktop_section">
        <div class="reviews_block">
            <h2>Отзывы</h2>
            <div class="reviews_block__cards">
                @foreach ($index_data["reviews"] as $review_item)
                    <div class="reviews_block__cards__item" data-id="{{ $review_item["id"] }}">
                        <div class="reviews_block__cards__item__name_user">
                            {{ $review_item->name_user }}
                        </div>
                        <!-- /.reviews_block__cards__item__name_user -->
                        <div class="reviews_block__cards__item__date">
                            {{ \Carbon\Carbon::parse($review_item->created_at)->format('d.m.Y') }}
                        </div>
                        <!-- /.reviews_block__cards__item__date -->
                        <div class="reviews_block__cards__item__text_review">
                            {{ $review_item->text_review }}
                        </div>
                        <!-- /.reviews_block__cards__item__text_review -->
                    </div>
                    <!-- /.reviews_block__cards__item -->
                @endforeach
            </div>
            <!-- /.reviews_block__cards -->
            @if ($index_data["reviews_count"] > 5)
            <div class="btn_review_block df_jcc_aic">
                <button id="more_review_btn" class="btn_style_1">Показать еще</button>
            </div>
            <!-- /.btn_review_block -->

            @endif
        </div>
        <!-- /.reviews_block -->
    </section>
    <!-- /.container -->
    <section class="container desktop_section" id="section__review_send">
        <h2>Оставьте свой отзыв</h2>
        <form action="#" method="post">
            @csrf
            <div class="overlay_review_data_form">
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
                <div class="check_mark_review_form">
                    <img src="/assets/images/icons/icons8-check-mark-48.png" alt="check-mark">
                </div>
                <!-- /.check_mark_review_form -->
            </div>
            <label for="name_user"></label>
            <input type="text" name="name_user" required id="name_user" placeholder="Введите свое имя">
            <label for="text_review"></label>
            <textarea name="text_review" id="review_text" required placeholder="Напишите свой отзыв..."></textarea>
            <button type="button" class="btn_style_1" id="btn_send_review" >Отправить</button>
        </form>
    </section>
    <!-- /.container desktop_section -->
@endsection

@section('slider_script')
    <script src="/assets/js/index_page.js"></script>
@endsection
@extends('layouts.app_layout')
@section('title_page','Rich Airlines')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/style.min.css">
@endsection
@section('content')
    <section class="container">
        <div class="work_with_flights">
            <ul class="flights_list df_aic">
                <li class="buy_ticket df_jcc_aic flights_list_item active_flights_list_item">Купить билет</li>
                <li class="check_in df_jcc_aic flights_list_item">Регистрация на рейс</li>
            </ul>
            <!-- /.flights_list -->
            <div class="search_tickets_block">
                <form action="" class="form form_search_tickets">
                    <div class="form_search_block_inputs">
                        <div class="dropdown">
                            <div class="input_search_block df_jcc_aic">
                                <input type="text" class="sm_input input_search_flights" name="flights_from" id="id_i_s_f_f" autocomplete="off">
                                <button class="dropbtn" type="button" id="dropbtn_from_flights">
                                    <i class="fas fa-arrow-down"></i>
                                </button>
                                <!-- /.dropbtn -->
                            </div>
                            <!-- /.input_search_from_block -->
                            <ul class="dropdown_content drop_from_flights">
                                <li class="dropdown_content__item">
                                    <div class="info_country">
                                        <div class="city_name">Moscow</div>
                                        <!-- /.city_name -->
                                        <div class="desc_airport_eng">Airport, Moscow, Russia</div>
                                        <!-- /.desc_airport_eng -->
                                    </div>
                                    <!-- /.info_country -->
                                    <div class="airport_name">
                                        MOW
                                    </div>
                                    <!-- /.airport_name -->
                                </li>
                                <li class="dropdown_content__item">
                                    <div class="info_country">
                                        <div class="city_name"></div>
                                        <!-- /.city_name -->
                                        <div class="country_name"></div>
                                        <!-- /.country_name -->
                                    </div>
                                    <!-- /.info_country -->
                                    <div class="airport_name">

                                    </div>
                                    <!-- /.airport_name -->
                                    </li>
                                <li class="dropdown_content__item">
                                    <div class="info_country">
                                        <div class="city_name"></div>
                                        <!-- /.city_name -->
                                        <div class="country_name"></div>
                                        <!-- /.country_name -->
                                    </div>
                                    <!-- /.info_country -->
                                    <div class="airport_name">

                                    </div>
                                    <!-- /.airport_name -->
                                    </li>
                                <li class="dropdown_content__item">
                                    <div class="info_country">
                                        <div class="city_name"></div>
                                        <!-- /.city_name -->
                                        <div class="country_name"></div>
                                        <!-- /.country_name -->
                                    </div>
                                    <!-- /.info_country -->
                                    <div class="airport_name">

                                    </div>
                                    <!-- /.airport_name -->
                                    </li>
                                <li class="dropdown_content__item">
                                    <div class="info_country">
                                        <div class="city_name"></div>
                                        <!-- /.city_name -->
                                        <div class="country_name"></div>
                                        <!-- /.country_name -->
                                    </div>
                                    <!-- /.info_country -->
                                    <div class="airport_name">

                                    </div>
                                    <!-- /.airport_name -->
                                </li>
                                <li class="dropdown_content__item">
                                    <div class="info_country">
                                        <div class="city_name"></div>
                                        <!-- /.city_name -->
                                        <div class="country_name"></div>
                                        <!-- /.country_name -->
                                    </div>
                                    <!-- /.info_country -->
                                    <div class="airport_name">
                                        свсв
                                    </div>
                                    <!-- /.airport_name -->
                                </li>
                                <li class="dropdown_content__item">
                                    <div class="info_country">
                                        <div class="city_name"></div>
                                        <!-- /.city_name -->
                                        <div class="country_name"></div>
                                        <!-- /.country_name -->
                                    </div>
                                    <!-- /.info_country -->
                                    <div class="airport_name">

                                    </div>
                                    <!-- /.airport_name -->
                                </li>
                            </ul>
                        </div>
                        <!-- /.dropdown -->
                    </div>
                    <!-- /.form_search_block_inputs -->
                    <div class="form_search_block_inputs">
                        <div class="dropdown">
                            <div class="input_search_block df_jcc_aic">
                                <input type="text" class="sm_input input_search_flights" name="flights_to" id="id_i_s_f_t" autocomplete="off">
                                <button class="dropbtn" type="button" id="dropbtn_to_flights">
                                    <i class="fas fa-arrow-down"></i>
                                </button>
                                <!-- /.dropbtn -->
                            </div>
                            <!-- /.input_search_from_block -->
                            <ul class="dropdown_content drop_to_flights">
                                <li class="dropdown_content__item">
                                    <div class="info_country">
                                        <div class="city_name"></div>
                                        <!-- /.city_name -->
                                        <div class="country_name"></div>
                                        <!-- /.country_name -->
                                    </div>
                                    <!-- /.info_country -->
                                    <div class="airport_name">

                                    </div>
                                    <!-- /.airport_name -->
                                </li>
                                <li class="dropdown_content__item">
                                    <div class="info_country">
                                        <div class="city_name"></div>
                                        <!-- /.city_name -->
                                        <div class="country_name"></div>
                                        <!-- /.country_name -->
                                    </div>
                                    <!-- /.info_country -->
                                    <div class="airport_name">

                                    </div>
                                    <!-- /.airport_name -->
                                </li>
                                <li class="dropdown_content__item">
                                    <div class="info_country">
                                        <div class="city_name"></div>
                                        <!-- /.city_name -->
                                        <div class="country_name"></div>
                                        <!-- /.country_name -->
                                    </div>
                                    <!-- /.info_country -->
                                    <div class="airport_name">

                                    </div>
                                    <!-- /.airport_name -->
                                </li>
                                <li class="dropdown_content__item">
                                    <div class="info_country">
                                        <div class="city_name"></div>
                                        <!-- /.city_name -->
                                        <div class="country_name"></div>
                                        <!-- /.country_name -->
                                    </div>
                                    <!-- /.info_country -->
                                    <div class="airport_name">

                                    </div>
                                    <!-- /.airport_name -->
                                </li>
                                <li class="dropdown_content__item">
                                    <div class="info_country">
                                        <div class="city_name"></div>
                                        <!-- /.city_name -->
                                        <div class="country_name"></div>
                                        <!-- /.country_name -->
                                    </div>
                                    <!-- /.info_country -->
                                    <div class="airport_name">

                                    </div>
                                    <!-- /.airport_name -->
                                </li>
                                <li class="dropdown_content__item">
                                    <div class="info_country">
                                        <div class="city_name"></div>
                                        <!-- /.city_name -->
                                        <div class="country_name"></div>
                                        <!-- /.country_name -->
                                    </div>
                                    <!-- /.info_country -->
                                    <div class="airport_name">
                                        свсв
                                    </div>
                                    <!-- /.airport_name -->
                                </li>
                                <li class="dropdown_content__item">
                                    <div class="info_country">
                                        <div class="city_name"></div>
                                        <!-- /.city_name -->
                                        <div class="country_name"></div>
                                        <!-- /.country_name -->
                                    </div>
                                    <!-- /.info_country -->
                                    <div class="airport_name">

                                    </div>
                                    <!-- /.airport_name -->
                                </li>
                            </ul>
                        </div>
                        <!-- /.dropdown -->
                    </div>
                    <!-- /.form_search_block_inputs -->
                    <div class="form_search_block_inputs there_data" id="id_i_d_t_block">
                        <input type="text" readonly autocomplete="off" class="min_input" id="id_i_d_t" value="Туда:">
                    </div>
                    <!-- /.form_date_there_block -->
                    <div class="form_search_block_inputs back_data" id="id_i_d_b_block">
                        <input type="text" readonly autocomplete="off" class="min_input" id="id_i_d_b" value="Обратно:">
                    </div>
                    <!-- /.form_date_back_block -->
                    <div class="form_search_block_inputs">
                        <div class="dropdown dd_count_pass">
                            <div class="input_count_pass_block df_jcc_aic">
                                <input type="text" readonly autocomplete="off" class="min_input" id="id_i_c_pass" value="0 пассажиров">
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
                            </ul>
                        </div>
                        <!-- /.dropdown -->
                    </div>
                    <!-- /.form_date_back_block -->
                    <div class="form_search_block_inputs">
                        <button class="btn_style_1 upper">найти</button>
                    </div>
                    <!-- /.form_search_block_inputs -->
                </form>
                <!-- /.form form_search_tickets -->

            </div>
            <!-- /.search_tickets_block -->
            <div class="check_in_block non_view">
                <form action="" class="form form_check_in df_jcspb_aic">
                    <input type="text" autocomplete="off" class="md_input" id="input_last_name_user" placeholder="Фамилия пассажира">
                    <input type="text" autocomplete="off" class="md_input" id="input_info_ticket_reserv" placeholder="Номер брони / билета">
                    <button class="btn search_reserve btn_style_1 upper" type="button">Найти бронь</button> 
                    <!-- /.btn search_reserve -->
                </form>
                <!-- /.form form_check_in -->
            </div>
            <!-- /.check_in_block -->
        </div>
        <!-- /.work_with_flights -->
    </section>

    <section class="container">
        <div class="resorts df">
            <h2>Наши лучшие предложения</h2>
            <div class="resort_cards_block df_jcspb_aic">
                <div class="resort_card">
                    <a href="">
                        <img src="/assets/images/resorts/moscow.jpg" alt="moscow" class="resotr_img">
                        <div class="shortdesk_resort">
                            <h2 class="title_resort">Москва</h2>
                            <!-- /.title_resort -->
                            <span class="starting_price">
                                от 5000 <i class="fas fa-ruble-sign"></i>
                            </span> 
                            <!-- /.starting_price -->
                        </div>
                        <!-- /.shortdesk_resort -->
                    </a>
                </div>
                <!-- /.resort_card -->
                <div class="resort_card">
                    <a href="">
                        <img src="/assets/images/resorts/maldivy.jpg" alt="maldivy" class="resotr_img">
                        <div class="shortdesk_resort">
                            <h2 class="title_resort">Мальдивы</h2>
                            <!-- /.title_resort -->
                            <span class="starting_price">
                                от 51000 <i class="fas fa-ruble-sign"></i>
                            </span> 
                            <!-- /.starting_price -->
                        </div>
                        <!-- /.shortdesk_resort -->
                    </a>
                </div>
                <!-- /.resort_card -->
                <div class="resort_card">
                    <a href="">
                        <img src="/assets/images/resorts/new-york.jpg" alt="new-york" class="resotr_img">
                        <div class="shortdesk_resort">
                            <h2 class="title_resort">New York</h2>
                            <!-- /.title_resort -->
                            <span class="starting_price">
                                от 45000 <i class="fas fa-ruble-sign"></i>
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

    <section class="container">
        <div class="add_services">
            <h2>Дополнительные услуги</h2>
            <div class="add_services_block df_jcspb_aic">
                <div class="add_services_card">
                    <a href="">
                        <img src="/assets/images/services/dog.jpg" alt="maldivy" class="add_services_img">
                        <div class="shortdesk_add_services">
                            <h2 class="title_add_services">Провоз питомца в самолете</h2>
                            <!-- /.title_resort -->
                            <span class="add_services_price">
                                от 51000 <i class="fas fa-ruble-sign"></i>
                            </span> 
                            <!-- /.add_services_price -->
                        </div>
                        <!-- /.shortdesk_add_services -->
                    </a>
                </div>
                <!-- /.add_services_card -->
                <div class="add_services_card">
                    <a href="">
                        <img src="/assets/images/services/transfer.jpg" alt="maldivy" class="add_services_img">
                        <div class="shortdesk_add_services">
                            <h2 class="title_add_services">Трансфер от аэропорта до отеля</h2>
                            <!-- /.title_resort -->
                            <span class="add_services_price">
                                от 51000 <i class="fas fa-ruble-sign"></i>
                            </span> 
                            <!-- /.add_services_price -->
                        </div>
                        <!-- /.shortdesk_add_services -->
                    </a>
                </div>
                <!-- /.add_services_card -->
                <div class="add_services_card">
                    <a href="">
                        <img src="/assets/images/services/hotel_sey.jpg" alt="maldivy" class="add_services_img">
                        <div class="shortdesk_add_services">
                            <h2 class="title_add_services">Предоставление списка лучших отелей города</h2>
                            <!-- /.title_resort -->
                            <span class="add_services_price">
                                от 51000 <i class="fas fa-ruble-sign"></i>
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
@endsection
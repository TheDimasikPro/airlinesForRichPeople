@extends('layouts.operator')
@section('content')
<div class="flight_info">
    <div class="flight_info_block">
        <div class="flight_info_block_form_sort">
            <form action="" method="get">
                @csrf
                <h2>Форма поиска будущих рейсов</h2>
                <div class="inputs_block">
                    <label for="flight_date">
                        Дата:
                        <input type="date" class="sm_input" id="flight_date" name="flight_date">
                    </label>
                    <label for="flight_price">
                        Цена:
                        <input type="text" class="sm_input" id="flight_price" name="flight_price" placeholder="Цена рейса">
                    </label>

                    <button class="btn_style_1" type="button" id="btn_search_future_flight">Найти</button> 
                    <!-- /#btn_search_future_flight.btn_style_1 -->
                </div>
                <!-- /.inputs_block -->
                
            </form>
        </div>
        <!-- /.flight_info_block_form_sort -->
        <ul class="flght_table_block">
            <li class="flght_table_block__item_title">
                <div class="flght_table_block__item_title__text">№</div>
                <!-- /.flght_table_block__item_title__text -->
                <div class="flght_table_block__item_title__text">№ рейса</div>
                <!-- /.flght_table_block__item_title__text -->
                <div class="flght_table_block__item_title__text">План полета</div>
                <!-- /.flght_table_block__item_title__text -->
                <div class="flght_table_block__item_title__text">Цена</div>
                <!-- /.flght_table_block__item_title__text -->
                <div class="flght_table_block__item_title__text">Edit</div>
                <!-- /.flght_table_block__item_title__text -->
                <div class="flght_table_block__item_title__text">Delete</div>
                <!-- /.flght_table_block__item_title__text -->
            </li>
            <!-- /.flght_table_block__item -->
            @if (count($operator["flight_arr"]) > 0)
            <?php $number = 0; ?>
                @foreach ($operator["flight_arr"] as $key => $flight_arr__item)
                <?php $number++?>
                    <li class="flght_table_block__item" data-id="{{ $number }}">
                        <div class="flght_table_block__item__number_row">{{ $number }}</div>
                        <!-- /.flght_table_block__item__number_row -->
                        <div class="flght_table_block__item__info">
                            <div class="flght_table_block__item__info__flight_number upper">{{ $flight_arr__item['flight']["flight_code"] }}</div>
                            <!-- /.flght_table_block__item__info__flight_number -->
                            <div class="flght_table_block__item__info__flight_plan">
                                <div class="flght_table_block__item__info__flight_plan__start">
                                    <div class="flght_table_block__item__info__flight_plan__start__city">{{ $flight_arr__item["airport_flight_start"]["city_eng"] }} ({{ $flight_arr__item['airport_flight_start']["iata_code"] }})</div>
                                    <!-- /.flght_table_block__item__info__flight_plan__start__city -->
                                    
                                    <div class="flght_table_block__item__info__flight_plan__start__iata_code_date">{{ \Carbon\Carbon::parse($flight_arr__item['flight']["date_start"])->format('d-m-Y') }} {{ \Carbon\Carbon::parse($flight_arr__item['flight']["time_start"])->format('H:i') }}</div>
                                    <!-- /.flght_table_block__item__info__flight_plan__start__iata_code_date -->
                                </div>
                                <!-- /.flght_table_block__item__info__flight_plan__start -->

                                <div class="flght_table_block__item__info__flight_plan__travel_time">
                                    {{ \Carbon\Carbon::parse($flight_arr__item["flight"]["travel_time"])->format('H:i') }}
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                                <!-- /.flght_table_block__item__info__flight_plan__travel_time -->

                                <div class="flght_table_block__item__info__flight_plan__end">
                                    <div class="flght_table_block__item__info__flight_plan__end__city">{{ $flight_arr__item["airport_flight_end"]["city_eng"] }} ({{ $flight_arr__item['airport_flight_end']["iata_code"] }})</div>
                                    <!-- /.flght_table_block__item__info__flight_plan__end__city -->
                                    <div class="flght_table_block__item__info__flight_plan__end__iata_code_date">{{ \Carbon\Carbon::parse($flight_arr__item['flight']["date_end"])->format('d-m-Y') }} {{ \Carbon\Carbon::parse($flight_arr__item['flight']["time_end"])->format('H:i') }}</div>
                                    <!-- /.flght_table_block__item__info__flight_plan__end__iata_code_date -->
                                </div>
                                <!-- /.flght_table_block__item__info__flight_plan__end -->
                            </div>
                            <!-- /.flght_table_block__item__info__flight_plan -->
                            <div class="flght_table_block__item__info__flght_price">{{ $flight_arr__item["flight"]["cost"] }} <i class="fas fa-ruble-sign" aria-hidden="true"></i></div>
                            <!-- /.flght_table_block__item__info__flght_price -->
                        </div>
                        <!-- /.flght_table_block__item__info -->
                        <div class="flght_table_block__item__edit">
                            <button class="flght_table_block__item__edit_btn" id="flight_edit_btn_{{ $number }}" aria-label="flight_edit_btn_{{ $number }}">
                                <i class="fas fa-pencil-alt"></i>
                            </button> 
                            <!-- /.flght_table_block__item__edit_btn -->
                        </div>
                        <!-- /.flght_table_block__item__edit -->
                        <div class="flght_table_block__item__delete">
                            <button class="flght_table_block__item__delete_btn" id="flight_delete_btn_{{ $number }}" aria-label="flight_delete_btn_{{ $number }}">
                                <i class="fas fa-backspace"></i>
                            </button> 
                            <!-- /.flght_table_block__item__delete_btn -->
                        </div>
                        <!-- /.flght_table_block__item__delete -->
                    </li>
                    <!-- /.flght_table_block__item -->
                @endforeach
            @endif
        </ul>
        <!-- /.flght_table_block -->
    </div>
    <!-- /.flight_info_block -->
    
    <div class="flight_forms_block">
        <form action="" method="post" class="flight_form">
            @csrf

            <div class="flight_form__main">
                <div class="overlay_flight_forms">
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
                    <div class="check_mark_flight_forms">
                        <img src="/assets/images/icons/icons8-check-mark-48.png" alt="check-mark">
                    </div>
                    <!-- /.check_mark_flight_forms -->
                </div>
                <h2>Форма добавления, редактирования рейсов</h2>
                <div class="flight_form__inputs">
                    <div class="flight_form__inputs__row">
                        <div class="input_block">
                            <label for="input_airport_start">Аэропорт старта:</label>
                            <input type="text" id="input_airport_start" name="airport_start" class="sm_input" placeholder="Выберите аэропорт взлета">
                            <button class="airport_start__dropbtn drop_btn" type="button" id="dropbtn_airport_start" aria-label="dropbtn_airport_start">
                                <i class="fas fa-arrow-down"></i>
                            </button>
                            
                            <ul class="airport_start__list">
                                @foreach ($operator["airport_data"] as $airport)
                                    <li class="airport_start__list__item" data-id="{{ $airport->id }}">
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
                                <!-- /.airport_start__list__item -->
                            </ul>
                        </div>
                        <!-- /.inputs_block -->
                        <div class="input_block">
                            <label for="input_airport_end">Аэропорт прибытия:</label>
                            <input type="text" id="input_airport_end" name="airport_end" class="sm_input" placeholder="Выберите аэропорт прибытия">
                            <button class="airport_end__dropbtn drop_btn" type="button" id="dropbtn_airport_end" aria-label="dropbtn_airport_end">
                                <i class="fas fa-arrow-down"></i>
                            </button>
                            
                            <ul class="airport_end__list">
                                @foreach ($operator["airport_data"] as $airport)
                                    <li class="airport_end__list__item" data-id="{{ $airport->id }}">
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
                                <!-- /.airport_end__list__item -->
                            </ul>
                        </div>
                        <!-- /.inputs_block -->
                    </div>
                    <!-- /.flight_form__inputs__row -->
                    <div class="flight_form__inputs__row">
                        <div class="input_block">
                            <label for="date_start">Дата старта:</label>
                            <input type="date" class="sm_input" name="date_start" min="{{ \Carbon\Carbon::now()->format('d-m-Y') }}" max="{{ \Carbon\Carbon::now()->addMonth(3)->format('d-m-Y') }}" id="date_start" placeholder="Выберите дату взлета">
                        </div>
                        <!-- /.inputs_block -->
                        <div class="input_block">
                            <label for="date_end">Дата прибытия:</label>
                            <input type="date" class="sm_input" name="date_end" min="{{ \Carbon\Carbon::now()->format('d-m-Y') }}" max="{{ \Carbon\Carbon::now()->addMonth(3)->format('d-m-Y') }}" id="date_end" placeholder="Выберите дату прибытия">
                        </div>
                        <!-- /.inputs_block -->
                    </div>
                    <!-- /.flight_form__inputs__row -->
                    <div class="flight_form__inputs__row">
                        <div class="input_block">
                            <label for="input_time_start">Время взлета:</label>
                            <input type="text" class="sm_input" name="time_start" id="input_time_start" placeholder="Выберите время взлета">
                        </div>
                        <!-- /.inputs_block -->
                        <div class="input_block">
                            <label for="input_time_end">Время приземления:</label>
                            <input type="text" class="sm_input" name="time_end" id="input_time_end" placeholder="Выберите время приземления">
                        </div>
                        <!-- /.inputs_block -->
                    </div>
                    <!-- /.flight_form__inputs__row -->
                    <div class="flight_form__inputs__row">
                        <div class="input_block">
                            <button type="button" class="btn_style_1" name="add_flight" id="add_flight">Добавить</button>
                        </div>
                        <!-- /.inputs_block -->
                        <div class="input_block">
                            <button type="button" class="btn_style_1 non_active_button" name="update_flight" id="update_flight">Сохранить</button>
                        </div>
                        <!-- /.inputs_block -->
                    </div>
                    <!-- /.flight_form__inputs__row -->
                </div>
                <!-- /.flight_form__inputs -->
                <ul class="errors_list non_view">
    
                </ul>
                <!-- /.errors_list -->
            </div>
            <!-- /.flight_form__main -->
            
        </form>
    </div>
    <!-- /.flight_forms_block -->
</div>
<!-- /.flight_info -->
<button class="btn_scroll_top non_view" id="btn_scroll_top">
    <i class="fas fa-arrow-up"></i>
</button> 
<!-- /#btn_add_flight.btn_add_flight -->
@endsection
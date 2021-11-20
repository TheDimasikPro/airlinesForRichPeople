@extends('inc.operator')
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
            <li class="flght_table_block__item">
                <div class="flght_table_block__item__number_row">1</div>
                <!-- /.flght_table_block__item__number_row -->
                <div class="flght_table_block__item__info">
                    <div class="flght_table_block__item__info__flight_number">RA_GFBF</div>
                    <!-- /.flght_table_block__item__info__flight_number -->
                    <div class="flght_table_block__item__info__flight_plan">
                        <div class="flght_table_block__item__info__flight_plan__start">
                            <div class="flght_table_block__item__info__flight_plan__start__city">Екатеринбург</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__city -->
                            <div class="flght_table_block__item__info__flight_plan__start__iata_code">(SVX)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__start -->

                        <div class="flght_table_block__item__info__flight_plan__travel_time">
                            02:30
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__travel_time -->

                        <div class="flght_table_block__item__info__flight_plan__end">
                            <div class="flght_table_block__item__info__flight_plan__end__city">МоскваМосква</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__city -->
                            <div class="flght_table_block__item__info__flight_plan__end__iata_code">(DME)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__end -->
                    </div>
                    <!-- /.flght_table_block__item__info__flight_plan -->
                    <div class="flght_table_block__item__info__flght_price">5000p</div>
                    <!-- /.flght_table_block__item__info__flght_price -->
                </div>
                <!-- /.flght_table_block__item__info -->
                <div class="flght_table_block__item__edit">
                    <button class="flght_table_block__item__edit_btn" id="flight_edit_btn_1" aria-label="flight_edit_btn_1">
                        <i class="fas fa-pencil-alt"></i>
                    </button> 
                    <!-- /.flght_table_block__item__edit_btn -->
                </div>
                <!-- /.flght_table_block__item__edit -->
                <div class="flght_table_block__item__delete">
                    <button class="flght_table_block__item__delete_btn" id="flight_delete_btn_1" aria-label="flight_delete_btn_1">
                        <i class="fas fa-backspace"></i>
                    </button> 
                    <!-- /.flght_table_block__item__delete_btn -->
                </div>
                <!-- /.flght_table_block__item__delete -->
            </li>
            <!-- /.flght_table_block__item -->
            <li class="flght_table_block__item">
                <div class="flght_table_block__item__number_row">1</div>
                <!-- /.flght_table_block__item__number_row -->
                <div class="flght_table_block__item__info">
                    <div class="flght_table_block__item__info__flight_number">RA_GFBF</div>
                    <!-- /.flght_table_block__item__info__flight_number -->
                    <div class="flght_table_block__item__info__flight_plan">
                        <div class="flght_table_block__item__info__flight_plan__start">
                            <div class="flght_table_block__item__info__flight_plan__start__city">Екатеринбург</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__city -->
                            <div class="flght_table_block__item__info__flight_plan__start__iata_code">(SVX)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__start -->

                        <div class="flght_table_block__item__info__flight_plan__travel_time">
                            02:30
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__travel_time -->

                        <div class="flght_table_block__item__info__flight_plan__end">
                            <div class="flght_table_block__item__info__flight_plan__end__city">МоскваМоскваМоскваМоскваМоскваМоскваМоскваМосква</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__city -->
                            <div class="flght_table_block__item__info__flight_plan__end__iata_code">(DME)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__end -->
                    </div>
                    <!-- /.flght_table_block__item__info__flight_plan -->
                    <div class="flght_table_block__item__info__flght_price">5000p</div>
                    <!-- /.flght_table_block__item__info__flght_price -->
                </div>
                <!-- /.flght_table_block__item__info -->
                <div class="flght_table_block__item__edit">
                    <button class="flght_table_block__item__edit_btn" id="flight_edit_btn_1" aria-label="flight_edit_btn_1">
                        <i class="fas fa-pencil-alt"></i>
                    </button> 
                    <!-- /.flght_table_block__item__edit_btn -->
                </div>
                <!-- /.flght_table_block__item__edit -->
                <div class="flght_table_block__item__delete">
                    <button class="flght_table_block__item__delete_btn" id="flight_delete_btn_1" aria-label="flight_delete_btn_1">
                        <i class="fas fa-backspace"></i>
                    </button> 
                    <!-- /.flght_table_block__item__delete_btn -->
                </div>
                <!-- /.flght_table_block__item__delete -->
            </li>
            <!-- /.flght_table_block__item -->
            <li class="flght_table_block__item">
                <div class="flght_table_block__item__number_row">1</div>
                <!-- /.flght_table_block__item__number_row -->
                <div class="flght_table_block__item__info">
                    <div class="flght_table_block__item__info__flight_number">RA_GFBF</div>
                    <!-- /.flght_table_block__item__info__flight_number -->
                    <div class="flght_table_block__item__info__flight_plan">
                        <div class="flght_table_block__item__info__flight_plan__start">
                            <div class="flght_table_block__item__info__flight_plan__start__city">Екатеринбург</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__city -->
                            <div class="flght_table_block__item__info__flight_plan__start__iata_code">(SVX)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__start -->

                        <div class="flght_table_block__item__info__flight_plan__travel_time">
                            02:30
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__travel_time -->

                        <div class="flght_table_block__item__info__flight_plan__end">
                            <div class="flght_table_block__item__info__flight_plan__end__city">МоскваМоскваМоскваМоскваМоскваМоскваМоскваМосква</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__city -->
                            <div class="flght_table_block__item__info__flight_plan__end__iata_code">(DME)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__end -->
                    </div>
                    <!-- /.flght_table_block__item__info__flight_plan -->
                    <div class="flght_table_block__item__info__flght_price">5000p</div>
                    <!-- /.flght_table_block__item__info__flght_price -->
                </div>
                <!-- /.flght_table_block__item__info -->
                <div class="flght_table_block__item__edit">
                    <button class="flght_table_block__item__edit_btn" id="flight_edit_btn_1" aria-label="flight_edit_btn_1">
                        <i class="fas fa-pencil-alt"></i>
                    </button> 
                    <!-- /.flght_table_block__item__edit_btn -->
                </div>
                <!-- /.flght_table_block__item__edit -->
                <div class="flght_table_block__item__delete">
                    <button class="flght_table_block__item__delete_btn" id="flight_delete_btn_1" aria-label="flight_delete_btn_1">
                        <i class="fas fa-backspace"></i>
                    </button> 
                    <!-- /.flght_table_block__item__delete_btn -->
                </div>
                <!-- /.flght_table_block__item__delete -->
            </li>
            <!-- /.flght_table_block__item -->
            <li class="flght_table_block__item">
                <div class="flght_table_block__item__number_row">1</div>
                <!-- /.flght_table_block__item__number_row -->
                <div class="flght_table_block__item__info">
                    <div class="flght_table_block__item__info__flight_number">RA_GFBF</div>
                    <!-- /.flght_table_block__item__info__flight_number -->
                    <div class="flght_table_block__item__info__flight_plan">
                        <div class="flght_table_block__item__info__flight_plan__start">
                            <div class="flght_table_block__item__info__flight_plan__start__city">Екатеринбург</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__city -->
                            <div class="flght_table_block__item__info__flight_plan__start__iata_code">(SVX)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__start -->

                        <div class="flght_table_block__item__info__flight_plan__travel_time">
                            02:30
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__travel_time -->

                        <div class="flght_table_block__item__info__flight_plan__end">
                            <div class="flght_table_block__item__info__flight_plan__end__city">МоскваМоскваМоскваМоскваМоскваМоскваМоскваМосква</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__city -->
                            <div class="flght_table_block__item__info__flight_plan__end__iata_code">(DME)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__end -->
                    </div>
                    <!-- /.flght_table_block__item__info__flight_plan -->
                    <div class="flght_table_block__item__info__flght_price">5000p</div>
                    <!-- /.flght_table_block__item__info__flght_price -->
                </div>
                <!-- /.flght_table_block__item__info -->
                <div class="flght_table_block__item__edit">
                    <button class="flght_table_block__item__edit_btn" id="flight_edit_btn_1" aria-label="flight_edit_btn_1">
                        <i class="fas fa-pencil-alt"></i>
                    </button> 
                    <!-- /.flght_table_block__item__edit_btn -->
                </div>
                <!-- /.flght_table_block__item__edit -->
                <div class="flght_table_block__item__delete">
                    <button class="flght_table_block__item__delete_btn" id="flight_delete_btn_1" aria-label="flight_delete_btn_1">
                        <i class="fas fa-backspace"></i>
                    </button> 
                    <!-- /.flght_table_block__item__delete_btn -->
                </div>
                <!-- /.flght_table_block__item__delete -->
            </li>
            <!-- /.flght_table_block__item -->
            <li class="flght_table_block__item">
                <div class="flght_table_block__item__number_row">1</div>
                <!-- /.flght_table_block__item__number_row -->
                <div class="flght_table_block__item__info">
                    <div class="flght_table_block__item__info__flight_number">RA_GFBF</div>
                    <!-- /.flght_table_block__item__info__flight_number -->
                    <div class="flght_table_block__item__info__flight_plan">
                        <div class="flght_table_block__item__info__flight_plan__start">
                            <div class="flght_table_block__item__info__flight_plan__start__city">Екатеринбург</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__city -->
                            <div class="flght_table_block__item__info__flight_plan__start__iata_code">(SVX)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__start -->

                        <div class="flght_table_block__item__info__flight_plan__travel_time">
                            02:30
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__travel_time -->

                        <div class="flght_table_block__item__info__flight_plan__end">
                            <div class="flght_table_block__item__info__flight_plan__end__city">МоскваМоскваМоскваМоскваМоскваМоскваМоскваМосква</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__city -->
                            <div class="flght_table_block__item__info__flight_plan__end__iata_code">(DME)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__end -->
                    </div>
                    <!-- /.flght_table_block__item__info__flight_plan -->
                    <div class="flght_table_block__item__info__flght_price">5000p</div>
                    <!-- /.flght_table_block__item__info__flght_price -->
                </div>
                <!-- /.flght_table_block__item__info -->
                <div class="flght_table_block__item__edit">
                    <button class="flght_table_block__item__edit_btn" id="flight_edit_btn_1" aria-label="flight_edit_btn_1">
                        <i class="fas fa-pencil-alt"></i>
                    </button> 
                    <!-- /.flght_table_block__item__edit_btn -->
                </div>
                <!-- /.flght_table_block__item__edit -->
                <div class="flght_table_block__item__delete">
                    <button class="flght_table_block__item__delete_btn" id="flight_delete_btn_1" aria-label="flight_delete_btn_1">
                        <i class="fas fa-backspace"></i>
                    </button> 
                    <!-- /.flght_table_block__item__delete_btn -->
                </div>
                <!-- /.flght_table_block__item__delete -->
            </li>
            <!-- /.flght_table_block__item -->
            <li class="flght_table_block__item">
                <div class="flght_table_block__item__number_row">1</div>
                <!-- /.flght_table_block__item__number_row -->
                <div class="flght_table_block__item__info">
                    <div class="flght_table_block__item__info__flight_number">RA_GFBF</div>
                    <!-- /.flght_table_block__item__info__flight_number -->
                    <div class="flght_table_block__item__info__flight_plan">
                        <div class="flght_table_block__item__info__flight_plan__start">
                            <div class="flght_table_block__item__info__flight_plan__start__city">Екатеринбург</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__city -->
                            <div class="flght_table_block__item__info__flight_plan__start__iata_code">(SVX)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__start -->

                        <div class="flght_table_block__item__info__flight_plan__travel_time">
                            02:30
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__travel_time -->

                        <div class="flght_table_block__item__info__flight_plan__end">
                            <div class="flght_table_block__item__info__flight_plan__end__city">МоскваМоскваМоскваМоскваМоскваМоскваМоскваМосква</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__city -->
                            <div class="flght_table_block__item__info__flight_plan__end__iata_code">(DME)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__end -->
                    </div>
                    <!-- /.flght_table_block__item__info__flight_plan -->
                    <div class="flght_table_block__item__info__flght_price">5000p</div>
                    <!-- /.flght_table_block__item__info__flght_price -->
                </div>
                <!-- /.flght_table_block__item__info -->
                <div class="flght_table_block__item__edit">
                    <button class="flght_table_block__item__edit_btn" id="flight_edit_btn_1" aria-label="flight_edit_btn_1">
                        <i class="fas fa-pencil-alt"></i>
                    </button> 
                    <!-- /.flght_table_block__item__edit_btn -->
                </div>
                <!-- /.flght_table_block__item__edit -->
                <div class="flght_table_block__item__delete">
                    <button class="flght_table_block__item__delete_btn" id="flight_delete_btn_1" aria-label="flight_delete_btn_1">
                        <i class="fas fa-backspace"></i>
                    </button> 
                    <!-- /.flght_table_block__item__delete_btn -->
                </div>
                <!-- /.flght_table_block__item__delete -->
            </li>
            <!-- /.flght_table_block__item -->
            <li class="flght_table_block__item">
                <div class="flght_table_block__item__number_row">1</div>
                <!-- /.flght_table_block__item__number_row -->
                <div class="flght_table_block__item__info">
                    <div class="flght_table_block__item__info__flight_number">RA_GFBF</div>
                    <!-- /.flght_table_block__item__info__flight_number -->
                    <div class="flght_table_block__item__info__flight_plan">
                        <div class="flght_table_block__item__info__flight_plan__start">
                            <div class="flght_table_block__item__info__flight_plan__start__city">Екатеринбург</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__city -->
                            <div class="flght_table_block__item__info__flight_plan__start__iata_code">(SVX)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__start -->

                        <div class="flght_table_block__item__info__flight_plan__travel_time">
                            02:30
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__travel_time -->

                        <div class="flght_table_block__item__info__flight_plan__end">
                            <div class="flght_table_block__item__info__flight_plan__end__city">МоскваМоскваМоскваМоскваМоскваМоскваМоскваМосква</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__city -->
                            <div class="flght_table_block__item__info__flight_plan__end__iata_code">(DME)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__end -->
                    </div>
                    <!-- /.flght_table_block__item__info__flight_plan -->
                    <div class="flght_table_block__item__info__flght_price">5000p</div>
                    <!-- /.flght_table_block__item__info__flght_price -->
                </div>
                <!-- /.flght_table_block__item__info -->
                <div class="flght_table_block__item__edit">
                    <button class="flght_table_block__item__edit_btn" id="flight_edit_btn_1" aria-label="flight_edit_btn_1">
                        <i class="fas fa-pencil-alt"></i>
                    </button> 
                    <!-- /.flght_table_block__item__edit_btn -->
                </div>
                <!-- /.flght_table_block__item__edit -->
                <div class="flght_table_block__item__delete">
                    <button class="flght_table_block__item__delete_btn" id="flight_delete_btn_1" aria-label="flight_delete_btn_1">
                        <i class="fas fa-backspace"></i>
                    </button> 
                    <!-- /.flght_table_block__item__delete_btn -->
                </div>
                <!-- /.flght_table_block__item__delete -->
            </li>
            <!-- /.flght_table_block__item -->
            <li class="flght_table_block__item">
                <div class="flght_table_block__item__number_row">1</div>
                <!-- /.flght_table_block__item__number_row -->
                <div class="flght_table_block__item__info">
                    <div class="flght_table_block__item__info__flight_number">RA_GFBF</div>
                    <!-- /.flght_table_block__item__info__flight_number -->
                    <div class="flght_table_block__item__info__flight_plan">
                        <div class="flght_table_block__item__info__flight_plan__start">
                            <div class="flght_table_block__item__info__flight_plan__start__city">Екатеринбург</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__city -->
                            <div class="flght_table_block__item__info__flight_plan__start__iata_code">(SVX)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__start -->

                        <div class="flght_table_block__item__info__flight_plan__travel_time">
                            02:30
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__travel_time -->

                        <div class="flght_table_block__item__info__flight_plan__end">
                            <div class="flght_table_block__item__info__flight_plan__end__city">МоскваМоскваМоскваМоскваМоскваМоскваМоскваМосква</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__city -->
                            <div class="flght_table_block__item__info__flight_plan__end__iata_code">(DME)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__end -->
                    </div>
                    <!-- /.flght_table_block__item__info__flight_plan -->
                    <div class="flght_table_block__item__info__flght_price">5000p</div>
                    <!-- /.flght_table_block__item__info__flght_price -->
                </div>
                <!-- /.flght_table_block__item__info -->
                <div class="flght_table_block__item__edit">
                    <button class="flght_table_block__item__edit_btn" id="flight_edit_btn_1" aria-label="flight_edit_btn_1">
                        <i class="fas fa-pencil-alt"></i>
                    </button> 
                    <!-- /.flght_table_block__item__edit_btn -->
                </div>
                <!-- /.flght_table_block__item__edit -->
                <div class="flght_table_block__item__delete">
                    <button class="flght_table_block__item__delete_btn" id="flight_delete_btn_1" aria-label="flight_delete_btn_1">
                        <i class="fas fa-backspace"></i>
                    </button> 
                    <!-- /.flght_table_block__item__delete_btn -->
                </div>
                <!-- /.flght_table_block__item__delete -->
            </li>
            <!-- /.flght_table_block__item -->
            <li class="flght_table_block__item">
                <div class="flght_table_block__item__number_row">1</div>
                <!-- /.flght_table_block__item__number_row -->
                <div class="flght_table_block__item__info">
                    <div class="flght_table_block__item__info__flight_number">RA_GFBF</div>
                    <!-- /.flght_table_block__item__info__flight_number -->
                    <div class="flght_table_block__item__info__flight_plan">
                        <div class="flght_table_block__item__info__flight_plan__start">
                            <div class="flght_table_block__item__info__flight_plan__start__city">Екатеринбург</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__city -->
                            <div class="flght_table_block__item__info__flight_plan__start__iata_code">(SVX)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__start -->

                        <div class="flght_table_block__item__info__flight_plan__travel_time">
                            02:30
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__travel_time -->

                        <div class="flght_table_block__item__info__flight_plan__end">
                            <div class="flght_table_block__item__info__flight_plan__end__city">МоскваМоскваМоскваМоскваМоскваМоскваМоскваМосква</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__city -->
                            <div class="flght_table_block__item__info__flight_plan__end__iata_code">(DME)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__end -->
                    </div>
                    <!-- /.flght_table_block__item__info__flight_plan -->
                    <div class="flght_table_block__item__info__flght_price">5000p</div>
                    <!-- /.flght_table_block__item__info__flght_price -->
                </div>
                <!-- /.flght_table_block__item__info -->
                <div class="flght_table_block__item__edit">
                    <button class="flght_table_block__item__edit_btn" id="flight_edit_btn_1" aria-label="flight_edit_btn_1">
                        <i class="fas fa-pencil-alt"></i>
                    </button> 
                    <!-- /.flght_table_block__item__edit_btn -->
                </div>
                <!-- /.flght_table_block__item__edit -->
                <div class="flght_table_block__item__delete">
                    <button class="flght_table_block__item__delete_btn" id="flight_delete_btn_1" aria-label="flight_delete_btn_1">
                        <i class="fas fa-backspace"></i>
                    </button> 
                    <!-- /.flght_table_block__item__delete_btn -->
                </div>
                <!-- /.flght_table_block__item__delete -->
            </li>
            <!-- /.flght_table_block__item -->
            <li class="flght_table_block__item">
                <div class="flght_table_block__item__number_row">1</div>
                <!-- /.flght_table_block__item__number_row -->
                <div class="flght_table_block__item__info">
                    <div class="flght_table_block__item__info__flight_number">RA_GFBF</div>
                    <!-- /.flght_table_block__item__info__flight_number -->
                    <div class="flght_table_block__item__info__flight_plan">
                        <div class="flght_table_block__item__info__flight_plan__start">
                            <div class="flght_table_block__item__info__flight_plan__start__city">Екатеринбург</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__city -->
                            <div class="flght_table_block__item__info__flight_plan__start__iata_code">(SVX)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__start -->

                        <div class="flght_table_block__item__info__flight_plan__travel_time">
                            02:30
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__travel_time -->

                        <div class="flght_table_block__item__info__flight_plan__end">
                            <div class="flght_table_block__item__info__flight_plan__end__city">МоскваМоскваМоскваМоскваМоскваМоскваМоскваМосква</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__city -->
                            <div class="flght_table_block__item__info__flight_plan__end__iata_code">(DME)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__end -->
                    </div>
                    <!-- /.flght_table_block__item__info__flight_plan -->
                    <div class="flght_table_block__item__info__flght_price">5000p</div>
                    <!-- /.flght_table_block__item__info__flght_price -->
                </div>
                <!-- /.flght_table_block__item__info -->
                <div class="flght_table_block__item__edit">
                    <button class="flght_table_block__item__edit_btn" id="flight_edit_btn_1" aria-label="flight_edit_btn_1">
                        <i class="fas fa-pencil-alt"></i>
                    </button> 
                    <!-- /.flght_table_block__item__edit_btn -->
                </div>
                <!-- /.flght_table_block__item__edit -->
                <div class="flght_table_block__item__delete">
                    <button class="flght_table_block__item__delete_btn" id="flight_delete_btn_1" aria-label="flight_delete_btn_1">
                        <i class="fas fa-backspace"></i>
                    </button> 
                    <!-- /.flght_table_block__item__delete_btn -->
                </div>
                <!-- /.flght_table_block__item__delete -->
            </li>
            <!-- /.flght_table_block__item -->
            <li class="flght_table_block__item">
                <div class="flght_table_block__item__number_row">1</div>
                <!-- /.flght_table_block__item__number_row -->
                <div class="flght_table_block__item__info">
                    <div class="flght_table_block__item__info__flight_number">RA_GFBF</div>
                    <!-- /.flght_table_block__item__info__flight_number -->
                    <div class="flght_table_block__item__info__flight_plan">
                        <div class="flght_table_block__item__info__flight_plan__start">
                            <div class="flght_table_block__item__info__flight_plan__start__city">Екатеринбург</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__city -->
                            <div class="flght_table_block__item__info__flight_plan__start__iata_code">(SVX)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__start -->

                        <div class="flght_table_block__item__info__flight_plan__travel_time">
                            02:30
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__travel_time -->

                        <div class="flght_table_block__item__info__flight_plan__end">
                            <div class="flght_table_block__item__info__flight_plan__end__city">МоскваМоскваМоскваМоскваМоскваМоскваМоскваМосква</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__city -->
                            <div class="flght_table_block__item__info__flight_plan__end__iata_code">(DME)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__end -->
                    </div>
                    <!-- /.flght_table_block__item__info__flight_plan -->
                    <div class="flght_table_block__item__info__flght_price">5000p</div>
                    <!-- /.flght_table_block__item__info__flght_price -->
                </div>
                <!-- /.flght_table_block__item__info -->
                <div class="flght_table_block__item__edit">
                    <button class="flght_table_block__item__edit_btn" id="flight_edit_btn_1" aria-label="flight_edit_btn_1">
                        <i class="fas fa-pencil-alt"></i>
                    </button> 
                    <!-- /.flght_table_block__item__edit_btn -->
                </div>
                <!-- /.flght_table_block__item__edit -->
                <div class="flght_table_block__item__delete">
                    <button class="flght_table_block__item__delete_btn" id="flight_delete_btn_1" aria-label="flight_delete_btn_1">
                        <i class="fas fa-backspace"></i>
                    </button> 
                    <!-- /.flght_table_block__item__delete_btn -->
                </div>
                <!-- /.flght_table_block__item__delete -->
            </li>
            <!-- /.flght_table_block__item -->
            <li class="flght_table_block__item">
                <div class="flght_table_block__item__number_row">1</div>
                <!-- /.flght_table_block__item__number_row -->
                <div class="flght_table_block__item__info">
                    <div class="flght_table_block__item__info__flight_number">RA_GFBF</div>
                    <!-- /.flght_table_block__item__info__flight_number -->
                    <div class="flght_table_block__item__info__flight_plan">
                        <div class="flght_table_block__item__info__flight_plan__start">
                            <div class="flght_table_block__item__info__flight_plan__start__city">Екатеринбург</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__city -->
                            <div class="flght_table_block__item__info__flight_plan__start__iata_code">(SVX)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__start -->

                        <div class="flght_table_block__item__info__flight_plan__travel_time">
                            02:30
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__travel_time -->

                        <div class="flght_table_block__item__info__flight_plan__end">
                            <div class="flght_table_block__item__info__flight_plan__end__city">МоскваМоскваМоскваМоскваМоскваМоскваМоскваМосква</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__city -->
                            <div class="flght_table_block__item__info__flight_plan__end__iata_code">(DME)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__end -->
                    </div>
                    <!-- /.flght_table_block__item__info__flight_plan -->
                    <div class="flght_table_block__item__info__flght_price">5000p</div>
                    <!-- /.flght_table_block__item__info__flght_price -->
                </div>
                <!-- /.flght_table_block__item__info -->
                <div class="flght_table_block__item__edit">
                    <button class="flght_table_block__item__edit_btn" id="flight_edit_btn_1" aria-label="flight_edit_btn_1">
                        <i class="fas fa-pencil-alt"></i>
                    </button> 
                    <!-- /.flght_table_block__item__edit_btn -->
                </div>
                <!-- /.flght_table_block__item__edit -->
                <div class="flght_table_block__item__delete">
                    <button class="flght_table_block__item__delete_btn" id="flight_delete_btn_1" aria-label="flight_delete_btn_1">
                        <i class="fas fa-backspace"></i>
                    </button> 
                    <!-- /.flght_table_block__item__delete_btn -->
                </div>
                <!-- /.flght_table_block__item__delete -->
            </li>
            <!-- /.flght_table_block__item -->
            <li class="flght_table_block__item">
                <div class="flght_table_block__item__number_row">1</div>
                <!-- /.flght_table_block__item__number_row -->
                <div class="flght_table_block__item__info">
                    <div class="flght_table_block__item__info__flight_number">RA_GFBF</div>
                    <!-- /.flght_table_block__item__info__flight_number -->
                    <div class="flght_table_block__item__info__flight_plan">
                        <div class="flght_table_block__item__info__flight_plan__start">
                            <div class="flght_table_block__item__info__flight_plan__start__city">Екатеринбург</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__city -->
                            <div class="flght_table_block__item__info__flight_plan__start__iata_code">(SVX)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__start -->

                        <div class="flght_table_block__item__info__flight_plan__travel_time">
                            02:30
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__travel_time -->

                        <div class="flght_table_block__item__info__flight_plan__end">
                            <div class="flght_table_block__item__info__flight_plan__end__city">МоскваМоскваМоскваМоскваМоскваМоскваМоскваМосква</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__city -->
                            <div class="flght_table_block__item__info__flight_plan__end__iata_code">(DME)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__end -->
                    </div>
                    <!-- /.flght_table_block__item__info__flight_plan -->
                    <div class="flght_table_block__item__info__flght_price">5000p</div>
                    <!-- /.flght_table_block__item__info__flght_price -->
                </div>
                <!-- /.flght_table_block__item__info -->
                <div class="flght_table_block__item__edit">
                    <button class="flght_table_block__item__edit_btn" id="flight_edit_btn_1" aria-label="flight_edit_btn_1">
                        <i class="fas fa-pencil-alt"></i>
                    </button> 
                    <!-- /.flght_table_block__item__edit_btn -->
                </div>
                <!-- /.flght_table_block__item__edit -->
                <div class="flght_table_block__item__delete">
                    <button class="flght_table_block__item__delete_btn" id="flight_delete_btn_1" aria-label="flight_delete_btn_1">
                        <i class="fas fa-backspace"></i>
                    </button> 
                    <!-- /.flght_table_block__item__delete_btn -->
                </div>
                <!-- /.flght_table_block__item__delete -->
            </li>
            <!-- /.flght_table_block__item -->
            <li class="flght_table_block__item">
                <div class="flght_table_block__item__number_row">1</div>
                <!-- /.flght_table_block__item__number_row -->
                <div class="flght_table_block__item__info">
                    <div class="flght_table_block__item__info__flight_number">RA_GFBF</div>
                    <!-- /.flght_table_block__item__info__flight_number -->
                    <div class="flght_table_block__item__info__flight_plan">
                        <div class="flght_table_block__item__info__flight_plan__start">
                            <div class="flght_table_block__item__info__flight_plan__start__city">Екатеринбург</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__city -->
                            <div class="flght_table_block__item__info__flight_plan__start__iata_code">(SVX)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__start__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__start -->

                        <div class="flght_table_block__item__info__flight_plan__travel_time">
                            02:30
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__travel_time -->

                        <div class="flght_table_block__item__info__flight_plan__end">
                            <div class="flght_table_block__item__info__flight_plan__end__city">МоскваМоскваМоскваМоскваМоскваМоскваМоскваМосква</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__city -->
                            <div class="flght_table_block__item__info__flight_plan__end__iata_code">(DME)</div>
                            <!-- /.flght_table_block__item__info__flight_plan__end__iata_code -->
                        </div>
                        <!-- /.flght_table_block__item__info__flight_plan__end -->
                    </div>
                    <!-- /.flght_table_block__item__info__flight_plan -->
                    <div class="flght_table_block__item__info__flght_price">5000p</div>
                    <!-- /.flght_table_block__item__info__flght_price -->
                </div>
                <!-- /.flght_table_block__item__info -->
                <div class="flght_table_block__item__edit">
                    <button class="flght_table_block__item__edit_btn" id="flight_edit_btn_1" aria-label="flight_edit_btn_1">
                        <i class="fas fa-pencil-alt"></i>
                    </button> 
                    <!-- /.flght_table_block__item__edit_btn -->
                </div>
                <!-- /.flght_table_block__item__edit -->
                <div class="flght_table_block__item__delete">
                    <button class="flght_table_block__item__delete_btn" id="flight_delete_btn_1" aria-label="flight_delete_btn_1">
                        <i class="fas fa-backspace"></i>
                    </button> 
                    <!-- /.flght_table_block__item__delete_btn -->
                </div>
                <!-- /.flght_table_block__item__delete -->
            </li>
            <!-- /.flght_table_block__item -->
        </ul>
        <!-- /.flght_table_block -->
    </div>
    <!-- /.flight_info_block -->
    
    <div class="flight_forms_block">
        <form action="" method="post" class="flight_form">
            @csrf
            <h2>Форма добавления, редактирования рейсов</h2>
            <div class="flight_form__inputs">
                <div class="flight_form__inputs__row">
                    <div class="input_block">
                        <label for="airport_start">Аэропорт старта:</label>
                        <input type="text" class="sm_input" name="airport_start" id="airport_start" placeholder="Выберите аэропорт взлета">
                    </div>
                    <!-- /.inputs_block -->
                    <div class="input_block">
                        <label for="airport_end">Аэропорт прибытия:</label>
                        <input type="text" class="sm_input" name="airport_end" id="airport_end" placeholder="Выберите аэропорт прибытия">
                    </div>
                    <!-- /.inputs_block -->
                </div>
                <!-- /.flight_form__inputs__row -->
                <div class="flight_form__inputs__row">
                    <div class="input_block">
                        <label for="date_start">Дата старт:</label>
                        <input type="date" class="sm_input" name="date_start" id="date_start" placeholder="Выберите дату взлета">
                    </div>
                    <!-- /.inputs_block -->
                    <div class="input_block">
                        <label for="date_end">Дата прибытия:</label>
                        <input type="date" class="sm_input" name="date_end" id="date_end" placeholder="Выберите дату прибытия">
                    </div>
                    <!-- /.inputs_block -->
                </div>
                <!-- /.flight_form__inputs__row -->
                <div class="flight_form__inputs__row">
                    <div class="input_block">
                        <label for="time_start">Время взлета:</label>
                        <input type="text" class="sm_input" name="time_start" id="time_start" placeholder="Выберите время взлета">
                    </div>
                    <!-- /.inputs_block -->
                    <div class="input_block">
                        <label for="time_end">Время приземления:</label>
                        <input type="text" class="sm_input" name="time_end" id="time_end" placeholder="Выберите время приземления">
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
        </form>
    </div>
    <!-- /.flight_forms_block -->
</div>
<!-- /.flight_info -->
<button class="btn_scroll_top" id="btn_scroll_top">
    <i class="fas fa-arrow-up"></i>
</button> 
<!-- /#btn_add_flight.btn_add_flight -->
@endsection
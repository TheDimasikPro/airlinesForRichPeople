<aside class="aside__block">
    <h2>Ваш заказ</h2>

    <div class="aside__block__info">
        @if ($fligth_status == "one_way")
            <div class="aside__block__info__ticket select_ticket_from">
                <h3>Вылет из:</h3>
                <div class="aside__block__info__ticket__info">
                    <div class="aside__block__info__ticket__info__city_info">
                        <div class="aside__block__info__ticket__info__city_info__from">
                            @if ($flight_list[0]["airport_start"]["city_rus"] == null)
                                <p class="from_city_name">{{ $flight_list[0]["airport_start"]["city_eng"] }}</p>
                                <!-- /.from_city_name -->
                            @else
                                <p class="from_city_name">{{ $flight_list[0]["airport_start"]["city_rus"] }}</p>
                                <!-- /.from_city_name -->
                            @endif
                                <p class="from_airport_name">({{ $flight_list[0]["airport_start"]["iata_code"] }})</p>
                                <!-- /.from_airport_name -->
                        </div>
                        <!-- /.aside__block__info__ticket__info__city_info__from -->
                        <div class="sing_flight">
                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </div>
                        <div class="aside__block__info__ticket__info__city_info__to">
                            @if ($flight_list[0]["airport_start"]["city_rus"] == null)
                                <p class="to_city_name">{{ $flight_list[0]["airport_end"]["city_eng"] }}</p>
                                <!-- /.to_city_name -->
                            @else
                                <p class="to_city_name">{{ $flight_list[0]["airport_end"]["city_rus"] }}</p>
                                <!-- /.to_city_name -->
                            @endif
                                <p class="to_airport_name">({{ $flight_list[0]["airport_end"]["iata_code"] }})</p>
                                <!-- /.to_airport_name -->
                        </div>
                        <!-- /.aside__block__info__ticket__info__city_info__to -->
                    </div>
                    <div class="aside__block__info__ticket__info__select_ticket_from">
                        <div class="row_select_ticket_from non_view__select_ticket_form">
                            <p class="select_ticket_from__date non_view__select_ticket_form">{{ \Jenssegers\Date\Date::parse($flight_list[0]["date_start"])->format('j F Y') }}</p>
                            <!-- /.select_ticket_from__date -->
                            <p class="select_ticket_from__time non_view__select_ticket_form">
                                <span class="select_ticket_from__time_start"></span> 
                                <!-- /.select_ticket_from__time_start -->  
                                <i class="fas fa-arrow-right" aria-hidden="true"></i>
                                <span class="select_ticket_from__time_end"></span> 
                                <!-- /.select_ticket_from__time_end -->
                            </p>
                            <!-- /.select_ticket_from__time -->
                        </div>
                        <!-- /.row_select_ticket_from -->
                        <div class="row_select_ticket_from non_view__select_ticket_form">
                            <p class="select_ticket_from__number_flight non_view__select_ticket_form upper"></p>
                            <!-- /.select_ticket_from__number_flight -->
                            <p class="name_model_air non_view__select_ticket_form">Airbus A320</p>
                            <!-- /.name_model_air -->
                        </div>
                        <!-- /.row_select_ticket_from -->
                    </div>
                    <!-- /.aside__block__info__ticket__info__select_ticket_from -->
                    <!-- /.aside__block__info__ticket__info__city_info -->
                </div>
                <!-- /.aside__block__info__ticket__info -->
            </div>
        @else
            
        @endif
        
        <!-- /.aside__block__info__ticket -->
        {{-- <div class="aside__block__info__ticket">
            <h3>Билет №2</h3>
        </div> --}}
        <!-- /.aside__block__info__ticket -->
        <div class="aside__block__info__all_price">
            <p>Итого к оплате: <span class="aside__block__info__all_price__text"></span></p>
        </div>
        <!-- /.aside__block__info__all_price -->
        {{-- <button class="btn_style_1 aside__block__info__btn" id="aside__block__info__btn" aria-label="aside__block__info__btn">Продолжить</button> 
        <!-- /.btn_style_1 aside__block__info__btn --> --}}


        <a href="{{ route('passenger_info__page') }}" class="btn_style_1 aside__block__info__btn" id="aside__block__info__btn" aria-label="aside__block__info__btn">Пассажиры</a> 
        <!-- /.btn_style_1 aside__block__info__btn -->
        {{-- <a href="{{ route('payment_tickets__page') }}" class="btn_style_1 aside__block__info__btn" id="aside__block__info__btn" aria-label="aside__block__info__btn">Продолжить</a>  --}}
        <!-- /.btn_style_1 aside__block__info__btn -->
    </div>
    <!-- /.aside__block__info -->
</aside>
<!-- /.aside_tickets -->
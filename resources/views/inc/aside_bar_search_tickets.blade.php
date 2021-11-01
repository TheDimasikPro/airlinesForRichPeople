<aside class="aside__block">
    <h2>Ваш заказ</h2>

    <div class="aside__block__info">
        <div class="aside__block__info__ticket select_ticket_from">
            <h3>Вылет из:</h3>
            <div class="aside__block__info__ticket__info">
                <div class="aside__block__info__ticket__info__city_info">
                    <div class="aside__block__info__ticket__info__city_info__from">
                        <p class="from_city_name">Екатеринбург</p>
                        <!-- /.from_city_name -->
                        <p class="from_airport_name">(SVX)</p>
                        <!-- /.from_airport_name -->
                        <div class="sing_flight">
                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </div>
                    </div>
                    <!-- /.aside__block__info__ticket__info__city_info__from -->
                    <div class="aside__block__info__ticket__info__city_info__to">
                        <p class="to_city_name">Москва</p>
                        <!-- /.to_city_name -->
                        <p class="to_airport_name">(DME)</p>
                        <!-- /.to_airport_name -->
                    </div>
                    <!-- /.aside__block__info__ticket__info__city_info__to -->
                </div>
                <div class="aside__block__info__ticket__info__select_ticket_from">
                    <div class="row_select_ticket_from">
                        <p class="select_ticket_from__date">30 октября пт</p>
                        <!-- /.select_ticket_from__date -->
                        <p class="select_ticket_from__time">06:30 <i class="fas fa-arrow-right" aria-hidden="true"></i> 07:00</p>
                        <!-- /.select_ticket_from__time -->
                    </div>
                    <!-- /.row_select_ticket_from -->
                    <div class="row_select_ticket_from">
                        <p class="select_ticket_from__number_flight">U6-264</p>
                        <!-- /.select_ticket_from__number_flight -->
                        <p class="name_model_air">Airbus A320</p>
                        <!-- /.name_model_air -->
                    </div>
                    <!-- /.row_select_ticket_from -->
                </div>
                <!-- /.aside__block__info__ticket__info__select_ticket_from -->
                <!-- /.aside__block__info__ticket__info__city_info -->
            </div>
            <!-- /.aside__block__info__ticket__info -->
        </div>
        <!-- /.aside__block__info__ticket -->
        {{-- <div class="aside__block__info__ticket">
            <h3>Билет №2</h3>
        </div> --}}
        <!-- /.aside__block__info__ticket -->
        <div class="aside__block__info__all_price">
            <p>Итого к оплате: <span class="aside__block__info__all_price__text">5000р</span></p>
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
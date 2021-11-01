@extends('layouts.app_layout')
@section('title_page','Рузльтаты поиска билетов')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/style.min.css">
    <link rel="stylesheet" href="/assets/css/chief-slider.min.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
@endsection
@section('content')
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
    <!-- /.my_order__block_mobile -->
    <div class="container desktop_section">
      <div class="search_tickets__block df_jcspb_aic">
        @include('inc.aside_bar_search_tickets')
        <!-- /.aside__block -->
        <div class="flight_block__info">
          <div class="flight_from_block">
            <!-- Разметка первой карусели -->
            <h2>Вылет из г. Екатеринубрг</h2>

            <div class="owl-carousel slide-one owl-theme owl-loaded">
              <div class="carousel__item">
                <div class="carousel__item__day_of_week upper">сб</div>
                <!-- /.carousel__item__day_of_week -->
                <div class="carousel__item__date">
                  <div class="carousel__item__date__number">30</div>
                  <!-- /.carousel__item__date__number -->
                  <div class="carousel__item__date__text">октября</div>
                  <!-- /.carousel__item__date__text -->
                </div>
                <!-- /.carousel__item__date -->
                <div class="carousel__item__min_price">от 5000р</div>
                <!-- /.carousel__item__min_price -->
              </div>
              <!-- /.carousel__item -->
            </div>
            <div class="result_price__flight_to">
              <h2>Варианты вылета в этот день(в день который выбрал пользователь)</h2>
              <div class="result_price__flight_to__cards">
                <div class="result_price__flight_to__cards__item" id="result_price__flight_to__cards__item__1">
                  <div class="result_price__flight_to__cards__item__short_info df_jcspb_aic">
                    <div class="result_price__flight_to__cards__item__short_info__card">
                      <div class="result_price__flight_to__cards__item__short_info__card__city df_jcspb_aic">
                        <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info">
                          <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info__name">Екатеринбург(SVX)</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__from_short_info__name -->
                          <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info__time">06:30</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__from_short_info__time -->
                          <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info__number_flight upper">U6-264</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__from_short_info__number_flight -->
                        </div>
                        <!-- /.result_price__flight_to__cards__item__short_info__card__city__form_short_info -->
                        <div class="result_price__flight_to__cards__item__short_info__card__city__flight_time_short_info">2 часа 30 минут</div>
                        <!-- /.result_price__flight_to__cards__item__short_info__card__city__flight_time_short_info -->
                        
                        <div class="result_price__flight_to__cards__item__short_info__card__city__to_short_info">
                          <div class="result_price__flight_to__cards__item__short_info__card__city__to_short_info__name">Москва(DME)</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__to_short_info__name -->
                          <div class="result_price__flight_to__cards__item__short_info__card__city__to_short_info__time">07:00</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__to_short_info__time -->
                        </div>
                        <!-- /.result_price__flight_to__cards__item__short_info__card__city__to_short_info -->
                      </div>
                      <!-- /.result_price__flight_to__cards__item__short_info__card__city -->
                    </div>
                    <!-- /.result_price__flight_to__cards__item__short_info__card -->
                    <div class="result_price__flight_to__cards__item__short_info__price">
                      <span class="result_price__flight_to__cards__item__short_info__price__text">от 5000р</span> 
                      <!-- /.result_price__flight_to__cards__item__short_info__price__text -->
                      <button class="result_price__flight_to__cards__item__short_info__price__in_basket btn_style_1" 
                      id="result_flight_to_in_basket" aria-label="result_flight_to_in_basket" data-id-item="result_price__flight_to__cards__item__1">Выбрать</button> <!-- /#result_flight_from_in_basket.result_price__flight_to__cards__item__short_info__price__in_basket btn_style_1 -->
                    </div>
                    <!-- /.result_price__flight_to__cards__item__price -->
                  </div>
                  <!-- /.result_price__flight_to__cards__item__short_info -->
                </div>
                <!-- /.result_price__flight_to__cards__item -->
                <div class="result_price__flight_to__cards__item not_select_result_price__flight_to__cards__item" id="result_price__flight_to__cards__item__2">
                  <div class="result_price__flight_to__cards__item__short_info df_jcspb_aic">
                    <div class="result_price__flight_to__cards__item__short_info__card">
                      <div class="result_price__flight_to__cards__item__short_info__card__city df_jcspb_aic">
                        <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info">
                          <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info__name">Екатеринбург(SVX)</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__from_short_info__name -->
                          <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info__time">06:30</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__from_short_info__time -->
                          <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info__number_flight upper">U6-264</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__from_short_info__number_flight -->
                        </div>
                        <!-- /.result_price__flight_to__cards__item__short_info__card__city__form_short_info -->
                        <div class="result_price__flight_to__cards__item__short_info__card__city__flight_time_short_info">2 часа 30 минут</div>
                        <!-- /.result_price__flight_to__cards__item__short_info__card__city__flight_time_short_info -->
                        
                        <div class="result_price__flight_to__cards__item__short_info__card__city__to_short_info">
                          <div class="result_price__flight_to__cards__item__short_info__card__city__to_short_info__name">Москва(DME)</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__to_short_info__name -->
                          <div class="result_price__flight_to__cards__item__short_info__card__city__to_short_info__time">07:00</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__to_short_info__time -->
                        </div>
                        <!-- /.result_price__flight_to__cards__item__short_info__card__city__to_short_info -->
                      </div>
                      <!-- /.result_price__flight_to__cards__item__short_info__card__city -->
                    </div>
                    <!-- /.result_price__flight_to__cards__item__short_info__card -->
                    <div class="result_price__flight_to__cards__item__short_info__price">
                      <span class="result_price__flight_to__cards__item__short_info__price__text">от 5000р</span> 
                      <!-- /.result_price__flight_to__cards__item__short_info__price__text -->
                      <button class="result_price__flight_to__cards__item__short_info__price__in_basket non_view btn_style_1" 
                      id="result_flight_to_in_basket" aria-label="result_flight_to_in_basket" data-id-item="result_price__flight_to__cards__item__2">Выбрать</button> 
                      <!-- /#result_flight_from_in_basket.result_price__flight_to__cards__item__short_info__price__in_basket btn_style_1 -->
                    </div>
                    <!-- /.result_price__flight_to__cards__item__price -->
                  </div>
                  <!-- /.result_price__flight_to__cards__item__short_info -->
                </div>
                <!-- /.result_price__flight_to__cards__item -->
              </div>
              <!-- /.result_price__flight_to__cards -->
            </div>
            <!-- /.result_price__flight_to -->
          </div>
          <!-- /.flight_from_block -->
          <div class="flight_from_to">
            <h2>Вылет из г. Москва</h2>
            <div class="owl-carousel slide-two owl-theme owl-loaded">
              <div class="carousel__item">
                <div class="carousel__item__day_of_week upper">сб</div>
                <!-- /.carousel__item__day_of_week -->
                <div class="carousel__item__date">
                  <div class="carousel__item__date__number">30</div>
                  <!-- /.carousel__item__date__number -->
                  <div class="carousel__item__date__text">октября</div>
                  <!-- /.carousel__item__date__text -->
                </div>
                <!-- /.carousel__item__date -->
                <div class="carousel__item__min_price">от 5000р</div>
                <!-- /.carousel__item__min_price -->
              </div>
              <!-- /.carousel__item -->
            </div>
            <div class="result_price__flight_to">
              <h2>Варианты вылета в этот день (в день который выбрал пользователь)</h2>
              <div class="result_price__flight_to__cards">
                <div class="result_price__flight_from__cards__item" id="result_price__flight_from__cards__item__1">
                  <div class="result_price__flight_to__cards__item__short_info df_jcspb_aic">
                    <div class="result_price__flight_to__cards__item__short_info__card">
                      <div class="result_price__flight_to__cards__item__short_info__card__city df_jcspb_aic">
                        <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info">
                          <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info__name">Екатеринбург(SVX)</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__from_short_info__name -->
                          <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info__time">06:30</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__from_short_info__time -->
                          <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info__number_flight upper">U6-264</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__from_short_info__number_flight -->
                        </div>
                        <!-- /.result_price__flight_to__cards__item__short_info__card__city__form_short_info -->
                        <div class="result_price__flight_to__cards__item__short_info__card__city__flight_time_short_info">2 часа 30 минут</div>
                        <!-- /.result_price__flight_to__cards__item__short_info__card__city__flight_time_short_info -->
                        
                        <div class="result_price__flight_to__cards__item__short_info__card__city__to_short_info">
                          <div class="result_price__flight_to__cards__item__short_info__card__city__to_short_info__name">Москва(DME)</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__to_short_info__name -->
                          <div class="result_price__flight_to__cards__item__short_info__card__city__to_short_info__time">07:00</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__to_short_info__time -->
                        </div>
                        <!-- /.result_price__flight_to__cards__item__short_info__card__city__to_short_info -->
                      </div>
                      <!-- /.result_price__flight_to__cards__item__short_info__card__city -->
                    </div>
                    <!-- /.result_price__flight_to__cards__item__short_info__card -->
                    <div class="result_price__flight_to__cards__item__short_info__price">
                      <span class="result_price__flight_to__cards__item__short_info__price__text">от 5000р</span> 
                      <!-- /.result_price__flight_to__cards__item__short_info__price__text -->
                      <button class="result_price__flight_from__cards__item__short_info__price__in_basket btn_style_1" 
                      id="result_flight_from_in_basket" aria-label="result_flight_to_in_basket" data-id-item="result_price__flight_from__cards__item__1">Выбрать</button> 
                      <!-- /#result_flight_from_in_basket.result_price__flight_from__cards__item__short_info__price__in_basket btn_style_1 -->
                    </div>
                    <!-- /.result_price__flight_to__cards__item__price -->
                  </div>
                  <!-- /.result_price__flight_to__cards__item__short_info -->
                </div>
                <!-- /.result_price__flight_from__cards__item -->
                <div class="result_price__flight_from__cards__item not_select_result_price__flight_from__cards__item" id="result_price__flight_from__cards__item__2">
                  <div class="result_price__flight_to__cards__item__short_info df_jcspb_aic">
                    <div class="result_price__flight_to__cards__item__short_info__card">
                      <div class="result_price__flight_to__cards__item__short_info__card__city df_jcspb_aic">
                        <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info">
                          <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info__name">Екатеринбург(SVX)</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__from_short_info__name -->
                          <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info__time">06:30</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__from_short_info__time -->
                          <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info__number_flight upper">U6-264</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__from_short_info__number_flight -->
                        </div>
                        <!-- /.result_price__flight_to__cards__item__short_info__card__city__form_short_info -->
                        <div class="result_price__flight_to__cards__item__short_info__card__city__flight_time_short_info">2 часа 30 минут</div>
                        <!-- /.result_price__flight_to__cards__item__short_info__card__city__flight_time_short_info -->
                        
                        <div class="result_price__flight_to__cards__item__short_info__card__city__to_short_info">
                          <div class="result_price__flight_to__cards__item__short_info__card__city__to_short_info__name">Москва(DME)</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__to_short_info__name -->
                          <div class="result_price__flight_to__cards__item__short_info__card__city__to_short_info__time">07:00</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__to_short_info__time -->
                        </div>
                        <!-- /.result_price__flight_to__cards__item__short_info__card__city__to_short_info -->
                      </div>
                      <!-- /.result_price__flight_to__cards__item__short_info__card__city -->
                    </div>
                    <!-- /.result_price__flight_to__cards__item__short_info__card -->
                    <div class="result_price__flight_to__cards__item__short_info__price">
                      <span class="result_price__flight_to__cards__item__short_info__price__text">от 5000р</span> 
                      <!-- /.result_price__flight_to__cards__item__short_info__price__text -->
                      <button class="result_price__flight_from__cards__item__short_info__price__in_basket non_view btn_style_1" 
                      id="result_flight_from_in_basket" aria-label="result_flight_to_in_basket" data-id-item="result_price__flight_from__cards__item__2">Выбрать</button> 
                      <!-- /#result_flight_from_in_basket.result_price__flight_from__cards__item__short_info__price__in_basket btn_style_1 -->
                    </div>
                    <!-- /.result_price__flight_to__cards__item__price -->
                  </div>
                  <!-- /.result_price__flight_to__cards__item__short_info -->
                </div>
                <!-- /.result_price__flight_from__cards__item -->
              </div>
              <!-- /.result_price__flight_to__cards -->
            </div>
            <!-- /.result_price__flight_to -->
          </div>
          <!-- /.flight_from_to -->
        </div>
        <!-- /.flight_block__info -->
      </div>
      <!-- /.search_tickets__block -->
    </div>
    <!-- /.container -->
@endsection
@section('slider_script')
<script src="/assets/js/owl.carousel.min.js"></script>
<script src="/assets/js/search_ticket_page.js"></script>
@endsection
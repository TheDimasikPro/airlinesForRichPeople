@extends('layouts.app_layout')
@section('title_page','Результаты поиска билетов')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/style.min.css">
    <link rel="stylesheet" href="/assets/css/chief-slider.min.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
@endsection
@section('content')
@php( Date::setLocale('ru'))
  <div class="preloader">
    <div class="preloader__row">
      <div class="preloader__item"></div>
      <div class="preloader__item"></div>
    </div>
  </div>
  <div class="popup_fade non_view desktop_section"></div>
  <div class="popup_modal non_view desktop_section">
    <div class="popup">
      <button class="btn_popup_close" id="btn_popup_close" aria-label="btn_popup_close">Закрыть</button>
      <div class="popup_order_block">
        <h2>Ваш заказ</h2>
        <div class="popup_order_block__info">
          @if ($fligth_status == "both_sides")
            <div class="popup_order_block__info__from">
              <h3>Вылет туда:</h3>
              <div class="popup_order_block__info__from__city df_jcspb_aic">
                <div class="popup_order_block__info__city__from">
                  @if ($flight_list[0]["airport_start"]["city_rus"] == null)
                    {{ $flight_list[0]["airport_start"]["city_eng"] }}
                  @else
                    {{ $flight_list[0]["airport_start"]["city_rus"] }}
                  @endif
                  <span class="airport_name__from">({{ $flight_list[0]["airport_start"]->iata_code }})</span> 
                  <!-- /.airport_name__from -->
                </div>
                <i class="fas fa-arrow-right"></i>
                <!-- /.popup_order_block__info__city__from -->
                <div class="popup_order_block__info__city__to">
                  @if ($flight_list[0]["airport_end"]["city_rus"] == null)
                    {{ $flight_list[0]["airport_end"]["city_eng"] }}
                  @else
                    {{ $flight_list[0]["airport_end"]["city_rus"] }}
                  @endif
                  <span class="airport_name__to">({{ $flight_list[0]["airport_end"]->iata_code }})</span> 
                  <!-- /.airport_name__to -->
                </div>
                <!-- /.popup_order_block__info__city__to -->
              </div>
              <!-- /.popup_order_block__info__from__city -->
              <div class="popup_order_block__info__from__date_time df_jcspb_aic">
                <span class="details_time_from" id="deatils_start_from">
                  {{ \Jenssegers\Date\Date::parse($flight_list[0]["date_start"])->format('l') }} <br>
                  {{ \Jenssegers\Date\Date::parse($flight_list[0]["date_start"])->format('j F Y') }} <br>
                  {{-- 30 октября пт 06:30 --}}
                  <span class="deatils_start_from__time"></span>
                </span> 
                <!-- /.details_time_from -->
                <span class="details_time_to" id="deatils_start_to">
                  {{ \Jenssegers\Date\Date::parse($flight_list[0]["date_end"])->format('l') }} <br>
                  {{ \Jenssegers\Date\Date::parse($flight_list[0]["date_end"])->format('j F Y') }} <br>
                  <span class="deatils_start_to__time"></span>
                </span> 
                <!-- /.details_time_to -->
              </div>
              <!-- /.popup_order_block__info__from__date_time -->
              <div class="popup_order_block__info__from__details_air">
                <div class="popup_order_block__info__from__details_air__number_flight" id="deatils_start_number_flight"></div>
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
                  @if ($flight_back[0]["airport_start"]["city_rus"] == null)
                    {{ $flight_back[0]["airport_start"]["city_eng"] }}
                  @else
                    {{ $flight_back[0]["airport_start"]["city_rus"] }}
                  @endif
                  <span class="airport_name__from">({{ $flight_back[0]["airport_start"]->iata_code }})</span> 
                  <!-- /.airport_name__from -->
                </div>
                <i class="fas fa-arrow-right"></i>
                <!-- /.popup_order_block__info__city__from -->
                <div class="popup_order_block__info__city__to">
                  @if ($flight_back[0]["airport_end"]["city_rus"] == null)
                    {{ $flight_back[0]["airport_end"]["city_eng"] }}
                  @else
                    {{ $flight_back[0]["airport_end"]["city_rus"] }}
                  @endif
                  <span class="airport_name__to">({{ $flight_back[0]["airport_end"]->iata_code }})</span> 
                  <!-- /.airport_name__to -->
                </div>
                <!-- /.popup_order_block__info__city__to -->
              </div>
              <!-- /.popup_order_block__info__from__city -->
              <div class="popup_order_block__info__from__date_time df_jcspb_aic">
                <span class="details_time_from" id="deatils_both_sides_back_from">
                  {{ \Jenssegers\Date\Date::parse($flight_back[0]["date_start"])->format('l') }} <br>
                  {{ \Jenssegers\Date\Date::parse($flight_back[0]["date_start"])->format('j F Y') }} <br>
                  {{-- 30 октября пт 06:30 --}}
                  <span class="deatils_both_sides_back_from__time"></span>
                </span> 
                <!-- /.details_time_from -->
                <span class="details_time_to" id="deatils_both_sides_back_to">
                  {{ \Jenssegers\Date\Date::parse($flight_back[0]["date_end"])->format('l') }} <br>
                  {{ \Jenssegers\Date\Date::parse($flight_back[0]["date_end"])->format('j F Y') }} <br>
                  <span class="deatils_both_sides_back_to__time"></span>
                </span> 
                <!-- /.details_time_to -->
              </div>
              <!-- /.popup_order_block__info__from__date_time -->
              <div class="popup_order_block__info__from__details_air">
                <div class="popup_order_block__info__from__details_air__number_flight" id="deatils_both_sides_back_number_flight"></div>
                <!-- /.popup_order_block__info__from__details_air__number_flight -->
                <div class="popup_order_block__info__from__details_air__name_modal_air">Airbus A320</div>
                <!-- /.popup_order_block__info__from__details_air__name_modal_air -->
              </div>
              <!-- /.popup_order_block__info__from__details_air -->
            </div>
            <!-- /.popup_order_block__info__from -->
          @else
          <div class="popup_order_block__info__from">
            <h3>Вылет туда:</h3>
            <div class="popup_order_block__info__from__city df_jcspb_aic">
              <div class="popup_order_block__info__city__from">
                @if ($flight_list[0]["airport_start"]["city_rus"] == null)
                  {{ $flight_list[0]["airport_start"]["city_eng"] }}
                @else
                  {{ $flight_list[0]["airport_start"]["city_rus"] }}
                @endif
                <span class="airport_name__from">({{ $flight_list[0]["airport_start"]->iata_code }})</span> 
                <!-- /.airport_name__from -->
              </div>
              <i class="fas fa-arrow-right"></i>
              <!-- /.popup_order_block__info__city__from -->
              <div class="popup_order_block__info__city__to">
                @if ($flight_list[0]["airport_end"]["city_rus"] == null)
                  {{ $flight_list[0]["airport_end"]["city_eng"] }}
                @else
                  {{ $flight_list[0]["airport_end"]["city_rus"] }}
                @endif
                <span class="airport_name__to">({{ $flight_list[0]["airport_end"]->iata_code }})</span> 
                <!-- /.airport_name__to -->
              </div>
              <!-- /.popup_order_block__info__city__to -->
            </div>
            <!-- /.popup_order_block__info__from__city -->
            <div class="popup_order_block__info__from__date_time df_jcspb_aic">
              <span class="details_time_from">
                {{ \Jenssegers\Date\Date::parse($flight_list[0]["date_start"])->format('l') }} <br>
                {{ \Jenssegers\Date\Date::parse($flight_list[0]["date_start"])->format('j F Y') }} <br>
                {{-- 30 октября пт 06:30 --}}
              
              </span> 
              <!-- /.details_time_from -->
              <span class="details_time_to">
                {{ \Jenssegers\Date\Date::parse($flight_list[0]["date_end"])->format('l') }} <br>
                {{ \Jenssegers\Date\Date::parse($flight_list[0]["date_end"])->format('j F Y') }} <br>
              </span> 
              <!-- /.details_time_to -->
            </div>
            <!-- /.popup_order_block__info__from__date_time -->
            <div class="popup_order_block__info__from__details_air">
              <div class="popup_order_block__info__from__details_air__number_flight"></div>
              <!-- /.popup_order_block__info__from__details_air__number_flight -->
              <div class="popup_order_block__info__from__details_air__name_modal_air">Airbus A320</div>
              <!-- /.popup_order_block__info__from__details_air__name_modal_air -->
            </div>
            <!-- /.popup_order_block__info__from__details_air -->
          </div>
          <!-- /.popup_order_block__info__from -->
          @endif
        </div>
        <!-- /.popup_order_block__info -->
      </div>
      <!-- /.popup_order_block -->
      <div class="price_popup">
       <span>Итоговая цена: 0</span>
       <i class="fas fa-ruble-sign"></i>
      </div>
      <!-- /.price_popup -->
      <button type="button" id="btn_continune_order" aria-label="btn_continune_order" class="continune_order btn_style_1">Продолжить</button> <!-- /.continune_order -->
    </div>		
  </div>
  @error('errors')
    <div class="error_passenger_info">{{ $message }}</div>
    <!-- /.error_passenger_info -->
  @enderror
  <div class="my_order__block_mobile desktop_section">
    <button class="btn_open__popup" id="btn_open__popup" aria-label="btn_open__popup">
      Просмотреть заказ можно здесь <i class="fas fa-arrow-right"></i> <i class="fas fa-shopping-basket"></i>
    </button> 
    <!-- /.btn_open__popup -->
  </div>
  <!-- /.my_order__block_mobile -->
  <div class="container desktop_section">
    <div class="search_tickets__block df_jcspb_aic">
      @if ($fligth_status == "both_sides")
        @include('inc.aside_bar_search_tickets',[
          'flight_back' => $flight_back,
          'flight_list' => $flight_list
        ])
      @else
        @include('inc.aside_bar_search_tickets',$flight_list)
      @endif
      <!-- /.aside__block -->
      <div class="flight_block__info">
        {{-- @if ($fligth_status == "one_way") --}}
          <div class="flight_from_block">
            <!-- Разметка первой карусели -->
            @if ($flight_list[0]["airport_start"]["city_rus"] == null)
              <h2>Вылет из г. {{ $flight_list[0]["airport_start"]["city_eng"] }}</h2>
            @else
              <h2>Вылет из г. {{ $flight_list[0]["airport_start"]["city_rus"] }}</h2>
            @endif
            
            <div class="owl-carousel slide-one owl-theme owl-loaded">
              @foreach ($flight_list as $flight_list__item)
                <div class="carousel__item" data-date-start="{{ $flight_list__item->date_start }}" data-date-end="{{ $flight_list__item->date_end }}">
                  <div class="carousel__item__day_of_week upper">{{ \Jenssegers\Date\Date::parse($flight_list__item->date_start)->format('l') }}</div>
                  <!-- /.carousel__item__day_of_week -->
                  <div class="carousel__item__date">
                    {{-- <div class="carousel__item__date__number">{{ \Carbon\Carbon::create($flight_from__item->date_from)->format('l') }}</div> --}}
                    {{-- <div class="carousel__item__date__number">{{ Date::parse($flight_from__item->date_from)->format('j F Y г.') }}</div> --}}
                    <div class="carousel__item__date__number">
                      {{ \Jenssegers\Date\Date::parse($flight_list__item->date_start)->format('j F') }}
                      {{-- <span class="carousel__item__date__number__day">{{ \Jenssegers\Date\Date::parse($flight_list__item->date_start)->format('j') }}</span> 
                      <!-- /.carousel__item__date__number__day -->
                      <span class="carousel__item__date__number__month">{{ \Jenssegers\Date\Date::parse($flight_list__item->date_start)->format('F') }}</span> 
                      <!-- /.carousel__item__date__number__month --> --}}
                    </div>
                    <!-- /.carousel__item__date__number -->
                    {{-- <div class="carousel__item__date__text">{{ \Jenssegers\Date\Date::parse($flight_from__item->date_from)->format('F') }}</div> --}}
                    <!-- /.carousel__item__date__text -->
                  </div>
                  <!-- /.carousel__item__date -->
                  
                  {{-- <div class="carousel__item__min_price">{{ $flight_from__item->cost }}</div> --}}
                  <div class="carousel__item__min_price">{{ $flight_list__item->cost }} <i class="fas fa-ruble-sign"></i></div>
                  <!-- /.carousel__item__min_price -->
                </div>
                <!-- /.carousel__item -->
              @endforeach
              
            </div>
            <div class="result_price__flight_to">
              <h2>Варианты вылета {{ \Jenssegers\Date\Date::parse($flight_list[0]["date_start"])->format('j F Y') }}</h2>
              <div class="result_price__flight_to__cards">
                @foreach ($flight_list as $key => $flight_list__item)
                @if ($key == 0)
                  <div data-id-flight="{{ $flight_list__item->id }}" class="result_price__flight_to__cards__item" id="result_price__flight_to__cards__item__{{ $key }}">
                @else
                  <div data-id-flight="{{ $flight_list__item->id }}" class="result_price__flight_to__cards__item not_select_result_price__flight_to__cards__item" id="result_price__flight_to__cards__item__{{ $key }}">
                @endif
                  {{-- <div class="result_price__flight_to__cards__item" id="result_price__flight_to__cards__item__1"> --}}
                    <div class="result_price__flight_to__cards__item__short_info df_jcspb_aic">
                      <div class="result_price__flight_to__cards__item__short_info__card">
                        <div class="result_price__flight_to__cards__item__short_info__card__city df_jcspb_aic">
                          <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info">
                            @if ($flight_list__item["airport_start"]->city_rus == null)
                              <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info__name">{{ $flight_list__item["airport_start"]->city_eng }} ({{ $flight_list__item["airport_start"]->iata_code }})</div>
                              <!-- /.result_price__flight_to__cards__item__short_info__card__city__from_short_info__name -->
                            @else
                              <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info__name">{{ $flight_list__item["airport_start"]->city_rus }} ({{ $flight_list__item["airport_start"]->iata_code }})</div>
                              <!-- /.result_price__flight_to__cards__item__short_info__card__city__from_short_info__name -->
                            @endif
                            
                            <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info__time">{{ \Carbon\Carbon::createFromFormat('H:i:s',$flight_list__item->time_start)->format('H:i') }}</div>
                            <!-- /.result_price__flight_to__cards__item__short_info__card__city__from_short_info__time -->
                            <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info__number_flight upper">{{ $flight_list__item->flight_code }}</div>
                            <!-- /.result_price__flight_to__cards__item__short_info__card__city__from_short_info__number_flight -->
                          </div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__form_short_info -->
                          <div class="result_price__flight_to__cards__item__short_info__card__city__flight_time_short_info">{{ \Carbon\Carbon::createFromFormat('H:i:s',$flight_list__item->travel_time)->format('H:i') }}</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__flight_time_short_info -->
                          
                          <div class="result_price__flight_to__cards__item__short_info__card__city__to_short_info">
                            @if ($flight_list__item["airport_end"]->city_rus == null)
                              <div class="result_price__flight_to__cards__item__short_info__card__city__to_short_info__name">{{ $flight_list__item["airport_end"]->city_eng }} ({{ $flight_list__item["airport_end"]->iata_code }})</div>
                              <!-- /.result_price__flight_to__cards__item__short_info__card__city__to_short_info__name -->
                              @else
                              <div class="result_price__flight_to__cards__item__short_info__card__city__to_short_info__name">{{ $flight_list__item["airport_end"]->city_rus }} ({{ $flight_list__item["airport_end"]->iata_code }})</div>
                              <!-- /.result_price__flight_to__cards__item__short_info__card__city__to_short_info__name -->
                              @endif
                            <div class="result_price__flight_to__cards__item__short_info__card__city__to_short_info__time">{{ \Carbon\Carbon::createFromFormat('H:i:s',$flight_list__item->time_end)->format('H:i') }}</div>
                            <!-- /.result_price__flight_to__cards__item__short_info__card__city__to_short_info__time -->
                          </div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__to_short_info -->
                        </div>
                        <!-- /.result_price__flight_to__cards__item__short_info__card__city -->
                      </div>
                      <!-- /.result_price__flight_to__cards__item__short_info__card -->
                      <div class="result_price__flight_to__cards__item__short_info__price">
                        <span class="result_price__flight_to__cards__item__short_info__price__text from_price">{{ $flight_list__item->cost }} <i class="fas fa-ruble-sign"></i></span> 
                        <!-- /.result_price__flight_to__cards__item__short_info__price__text -->
                        @if ($key == 0)
                        <button class="result_price__flight_to__cards__item__short_info__price__in_basket btn_style_1" 
                        id="result_flight_to_in_basket__{{ $key }}" aria-label="result_flight_to_in_basket" data-id-item="result_price__flight_to__cards__item__{{ $key }}">Выбрать</button> <!-- /#result_flight_from_in_basket.result_price__flight_to__cards__item__short_info__price__in_basket btn_style_1 -->
                        @else
                        <button class="result_price__flight_to__cards__item__short_info__price__in_basket non_view btn_style_1" 
                        id="result_flight_to_in_basket__{{ $key }}" aria-label="result_flight_to_in_basket" data-id-item="result_price__flight_to__cards__item__{{ $key }}">Выбрать</button> <!-- /#result_flight_from_in_basket.result_price__flight_to__cards__item__short_info__price__in_basket btn_style_1 -->
                        @endif
                        
                      </div>
                      <!-- /.result_price__flight_to__cards__item__price -->
                    </div>
                    <!-- /.result_price__flight_to__cards__item__short_info -->
                  </div>
                  <!-- /.result_price__flight_to__cards__item -->
                @endforeach
              </div>
              <!-- /.result_price__flight_to__cards -->
            </div>
            <!-- /.result_price__flight_to -->
          </div>
          <!-- /.flight_from_block -->
        {{-- @endif --}}
        

        @if ($fligth_status == "both_sides")
          <div class="flight_from_to">
            @if ($flight_back[0]["airport_start"]["city_rus"] == null)
              <h2>Вылет из г. {{ $flight_back[0]["airport_start"]["city_eng"] }}</h2>
            @else
              <h2>Вылет из г. {{ $flight_back[0]["airport_start"]["city_rus"] }}</h2>
            @endif
            <div class="owl-carousel slide-two owl-theme owl-loaded">
              {{-- @foreach ($flight_list as $flight_list__item) --}}
              @foreach ($flight_back as $flight_back__list)
                <div class="carousel__item" data-date-start="{{ $flight_back__list->date_start }}" data-date-end="{{ $flight_back__list->date_end }}">
                  <div class="carousel__item__day_of_week upper">{{ \Jenssegers\Date\Date::parse($flight_back__list->date_start)->format('l') }}</div>
                  <!-- /.carousel__item__day_of_week -->
                  <div class="carousel__item__date">
                    <div class="carousel__item__date__number">{{ \Jenssegers\Date\Date::parse($flight_back__list->date_start)->format('j F') }}</div>
                    <!-- /.carousel__item__date__number -->
                    {{-- <div class="carousel__item__date__text">октября</div> --}}
                    <!-- /.carousel__item__date__text -->
                  </div>
                  <!-- /.carousel__item__date -->
                  <div class="carousel__item__min_price">{{ $flight_back__list->cost }} <i class="fas fa-ruble-sign"></i></div>
                  <!-- /.carousel__item__min_price -->
                </div>
                <!-- /.carousel__item -->
              @endforeach
              
            </div>
            <div class="result_price__flight_to">
              <h2>Варианты вылета {{ \Jenssegers\Date\Date::parse($flight_back[0]["date_start"])->format('j F Y') }}</h2>
              <div class="result_price__flight_to__cards">
                @foreach ($flight_back as $key => $flight_back__list)
                  @if ($key == 0)
                    <div data-id-flight="{{ $flight_back__list->id }}" class="result_price__flight_from__cards__item" id="result_price__flight_from__cards__item__{{ $key }}">
                  @else
                  <div data-id-flight="{{ $flight_back__list->id }}" class="result_price__flight_from__cards__item not_select_result_price__flight_from__cards__item" id="result_price__flight_from__cards__item__{{ $key }}">
                  @endif
                
                {{-- <div class="result_price__flight_from__cards__item" id="result_price__flight_from__cards__item__1"> --}}
                  <div class="result_price__flight_to__cards__item__short_info df_jcspb_aic">
                    <div class="result_price__flight_to__cards__item__short_info__card">
                      <div class="result_price__flight_to__cards__item__short_info__card__city df_jcspb_aic">
                        <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info">
                          @if ($flight_back__list["airport_start"]->city_rus == null)
                            <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info__name">{{ $flight_back__list["airport_start"]->city_eng }} ({{ $flight_back__list["airport_start"]->iata_code }})</div>
                            <!-- /.result_price__flight_to__cards__item__short_info__card__city__from_short_info__name -->
                          @else
                            <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info__name">{{ $flight_back__list["airport_start"]->city_rus }} ({{ $flight_back__list["airport_start"]->iata_code }})</div>
                            <!-- /.result_price__flight_to__cards__item__short_info__card__city__from_short_info__name -->
                          @endif
                          {{-- <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info__name">Екатеринбург(SVX)</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__from_short_info__name --> --}}
                          <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info__time">{{ \Carbon\Carbon::createFromFormat('H:i:s',$flight_back__list->time_start)->format('H:i') }}</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__from_short_info__time -->
                          <div class="result_price__flight_to__cards__item__short_info__card__city__from_short_info__number_flight upper">{{ $flight_back__list->flight_code }}</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__from_short_info__number_flight -->
                        </div>
                        <!-- /.result_price__flight_to__cards__item__short_info__card__city__form_short_info -->
                        <div class="result_price__flight_to__cards__item__short_info__card__city__flight_time_short_info">{{ \Carbon\Carbon::createFromFormat('H:i:s',$flight_back__list->travel_time)->format('H:i') }}</div>
                        <!-- /.result_price__flight_to__cards__item__short_info__card__city__flight_time_short_info -->
                        
                        <div class="result_price__flight_to__cards__item__short_info__card__city__to_short_info">
                          {{-- {{ $flight_list__item["airport_end"] }} --}}
                          @if ($flight_back__list["airport_end"]->city_rus == null)
                            <div class="result_price__flight_to__cards__item__short_info__card__city__to_short_info__name">{{ $flight_back__list["airport_end"]->city_eng }} ({{ $flight_back__list["airport_end"]->iata_code }})</div>
                            <!-- /.result_price__flight_to__cards__item__short_info__card__city__to_short_info__name -->
                          @else
                            <div class="result_price__flight_to__cards__item__short_info__card__city__to_short_info__name">{{ $flight_back__list["airport_end"]->city_rus }} ({{ $flight_back__list["airport_end"]->iata_code }})</div>
                            <!-- /.result_price__flight_to__cards__item__short_info__card__city__to_short_info__name -->
                          @endif

                          {{-- <div class="result_price__flight_to__cards__item__short_info__card__city__to_short_info__name">Москва(DME)</div> --}}
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__to_short_info__name -->
                          <div class="result_price__flight_to__cards__item__short_info__card__city__to_short_info__time">{{ \Carbon\Carbon::createFromFormat('H:i:s',$flight_back__list->time_end)->format('H:i') }}</div>
                          <!-- /.result_price__flight_to__cards__item__short_info__card__city__to_short_info__time -->
                        </div>
                        <!-- /.result_price__flight_to__cards__item__short_info__card__city__to_short_info -->
                      </div>
                      <!-- /.result_price__flight_to__cards__item__short_info__card__city -->
                    </div>
                    <!-- /.result_price__flight_to__cards__item__short_info__card -->
                    <div class="result_price__flight_to__cards__item__short_info__price">
                      <span class="result_price__flight_to__cards__item__short_info__price__text back_price">{{ $flight_back__list->cost }} <i class="fas fa-ruble-sign"></i></span> 
                      <!-- /.result_price__flight_to__cards__item__short_info__price__text -->
                      @if ($key == 0)
                        <button class="result_price__flight_from__cards__item__short_info__price__in_basket btn_style_1" 
                        id="result_flight_from_in_basket__{{ $key }}" aria-label="result_flight_to_in_basket" data-id-item="result_price__flight_from__cards__item__{{ $key }}">Выбрать</button> <!-- /#result_flight_from_in_basket.result_price__flight_to__cards__item__short_info__price__in_basket btn_style_1 -->
                      @else
                        <button class="result_price__flight_from__cards__item__short_info__price__in_basket non_view btn_style_1" 
                        id="result_flight_from_in_basket__{{ $key }}" aria-label="result_flight_to_in_basket" data-id-item="result_price__flight_from__cards__item__{{ $key }}">Выбрать</button> <!-- /#result_flight_from_in_basket.result_price__flight_to__cards__item__short_info__price__in_basket btn_style_1 -->
                      @endif
                    </div>
                    <!-- /.result_price__flight_to__cards__item__price -->
                  </div>
                  <!-- /.result_price__flight_to__cards__item__short_info -->
                </div>
                <!-- /.result_price__flight_from__cards__item -->
                @endforeach
              </div>
              <!-- /.result_price__flight_to__cards -->
            </div>
            <!-- /.result_price__flight_to -->
          </div>
          <!-- /.flight_from_to -->
        @endif
          
        
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
<script type="text/javascript">
  var count_pass = {!! $count_pass!!};
</script>
@endsection
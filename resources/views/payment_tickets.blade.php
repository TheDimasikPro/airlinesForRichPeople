


@extends('layouts.layout_with_footer_bottom')
@section('title_page','Оплата билетов')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/style.min.css">
@endsection
@section('content')
    <div class="container df_jcc_aic content_flex">
        <div class="payment_tickets_block df_jcspb_aic">
            {{-- @include('inc.aside_bar_search_tickets') --}}
            <div class="payment_tickets_block__info">
                <h1>Оплата</h1>
                <form action="" class="payment_tickets_block__info__from">
                    <div class="payment_tickets_block__info__from__inputs_block">
                        <div class="credit_cards_block">
                            {{-- логотипы банков картинками --}}
                        </div>
                        <!-- /.credit_cards_block -->
                    </div>
                    <!-- /.payment_tickets_block__info__from__inputs_block -->
                    <div class="payment_tickets_block__info__from__inputs_block">
                        <p class="title_block_payment_tickets"></p>
                        <!-- /.title_block_payment_tickets -->
                        <div class="price_size"></div>
                        <!-- /.price_size -->
                    </div>
                    <!-- /.payment_tickets_block__info__from__inputs_block -->
                    <div class="payment_tickets_block__info__from__inputs_block">
                        <label for="name_on_card">Имя указанное на карте</label>
                        <input type="text" class="input_style_pofile" id="name_on_card" aria-label="name_on_card" placeholder="Имя указанное на карте">
                    </div>
                    <!-- /.payment_tickets_block__info__from__inputs_block -->
                    <div class="payment_tickets_block__info__from__inputs_block">
                        <label for="card_number">Номер карты</label>
                        <input type="text" class="input_style_pofile" id="card_number" aria-label="card_number" placeholder="Номер карты">
                    </div>
                    <!-- /.payment_tickets_block__info__from__inputs_block -->
                    <div class="payment_tickets_block__info__from__inputs_block df_jcspb_aic">
                        <div class="expiry_date_card_block">
                            <label for="expity_date_card">Истечение срока</label>
                            <input type="text" class="input_style_pofile" id="expity_date_card" aria-label="expity_date_card" placeholder="MM / YY">
                        </div>
                        <!-- /.expiry_date_card_block -->
                        <div class="security_code_card_block">
                            <label for="security_code_card">Секретный код</label>
                            <input type="text" class="input_style_pofile" id="security_code_card" aria-label="security_code_card">
                        </div>
                        <!-- /.security_code_card_block -->
                    </div>
                    <!-- /.payment_tickets_block__info__from__inputs_block -->
                    <div class="payment_tickets_block__info__from__inputs_block">
                        <button class="btn_style_1" id="btn_payment_ticket" aria-label="btn_payment_ticket">
                            <i class="fas fa-lock"></i>
                            <span>5000 <i class="fas fa-ruble-sign"></i></span>
                        </button> 
                        <!-- /.btn_style_1 -->
                    </div>
                    <!-- /.payment_tickets_block__info__from__inputs_block -->
                </form>
                <!-- /.payment_tickets_block__info__from -->
            </div>
            <!-- /.payment_tickets_block__info -->
        </div>
        <!-- /.payment_tickets_block -->
    </div>
    <!-- /.container -->
@endsection
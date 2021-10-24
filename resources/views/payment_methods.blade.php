@extends('layouts.app_layout')
@section('title_page','Способы оплаты')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/style.min.css">
@endsection
@section('content')
    <div class="container">
        <div class="payment_methods_block">
            <div class="bank_cards">
                <h2>Банковская карта</h2>
                <div class="bank_card__image_block">
                    <img src="/assets/images/icons/card_mir.png" alt="card_mir" class="bank_card__image">
                </div>
                <!-- /.bank_card__image_block -->
                <div class="payment_methods__warning_list">
                    <div class="warning_list__row">
                        <div class="row__content">
                            <div class="row_content__img_block">
                                <img src="/assets/images/icons/air-mail.png" alt="air-mail" class="row_content__img">
                            </div>
                            <!-- /.row_content__img_block -->
                            <p>
                                С помощью карты, оплату можно произвести не позднее, чем за 20 минут до вылета.
                            </p>
                        </div>
                        <!-- /.row__content -->
                        <div class="row__content">
                            <div class="row_content__img_block">
                                <img src="/assets/images/icons/air-mail.png" alt="air-mail" class="row_content__img">
                            </div>
                            <!-- /.row_content__img_block -->
                            <p>
                                При отсутствии подтверждения оплаты заказ автоматически аннулируется.
                            </p>
                        </div>
                        <!-- /.row__content -->
                    </div>
                    <div class="warning_list__row">
                        <div class="row__content">
                            <div class="row_content__img_block">
                                <img src="/assets/images/icons/air-mail.png" alt="air-mail" class="row_content__img">
                            </div>
                            <!-- /.row_content__img_block -->
                            <p>
                                На оплату заказа картой дается не более 30 минут.
                            </p>
                        </div>
                        <!-- /.row__content -->
                        <div class="row__content">
                            <div class="row_content__img_block">
                                <img src="/assets/images/icons/air-mail.png" alt="air-mail" class="row_content__img">
                            </div>
                            <!-- /.row_content__img_block -->
                            <p>
                                При возврате авиабилетов, оплаченных картой, деньги автоматически возвращаются на тот же счёт, с которого осуществлялась оплата заказа.
                            </p>
                        </div>
                        <!-- /.row__content -->
                    </div>
                </div>
                <!-- /.payment_methods__warning_list -->
            </div>
            <!-- /.bank_cards -->
            

        </div>
        <!-- /.payment_methods_block -->
    </div>
    <!-- /.container -->
@endsection
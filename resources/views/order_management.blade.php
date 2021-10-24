@extends('layouts.layout_with_footer_bottom')
@section('title_page','Управление заказом')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/style.min.css">
@endsection
@section('content')
    <div class="container df_jcc_aic content_flex">
        <div class="order_managment_block">
            <h1>Управление заказом</h1>
            <form action="" class="order_managment__form">
                <div class="order_m_block__input">
                    <label for="number_order__number_ticket">Number order or number ticket</label>
                    <input type="text" id="number_order__number_ticket" name="number_order__number_ticket" class="order_m_input" placeholder="Номер заказа или номер билета">
                </div>
                <div class="order_m_block__input">
                    <label for="last_name_passenger">Last name passenger</label>
                    <input type="text" id="last_name_passenger"  name="last_name_passenger" class="order_m_input" placeholder="Фамилия пассажира">
                </div>
                <div class="order_m_block__input">
                    <label>
                        <input type="checkbox" name="check_personal_data"/> Я подтверждаю, что ознакомлен(а) и соглашаюсь c <a href="">условиями использования персональных данныx</a>
                    </label>
                </div>
                <!-- /.order_m_block__input -->
                <div class="order_m_block__input">
                    <button class="btn_style_1">Искать</button> 
                    <!-- /.btn_style_1 -->
                </div>
                <!-- /.order_m_block__input -->
            </form>
            <!-- /.order_managment__form -->
        </div>
        <!-- /.order_managment_block -->
    </div>
    <!-- /.container -->
@endsection
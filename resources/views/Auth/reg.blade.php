@extends('layouts.app_layout')
@section('title_page','Авторизация')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/auth.min.css">
@endsection
@section('content')
    <div class="container df_jcc_aic">
        <div action="" class="form form_auth">
            <h1>Регистрация</h1>

            {{-- регистрация проходит в несколько этапов
            1) почта и телефон
            2) паспортные данные, фио, год рождения
            3) пароль4) финиш --}}
            <div class="form_auth_block">
                <div class="form_auth__row">
                    <ul class="stages_list df_jcspb_aic">
                        <li class="stages_list__item stages_list__item_active">Контакные данные</li>
                        <li class="stages_list__item">Данные профиля</li>
                        <li class="stages_list__item">Пароль</li>
                        <li class="stages_list__item">Финиш</li>
                    </ul>
                    <!-- /.stages_list -->
                </div>
                <!-- /.form_auth__row -->
                <div class="form_auth__row">
                    <form action="" class="form_auth_contact_data">
                        <div class="form_auth_block">
                            <label for="email">E-mail</label>
                            <input type="email" autocomplete class="super_big_input form_auth_input" id="email" name="email" placeholder="Введите свою почту">
                            <div class="form_auth__slider_input"></div>
                            <!-- /.form_auth__slider_input -->
                        </div>
                        <!-- /.form_auth_block -->
                        <div class="form_auth__row df_jcspb_aic">
                            <div class="form_auth_block">
                                <label for="prefix_phone">Prefix phone</label>
                                <input type="tel" autocomplete class="min_input form_auth_input" readonly id="prefix_phone" name="phone" value="+7">
                                <button class="dropbtn" type="button" id="dropbtn_prefix_phone">
                                    <i class="fas fa-arrow-down" id=""></i>
                                </button>
                                
                                <div class="form_auth__slider_input"></div>
                                <!-- /.form_auth__slider_input -->
                                <ul class="prefix_phone_list">
                                    <li class="prefix_phone_list__item">+7</li>
                                    <li class="prefix_phone_list__item">+20</li>
                                    <li class="prefix_phone_list__item">+21</li>
                                    <li class="prefix_phone_list__item">+30</li>
                                    <li class="prefix_phone_list__item">+31</li>
                                    <li class="prefix_phone_list__item">+33</li>
                                    <li class="prefix_phone_list__item">+34</li>
                                    <li class="prefix_phone_list__item">+351</li>
                                    <li class="prefix_phone_list__item">+355</li>
                                    <li class="prefix_phone_list__item">+356</li>
                                    <li class="prefix_phone_list__item">+357</li>
                                    <li class="prefix_phone_list__item">+358</li>
                                    <li class="prefix_phone_list__item">+359</li>
                                    <li class="prefix_phone_list__item">+36</li>
                                    <li class="prefix_phone_list__item">+371</li>
                                    <li class="prefix_phone_list__item">+374</li>
                                    <li class="prefix_phone_list__item">+355</li>
                                    <li class="prefix_phone_list__item">+380</li>
                                    <li class="prefix_phone_list__item">+382</li>
                                    <li class="prefix_phone_list__item">+385</li>
                                    <li class="prefix_phone_list__item">+386</li>
                                    <li class="prefix_phone_list__item">+39</li>
                                    <li class="prefix_phone_list__item">+41</li>
                                    <li class="prefix_phone_list__item">+420</li>
                                    <li class="prefix_phone_list__item">+43</li>
                                    <li class="prefix_phone_list__item">+44</li>
                                    <li class="prefix_phone_list__item">+47</li>
                                    <li class="prefix_phone_list__item">+48</li>
                                    <li class="prefix_phone_list__item">+49</li>
                                    <li class="prefix_phone_list__item">+66</li>
                                    <li class="prefix_phone_list__item">+81</li>
                                    <li class="prefix_phone_list__item">+84</li>
                                    <li class="prefix_phone_list__item">+86</li>
                                    <li class="prefix_phone_list__item">+90</li>
                                    <li class="prefix_phone_list__item">+91</li>
                                    <li class="prefix_phone_list__item">+962</li>
                                    <li class="prefix_phone_list__item">+971</li>
                                    <li class="prefix_phone_list__item">+972</li>
                                    <li class="prefix_phone_list__item">+973</li>
                                    <li class="prefix_phone_list__item">+992</li>
                                    <li class="prefix_phone_list__item">+994</li>
                                    <li class="prefix_phone_list__item">+995</li>
                                    <li class="prefix_phone_list__item">+996</li>
                                    <li class="prefix_phone_list__item">+998</li>
                                </ul>
                            </div>
                            <!-- /.form_auth_block -->
                            <div class="form_auth_block">
                                <label for="phone">Phone</label>
                                <input type="tel" autocomplete class="big_input form_auth_input" id="phone" name="phone" placeholder="(***) ***-**-**">
                                <div class="form_auth__slider_input"></div>
                                <!-- /.form_auth__slider_input -->
                            </div>
                            <!-- /.form_auth_block -->
                        </div>
                        <!-- /.form_auth__row -->
                        
                        <div class="form_auth_block">
                            <button class="btn btn_style_1 upper" type="button" id="complete_contact_data">Продолжить</button> 
                            <!-- /.btn btn_style_1 upper-->
                        </div>
                    </form>
                    <!-- /.form_auth_contact_data -->
                </div>
                <!-- /.form_auth__row -->
            </div>
            <!-- /.form_auth_block -->
           
            {{-- <div class="form_auth_block">
                <button class="btn btn_style_1 upper">Зарегистрироваться</button> 
                <!-- /.btn btn_style_1 upper-->
            </div> --}}
            <!-- /.form_auth_block -->
            <div class="form_auth_block df_jcspb_aic"  id="auth_block_btn">
                <a href="{{ route('login_page') }}" class="link_auth link_login_page">Авторизоваться</a>
            </div>
            <!-- /.form_auth_block -->
        </div>
        <!-- /.form form_auth -->
    </div>
    <!-- /.container -->
@endsection
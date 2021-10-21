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
                        </div>
                        <!-- /.form_auth_block -->
                        <div class="form_auth__row df_jcspb_aic">
                            <div class="form_auth_block">
                                <label for="phone">Phone</label>
                                <input type="tel" autocomplete class="min_input form_auth_input" id="phone" name="phone" placeholder="(***) ***-**-**">
                            </div>
                            <!-- /.form_auth_block -->
                            <div class="form_auth_block">
                                <label for="phone">Phone</label>
                                <input type="tel" autocomplete class="big_input form_auth_input" id="phone" name="phone" placeholder="(***) ***-**-**">
                            </div>
                            <!-- /.form_auth_block -->
                        </div>
                        <!-- /.form_auth__row -->
                        
                        <div class="form_auth_block">
                            <button class="btn btn_style_1 upper" id="complete_contact_data">Продолжить</button> 
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
            <div class="form_auth_block df_jcspb_aic">
                <a href="{{ route('login_page') }}" class="link_auth link_login_page">Авторизоваться</a>
            </div>
            <!-- /.form_auth_block -->
        </div>
        <!-- /.form form_auth -->
    </div>
    <!-- /.container -->
@endsection
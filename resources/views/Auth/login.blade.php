@extends('layouts.app_layout')
@section('title_page','Авторизация')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/auth.min.css">
@endsection
@section('content')
    <div class="container df_jcc_aic">
        <form action="" class="form form_auth">
            <h1>Авторизация</h1>
            <div class="form_auth_block">
                <label for="login">Login</label>
                <input type="text" autocomplete="off" class="form_auth_input md_input" id="login" name="login" placeholder="Введите свой логин">
            </div>
            <!-- /.form_auth_block -->
            <div class="form_auth_block">
                <label for="password">Password</label>
                <input type="password" autocomplete="off" class="form_auth_input md_input" id="password" name="password" placeholder="Введите свой пароль">
            </div>
            <!-- /.form_auth_block -->
            <div class="form_auth_block">
                <button class="btn btn_style_1 upper">Авторизоваться</button> 
                <!-- /.btn btn_style_1 upper-->
            </div>
            <!-- /.form_auth_block -->
            <div class="form_auth_block df_jcspb_aic">
                <a href="" class="link_auth">Забыли свой пароль?</a>
                <a href="{{ route('reg_page') }}" class="link_auth">Зарегистрироваться</a>
            </div>
            <!-- /.form_auth_block -->
        </form>
        <!-- /.form form_auth -->
    </div>
    <!-- /.container -->
@endsection
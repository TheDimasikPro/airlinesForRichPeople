@extends('layouts.layout_with_footer_bottom')
@section('title_page','Новый пароль')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/auth.min.css">
@endsection
@section('content')
    <div class="container df_jcc_aic desktop_section content_flex">
        <form action="{{ route('reset_password_update') }}" method="POST" class="form form_auth" id="form_reset_password">
            @csrf
            <input type="hidden" name="token_user" value="{{ $token }}">
            <h2>Восстановление пароля</h2>
            <div class="form_auth_block">
                <label for="email">Email</label>
                <input type="email" autocomplete="off" required class="form_auth_input md_input" id="email" name="email" placeholder="Введите свой email">
            </div>
            <!-- /.form_auth_block -->
            <div class="form_auth_block">
                <label for="password">New password</label>
                <input type="password" autocomplete="off" required class="form_auth_input md_input" id="password" name="password" placeholder="Введите новый пароль">
            </div>
            <!-- /.form_auth_block -->
            <div class="form_auth_block">
                <label for="password_confirmation">Confirm new password</label>
                <input type="password" autocomplete="off" required class="form_auth_input md_input" id="password_confirmation" name="password_confirmation" placeholder="Повторите новый пароль">
            </div>
            <!-- /.form_auth_block -->
            <div class="form_auth_block">
                <button type="submit" class="btn btn_style_1 upper">Восстановить</button> 
                <!-- /.btn btn_style_1 upper-->
            </div>
            <!-- /.form_auth_block -->
            <div class="form_auth_block">
                <p class="form_auth_block__message">* Если все данные введены верно, то для входа в кабинет с новым паролем авторизируйтесь заново</p>
                <!-- /.form_auth_block__message -->
            </div>
            <!-- /.form_auth_block -->
            @error('errors')
                {{-- <div class="form_auth_block error_auth"> --}}
                    <p class="error_auth__message">{{ $message }}</p>
                    <!-- /.error_auth__message -->
                {{-- </div> --}}
                <!-- /.form_auth_block error_auth -->
            @enderror
            <div class="form_auth_block df_jcspb_aic">
                <a href="{{ route('my_profile__page') }}" class="link_auth">Авторизоваться</a>
                <a href="{{ route('registration') }}" class="link_auth">Зарегистрироваться</a>
            </div>
            <!-- /.form_auth_block -->
        </form>
        <!-- /.form form_auth -->
    </div>
    <!-- /.container -->
@endsection
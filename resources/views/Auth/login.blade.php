@extends('layouts.layout_with_footer_bottom')
@section('title_page','Авторизация')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/auth.min.css">
@endsection
@section('content')
    <div class="container df_jcc_aic desktop_section content_flex">
        <form action="{{ route('login_check') }}" method="POST" class="form form_auth" id="form_login">
            @csrf
            <h2>Авторизация</h2>
            <div class="form_auth_block">
                <label for="email">Email</label>
                <input type="text" autocomplete="off" class="form_auth_input md_input" id="email" name="email" placeholder="Введите свой email">
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
            {{-- @if ($sendMailcomplete)
                <div class="form_auth_block">
                    <p class="complete_send_mail">
                        Ваши новые данные отправлены вам на почту
                    </p>
                    <!-- /.complete_send_mail -->
                </div>
                <!-- /.form_auth_block -->
            @endif --}}
            @error('error')
                @if (!empty($message))
                    <div class="form_auth_block error_auth">
                        <p class="error_auth__message">{{ $message }}</p>
                        <!-- /.error_auth__message -->
                    </div>
                    <!-- /.form_auth_block error_auth -->
                @endif
            @enderror
            <div class="form_auth_block df_jcspb_aic">
                <a href="{{ route('forgot_password__page') }}" class="link_auth">Забыли свой пароль?</a>
                <a href="{{ route('registration') }}" class="link_auth">Зарегистрироваться</a>
            </div>
            <!-- /.form_auth_block -->
        </form>
        <!-- /.form form_auth -->
    </div>
    <!-- /.container -->
@endsection
@extends('layouts.layout_with_footer_bottom')
@section('title_page','Восстановить пароль')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/auth.min.css">
@endsection
@section('content')
    <div class="container df_jcc_aic content_flex">
        <form action="{{ route('send_mail_reset_password') }}" method="GET" class="form form_auth" id="form_forgot_password">
            {{-- @csrf --}}
            <h2>Забыли пароль или хотите его восстановить?</h2>
            <div class="form_auth_block">
                <label for="email_forgot">Email</label>
                <input type="email" required autocomplete="off" class="form_auth_input md_input" id="email_forgot" name="email" placeholder="Введите свою почту">
            </div>
            <!-- /.form_auth_block -->
            <div class="form_auth_block">
                <button class="btn btn_style_1 upper" id="btn_restore_password" aria-label="btn_restore_password">Восстановить пароль</button> 
                <!-- /.btn btn_style_1 upper-->
            </div>
            <!-- /.form_auth_block -->
            <div class="form_auth_block">
                <p class="form_auth_block__message">* На указанную вами почту будет отправлено письмо с ссылкой для восстановления пароля</p>
                <!-- /.form_auth_block__message -->
            </div>
            <!-- /.form_auth_block -->
            @error('errors')
                <div class="error_auth__message">
                    {{ $message }}
                </div>
                <!-- /.errors_search_tickets -->
            @enderror
            <div class="form_auth_block df_jcspb_aic">
                <a href="{{ route('my_profile__page') }}" class="link_auth">Авторизоваться</a>
                <a href="{{ route('reg__page') }}" class="link_auth">Зарегистрироваться</a>
            </div>
            <!-- /.form_auth_block -->
        </form>
        <!-- /.form form_auth -->
    </div>
    <!-- /.container -->
@endsection
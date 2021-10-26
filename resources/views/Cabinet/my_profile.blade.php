@extends('layouts.app_layout')
@section('title_page','Личный кабинет')
@section('styles_link')
    {{-- <link rel="stylesheet" href="/assets/css/style.min.css"> --}}
    <link rel="stylesheet" href="/assets/css/my_pofile.css">
@endsection
@section('content')
    <div class="container">
        <div class="my_profile_block df_jcspb_aic">
            <aside class="aside_user">
                <div class="aside_user__item">
                    <button class="aside_user__item_btn btn_style_3" id="aside_user__btn_personal_data">Данные аккаунта</button> 
                    <!-- /.aside_user__item_btn -->
                </div>
                <div class="aside_user__item">
                    <button class="aside_user__item_btn btn_style_3" id="aside_user__btn_my_flights">Паспортные данные</button> 
                    <!-- /.aside_user__item_btn -->
                </div>
                <div class="aside_user__item">
                    <button class="aside_user__item_btn btn_style_3" id="aside_user__btn_my_flights">Мои перелеты</button> 
                    <!-- /.aside_user__item_btn -->
                </div>
                <div class="aside_user__item">
                    <button class="aside_user__item_btn btn_style_3" id="aside_user__btn_my_flights">Выйти</button> 
                    <!-- /.aside_user__item_btn -->
                </div>
            </aside>
            <!-- /.aside_user -->
            <div class="personal_data_block">
                <h2>Личные данные</h2>
            </div>
            <!-- /.personal_data_block -->
        </div>
        <!-- /.my_profile_block -->
        
    </div>
    <!-- /.container -->
@endsection
@extends('layouts.app_layout')
@section('title_page','Все о багаже')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/style.min.css">
    <link rel="stylesheet" href="/assets/css/chief-slider.min.css">
@endsection
@section('content')
    <div class="container">
        <aside class="aside__block">

        </aside>
        <!-- /.aside__block -->
        <div class="search_tickets__block">
            <div class="slider">
                <div class="slider__container">
                  <div class="slider__wrapper">
                    <div class="slider__items">
                      <div class="slider__item">
                        <!-- Контент 1 слайда -->
                        1
                      </div>
                      <div class="slider__item">
                        <!-- Контент 2 слайда -->
                        2
                      </div>
                      <div class="slider__item">
                        <!-- Контент 3 слайда -->
                        3
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Кнопки для перехода к предыдущему и следующему слайду -->
                <a href="#" class="slider__control" data-slide="prev"></a>
                <a href="#" class="slider__control" data-slide="next"></a>
              </div>
        </div>
        <!-- /.search_tickets__block -->
    </div>
    <!-- /.container -->
@endsection
@section('slider_script')
<script src="/assets/js/chief-slider.min.js"></script>
@endsection
@extends('layouts.app_layout')
@section('title_page','Все о багаже')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/style.min.css">
    <link rel="stylesheet" href="/assets/css/chief-slider.min.css">
    <link rel="stylesheet" href="/assets/css/slick.css">
@endsection
@section('content')
    <div class="container">
        <aside class="aside__block">

        </aside>
        <!-- /.aside__block -->
        <div class="search_tickets__block">
            <div class="slick_slide_block">
              <div class="slick_slid__item">
                1
              </div>
              <!-- /.slick_slid__item -->
              <div class="slick_slid__item">
                2
              </div>
              <!-- /.slick_slid__item -->
              <div class="slick_slid__item">
                3
              </div>
              <!-- /.slick_slid__item -->
              <div class="slick_slid__item">
                4
              </div>
              <!-- /.slick_slid__item -->
              <div class="slick_slid__item">
                5
              </div>
              <!-- /.slick_slid__item -->
              <div class="slick_slid__item">
                6
              </div>
              <!-- /.slick_slid__item -->
              <div class="slick_slid__item">
                7
              </div>
              <!-- /.slick_slid__item -->
            </div>
            <!-- /.slick_slide_block -->
        </div>
        <!-- /.search_tickets__block -->
    </div>
    <!-- /.container -->
@endsection
@section('slider_script')
<script src="/assets/js/slick.min.js"></script>
<script src="/assets/js/slick_slide.js"></script>
@endsection
@extends('layouts.operator')
@section('content')
    <div class="wrapper_welcome">
        <div class="intro">
            <div class="video">
                <video class="video__media" src="/assets/video/videoplayback.mp4" autoplay="" muted="" loop=""></video>
            </div>
    
            <div class="intro__content">
                <div class="container">
                    <h1 class="intro__title">Здравствуйте {{ $full_name_user }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.wrapper -->
@endsection
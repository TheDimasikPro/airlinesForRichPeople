@extends('layouts.operator')
@section('content')
    <div class="wrapper_welcome">
        <div class="intro">
            <div class="video">
                <video class="video__media" src="/assets/video/videoplayback.mp4" autoplay="" muted="" loop=""></video>
            </div>
    
            <div class="intro__content">
                <div class="container">
                    <h1 class="intro__title">Доброе утро Трошков Дмитрий Александрович</h1>
                </div>
            </div>
        </div>


        {{-- <div class="intro">
            <div class="video">
                <video class="video__media" src="/assets/video/videoplayback.mp4" autoplay muted loop></video>
            </div>
            <!-- /.video -->
            <div class="intro__content">
                <div class="intro__container">
                    <h1>Доброе утро Трошков Дмитрий Александрович</h1>
                </div>
                <!-- /.intro__container -->
            </div>
            <!-- /.intro__content -->
        </div>
        <!-- /.intro --> --}}
        
    </div>
    <!-- /.wrapper -->
@endsection
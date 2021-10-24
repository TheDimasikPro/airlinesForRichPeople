@extends('layouts.app_layout')
@section('title_page','О нас')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/style.min.css">
@endsection
@section('content')
    <div class="container">
        <section class="about_us">
            <h1>О нас</h1>
            <p class="about_us__text">
                "Richairlines" молодая авиа-компания, входящая в ТОП 30 пристижных комспаний мира. Наши постоянные клиенты ценят, 
                что мы постоянно улучшаем условия перелетов из одной точки мира в другую. Мы сделали больше 100 полетов за первый месяц существоания, но мы можем больше.
                Авиакомпания имеет сервисы обслуживания в таких крупных городах, как Москва, Нью-Йорк, Париж, Лос-Анджелес и так далее.
            </p>
            <!-- /.about_us__text -->
        </section>
        <!-- /.about_us -->
        <section class="our_history">
            <h2>История</h2>
            <div class="airbus_images_block">
                <div class="image_block">
                    <img src="/assets/images/aircraft/airbus_a380.jpg" alt="Airbus A380" class="airbus_images_block__img">
                </div>
                <!-- /.image_block -->
                <div class="image_block">
                    <img src="/assets/images/aircraft/airbus_a380.jpg" alt="Airbus A380" class="airbus_images_block__img">
                </div>
                <!-- /.image_block -->
            </div>
            <!-- /.airbus_images_block -->
            <div class="our_history__text">
                <p>
                    Все началось с маленькой идеи создать такую авиакомпанию, которой будут пользоваться исключительно люди высокого назначения 
                    или же люди имеющие хорошие финансы.
                    Так мы собрались с друзьями и в 2021 году решили создать Richairlines. 
                </p>
                <p>
                    Мы закупили много рекламы у блогеров, политиков, на билбордах и так далее и уже спустя 1 неделю к нам начали поступать первые заказы. У нас был колосальный восторг.
                    Каким-то чудным образом спустя 2 недели, к нам резко начали поступать десятки заказов, мы не знали что делать, ведь денег на покупку дополнительных самолетов у нас не было.
                    Мы приняли решения взять кредит и купить еще пару самолетов. 

                    Спустя месяц мы сделали первые 100 полетов, как внутренних так и международных.
                </p>
            </div>
            <!-- /.our_history__text -->
        </section>
        <!-- /.our_history -->
    </div>
    <!-- /.container -->
@endsection
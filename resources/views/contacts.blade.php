@extends('layouts.app_layout')
@section('title_page','Контакты')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/style.min.css">
@endsection
@section('content')
    <div class="container">
        <h1>Контакты</h1>
        <h2>Офис в Екатеринбурге</h2>
        <p>
            ОАО Авиакомпания "Richairlines" 620025, Россия, г. Екатеринбург, проспект. Ленина 50д 3 этаж
        </p>
        <h2>Круглосуточная служба поддержка</h2>
        <ul class="support_list">
            <li class="support_list__item">
                <strong>Звонки по РФ (бесплатно):</strong>89827999203
            </li>
            <!-- /.support_list__item -->
            <li class="support_list__item">
                <strong>Для жителей Екатеринбурга и Свердловской области:</strong>89827111203
            </li>
            <!-- /.support_list__item -->
            <li class="support_list__item">
                <strong>Для жителей Москвы и Московской области:</strong>89823239203
            </li>
            <!-- /.support_list__item -->
            <li class="support_list__item">
                <strong>Для иностранных граждан</strong>89827995392
            </li>
            <!-- /.support_list__item -->
        </ul>
        <!-- /.support_list -->
        <h2>Размещение рекламы в бортовых журналах и на бортах воздушных судов Авиакомпании</h2>
        <p>
            +7 (343) 376-26-00, reklama_richairlines@gmail.com
        </p>
        <h2>Трудоустройство</h2>
        <p> +7 (343) 777-32-32, vacancy_richairlines@gmail.com</p>


        
    </div>
    <!-- /.container -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2182.3574875764916!2d60.6193244161842!3d56.839811680858055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43c16e85cbb83351%3A0xa07e892ac459bb72!2z0L_RgNC-0YHQvy4g0JvQtdC90LjQvdCwLCA1MNCULCDQldC60LDRgtC10YDQuNC90LHRg9GA0LMsINCh0LLQtdGA0LTQu9C-0LLRgdC60LDRjyDQvtCx0LsuLCA2MjAwNzU!5e0!3m2!1sru!2sru!4v1635138537093!5m2!1sru!2sru" class="google_maps_card" allowfullscreen="" loading="lazy"></iframe>
@endsection
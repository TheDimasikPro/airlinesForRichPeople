<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('styles_link')
    <link rel="prefetch" as="font" type="font/ttf" href="/assets/fonts/Roboto-Regular.ttf" crossorigin>
    <link rel="prefetch" as="font" type="font/ttf" href="/assets/fonts/Roboto-Bold.ttf" crossorigin>
    <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/0b1222bcc2.js" crossorigin="anonymous"></script>
    <title>@yield('title_page')</title>
</head>
<body>
<header id="header">
    <div class="container">
        <!-- мобильное меню -->
        <div class="m_menu">
            
        </div>
        <!-- /.m_menu -->
        <!-- десктопное меню -->
        <div class="d_menu df_jcspb_aic">
            <div class="left_col df_aic">
                <button class="btn btn_additional_menu" id="btn_additional_menu">
                    <i class="fas fa-bars"></i>
                    <i class="fas fa-times non_view"></i>  
                </button> 
                <!-- /.btn .additional menu-->
                
                <div class="logo_image">
                    <a href="{{ route('index__page') }}" class="link_header" aria-label="logo_image">
                        <img src="/assets/images/logo.png" alt="" class="logo">
                    </a> 
                    <!-- /.link_header -->
                </div>
            </div>
            <!-- /.left_col -->
            
            <!-- /.logo_image -->
            <div class="search">
                <form action="" class="form form_search df_aic">
                    @csrf
                    <span class="span_big_input">
                        <input type="text" class="big_input search_input" placeholder="Поиск по сайту" autocomplete="off">
                        <i class="bottom_slider_big_input"></i>
                        <!-- /.bottom_slider_big_input -->
                    </span>
                    <!-- /.span_big_input -->
                    <button id="search_btn">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <!-- /.form form_search -->
            </div>
            <!-- /.search -->
            <ul class="nav_menu df_aic">
                <li class="geo_posistion_people df_aic">
                    <i class="fas fa-globe"></i>
                    <p class="geo_info">
                        RU <span>(RUB, <i class="fas fa-ruble-sign"></i>)</span>
                    </p>
                    <!-- /.geo_info -->
                    <div class="language_currency">
                        <ul class="country_currency">
                            <li class="country_currency__item">
                                <p>Выберите язык</p>
                            </li>
                            <li class="country_currency__item">
                                <input type="radio" name="radio_lang" id="rus_lang">
                                <span>
                                    <img src="/assets/images/flags/ru.svg" alt="ru" class="lang_img">
                                    <i>Russian</i>
                                </span>
                            </li>
                            <li class="country_currency__item">
                                <input type="radio" name="radio_lang" id="en_lang">
                                <span>
                                    <img src="/assets/images/flags/en.svg" alt="en" class="lang_img">
                                    <i>English</i>
                                </span>
                            </li>
                        </ul>
                        <!-- /.country_currency -->
                        <ul class="country_currency">
                            <li class="country_currency__item">
                                <p>Выберите валюту</p>
                            </li>
                            <li class="country_currency__item">
                                <input type="radio" name="radio_currency" id="ruble">
                                <span>
                                    <i class="fas fa-ruble-sign" aria-hidden="true"></i>
                                    <i>Ruble</i>
                                </span>
                            </li>
                            <li class="country_currency__item">
                                <input type="radio" name="radio_currency" id="USA_dollar">
                                <span>
                                    <i class="fas fa-dollar-sign"></i>
                                    <i>United States dollar</i>
                                </span>
                            </li>
                        </ul>
                        <!-- /.country_currency -->
                    </div>
                    <!-- /.language_currency -->
                    
                </li>
                <!-- /.geo_posistion_people -->
                <li class="my_cabinet">
                    <a href="{{ route('login') }}" class="link_header" aria-label="my_cabinet">
                        <i class="fas fa-user"></i>
                    </a>
                    <!-- /.link_header -->
                </li>
                <!-- /.my_cabinet -->
            </ul>
            <!-- /.nav_menu -->
        </div>
        <!-- /.d_menu -->
    </div>
    <!-- /.container -->
    <div class="container" id="mobile_search_geo">
        <div class="search_mobile">
            <form action="" class="form form_search_mobile df_aic">
                <span class="span_big_input">
                    <input type="text" class="big_input search_mobile_input" placeholder="Поиск по сайту" autocomplete="off">
                    <div class="bottom_slider_big_input"></div>
                    <!-- /.bottom_slider_big_input -->
                </span>
                <!-- /.span_big_input -->
                <button>
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <!-- /.form form_search_mobile -->
        </div>
        <!-- /.search_mobile -->
        <div class="geo_posistion_people_mobile df_aic">
            <i class="fas fa-globe"></i>
            <p class="geo_info">
                RU <span>(RUB, <i class="fas fa-ruble-sign"></i>)</span>
            </p>
            <!-- /.geo_info -->
            {{-- <div class="language_currency">
                <ul class="country_currency">
                    <li class="country_currency__item">
                        <p>Выберите язык</p>
                    </li>
                    <li class="country_currency__item">
                        <input type="radio" name="radio_lang" id="rus_lang">
                        <span>
                            <img src="/assets/images/flags/ru.svg" alt="ru" class="lang_img">
                            <p>Russian</p>
                        </span>
                    </li>
                    <li class="country_currency__item">
                        <input type="radio" name="radio_lang" id="en_lang">
                        <span>
                            <img src="/assets/images/flags/en.svg" alt="en" class="lang_img">
                            <p>English</p>
                        </span>
                    </li>
                </ul>
                <!-- /.country_currency -->
                <ul class="country_currency">
                    <li class="country_currency__item">
                        <p>Выберите валюту</p>
                    </li>
                    <li class="country_currency__item">
                        <input type="radio" name="radio_currency" id="ruble">
                        <span>
                            <i class="fas fa-ruble-sign" aria-hidden="true"></i>
                            <p>Ruble</p>
                        </span>
                    </li>
                    <li class="country_currency__item">
                        <input type="radio" name="radio_currency" id="USA_dollar">
                        <span>
                            <i class="fas fa-dollar-sign"></i>
                            <p>United States dollar</p>
                        </span>
                    </li>
                </ul>
                <!-- /.country_currency -->
            </div>
            <!-- /.language_currency --> --}}
        </div>
        <!-- /.geo_posistion_people_mobile -->
    </div>
    <!-- /.container -->
    <div class="additional_sub_menu">
        <div class="container df_jcspb_aic">
            @include('inc.sub_menu_list')
        </div>
        <!-- /.container -->
    </div>
    <!-- /.additional_sub_menu -->
</header>
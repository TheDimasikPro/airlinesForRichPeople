{{-- будущие рейсы это те что отправятся позже, чем время сейчас
прошедшие рейсы, это те рейсы которые завершили полет до нынешнего вреемени
действующие рейсы - это те рейсы которые летят в данную секунду --}}


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/assets/css/operator.css">
    <link rel="prefetch" as="font" type="font/ttf" href="/assets/fonts/Roboto-Regular.ttf" crossorigin>
    <link rel="prefetch" as="font" type="font/ttf" href="/assets/fonts/Roboto-Bold.ttf" crossorigin>
    <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/0b1222bcc2.js" crossorigin="anonymous"></script>
    <title>Редактирование будующих рейсов</title>
</head>
<body>
    <div class="site_overlay"></div>
    <!-- /.site_overlay -->
    <div class="popup_fade non_view"></div>
    <div class="popup_modal non_view">
        <div class="popup">
            <div class="overlay_popup">
                <div id="fountainG">
                    <div id="fountainG_1" class="fountainG"></div>
                    <div id="fountainG_2" class="fountainG"></div>
                    <div id="fountainG_3" class="fountainG"></div>
                    <div id="fountainG_4" class="fountainG"></div>
                    <div id="fountainG_5" class="fountainG"></div>
                    <div id="fountainG_6" class="fountainG"></div>
                    <div id="fountainG_7" class="fountainG"></div>
                    <div id="fountainG_8" class="fountainG"></div>
                </div>
                <div class="check_mark_popup">
                    <img src="/assets/images/icons/icons8-check-mark-48.png" alt="check-mark">
                </div>
                <!-- /.check_mark_popup -->
            </div>
            <button class="btn_popup_close" id="btn_popup_close" aria-label="btn_popup_close">Закрыть</button>
            <div class="popup_order_block">
                <h3>Вы уверены, что хотите удалить этот рейс?</h3>
            </div>
            <!-- /.popup_order_block -->
            <div class="btn_popup_group">
                <button id="btn_yes" class="btn_popup_group__yes" aria-label="btn_popup_group__yes">Да</button> 
                <!-- /#btn_yes.btn_popup_group__yes -->
                <button id="btn_no" class="btn_popup_group__no" aria-label="btn_popup_group__no">Нет</button> 
                <!-- /#btn_no.btn_popup_group__no -->
            </div>
            <!-- /.btn_popup_group -->
        </div>		
    </div>
    <main>
        <aside class="aside_nav">
            <nav class="navbar">
                <ul class="navbar__list">
                    <li class="navbar__list__item">
                        <button class="navbar__list__item__btn navbar__list__item__btn_active" aria-label="btn_open_navbar_slide" id="btn_open_navbar_slide">
                            <i class="fas fa-bars"></i>
                        </button>
                    </li>
                    <!-- /.navbar__list__item -->
                    <li class="navbar__list__item">
                        <a href="{{ route('my_profile__page') }}" class="navbar__list__item__link_icon"><i class="fas fa-user"></i></a>
                        <!-- /.navbar__list__item__link_icon -->
                    </li>
                    <!-- /.navbar__list__item -->
                    <li class="navbar__list__item">
                        <a href="{{ route('edit_future_flights') }}" class="navbar__list__item__link_icon"><i class="fas fa-plane-departure"></i></a>
                        <!-- /.navbar__list__item__link_icon -->
                    </li>
                    <!-- /.navbar__list__item -->
                    <li class="navbar__list__item">
                        <a href="" class="navbar__list__item__link_icon"><i class="fas fa-plane"></i></a>
                        <!-- /.navbar__list__item__link_icon -->
                    </li>
                    <!-- /.navbar__list__item -->
                    <li class="navbar__list__item">
                        <a href="" class="navbar__list__item__link_icon"><i class="fas fa-plane-slash"></i></a>
                        <!-- /.navbar__list__item__link_icon -->
                    </li>
                    <!-- /.navbar__list__item -->
                </ul>
                <!-- /.navbar_list -->
            </nav>
            <!-- /.navbar -->
        </aside>

        <aside class="aside_nav_slide">
            <nav class="navbar_slide">
                <ul class="navbar_slide__list">
                    <li class="navbar_slide__list__item">
                        <button class="navbar_slide__list__item__btn" aria-label="btn_close_navbar_slide" id="btn_close_navbar_slide">
                            <i class="fas fa-arrow-left"></i>
                        </button>
                    </li>
                    <!-- /.navbar_slide__list__item -->
                    <li class="navbar_slide__list__item">
                        <a href="{{ route('my_profile__page') }}" class="navbar_slide__list__item_link">Профиль</a>
                    </li>
                    <!-- /.navbar_slide__list__item -->
                    <li class="navbar_slide__list__item">
                        <a href="{{ route('edit_future_flights') }}" class="navbar_slide__list__item_link">Будущие рейсы</a>
                    </li>
                    <!-- /.navbar_slide__list__item -->
                    <li class="navbar_slide__list__item">
                        <a href="" class="navbar_slide__list__item_link">Действующие рейсы</a>
                    </li>
                    <!-- /.navbar_slide__list__item -->
                    <li class="navbar_slide__list__item">
                        <a href="" class="navbar_slide__list__item_link">Прошедшие рейсы</a>
                    </li>
                    <!-- /.navbar_slide__list__item -->
                </ul>
                <!-- /.navbar_slide__list -->
            </nav>
            <!-- /.navbar_slide -->
        </aside>
        <!-- /.aside_nav_slide -->
    
        <section class="section_content">
    
            @yield('content')
            {{-- приветсвенное окно, доброе утром, или доброй ночи, добрый день взависимости от времени суток
            и здесь же всегда будет мини руководство для пользования --}}
    
            {{-- в ообще здесь отображается сам контент --}}
        </section>
    </main>
    <footer>
        <script src="/assets/js/jquery-3.6.0.min.js"></script>
        <script src="/assets/js/operator.min.js"></script>
        <script src="/assets/js/maskedinput.min.js"></script>
    </footer>
</body>
</html>
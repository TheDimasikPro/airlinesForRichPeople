@extends('layouts.app_layout')
@section('title_page','Питание на борту самолета')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/style.min.css">
@endsection
@section('content')
    <div class="block_start desktop_section">
        <div class="img_food_block">
            <img src="/assets/images/services/food_bg.jpg" alt="" class="food_img_bg">
            
        </div>
        <!-- /.main_food_block -->
        <div class="food_container">
            <div class="container">
                <h1 class="upper">Питание на борту самолета</h1>
                <h2>На борту наших самолетов вы можете испробовать множество различной кухни от русской до африканской с учетом важих пожеланий</h2>

                <button class="btn_style_2 btn_scroll_food" id="id_btn_scroll_food" aria-label="btn_scroll_food">
                    <i class="fas fa-arrow-down"></i>
                </button>
            </div>
            <!-- /.container -->
        </div>
        <!-- /.food_container -->
    </div>
    <!-- /.block_start -->
    <div class="container desktop_section">
        <div class="main_food_block" id="main_food_block">
            <h2>Питание на борту</h2>
            <p class="food_short_info">
                При заказе билета в зависимости от продолжительности полета вам предоставляется список доступных позиций для заказа
            </p>
            <!-- /.food_short_info -->
            <div class="menu_food_block">
                <h2>Меню всех позиций</h2>
                <div class="menu_cards">
                    <div class="menu_cards__item">
                        <div class="menu_cards__item_img_block"></div>
                        <!-- /.menu_cards__item_img_block -->
                        <div class="menu_cards__item_info_block">
                            <h2>Кавказкая кухня</h2>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel ab sapiente dolor doloribus nemo mollitia aperiam optio, cumque necessitatibus assumenda ducimus quia cupiditate corporis, magnam error amet iste, ipsum dignissimos.</p>
                            <div class="menu_cards__item_price">
                                5000 <i class="fas fa-ruble-sign"></i>
                            </div>
                            <!-- /.menu_cards__item_price -->
                        </div>
                        <!-- /.menu_cards__item_info_block -->
                    </div>
                    <!-- /.menu_cards__item -->
                    <div class="menu_cards__item">
                        <div class="menu_cards__item_img_block"></div>
                        <!-- /.menu_cards__item_img_block -->
                        <div class="menu_cards__item_info_block">
                            <h2>Кавказкая кухня</h2>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel ab sapiente dolor doloribus nemo mollitia aperiam optio, cumque necessitatibus assumenda ducimus quia cupiditate corporis, magnam error amet iste, ipsum dignissimos.</p>
                            <div class="menu_cards__item_price">
                                5000 <i class="fas fa-ruble-sign"></i>
                            </div>
                            <!-- /.menu_cards__item_price -->
                        </div>
                        <!-- /.menu_cards__item_info_block -->
                    </div>
                    <!-- /.menu_cards__item -->
                    <div class="menu_cards__item">
                        <div class="menu_cards__item_img_block"></div>
                        <!-- /.menu_cards__item_img_block -->
                        <div class="menu_cards__item_info_block">
                            <h2>Кавказкая кухня</h2>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel ab sapiente dolor doloribus nemo mollitia aperiam optio, cumque necessitatibus assumenda ducimus quia cupiditate corporis, magnam error amet iste, ipsum dignissimos.</p>
                            <div class="menu_cards__item_price">
                                5000 <i class="fas fa-ruble-sign"></i>
                            </div>
                            <!-- /.menu_cards__item_price -->
                        </div>
                        <!-- /.menu_cards__item_info_block -->
                    </div>
                    <!-- /.menu_cards__item -->
                    <div class="menu_cards__item">
                        <div class="menu_cards__item_img_block"></div>
                        <!-- /.menu_cards__item_img_block -->
                        <div class="menu_cards__item_info_block">
                            <h2>Кавказкая кухня</h2>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel ab sapiente dolor doloribus nemo mollitia aperiam optio, cumque necessitatibus assumenda ducimus quia cupiditate corporis, magnam error amet iste, ipsum dignissimos.</p>
                            <div class="menu_cards__item_price">
                                5000 <i class="fas fa-ruble-sign"></i>
                            </div>
                            <!-- /.menu_cards__item_price -->
                        </div>
                        <!-- /.menu_cards__item_info_block -->
                    </div>
                    <!-- /.menu_cards__item -->
                    <div class="menu_cards__item">
                        <div class="menu_cards__item_img_block"></div>
                        <!-- /.menu_cards__item_img_block -->
                        <div class="menu_cards__item_info_block">
                            <h2>Кавказкая кухня</h2>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel ab sapiente dolor doloribus nemo mollitia aperiam optio, cumque necessitatibus assumenda ducimus quia cupiditate corporis, magnam error amet iste, ipsum dignissimos.</p>
                            <div class="menu_cards__item_price">
                                5000 <i class="fas fa-ruble-sign"></i>
                            </div>
                            <!-- /.menu_cards__item_price -->
                        </div>
                        <!-- /.menu_cards__item_info_block -->
                    </div>
                    <!-- /.menu_cards__item -->
                    <div class="menu_cards__item">
                        <div class="menu_cards__item_img_block"></div>
                        <!-- /.menu_cards__item_img_block -->
                        <div class="menu_cards__item_info_block">
                            <h2>Кавказкая кухня</h2>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel ab sapiente dolor doloribus nemo mollitia aperiam optio, cumque necessitatibus assumenda ducimus quia cupiditate corporis, magnam error amet iste, ipsum dignissimos.</p>
                            <div class="menu_cards__item_price">
                                5000 <i class="fas fa-ruble-sign"></i>
                            </div>
                            <!-- /.menu_cards__item_price -->
                        </div>
                        <!-- /.menu_cards__item_info_block -->
                    </div>
                    <!-- /.menu_cards__item -->
                </div>
                <!-- /.menu_cards -->
            </div>
            <!-- /.menu_food_block -->

            <div class="second_food_block">
                <div class="where_to_place_an_order">
                    <h2>Где оформить заказ</h2>
                    <div class="where_oder__text">
                        <ul class="where_oder__list">
                            <li class="where_oder__list__item">
                                В процессе бронирования билета
                            </li>
                            <!-- /.where_oder__list__item -->
                            <li class="where_oder__list__item">
                                После бронирования билета на нашем сайте
                            </li>
                            <!-- /.where_oder__list__item -->
                        </ul>
                        <!-- /.where_oder__list -->
                    </div>
                    <!-- /.where_oder__text -->
                </div>
                <!-- /.where_to_place_an_order -->
                <div class="whene_to_place_an_order">
                    <h2>Когда оформить заказ</h2>
                    <div class="whene_oder__text">
                        <ul class="whene_oder__list">
                            <li class="whene_oder__list__item">
                               Москва, Екатеринбург - не менее, чем за 3 часа до вылета
                            </li>
                            <!-- /.whene_oder__list__item -->
                            <li class="whene_oder__list__item">
                                Север России - не менее, чем за 5 часов до вылета
                            </li>
                            <!-- /.whene_oder__list__item -->
                            <li class="whene_oder__list__item">
                                США, Иссландия, Новая Земля - не менее, чем за 10 часов до вылета
                            </li>
                            <!-- /.whene_oder__list__item -->
                            <li class="whene_oder__list__item">
                                Вся остальная заграница России - не менее, чем за 18 часов до вылета
                            </li>
                            <!-- /.whene_oder__list__item -->
                        </ul>
                        <!-- /.whene_oder__list -->
                    </div>
                    <!-- /.whene_oder__text -->
                </div>
                <!-- /.whene_to_place_an_order -->
            </div>
            <!-- /.second_food_block -->
        </div>
        <!-- /.main_food_block -->
    </div>
    <!-- /.container -->
@endsection

@section('slider_script')
<script type="text/javascript">
    setInterval(() => {
        if ($('.btn_scroll_food').css('display') != 'none') {
            if (!$('.btn_scroll_food').hasClass('down_scroll_btn_food')) {
                $('.btn_scroll_food').removeClass('up_scroll_btn_food');
                $('.btn_scroll_food').addClass('down_scroll_btn_food');
                // console.log('cdcd');
            }
            else{
                $('.btn_scroll_food').removeClass('down_scroll_btn_food');
                $('.btn_scroll_food').addClass('up_scroll_btn_food');
            }
        }
    }, 800);
    $('#id_btn_scroll_food').click(function (e) {
        e.preventDefault();
        var destination =  $('#main_food_block').offset().top;
        $('body,html').animate({scrollTop: destination}, 100);
    });
</script>
@endsection
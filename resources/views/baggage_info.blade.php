@extends('layouts.app_layout')
@section('title_page','Все о багаже')
@section('styles_link')
    <link rel="stylesheet" href="/assets/css/style.min.css">
@endsection
@section('content')
    <div class="container desktop_section">
        <div class="baggage_block">
            <h1>Всё о багаже</h1>
            <div class="baggage_block__start_info">
                <p>
                    Так как наша компания подразумевает максимальный комфорт и удоство, то ограничений по размеру и провозу багажа очень мало.
                </p>
            </div>
            <!-- /.baggage_block__start_info -->
            <div class="baggage_block__cards">
                <div class="baggage_block__card_item" id="carriage_of_animals">
                    <img src="/assets/images/services/imgonline-com-ua-Resize-IvOmzlu9XmE.jpg" alt="" class="baggage_card__img">
                    <div class="baggage_card__text_block">
                        <h2 class="baggage_card__title">Провоз животных</h2> 
                        <!-- /.baggage_card__title -->
                        <div class="baggage_card__text">
                            <p>
                                В нашей компании разрешено провозить животных прямо на борту самолета, при условии, что вы сам отвечаете за него. 
                                Если ваш питомец испортит имущество компании, вам вынесут чек на оплату
                            </p>
                            <div class="baggage_card__sub_text">
                                <div class="info_admission_of_animals">
                                    <h3>Список животных разрешенных на борту:</h3>
                                    <ul class="animals">
                                        <li class="animals__iten">Собака</li>
                                        <li class="animals__iten">Кошка / Кот</li>
                                        <li class="animals__iten">Морская свинка</li>
                                    </ul>
                                    <!-- /.animals -->
                                </div>
                                <!-- /.info_addmission_of_animals -->
                                <div class="documents_animals">
                                    <h3>Необходимые документы для провоза животного:</h3>
                                    <p>
                                        <strong>Для перелета по России:</strong> ветеринарный паспорт с отметками о вовремя сделанных прививках (в том числе от бешенства) и об обработке от паразитов.
                                    </p>
                                    <p>
                                        <strong>Для перелета за границу:</strong>
                                    </p>
                                    <ul>
                                        <li>Ветеринарный паспорт международного образца;</li>
                                        <li>справка о состоянии здоровья животного по форме №4 для Москвы и по форме №1 для 
                                            остальных регионов. Эта справка выдаётся в государственной ветеринарной станции — 
                                            погуглите адреса и контакты этой станции в вашем городе, позвоните туда заранее и узнайте, 
                                            за сколько дней до вылета надо получить документ: сейчас оформлять сертификат нужно максимум за пять дней до вылета.
                                            В справке указываются сведения о прививках и возрасте животного, а также прописывается номер чипа. Последняя прививка от бешенства должна быть сделана не ранее, чем за год и не позднее месяца путешествия;
                                        </li>
                                        <li>
                                            чип — важно, что чипировать нужно строго до прививки от бешенства. Если вы уже прививали питомца в текущем году, а чипировали только сейчас, прививку от бешенства придется делать еще раз;
                                        </li>
                                        <li>
                                            в некоторых случаях нужна справка об отсутствии племенной ценности вашего животного, а также справка об определении в крови животного титра антител к вирусу бешенства (например, для въезда в Европу, Израиль, Японию и некоторые арабские страны). Обратите внимание, что последняя справка делается около 14 рабочих дней.
                                        </li> 
                                    </ul>
                                </div>
                                <!-- /.documents_animals -->
                            </div>
                            <!-- /.baggage_card__sub_text -->
                        </div>
                        <!-- /.baggage_card__text -->
                    </div> 
                    <!-- /.baggage_card__text_block -->
                </div>
                <!-- /.baggage_block__card_item -->
                <div class="baggage_block__card_item" id="baggage_tracing">
                    <img src="/assets/images/services/backpack.jpg" alt="" class="baggage_card__img">
                    <div class="baggage_card__text_block">
                        <h2 class="baggage_card__title">Розыск багажа</h2> 
                        <!-- /.baggage_card__title -->
                        <div class="baggage_card__text">
                            Если вы потеряли свой багаж или он задержался, то перейдите на <a href="">эту страницу</a>. Введите нмоер своего багажа и ждите результата
                        </div>
                        <!-- /.baggage_card__text -->
                    </div> 
                    <!-- /.baggage_card__text_block -->
                </div>
                <!-- /.baggage_block__card_item -->
                <div class="baggage_block__card_item" id="sport_equipment">
                    <img src="/assets/images/services/sport_equipment.jpg" alt="" class="baggage_card__img">
                    <div class="baggage_card__text_block">
                        <h2 class="baggage_card__title">Спортивный инвентарь</h2> 
                        <!-- /.baggage_card__title -->
                        <div class="baggage_card__text">
                            <ul>
                                <li>1 комплект спортивного оборудования</li>
                                <li>вес: не более 23 кг</li>
                                <li>габариты: не более 203 см по сумме трёх измерений (длина/ширина/высота).</li>
                                <li>
                                    При провозе горных лыж/сноуборда/сёрфинга/водных лыж 1 комплект спортивного оборудования должен быть весом не более 23 кг, габариты по сумме трёх измерений не более 350 см, одна из сторон не более 220 см.
                                </li>
                            </ul>
                        </div>
                        <!-- /.baggage_card__text -->
                    </div> 
                    <!-- /.baggage_card__text_block -->
                </div>
                <!-- /.baggage_block__card_item -->
            </div>
            <!-- /.baggage_block__cards -->
        </div>
        <!-- /.baggage_block -->
    </div>
    <!-- /.container -->
@endsection
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/auth.min.css">
    <link rel="prefetch" as="font" type="font/ttf" href="/assets/fonts/Roboto-Regular.ttf" crossorigin>
    <link rel="prefetch" as="font" type="font/ttf" href="/assets/fonts/Roboto-Bold.ttf" crossorigin>
    <title>Регистрация | AirlinesForRichPeople</title>
</head>
<body>
    {{-- в регистрации должна быть почта, телефон, данные профиля(Фамилия,Имя,Дата рождения / Пол,Город проживания,Тип документа / Серия и номер,Страна выдачи) и пароль --}}
    
    {{-- регистрация будет проходить в несколько этапов: 
    1) почта, телефон
    2) данные профиля
    3) пароль
    4) финиш --}}
    
    <div class="container">
        <div action="" class="block_form_auth">
            <span class="title_auth">Регистрация</span> 
            <!-- /.title_auth -->
            <div class="reg_block">
                <p class="important_message">
                    <span>*</span> - Все поля обязательны для заполнения
                </p>
                <!-- /.important_message -->
                <div class="short_info_nav">
                    <nav class="reg_nav">
                        <li>Контактные данные</li>
                        <li>Личные данные</li>
                        <li>Пароль</li>
                        <li>Финиш</li>
                    </nav>
                </div>
                <!-- /.short_info_nav -->
                <div class="reg_block_all_info">
                    <div class="short_all_info">

                        {{-- несколько списков  все списки и формы будут показывать через ajax --}}
                        {{-- аналог это Уралськие авиалинии --}}
                    </div>
                    <!-- /.short_all_info -->
                     {{-- несколько форм --}}
                </div>
                <!-- /.reg_block_all_info -->
            </div>
            <!-- /.reg_block -->
            <button class="btn_reg btn_auth upper">Зарегистрироваться</button> 
            <!-- /.btn btn_auth -->
        </div>
        <!-- /.block_form_auth -->
    </div>
    <!-- /.container -->
</body>
</html>
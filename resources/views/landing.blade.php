@extends('layouts.app')
@section('mobile-logo')
    <a href="/"><img class="logo-img" src="{{ asset('img/new_logo.png') }}"></a>
@endsection
@section('desktop-logo')
    <a href="/"><img class="logo-img" src="{{ asset('img/new_logo.png') }}"></a>
@endsection
@section("title", "Aladdin")
@section("styles")
    <link href="{{asset('css/landing-style.css')}}" type="text/css" rel="stylesheet"/>
    <link href="{{asset('css/general.css')}}" type="text/css" rel="stylesheet"/>
@endsection
@section("body")
    <div class="first_block">
        <h3 class="first_block-header1">Находите ответственных специалистов и совершайте безопасные сделки</h3>
        <h3 class="first_block-subheader1">Поможем поручить бытовые задачи не боясь за результат</h3>
        <p class="first_block_paragraph"><u>Санкт-Петербург</u></p>
    </div>
    <div class="second_block">
        <div class="second_block-container">
            <div class="row">
                <div class="col-sm-7 second_block-header1">На Aladdin часто ищут</div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-5 offset-sm-1 col-xl-3 offset-xl-0">
                    <div class="row second_block-category">
                        <div class="col-2 category_header_div_img">
                            <img class="category_header_img" src="{{ asset('img/category-repair.png') }}">
                        </div>
                        <div class="col-10">
                            <h1 class="category_header_text"><a class="subcategory-item_a" style="color: black" href="/search">Мелкий ремонт</a></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10 offset-2 subcategory">
                            <ul>
                                <li class="subcategory-item"><a class="subcategory-item_a" href="/search">Сантехник</a></li>
                                <li class="subcategory-item"><a class="subcategory-item_a" href="/search">Электрик</a></li>
                                <li class="subcategory-item"><a class="subcategory-item_a" href="/search">Мастер на час</a>
                                </li>
                                <li class="subcategory-item"><a class="subcategory-item_a" href="/search">Отделочные
                                        работы</a></li>
                                <li class="subcategory-item"><a class="subcategory-item_a" href="/search">Сборка и ремонт
                                        мебели</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-5 offset-sm-1 col-xl-3 offset-xl-0">
                    <div class="row second_block-category">
                        <div class="col-2 category_header_div_img">
                            <img class="category_header_img" src="{{ asset('img/category-courier.png') }}">
                        </div>
                        <div class="col-8">
                            <h1 class="category_header_text"><a class="subcategory-item_a" style="color: black" href="/search">Курьер</a></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 offset-2 subcategory">
                            <ul>
                                <li class="subcategory-item"><a class="subcategory-item_a" href="/search">Пешком</a></li>
                                <li class="subcategory-item"><a class="subcategory-item_a" href="/search">На авто</a></li>
                                <li class="subcategory-item"><a class="subcategory-item_a" href="/search">Купить и
                                        доставить</a></li>
                                <li class="subcategory-item"><a class="subcategory-item_a" href="/search">Курьер на день</a>
                                </li>
                                <li class="subcategory-item"><a class="subcategory-item_a" href="/search">Срочная доставка</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-5 offset-sm-1 col-xl-3 offset-xl-0">
                    <div class="row second_block-category">
                        <div class="col-2 category_header_div_img">
                            <img class="category_header_img" src="{{ asset('img/category-cleaning.png') }}">
                        </div>
                        <div class="col-8">
                            <h1 class="category_header_text"><a class="subcategory-item_a" style="color: black" href="/search">Уборка</a></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 offset-2 subcategory">
                            <ul>
                                <li class="subcategory-item"><a class="subcategory-item_a" href="/search">Влажная уборка</a>
                                </li>
                                <li class="subcategory-item"><a class="subcategory-item_a" href="/search">Вывоз мусора</a>
                                </li>
                                <li class="subcategory-item"><a class="subcategory-item_a" href="/search">Генеральная уборка</a></li>
                                <li class="subcategory-item"><a class="subcategory-item_a" href="/search">Мытье окон</a></li>
                                <li class="subcategory-item"><a class="subcategory-item_a" href="/search">Глажка</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-5 offset-sm-1 col-xl-3 offset-xl-0">
                    <div class="row second_block-category">
                        <div class="col-2 category_header_div_img">
                            <img class="category_header_img" src="{{ asset('img/category-transportision.png') }}">
                        </div>
                        <div class="col-8">
                            <h1 class="category_header_text"><a class="subcategory-item_a" style="color: black" href="/search">Грузоперевозки</a></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 offset-2 subcategory">
                            <ul>
                                <li class="subcategory-item"><a class="subcategory-item_a" href="/search">Эвакутор</a></li>
                                <li class="subcategory-item"><a class="subcategory-item_a" href="/search">Помощь в
                                        переезде</a></li>
                                <li class="subcategory-item"><a class="subcategory-item_a" href="/search">Пассажирские перевозки</a></li>
                                <li class="subcategory-item"><a class="subcategory-item_a" href="/search">Междугородние
                                        перевозки</a></li>
                                <li class="subcategory-item"><a class="subcategory-item_a" href="/search">Грузчики</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 second_block-button-div">
                    <!--<button class="second_block-button">Все категории</button>-->
                    <a href="#" class="second_block-button">Все категории и услуги</a>
                </div>
            </div>
        </div>
    </div>
    <div class="third_block">
        <div class="row third_block-div  flex-sm-row-reverse ">
            <div class="col-10 offset-1 col-sm-5 offset-sm-0 col-lg-4 align-self-center third_block-image_div">
                <img class="third_block-img" src="{{ asset('img/blue-people.png') }}">
            </div>
            <div class="col-10 offset-1 col-sm-6 offset-sm-0 col-lg-7">
                <h1 class="third_block-header">
                    Не обязательно тратиться на сервисные кампании
                </h1>
                <p class="third_block-paragraph1">
                    На Aladdin вы бесплатно найдете надежного исполнителя, который оперативно справится с бытовой
                    задачей по разумной цене. <span class="second-parag">Мы тщательно проверяем всех специалистов, ручаясь за качество, и делаем сделки безопасными,
                    предоставляя вам возможность оплачивать услуги после успешного завершения работ.</span>
                </p>
                <p class="third_block-paragraph2">
                    Мы тщательно проверяем всех специалистов, ручаясь за качество, и делаем сделки безопасными,
                    предоставляя вам возможность оплачивать услуги после успешного завершения работ.
                </p>
            </div>
        </div>
    </div>
    <div class="fouth_block">
        <div class="row fourth_block-row">
            <div class="col-12 col-sm-4 col-xl-3 fourth_block-block">
                <div class="row">
                    <div class="col-10 offset-1 fourth_block-img_div">
                        <img class="fourth_block-img" src="{{'img/fourth_block-find.png'}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 offset-1 fourth_block-text">
                        <p class="fourth_block-text-p1"><span style="color: #2195f3">Выберите категорию</span><br>и
                            уточните детали</p>
                        <p class="fourth_block-text-p2">Укажите местоположение,<br>цену и срочность</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-1 fourth_block-arrow align-self-center">
                <img class="fourth_block-arrow_img" src="{{ asset('img/long-right-arrow.png') }}">
            </div>
            <div class="col-12 col-sm-4 col-xl-3 fourth_block-block">
                <div class="row">
                    <div class="col-10 offset-1 fourth_block-img_div">
                        <img class="fourth_block-img" src="{{'img/fourth_block-ancets.png'}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 offset-1 fourth_block-text">
                        <p class="fourth_block-text-p1"><span style="color: #2195f3">Просмотрите анкеты</span><br>исполнителей
                        </p>
                        <p class="fourth_block-text-p2">Читайте отзывы, сравнивайте<br>цены и условия работы</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-1 fourth_block-arrow align-self-center">
                <img class="fourth_block-arrow_img" src="{{ asset('img/long-right-arrow.png') }}">
            </div>
            <div class="col-12 col-sm-4 col-xl-3 fourth_block-block">
                <div class="row">
                    <div class="col-10 offset-1 fourth_block-img_div">
                        <img class="fourth_block-img" src="{{'img/fourth_block-call.png'}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 offset-1 fourth_block-text">
                        <p class="fourth_block-text-p1"><span style="color: #2195f3">Связывайтесь</span><br>напрямую</p>
                        <p class="fourth_block-text-p2">Через заявку или звонок. <br>Платите картой и наличными</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="third_block third_block_2">
        <div class="row">
            <div class="col-10 offset-1">
                <p class="third_block-paragraph3">Мы тщательно проверяем всех специалистов, ручаясь за качество, и
                    делаем сделки безопасными, предоставляя вам возможность оплачивать услуги после успешного завершения
                    работ.</p>
            </div>
        </div>
    </div>
    <div class="fifth_block">
        <div class="row">
            <div class="col-12">
                <h1 class="fifth_block-header">Не переживайте за дела</h1>
            </div>
        </div>
        <div class="row fifth_block-mobile">
            <div class="col-12 col-sm-6 fifth_block-item">
                <div class="row">
                    <div class="col-12 col-md-3 fifth_block-img_div align-self-start">
                        <img class="fifth_block-img" src="{{asset('img/land-check.png')}}">
                    </div>
                    <div class="col-10 offset-1 col-md-9 offset-md-0">
                        <h3 class="fifth_block_header_item"><span style="color: #2195f3">Проверяем</span> каждого
                            специалиста</h3>
                        <p class="fifth_block_paragraph_item">Все исполнители проходят тестирование на знание сервисного
                            этикета и процедуру подтверждения навыков</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 fifth_block-item">
                <div class="row">
                    <div class="col-12 col-md-3 fifth_block-img_div align-self-start">
                        <img class="fifth_block-img" src="{{asset('img/land-return.png')}}">
                    </div>
                    <div class="col-10 offset-1 col-md-9 offset-md-0">
                        <h3 class="fifth_block_header_item"><span style="color: #2195f3">Вернём</span> деньги</h3>
                        <p class="fifth_block_paragraph_item">В случае каких-либо проблем мы вернем вам деньги и
                            проведем работу с исполнителем.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 fifth_block-item">
                <div class="row">
                    <div class="col-12 col-md-3 fifth_block-img_div align-self-start">
                        <img class="fifth_block-img" src="{{asset('img/land-control.png')}}">
                    </div>
                    <div class="col-10 offset-1 col-md-9 offset-md-0">
                        <h3 class="fifth_block_header_item"><span style="color: #2195f3">Контролируем</span> ход работ
                        </h3>
                        <p class="fifth_block_paragraph_item">Следим за пунктуальностью и процессом сделки. Помогаем
                            разрешать спорные ситуации.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 fifth_block-item">
                <div class="row">
                    <div class="col-12 col-md-3 fifth_block-img_div align-self-start">
                        <img class="fifth_block-img" src="{{asset('img/land-find.png')}}">
                    </div>
                    <div class="col-10 offset-1 col-md-9 offset-md-0">
                        <h3 class="fifth_block_header_item"><span style="color: #2195f3">Найдем</span> лучшую цену</h3>
                        <p class="fifth_block_paragraph_item">Разошлите задачу всем исполнителям и получить готовые
                            предложения по цене.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 fifth_block-button_div">
                <button class="fifth_block-button" type="button">Перейти к поиску</button>
            </div>
        </div>
    </div>
    <div class="sixth_block">
        <div class="row sixth_block-main">
            <div class="col-10 offset-1 col-sm-7 offset-sm-1">
                <div class="row"><div class="col-11 offset-1"><h2 class="sixth_block-header">Наши исполнители</h2></div></div>
                <div class="row align-items-center sixth_block-item">
                    <div class="col-1">
                        <img class="sixth_block-parag_img" src="{{asset('img/icons-check.png')}}">
                    </div>
                    <div class="col-11">
                        <p class="sixth_block-paragraph">Подтвердили навыки и опыт отзывами и сертификатами</p>
                    </div>
                </div>
                <div class="row align-items-center sixth_block-item">
                    <div class="col-1">
                        <img class="sixth_block-parag_img" src="{{asset('img/icons-check.png')}}">
                    </div>
                    <div class="col-11">
                        <p class="sixth_block-paragraph">Предоставили копию паспортных данных</p>
                    </div>
                </div>
                <div class="row align-items-center sixth_block-item">
                    <div class="col-1">
                        <img class="sixth_block-parag_img" src="{{asset('img/icons-check.png')}}">
                    </div>
                    <div class="col-11">
                        <p class="sixth_block-paragraph">Имеют образование и владеют сервисным этикетом</p>
                    </div>
                </div>
                <button class="sixth_block-button">Подробнее об исполнителях</button>
            </div>
            <div class="col-sm-3 sixth_block-img_div align-self-center">
                <img class="sixth_block-img" src="{{asset('img/sixth_block.png')}}">
            </div>
        </div>
    </div>
    <div class="seventh_block">
        <div class="row">
            <div class="col-12">
                <h2 class="seventh_block-header">Лучшая цена за 15 минут</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3 class="seventh_block-subheader">Разошлите задачу всем исполнителям Aladdin, получите в ответ предложения<br class="display-xl">с ценой и выберете лучшее в личном кабинете</h3>
            </div>
        </div>
        <div class="row seventh_block-body">
            <div class="col-sm-5 offset-sm-1 seventh_block-hide_part">
                <div class="row align-items-center seventh_block-item">
                    <div class="col-3">
                        <img class="seventh_block-img" src="{{asset('img/seventh_block-15_min.png')}}">
                    </div>
                    <div class="col-8">
                        <p class="seventh_block_paragraph">Предложения поступят в течении 15 минут</p>
                    </div>
                </div>
                <div class="row align-items-center  seventh_block-item">
                    <div class="col-3">
                        <img class="seventh_block-img" src="{{asset('img/seventh_block-slider.png')}}">
                    </div>
                    <div class="col-8">
                        <p class="seventh_block_paragraph">Выберите исполнителя по цене, рейтингу или примерам работ</p>
                    </div>
                </div>
                <div class="row align-items-center  seventh_block-item">
                    <div class="col-3">
                        <img class="seventh_block-img" src="{{asset('img/seventh_block-phone.png')}}">
                    </div>
                    <div class="col-8">
                        <p class="seventh_block_paragraph">Связывайтесь напрямую. Оплачивайте наличными или картой через
                            <span style="color: #2195f3">безопасную сделку</span></p>
                    </div>
                </div>

            </div>
            <div class="col-12 col-sm-3 offset-sm-0">
                <form class="seventh_block-form">
                    <div class="row input_field_div">
                        <div class="col-12">
                            <input class="input_field" type="text" placeholder="Ваше имя">
                        </div>
                    </div>
                    <div class="row input_field_div">
                        <div class="col-12">
                            <input class="input_field" type="email" placeholder="Ваш e-mail">
                        </div>
                    </div>
                    <div class="row input_field_div">
                        <div class="col-12">
                            <textarea class="input_field" rows="5"
                                      placeholder="Что требуется сделать? Например, покрасить балкон 12 кв м синей краской."></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10 offset-1">
                            <button class="seventh_block-button" type="submit">Зарегистрироваться</button>
                            <br>
                            <label class="seventh_block-label">и получить предложения</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="eighth_block">
        <div class="row">
            <div class="col-12">
                <h1 class="eighth_block-header">Каждый отзыв - это реальный опыт заказчиков</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3 class="eighth_block-subheader1">Ежедневно мы связываемся с пользователями Aladdin и запрашиваем<br>объективные отзывы, чтобы помочь будущим заказчикам сделать выбор</h3>
            </div>
        </div>
        <div class="row"> <!--otzyv-->
            <div class="col-10 offset-1 col-lg-8 offset-lg-2 eighth_block-full_report">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2 align-self-center">
                                <img class="eighth_block-avatar" src="{{asset('img/panda.png')}}">
                            </div>
                            <div class="col-10 align-self-start eighth_block-name_service">
                                <p class="eighth_block-name">Валентин Кимаров</p>
                                <p class="eighth_block-service"><span style="color: #2195f3">Мелкий ремонт</span><br
                                            class="eighth_block-br">Замена стеклопакета в комнате</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-9 offset-md-2 eighth_block_report">
                        <p>Мастер <span style="color: #2195f3">Роман Халлопович</span> сделал всё как надо, оперативно приехал, сделал замеры, съездил за
                            окном и поставил его на место. И всё это за один день! Спасибо!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 offset-1 col-md-9 offset-md-2 eighth_block-date_deal">
                        <p class="eighth_block-date">12.03.2017</p>
                        <p class="eighth_block-deal"><img class="eighth_block-img_check"
                                                          src="{{asset('img/galochka.png')}}"><span style="color: #2195f3">Безопасная сделка</span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row"> <!--otzyv-->
            <div class="col-10 offset-1 col-lg-8 offset-lg-2 eighth_block-full_report">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2 align-self-center">
                                <img class="eighth_block-avatar" src="{{asset('img/cat_Z3FDfBn.png')}}">
                            </div>
                            <div class="col-10 align-self-start eighth_block-name_service">
                                <p class="eighth_block-name">Мария Рожкова</p>
                                <p class="eighth_block-service"><span style="color: #2195f3">Услуги курьера</span><br
                                            class="eighth_block-br">Купить лекарство и привезти на адрес</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-9 offset-md-2 eighth_block_report">
                        <p>Осталась довольна. Исполнитель <span style="color: #2195f3">Игорь Морозов</span> был очень вежлив, купил препарат на свои деньги
                            и привёз всё быстро. Мне оставалось только заплатить за доставку и чек.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 offset-1 col-md-9 offset-md-2 eighth_block-date_deal">
                        <p class="eighth_block-date">12.03.2017</p>

                    </div>
                </div>
            </div>
        </div>

        <div class="row"> <!--otzyv-->
            <div class="col-10 offset-1 col-lg-8 offset-lg-2 eighth_block-full_report">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2 align-self-center">
                                <img class="eighth_block-avatar" src="{{asset('img/man.png')}}">
                            </div>
                            <div class="col-10 align-self-start eighth_block-name_service">
                                <p class="eighth_block-name">Юрий Абрамов</p>
                                <p class="eighth_block-service"><span style="color: #2195f3">Уборка</span><br
                                            class="eighth_block-br">Влажная уборка двух комнат</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-9 offset-md-2 eighth_block_report">
                        <p>Клинер <span style="color: #2195f3">Запад Ронялова</span> прекрасно справилась с уборкой. Помыла 2 комнаты, а также выполнила все
                            мои просьбы. Буду обращаться снова!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 offset-1 col-md-9 offset-md-2 eighth_block-date_deal">
                        <p class="eighth_block-date">12.03.2017</p>
                        <p class="eighth_block-deal"><img class="eighth_block-img_check"
                                                          src="{{asset('img/galochka.png')}}"><span style="color: #2195f3">Безопасная сделка</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button class="eighth_block-button">Все отзывы</button>
            </div>
        </div>
    </div>
    <div class="ninth_block">
        <div class="row">
            <div class="col-12 ninth_block-header">Aladdin в СМИ</div>
        </div>
        <div class="row ninth_block-imgs-div">
            <div class="col-6 col-sm-5 offset-sm-1 col-lg-3 offset-lg-0 ninth_block-one_img">
                <img class="ninth_block-img" src="{{asset('img\rusbase.png')}}">
            </div>
            <div class="col-6 col-sm-5 offset-sm-0 col-lg-3 ninth_block-one_img">
                <img class="ninth_block-img" src="{{asset('img\spark.png')}}">
            </div>
            <div class="col-6 col-sm-5 offset-sm-1 col-lg-3 offset-lg-0 ninth_block-one_img">
                <img class="ninth_block-img" src="{{asset('img\delpet.png')}}">
            </div>
            <div class="col-6 col-sm-5 offset-sm-0 col-lg-3 ninth_block-one_img">
                <img class="ninth_block-img" src="{{asset('img\cossa.png')}}">
            </div>
        </div>
    </div>
@endsection
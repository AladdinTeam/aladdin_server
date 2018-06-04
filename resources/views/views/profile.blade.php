@extends('layouts.app')

@section('title', 'Профиль')

@section('mobile-logo')
    <a href="/"><img class="logo-img" src="{{ asset('img/grey_logo.png') }}"></a>
@endsection
@section('desktop-logo')
    <a href="/"><img class="logo-img" src="{{ asset('img/new_logo.png') }}"></a>
@endsection
@section('styles')
    <link href="{{asset('css/general.css')}}" type="text/css" rel="stylesheet"/>
    <link href="{{asset('css/search.less')}}" type="text/css" rel="stylesheet/less"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script>
@endsection
@section('title', 'Профиль')
@section('body')
    <div class="row background">
        <div class="col-sm-4 col-md-3 block only-tablet">
            <div class="categories">
                <span class="categories_category">Мелкий ремонт</span><span><img class="categories_img" src="{{asset('img/right_arrow.png')}}"></span><span class="categories_sub">Сантехник</span>
            </div>
            <div class="row" style="margin-top: 5%;">
                <div class="col-1 offset-1">
                    <img class="profile_left_img" src="{{asset('img/1.png')}}">
                </div>
                <div class="col-10 align-self-center">
                    <p class="profile_left_header">Ознакомьтесь с профилем</p>
                </div>
            </div>
            <div class="row">
                <div class="col-9 offset-2">
                    <p class="profile_left_text">Просмотрите цены и отзывы. Статус "свободен" предполагает, что исполнитель готов приступить к задаче в ближайший час.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-1 offset-1">
                    <img class="profile_left_img" src="{{asset('img/2.png')}}">
                </div>
                <div class="col-10 align-self-center">
                    <p class="profile_left_header">Связывайтесь напрямую</p>
                </div>
            </div>
            <div class="row">
                <div class="col-9 offset-2">
                    <p class="profile_left_text">Через заявку или звонок. Заявка позволяет оформить безопасную сделку и обеспечить надежное выполнение задачи.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-1 offset-1">
                    <img class="profile_left_img" src="{{asset('img/3.png')}}">
                </div>
                <div class="col-10 align-self-center">
                    <p class="profile_left_header">Оставьте отзыв</p>
                </div>
            </div>
            <div class="row">
                <div class="col-9 offset-2">
                    <p class="profile_left_text">В случае каких-либо проблем свяжитесь с нашей службой поддержки. После того, как специалист справится с задачей, оставьте подробный отзыв о его работе.</p>
                </div>
            </div>

            <div class="best_price_header">
                <p>Найдите лучшую цену</p>
            </div>
            <div id="best_price" class="search">
                <p class="search_text">Есть сложности с подсчетом стоимости?</p>
                <p class="search_text">Разошлите задачу всем исполнителям Aladdin и в течении 15 минут получите в ответ готовые предложения с ценой в вашем личном кабинете. Это бесплатно.</p>
                <form class="">
                    <select class="search_input-field">
                        <option>Категория</option>
                        <option>Мелкий ремонт</option>
                        <option>Грузоперевозки</option>
                    </select>
                    <select class="search_input-field">
                        <option>Подкатегория</option>
                        <option>Сантехник</option>
                        <option>Не сантихник</option>
                    </select>
                    <select class="search_input-field">
                        <option>Станция метро</option>
                    </select>
                    <select class="search_input-field">
                        <option>Ожидания по цене</option>
                    </select>
                    <input class="search_input-field" type="text" placeholder="Что требуется сделать?">
                    <textarea class="search_input-field" rows="5"></textarea>
                    <input class="search_input-field" type="text" placeholder="Предпологаемый бюджет">
                    <div class="search_checkbox-div">
                        <div class="search_checkbox-div_item">
                            <input class="search_checkbox-div_item-checkbox" type="checkbox">
                            <label class="search_checkbox-div_item-label">Безопасная сделка</label>
                        </div>
                        <div class="search_checkbox-div_item">
                            <input class="search_checkbox-div_item-checkbox" type="checkbox">
                            <label class="search_checkbox-div_item-label">Свободен сейчас</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="search_button" type="button">Найти</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-7 col-md-5 block">

            <div class="row">
                <div class="col-12">
                    <div class="row profile">
                        <div class="row">
                            <div class="col-4 align-self-center"><img class="profile_avatar" src="{{asset('img/exemple-avater.jpg')}}"></div>
                            <div class="col-8">
                                <div class="row name_status">
                                    <div class="col-12 col-md-12"><p class="profile_name">Иван Иванович И.</p></div>
                                    <div class="col-12 col-md-12 profile_status">
                                        <p class="profile_item_text profile_free">Cвободен</p>
                                    </div>
                                </div>
                                <div class="row profile_item">
                                    <div class="col-2 col-sm-2 align-self-center">
                                        <img class="profile_item_img" src="{{asset('img/search_profile_check.png')}}">
                                    </div>
                                    <div class="col-9 col-sm-10">
                                        <p class="profile_item_text" style="color: #2195f3">34 выполненных задания</p>
                                    </div>
                                </div>
                                <div class="row profile_item">
                                    <div class="col-2 col-sm-2 align-self-center">
                                        <img class="profile_item_img" src="{{asset('img/search_profile_quality.png')}}">
                                    </div>
                                    <div class="col-9 col-sm-10">
                                        <span class="profile_item_text" style="color: #2195f3">90% положительных отзывов</span>
                                    </div>
                                </div>
                                <div class="row profile_item">
                                    <div class="col-2 col-sm-2 align-self-center">
                                        <img class="profile_item_img" src="{{asset('img/profile_safe_deal.png')}}">
                                    </div>
                                    <div class="col-9 col-sm-10">
                                        <p class="profile_item_text" style="color: #2195f3">Безопасная сделка</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 profile_about">
                            <p>Последние 15 лет своей жизни я посвятил сантехнике и всему, что с ней связано. За все эти годы я повидал всякое, и всегда успешно справлялся с поставленными задачами. Обращайтесь, буду рад помочь!</p>
                        </div>
                        <div class="col-12 profile_button_block2">
                            <button class="profile_button" style="background-color: #2195f3; font-weight: 500; color: white">Оформить безопасную сделку</button>
                            <button class="profile_button">Позвонить</button>
                        </div>
                        {{--<div class="col-6 ">
                            <img class="profile_item_img" src="{{asset('img/search_profile_check.png')}}">
                            <p class="profile_item_text">34 выполненных задания</p>
                        </div>
                        <div class="col-6">
                            <img class="profile_item_img" src="{{asset('img/search_profile_quality.png')}}">
                            <p class="profile_item_text">90% положительных отзывов</p>
                        </div>--}}
                        <div class="col-12 align-self-center profile_price">
                            <img class="profile_price_img" src="{{asset('img/search_profile_ruble.png')}}">
                            <p class="profile_price_text">У специалиста средние цены</p>
                            <!--<span class="profile_price_show">показать</span>-->
                        </div>
                        {{--<div class="col-12 profile_button_block">
                            <button class="profile_button">Подробнее</button>
                        </div>--}}
                        <div class="col-12 category">
                            <div class="row">
                                <div class="col">
                                    <p class="category_header">Сантехника</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 category_item">
                                    <span class="category_item_name">Замена труб</span><span class="category_item_units">руб/м</span><span class="category_item_price">500</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 category_item">
                                    <span class="category_item_name">Замена крана</span><span class="category_item_units">руб</span><span class="category_item_price">2000</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 category">
                            <div class="row">
                                <div class="col">
                                    <p class="category_header">Электрика</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 category_item">
                                    <span class="category_item_name">Замена розетки</span><span class="category_item_units">руб/шт</span><span class="category_item_price">200</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 category_item">
                                    <span class="category_item_name">Подключение люстры</span><span class="category_item_units">руб</span><span class="category_item_price">3000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<div class="row">
                        <div class="col-10 offset-1 col-md-8 offset-md-2">
                            <div class="row">
                                <div class="col-2">
                                    <img class="report_avatar" src="{{asset('img/panda.png')}}">
                                </div>
                            </div>
                        </div>
                    </div>--}}
                    <div class="row">
                        <div class="col-12">
                            <p class="header_report">Отзывы о специалисте</p>
                        </div>
                    </div>
                    <div class="row report">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-3 align-self-center">
                                            <img class="report_avatar" src="{{asset('img/panda.png')}}">
                                        </div>
                                        <div class="col-9 align-self-start report_header">
                                            <p class="report_name">Валентин Кимаров</p>
                                            <p class="report_subject"><span style="color: #2195f3">Мелкий ремонт</span><br>Замена стеклопакета в комнате</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 report_body">
                                    <p>Мастер <span style="color: #2195f3">Роман Халлопович</span> сделал всё как надо, оперативно приехал, сделал замеры, съездил за
                                        окном и поставил его на место. И всё это за один день! Спасибо!</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-10 offset-1 report_date_deal">
                                    <p class="report_date">12.03.2017</p>
                                    <p class="report_deal"><img class="report_deal_img" src="{{asset('img/galochka.png')}}"> Безопасная сделка</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
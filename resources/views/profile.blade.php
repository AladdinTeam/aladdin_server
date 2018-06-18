<?php
use Illuminate\Support\Facades\Request;
?>
@extends('layouts.app')
@section('title', 'Поиск')
@section('styles')
    <link href="{{asset('css/general.less')}}" type="text/css" rel="stylesheet/less"/>
    <link href="{{asset('css/styles.less')}}" type="text/css" rel="stylesheet/less"/>
    {{--<link href="{{asset('css/search.less')}}" type="text/css" rel="stylesheet/less"/>--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script>
@endsection
@section('body')
    <?php
    //print_r($reports)
    ?>
    {{--<div class="profile__container--page" >
                    <div class="row profile" style="background-color: #fafafa">
                        <div class="col-12">
                            <p class="profile__name">{{$master->first_name}} {{$master->last_name}}--}}{{--Иван Иванов--}}{{--</p>
                        </div>
                        <div class="col-4 col-sm-2 col-md-3 col-lg-3">
                            <img class="profile__avatar" src="{{asset('img/photo_2017-08-29_16-33-07.jpg')}}">
                        </div>
                        <div class="col-8 col-sm-10 col-md-9 col-lg-9">
                            <div class="row profile__qualities">
                                <div class="col-2">
                                    <img class="profile__img" src="{{asset('img/complete-order.png')}}">
                                </div>
                                <div class="col-10 align-self-center">
                                    <p class="profile__quality">{{/*$master->count*/random_int(5, 19)}}--}}{{--34--}}{{-- выполненных задания</p>
                                </div>
                            </div>
                            <div class="row profile__qualities">
                                <div class="col-2">
                                    <img class="profile__img" src="{{asset('img/positive-report.png')}}">
                                </div>
                                <div class="col-10 align-self-center">
                                    <p class="profile__quality">92% положительных отзывов</p>
                                </div>
                            </div>
                            @if(isset($master_info->card_id))
                                <div class="row profile__qualities">
                                    <div class="col-2">
                                        <img class="profile__img" src="{{asset('img/safety-deal.png')}}">
                                    </div>
                                    <div class="col-10 align-self-center">
                                        <p class="profile__quality">Работает через безопасную сделку</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-12">
                            <p class="profile__about">{{$master_info->about}}--}}{{--Последние 15 лет своей жизни я посвятил сантехнике и всему, что с ней связано. За все эти годы я всегда успешно справлялся с поставленными задачами. Обращайтесь, буду рад помочь!--}}{{--</p>
                        </div>
                        <div class="col-12" style="margin-top: 4%">
                            <div style="border-top: 1px solid #605e5e; border-bottom: 1px solid #605e5e;padding: 2% 1%">
                                <span style="color: #605e5e">Вывоз мусора</span>
                                <span style="color: #605e5e;float: right">500p</span>
                            </div>
                            <div style="border-top: 1px solid #605e5e; border-bottom: 1px solid #605e5e;padding: 2% 1%">
                                <span style="color: #605e5e">Сантехнические работы</span>
                                <span style="color: #605e5e;float: right">700p</span>
                            </div>
                            <div style="border-top: 1px solid #605e5e; border-bottom: 1px solid #605e5e;padding: 2% 1%">
                                <span style="color: #605e5e">Курьерская доставка</span>
                                <span style="color: #605e5e;float: right">от 300p</span>
                            </div>
                            <div style="border-top: 1px solid #605e5e; border-bottom: 1px solid #605e5e;padding: 2% 1%">
                                <span style="color: #605e5e">Электромаонтажные работы</span>
                                <span style="color: #605e5e;float: right">1000p</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="button button--center button--blue" onclick="location.href = '/profile/{{$master->id}}'">Отправить заявку</button>
                        </div>
                    </div>
    </div>--}}
    <div class="row search__container">
        <div class="col-12 col-md-5 search-panel">
            <div id="search">
                <div class="hint-list hint-list--border-bottom" style="border-top: 1px solid #b3b3b3">
                    <h1 class="hint-list__header">Как поручить задачу этому исполнителю?</h1>
                    <ol>
                        <li class="hint-list__item">Опубликуйте задание</li>
                        <li class="hint-list__item">Вкратце опишите задачу</li>
                        <li class="hint-list__item">Договоритесь об условиях</li>
                        <li class="hint-list__item">Платите наличными исполнителю или картой через безопасную сделку</li>
                    </ol>
                </div>
                <div class="hint-list">
                    <ul>
                        <li class="hint-list__item"><a class="hint-list__item--href" href="#">Почему Aladdin?</a></li>
                        <li class="hint-list__item"><a class="hint-list__item--href" href="#">Как это работает</a></li>
                        <li class="hint-list__item"><a class="hint-list__item--href" href="#">Об исполнителях</a></li>
                        <li class="hint-list__item"><a class="hint-list__item--href" href="#">Безопасная сделка</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-7">
            <div class="row profile">
                @if(session()->has('category'))
                <div class="col-4 offset-8">
                    <button class="button button--center button--blue" {{--onclick="location.href = '/profile/{{$master->id}}'"--}}>Выбрать</button>
                </div>
                @endif
                <div class="col-12">
                    <p class="profile__name">{{$master->first_name}} {{$master->last_name}}{{--Иван Иванов--}}</p>
                </div>
                <div class="col-4 col-sm-2 col-md-3 col-lg-3">
                    <img class="profile__avatar" src="{{asset('img/photo_2017-08-29_16-33-07.jpg')}}">
                </div>
                <div class="col-8 col-sm-10 col-md-9 col-lg-9">
                    <div class="row profile__qualities">
                        <div class="col-2">
                            <img class="profile__img" src="{{asset('img/complete-order.png')}}">
                        </div>
                        <div class="col-10 align-self-center">
                            <p class="profile__quality">Выполненных заданий {{/*$master->count*/random_int(5, 19)}}{{--34 выполненных задания--}}</p>
                        </div>
                    </div>
                    <div class="row profile__qualities">
                        <div class="col-2">
                            <img class="profile__img" src="{{asset('img/positive-report.png')}}">
                        </div>
                        <div class="col-10 align-self-center">
                            <p class="profile__quality">92% положительных отзывов</p>
                        </div>
                    </div>
                    @if($master->safety == 1)
                        <div class="row profile__qualities">
                            <div class="col-2">
                                <img class="profile__img" src="{{asset('img/safety-deal.png')}}">
                            </div>
                            <div class="col-10 align-self-center">
                                <p class="profile__quality">Работает через безопасную сделку</p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-12">
                    <p class="profile__about">{{$master_info->about}}{{--Последние 15 лет своей жизни я посвятил сантехнике и всему, что с ней связано. За все эти годы я всегда успешно справлялся с поставленными задачами. Обращайтесь, буду рад помочь!--}}</p>
                </div>
                <div class="col-12 bordered-list">
                    <h1 class="bordered-list__header">Услуги:</h1>
                    @foreach($services as $service)
                        <div class="bordered-list__item">
                            <div class="bordered-list__item--left" style="">{{$service->name}}</div>
                            <div class="bordered-list__item--right" style="">{{$service->price}}</div>
                        </div>
                    @endforeach
                </div>
                <div class="sixth-block--profile">
                    <div class="sixth-block__container--full-width">
                        <h1 class="sixth-block__header" style="margin-top: 10px">Отзывы</h1>
                        @foreach($reports as $report)
                            <div class="report">
                                <div class="row">
                                    <div class="col-2">
                                        <img class="report__img" src="{{asset($report->order->category->image_url)}}">
                                    </div>
                                    <div class="col-8 align-self-center">
                                        <h3 class="report__header">
                                            {{$report->order->header}}
                                        </h3>
                                    </div>
                                    <div class="col-2 align-self-center">
                                        <p class="report__price">{{$report->order->amount}} р</p>
                                    </div>
                                    <div class="col-12 col-sm-8 offset-sm-2">
                                        <p class="report__text">
                                            {{$report->report}}
                                        </p>
                                    </div>
                                    <div class="col-12 col-sm-10">
                                        <p class="report__signature">
                                            {{$report->order->client->first_name}} {{$report->order->client->last_name}},
                                            <?php
                                                $date = new DateTime($report->created_at);
                                                echo $date->format('d.m.Y');
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--<div class="placeholder">
    <div class="row">
    <div class="col-12">
        <p class="placeholder_text">Проверенные специалисты в Санкт-Петербурге</p>
    </div>
    </div>
    <div class="row toys">
    <div class="col-4">
        <img class="toys_img" src="{{asset('img/search-coins.png')}}">
        <p class="toys_text">Вернем деньги при оплате через <span style="color: #2195f3">безопасную сделку</span></p>
    </div>
    <div class="col-4">
        <img class="toys_img" src="{{asset('img/search-checks.png')}}">
        <p class="toys_text">Каждый исполнитель <span style="color: #2195f3">подтвердил</span> свои навыки</p>
    </div>
    <div class="col-4">
        <img class="toys_img" src="{{asset('img/land-control.png')}}">
        <p class="toys_text">Контролируем работу <span style="color: #2195f3">исполнителя</span></p>
    </div>
    </div>
    </div>
    <div class="row header">
    <div class="col-12">
    <p>Обращайтесь к исполнителям напрямую через профиль<br>или оставьте заявку на подбор лучшей цены</p>
    </div>
    </div>
    <div class="row background">
    <div class="col-sm-4 col-md-3 block">
    {{--<div class="row">
        <div class="col">
            <p class="setting-text">Обращайтесь к специалистам напрямую через поиск или оставьте заявку на подбор лучшей цены
        </div>
    </div>--}}
    {{--<div class="row tab">
        <div class="col">
            <button class="tab_button tab_button_1 active" onclick="tapOnSearchTab(event, 'search')">Поиск исполнителей</button>
        </div>
        <div class="col">
            <button class="tab_button tab_button_2" onclick="tapOnSearchTab(event, 'best_price1')">Лучшая цена</button>
        </div>
    </div>
    <div class="settings" style="display: none;">
        <div class="row align-items-center settings_row">
            <div class="col-2">
                <img class="settings_img" src="{{asset("img/search-settings.png")}}">
            </div>
            <div class="col-10">
                <p class="settings_text">Настройка поиска</p>
            </div>
        </div>
    </div>

    <div id="search" class="search">
        <form class="">
            {{csrf_field()}}

            <select id="categories1" class="search_input-field">
            </select>
            <select id="subcategories1" class="search_input-field">
                <option value="0">Подкатегория</option>
            </select>
            <div class="search_extended-button" onclick="extendedSearchClick()">
                <img class="search_extended-button_img" src="{{asset("img/extended_search.png")}}"><p class="search_extended-button_para">Расширенный поиск</p>
            </div>
            <div class="search_extended">
                <select id="subways1" class="search_input-field">
                </select>
                <select class="search_input-field">
                    <option value="0">Ожидания по цене</option>
                    <option value="1">Заниженная</option>
                    <option value="2">Средняя</option>
                    <option value="3">Завышенная</option>
                </select>
                <div class="search_checkbox-div">
                    <div class="search_checkbox-div_item">
                        <input class="search_checkbox-div_item-checkbox" type="checkbox">
                        <label class="search_checkbox-div_item-label">Безопасная сделка</label>
                    </div>
                    <div class="search_checkbox-div_item">
                        <input class="search_checkbox-div_item-checkbox" type="checkbox">
                        <label class="search_checkbox-div_item-label">Свободен сейчас</label>
                    </div>
                    <!--<div class="search_checkbox-div_item">
                        <input class="search_checkbox-div_item-checkbox" type="checkbox">
                        <label class="search_checkbox-div_item-label">С примерами работ</label>
                    </div>
                    <div class="search_checkbox-div_item">
                        <input class="search_checkbox-div_item-checkbox" type="checkbox">
                        <label class="search_checkbox-div_item-label">С отзывами</label>
                    </div>-->
                </div>
            </div>
            {{--<div class="row">
                <div class="col">
                    <button class="search_button" type="button">Найти</button>
                </div>
            </div>--}}
    {{--</form>
</div>

<div id="best_price1" class="search" style="display: none">
    <p class="search_text">Есть сложности с подсчетом стоимости?</p>
    <p class="search_text">Разошлите задачу всем исполнителям Aladdin и в течении 15 минут получите в ответ готовые предложения с ценой в вашем личном кабинете. Это бесплатно.</p>
    <form action="{{route('best_price')}}" method="post">

        {{csrf_field()}}

        <select id="categories" name="categories" class="search_input-field">

        </select>
        @if($errors->has("categories"))
                @foreach ($errors->get("categories") as $error)
                    <p class="error">{{$error}}</p>
                @endforeach
        @endif
        <select id="subcategories" name="subcategories" class="search_input-field">
            <option value="0">Подкатегория</option>
        </select>
        @if($errors->has("subcategories"))
            @foreach ($errors->get("subcategories") as $error)
                <p class="error">{{$error}}</p>
            @endforeach
        @endif
        <select id="subways" name="subway" class="search_input-field">
        </select>
        @if($errors->has("subway"))
            @foreach ($errors->get("subway") as $error)
                <p class="error">{{$error}}</p>
            @endforeach
        @endif
        <select class="search_input-field" name="price" >
            <option value="0">Ожидания по цене</option>
            <option value="1">Заниженная</option>
            <option value="2">Средняя</option>
            <option value="3">Завышенная</option>
        </select>
        @if($errors->has("price"))
            @foreach ($errors->get("price") as $error)
                <p class="error">{{$error}}</p>
            @endforeach
        @endif
        <input class="search_input-field" name="header" type="text" placeholder="Что требуется сделать?">
        @if($errors->has("header"))
            @foreach ($errors->get("header") as $error)
                <p class="error">{{$error}}</p>
            @endforeach
        @endif
        <textarea class="search_input-field" name="description" rows="5"></textarea>
        @if($errors->has("description"))
            @foreach ($errors->get("description") as $error)
                <span class="error">{{$error}}</span>
            @endforeach
        @endif
        <input class="search_input-field" type="text" name="amount" placeholder="Предпологаемый бюджет">
        @if($errors->has("amount"))
            @foreach ($errors->get("amount") as $error)
                <p class="error">{{$error}}</p>
            @endforeach
        @endif
        <div class="search_checkbox-div">
            <div class="search_checkbox-div_item">
                <input class="search_checkbox-div_item-checkbox" type="checkbox" name="safety">
                <label class="search_checkbox-div_item-label">Безопасная сделка</label>
            </div>
            <div class="search_checkbox-div_item">
                <input class="search_checkbox-div_item-checkbox" type="checkbox" name="free">
                <label class="search_checkbox-div_item-label">Свободен сейчас</label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button class="search_button" type="submit">Найти</button>
            </div>
        </div>
    </form>
</div>
</div>

<div class="col-sm-7 col-md-5 block">
<div class="search_cond">
    <div class="row flex-md-row-reverse">
        <div class="col-12 col-sm-2">
            <p class="search_cond_condition"><span class="search_cond_display">На странице:</span></p><span class="search_cond_var active">5</span><span class="search_cond_var">10</span><span class="search_cond_var">15</span>
        </div>
        <div class="col-12 col-sm-10    ">
            <p class="search_cond_condition"><span class="search_cond_display">Сортировка:</span></p><span class="search_cond_var active">по рейтингу</span><span class="search_cond_var">по отзывам</span>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-12">
        <div class="row profile">
            <div class="row">
                <div class="col-4"><img class="profile_avatar" src="{{asset('img/photo_2017-08-29_16-33-07.jpg')}}"></div>
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
            <div class="row">

            </div>
            <div class="col-12 profile_about">
                <p>Последние 15 лет своей жизни я посвятил сантехнике и всему, что с ней связано. За все эти годы я повидал всякое, и всегда успешно справлялся с поставленными задачами. Обращайтесь, буду рад помочь!</p>
            </div>
            {{--<div class="col-6 ">
                <img class="profile_item_img" src="{{asset('img/search_profile_check.png')}}">
                <p class="profile_item_text">34 выполненных задания</p>
            </div>
            <div class="col-6">
                <img class="profile_item_img" src="{{asset('img/search_profile_quality.png')}}">
                <p class="profile_item_text">90% положительных отзывов</p>
            </div>--}}
    {{--<div class="col-12 align-self-center profile_price">
        <img class="profile_price_img" src="{{asset('img/search_profile_ruble.png')}}">
        <p class="profile_price_text">У специалиста средние цены</p>
        <span class="profile_price_show">показать</span>
    </div>
    <div class="col-12 profile_button_block">
        <button class="profile_button" onclick="location.href = '/profile'">Подробнее</button>
    </div>
</div>

<div class="row profile">
    <div class="row">
        <div class="col-4"><img class="profile_avatar" src="{{asset('img/photo_2017-09-13_10-46-45.jpg')}}"></div>
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
    <div class="row">

    </div>
    <div class="col-12 profile_about">
        <p>Последние 15 лет своей жизни я посвятил сантехнике и всему, что с ней связано. За все эти годы я повидал всякое, и всегда успешно справлялся с поставленными задачами. Обращайтесь, буду рад помочь!</p>
    </div>
    {{--<div class="col-6 ">
        <img class="profile_item_img" src="{{asset('img/search_profile_check.png')}}">
        <p class="profile_item_text">34 выполненных задания</p>
    </div>
    <div class="col-6">
        <img class="profile_item_img" src="{{asset('img/search_profile_quality.png')}}">
        <p class="profile_item_text">90% положительных отзывов</p>
    </div>--}}
    {{--<div class="col-12 align-self-center profile_price">
        <img class="profile_price_img" src="{{asset('img/search_profile_ruble.png')}}">
        <p class="profile_price_text">У специалиста средние цены</p>
        <span class="profile_price_show">показать</span>
    </div>
    <div class="col-12 profile_button_block">
        <button class="profile_button" onclick="location.href = '/profile'">Подробнее</button>
    </div>
</div>

<div class="row profile">
    <div class="row">
        <div class="col-4"><img class="profile_avatar" src="{{asset('img/photo_2017-09-13_18-50-29.jpg')}}"></div>
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
    <div class="row">

    </div>
    <div class="col-12 profile_about">
        <p>Последние 15 лет своей жизни я посвятил сантехнике и всему, что с ней связано. За все эти годы я повидал всякое, и всегда успешно справлялся с поставленными задачами. Обращайтесь, буду рад помочь!</p>
    </div>
    <div class="col-12 align-self-center profile_price">
        <img class="profile_price_img" src="{{asset('img/search_profile_ruble.png')}}">
        <p class="profile_price_text">У специалиста средние цены</p>
        <span class="profile_price_show">показать</span>
    </div>
    <div class="col-12 profile_button_block">
        <button class="profile_button" onclick="location.href = '/profile'">Подробнее</button>
    </div>
</div>
</div>
</div>
</div>
</div>--}}
@endsection
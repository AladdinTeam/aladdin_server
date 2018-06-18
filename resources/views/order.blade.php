@extends('layouts.app')
@section('title', 'Поиск')
@section('styles')
    <link href="{{asset('css/general.less')}}" type="text/css" rel="stylesheet/less"/>
    <link href="{{asset('css/styles.less')}}" type="text/css" rel="stylesheet/less"/>
    {{--<link href="{{asset('css/search.less')}}" type="text/css" rel="stylesheet/less"/>--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script>
@endsection
@section('body')
    <div class="row search__container">
        <div class="col-12 col-md-5 search-panel">
            <div id="search">
                <div class="hint-list hint-list--border-bottom" style="border-top: 1px solid #b7b7b7;">
                    <h1 class="hint-list__header" style="color: #00b0ff">{{$order->header}}</h1>
                    <p style="font-size: 0.9rem; color: #605e5e;padding: 5px">{{$order->description}}</p>
                    <ul style="padding: 5px">
                        <li class="hint-list__item">Метро: {{$order->subway->name}}</li>
                        <li class="hint-list__item">Бюджет: {{$order->amount}} руб.</li>
                        <li class="hint-list__item">Адрес: {{$order->address}}</li>
                        @if($order->safety == 1)
                            <li class="hint-list__item">Безопасная сделка</li>
                        @endif
                    </ul>
                </div>
                <div class="hint-list hint-list--border-bottom">
                    <h1 class="hint-list__header">Как это работает:</h1>
                    <ol>
                        <li class="hint-list__item">Выберите исполнителя</li>
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
        <div class="col-12 col-md-7 profile__container--optional">
            @if($order->status == 0)
                @if($order->master_id != null)
                    <?php
                        $st_master = $order->masters()->where('master_id', $order->master_id)->first();
                    ?>
                    @if($order->masters()->where('master_id', $order->master_id)->first() != null)
                        <div class="row profile">
                            <div class="col-6 col-md-8" style="padding-bottom: 10px">
                                <a href="/profile/{{$master->id}}" class="profile__name--link">{{$master->first_name}} {{$master->last_name}}</a>
                            </div>
                            <div class="col-6 col-md-4">
                                <button class="button button--blue button--full-container">Выбрать</button>
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
                                        <p class="profile__quality">Выполненных заданий: {{$order->master->work_orders()->count()}}</p>
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
                                @if($order->master->master_info->card_id != null)
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
                                <p class="profile__about">{{$order->master->master_info->about}}</p>
                            </div>
                            <div class="col-12" style="margin-top: 10px;border-top: 1px solid #a0a09f">
                                <p style="padding: 5px; font-size: 0.9rem">Моя цена: {{$st_master->pivot->price}}</p>
                                <p style="padding: 5px; font-size: 0.9rem">Дата выполнения:
                                    <?php
                                    $date = new DateTime($st_master->pivot->date);
                                    echo $date->format('d.m.Y');
                                    ?>
                                </p>
                                <p style="padding: 5px; font-size: 0.9rem">Комментарий: {{$st_master->pivot->commentary}}</p>
                            </div>
                        </div>
                    @else
                        <div class="row profile">
                            <div class="col-6 col-md-8" style="padding-bottom: 10px">
                                <a href="/profile/{{$master->id}}" class="profile__name--link">{{$master->first_name}} {{$master->last_name}}</a>
                            </div>
                            <div class="col-6 col-md-4">
                                <button class="button button--blue button--full-container">Выбрать</button>
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
                                        <p class="profile__quality">Выполненных заданий: {{$order->master->work_orders()->count()}}</p>
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
                                @if($order->master->master_info->card_id != null)
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
                                <p class="profile__about">{{$order->master->master_info->about}}</p>
                            </div>
                            <div class="col-12" style="margin-top: 10px;border-top: 1px solid #a0a09f">
                                <p style="padding: 5px; font-size: 0.9rem">Этот мастер пока не выдвинул свое предложение</p>
                            </div>
                        </div>
                    @endif
                    <div class="col-12" style="text-align: center; text-align: -moz-center; margin-bottom: 10px">
                        <h3 style="font-size: 1rem; font-weight: 600; color: #605e5e">Посмотрите предложения других мастеров</h3>
                    </div>
                    @foreach($order->masters as $master)
                        @if($master->id == $order->master_id)

                        @endif
                        <div class="row profile">
                            <div class="col-6 col-md-8" style="padding-bottom: 10px">
                                <a href="/profile/{{$master->id}}" class="profile__name--link">{{$master->first_name}} {{$master->last_name}}</a>
                            </div>
                            <div class="col-6 col-md-4">
                                <button class="button button--blue button--full-container">Выбрать</button>
                            </div>
                            {{--<div class="col-4 col-sm-2 col-md-3 col-lg-3">
                                <img class="profile__avatar" src="{{asset('img/photo_2017-08-29_16-33-07.jpg')}}">
                            </div>
                            <div class="col-8 col-sm-10 col-md-9 col-lg-9">
                                <div class="row profile__qualities">
                                    <div class="col-2">
                                        <img class="profile__img" src="{{asset('img/complete-order.png')}}">
                                    </div>
                                    <div class="col-10 align-self-center">
                                        <p class="profile__quality">Выполненных заданий: {{$master->work_orders()->count()}}</p>
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
                                @if($master->master_info->card_id != null)
                                    <div class="row profile__qualities">
                                        <div class="col-2">
                                            <img class="profile__img" src="{{asset('img/safety-deal.png')}}">
                                        </div>
                                        <div class="col-10 align-self-center">
                                            <p class="profile__quality">Работает через безопасную сделку</p>
                                        </div>
                                    </div>
                                @endif
                            </div>--}}
                            <div class="col-12">
                                <p class="profile__about">{{$master->master_info->about}}Последние 15 лет своей жизни я посвятил сантехнике и всему, что с ней связано. За все эти годы я всегда успешно справлялся с поставленными задачами. Обращайтесь, буду рад помочь!</p>
                            </div>
                            <div class="col-12" style="margin-top: 10px;border-top: 1px solid #a0a09f">
                                <p style="padding: 5px; font-size: 0.9rem">Моя цена: {{$master->pivot->price}}</p>
                                <p style="padding: 5px; font-size: 0.9rem">Дата выполнения:
                                    <?php
                                        $date = new DateTime($master->pivot->date);
                                        echo $date->format('d.m.Y');
                                    ?>
                                </p>
                                <p style="padding: 5px; font-size: 0.9rem">Комментарий: {{$master->pivot->commentary}}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach($order->masters as $master)
                        <div class="row profile">
                            <div class="col-6 col-md-8" style="padding-bottom: 10px">
                                <a href="/profile/{{$master->id}}" class="profile__name--link">{{$master->first_name}} {{$master->last_name}}</a>
                            </div>
                            <div class="col-6 col-md-4">
                                <button class="button button--blue button--full-container">Выбрать</button>
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
                                        <p class="profile__quality">Выполненных заданий: {{$master->work_orders()->count()}}</p>
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
                                @if($master->master_info->card_id != null)
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
                                <p class="profile__about">{{$master->master_info->about}}Последние 15 лет своей жизни я посвятил сантехнике и всему, что с ней связано. За все эти годы я всегда успешно справлялся с поставленными задачами. Обращайтесь, буду рад помочь!</p>
                            </div>
                            <div class="col-12" style="margin-top: 10px;border-top: 1px solid #a0a09f">
                                <p style="padding: 5px; font-size: 0.9rem">Моя цена: {{$master->pivot->price}}</p>
                                <p style="padding: 5px; font-size: 0.9rem">Дата выполнения:
                                    <?php
                                    $date = new DateTime($master->pivot->date);
                                    echo $date->format('d.m.Y');
                                    ?>
                                </p>
                                <p style="padding: 5px; font-size: 0.9rem">Комментарий: {{$master->pivot->commentary}}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            @else
            @endif
            {{--<div class="row profile">
                <div class="col-12">
                    <p class="profile__name">--}}{{--{{$master->first_name}} {{$master->last_name}}--}}{{--Мастер</p>
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
                            <p class="profile__quality">Выполненных заданий {{/*$master->count*/random_int(5, 19)}}--}}{{--34 выполненных задания--}}{{--</p>
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
                </div>
                <div class="col-12">
                    <p class="profile__about">--}}{{--{{$master->about}}--}}{{--Последние 15 лет своей жизни я посвятил сантехнике и всему, что с ней связано. За все эти годы я всегда успешно справлялся с поставленными задачами. Обращайтесь, буду рад помочь!</p>
                </div>
            </div>--}}
        </div>
    </div>
@endsection
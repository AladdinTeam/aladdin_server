@extends('layouts.app')
@section('title', 'Мои заявки')
@section('styles')
    <link href="{{asset('css/general.less')}}" type="text/css" rel="stylesheet/less"/>
    <link href="{{asset('css/styles.less')}}" type="text/css" rel="stylesheet/less"/>
    {{--<link href="{{asset('css/search.less')}}" type="text/css" rel="stylesheet/less"/>--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script>
@endsection
@section('body')
    <div class="order">
        <div class="order__container">
            <div class="row order__block__header">
                <div class="col col-md-9 align-self-center">
                    <h1 class="order__header">Мои заявки</h1>
                </div>
                <div class="col col-md-3 align-self-center">
                    <button class="button button--blue button--full-container">Добавить задачу</button>
                </div>
            </div>
            <div class="orders-list">
                <div class="row">
                    <div class="col-2 col-md-1">
                        <img class="orders-list__img" src="{{'img/new_order.png'}}">
                    </div>
                    <div class="col-10 col-md-11">
                        <h3 class="orders-list__header">Новые заказы</h3>
                    </div>
                </div>
                <div class="col-12 col-md-11 offset-md-1">
                    <p class="orders-list__text">В списке ниже отобразятся ваши задачи, к которым исполнители будут
                        высылать свои предложения. Выберите понравившееся предложение, после чего Aladdin выдаст вам
                        контакты мастера и возможность оплатить сделку по карте.
                        <a class="orders-list__text--link" href="#">Подробнее</a></p>
                </div>
                <div class="row">
                    <div class="col-12 col-md-11 offset-md-1">
                        <div class="row orders-list__order">
                            <div class="col-8 col-md-10">
                                <h4 class="orders-list__item orders-list__item--header">Заказы</h4>
                            </div>
                            <div class="col-4 col-md-2">
                                <h4 class="orders-list__item orders-list__item--header orders-list__item--center">Предложения</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($new_orders as $new_order)
                <div class="row">
                    <div class="col-12 col-md-11 offset-md-1">
                        <div class="row orders-list__order" @if($new_order->status == -1) onclick="modal()" @else onclick="location.href='/order/{{$new_order->id}}'" @endif>
                            <div class="col-8 col-md-10">
                                <p class="orders-list__item">{{$new_order->header}}</p>
                            </div>
                            <div class="col-4 col-md-2">
                                <p class="orders-list__item orders-list__item--center">{{$new_order->masters()->count()}}</p>
                            </div>
                            @if($new_order->status == -1)
                                <div class="col-12 col-md-10">
                                    <p class="orders-list__item orders-list__item--need-add">Внимание! Пожалуйста, заполните информацию о задаче, чтобы мы смогли разослать её всем специалистам Aladdin. Нажмите "завершить", чтобы внести уточнения</p>
                                    <button class="button button--orange" style="margin-bottom: 10px">Завершить</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
                {{--<div class="row" onclick="console.log('modal')">
                    <div class="col-12 col-md-10 offset-md-2">
                        <div class="row orders-list__order" onclick="console.log('modal')">
                            <div class="col-8">
                                <p class="orders-list__item">Копнуть глубже по поводу провода принесенного оводом с завода оптового</p>
                            </div>
                            <div class="col-4">
                                <p class="orders-list__item orders-list__item--center">-</p>
                            </div>
                            <div class="col-12">
                                <p class="orders-list__item orders-list__item--need-add">Внимание! Пожалуйста, заполните информацию о задаче, чтобы мы смогли разослать её всем специалистам Aladdin. Нажмите "завершить", чтобы внести уточнения</p>
                                <button class="button button--orange" style="margin-bottom: 10px">Завершить</button>
                            </div>
                        </div>
                    </div>
                </div>--}}
            </div>

            <div class="orders-list" style="margin-top: 90px">
                <div class="row">
                    <div class="col-2 col-md-1">
                        <img class="orders-list__img" src="{{'img/active_order.png'}}">
                    </div>
                    <div class="col-10 col-md-11">
                        <h3 class="orders-list__header">Активные заказы</h3>
                    </div>
                </div>
                <div class="col-12 col-md-11 offset-md-1">
                    <p class="orders-list__text">Здесь отобразятся задачи, над которыми трудятся выбранные исполнители.</p>
                </div>
                <div class="row">
                    <div class="col-12 col-md-11 offset-md-1">
                        <div class="row orders-list__order">
                            <div class="col-8 col-md-10">
                                <h4 class="orders-list__item orders-list__item--header">Заказы</h4>
                            </div>
                            <div class="col-4 col-md-2">
                                <h4 class="orders-list__item orders-list__item--header orders-list__item--center">Исполнитель</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($active_orders as $active_order)
                <div class="row">
                    <div class="col-12 col-md-11 offset-md-1">
                        <div class="row orders-list__order" onclick="location.href='/order/{{$active_order->id}}'">
                            <div class="col-8 col-md-10 align-self-center">
                                <p class="orders-list__item">{{$active_order->header}}</p>
                            </div>
                            <div class="col-4 col-md-2">
                                <p class="orders-list__item orders-list__item--center">{{$active_order->choosen_master->first_name}} {{$active_order->choosen_master->last_name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

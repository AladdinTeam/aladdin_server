@extends('layouts.app')
@section('title', 'Мои заявки')
@section('styles')
    <link href="{{asset('css/general.less')}}" type="text/css" rel="stylesheet/less"/>
    <link href="{{asset('css/styles.less')}}" type="text/css" rel="stylesheet/less"/>
    {{--<link href="{{asset('css/search.less')}}" type="text/css" rel="stylesheet/less"/>--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script>
@endsection
@section('body')
    @if(isset($add_info))
        <div class="background-modal" style="display: block">
            <div class="modal">
                <div style="text-align: -moz-center; text-align: center; padding-top: 1.5rem">
                    <h4 style="font-size: 1rem; color: #605e5e; font-weight: 600">Дополните данные аккаунта</h4>
                </div>
                <form class="form form--modal" method="post" action="{{route('add_info')}}">
                    {{csrf_field()}}

                    <input type="email" class="form__input-field" name="email" placeholder="Введите e-mail" value="{{old('email')}}">
                    @if($errors->has("email"))
                        @foreach ($errors->get("email") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    <input type="text" class="form__input-field" name="first_name" placeholder="Введите фамилию" value="{{old('first_name')}}">
                    @if($errors->has("first_name"))
                        @foreach ($errors->get("first_name") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    <input type="text" class="form__input-field" name="last_name" placeholder="Введите имя" value="{{old('last_name')}}">
                    @if($errors->has("last_name"))
                        @foreach ($errors->get("last_name") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif

                    <button type="submit" class="button button--blue button--center button--bold">СОХРАНИТЬ</button>
                </form>
            </div>
        </div>
    @else
        <div class="background-modal" id="modal">
            <div class="modal">
                <a href="javascript:void(0)" class="modal__close" onclick="closeModal()">&times</a>
                <div style="text-align: -moz-center; text-align: center; padding-top: 1.5rem">
                    <h4 style="font-size: 1rem; color: #605e5e; font-weight: 600">Завершите заполнение заявки</h4>
                </div>
                <form class="form form--modal" method="post" action="{{route('save_full_order')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="order" id="order">
                    <select id="categories" name="category" class="form__input-field form__select">
                    </select>
                    @if($errors->has("category"))
                        @foreach ($errors->get("category") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    <select id="subcategories" name="subcategory" class="form__input-field form__select">
                    </select>
                    @if($errors->has("subcategory"))
                        @foreach ($errors->get("subcategory") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    <select id="subways" name="subway" class="form__input-field form__select">
                    </select>
                    @if($errors->has("subway"))
                        @foreach ($errors->get("subway") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    <input type="text" class="form__input-field" name="header" id="header" placeholder="Введите название заявки" value="{{old('header')}}">
                    @if($errors->has("header"))
                        @foreach ($errors->get("header") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    <textarea class="form__input-field" rows="3" name="description" id="description" placeholder="Введите подробное описание задачи">{{old('description')}}</textarea>
                    @if($errors->has("description"))
                        @foreach ($errors->get("description") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    <textarea class="form__input-field" rows="2" name="address" id="address" placeholder="Введите адрес">{{old('address')}}</textarea>
                    @if($errors->has("address"))
                        @foreach ($errors->get("address") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    <div class="form__input-field" style="border: none;">
                        <label for="date" style="float: left;margin-bottom: 10px;font-size: 0.8rem">Дата окончания актуальности заказа:</label>
                    </div>
                    <input class="form__input-field" id="date" name="date" placeholder="дд.мм.гггг" value="{{old('date')}}">
                    @if($errors->has("date"))
                        @foreach ($errors->get("date") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    <input type="number" class="form__input-field" placeholder="Предпологаемый бюджет" name="amount" id="amount" value="{{old('amount')}}">
                    @if($errors->has("amount"))
                        @foreach ($errors->get("amount") as $error)
                            <label class="form__error">{{$error}}</label>
                        @endforeach
                    @endif
                    <label class="form__container">Работа через безопасную сделку
                        <input type="checkbox" name="safety" id="safety" @if(old('safety') != null) checked @endif>
                        <span class="form__checkmark"></span>
                    </label>
                    <button type="submit" class="button button--blue button--center button--bold">СОХРАНИТЬ ЗАЯВКУ</button>
                </form>
            </div>
        </div>
    @endif
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
                @if(!isset($add_info))
                    @foreach($new_orders as $new_order)
                        <div class="row">
                            <div class="col-12 col-md-11 offset-md-1">
                                <div class="row orders-list__order" @if($new_order->status == -1) onclick="modal_order({{$new_order->id}})" @else onclick="location.href='/order/{{$new_order->id}}'" @endif>
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
                @endif
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
                @if(!isset($add_info))
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
                @endif
            </div>
        </div>
    </div>
@endsection

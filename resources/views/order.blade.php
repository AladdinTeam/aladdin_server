@extends('layouts.app')
@section('title', 'Поиск')
@section('styles')
    <link href="{{asset('css/general.less')}}" type="text/css" rel="stylesheet/less"/>
    <link href="{{asset('css/styles.less')}}" type="text/css" rel="stylesheet/less"/>
    {{--<link href="{{asset('css/search.less')}}" type="text/css" rel="stylesheet/less"/>--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script>
@endsection
@section('body')
    <input type="hidden" style="display: none" id="status" value="{{$order->status}}">
    <div class="background-modal" id="modal">
        <div class="modal">
            <div class="row">
                <div class="col-12" style="text-align: -moz-center; text-align: center; padding-top: 1.5rem">
                    <h4 style="font-size: 1.1rem; color: #605e5e; font-weight: 600">Подтверждение выбора</h4>
                    <p style="padding: 1rem 10px 0; font-size: 1rem">Вы уверены, что хотите выбрать предложение этого мастера?</p>
                    @if($order->safety == 1)
                        <p style="padding: 0.8rem 15px 0; font-size: 0.8rem">После подтверждения на карте будут заблокированы средства</p>
                    @endif
                </div>
            </div>
            <div class="row" style="padding: 25px 10px">
                <div class="col col-md-4 offset-md-2">
                    <form method="post" action="{{route('acceptOffer')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="master" id="master" value="">
                        <input type="hidden" name="order" id="order" value="">
                        <button class="button button--blue button--full-container">Подтвердить</button>
                        {{--<button type="submit" class="button button--blue button--full-container">Выбрать</button>--}}
                    </form>
                </div>
                <div class="col col-md-4">
                    <button class="button button--full-container" onclick="closeModal()">Отмена</button>
                </div>
            </div>
        </div>
    </div>
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
                @if($order->status == 5)
                    <div class="hint-list hint-list--border-bottom">
                        <h1 class="hint-list__header">Всё устроило, можно выполнять</h1>
                        <div class="row" style="padding: 25px 10px">
                            <div class="col ">
                                <form method="post" action="{{route('pay_order')}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="order" value="{{$order->id}}">
                                    <button type="submit" class="button button--blue button--full-container">Подтвердить</button>
                                    {{--<button type="submit" class="button button--blue button--full-container">Выбрать</button>--}}
                                </form>
                            </div>
                            <div class="col ">
                                <form method="post" action="{{route('cancel_order')}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="order" value="{{$order->id}}">
                                    <button type="submit" class="button button--full-container">Отмена</button>
                                    {{--<button type="submit" class="button button--blue button--full-container">Выбрать</button>--}}
                                </form>
                            </div>
                        </div>
                    </div>
                @elseif($order->status == 1)
                    <div class="hint-list hint-list--border-bottom">
                        <h1 class="hint-list__header">Заявка в работе</h1>
                    </div>
                @elseif($order->status == 51)
                    <div class="hint-list hint-list--border-bottom">
                        <h1 class="hint-list__header">Ожидание холда</h1>
                    </div>
                @elseif($order->status == 11)
                    <div class="hint-list hint-list--border-bottom">
                        <h1 class="hint-list__header">Ожидание оплаты</h1>
                    </div>
                @elseif($order->status == 2)
                    <div class="hint-list hint-list--border-bottom">
                        <h1 class="hint-list__header">Всё устроило, можно выполнять</h1>
                        <div class="row" style="padding: 25px 10px">
                            <div class="col ">
                                <form method="post" action="{{route('close_order')}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="order" value="{{$order->id}}">
                                    <button type="submit" class="button button--blue button--full-container">Закрыть заявку</button>
                                    {{--<button type="submit" class="button button--blue button--full-container">Выбрать</button>--}}
                                </form>
                            </div>
                            <div class="col ">
                                <form method="post" action="{{route('escalate_order')}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="order" value="{{$order->id}}">
                                    <button type="submit" class="button button--full-container">Открыть спор</button>
                                    {{--<button type="submit" class="button button--blue button--full-container">Выбрать</button>--}}
                                </form>
                            </div>
                        </div>
                    </div>
                @elseif($order->status == 3)
                    <div class="hint-list hint-list--border-bottom">
                        <h1 class="hint-list__header">Заявка закрыта</h1>
                    </div>
                @elseif($order->status == -2)
                    <div class="hint-list hint-list--border-bottom">
                        <h1 class="hint-list__header">По заявке открыт спор</h1>
                    </div>
                @endif
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
                @if($order->master_id != null) <!--Если заявка прямая-->
                    <?php
                        $st_master = $order->masters()->where('master_id', $order->master_id)->first();
                    ?>
                    @if($st_master != null) <!--Если откликнулся прямой мастер-->
                        <div class="row profile">
                            <div class="col-6 col-md-8" style="padding-bottom: 10px">
                                <a href="/profile/{{$order->master->id}}" class="profile__name--link">{{$order->master->first_name}} {{$order->master->last_name}}</a>
                            </div>
                            <div class="col-6 col-md-4">
                                {{--<form method="post" action="{{route('acceptOffer')}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="master" value="{{$order->master->id}}">
                                    <input type="hidden" name="order" value="{{$order->id}}">--}}
                                    <button {{--type="submit"--}} onclick="alert_modal({{$order->master->id}}, {{$order->id}})" class="button button--blue button--full-container">Выбрать</button>
                                {{--</form>--}}
                            </div>
                            <div class="col-4 col-sm-2 col-md-3 col-lg-3">
                                <?php
                                $photo = $order->master->photos()->where('is_avatar', 1)->first();
                                ?>
                                @if($photo != null)
                                    <img class="profile__avatar" src="{{asset(Illuminate\Support\Facades\Storage::url($photo->name))}}">
                                @else
                                    <img class="profile__avatar" src="{{asset('img/no_photo.png')}}">
                                @endif
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
                    @else <!--Если не откликнулся прямой мастер-->
                        <div class="row profile">
                            <div class="col-6 col-md-8" style="padding-bottom: 10px">
                                <a href="/profile/{{$order->master->id}}" class="profile__name--link">{{$order->master->first_name}} {{$order->master->last_name}}</a>
                            </div>
                            <div class="col-6 col-md-4">
                                {{--<button --}}{{--type="submit"--}}{{-- onclick="alert_modal({{$order->master->id}}, {{$order->id}})" class="button button--blue button--full-container">Выбрать</button>--}}
                            </div>
                            <div class="col-4 col-sm-2 col-md-3 col-lg-3">
                                <?php
                                    $photo = $order->master->photos()->where('is_avatar', 1)->first();
                                ?>
                                @if($photo != null)
                                    <img class="profile__avatar" src="{{asset(Illuminate\Support\Facades\Storage::url($photo->name))}}">
                                @else
                                    <img class="profile__avatar" src="{{asset('img/no_photo.png')}}">
                                @endif
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
                        @if($master->id == $order->master_id) <!--Не выводим второй раз предложение прямого-->

                        @else <!--Выводим остальных-->
                        <div class="row profile">
                            <div class="col-6 col-md-8" style="padding-bottom: 10px">
                                <a href="/profile/{{$master->id}}" class="profile__name--link">{{$master->first_name}} {{$master->last_name}}</a>
                            </div>
                            <!--gjsdg-->
                            <div class="col-6 col-md-4">
                                <button {{--type="submit"--}} onclick="alert_modal({{$master->id}}, {{$order->id}})" class="button button--blue button--full-container">Выбрать</button>
                            </div>
                            <div class="col-12">
                                <p class="profile__about">{{$master->master_info->about}}</p>
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
                        @endif
                    @endforeach
                @else <!--Если заявка через лучшую цену-->
                    @foreach($order->masters as $master)
                        <div class="row profile">
                            <div class="col-6 col-md-8" style="padding-bottom: 10px">
                                <a href="/profile/{{$master->id}}" class="profile__name--link">{{$master->first_name}} {{$master->last_name}}</a>
                            </div>
                            <div class="col-6 col-md-4">
                                <button {{--type="submit"--}} onclick="alert_modal({{$master->id}}, {{$order->id}})" class="button button--blue button--full-container">Выбрать</button>
                            </div>
                            <div class="col-4 col-sm-2 col-md-3 col-lg-3">
                                <?php
                                $photo = $master->photos()->where('is_avatar', 1)->first();
                                ?>
                                @if($photo != null)
                                    <img class="profile__avatar" src="{{asset(Illuminate\Support\Facades\Storage::url($photo->name))}}">
                                @else
                                    <img class="profile__avatar" src="{{asset('img/no_photo.png')}}">
                                @endif
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
                                <p class="profile__about">{{$master->master_info->about}}</p>
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
            @else <!--Если заявка не в ожидании-->
                <?php
                $st_master = $order->masters()->where('master_id', $order->work_master_id)->first();
                ?>
                <div class="row profile">
                    <div class="col-6 col-md-8" style="padding-bottom: 10px">
                        <a href="/profile/{{$order->choosen_master->id}}" class="profile__name--link">{{$order->choosen_master->first_name}} {{$order->choosen_master->last_name}}</a>
                    </div>
                    <div class="col-6 col-md-4">
                    </div>
                    <div class="col-4 col-sm-2 col-md-3 col-lg-3">
                        <?php
                        $photo = $order->choosen__master->photos()->where('is_avatar', 1)->first();
                        ?>
                        @if($photo != null)
                            <img class="profile__avatar" src="{{asset(Illuminate\Support\Facades\Storage::url($photo->name))}}">
                        @else
                            <img class="profile__avatar" src="{{asset('img/no_photo.png')}}">
                        @endif
                    </div>
                    <div class="col-8 col-sm-10 col-md-9 col-lg-9">
                        <div class="row profile__qualities">
                            <div class="col-2">
                                <img class="profile__img" src="{{asset('img/complete-order.png')}}">
                            </div>
                            <div class="col-10 align-self-center">
                                <p class="profile__quality">Выполненных заданий: {{$order->choosen_master->work_orders()->count()}}</p>
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
                        @if($order->choosen_master->master_info->card_id != null)
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
                        <p class="profile__about" style="color: #605e5e">Телефон мастера: {{$order->choosen_master->phone}}</p>
                    </div>
                    <div class="col-12">
                        <p class="profile__about">{{$order->choosen_master->master_info->about}}</p>
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
                    @if($order->additional_services != null)
                        <div class="col-12" style="margin-top: 10px;border-top: 1px solid #a0a09f">
                            <h3 style="font-size: 1.1rem; text-align: center; text-align: -moz-center; padding: 10px; color: #2f2e2e">Дополнительные услуги</h3>
                            @foreach($order->additional_services as $service)
                                <div class="row">
                                    <div class="col-4">
                                        <p style="padding: 5px; font-size: 0.9rem">{{$service->name}}</p>
                                    </div>
                                    <div class="col-2">
                                        <p style="padding: 5px; font-size: 0.9rem">{{$service->price}}</p>
                                    </div>
                                    @if($service->confirmed == 0)
                                        <div class="col-3">
                                            <form method="post" action="{{route('confirm_additional_service')}}">
                                                {{csrf_field()}}
                                                <input type="hidden" name="service" value="{{$service->id}}">
                                                <button class="button button--blue button--full-container">
                                                    Принять
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-3">
                                            <form method="post" action="{{route('cancel_additional_service')}}">
                                                {{csrf_field()}}
                                                <input type="hidden" name="service" value="{{$service->id}}">
                                                <button class="button button--full-container">
                                                    Принять
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <div class="col-6">
                                            <p style="padding: 5px; font-size: 0.9rem">Принята</p>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
@endsection
@section('scripts')
    <script>

        let status = $('#status').val();
        console.log(status);

        setInterval(function(){ checkStatus({{$order->id}}, status);}, 3000);
        /*function checkStatus(order, status) {
            console.log('gg huli');
            let csrf_token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "get",
                url: '/check_order_status',
                data: {_token: csrf_token, order: order, status: status},
                success: function (json) {
                    obj = JSON.parse(json);
                    console.log(obj.check);
                    if(obj.check){
                        location.reload(true);
                    }
                }
            })
        }*/

    </script>
@endsection
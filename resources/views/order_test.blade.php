@extends('layouts.app')
@section('title', 'Поиск')
@section('styles')
    <link href="{{asset('css/general.less')}}?v=001" type="text/css" rel="stylesheet/less"/>
    <link href="{{asset('css/styles.less')}}?v=001" type="text/css" rel="stylesheet/less"/>
    {{--<link href="{{asset('css/search.less')}}" type="text/css" rel="stylesheet/less"/>--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script>
@endsection
@section('body')
    <div class="row">
        <div class="col-12 col-lg-4 offset-lg-2" style="border: 1px solid #efefef; margin-bottom: 200px; border-radius: 10px">
            {{--<form id="form">--}}
            <div style="width: 90%; margin: 20px auto;" id="container">
                <p style="display: none;">Сантехника</p>
                <h1 id="0" style="font-size: 1.3rem; color: #2f2e2e;padding-left: 10px">Что требуется убрать?</h1>
                <label class="form__container">Квартира
                    <input type="radio" name="set" value="Квартира">
                    <span class="form__checkmark form__checkmark--radio"></span>
                </label>
                <label class="form__container">Частная постройка
                    <input type="radio" name="set" value="Частная постройка">
                    <span class="form__checkmark form__checkmark--radio"></span>
                </label>
                <label class="form__container">Офис
                    <input type="radio" name="set" value="Офис">
                    <span class="form__checkmark form__checkmark--radio"></span>
                </label>
                <label class="form__container">Нежилое помещение
                    <input type="radio" name="set" value="Нежилое помещение     ">
                    <span class="form__checkmark form__checkmark--radio"></span>
                </label>
                {{--<label class="form__container">Душевая кабина
                    <input type="checkbox" name="set" value="4">
                    <span class="form__checkmark form__checkmark"></span>
                </label>
                <label class="form__container">Другое
                    <input type="checkbox" name="set" value="6">
                    <span class="form__checkmark form__checkmark"></span>
                </label>
                <input type="text" name="gg">
                <input type="text" name="55">--}}
            </div>
            <div class="row" style="margin-bottom: 20px">
                <div class="col-6" style="text-align: center">
                    <a id="back" href="javascript:void(0)">Назад</a>
                </div>
                <div class="col-6 offset-6">
                    <button class="button button--blue" id="next">Продолжить</button>
                </div>
            </div>
            <div id="res" style="height:400px;"></div>
            {{--</form>--}}
        </div>
    </div>

   {{-- <div style="width: 90%; margin: 20px auto;" id="container">
        <p style="display: none;">Сантехника</p>
        <h1 style="font-size: 1.3rem; color: #2f2e2e;padding-left: 10px">Заказ готов к публикации</h1>
        <label style="display: none" class="form__container">Смеситель
            <input type="checkbox" name="pozhelania" value="0" checked>
            <span class="form__checkmark form__checkmark--radio"></span>
        </label>
        <input class="form__input-field" placeholder="Номер телефона">
        <input style="margin-top: 20px" class="form__input-field" placeholder="Имя">
    </div>--}}
@endsection
@section('scripts')
    <script>
        let stack = {};
        $('#next').click(function (evt) {
            //console.log($('input:checked').val());
            let inputs = $('input:checked, input[type=text], input[type=file], textarea, select');
            let name = $('h1').html();
            let id = $('h1').attr('id');
            let value = {};
            $.each(inputs, function (key, value1) {
                //value.push([$(value1).attr('name'), $(value1).val()]);
                value[$(value1).attr('name')] = $(value1).val();
            });

            //stack.push([name, value]);
            stack[id] = value;

            //console.log(stack);

            $.ajax({
                method: 'GET',
                url: '/next_step',
                data: {name: name, step: value},
                success: function (html) {
                    $('#container').html(html);
                }
            })
        });

        $('#back').click(function(){
            let length = Object.keys(stack).length;
            let value = stack[length - 1];
            let stack_key = Object.keys(stack);
            delete stack[length-1];
            //console.log(stack);
            //console.log(value)
            $.ajax({
                method: 'GET',
                url: '/prev_step',
                data: {id: stack_key[length - 1], step: value},
                success: function (html) {
                    $('#container').html(html);
                }
            })
        });
    </script>
    <script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.21.2.js"></script>
    <script>
        publish();
        function publish() {

            let channel = [<?php
                use App\Channel;
                use Illuminate\Support\Facades\Crypt;
                $channels = Channel::where('client_id', Crypt::decryptString(session('id')))->get();
                $str = '';
                foreach ($channels as $channel){
                    $str = '"'.$channel->channel.'"';
                }
                echo $str;
            ?>];

            let pubnub = new PubNub({
                publishKey : 'pub-c-1d7544c9-c8bb-470f-ad7c-fcb707268c43',
                subscribeKey : 'sub-c-b2d7d7ba-84f1-11e8-9542-023dfa3e4dae',
                //uuid: 1
            });

            /*function pub() {
                for (var i = 0; i < 500; i++) {
                    // publish 500 messages...
                    pubnub.publish({
                        channel : 'Channel-1123',
                        message : {
                            title: "title",
                            mes: "message : " + i
                        }
                    });
                }
            }*/

            function servicePublish() {
                pubnub.publish({
                    channel: 'Channel-1123',
                    message: {
                        message_id: 25,
                        user: "client",
                        is_service: true
                    }
                });
            }

            /*function publishSampleMessage() {
                console.log("Since we're publishing on subscribe connectEvent, we're sure we'll receive the following publish.");
                let publishConfig = {
                    channel : "Channel-1123",
                    message: {
                        title: "greeting",
                        description: "hello world!"
                    },
                    storeInHistory: false,
                };
                pubnub.publish(publishConfig, function(status, response) {
                    console.log(status, response);
                })
            }*/

            pubnub.addListener({
                status: function(statusEvent) {
                    if (statusEvent.category === "PNConnectedCategory") {
                        //publishSampleMessage();
                        /*pubnub.history(
                            {
                                channel: "Channel-1123",
                                count: 100, // how many items to fetch
                                stringifiedTimeToken: true, // false is the default
                            },
                            function (status, response) {
                                console.log(response);
                            }
                        );*/
                        //pub();
                    }
                },
                message: function(msg) {
                    console.log(msg.message.type);
                    /*console.log(msg/!*.message*!//!*.title*!/);
                    //console.log(msg.message.description);*/
                    /*if(!msg.message.is_service){
                        servicePublish();
                        //console.log('gg');
                    }*/
                    //
                },
                presence: function(presenceEvent) {
                }
            });

            console.log("Subscribing..");
            pubnub.subscribe(
                {
                    channels: channel,
                    withPresence: true
                },
                function (status, response) {
                    console.log(response);
                    console.log(status);
                }
            );


        }
    </script>
@endsection
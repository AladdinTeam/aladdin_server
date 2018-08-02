{{--<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>--}}
<!------ Include the above in your HEAD tag ---------->


<!DOCTYPE html>
<html class=''>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    {{--<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
    {{--<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>--}}
    {{--<script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script>--}}
    {{--<script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script>--}}
    {{--<script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex">--}}
    {{--<link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />--}}
    {{--<link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />--}}
    {{--<link rel="canonical" href="https://codepen.io/emilcarlsson/pen/ZOQZaV?limit=all&page=74&q=contact+" />--}}
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>

    {{--<script src="https://use.typekit.net/hoy3lrg.js"></script>--}}
    {{--<script>try{Typekit.load({ async: true });}catch(e){}</script>--}}
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
    <link href="{{asset('css/chat.css')}}" rel="stylesheet">
    </head>
<body>
<!--

A concept for a chat interface.

Try writing a new message! :)


Follow me here:
Twitter: https://twitter.com/thatguyemil
Codepen: https://codepen.io/emilcarlsson/
Website: http://emilcarlsson.se/

-->

<div id="frame">
    <div id="sidepanel">
        <div id="contacts">
            <ul>
                @foreach($channels as $channel)
                    <li class="contact" id="{{$channel->channel}}">
                        <div class="wrap">
                            <?php
                                $photo = $channel->master->photos()->where('is_avatar', 1)->first();
                            ?>
                            @if($photo != null)
                                <img src="{{asset(Illuminate\Support\Facades\Storage::url($photo->name))}}" alt="" />
                            @else
                                <img src="{{asset('img/no_photo.png')}}" alt="">
                            @endif

                            <div class="meta">
                                <p class="name">{{$channel->master->first_name}} {{$channel->master->last_name}}</p>
                                <p class="preview">{{$channel->order->header}}</p>
                            </div>
                        </div>
                    </li>
                @endforeach

                {{--<li class="contact active">--}}
                    {{--<div class="wrap">--}}
                        {{--<span class="contact-status busy"></span>--}}
                        {{--<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />--}}
                        {{--<div class="meta">--}}
                            {{--<p class="name">Harvey Specter</p>--}}
                            {{--<p class="preview">Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li class="contact">--}}
                    {{--<div class="wrap">--}}
                        {{--<span class="contact-status away"></span>--}}
                        {{--<img src="http://emilcarlsson.se/assets/rachelzane.png" alt="" />--}}
                        {{--<div class="meta">--}}
                            {{--<p class="name">Rachel Zane</p>--}}
                            {{--<p class="preview">I was thinking that we could have chicken tonight, sounds good?</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li class="contact">--}}
                    {{--<div class="wrap">--}}
                        {{--<span class="contact-status online"></span>--}}
                        {{--<img src="http://emilcarlsson.se/assets/donnapaulsen.png" alt="" />--}}
                        {{--<div class="meta">--}}
                            {{--<p class="name">Donna Paulsen</p>--}}
                            {{--<p class="preview">Mike, I know everything! I'm Donna..</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li class="contact">--}}
                    {{--<div class="wrap">--}}
                        {{--<span class="contact-status busy"></span>--}}
                        {{--<img src="http://emilcarlsson.se/assets/jessicapearson.png" alt="" />--}}
                        {{--<div class="meta">--}}
                            {{--<p class="name">Jessica Pearson</p>--}}
                            {{--<p class="preview">Have you finished the draft on the Hinsenburg deal?</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li class="contact">--}}
                    {{--<div class="wrap">--}}
                        {{--<span class="contact-status"></span>--}}
                        {{--<img src="http://emilcarlsson.se/assets/haroldgunderson.png" alt="" />--}}
                        {{--<div class="meta">--}}
                            {{--<p class="name">Harold Gunderson</p>--}}
                            {{--<p class="preview">Thanks Mike! :)</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li class="contact">--}}
                    {{--<div class="wrap">--}}
                        {{--<span class="contact-status"></span>--}}
                        {{--<img src="http://emilcarlsson.se/assets/danielhardman.png" alt="" />--}}
                        {{--<div class="meta">--}}
                            {{--<p class="name">Daniel Hardman</p>--}}
                            {{--<p class="preview">We'll meet again, Mike. Tell Jessica I said 'Hi'.</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li class="contact">--}}
                    {{--<div class="wrap">--}}
                        {{--<span class="contact-status busy"></span>--}}
                        {{--<img src="http://emilcarlsson.se/assets/katrinabennett.png" alt="" />--}}
                        {{--<div class="meta">--}}
                            {{--<p class="name">Katrina Bennett</p>--}}
                            {{--<p class="preview">I've sent you the files for the Garrett trial.</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li class="contact">--}}
                    {{--<div class="wrap">--}}
                        {{--<span class="contact-status"></span>--}}
                        {{--<img src="http://emilcarlsson.se/assets/charlesforstman.png" alt="" />--}}
                        {{--<div class="meta">--}}
                            {{--<p class="name">Charles Forstman</p>--}}
                            {{--<p class="preview">Mike, this isn't over.</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li class="contact">--}}
                    {{--<div class="wrap">--}}
                        {{--<span class="contact-status"></span>--}}
                        {{--<img src="http://emilcarlsson.se/assets/jonathansidwell.png" alt="" />--}}
                        {{--<div class="meta">--}}
                            {{--<p class="name">Jonathan Sidwell</p>--}}
                            {{--<p class="preview"><span>You:</span> That's bullshit. This deal is solid.</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</li>--}}
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="contact-profile">
            {{--<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />--}}
            <p style="padding-left: 5%">Harvey Specter</p>
            {{--<div class="social-media">
                <i class="fa fa-facebook" aria-hidden="true"></i>
                <i class="fa fa-twitter" aria-hidden="true"></i>
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </div>--}}
        </div>
        <div class="messages" id="messages-div">
            <ul id="messages">
                {{--<li class="sent">
                    <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
                </li>
                <li class="replies">
                    <p>When you're backed against the wall, break the god damn thing down.</p>
                </li>
                <li class="replies">
                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                    <p>Excuses don't win championships.</p>
                </li>
                <li class="sent">
                    <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                    <p>Oh yeah, did Michael Jordan tell you that?</p>
                </li>
                <li class="replies">
                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                    <p>No, I told him that.</p>
                </li>
                <li class="replies">
                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                    <p>What are your choices when someone puts a gun to your head?</p>
                </li>
                <li class="sent">
                    <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                    <p>What are you talking about? You do what they say or they shoot you.</p>
                </li>
                <li class="replies">
                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                    <p>Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
                </li>--}}
            </ul>
        </div>
        <div class="message-input">
            <div class="wrap">
                <input id="input-field" type="text" placeholder="Write your message..." disabled/>
                <i class="fa fa-paperclip attachment" aria-hidden="true" id="open-file-dialog"></i>
                <form enctype="multipart/form-data">
                    <input type="file" id="file" name="file" style="display: none">
                </form>
                <button id="input-button" class="submit" disabled><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.21.2.js"></script>
<script>
    let current_channel;

    let channel = [<?php
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

    function showMessage(field, message){
        if(message.type === "text"){
            if(message.user === "client"){
                field.html(field.html() + '<li class="replies">\n' +
                    '                    <p>'+message.text+'</p>\n' +
                    '                </li>')
            } else {
                field.html(field.html() + '<li class="sent">\n' +
                    '                    <p>'+message.text+'</p>\n' +
                    '                </li>')
            }
        } else if(message.type === "file"){
            let extension = message.file_url.split('.');
            let arr_extension = ['jpg', 'jpeg', 'png', 'bmp'];
            if(arr_extension.indexOf(extension[extension.length - 1]) !== 1){
                if(message.user === "client"){
                    field.html(field.html() + '<li class="replies">\n' +
                        '                    <p><img src="'+message.file_url+'"></p>\n' +
                        '                </li>')
                } else {
                    field.html(field.html() + '<li class="sent">\n' +
                        '                    <p><img src="'+message.file_url+'"></p>\n' +
                        '                </li>')
                }
            } else {
                if(message.user === "client"){
                    field.html(field.html() + '<li class="replies">\n' +
                        '                    <p><a href="'+message.file_url+'" target="_blank">Посмотреть файл</a></p>\n' +
                        '                </li>')
                } else {
                    field.html(field.html() + '<li class="sent">\n' +
                        '                    <p><a href="'+message.file_url+'" target="_blank">Посмотреть файл</a></p>\n' +
                        '                </li>')
                }
            }
        }
    }

    function publishTextMessage(message){
        pubnub.publish({
            channel: current_channel,
            message: {
                type: "text",
                user: "client",
                text: message
            }
        });
    }

    function publishServiceMessage(){
        pubnub.publish({
            channel: current_channel,
            message: {
                type: "service",
                user: "client",
            }
        });
    }

    pubnub.addListener({
        status: function(statusEvent) {
            if (statusEvent.category === "PNConnectedCategory") {
                $('.contact').click(function () {
                    let elems = document.getElementsByClassName('contact');
                    $.each(elems, function (index, value) {
                        $(value).attr("class", "contact");
                    });
                    $(this).attr("class", "contact active");
                    current_channel = $(this).attr('id');
                    pubnub.history(
                        {
                            channel: current_channel,
                            count: 100, // how many items to fetch
                            stringifiedTimeToken: true, // false is the default
                        },
                        function (status, response) {
                            //console.log(response);
                            let messages_filed = $('#messages');
                            let messages = response.messages.reverse();
                            let read = false;
                            $.each(messages, function (index, value) {
                                // showMessage(messages_filed, value.entry);
                                if(value.entry.type === "text"){
                                    if(value.entry.user === "client"){
                                        read = true;
                                        messages_filed.html('<li class="replies">\n' +
                                            '                    <p>'+value.entry.text+'</p>\n' +
                                            '                </li>' + messages_filed.html())
                                    } else {
                                        if(read === true) {
                                            messages_filed.html('<li class="sent">\n' +
                                                '                    <p>' + value.entry.text + '</p>\n' +
                                                '                </li>' + messages_filed.html())
                                        } else {
                                            messages_filed.html('<li class="unread">\n' +
                                                '                    <p>' + value.entry.text + '</p>\n' +
                                                '                </li>' + messages_filed.html())
                                        }
                                    }
                                } else if(value.entry.type === "service"){
                                    if(value.entry.user === "client"){
                                        read = true;
                                    }
                                } else if(value.entry.type === 'file'){
                                    let extension = value.entry.file_url.split('.');
                                    let arr_extension = ['jpg', 'jpeg', 'png', 'bmp'];
                                    if(arr_extension.indexOf(extension[extension.length - 1]) !== 1) {
                                        if (value.entry.user === "client") {
                                            messages_filed.html('<li class="replies">\n' +
                                                '                    <img src="'+value.entry.file_url+'">\n' +
                                                '                </li>' + messages_filed.html())
                                        } else {
                                            messages_filed.html(messages_filed.html() + '<li class="sent">\n' +
                                                '                    <p><img src="'+value.entry.file_url+'"></p>\n' +
                                                '                </li>' + messages_filed.html())
                                        }
                                    } else {
                                        if (value.entry.user === "client") {
                                            messages_filed.html('<li class="replies">\n' +
                                                '                    <p><a href="' + value.entry.file_url + '" target="_blank">Посмотреть файл</a></p>\n' +
                                                '                </li>' + messages_filed.html())
                                        } else {
                                            messages_filed.html(messages_filed.html() + '<li class="sent">\n' +
                                                '                    <p><a href="' + value.entry.file_url + '" target="_blank">Посмотреть файл</a></p>\n' +
                                                '                </li>' + messages_filed.html())
                                        }
                                    }
                                }
                            });
                            messages_filed.parent().scrollTop(messages_filed.parent().prop('scrollHeight'));
                        }
                    );
                    $('#input-field').attr('disabled', false);
                    $('#input-button').attr('disabled', false)
                });

                $('#input-button').click(function () {
                    let field = $('#input-field');
                    let text = field.val();
                    let file = $('#file');
                    if(file.val() !== ''){
                        let fd = new FormData;
                        fd.append('_token', '{{csrf_token()}}');
                        fd.append('channel', current_channel);
                        fd.append('file', file.prop('files')[0]);
                        $.ajax({
                            method: 'POST',
                            url: '/upload_chat_file',
                            data: fd,
                            processData: false,
                            contentType: false,
                            success: function(data){
                                pubnub.publish({
                                    channel: current_channel,
                                    message: {
                                        type: "file",
                                        user: "client",
                                        file_url: data
                                    }
                                });

                            }
                        });
                    } else {
                        if (text !== "") {
                            publishTextMessage(text);
                        }
                    }
                    field.attr('disabled', false);
                    field.val('');
                });
                
                $(window).keydown(function (evt) {
                    if(evt.which === 13){
                        let input = document.getElementById('input-field');
                        if(input === document.activeElement && input.value !== ''){
                            let text = input.value;
                            if(text !== ""){
                                publishTextMessage(text)
                            }
                            input.value = '';
                        }
                    }
                });

                $('#input-field').focus(function () {
                    let msg = $('.unread');
                    $.each(msg, function (index, value) {
                        value.className = 'sent';
                    });
                    publishServiceMessage();
                });

                $('#open-file-dialog').click(function () {
                   $('#file').click();
                });

                $('#file').change(function () {
                    let name = $(this).val().split('\\');
                    $('#input-field').val(name[name.length - 1]).attr('disabled', true);
                })
            }
        },
        message: function(msg) {
            let messages = $('#messages');
            showMessage(messages, msg.message);
            if(msg.message.type !== "service" && msg.message.user !== 'client'){
                publishServiceMessage();
            }
            messages.parent().scrollTop(messages.parent().prop('scrollHeight'));
        },
        presence: function(presenceEvent) {
        }
    });

    pubnub.subscribe(
        {
            channels: channel
        },
        function (status, response) {
            console.log(response);
            console.log(status);
        }
    );
</script>
</body>
</html>
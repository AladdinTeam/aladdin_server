@extends('layouts.auth')

@section('title', 'Подтверждение')

@section('mobile-logo')
    <a href="/"><img class="logo-img" src="{{ asset('img/new_logo.png') }}"></a>
@endsection
@section('desktop-logo')
    <a href="/"><img class="logo-img" src="{{ asset('img/new_logo.png') }}"></a>
@endsection

@section('content')
    <div class="background">
        <div class="row">
            <div class="col-12">
                {{--<div class="row">
                    <p></p>
                </div>
                <div class="row" style="margin-top: 5px">
                    <h4 class="center-align">Подтверждение данных</h4>
                </div>--}}
                <div class="row parag">
                    <div class="col-12 col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
                    <p style="color: #6E726E">На Ваш номер телефона был отправлен код подтверждения введите его ниже</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
                        <form class="form" method="post" action="{{route('confirm')}}">

                            {{csrf_field()}}

                            @if (session('unsuccess'))
                                <div class="row">
                                    <p class="error">{{session('unsuccess')}}</p>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-12">
                                    <input id="code" name="code" type="text" class="input_field_auth" placeholder="Код подтверждения">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <input type="submit" value="Подтвердить" class="button">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
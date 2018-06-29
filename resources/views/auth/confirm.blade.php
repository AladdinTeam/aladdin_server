@extends('layouts.auth')

@section('title', 'Подтверждение')

@section('styles')
    <link href="{{asset('css/general.less')}}?v=001" type="text/css" rel="stylesheet/less"/>
    <link href="{{asset('css/auth.less')}}?v=001" type="text/css" rel="stylesheet/less"/>
    {{--<link href="{{asset('css/search.less')}}" type="text/css" rel="stylesheet/less"/>--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script>
@endsection

@section('body')
    <div class="my-container">
        <div class="row">
            <div class="col-12 back">
                <a href="javascript:void(0)" class="back__close" onclick="location.href='/'">&times</a>
            </div>
            <div class="col-12">
                <h3 class="header">Подтверждение</h3>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-container form-container--right-border">
                    <form class="form" method="post" action="{{route('confirm')}}">
                        {{csrf_field()}}
                        @if (session('unsuccess'))
                            <div class="row">
                                <p class="error">{{session('unsuccess')}}</p>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <input id="code" name="code" type="text" class="form__input-field"
                                       placeholder="Код подтверждения" autocomplete="off" value="{{old('phone')}}" tabindex="1">
                            </div>
                        </div>
                        @if($errors->has("phone"))
                            @foreach ($errors->get("phone") as $error)
                                <label class="form__error">{{$error}}</label>
                            @endforeach
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <input type="submit" value="Подтвердить"
                                       class="button button--blue button--center button--full-container" tabindex="2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="register"><a href="/login" >Ввести номер телефона заново</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'В работе')

@section('mobile-logo')
    <a href="/"><img class="logo-img" src="{{ asset('img/grey_logo.png') }}"></a>
@endsection
@section('desktop-logo')
    <a href="/"><img class="logo-img" src="{{ asset('img/new_logo.png') }}"></a>
@endsection

@section('title', 'Профиль')
@section('styles')
    <link href="{{asset('css/general.css')}}" type="text/css" rel="stylesheet"/>
@endsection
@section('body')
    <img style="width: 35%; display:block; margin: 5% auto" src="{{asset('img/image_information.png')}}">
@endsection
@extends('layouts.app')
@section('title', 'Оплата')
@section('styles')
    <link href="{{asset('css/general.less')}}?v=001" type="text/css" rel="stylesheet/less"/>
    <link href="{{asset('css/styles.less')}}?v=001" type="text/css" rel="stylesheet/less"/>
    {{--<link href="{{asset('css/search.less')}}" type="text/css" rel="stylesheet/less"/>--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script>
@endsection
@section('body')
    <div id="pay_container">
        <iframe style="border:none;display:block;width:400px; margin: 0 auto; height: 530px;" src="{{session('url')}}"></iframe>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/pay-custom.js')}}"></script>
@endsection
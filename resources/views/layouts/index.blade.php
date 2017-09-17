<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - AgroYard marketplace @show</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
<div id="app">
    <header-vue :user="{{json_encode(Auth::user())}}" :translate="{{json_encode(trans('index.index'))}}" :cart-translate="{{json_encode(trans('index.cart'))}}"></header-vue>
    @yield('content')
    <footer-vue :user="{{json_encode(Auth::user())}}" :translate="{{json_encode(trans('index.footer'))}}"></footer-vue>

</div>


<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
{{--<script src="/js/svgConvert.min.js"></script>--}}
<script src="/js/jquery.maskedinput.min.js"></script>
<script src="/js/app.js"></script>
<script>
    $(".phone").mask("+38 (099) 999-99-99");
</script>
{{--<script>--}}
    {{--$(document).ready(function () {--}}
        {{--$('.svg-convert').svgConvert();--}}
    {{--})--}}
{{--</script>--}}
</body>
</html>

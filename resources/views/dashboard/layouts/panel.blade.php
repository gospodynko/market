<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title', trans('dashboard.title'))</title>
	<link rel="stylesheet" href="/css/reset.css">
	{!! Html::style('/antvel-bower/bootstrap/dist/css/bootstrap.css') !!}
	{!! Html::style('/antvel-bower/font-awesome/css/font-awesome.min.css') !!}
	<link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.0.0/dist/vue-multiselect.min.css">
	<link rel="stylesheet" href="/css/admin.css">
	<style>
		html {
			position: relative;
			min-height: 100%;
		}
		body {
			margin-top: 60px;
			margin-bottom: 60px;
		}
	</style>
</head>
<body>
	{{--<div class="container">--}}
		{{--@include ('dashboard.partials.alert')--}}
		{{--<section>--}}
			{{--<div class="page-header">--}}
				{{--<h3>--}}
					{{--<i class="glyphicon glyphicon-th-large"></i>&nbsp;--}}
					{{--@yield('sectionTitle', 'Dashboard')--}}
				{{--</h3>--}}
			{{--</div>--}}

			{{--@section('content') @show--}}
		{{--</section>--}}
	{{--</div>--}}
	<div id="app">
		<admin-header></admin-header>
		<div class="container">
		@yield(('content'))
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	{!! Html::script('/antvel-bower/bootstrap/dist/js/bootstrap.min.js') !!}
	<script src="/js/app.js"></script>
</body>
</html>

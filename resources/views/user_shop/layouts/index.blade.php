<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Панель администратора</title>
    {{--Upload image links--}}
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <!-- Bootstrap Core CSS -->
    {!! Html::style('/antvel-bower/bootstrap/dist/css/bootstrap.css') !!}
    {!! Html::style('/antvel-bower/metisMenu/dist/metisMenu.min.css') !!}
    {!! Html::style('/antvel-bower/morris.js/morris.css') !!}
    <!-- Menu CSS -->
    <!-- Menu CSS -->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.0.0/dist/vue-multiselect.min.css">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/useradmin.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<div id="wrapper">
    <header-vue></header-vue>
    <menu-vue></menu-vue>
    @yield('user-shop-content')
</div>
<!-- /#wrapper -->
{{--{!! Html::script('/antvel-bower/jquery/dist/jquery.min.js') !!}--}}
<script src="https://code.jquery.com/jquery-2.x-git.min.js"></script>
{!! Html::script('/antvel-bower/bootstrap/dist/js/bootstrap.min.js') !!}
{!! Html::script('/antvel-bower/metisMenu/dist/metisMenu.min.js') !!}
{!! Html::script('/antvel-bower/morris.js/morris.min.js') !!}
{!! Html::script('/antvel-bower/raphael/raphael.min.js') !!}
<!--Nice scroll JavaScript -->
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="/js/jquery.nicescroll.js"></script>
<script src="/js/appUserAdmin.js"></script>
<!--Wave Effects -->
<script src="/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="/js/myadmin.js"></script>
<script src="/js/dashboard1.js"></script>
</body>

</html>

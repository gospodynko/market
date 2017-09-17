@extends('layouts.index')

@section('title', trans('titles.main'))

{{ Breadcrumbs::render('home') }}
@section('content')
<main-vue :data="{{json_encode($data)}}"></main-vue>

    @endsection
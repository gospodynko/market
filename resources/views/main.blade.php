@extends('layouts.index')

@section('title', trans('titles.main'))

@section('content')
    <main-vue :data="{{json_encode($data)}}"></main-vue>
@endsection
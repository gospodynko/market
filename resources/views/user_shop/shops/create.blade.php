@extends('user_shop.layouts.index')

@section('user-shop-content')
    <shops-create-vue :data="{{json_encode($data)}}"></shops-create-vue>

@endsection
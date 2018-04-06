@extends('user_shop.layouts.index')

@section('user-shop-content')
    <update-shop-vue :shop="{{json_encode($shop)}}"></update-shop-vue>
@endsection
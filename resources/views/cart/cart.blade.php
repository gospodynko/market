@extends('layouts.index')
@section('title', trans('index.cart.cart_goods'))
@section('content')
    <cart-checkout-vue :user="{{json_encode($user)}}" :translate="{{json_encode(trans('index.cart'))}}"></cart-checkout-vue>
@endsection
@extends('layouts.index')

@section('content')
    <cart-checkout-vue :store="{{json_encode($store_id)}}" :user="{{json_encode($user)}}"></cart-checkout-vue>
@endsection
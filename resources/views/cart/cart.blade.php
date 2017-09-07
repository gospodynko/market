@extends('layouts.index')

@section('content')
    <cart-checkout-vue :user="{{json_encode($user)}}"></cart-checkout-vue>
@endsection
@extends('layouts.index')

@section('content')
    <cart-vue :translate="{{json_encode(trans('index.cart'))}}"></cart-vue>
@endsection
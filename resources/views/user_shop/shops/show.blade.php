@extends('layouts.index')

@section('title', $shop->name)
@section('content')
    <shop-vue :shop="{{json_encode($shop)}}" :categories="{{json_encode($categories)}}" :products="{{json_encode($products)}} "></shop-vue>
@endsection
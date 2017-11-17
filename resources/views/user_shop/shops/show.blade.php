@extends('layouts.index')

@section('title', $shop->name)
@section('content')
    <shop-vue :shop="{{json_encode($shop)}}" :categories="{{json_encode($categories)}}"></shop-vue>
@endsection
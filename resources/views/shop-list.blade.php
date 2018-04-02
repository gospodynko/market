@extends('layouts.index')
@section('description', 'Всi магазини Agroyard Market')
@section('content')
    <all-shops-vue :shop-list="{{json_encode($shop_list)}}" :categories="{{json_encode($categories)}}" :breadcrumbs="{}" :translate="{{json_encode(trans('index.all_shops'))}}"></all-shops-vue>
@endsection
@extends('layouts.index')
@section('content')
    <all-shops-vue :shop-list="{{json_encode($shop_list)}}" :categories="{{json_encode($categories)}}" :breadcrumbs="{}"></all-shops-vue>
@endsection
@extends('layouts.index')
@section('content')
    <all-shops-vue :shop-list="{{json_encode($shop_list)}}" :breadcrumbs="{}"></all-shops-vue>
@endsection
@extends('layouts.index')
@section('content')
    <shop-list-vue inline-template :shop_list="{{$shop_list}}">
        <div class="main-content">

        </div>
    </shop-list-vue>
@endsection
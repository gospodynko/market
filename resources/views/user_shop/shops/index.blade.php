@extends('user_shop.layouts.index')

@section('user-shop-content')

    <shops-vue :shops="{{json_encode($shops)}}"></shops-vue>
    <!-- /#page-wrapper -->
@endsection
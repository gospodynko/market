@extends('dashboard.layouts.panel')

@section('sectionTitle', trans('products.edit'))

@section('content')
    <admin-user-product-edit :data="{{json_encode($data)}}"></admin-user-product-edit>

@endsection
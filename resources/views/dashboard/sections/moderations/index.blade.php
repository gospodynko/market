@extends('dashboard.layouts.panel')

@section('sectionTitle', 'Модерация')

@section('content')
    <admin-moderation :products="{{json_encode($products)}}"></admin-moderation>
@endsection

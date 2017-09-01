@extends('dashboard.layouts.panel')

@section('sectionTitle', 'Модерация')

@section('content')
    <admin-moderation-view :product="{{json_encode($product)}}"></admin-moderation-view>
@endsection

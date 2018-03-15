@extends('layouts.index')

@section('title', $data['product']['name'])
@section('description', mb_substr($data['product']['description'], 0, 200))
@section('content')
<product-list   :data="{{json_encode($data)}}"
                :user="{{json_encode(Auth::user())}}"
                :translate="{{json_encode(trans('index.product'))}}"
                :breadcrumbs="{{ json_encode(Breadcrumbs::render('product', $data['product'])) }}">
</product-list>
@endsection
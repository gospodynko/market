@extends('layouts.index')

@section('title', $data['cat_name'])
@section('description', 'Всi оголошення з категорії ' . $data['cat_name'])
@section('content')
    @if($category->parent)
        <category-vue :data="{{json_encode($data)}}" :translate="{{json_encode(trans('index.search'))}}" :breadcrumbs="{{json_encode(Breadcrumbs::render('subcategory', $category))}}"></category-vue>
    @else
        <category-vue :data="{{json_encode($data)}}" :translate="{{json_encode(trans('index.search'))}}" :breadcrumbs="{{json_encode(Breadcrumbs::render('category', $category))}}"></category-vue>
    @endif

@endsection
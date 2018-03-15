@extends('layouts.index')

@section('title', 'Сторiнка № ' . $data['products']->currentPage() . ' - ' . $data['cat_name'])
@section('description', 'Всi оголошення з категорії ' . $data['cat_name'])
@section('paginate')
    @if($data['products']->currentPage() === 1 && $data['products']->currentPage() !== $data['products']->lastPage())
        <link rel="next" href="{{Request::url()}}?page={{$data['products']->currentPage() + 1}}" />
    @else
        @if($data['products']->currentPage() !== $data['products']->lastPage())
            <link rel="next" href="{{Request::url()}}?page={{$data['products']->currentPage() + 1}}" />
        @endif
        <link rel="prev" href="{{Request::url()}}?page={{$data['products']->currentPage() - 1}}" />
    @endif
@endsection
@section('content')
{{--    {{dd($data['products']->currentPage())}}--}}
    @if($category->parent)
        <category-vue :data="{{json_encode($data)}}" :translate="{{json_encode(trans('index.search'))}}" :breadcrumbs="{{json_encode(Breadcrumbs::render('subcategory', $category))}}"></category-vue>
    @else
        <category-vue :data="{{json_encode($data)}}" :translate="{{json_encode(trans('index.search'))}}" :breadcrumbs="{{json_encode(Breadcrumbs::render('category', $category))}}"></category-vue>
    @endif

@endsection
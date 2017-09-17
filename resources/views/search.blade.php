@extends('layouts.index')

@section('title', $data['q'] .' - '. trans('titles.search'))

@section('content')
    <search-vue :data="{{json_encode($data)}}" :translate="{{json_encode(trans('index.search'))}}"></search-vue>
@endsection
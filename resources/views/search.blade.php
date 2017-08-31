@extends('layouts.index')

@section('content')
    <search-vue :data="{{json_encode($data)}}"></search-vue>
@endsection
@extends('layouts.index')

@section('content')
<product-list :data="{{json_encode($data)}}" :user="{{json_encode(Auth::user())}}"></product-list>
@endsection
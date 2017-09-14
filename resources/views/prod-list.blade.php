@extends('layouts.index')

@section('content')
<product-list :data="{{json_encode($data)}}" :user="{{json_encode(Auth::user())}}" :translate="{{json_encode(trans('index.product'))}}"></product-list>
@endsection
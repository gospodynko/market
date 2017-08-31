@extends('layouts.index')

@section('content')
<product-list :data="{{json_encode($data)}}"></product-list>
@endsection
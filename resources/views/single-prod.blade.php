@extends('layouts.index')

@section('description', $data['product']['description'])

@section('content')
<product-vue></product-vue>
@endsection
@extends('layouts.index')

@section('content')
<main-vue :data="{{json_encode($data)}}"></main-vue>

    @endsection
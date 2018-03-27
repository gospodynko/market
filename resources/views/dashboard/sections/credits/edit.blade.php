@extends('dashboard.layouts.panel')

@section('sectionTitle')

@section('content')
    {{--<credits-edit :credit="{{json_encode($credit)}}"></credits-edit>--}}
    <credits-edit :credit="{{json_encode($credit)}}" :regions="{{json_encode($regions)}}"></credits-edit>
@endsection

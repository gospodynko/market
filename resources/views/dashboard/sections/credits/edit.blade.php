@extends('dashboard.layouts.panel')

@section('sectionTitle')

@section('content')
    <credits-edit :credit="{{json_encode($credit)}}"></credits-edit>
@endsection

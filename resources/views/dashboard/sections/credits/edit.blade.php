@extends('dashboard.layouts.panel')

@section('sectionTitle')

@section('content')
    <credits-edit :credits="{{json_encode($credits)}}"></credits-edit>
@endsection

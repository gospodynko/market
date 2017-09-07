@extends('dashboard.layouts.panel')

@section('sectionTitle', 'Платежные системы')

@section('content')
    <payments-list :payments="{{json_encode($payments)}}"></payments-list>
@endsection

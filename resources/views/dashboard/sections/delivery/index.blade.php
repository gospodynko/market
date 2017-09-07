@extends('dashboard.layouts.panel')

@section('sectionTitle', 'Платежные системы')

@section('content')
    <deliveries-list :deliveries="{{json_encode($deliveries)}}"></deliveries-list>
@endsection

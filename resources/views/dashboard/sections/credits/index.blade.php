@extends('dashboard.layouts.panel')

@section('sectionTitle', 'Кредитные союзы')

@section('content')
    <credits-list :credits="{{json_encode($credits)}}"></credits-list>
@endsection

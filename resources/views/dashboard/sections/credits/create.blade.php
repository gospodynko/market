@extends('dashboard.layouts.panel')

@section('sectionTitle', 'Кредитнi союзи')

@section('content')
    <credits-create :data="{{json_encode($data)}}"></credits-create>
@endsection


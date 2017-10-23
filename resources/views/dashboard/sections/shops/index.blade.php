@extends('dashboard.layouts.panel')

@section('sectionTitle', 'Магазини')

@section('content')
<shops-vue :shops="{{$shops}}"></shops-vue>

@endsection
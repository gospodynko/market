@extends('dashboard.layouts.panel')

@section('sectionTitle', trans('dashboard.nav.categories'))

@section('content')
<admin-categories :categories="{{json_encode($categories)}}"></admin-categories>
@endsection

@extends('dashboard.layouts.panel')

@section('sectionTitle', trans('dashboard.nav.categories'))

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a href="/admin/banner/create" class="btn btn-success">
                {{ trans('banners.create') }}
            </a>
            <hr>
        </div>
    </div>
    <admin-banners :banners="{{json_encode($banners)}}"></admin-banners>

@endsection

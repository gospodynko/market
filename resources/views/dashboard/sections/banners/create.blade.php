@extends('dashboard.layouts.panel')

@section('sectionTitle', trans('dashboard.nav.categories'))

@section('content')
    <div class="row">
        <div class="col-lg-12">
            {{--<a href="{{ route('categories.create') }}" class="btn btn-success">--}}
                {{--{{ trans('banners.create') }}--}}
            {{--</a>--}}
            <hr>
        </div>
    </div>
    <admin-banners-create></admin-banners-create>

@endsection

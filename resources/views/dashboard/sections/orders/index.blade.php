@extends('dashboard.layouts.panel')

@section('sectionTitle', trans('globals.products'))

@section('content')
    <div class="row">
        <div class="col-lg-12">
            {{--<a href="{{ url('admin/products/create') }}" class="btn btn-success">--}}
                {{--{{ trans('products.create') }} користувача--}}
            {{--</a>--}}
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

            <table class="table table-hover">
                <thead>
                <th class="text-center">{{ trans('globals.id') }}</th>
                <th class="text-left">Користувач (тел)</th>
                <th class="text-left">Користувач (iм'я, прiзвище)</th>
                <th class="text-left">Коментар</th>
                <th class="text-center">{{ trans('globals.created_at') }}</th>
                <th class="text-center">{{ trans('globals.updated_at') }}</th>
                <th class="text-center">{{ trans('globals.action') }}</th>
                </thead>
                <tbody>
                @foreach ($data['orders'] as $order)
                    <tr>
                        <td class="text-center">{{ $order->id }}</td>
                        <td class="text-left">{{ str_limit($order->buyer->phone, 30) }}</td>
                        <td class="text-left">{{ $order->buyer->first_name . ' ' . $order->buyer->last_name }}</td>
                        <td class="text-left">{{ $order->comment }}</td>

                        <td class="text-center">{{ $order->created_at }}</td>
                        <td class="text-center">{{ $order->updated_at }}</td>
                        <td class="text-center">
                            <a href="/admin/user-products/{{$order->id}}/edit" class="btn btn-primary btn-sm">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            <a href="{{ route('products-user.admin.delete', ['item' => $order->id]) }}" class="btn btn-danger btn-sm">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{--<div class="row">--}}
    {{--<div class="col-lg-12">--}}
    {{--<hr>--}}
    {{--{!! $data['user_product']->render() !!}--}}
    {{--</div>--}}
    {{--</div>--}}

@endsection

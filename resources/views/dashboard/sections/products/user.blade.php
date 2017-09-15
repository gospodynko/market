@extends('dashboard.layouts.panel')

@section('sectionTitle', trans('globals.products'))

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<a href="{{ url('admin/products/create') }}" class="btn btn-success">
				{{ trans('products.create') }} користувача
			</a>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">

			<table class="table table-hover">
				<thead>
					<th class="text-center">{{ trans('globals.id') }}</th>
					<th class="text-left">Продукт</th>
					<th class="text-left">Магазин</th>
					<th class="text-left">Цена (грн)</th>
					<th class="text-center">{{ trans('globals.status') }}</th>
					<th class="text-center">{{ trans('globals.created_at') }}</th>
					<th class="text-center">{{ trans('globals.updated_at') }}</th>
					<th class="text-center">{{ trans('globals.action') }}</th>
				</thead>
				<tbody>
					@foreach ($data['user_product'] as $product)
						{{--{{dd($product->toArray())}}--}}
						<tr>
							<td class="text-center">{{ $product->id }}</td>
							<td class="text-left">{{ $product->mainProduct->name}}</td>
							<td class="text-left">{{ $product->shop ? $product->shop->name : 'магазин удален' }}</td>
							<td class="text-left">{{ $product->price }}</td>
							<td class="text-center">
								@if ($product->status)
									<span class="label label-success">{{ trans('globals.active') }}</span>
								@else
									<span class="label label-danger">{{ trans('globals.inactive') }}</span>
								@endif
							</td>
							<td class="text-center">{{ $product->created_at }}</td>
							<td class="text-center">{{ $product->updated_at }}</td>
							<td class="text-center">
								<a href="/admin/user-products/{{$product->id}}/edit" class="btn btn-primary btn-sm">
									<i class="glyphicon glyphicon-edit"></i>
								</a>
								<a href="{{ route('products-user.admin.delete', ['item' => $product->id]) }}" class="btn btn-danger btn-sm">
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

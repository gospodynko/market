@extends('dashboard.layouts.panel')

@section('sectionTitle', 'Виробники')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<a href="{{ url('admin/producers/create') }}" class="btn btn-success">
				Додати виробника
			</a>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">

			<table class="table table-hover">
				<thead>
					<th class="text-center">{{ trans('globals.id') }}</th>
					<th class="text-left">{{ trans('globals.name') }}</th>
					<th class="text-left">{{ trans('globals.category') }}</th>
					<th class="text-center">{{ trans('globals.created_at') }}</th>
					<th class="text-center">{{ trans('globals.updated_at') }}</th>
					<th class="text-center">{{ trans('globals.action') }}</th>
				</thead>
				<tbody>
                    @foreach ($producers as $producer)
						<tr>
							<td class="text-center">{{ $producer->id }}</td>
						<td class="text-left">{{ str_limit($producer->name, 30) }}</td>
						<td class="text-left">@foreach($producer->categories AS $category) {{ $category }}&nbsp; @endforeach</td>
							<td class="text-center">{{ $producer->created_at }}</td>
							<td class="text-center">{{ $producer->updated_at }}</td>
							<td class="text-center">
								<a href="{{ route('admin.producers.edit', ['item' => $producer->id]) }}" class="btn btn-primary btn-sm">
									<i class="glyphicon glyphicon-edit"></i>
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection

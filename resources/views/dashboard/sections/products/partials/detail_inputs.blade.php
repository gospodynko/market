<div class="panel panel-info">
	<div class="panel-heading"><i class="glyphicon glyphicon-menu-right"></i>&nbsp;{{ trans('globals.details') }}</div>
	<div class="panel-body">

		<div class="form-group">
			<label for="name">{{ trans('globals.name') }}:</label>
			<input type="text" class="form-control" name="name" value="{{ $item->name ?? old('name') }}">
		</div>

		<div class="form-group">
			<label for="name">{{ trans('globals.category') }}:</label>
			<select name="category" class="form-control">
				@foreach ($categories as $category)
					<option value="{{ $category->id }}" @if (($item->category_id ?? old('category')) == $category->id) selected="selected" @endif >
						{{ is_null($category->category_id) ? '&bull;' : '&nbsp;&nbsp;&nbsp;-' }}
						&nbsp;
						{{ ucfirst($category->name) }}
					</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label for="name">{{ trans('globals.bar_code') }}:</label>
			<input type="text" class="form-control" name="bar_code" value="{{ $item->bar_code ?? old('bar_code') }}">
		</div>

		<div class="form-group">
			<label for="description">{{ trans('globals.description') }}:</label>
			<textarea class="form-control" name="description" id="" cols="30" rows="2">{{ $item->description ?? old('description') }}</textarea>
		</div>

	</div>
</div>

<template>
    <form action="#" method="POST" role="form" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading"><i class="glyphicon glyphicon-menu-right"></i>&nbsp;{{ trans('globals.details') }}</div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label for="name">Категорія:</label>
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

            </div>
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading"><i class="glyphicon glyphicon-menu-right"></i>&nbsp;{{ trans('products.features') }}</div>
                    <div class="panel-body">

                        @foreach ($features as $feature)
                            <div class="form-group col-lg-6">
                        <label for="{{ $feature->name }}">{{ ucfirst($feature->name) }}:</label>
                        @if (isset($item))
                            <input type="{{ $feature->type }}" class="form-control" name="features[{{ $feature->name }}]" value="{{ $item->features[$feature->name] ?? old($feature->name) }}">
                        @else
                            <input type="{{ $feature->type }}" class="form-control" name="features[{{ $feature->name }}]" value="{{ old($feature->name) }}">
                        @endif
                    </div>
                        @endforeach

                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading"><i class="glyphicon glyphicon-menu-right"></i>&nbsp;Pictures</div>
                    <div class="panel-body">

                        @for ($i=1; $i<=$MAX_PICS; $i++)
                                @if (isset($item) && isset($item->features['images'][$i]))
                                    <div class="form-group">
                        <label for="">{{ trans('products.picture') }} #{{ $i }}: </label>
                        <div class="input-group">
							<span class="input-group-addon">
								<input type="checkbox" name="_pictures_delete[{{ $i }}]">&nbsp;<span class="label label-danger">{{ trans('globals.delete') }}</span>
								<input type="hidden" name="_pictures_current[{{ $i }}]" value="">
							</span>
                            <input type="file" class="form-control" name="_pictures_file[{{ $i }}]">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#image_{{ $i }}">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>

                        </div>

                        @include ('dashboard.partials.image', [
                            'modalId' => $i,
                            'image' => $item->features['images'][$i]
                        ])

                    </div> {{-- form-group --}}
				@else
					<div class="form-group">
                        <label for="">{{ trans('products.picture') }} #{{ $i }}: </label>
                        <input type="file" class="form-control" name="pictures[{{ $i }}]">
                    </div>
                        @endif

                @endfor

            </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <hr>
                <a href="{{ route('items.index') }}" class="btn btn-danger">
                    <i class="glyphicon glyphicon-remove"></i>&nbsp;
                    {{ trans('globals.close_label') }}
					</a>
                <button type="submit" class="btn btn-success">
                    <i class="glyphicon glyphicon-send"></i>&nbsp;
                    {{ trans('globals.submit') }}
					</button>
            </div>
        </div>

    </form>
</template>

<script type="text/babel">
    export default{
        data(){
            return{

            }
        }
    }
</script>
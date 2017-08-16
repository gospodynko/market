@extends('layouts.master')
@section('title')@parent - @if ($producer['id'] == '')
    Додати виробника
@else

    {{ str_replace('[prod]', '"'.$producer->name.'"', trans('product.form_edit_title')) }}

@endif
@stop
@section('page_class') products-create @stop
@section('content')
    @parent
@section('center_content')

    <div class="page-header">
        <h5>
            @if (isset($producer['id']))
                Редагування {{ $producer->name }}
            @else
                Додати виробника
            @endif
        </h5>
    </div>

    <div class="row">&nbsp;</div>
    <div class="row">
        <div class="col-md-12">

            @include('partial.message')

            @if(!$edit)
                {!! Form::model(Request::all(),['url'=>'admin/producers/create', 'class'=>'form-horizontal', 'role'=>'form']) !!}
            @else
                {!! Form::model($producer,['route'=>['admin.producers.update',$producer],'method'=>'PUT','class'=>'form-horizontal','role'=>'form']) !!}
            @endif
            <div  ng-class="defaultClass">

                <div class="form-group" >
                    <div class="col-sm-4">
                        {!! Form::label('category_id[]',trans('product.globals.categories')) !!}:&nbsp;

                        <select name="category_id[]" id="category_id[]" class="form-control" required multiple style="min-height:160px;">
                            @foreach($categories AS $id=>$name)
                                @if($id == '')
                                    <option disabled>{{ $name }}</option>
                                @elseif($edit && in_array($id, array_keys($producer->getCategories())))
                                    <option selected value="{{ $id }}">{{ $name }}</option>
                                @else
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">
                        {!! Form::label('name',trans('product.inputs_view.name')) !!}:&nbsp;
                        {!! Form::text('name',null,['class'=>'form-control',false,'required']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <input type="hidden" name="type" value="item">
                    <button type="submit" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;{{ trans('product.globals.save') }}</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>

    </div>

@stop
@stop
@section('scripts')
    @parent
    {!! Html::script('/js/vendor/file-upload/angular-file-upload-shim.min.js') !!}
    {!! Html::script('/js/vendor/file-upload/angular-file-upload.min.js') !!}

    <script>
        (function(app){
            app.controller('upload', ['$scope', '$upload', '$timeout','$http', function ($scope, $upload, $timeout, $http) {


            }]);
        })(angular.module("AntVel"))
    </script>
@stop

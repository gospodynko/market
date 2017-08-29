@extends('layouts.master')
@section('title')@parent - @if ($product['id'] == '')

                            {{ trans('product.form_create_title') }}

                            @else

                            {{ str_replace('[prod]', '"'.$product->name.'"', trans('product.form_edit_title')) }}

                            @endif
@stop
@section('page_class') products-create @stop
@section('content')
    @parent
    @section('panel_left_content')
        @include('user.partial.menu_dashboard')

        @if (isset($product['id']) && auth()->check() && auth()->user()->id == $product->created_by)
        <div class="row hidden-xs">
            <div class="col-md-12">
                {!! Form::open(['route' => ['products.users.change_status', $product->id], 'method' => 'post', 'class' => 'form-inline']) !!}
                <button type="submit" class="btn btn-primary @if ($product->status) btn-danger @else btn-success @endif btn-sm full-width">
                    <span class="glyphicon @if ($product->status) glyphicon-ban-circle @else glyphicon-ok-circle @endif"></span>&nbsp;
                    {{ $product->status ? trans('globals.unavailable') : trans('globals.available') }}
                </button>

                <div class="row">&nbsp;</div>
                {!! Form::close() !!}
            </div>
        </div>
        @endif
    @stop
    @section('center_content')

        <div class="page-header">
            <h5>
                @if (isset($product['id']))
                    {{ trans('product.form_edit_title', [ 'prod' => $product->mainProduct->name ]) }}
                @else
                    {{ trans('product.form_create_title') }}
                @endif
            </h5>
        </div>

        <div class="row">&nbsp;</div>
        <div class="row">
        <div class="col-md-12">

            @include('partial.message')

            @if(!$edit)

                {!! Form::model(Request::all(),['url'=>'products', 'class'=>'form-horizontal', 'role'=>'form']) !!}
            @else
                    {{-- {{dd($product)}}            --}}
                {!! Form::model($product,['route'=>['products.update',$product],'method'=>'PUT','class'=>'form-horizontal','role'=>'form']) !!}
            @endif
                <div  ng-class="defaultClass">

                    <div class="form-group" >
                        <div class="col-sm-3">
                            {!! Form::label('category_id',trans('product.globals.categories')) !!}:&nbsp;
                            {!! Form::select('category_id',$categories,null,['class'=>'form-control',$disabled=>$disabled,'required']) !!}
                        </div>
                        <div class="col-sm-3" @if (!isset($product['id'])) style="display:none" @endif id="producers_section">
                            {!! Form::label('producer_id',trans('globals.producer')) !!}:
                            <select name="producer_id" id="producer_id" class="form-control" required>
                                @foreach($producers AS $id=>$name)
                                    @if($edit && $product->producer_id == $id)
                                        <option selected value="{{ $id }}">{{ $name }}</option>
                                    @else
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3" @if (!isset($product['id'])) style="display:none" @endif id="products_section">
                            {!! Form::label('product_id',trans('globals.product')) !!}:
                            {!! Form::select('product_id',isset($productTypes) ? $productTypes : [],null,['class'=>'form-control',$disabled=>$disabled,'required']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4">
                            {!! Form::label('price',trans('product.globals.price')) !!}:&nbsp;
                            {!! Form::number('price',null,['class'=>'form-control','step'=>'any','required']) !!}
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('currency',trans('globals.currency')) !!}:&nbsp;
                            <select name="currency" id="currency" class="form-control" required>
                                <option disabled @if (!isset($product['id'])) selected @endif>Виберіть валюту</option>
                                @foreach($currencies AS $id=>$name)
                                    @if($id == '')
                                        <option disabled>{{ $name }}</option>
                                    @elseif($edit && $product->currency_id == $id)
                                        <option selected value="{{ $id }}">{{ $name }}</option>
                                    @else
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group ng-cloak">
                        <div class="col-sm-4">
                            {!! Form::label('delivery_id[]',trans('product.globals.delivery_type')) !!}:
                            <select name="delivery_id[]" id="delivery_id[]" class="form-control" required multiple style="overflow-y: hidden;">
                                @foreach($deliveryTypes AS $id=>$name)
                                    @if($id == '')
                                        <option disabled>{{ $name }}</option>
                                    @elseif($edit && in_array($id, array_keys($product->getDeliveryArray())))
                                        <option selected value="{{ $id }}">{{ $name }}</option>
                                    @else
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            {!! Form::label('pay_id[]',trans('product.globals.pay_type')) !!}:&nbsp;
                            <select name="pay_id[]" id="pay_id[]" class="form-control" required multiple style="overflow-y: hidden;">
                                @foreach($payTypes AS $id=>$name)
                                    @if($id == '')
                                        <option disabled>{{ $name }}</option>
                                        @elseif($edit && in_array($id, array_keys($product->getPayArray())))
                                        <option selected value="{{ $id }}">{{ $name }}</option>
                                    @else
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endif
                                @endforeach
                            </select>
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
                $scope.$watch('files', function () {
                    $scope.upload($scope.files);
                });

                $scope.file='';
                $scope.type_file='';
                $scope.successClass="";
                $scope.progress='';
                $scope.error='';

                $scope.upload = function (files) {
                    if (files && files.length && ($scope.type_file==''||$scope.type_file=='key'||$scope.type_file=='software')) {
                        for (var i = 0; i < files.length; i++) {
                            var file = files[i];
                            var url='/products/upload'+($scope.type_file!=''?'_'+$scope.type_file:'');
                            $upload.upload({
                                url: url,
                                fields: {"_token":'{{ csrf_token() }}',"_method":"POST"},
                                file: file
                            }).progress(function (evt) {
                                 var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                                 $scope.progress= progressPercentage + '% ';
                            }).success(function (data, status, headers, config) {
                                if(data.indexOf("Error:")> -1){

                                    $scope.progress='';
                                    $scope.error=data;
                                    $timeout(function(){
                                        $scope.error= '';
                                    }, 5000);

                                }else{
                                    old=$scope.file;
                                    $scope.file=data;
                                    $scope.error='';
                                    $timeout(function(){
                                        $scope.progress= '';
                                    }, 1000);

                                    if(old){
                                        $scope.delete(old);
                                    }

                                }

                            });
                        }
                    }
                };

                $scope.delete = function (old) {
                    file = old || $scope.file;
                    if (file) {

                        $http.post('/products/delete_img',{'file':file}).
                              success( function(data) {
                                    if (parseInt(data)==1 && !old) {
                                        $scope.file='';
                                    }

                              });
                    }
                };

            }]);
        })(angular.module("AntVel"))
        $(document).ready(function () {
            $('#category_id').on('change', function () {
               var cat_id = $('#category_id option:selected').val();
                $.ajax({
                    url: "{{ route('admin.producers.getlist') }}",
                    type: "GET",
                    data: {
                        category_id: cat_id
                    },
                    success: function (data) {
                        $('#products_section').hide();
                        $('#producer_id').empty();

                        if(data.length > 0){
                            var elem = '<option value="false" disabled selected="selected">Оберіть виробника</option>';
                            data.forEach(function (el) {
                                elem += '<option value="'+el.id+'">'+el.name+'</option>';
                            })
                        } else {
                            var elem = '<option value="0" disabled selected="selected">Виробники відсутні</option>';
                        }
//
                        $('#producer_id').append(elem);
                        $('#producers_section').show();

                        $('#producer_id').on('change', function () {
                            var producer_id = $('#producer_id option:selected').val();
                            $.ajax({
                                url: "{{ route('products.admin.getlistByProduser') }}",
                                type: "GET",
                                data: {
                                    producer_id: producer_id
                                },
                                success: function (data) {
                                    $('#product_id').empty();
                                    data = JSON.parse(data);

                                    if (data.length > 0) {
                                        var elem = '<option value="false" disabled selected="selected">Оберіть продукт</option>';
                                        data.forEach(function (el) {
                                            elem += '<option value="' + el.id + '">' + el.name + '</option>';
                                        })
                                    } else {
                                        var elem = '<option value="0" disabled selected="selected">Продукти відсутні</option>';
                                    }
//
                                    $('#product_id').append(elem);
                                    $('#products_section').show();
                                }
                            });
                        });
                    }
                });
            });
        })
    </script>
@stop
@section('before.angular') ngModules.push('angularFileUpload'); @stop

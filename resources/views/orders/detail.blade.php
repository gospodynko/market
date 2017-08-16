@extends('layouts.master')
@section('title')@parent - {{ trans('store.OrderDetails') }}  @stop
@section('page_class') 'products_view' @stop

@section('css')
    @parent
@stop

@include('partial.message')

@section('content')
    @parent
    @section('panel_left_content')
        @include('user.partial.menu_dashboard')
    @stop

    @section('center_content')

    <div ng-controller="StoreProducts" ng-cloak>

        <div class="page-header">
            <h5>{{ trans('store.OrderDetails') }} <small>&nbsp;/&nbsp;{{ trans('store.ordered_on') }}&nbsp;{{ Carbon\Carbon::parse($order->created_at)->format('F j, Y') }}</small></h5>
        </div>

        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">

                    @if (count($order_comments))
                        <li>
                            <span class="glyphicon glyphicon-comment"></span>&nbsp;
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#comments_panel">
                                {{ trans('store.view_comments') }}&nbsp;<span class="badge">{{ count($order_comments) }}</span>
                            </a>
                        </li>
                    @endif

                    <li>
                        <span class="glyphicon glyphicon-envelope"></span>&nbsp;
                        <a href="javascript:void(0);" ng-controller="ModalCtrl" ng-click="modalOpen({templateUrl:'/user/orders/comment/{{ $order->id }}',controller:'CommentControllerModal',resolve:'comment'})">
                            {{ isset($is_buyer) ? trans('store.show_order_details_view.contact_seller') : trans('store.contactBuyer') }}
                        </a>
                    </li>

                    @if(isset($is_buyer))

                        @if ($order->status == 'open')
                            <li>
                                <span class="glyphicon glyphicon-remove"></span>&nbsp;
                                <a href="{{ route('orders.cancel', $order->id) }}">{{ trans('store.cancel_order') }}</a>
                            </li>
                        @endif

                        @if ($order->status == 'sent')
                            <li>
                                <span class="glyphicon glyphicon-thumbs-up"></span>
                                <a href="{{ route('orders.close', $order->id) }}">{{ trans('store.show_order_details_view.mark_as_received') }}</a>
                            </li>
                        @endif

                        @if ($order->status == 'closed' && !($order->rate))
                            <li>
                                <span class="glyphicon glyphicon-star"></span>
                                <a href="javascript:void(0);" ng-controller="ModalCtrl" ng-click="modalOpen({templateUrl:'/user/orders/rate/{{ $order->id }}',controller:'RateOrdersControllerModal',resolve:'order'})">
                                    {{ trans('store.show_order_details_view.rate_this_order') }}
                                </a>
                            </li>
                        @endif

                    @elseif(isset($is_seller))

                        @if ($order->status == 'open')
                            <li>
                                <span class="glyphicon glyphicon-check"></span>&nbsp;
                                <a href="{{ route('orders.start', $order->id) }}">{{ trans('store.startProcessing') }}</a>
                            </li>
                        @endif

                        @if ($order->status == 'pending')
                            <li>
                                <span class="glyphicon glyphicon-send"></span>&nbsp;
                                <a href="{{ route('orders.send', $order->id) }}">{{ trans('store.order_sent') }}</a>
                            </li>
                        @endif

                        @if ($order->status == 'open')
                            <li>
                                <span class="glyphicon glyphicon-remove"></span>&nbsp;
                                <a href="{{ route('orders.cancel', $order->id) }}">{{ trans('store.cancelOrder') }}</a>
                            </li>
                        @endif

                    @endif
                </ol>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body" style="font-size: 12px; color: #000;">

                <div class="row">

                     <div class="col-md-6">
                        <label>
                            <strong>
                                {{ trans('store.order_summary') }}
                            </strong>
                        </label>

                        <div>{{ trans('store.status') }}:&nbsp;<strong>{{ trans('globals.order_status.'.$order->status) }}</strong></div>
                        <div>{{ trans('store.num_of_items') }}:&nbsp;<strong>{{ $totalItems }}</strong></div>

                        {{--<label>--}}
                            {{--<strong>--}}
                                {{--<div>{{ trans('store.grand_total') }}:&nbsp;{{ Utility::showPrice($grandTotal) }}</div>--}}
                            {{--</strong>--}}
                        {{--</label>--}}

                     </div>
                </div>
            </div>

            <div class="panel-footer">
                @if(isset($is_buyer))
                    <a href="{{ route('orders.show_orders') }}" class="btn btn-primary btn-sm">
                        <span class="glyphicon glyphicon-step-backward"></span>&nbsp;
                        {{ trans('store.show_order_details_view.back_to_orders') }}
                    </a>
                    <a href="/" class="btn btn-success btn-sm">
                        {{ trans('store.continue_shopping') }}
                        &nbsp;<span class="glyphicon glyphicon-shopping-cart"></span>
                    </a>
                @elseif(isset($is_seller))
                    <a href="{{ route('orders.pendingOrders') }}" class="btn btn-primary btn-sm">
                        <span class="glyphicon glyphicon-step-backward"></span>&nbsp;
                        {{ trans('store.show_order_details_view.back_to_sales') }}
                    </a>
                @endif
            </div>

        </div>

        <div class="row collapse" id="comments_panel">
            <div class="col-md-12">
                <div class="page-header">
                    <h5><span class="glyphicon glyphicon-comment"></span>&nbsp;{{ trans('store.order_comments') }}</h5>
                </div>
                <div>
                    @include('orders.partial.comments', ['order' => $order, 'comments' => $order_comments])
                </div>
            </div>
        </div>

        <div class="panel panel-primary">

            <div class="panel-heading">
                <h6>
                    <span class="glyphicon glyphicon-folder-open"></span>&nbsp;
                    {{ trans('store.order_items') }}
                </h6>
            </div>

            <div class="panel-body">

                <div class="row">

                    <div class="col-md-12">

                        <div class="row ng-hide hidden-xs">
                            <div class="col-md-9">
                                &nbsp;
                            </div>
                            <div class="col-md-1 text-center">
                                <h6>{{ trans('store.quantity') }}</h6>
                            </div>
                            <div class="col-md-1 text-center">
                                <h6>{{ trans('store.price') }}</h6>
                            </div>
                            <div class="col-md-1">&nbsp;</div>
                        </div>

                        <hr/>

                        @foreach ($order->details as $detail)

                        <div class="row">

                            <div class="row">
                                <div class="col-md-2 col-xs-4 text-center">
                                    <img  class="img-rounded" src='{{ \App\Models\Product::images($detail->product->mainProduct)[0]}}' alt="{{ $detail->product->mainProduct->name }}" width="90" height="90">
                                </div>

                                <div class="col-md-7 col-xs-8">
                                    <h6>
                                        <a href="{{ action('ProductsController@showStoreProduct', $detail->product->id) }}">{{ $detail->product->mainProduct->name }}</a>
                                        <p>{{ trans('globals.producer').': '.$detail->product->mainProduct->producer->name }}</p>
                                        @if ($detail->rate)
                                            <br>
                                            <small>
                                                <label>{{ trans('store.order_rating_value') }}:</label>&nbsp;
                                                {{ Utility::showRate($detail->rate) }}
                                            </small>
                                        @endif
                                    </h6>

                                    @if(isset($is_buyer) && $detail->product->type != 'item')
                                        <p> {{ $detail->product->type }} </p>
                                    @endif
                                </div>

                                <div class="col-md-1 col-xs-8 pull-xs-right text-right">
                                    <span class="visible-xs-inline">{{ trans('store.quantity') }}</span>&nbsp;<strong>{{ $detail->quantity }}</strong>
                                </div>

                                <div class="col-md-1 col-xs-8 pull-xs-right text-right">
                                    <span class="visible-xs-inline">{{ trans('store.price') }}</span>&nbsp;<strong>{{ Utility::showPrice($detail->product->getPrice()) }}</strong>
                                </div>

                                @if(isset($is_seller) && $detail->product->type != 'item' && $order->status == 'pending')
                                    <div class="col-md-1 text-right">
                                       <a class="btn btn-info btn-sm" href="javascript: void(0)" ng-click="delivery('{{ $order->id }}', '{{ $detail->product->id }}')">{{ trans('store.delivery') }}</a>
                                       <span ng-show="detail.status=='0'">{{ trans('store.dispatched') }}</span>
                                    </div>
                                @else
                                    <div class="col-md-1">&nbsp;</div>
                                @endif

                            </div>

                            <hr/>

                        </div>

                        @endforeach

                    </div>

                </div>

            </div>
            {{--detail panel-body --}}

            <div class="panel-footer">
                <strong>{{ trans('store.grand_total') }}:</strong>&nbsp;{{ $totalItems.' '.trans('store.items') }},
                &nbsp;
                <strong>{{ Utility::showPrice($grandTotal) }}</strong>
            </div>

        </div>
        {{--detail panel-default--}}

    </div> {{-- controller --}}

    @endsection
@stop

@section('scripts')
    @parent
    <script>
        (function(app){

            app.controller('RateOrdersControllerModal', ['$scope', '$rootScope', '$http', '$modalInstance', '$window', function($scope, $rootScope, $http, $modalInstance, $window)
            {
                $scope.message = '';
                $scope.messageClass = '';
                $scope.urlShow = '{{ action("ProductsController@show", "productId") }}';
                $scope.busissnes = {};
                $scope.ratingOrdItems = {};
                $scope.noRate = false;

                $scope.rateSeller = function(order_id)
                {
                    $scope.isDisabled = true;
                    $sent_data = {};
                    $sent_data.order_id = order_id;
                    $sent_data.seller_rate = $scope.busissnes.rate_val;
                    $sent_data.seller_comment = $scope.busissnes.comment;
                    $http.post('/user/rates/seller', $sent_data).
                    success(function(data, status)
                    {
                        if (data.success)
                        {
                            $scope.messageClass = 'alert-success';
                        }
                        else
                        {
                            $scope.messageClass = 'alert-danger';
                        }

                        $scope.message = data.message;

                        $modalInstance.close();
                        $window.location.href = "{{ route('orders.show_orders') }}";
                    });
                };

                $scope.rateProduct = function(detail_id, product_id)
                {
                    messageBox = '';
                    $sent_data = {};
                    $scope.isDisabled = true;
                    $('#btn_'+product_id).attr("disabled", true);
                    $sent_data.detail_id = detail_id;
                    $sent_data.product_rate = $('#rate_'+product_id).attr('aria-valuenow');
                    $sent_data.product_comment = $('#comment_'+product_id).val();
                    $http.post('/user/rates/product', $sent_data).
                    success(function(data, status)
                    {
                        if (data.success)
                        {
                            $scope.messageClass = 'alert-success';

                        }
                        else
                        {
                            $scope.messageClass = 'alert-danger';
                        }

                        $scope.message = data.message;
                        $scope.isDisabled = false;
                    });
                };
            }]);

            app.controller('StoreProducts', ['$scope','$http','notify', function($scope, $http, notify)
            {
                $scope.delivery=function(orderId,productId){
                    if (!productId || !orderId) return;
                    $http.get('/virtualDelivery/'+orderId+'/'+productId+'/').success( function(data) {
                        var messageClass='alert-danger';
                        if (data.success){
                            messageClass='alert-success';
                            setTimeout(function(){ location.reload(); }, 3000);
                        }
                        notify({message:data.message,classes:messageClass});
                    });
                }
            }]);
        })(angular.module("AntVel"));
    </script>
@stop
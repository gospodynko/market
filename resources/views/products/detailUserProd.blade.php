@extends('layouts.master')
@section('title')@parent- {{ $product->name }} @stop

@include('partial.message')

@section('metaLabels')
    @parent
    @include('partial.social_tags', [
        'title' => $product->name,
        'image' => isset($product->features['images'][0]) ? URL::to('/').$product->features['images'][0] : URL::to('/').'/img/no-image.jpg',
        'description' => $product->description,
        'id' =>$product->id,
        'brand' => isset($product->features['brand'])?$product->features['brand']:'',
        'rate_val' => $product->rate_val,
        'rate_count' => $product->rate_count
    ])
@stop

@if($product->status == 0)
    <div class="alert alert-danger" role="alert">
        {{ trans('product.show_view.status_inactive') }}
    </div>
@endif

@section('content')
    @parent
@section('center_content')

    <div class="page-header">
        <h5>{{ $product->name }}</h5>
    </div>

    <div class="row">

        {{-- Gallery --}}
        <div class="col-md-6" ng-controller="ProductsGallery">
            @if(\App\Models\Product::images($product) !== null)
                <img src="img/no-image.jpg" lazy-img='[[getPortrait()]]'
                     ng-init="setPortrait('{{ \App\Models\Product::images($product)[0] }}?w=450')"
                     class="img-responsive img-rounded">
                <hr>
            @endif
            {{-- Thumbnails --}}
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline" ng-controller="ProductsGallery">
                        <?php $selector = 0; $gallery = ''; ?>
                        @if(\App\Models\Product::images($product) !== null)

                            @foreach(\App\Models\Product::images($product) as $image)
                                <li>
                                    <a class="thumbnail">
                                        <img src="img/no-image.jpg?h=60" lazy-img="{{ $image }}?h=60"
                                             class="img-responsive img-rounded"
                                             ng-click="setPortrait('{{ $image }}?w=450')">
                                    </a>
                                </li>
                                <?php $gallery .= $image . '?w=450,'; ?>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        {{-- Product Information --}}
        <div class="col-md-3">
            <hr class="visible-xs visible-sm">
            <h5 class="black_color">{{ \Utility::showPrice($userProduct->getPrice()) }}</h5>
            <hr class="hidden-sm hidden-xs">
            <hr class="visible-xs visible-sm">
            <p>{{ trans('globals.producer').': '.$product->producer->name }}</p>
        </div>
        @if(!auth()->check() || $userProduct->created_by != auth()->user()->id)
            {{-- Purchase Box --}}
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-body">

                        {!! Form::open(array('url' => route('orders.add_to_order', [ 'destination' => 'cart', 'productId' => $userProduct->id]), 'method' => 'PUT')) !!}

                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-warning btn-sm full-width">
                                    <span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;
                                    {{ trans('store.add_to_cart') }}
                                </button>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div> {{-- panel-body --}}
                </div>
            </div>
        @endif
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-6">
            <span>
                {{ trans('product.globals.delivery') }}
                @foreach($userProduct->getDeliveryArray() AS $item)
                    {{ $item }}&nbsp;
                @endforeach
                </span>
            <br>
            <span>
                {{ trans('product.globals.payment') }}
                @foreach($userProduct->getPayArray() AS $item)
                    {{ $item }}&nbsp;
                  @endforeach
            </span>
        </div>
        <div class="col-sm-6">
            от {{ $userProduct->mainProduct->getPriceMin() }} &nbsp;&nbsp;&nbsp; {{ trans('product.globals.price') }}: {{ $userProduct->mainProduct->getPriceAvg() }} &nbsp;&nbsp;&nbsp; до {{ $userProduct->mainProduct->getPriceMax() }}
        </div>
    </div>

    <div class="row"></div>

    {{-- Product Description --}}
    @if (trim($product->description) != '')
        <div class="row">&nbsp;</div>
        <div class="page-header">
            <h5>{{ trans('store.description') }}</h5>
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ $product->description }}
            </div>
        </div>
    @endif

    {{-- Product Description --}}
    @if (count($reviews) > 0)
        <div class="row">&nbsp;</div>
        <div class="page-header">
            <h5>{{ trans_choice('store.review', 7) }}</h5>
        </div>
        @foreach ($reviews as $rev)
            <div class="row">
                <div class="col-lg-12">
                    <small>
                        {{ \Utility::showRate($rev['rate']) }}&nbsp;
                        {{ $rev['rate_comment'] }}&nbsp;-&nbsp;
                        <em>{{ Carbon\Carbon::parse($rev['updated_at'])->format('F j, Y') }}</em>
                    </small>
                </div>
            </div>
        @endforeach
    @endif

@stop
@stop


@section('scripts')
    @parent

    {!! Html::script('/antvel-bower/angular-lazy-img/release/angular-lazy-img.min.js') !!}

    <script src="https://connect.facebook.net/en_US/sdk.js"></script>

    <script>

        (function (app) {

            app.requires.push('angularLazyImg');

            /**
             * ProductsGallery
             * Allows changing the product portrait image
             * @param  $scope Angularjs scope object
             * @param  PassInfo is a service that lets passing info among controllers or divs
             */
            app.controller('ProductsGallery', function ($scope, PassInfo) {

                $scope.gallery = '{{ $gallery }}'.split(',');

                $scope.setPortrait = function (pic) {
                    PassInfo.setProperty(pic);
                }

                $scope.getPortrait = function () {
                    return PassInfo.getProperty();
                }

            });

        })(angular.module("AntVel"));

        //Social Buttons
        $(document).ready(function () {
            $("#facebook").click(function () {

                $.getScript('//connect.facebook.net/en_US/sdk.js', function () {
                    FB.init({
                        appId: "{{ env('FB_APP_ID') }}",
                        xfbml: true,
                        version: 'v2.5',
                        caption: '{{ $product->name }}',
                    });
                    FB.ui(
                        {
                            method: 'share',
                            href: '{{ Request::url() }}'
                        },
                        function (response) {
                        }
                    );
                });

            });
        });

        $('#twitter').click(function (event) {
            var width = 575,
                height = 400,
                left = ($(window).width() - width) / 2,
                top = ($(window).height() - height) / 2,
                url = this.href,
                opts = 'status=1' +
                    ',width=' + width +
                    ',height=' + height +
                    ',top=' + top +
                    ',left=' + left;

            window.open(url, '{{ $product->name }}', opts);

            return false;
        });

    </script>
@stop



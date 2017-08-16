<div class="navbar-wrapper container">
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand">
                    <a href="/" class="navbar-brand">
						<span class="navbar-brand-text">
								<img src="/img/logo.png" style="width: 40px" alt="AgroYard">
                        </span>
                        <span class="navbar-brand-slogan">AgroYard</span>
                    </a>
            </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse" style="margin-left: 100px">
            <ul class="nav navbar-nav">

                @include('user.partial.menu_top')

                @if (auth()->check() && !auth()->user()->isAdmin())
                    {{--<li class="dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
                            {{--<span class="fui fui-heart"></span>{{ trans('store.wish_list') }}--}}
                            {{--<span class="caret"></span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li><a href="{{ route('orders.show_wish_list') }}">{{ trans('store.wish_list') }}</a></li>--}}
                            {{--<li>--}}
                                {{--<a href="{{ route('orders.show_list_directory') }}">{{ trans('store.your_wish_lists') }}</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                @endif
                @if (!auth()->check() || (auth()->check() && !auth()->user()->isAdmin()))
                <li class="dropdown">
                    <a href="#cart" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        @if(Auth::user() && Auth::user()->getCartCount())
                            <span class="badge badge-cart">{{ Auth::user()->getCartCount() }} </span>
                        @elseif(!Auth::user() && is_array(Session::get('user.cart_content')) && array_sum(Session::get('user.cart_content')))
                            <span class="badge badge-cart">{{ array_sum(Session::get('user.cart_content')) }} </span>
                        @endif

                        <span class="glyphicon glyphicon-shopping-cart"></span>{{ trans('store.cart') }}
                        <span class="caret"></span>
                    </a>

                    @if(Auth::user() && Auth::user()->getCartCount() > 0)
                        <ul class="dropdown-menu cart" role="menu">
                            @foreach(Auth::user()->getCartContent() as $orderDetail)
                                <li>
                                    <a href="{{ route('products.show.store',[$orderDetail->product->id]) }}">

                                        <img src="{{ \App\Models\UserProduct::images($orderDetail->product)[0] }}"
                                             alt="{{ $orderDetail->product->mainProduct->name }}" width="32" height="32"
                                             style="float: left; margin-right: 2px"/>
                                        {{ $orderDetail->product->mainProduct->name }}

                                    </a>
                                </li>
                            @endforeach
                            <li><a class="btn btn-default" href="{{ route('orders.show_cart') }}"
                                   role="button">{{ trans('store.view_cart') }}</a></li>
                        </ul>
                    @elseif(!Auth::user() && is_array(Session::get('user.cart_content')))
                        <ul class="dropdown-menu cart" role="menu">
                            @foreach(Session::get('user.cart_content') as $product_id => $quantity)
                                @if($product=\App\Product::find($product_id))
                                    <li>
                                        <a href="{{ route('products.show',[$product_id]) }}">

                                            <img src="{{ $product->first_image }}" width="32" height="32"
                                                 style="float: left; margin-right: 2px"/>
                                            {{ $product->name }}
                                            - {{ trans('store.quantity') }}: {{ $quantity }}

                                        </a>
                                    </li>
                                @endif
                            @endforeach
                            <li><a class="btn btn-default" href="{{ route('orders.show_cart') }}"
                                   role="button">{{ trans('store.view_cart') }}</a></li>
                        </ul>
                    @endif
                </li>
                @endif

                @if(Auth::user() && !auth()->user()->isAdmin())
                    <li class="dropdown " id="push-notices" ng-controller="PushNoticesController" ng-click="check()"
                        ng-focus="check()">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="badge badge-notifications ng-hide" ng-cloak ng-show="push">[[push]]</span>
                            <span class="fui fui-chat"></span>{{ trans('globals.notices') }}
                            <span class="visible-xs-inline">
								<span class="caret"></span>
							</span>
                        </a>
                        <ul class="dropdown-menu notices" role="menu" ng-if="notices.length">
                            <li ng-repeat="notice in notices" class="[[notice.status]]">
                                <a href="[[getLink(notice)]]" ng-click="check(notice)">[[getDesc(notice)]]</a>
                            </li>
                            <li>{!! link_to('user/notices/list', trans('globals.all')) !!}</li>
                        </ul>
                    </li>
                @endif

            </ul>
            {{--@include('partial.navigation_help')--}}
        </div>
    </nav>

    @if(strpos(Route::currentRouteName(), 'admin') === false)
    <nav ng-controller="CategoriesController">
        {!! Form::model(Request::all(),['url'=> route('products.index') , 'method'=>'GET', 'id'=>'searchForm']) !!}
        @if (isset($categories_menu))
            <div class="input-group">
			<span class="input-group-btn categories-search">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                        aria-expanded="false">
					<span ng-bind="catSelected.name || '{{ isset($categories_menu[Request::get('category')]['name']) ? $categories_menu[Request::get('category')]['name'] : trans('store.all_categories') }}'">
						{{ isset($categories_menu[Request::get('category')]['name']) ? $categories_menu[Request::get('category')]['name'] : trans('store.all_categories') }}
						</span> <span class="caret">
					</span>
				</button>
                <ul class="dropdown-menu" role="menu">
					@foreach($categories_menu as $categorie_menu)
                        <li>
							<a href="javascript:void(0)"
                               ng-click="setCategorie({{ $categorie_menu['id'] }},'{{ $categorie_menu['name'] }}')">
								{{ $categorie_menu['name'] }}
							</a>
						</li>
                    @endforeach

				</ul>
			</span>
                <input type="hidden" name="category" value="[[refine() || '{{Request::get('category')}}']]"/>

                @include('partial.search_box',['angularController' => 'AutoCompleteCtrl', 'idSearch'=>'search'])

                <span class="input-group-btn">
				<button class="btn btn-default fui-search" type="submit"></button>
			</span>
            </div>
        @endif

        {!! Form::close() !!}
    </nav>
        @endif
</div>

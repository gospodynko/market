@extends('user_shop.layouts.index')

@section('user-shop-content')
<shops-orders-vue inline-template :orders="{{ json_encode($orders) }}">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs nav-justified">
                        @foreach($userShops as $userShop)
                            <li>
                                {{ $userShop->name }}
                            </li>
                        @endforeach
                        {{--<li :class="" v-for="order in orders"><a href="#">@{{order.id}}</a></li>--}}
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 add-new-product">
                    <!--<a :href="'/shop/shop/'+checkedShop.id+'/create'" class="btn btn-success btn-lg">Добавить продукт</a>-->
                </div>
            </div>
        </div>
    </div>
</shops-orders-vue>
@endsection
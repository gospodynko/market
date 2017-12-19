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
                                <button v-on:click="orderDetails({{$userShop->id}})">
                                    {{ $userShop->name }} - {{ $userShop->getOrdersCount() }}
                                </button>
                            </li>
                        @endforeach
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
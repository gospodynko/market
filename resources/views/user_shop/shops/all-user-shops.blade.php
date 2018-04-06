@extends('user_shop.layouts.index')

@section('user-shop-content')
    <all-user-shops-vue inline-template :shops="{{ $shops }}">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="nav nav-tabs nav-justified">
                            <div class="shop-box" v-for="shop in shops">
                                <button id="shop-button" @click="editShop(shop.id)">
                                    @{{ shop.name }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </all-user-shops-vue>
@endsection
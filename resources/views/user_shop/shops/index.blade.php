@extends('user_shop.layouts.index')

@section('user-shop-content')
    <shops-vue inline-template :shops="{{ $shops }}">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="nav nav-tabs nav-justified">
                                <div class="shop-box" v-for="shop in shops">
                                    <button id="shop-button" @click="productDetails(shop)">
                                        @{{ shop.name }} (@{{ productsCount(shop) }})
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 add-new-product">
                        <a v-if="checkedShopId" :href="'/shop/shop/'+checkedShopId+'/create'" class="btn btn-success btn-lg">Додати продукт</a>
                    </div>
                </div>

                <div class="container">
                    <table v-if="products.length" class="table product-table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>ID товару</th>
                            <th>Назва товару</th>
                            <th>Опис товару</th>
                            <th>Ціна</th>
                            <th>Валюта</th>
                            <th>Статус</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="product in products">
                                <td><button @click="editProduct(product.id)">Редагувати</button></td>
                                <td>@{{ product.id }}</td>
                                <td>@{{ product.name }}</td>
                                <td>@{{ product.description }}</td>
                                <td>@{{ product.price }}</td>
                                <td>@{{ product.currency.name }}</td>
                                <td><input type="checkbox" v-model="product.status" @change="setStatus(product)"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </shops-vue>
@endsection
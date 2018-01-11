@extends('user_shop.layouts.index')

@section('user-shop-content')
    <shops-vue inline-template :shops="{{ $shops }}">
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs nav-justified">
                                <li v-for="shop in shops">
                                    <button @click="productDetails(shop)">
                                        @{{ shop.name }} (@{{ productsCount(shop) }})
                                    </button>
                                </li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 add-new-product">
                        <a v-if="checkedShopId" :href="'/shop/shop/'+checkedShopId+'/create'" class="btn btn-success btn-lg">Добавить продукт</a>
                    </div>
                </div>

                <div class="container">
                    <table v-if="products.length" class="table product-table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Product ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="product in products">
                            <td><button @click="editProduct(product.id)">Edit</button></td>
                            <td>@{{ product.id }}</td>
                            <td>@{{ product.name }}</td>
                            <td>@{{ product.description }}</td>
                            <td>@{{ product.price }}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </shops-vue>
@endsection
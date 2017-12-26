@extends('user_shop.layouts.index')

@section('user-shop-content')
    <shops-vue inline-template>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs nav-justified">
                            @foreach($shops as $shop)
                                <li>
                                    <button class="btn product-add" @click="productDetails({{$shop->id}})">
                                        {{ $shop->name }} ({{ $shop->getProductsCount() }})
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="container">
                    <table v-if="details" class="table product-table">
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
                        <tr v-for="detail in details">
                            <td><button @click="editProduct(detail.id)">Edit</button></td>
                            <td>@{{ detail.id }}</td>
                            <td>@{{ detail.name }}</td>
                            <td>@{{ detail.description }}</td>
                            <td>@{{ detail.price }}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-12 add-new-product">
                        <a v-if="checkedShopId" :href="'/shop/shop/'+checkedShopId+'/create'" class="btn btn-success btn-lg">Добавить продукт</a>
                    </div>
                </div>
            </div>
        </div>
    </shops-vue>
@endsection
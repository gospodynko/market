@extends('user_shop.layouts.index')

@section('user-shop-content')

<shops-orders-vue inline-template :shops="{{ $shops }}">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs nav-justified">
                            <li v-for="shop in shops">
                                <button @click="orderDetails(shop)">
                                    @{{ shop.name }} (@{{ ordersCount(shop) }})
                                </button>
                            </li>
                    </ul>
                </div>
            </div>
            <div class="container">
                <table v-if="orders.length" class="table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Link</th>
                        <th>Info</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="order in orders">
                        <td>@{{ order.id }}</td>
                        <td>@{{ order.created_at }}</td>
                        <td>@{{ order.name }}</td>
                        <td>@{{ order.url }}</td>
                        <td v-if="order.buyer">
                            @{{ order.buyer.first_name }} @{{ order.buyer.first_name }} @{{ order.buyer.phone }} @{{ order.emails ? order.emails.email : '' }}
                        </td>
                    </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</shops-orders-vue>
@endsection
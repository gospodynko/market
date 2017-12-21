@extends('user_shop.layouts.index')

@section('user-shop-content')
<shops-orders-vue inline-template :orders="{{ json_encode($orders) }}" xmlns:v-on="http://www.w3.org/1999/xhtml">
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
            <div class="container">
                <table v-if="details" class="table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Link</th>
                        <th>Phone</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="detail in details">
                        <td>@{{ detail.id }}</td>
                        <td>@{{ detail.created_at }}</td>
                        <td>@{{ detail.name }}</td>
                        <td>@{{ detail.link }}</td>
                        <td>@{{ detail.buyer }}</td>
                    </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</shops-orders-vue>
@endsection
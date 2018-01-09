@extends('user_shop.layouts.index')

@section('user-shop-content')
<shops-orders-vue inline-template>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs nav-justified">
                        @foreach($shops as $shop)
                            <li>
                                <button @click="orderDetails({{$shop->id}})">
                                    {{ $shop->name }} - {{ $shop->getOrdersCount() }}
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
                        <th>Info</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="detail in details">
                        <td>@{{ detail.id }}</td>
                        <td>@{{ detail.created_at }}</td>
                        <td>@{{ detail.name }}</td>
                        <td>@{{ detail.link }}</td>
                        <td v-if="detail.buyer">
                            @{{ detail.buyer.first_name }} @{{ detail.buyer.first_name }} @{{ detail.buyer.phone }} @{{ detail.emails ? detail.emails.email : '' }}
                        </td>
                    </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</shops-orders-vue>
@endsection
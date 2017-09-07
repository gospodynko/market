<?php

namespace App\Http\Controllers;

use App\Models\UserProduct;
use App\Models\UserProductBuyers;
use App\Models\UserProductOffers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('cart.cart', ['user' => Auth::user()]);
    }

    public function successBuy()
    {
        return view('cart.success');
    }

    public function setOrder(Request $request)
    {
        $product = $request->input('product');
        $user_data = $request->input('data');
        $store = $request->input('store');
        $buyer = UserProductBuyers::firstOrCreate(['phone' => $user_data['user']['phone']], $user_data['user']);
        $user_product_offer = UserProductOffers::create([
            'user_product_id' => $product['id'],
            'buyer_id' => $buyer->id,
            'day_start' => Carbon::now(),
            'day_end' => Carbon::now(),
            'price' => ($store['price'] * $store['store_count']),
            'quantity' => $store['store_count'],
            'comment' => $user_data['delivery']['delivery_comment'],
            'pay_type_id' => $user_data['payment']['payment_type'],
            'delivery_type_id' => $user_data['delivery']['delivery_type']
        ]);
//        dd($user_product_offer);
        return response()->json(['order' => $user_product_offer->load('userProduct.mainProduct'), 'product_name' => $product['name']], 200);
    }
}

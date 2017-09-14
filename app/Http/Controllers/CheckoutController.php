<?php

namespace App\Http\Controllers;

use App\Models\UserProduct;
use App\Models\UserProductBuyers;
use App\Models\UserProductOffers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $buyer_email = $buyer->emails()->firstOrCreate(['email' => $user_data['user']['email']], ['email' => $user_data['user']['email']]);

        $user_product_offer = UserProductOffers::create([
            'user_product_id' => $store['id'],
            'buyer_id' => $buyer->id,
            'buyer_email_id' => $buyer_email->id,
            'day_start' => Carbon::now(),
            'day_end' => Carbon::now(),
            'price' => ($store['price'] * $store['store_count']),
            'quantity' => $store['store_count'],
            'comment' => $user_data['delivery']['delivery_comment'],
            'pay_type_id' => $user_data['payment']['payment_type'],
            'delivery_type_id' => $user_data['delivery']['delivery_type']
        ]);
        $item_offer = $user_product_offer->load('userProduct.mainProduct');
        $data_mail = array();
        $data_mail['user'] = [
            'first_name' => $buyer->first_name,
            'last_name' => $buyer->last_name,
            'email' => $buyer_email->email,
            'phone' => $buyer->phone
        ];
        $data_mail['order'] = [
            'created_at' => $item_offer->created_at,
            'price' => $item_offer->price,
            'quantity' => $item_offer->quantity,
            'payment' => $item_offer->payment->name,
            'delivery' => $item_offer->delivery->name,
            'comment' => $item_offer->comment
        ];
        $data_mail['product'] = [
            'name' => $request->input('product')['name'],
            'id' => $item_offer['userProduct']->id,
            'slug' => $item_offer['userProduct']['mainProduct']->slug
        ];
        $data_mail['merchant'] = [
            'name' => $item_offer['userProduct']->user->first_name . ' ' . $item_offer['userProduct']->user->last_name,
            'phone' => $item_offer['userProduct']->user->phone,
            'email' => $item_offer['userProduct']->user->email
        ];

        if($buyer_email->email){
            Mail::send('emails.checkout', ['data' => $data_mail], function ($message) use ($buyer_email, $request) {
                $message->subject('Поздравляем! Вы купили товар '.$request->input('product')['name']);
                $message->to($buyer_email->email);
            });
        }
        Mail::send('emails.checkoutSeller', ['data' => $data_mail], function ($message) use ($data_mail, $request) {
            $message->subject('Поздравляем! Вы продали товар '.$request->input('product')['name']);
            $message->to($data_mail['merchant']['email']);
        });
        return response()->json(['order' => $item_offer, 'product_name' => $product['name']], 200);
    }
}

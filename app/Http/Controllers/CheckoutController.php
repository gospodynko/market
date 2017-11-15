<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductBuyers;
use App\Models\ProductOffers;
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
        $user_data = $request->input('data');
        $product = Product::findOrFail($request->input('product_id'));
        $count = $request->input('count');
        $user_phone = $user_data['user']['phone'];
        $matches = null;
        preg_match_all('!\d+!', $user_phone, $matches);
        $phone = substr(implode('', $matches[0]), 2);
        $user_data['user']['phone'] = $phone;
        $buyer = ProductBuyers::firstOrCreate(['phone' => $phone], $user_data['user']);
        $buyer_email = $buyer->emails()->firstOrCreate(['email' => $user_data['user']['email']], ['email' => $user_data['user']['email']]);

        $product_offer = UserProductOffers::create([
                'product_id' => $product->id,
                'buyer_id' => $buyer->id,
                'buyer_email_id' => $buyer_email->id,
                'day_start' => Carbon::now(),
                'day_end' => Carbon::now(),
                'price' => ($product->price * $count),
                'quantity' => $count,
                'comment' => $user_data['delivery']['delivery_comment'],
                'pay_type_id' => $user_data['payment']['payment_type'],
                'delivery_type_id' => $user_data['delivery']['delivery_type']
        ]);
        $data_mail = array();
        $data_mail['user'] = [
            'first_name' => $buyer->first_name,
            'last_name' => $buyer->last_name,
            'email' => $buyer_email->email,
            'phone' => $buyer->phone
        ];
        $data_mail['order'] = [
            'created_at' => $product_offer->created_at,
            'price' => $product_offer->price,
            'quantity' => $product_offer->quantity,
            'payment' => $product_offer->payment->name,
            'delivery' => $product_offer->delivery->name,
            'comment' => $product_offer->comment
        ];
        $data_mail['product'] = [
            'name' => $product->name,
            'id' => $product->id,
            'slug' => $product->slug
        ];
        $shop = $product->shop;
        $company = $shop->company;
        $data_mail['merchant'] = [
            'name' => $shop->name,
            'phone' => $company->compPhone,
            'email' => $company->compMail
        ];

        if ($buyer_email->email) {
            Mail::send('emails.checkout', ['data' => $data_mail], function ($message) use ($buyer_email, $product) {
                $message->subject('Поздравляем! Вы купили товар ' . $product->name);
                $message->to($buyer_email->email);
            });
        }
        if ($data_mail['merchant']['email']) {
            Mail::send('emails.checkoutSeller', ['data' => $data_mail], function ($message) use ($data_mail, $product) {
                $message->subject('Поздравляем! Вы продали товар ' . $product->name);
                $message->to($data_mail['merchant']['email']);
            });
        }
        Mail::send('emails.checkoutSeller', ['data' => $data_mail], function ($message, $product) {
            $message->subject('Поздравляем! Вы продали товар ' . $product->name);
            $message->to('market@agroyard.ua');
        });
        return response()->json(['order' => $product_offer, 'product_name' => $product->name], 200);
    }
}

//gulivets@agroresurs-a.com

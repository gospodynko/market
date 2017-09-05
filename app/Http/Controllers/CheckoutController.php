<?php

namespace App\Http\Controllers;

use App\Models\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index($id)
    {
        $user_product = UserProduct::findOrFail($id)->load('shop');
        if($user_product->created_by == Auth::id()){
            return view('cart.cart', ['store_id' => $id, 'user' => Auth::user()]);
        } else {
            return abort(404);
        }
    }
}

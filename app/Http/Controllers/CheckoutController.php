<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index($id)
    {

        return view('cart.cart', ['store_id' => $id, 'user' => Auth::user()]);
    }
}

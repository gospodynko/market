<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Currency;
use App\Models\DeliveryType;
use App\Models\PayType;
use App\Models\UserShops;
use Illuminate\Http\Request;

class UserShopController extends Controller
{
    public function getShops()
    {
        return view('user_shop.shops.index', ['shops' => UserShops::all()]);
    }

    public function createProduct($id)
    {
        return view('user_shop.shops.create', ['data' => ['shop' => UserShops::find($id), 'categories' => Category::with('producers.products')->get(), 'currencies' => Currency::all(), 'delivery_type' => DeliveryType::all(), 'pay_type' => PayType::all()]]);
    }
}

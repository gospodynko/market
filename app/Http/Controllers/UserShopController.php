<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Currency;
use App\Models\DeliveryType;
use App\Models\PayType;
use App\Models\UserShops;
use Illuminate\Http\Request;
use Traits\ProductTrait;

class UserShopController extends Controller
{
    use ProductTrait;
    public function getShops()
    {
        return view('user_shop.shops.index', ['shops' => UserShops::all()]);
    }

    public function createProduct($id)
    {
        return view('user_shop.shops.create', ['data' => ['shop' => UserShops::find($id),
                                                                'categories' => Category::with('producers.products')->get(),
                                                                'currencies' => Currency::all(), 'delivery_type' => DeliveryType::all(),
                                                                'pay_type' => PayType::all()]]);
    }

    public function storeProduct(Request $request)
    {
//        dd($request);
        $producer = $request->input('producer');
        $category = $request->input('category');
        $product = $request->input('product');

        if(!is_numeric($producer['id'])){
            $producer_id = $this->createProducer($producer, $category);
        }
        if(!is_numeric($product['id'])){

        }
    }
}
